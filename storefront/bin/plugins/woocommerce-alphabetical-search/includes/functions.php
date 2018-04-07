<?php
/**
 * Woocommerce Alphabetical Search class
 *
 * @author   Magnigenie
 * @category  Admin
 * @version     1.0
 */
class woo_Alphabetical_Search {

	public function __construct() {

		//Check if woocommerce plugin is installed.
		add_action( 'admin_notices', array( $this, 'check_required_plugins' ) );

		//Add setting link for the admin settings
		add_filter( "plugin_action_links_".WOOAS_BASE, array( $this, 'wooas_settings_link' ) );

		//Add required js and css files to the site
		add_action( 'wp_enqueue_scripts', array( $this, 'woopcs_scripts' ) );

		//Filter posts by letter
		add_filter( 'posts_where' , array( $this, 'posts_where' ), 10, 2 );

		//Add backend settings
		add_filter( 'woocommerce_get_settings_pages', array( $this, 'wooas_settings' ) );

		//Add shortcode for the alphabets
		add_shortcode( 'woo_alphabetical_search', array( $this, 'generate_alphabets' ) );
	}

	/**
	 * Check if woocommerce is installed and activated if not then deactivate alphabetical search
	 *
	 */
	public function check_required_plugins() {

		if ( ! is_plugin_active( 'woocommerce/woocommerce.php' ) ) { ?>

            <div id="message" class="error">
                WooCommerce Alphabetical Search expects WooCommerce to be active. This plugin has been deactivated.
            </div>

            <?php
			deactivate_plugins( '/woocommerce-alphhabetical-search/woocommerce-alphabetical-search.php' );
		} // if woocommerce

	} // check_required_plugins

	/**
	 * Add new link for the settings under plugin links
	 *
	 * @param array   $links an array of existing links.
	 * @return array of links  along with alphabetical search settings link.
	 *
	 */
	public function wooas_settings_link( $links ) {
		$settings_link = '<a href="'.admin_url( 'admin.php?page=wc-settings&tab=alpha_search' ).'">Settings</a>';
		array_unshift( $links, $settings_link );
		return $links;
	}

	/**
	 * Add new admin setting page for woocommerce alphabetical search settings.
	 *
	 * @param array   $settings an array of existing setting pages.
	 * @return array of setting pages along with alphabetical search settings page.
	 *
	 */
	public function wooas_settings( $settings ) {
		$settings[] = include 'class-wc-settings-alphabetical-search.php';
		return $settings;
	}

	/**
	 * Add required scripts for woocommerce alphabetical search
	 *
	 */

	public function woopcs_scripts() {
		$options = get_option( 'wooas' );
		if ( $options['placement'] == 'yes' )
			add_action( 'woocommerce_archive_description', array( $this, 'wooas_add_letters' ) , 99 );
		wp_enqueue_style( 'woopcs-style', plugins_url( 'assets/style.css', WOOAS_FILE ) );
		$custom_css = '';
		if ( $options != '' ) {
			$li_h = $options['alpha_height'] + $options['vert_space'];
			$li_w = $options['alpha_width'] + $options['horz_space'];
			$custom_css .= ".wooas-container ul.alphabets a{ background: {$options['background']}; color: {$options['text_color']}; font-size: {$options['alpha_font']}px; height: {$options['alpha_height']}px; line-height: {$options['alpha_height']}px; width: {$options['alpha_width']}px; }";
			$custom_css .= "body .wooas-container ul.alphabets a:hover,body .wooas-container ul.alphabets a.active-letter{ background: {$options['hover_background']}; color: {$options['text_hover']} !important; }";
			$custom_css .= ".wooas-container ul.alphabets li{ height: {$li_h}px; width: {$li_w}px; }";
			$custom_css .= "span.wooas-counter{ background: {$options['count_bg']}; color: {$options['count_text']}; font-size: {$options['count_font']}px; height: {$options['count_height']}px; width: {$options['count_width']}px; }";
		}
		wp_add_inline_style( 'woopcs-style', $custom_css );
	}

	/**
	 * Add letters on the top of shop page.
	 *
	 */

	public function wooas_add_letters() {
		$options = get_option('wooas');
		$text = '';
		if( $options['text'] != '' )
			$text = '<h2>'.$options['text'].'</h2>';
		echo '<div class="wooas">'.$text.$this->generate_alphabets().'</div>';
	}

