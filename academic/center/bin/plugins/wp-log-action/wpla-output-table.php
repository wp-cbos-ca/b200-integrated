<?php
//Our class extends the WP_List_Table class, so we need to make sure that it's there
if(!class_exists('WP_List_Table')){
    require_once( ABSPATH . 'wp-admin/includes/class-wp-list-table.php' );
}

/**
 * A WP List Table for displaying the options.
 * use http://wpengineer.com/2426/wp_list_table-a-step-by-step-guide/
 */
class WPLA_Options_Table extends WP_List_Table {

    /**
     * Constructor, we override the parent to pass our own arguments
     * We usually focus on three parameters: singular and plural labels, as well as whether the class supports AJAX.
     */
     function __construct() {
         parent::__construct( array(
        'singular'=> 'wp_list_text_link', //Singular label
        'plural' => 'wp_list_test_links', //plural label, also this well be one of the table css class
        'ajax'  => false //We won't support Ajax for this table
        ) );
     }

    /**
     * Add extra markup in the toolbars before or after the list
     * @param string $which, helps you decide if you add the markup after (bottom) or before (top) the list
     */
    function extra_tablenav( $which ) {
        if ( $which == "top" ) {
            echo '<div class="clear"><div class="wpla-filters">';
            $this->filter_box();
            $this->date_boxes();
            $this->search_box( 'Filter', 'wpla-options' );
            echo '</div>';
        }
        if ( $which == "bottom" ) {
        }
    }

    /**
     * Define the columns that are going to be used in the table
     * @return array $columns, the array of columns to use with the table
     */
    function get_columns() {
        $wpla = WPLA_Logger::get_instance();
        $columns = array( 'cb' => '<input type="checkbox" />' );
        return array_merge( $columns, $wpla->get_columns() );
    }

    /**
     * Decide which columns to activate the sorting functionality on
     * @return array $sortable, the array of columns that can be sorted by the user
     */
    public function get_sortable_columns() {
        return $sortable = array(
            'log_time'      => array('log_time', false),
            'log_type'      => array('log_type', false),
            'log_label'      => array('log_label', false)
        );
    }

    /**
     * Handle any bulk actions using current_action.
     */
    function handle_actions() {
        global $wpdb;
        $wpla = WPLA_Logger::get_instance();
        switch ($this->current_action()) {
            case 'delete':
                if (!empty($_POST['ids'])) {
                    $wpla->delete( array( 'ids' => $_POST['ids'] ) );
                }
            break;
            case 'delete_all':
                if ( empty( $_POST['ids'] ) ) { //nothing checked
                    $wpla->delete( array( 'delete_all' => true ) );
                }
            break;
            default:
                $this_action = $this->current_action();
                if ( stripos( $this_action, 'delete_' ) == 0 ) {
                    $log_type = substr( $this_action, 7 );
                    $all_types = $wpla->get_log_types();
                    if ( in_array( $log_type, $all_types) ) {
                        $wpla->delete( array( 'log_type' => $log_type ) );
                    }
                }
            break;          
        }
    }

    /**
     * Prepare the table with different parameters, pagination, columns and table elements
     */
    function prepare_items() {
        global $wpdb, $_wp_column_headers;
        $screen = get_current_screen();


        /* -- Handle any Actions */
        $this->handle_actions();

        /* -- Preparing your query -- */
        $wpla = WPLA_Logger::get_instance();
        $args = $_POST;
        if ( isset( $args['ids'] ) ) {
            unset( $args['ids'] );
        }
        if ( !empty( $_GET['orderby'] ) ) {
            $args['orderby'] = $_GET['orderby'];
        }
        if ( !empty( $_GET['order'] ) ) {
            $args['order'] = $_GET['order'];
        }
        if ( !empty( $_GET['paged'] ) ) {
            $args['paged'] = $_GET['paged'];
        }

        $ret = $wpla->get_results( $args );

        /* -- Register the pagination -- */
        //The pagination links are automatically built according to these parameters
        $this->set_pagination_args( array(
            "total_items" => $ret['total_items'],
            "total_pages" => $ret['total_pages'],
            "per_page" => $ret['per_page'],
        ) );

        /* -- Register the Columns -- */
        $columns = $this->get_columns();
        $hidden = array();
        $sortable = $this->get_sortable_columns();
        $this->_column_headers = array($columns, $hidden, $sortable);

        /* -- Set the items -- */
        $this->items = $ret['results'];
    }

    /**
     * How to display each column
     */
    function column_default( $item, $column_name ) {
      global $allowedtags;
      switch( $column_name ) { 
        case 'log_time':
            return $this->mysql2blog_date( $item->$column_name, 'Y-m-d H:i:s' );
        case 'log_type':
        case 'log_label':
            return $item->$column_name;
        case 'log_value':
            // use kint later
            $val = maybe_unserialize( $item->$column_name );
            if ( is_array( $val ) || is_object( $val ) ) {
                return '<pre>' . print_r( wp_kses_post_deep( $val ), true ) . '</pre>';
            }
            return wp_kses( $val, $allowedtags );
        default:
            return '';
      }
    }

    /**
     * Define some bulk actions
     */
    function get_bulk_actions() {
        $actions = array(
            'delete'     => 'Delete selected'
        );

        $wpla = WPLA_Logger::get_instance();
        $all_types = $wpla->get_log_types();
        foreach ( $all_types as $type ) {
          $actions['delete_' . $type] = 'Delete all ' . ucfirst( $type );
        }
        $actions['delete_all'] = 'Delete ALL';
        return $actions;
    }

    /**
     * The checkbox column
     */
    function column_cb($item) {
        return sprintf(
            '<input type="checkbox" name="ids[]" value="%d" />', $item->ID
        );    
    }

