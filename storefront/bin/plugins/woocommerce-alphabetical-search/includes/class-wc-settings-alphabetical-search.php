<?php
/**
 * WooCommerce Alphabetical Search Settings
 *
 * @author   Magnigenie
 * @category  Admin
 * @version     1.0
 */

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

if (  class_exists( 'WC_Settings_Page' ) ) :

	/**
	 * WC_Settings_Accounts
	 */
	class WC_Alphabetical_Search extends WC_Settings_Page {

	/**
	 * Constructor.
	 */
	public function __construct() {
		$this->id    = 'alpha_search';
		$this->label = __( 'Alhpabetical Search', 'wooas' );
		add_filter( 'woocommerce_settings_tabs_array', array( $this, 'add_settings_page' ), 20 );
		add_action( 'woocommerce_settings_' . $this->id, array( $this, 'output' ) );
		add_action( 'woocommerce_settings_save_' . $this->id, array( $this, 'save' ) );
	}
	/**
	 * Get settings array
	 *
	 * @return array
	 */
	public function get_settings() {

		return apply_filters( 'woocommerce_' . $this->id . '_settings', array(

				array( 'title' => __( 'Woocommerce Alphabetical Search', 'wooas' ), 'type' => 'title', 'desc' => '', 'id' => 'alphabetical_search_title' ),
				array(
					'title'    => __( 'Automatic Placement', 'wooas' ),
					'desc'    => __( 'If you want the plugin to  bring the alphabets on top of your shop pages then tick this option. Alternatively you can use <code style="background:#333;color:#fff;"><b>[woo_alphabetical_search]</b></code> shortcode on any post/page or widget.', 'wooas' ),
					'type'     => 'checkbox',
					'id'    => 'wooas[placement]',
					'default'    => 'no'
				),
				array(
					'title'    => __( 'Enable numbers', 'wooas' ),
					'desc'    => __( 'If you activate this option then it will add a # symbol to the list of alphabets in order to filter the results which starts with a number.', 'wooas' ),
					'type'     => 'checkbox',
					'id'    => 'wooas[numbers]',
					'default'    => 'yes'
				),
				array(
					'title'    => __( 'Display product count', 'wooas' ),
					'desc'    => __( 'Display product count for each alphabet you take your mouse over it.', 'wooas' ),
					'type'     => 'checkbox',
					'id'    => 'wooas[product_count]',
					'default'    => 'yes'
				),
				array(
					'title'  => __( "Display alphabets which has some products", 'wooas' ),
					'type'   => 'checkbox',
					'desc'    => __( 'Display only those alphabets which has some products.', 'wooas' ),
					'id'  => 'wooas[alphabets]',
					'default'  => 'no'
				),
				array(
					'title'  => __( "Opaque letters having no products", 'wooas' ),
					'type'   => 'checkbox',
					'desc'    => __( 'Make alphabets not clickable and opaque if there is no product available which starts with the specific alphabets.', 'wooas' ),
					'id'  => 'wooas[opaque]',
					'default'  => 'no'
				),
				array(
					'title'    => __( 'Enable reset', 'wooas' ),
					'desc'    => __( 'Display a link to reset the current letter filter.', 'wooas' ),
					'type'     => 'checkbox',
					'id'    => 'wooas[reset]',
					'default'    => 'yes'
				),
				array(
					'title'    => __( 'Reset Text', 'wooas' ),
					'desc'     => __( 'Enter the text which you want to display for the reset link.', 'wooas' ),
					'id'     => 'wooas[reset_text]',
					'type'     => 'text',
					'css'    => 'width:200px',
					'default'   => 'Reset',
					'desc_tip'   =>  true
				),
				array(
					'title'    => __( 'Text above the alphabets', 'wooas' ),
					'desc'     => __( 'Enter the text which you want to appear above the alphabets. This option is only used for the auto placement of the alphabets.', 'wooas' ),
					'id'     => 'wooas[text]',
					'type'     => 'text',
					'css'    => 'width:400px',
					'default'   => 'Filter products by alphabets',
					'desc_tip'   =>  true
				),
				array(
					'title'    => __( 'Background color', 'wooas' ),
					'desc'     => __( 'Select background color for the alphabets.', 'wooas' ),
					'id'     => 'wooas[background]',
					'type'     => 'color',
					'css'    => 'width:100px',
					'default'   => '#14a085',
					'desc_tip'   =>  true
				),
				array(
					'title'   => __( 'Hover/Active background color', 'wooas' ),
					'desc'    => __( 'Select background color for the hover/active alphabet.', 'wooas' ),
					'type'    => 'color',
					'css'    => 'width:100px',
					'id'   => 'wooas[hover_background]',
					'default'   => '#6f6f6f',
					'desc_tip'   =>  true
				),
				array(
					'title'    => __( 'Text color', 'wooas' ),
					'desc'    => __( 'Text color for the alphabets.', 'wooas' ),
					'type'     => 'color',
					'css'    => 'width:100px',
					'id'    => 'wooas[text_color]',
					'default'    => '#fff',
					'desc_tip'   =>  true
				),
				array(
					'title'    => __( 'Text hover/active color', 'wooas' ),
					'desc'     => __( 'Text color for hover/active state of an alphabet.', 'wooas' ),
					'id'     => 'wooas[text_hover]',
					'css'    => 'width:100px',
					'type'     => 'color',
					'default'   => '#fff',
					'desc_tip'   =>  true
				),
				array(
					'title'    => __( 'Counter background color', 'wooas' ),
					'desc'     => __( 'Background color for the item count tooltip.', 'wooas' ),
					'id'     => 'wooas[count_bg]',
					'type'     => 'color',
					'css'    => 'width:100px',
					'default'   => '#FF0000',
					'desc_tip'   =>  true
				),
				array(
					'title'    => __( 'Counter text color', 'wooas' ),
					'desc'     => __( 'Text color for product count for each alphabet.', 'wooas' ),
					'id'     => 'wooas[count_text]',
					'type'     => 'color',
					'css'    => 'width:100px',
					'default'   => '#fff',
					'desc_tip'   =>  true
				),
				array(
					'title'    => __( 'Alphabet height (in px)', 'wooas' ),
					'desc'     => __( 'Height for each alphabet container.', 'wooas' ),
					'id'     => 'wooas[alpha_height]',
					'type'     => 'number',
					'css'    => 'width:100px',
					'default'   => '30',
					'desc_tip'   =>  true
				),
				array(
					'title'    => __( 'Alphabet Width (in px)', 'wooas' ),
					'desc'     => __( 'Width for the alphabet container.', 'wooas' ),
					'id'     => 'wooas[alpha_width]',
					'type'     => 'number',
					'css'    => 'width:100px',
					'default'   => '30',
					'desc_tip'   =>  true
				),
				array(
					'title'    => __( 'Alphabet font size (in px)', 'wooas' ),
					'desc'     => __( 'Font size for each alphabet.', 'wooas' ),
					'id'     => 'wooas[alpha_font]',
					'type'     => 'number',
					'css'    => 'width:100px',
					'default'   => '14',
					'desc_tip'   =>  true
				),
				array(
					'title'    => __( 'Counter height (in px)', 'wooas' ),
					'desc'     => __( 'Height for the product count tooltip.', 'wooas' ),
					'id'     => 'wooas[count_height]',
					'type'     => 'number',
					'css'    => 'width:100px',
					'default'   => '18',
					'desc_tip'   =>  true
				),
				array(
					'title'    => __( 'Counter width (in px)', 'wooas' ),
					'desc'     => __( 'Width for product count tooltip.', 'wooas' ),
					'id'     => 'wooas[count_width]',
					'type'     => 'number',
					'css'    => 'width:100px',
					'default'   => '18',
					'desc_tip'   =>  true
				),
				array(
					'title'    => __( 'Counter font size (in px)', 'wooas' ),
					'desc'     => __( 'Font Size for the product counter text', 'wooas' ),
					'id'     => 'wooas[count_font]',
					'type'     => 'number',
					'css'    => 'width:100px',
					'default'   => '11',
					'desc_tip'   =>  true
				),
				array(
					'title'    => __( 'Horizontal space between alphabets(in px)', 'wooas' ),
					'desc'     => __( 'Enter a value for the horizontal space between each alphabet.', 'wooas' ),
					'id'     => 'wooas[horz_space]',
					'type'     => 'number',
					'css'    => 'width:100px',
					'default'   => '5',
					'desc_tip'   =>  true
				),
				array(
					'title'    => __( 'Vertical space between alphabets(in px)', 'wooas' ),
					'desc'     => __( 'Enter a value for the vertical space between each alphabet.', 'wooas' ),
					'id'     => 'wooas[vert_space]',
					'type'     => 'number',
					'css'    => 'width:100px',
					'default'   => '5',
					'desc_tip'   =>  true
				),
				array( 'type' => 'sectionend', 'id' => 'simple_auction_options' ),

			) ); // End pages settings
	}
}
return new WC_Alphabetical_Search();

endif;