	/**
	 * Generate alphabets based on the admin settings.
	 *
	 * @param array   $atts attributes for the shortcode..
	 * @return string of the html source for alphabets.
	 *
	 */
	public function generate_alphabets( $atts = array() ) {
		$options = get_option( 'wooas' );
		global $wpdb;
		$count_num = '';
		$tax_query = '';
		$cur_letter = isset( $_GET['letter'] ) ? strtoupper( $_GET['letter'] ) : '';
		if ( is_product_category() || is_product_tag() ) {
			global $wp_query;
			$cat = $wp_query->get_queried_object();
			$term_id = $cat->term_taxonomy_id; // the category needed.
			$tax_query = "AND ID IN (SELECT object_id from $wpdb->term_relationships where term_taxonomy_id = '$term_id')";
		}
		$count_num_val = $wpdb->get_var( "SELECT COUNT(ID) FROM  $wpdb->posts WHERE $wpdb->posts.post_status = 'publish' AND $wpdb->posts.post_type = 'product' AND $wpdb->posts.post_title REGEXP '^[^a-zA-Z]' $tax_query" );
		$querystr = "SELECT LEFT(post_title, 1) AS initial, COUNT(ID) AS counts FROM $wpdb->posts WHERE $wpdb->posts.post_type='product' AND $wpdb->posts.post_status = 'publish' $tax_query GROUP BY initial";
		$product_initials = $wpdb->get_results( $querystr );

		if ( $options['product_count'] == 'yes' && $count_num_val > 0 ) {
			$count_num = '<span class="wooas-counter">'.$count_num_val.'</span>';
		}

		$alphabets = array();
		foreach ( $product_initials as $p ) {
			if ( ctype_alpha( $p->initial ) )
				$alphabets[$p->initial] = $p->counts;
		}
		if ( !is_shop() && !is_product_tag() && !is_product_category() )
			$shop_page_url = get_permalink( woocommerce_get_page_id( 'shop' ) );
		else if ( is_shop() )
			$shop_page_url = get_permalink( woocommerce_get_page_id( 'shop' ) );
		if ( is_tax() && is_woocommerce() ){
			global $wp_query;
			$shop_page_url = get_term_link( $wp_query->queried_object );
		}
		$html = '<div class="wooas-container"><ul class="alphabets">';

		//If number display is active on admin
		if ( $options['numbers'] == 'yes' ) {
			$url = add_query_arg( 'letter', '1-9', $shop_page_url );
			$active = $cur_letter == '1-9' ? 'class="active-letter"' : '';
			if ( $count_num_val > 0 )
				$html.= '<li><a href="'.$url.'" '.$active.' >#'.$count_num.'</a></li>';
			else if ( $options['opaque'] == 'yes' && $count_num_val == 0 )
					$html.= '<li><a href="javascript:void(0);" class="letter-disabled" >#</a></li>';
		}
		//If admin option is set to opaque then display the opaque buttons for not existing products on specific alphabet
		if ( $options['opaque'] =='yes' ) {
			foreach ( range( 'A', 'Z' ) as $letter ) {

				if ( is_array( $alphabets ) && isset( $alphabets[$letter] ) ) {
					$url = add_query_arg( 'letter', $letter, $shop_page_url );
					if ( isset( $shop_page_url )  && !empty( $shop_page_url ) )
						$url = add_query_arg( 'letter', $letter, $shop_page_url );

					$count = '';
					if ( $options['product_count'] == 'yes' )
						$count = '<span class="wooas-counter">'.$alphabets[$letter].'</span>';
					$active = $cur_letter == $letter ? 'class="active-letter"' : '';
					$html.= '<li><a href="'.$url.'" '.$active.'>'.$letter.$count.'</a></li>';
				}
				else
					$html.= '<li><a href="javascript:void(0);" class="letter-disabled">'.$letter.'</a></li>';
			}
		}
		//If all alphabets allowed to be displayed.
		else if ( $options['alphabets'] != 'yes' ) {
				foreach ( range( 'A', 'Z' ) as $letter ) {
					$url = add_query_arg( 'letter', $letter, $shop_page_url );
					if ( isset( $shop_page_url )  && !empty( $shop_page_url ) )
						$url = add_query_arg( 'letter', $letter, $shop_page_url );

					$count = '';
					if ( $options['product_count'] == 'yes' && isset( $alphabets[$letter] ) )
						$count = '<span class="wooas-counter">'.$alphabets[$letter].'</span>';

					$active = $cur_letter == $letter ? 'class="active-letter"' : '';
					$html.= '<li><a href="'.$url.'" '.$active.'>'.$letter.$count.'</a></li>';
				}
			}
		//Display only the alphabets having some product.
		else {
			foreach ( $alphabets as $letter => $pcount ) {
				$url = add_query_arg( 'letter', $letter, $shop_page_url );
				if ( isset( $shop_page_url )  && !empty( $shop_page_url ) )
					$url = add_query_arg( 'letter', $letter, $shop_page_url );
				$count = '';
				if ( $options['product_count'] == 'yes' )
					$count = '<span class="wooas-counter">'.$pcount.'</span>';
				$active = $cur_letter == $letter ? 'class="active-letter"' : '';
				$html.= '<li><a href="'.$url.'" '.$active.'>'.$letter.$count.'</a></li>';   }
		}
		if( isset( $_GET['letter'] ) && $options['reset'] == 'yes' ){
			$url = esc_url( remove_query_arg( 'letter', $url ) );
			$html.= '<li class="mg-reset"><a href="'.$url.'"> ' . $options['reset_text'] . '</a></li></ul></div>';
		}
		else
			$html.= '</ul></div>';
		return $html;
	}

	/**
	 * Hook to where clause so that we can inject our condition
	 *
	 * @param sting   $where contains the complete where clause for rendering the page.
	 * @param object  $query contains all query variables along with the tabs.
	 * @return string where clause to render the page
	 *
	 */
	public function posts_where( $where, $query ) {
		global $wpdb;
		$letter = isset( $_GET['letter'] ) ? sanitize_title_for_query( $_GET['letter'] ) : '';
		if( $letter != '' ) {
			$q = "LIKE '".$letter."%' ";
			if ( $letter == '1-9' )
				$q = "REGEXP '^[^a-zA-Z]'";

			if ( !is_admin() && $query->is_main_query() )
				$where = "AND ".$wpdb->posts.".post_title {$q} ".$where;
		}
		return $where;
	}
}
