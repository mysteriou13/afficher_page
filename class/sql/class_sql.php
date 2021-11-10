<?php

class sql{

function __construct(){

$this->create_table_menu();

}

function create_table_menu(){


  global $wpdb;

  $charset_collate = $wpdb->get_charset_collate();

   $table_name = "wp_menu";

  $sql = "CREATE TABLE `menu_page` (
  `id` int NOT NULL,
  `name_menu` text NOT NULL,
  `el_menu` text NOT NULL,
  `link_menu` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
";

  require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );
  dbDelta( $sql );



}

}
?>
