
<?php

/*
Plugin Name: affiche
Plugin URI: https://mon-siteweb.com/
Description: Ceci est mon premier plugin
Author: Mon nom et prénom ou celui de ma société
Version: 1.0
Author URI: http://mon-siteweb.com/
*/




function menu_page(){

  add_action( "admin_menu", "montheme_ajouter_menu_tableau_de_bord" );

  function montheme_ajouter_menu_tableau_de_bord() {

     add_menu_page(

        __( "Mon thème - Configuration", "montheme" ), // texte de la balise <title>

        __( "menu page", "montheme" ),  // titre de l'option de menu

        "manage_options", // droits requis pour voir l'option de menu

        "menu-gestion", // slug

        "montheme_creer_page_configuration" // fonction de rappel pour créer la page

     );

  }



}


menu_page();

function afficher(){

  global $wpdb;


   $afficher = 22;

   if(isset($_GET['preview_id'])){

   $afficher = $_GET['preview_id'];

 }


 if(isset($_GET['page_id'])){

$afficher =  $_GET['page_id'];

 }


  if(isset($_GET['p'])){

 $afficher =  $_GET['p'];

  }



$results = $wpdb->get_results("SELECT * FROM wp_posts where id = $afficher");

foreach($results as $row)
{

  echo "<h1>".$row->post_title."</h1>";
  echo $row->post_content;
    // do stuff with $row here.
}

}

?>
