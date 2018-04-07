<?php

require_once( WPLA_DIR . '/WPLA_Log_Level.php' );

class WPLA_Logger {

    private $table_name;
    private $timestamp;
    private $counter;
    private $previous_label;

    public $tmp_debug_query_label;

    /**
     * Singleton instance
     * @return WPLA_Logger
     */
    public static function get_instance() {
        static $inst = null;
        if ( $inst == null ) {
            $inst = new WPLA_Logger();
        }
        return $inst;
    }
    private function __construct() {
        global $table_prefix;
        $this->table_name = $table_prefix . 'wpla_logs';
    }

    /**
     * System is unusable.
     *
     * @param string $label
     * @param mixed  $value
     */
    public static function emergency( $label, $value ) {
        $wpla = WPLA_Logger::get_instance();
        $wpla->log( WPLA_Log_Level::EMERGENCY, $label, $value );
    }

    /**
     * Action must be taken immediately.
     *
     * Example: Entire website down, database unavailable, etc. This should
     * trigger the something to wake you up.
     *
     * @param string $label
     * @param mixed  $value
     */
    public static function alert( $label, $value ) {
        $wpla = WPLA_Logger::get_instance();
        $wpla->log( WPLA_Log_Level::ALERT, $label, $value );
    }

    /**
     * Critical conditions.
     *
     * Example: Application component unavailable, unexpected exception.
     *
     * @param string $label
     * @param mixed  $value
     */
    public static function critical( $label, $value ) {
        $wpla = WPLA_Logger::get_instance();
        $wpla->log( WPLA_Log_Level::CRITICAL, $label, $value );
    }

    /**
     * Runtime errors that do not require immediate action but should typically
     * be logged and monitored.
     *
     * @param string $label
     * @param array  $value
     */
    public static function error( $label, $value ) {
        $wpla = WPLA_Logger::get_instance();
        $wpla->log( WPLA_Log_Level::ERROR, $label, $value );
    }

    /**
     * Exceptional occurrences that are not errors.
     *
     * Example: Use of deprecated APIs, poor use of an API, undesirable things
     * that are not necessarily wrong.
     *
     * @param string $label
     * @param array  $value
     */
    public static function warning( $label, $value ) {
        $wpla = WPLA_Logger::get_instance();
        $wpla->log( WPLA_Log_Level::WARNING, $label, $value );
    }

    /**
     * Normal but significant events.
     *
     * @param string $label
     * @param array  $value
     */
    public static function notice( $label, $value ) {
        $wpla = WPLA_Logger::get_instance();
        $wpla->log( WPLA_Log_Level::NOTICE, $label, $value );
    }

    /**
     * Interesting events.
     *
     * Example: User logs in, SQL logs.
     *
     * @param string $label
     * @param array  $value
     */
    public static function info( $label, $value ) {
        $wpla = WPLA_Logger::get_instance();
        $wpla->log( WPLA_Log_Level::INFO, $label, $value );
    }

    /**
     * Detailed debug information.
     *
     * @param string $label
     * @param array  $value
     */
    public static function debug( $label, $value ) {
        $wpla = WPLA_Logger::get_instance();
        $wpla->log( WPLA_Log_Level::DEBUG, $label, $value );
    }

    /**
     * Return columns and names
     */
    public function get_columns() {
        return array(
            'log_time'          =>__('Date'),
            'log_type'          =>__('Type'),
            'log_label'         =>__('Label'),
            'log_value'         =>__('Value')
        );
    }

    /**
     * Return all possible log levels
     * @return array All log levels.
     */
    public function get_log_types() {
        return array(
            WPLA_Log_Level::EMERGENCY,
            WPLA_Log_Level::ALERT,
            WPLA_Log_Level::CRITICAL,
            WPLA_Log_Level::ERROR,
            WPLA_Log_Level::WARNING,
            WPLA_Log_Level::NOTICE,
            WPLA_Log_Level::INFO,
            WPLA_Log_Level::DEBUG
        );
    }

    /**
     * Save the log
     */
    public function log( $log_type, $label, $value ) {
        global $wpdb;

        $now = current_time( 'timestamp' );
        if ( !empty( $this->timestamp ) ) {
            if ( $now == $this->timestamp && $this->previous_label == $label ) {
                if ( !isset( $this->counter ) ) {
                    $this->counter = 0;
                }
                $this->counter++;
                $label .= '_' . $this->counter;
            }
            else {
                $this->counter = 0;
            }
        }
        $this->timestamp = $now;
        $this->previous_label = $label;

        $serialized_value = maybe_serialize( $value );
        $result = $wpdb->insert( $this->table_name, array(
            'log_type'     => $log_type,
            'log_label'    => $label,
            'log_value'    => $serialized_value,
            'log_time'     => current_time( 'mysql', 1 )
        ) );
    }

    /**
     * Displays all methods that will be called for a $hook_name.  Hooks can be either actions of filters.
     * Use WPLA_Logger::debug_hook( 'init' );
     */
    public static function debug_hook( $hook_name ) {
        global $wp_filter;
        $value = 'not set';
        if ( isset( $wp_filter[$hook_name] ) ) {
            $value = $wp_filter[$hook_name];
        }
        WPLA_Logger::debug( $hook_name, $value );
    }

    /**
     * Add a filter to log WordPress queries.
     */
    public static function debug_query_start( $label ) {
        $wpla = WPLA_Logger::get_instance();
        $wpla->tmp_debug_query_label = $label;
        add_filter( 'query', array( $wpla, 'log_query' ) );
    }

    /**
     * Log the query.
     */
    public static function log_query( $query ) {
        //stop it for now so we don't log ourself
        $wpla = WPLA_Logger::get_instance();
        $wpla->debug_query_stop();
        $wpla->log( WPLA_Log_Level::DEBUG, $wpla->tmp_debug_query_label, $query );
        $wpla->debug_query_start( $wpla->tmp_debug_query_label );
        return $query;
    }

