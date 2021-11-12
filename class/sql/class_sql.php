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
  `id` INT NOT NULL AUTO_INCREMENT,
  `name_menu` text NOT NULL,
  `el_menu` text NOT NULL,
  `link_menu` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
";

  require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );
  dbDelta( $sql );


}

function create_menu($name_menu,$el_menu,$link_menu){

  global $wpdb;


$ipquery = $wpdb->get_results("SELECT * FROM menu_page WHERE  name_menu = $name_menu ");

 if(!empty($ipquery)){


}else{


$wpdb->insert('menu_page', array(
     "name_menu" => $name_menu,
    "el_menu" => $el_menu,
    "link_menu" =>  $link_menu,

));

}


}

function liste_page($prefix){

global $wpdb;


$post = $prefix."posts";

$liste_page = $wpdb->get_results("SELECT * FROM $post WHERE post_type = 'page' && post_status = 'publish'");

foreach ($liste_page as $row) {

 $row->guid;

}

}

function liste_menu(){

global $wpdb;


  $liste_menu = $wpdb->get_results("SELECT * FROM `menu_page` ");

    echo "<div class = 'box-center'>";

  foreach ($liste_menu as $row) {

  $page = "./admin.php?page=menu-gestion&menu=".$row->name_menu;

 echo "<div><a href ='".$page."'>".$row->name_menu."</a></div>";

  }

  echo "</div>";


  }



}
?>
