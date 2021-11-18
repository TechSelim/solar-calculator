<?php

if ( !class_exists('WP_List_Table') ) {
    require_once(ABSPATH . 'wp-admin/includes/class-wp-list-table.php');
}

class WPlist_table extends  WP_List_Table{

    /** Class constructor */
    public function __construct()
    {

        parent::__construct([
            'singular' => __('Requests', 'solar-calculator'), 
            'plural'   => __('Requests', 'solar-calculator'),
            'ajax'     => true 

        ]);
    }

    function get_columns()
    {
        $columns = array(
            'cb'        => 'CB',
            'name'      => 'Name',
            'email'     => 'Email',
            'phone'     => 'Phone',
            'post_code2' => 'Post Code',
            'address'   => 'Address'
        );
        return $columns;
    }

    function prepare_items(){

        $pageNum = $this->get_pagenum();
        $perPage = 10;

        $columns = $this->get_columns();
        $this->set_pagination_args([
            'total_items' => $this->get_total_row(), 
            'per_page'    => $perPage 
        ]);
            
        
        
        $hidden = array();
        $sortable = array();
        $this->_column_headers = array($columns, $hidden, $sortable);
        $this->items = $this->get_my_data($pageNum, $perPage);
    }

    function column_default($item, $column_name)
    {
        switch ($column_name) {
            case 'name':
            case 'email':
            case 'phone':
            case 'post_code2':
            case 'address':
                return $item[$column_name];
            default:
                return print_r($item, true); 
        }
    }

    function column_name( $item )
    {
        $actions = array(
            'view' => sprintf('<a href="?page=%s&action=%s&id=%s">View</a>', $_REQUEST['page'], 'view', $item['id']),
            'delete' => sprintf( '<a href="%s" onclick="return confirm(\'Are you sure?\');" title="%s">%s</a>', 
            wp_nonce_url( admin_url( 'admin-post.php?action=request_delete&id=' . $item['id'] ), 'solar-delete' ), $item['id'], __( 'Delete', 'solar-calculator' ), __( 'Delete', 'solar-calculator' ) )
        );
        return sprintf('%1$s %2$s', $item['name'], $this->row_actions($actions));
    }

    function get_my_data($offset, $perPage){
        global $wpdb;
        $offset = ($offset - 1) * $perPage;
        return $wpdb->get_results("SELECT * FROM {$wpdb->prefix}calculate ORDER BY id DESC limit $offset, $perPage", 'ARRAY_A');
    }
    function column_cb($item)
    {
        return sprintf(
            '<input type="checkbox" name="bulk-delete[]" value="%s" />',
            $item['id']
        );
    }
    function get_total_row(){
        global $wpdb;
        return $wpdb->get_var("SELECT COUNT(id) FROM {$wpdb->prefix}calculate");
    }
    
}