    /**
     * Stop logging queries by removing the filter.
     */
    public function debug_query_stop() {
        remove_filter( 'query', array( $this, 'log_query' ) );
    }

    /**
     * Delete logs based on the args.
     * @param $args {
     *  @type int|array  $ids              The id or ids to delete.
     *  @type string     $log_type         The log_type to delete
     *  @type string     $s                The log_label to delete
     *  @type string     $log_time_start   The earliest log to delete.
     *  @type string     $log_time_end     The latest log to delete.
     * }
     */
    public function delete( $args ) {
        global $wpdb;
        $r = wp_parse_args( $args, array(
            'ids'            => '',
            's'              => '', 
            'log_type'       => '',
            'paged'          => '',
            'log_time_start' => '',
            'log_time_end'   => '',
            'delete_all'     => false
        ) );
        $query = "delete from {$this->table_name} ";
        $query_where = $this->get_where_query( $r );
        if ( empty( $r['delete_all'] ) && empty( $query_where ) ) {
            //not expecting to delete all, but the query says to delete all.
            return;
        }
        $wpdb->query( $query . $query_where );
    }

    /**
     * Return the results in an array with the total.
     * @param array  $args  Query args.
     * @return array with keys 'total_items', 'total_pages', 'per_page', 'results'.
     */
    public function get_results( $args ) {
        global $wpdb;
        $r = wp_parse_args( $args, array(
            's'              => '', //search
            'log_type'       => '',
            'paged'          => '',
            'log_time_start' => '',
            'log_time_end'   => '',
            'items_per_page' => 25,
            'orderby'        => 'ID',
            'order'          => 'DESC'
        ) );

        $query = " from {$this->table_name} ";
        $query .= $this->get_where_query( $r );

        $items_per_page = absint( $r['items_per_page'] );
        $total_items = $wpdb->get_var( "select count(*) " . $query );
        $total_pages = ceil( $total_items / $r['items_per_page'] );

        if ( !empty( $r['orderby'] ) ) {
            $orderby = $r['orderby'];
            $columns = array_keys( $this->get_columns() );
            if ( $orderby === 'ID' || in_array( $orderby, $columns ) ) {
                $order = strtolower( $r['order'] ) == 'asc' ? 'ASC' : 'DESC';
                $query .= " ORDER BY $orderby $order ";
            }
        }
        if ( !empty( $r['paged'] ) && !empty( $items_per_page ) ) {
            $paged = absint( $r['paged'] );
            $offset = ( $paged - 1 ) * $items_per_page;
            $query .= ' LIMIT '. $offset . ', ' . $items_per_page;
        }

        return array( 
            "total_items" => $total_items,
            "total_pages" => $total_pages,
            "per_page" => $items_per_page,
            'results' => $wpdb->get_results( "select * " . $query )
        );
    }

    /**
     * Based on the args passed in, returns the WHERE part of the sql query.
     * @param  See get_results for parameters
     * @return string   The where part of the sql query.
     */
    private function get_where_query( $r ) {
        global $wpdb;
        $default_where = " where ( 1=1 ) ";
        $query_where = $default_where;
        if ( !empty( $r['s'] ) ) {
            $term_like_escaped = $wpdb->esc_like( trim( $r['s'] ) );
            $prepared = $wpdb->prepare( '%s', $term_like_escaped );
            $prepared_wild = $wpdb->prepare( '%s', '%' . $term_like_escaped . '%' );
            $query_where .= " and ( log_label like $prepared_wild ) ";
        }

        if ( !empty( $r['log_type'] ) ) {
            $log_type = $r['log_type'];
            if ( in_array( $log_type, $this->get_log_types() ) ) {
                $query_where .= $wpdb->prepare( " and ( log_type = %s ) ", $log_type );
            }
        }

        if ( !empty( $r['log_time_start'] ) ) {
            $time = strtotime( $r['log_time_start'] );
            if ( $time !== false ) {
                $query_where .= $wpdb->prepare( " and ( log_time >= %s ) ", date( 'Y-m-d 00:00:00', $time ) );
            }
        }

        if ( !empty( $r['log_time_end'] ) ) {
            $time = strtotime( $r['log_time_end'] );
            if ( $time !== false ) {
                $query_where .= $wpdb->prepare( " and ( log_time <= %s ) ", date( 'Y-m-d 23:59:59', $time ) );
            }
        }

        if ( !empty( $r['ids'] ) ) {
            if ( !is_array( $r['ids'] ) ) {
                $ids = array( $r['ids'] );
            }
            else {
                $ids = $r['ids'];
            }
            $ids = array_map( 'intval', $ids );
            $query_where .= " and ( ID IN ( " . implode( ',', $ids ) . " ) ) ";
        }

        if ( $query_where == $default_where ) {
            return '';
        }

        return $query_where;
    }

    /**
     * Setup the table.
     */
    public function setup_table() {
        require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );

        $sql = "CREATE TABLE {$this->table_name} (
            ID bigint(20) unsigned NOT NULL AUTO_INCREMENT,
            log_type varchar(20) NOT NULL,
            log_label varchar(255),
            log_value longtext,
            log_time DATETIME NOT NULL,
            PRIMARY KEY  (ID),
            KEY log_type (log_type)
            )
            ENGINE = innodb CHARACTER SET utf8 COLLATE utf8_general_ci;";

        dbDelta( $sql );
    }

    /**
     * Drop the table.
     */
    public function teardown_table() {
        global $wpdb;
        $wpdb->query( "DROP TABLE IF EXISTS {$this->table_name}");
    }

}