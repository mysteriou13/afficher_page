
<?php

/*
Plugin Name: affiche
Plugin URI: https://mon-siteweb.com/
Description: Ceci est mon premier plugin
Author: Mon nom et prénom ou celui de ma société
Version: 1.0
Author URI: http://mon-siteweb.com/
*/

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