    /**
     * Show the date boxes filter.
     */
    public function date_boxes() {
        $log_time_start = isset( $_POST['log_time_start'] ) ? $_POST['log_time_start'] : '';
        $log_time_end = isset( $_POST['log_time_end'] ) ? $_POST['log_time_end'] : '';
?>
    <div class="alignleft actions prefix-filter-box">
        <input type="text" name="log_time_start" value="<?php echo $log_time_start; ?>" autocomplete="off" class="datepicker" placeholder="Start Date"> - 
        <input type="text" name="log_time_end" value="<?php echo $log_time_end; ?>" autocomplete="off" class="datepicker" placeholder="End Date">
    </div>
        
<?php
    }


    /**
     * Override parent to display the search box even when no items are found.
     *
     * @since 3.1.0
     * @access public
     *
     * @param string $text The search button text
     * @param string $input_id The search input id
     */
    public function search_box( $text, $input_id ) {
        // if ( empty( $_REQUEST['s'] ) && !$this->has_items() )
            // return;

        $input_id = $input_id . '-search-input';

        if ( ! empty( $_REQUEST['orderby'] ) )
            echo '<input type="hidden" name="orderby" value="' . esc_attr( $_REQUEST['orderby'] ) . '" />';
        if ( ! empty( $_REQUEST['order'] ) )
            echo '<input type="hidden" name="order" value="' . esc_attr( $_REQUEST['order'] ) . '" />';
        if ( ! empty( $_REQUEST['post_mime_type'] ) )
            echo '<input type="hidden" name="post_mime_type" value="' . esc_attr( $_REQUEST['post_mime_type'] ) . '" />';
        if ( ! empty( $_REQUEST['detached'] ) )
            echo '<input type="hidden" name="detached" value="' . esc_attr( $_REQUEST['detached'] ) . '" />';
?>
<p class="search-box">
    <label class="screen-reader-text" for="<?php echo $input_id ?>"><?php echo $text; ?>:</label>
    <input type="search" id="<?php echo $input_id ?>" name="s" value="<?php _admin_search_query(); ?>" placeholder="Filter by Name"/>
    <?php submit_button( $text, 'button', '', false, array('id' => 'search-submit') ); ?>
</p>
<?php
    }

    /**
     * Show a filter box for the different types.
     */
    function filter_box() {
        $wpla = WPLA_Logger::get_instance();
        $all_types = $wpla->get_log_types();
        $selected_option = isset( $_POST['log_type'] ) ? $_POST['log_type'] : '';
    ?>
    <div class="alignleft actions prefix-filter-box">
        <select name="log_type" class="wpla-log-types">
            <option value="">All Log Types</option>
            <?php foreach( $all_types as $type ) : ?>
            <option value="<?php echo $type; ?>" <?php selected($selected_option, $type); ?>><?php echo ucfirst( strtolower( $type ) ); ?></option>
            <?php endforeach; ?>
        </select>
    </div>
    <?php
    }

    /**
     * Wrapper function to return the timestamp according to the blog timezone.
     * @param string $mysql_datetime_string   A date string in the format 'Y-m-d H:i:s'
     * @param string $format (optional) The requested output format in PHP date format
     * @return 
     */
    function mysql2blog_date( $mysql_datetime_string, $format = '' ) {
        $timestamp = mysql2date( 'U', $mysql_datetime_string );
        $blog_timestamp = $this->utc_to_blogtime( $timestamp );
        $f = !empty( $format ) ? $format : get_option( 'date_format' );
        return date_i18n( $f, $blog_timestamp );    
    }

    /**
     * Return a timestamp in the blog's timezone give a timestamp from UTC 
     * From http://www.skyverge.com/blog/down-the-rabbit-hole-wordpress-and-timezones/
     * example:
     * $timestamp = mysql2date( 'U', $mysql_datetime_string );
     * $blog_timestamp = $this->utc_to_blogtime( $timestamp );
     * echo date_i18n( get_option( 'date_format' ), $blog_timestamp );
     */
    function utc_to_blogtime( $timestamp ) {
        try {
            // get datetime object from unix timestamp
            $datetime = new DateTime( "@{$timestamp}", new DateTimeZone( 'UTC' ) );
         
            // set the timezone to the site timezone
            $datetime->setTimezone( new DateTimeZone( $this->get_timezone_string() ) );
         
            // return the unix timestamp adjusted to reflect the site's timezone
            return $timestamp + $datetime->getOffset();
         
        } catch ( Exception $e ) {
             
            // something broke
            return 0;
        }
    }

    /**
     * Returns the timezone string for a site, even if it's set to a UTC offset
     *
     * From http://www.skyverge.com/blog/down-the-rabbit-hole-wordpress-and-timezones/
     *
     * @return string valid PHP timezone string
     */
    function get_timezone_string() {
     
        // if site timezone string exists, return it
        if ( $timezone = get_option( 'timezone_string' ) )
            return $timezone;
     
        // get UTC offset, if it isn't set then return UTC
        if ( 0 === ( $utc_offset = get_option( 'gmt_offset', 0 ) ) )
            return 'UTC';
     
        // adjust UTC offset from hours to seconds
        $utc_offset *= 3600;
     
        // attempt to guess the timezone string from the UTC offset
        $timezone = timezone_name_from_abbr( '', $utc_offset );
     
        // last try, guess timezone string manually
        if ( false === $timezone ) {
     
            $is_dst = date( 'I' );
     
            foreach ( timezone_abbreviations_list() as $abbr ) {
                foreach ( $abbr as $city ) {
                    if ( $city['dst'] == $is_dst && $city['offset'] == $utc_offset )
                        return $city['timezone_id'];
                }
            }
        }
     
        // fallback to UTC
        return 'UTC';
    }

}   


