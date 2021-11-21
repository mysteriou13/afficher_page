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

$wpdb->insert('liste_menu', array(
     "name_menu" => $name_menu,
    "status" => "false",


));


}


}

function add_el_menu($name_menu,$link_menu){

    global $wpdb;

   $wpdb->insert('menu_page', array(
       "name_menu" => $name_menu,
      "link_menu" =>  $link_menu,

  ));


}

function liste_page($champs){

global $wpdb;



 $post = "wp_posts";

 $liste_page = $wpdb->get_results("SELECT * FROM  `wp_posts` WHERE post_type = 'page' && post_status = 'publish'");

$tab = [];

foreach ($liste_page as $row) {

$a = $row->post_title;

array_push($tab, $a);


}

return $tab;

}



function liste_page_link_page(){

global $wpdb;



 $post = "wp_posts";

 $liste_page = $wpdb->get_results("SELECT * FROM  `wp_posts` WHERE post_type = 'page' && post_status = 'publish'");

$tab = [];

foreach ($liste_page as $row) {

$a = $row->guid;

array_push($tab, $a);


}

return $tab;

}




function liste_menu(){

global $wpdb;


  $liste_menu = $wpdb->get_results("SELECT * FROM `liste_menu` ");

    echo "<div class = 'box-center'>";

  foreach ($liste_menu as $row) {

  $page = "./admin.php?page=menu-gestion&menu=".$row->name_menu;

 echo "<div class = 'box-link' ><a href ='".$page."'>".$row->name_menu."</a></div>";

  }

  echo "</div>";


  }

  function active_menu($menu){



    global $wpdb;

    $sel = $wpdb->get_results("SELECT id FROM liste_menu");

   foreach ($sel as $key) {

    $id = $key->id;

  $name =  $wpdb->get_results("SELECT name_menu FROM liste_menu WHERE id = $id");

   foreach ($name as $key_menu) {

   if($key_menu->name_menu == $menu){

     $wpdb->update(
      "liste_menu",
      // SET (valeur)
      array(
      'status' => 'true',
      ),

      // WHERE (valeur)
      array(
      'name_menu' => $key_menu->name_menu,
      ),

      );


   }else{


     $wpdb->update(
      "liste_menu",
      // SET (valeur)
      array(
      'status' => 'false',
      ),
      // WHERE (valeur)
      array(
      'name_menu' => $key_menu->name_menu,
      ),

      );



   }

   }

  }


  }



}
?>
