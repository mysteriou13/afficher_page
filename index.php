

<?php

$p = get_theme_root();


$resStr = str_replace('themes', 'plugins', $p);

 $link = $resStr."/afficher_page";

 $sql = $resStr."/afficher_page/class/sql/class_sql.php";



include($sql);

$class_sql = new sql();




?>

<style>
<?php

include($link."/style.css");

?>

</style>

<?php

/*
Plugin Name: affiche
Plugin URI: https://mon-siteweb.com/
Description: Ceci est mon premier plugin
Author: Mon nom et prénom ou celui de ma société
Version: 1.0
Author URI: http://mon-siteweb.com/
*/




if(isset($_POST['titre_menu'])){


  $class_sql->create_menu($_POST['titre_menu'],$_POST['el_menu'],"test_menu");


}




function menu_page(){

  $sql = $resStr."/afficher_page/class/sql/class_sql.php";

 include($sql);

 $class_sql = new sql();

  add_action( "admin_menu", "montheme_ajouter_menu_tableau_de_bord" );

  function montheme_ajouter_menu_tableau_de_bord() {

     add_menu_page(

        __( "Mon thème - Configuration", "montheme" ), // texte de la balise <title>

        __( "menu en tete"),  // titre de l'option de menu

        "manage_options", // droits requis pour voir l'option de menu

        "menu-gestion", // slug

        "montheme_creer_page_configuration"
     // fonction de rappel pour créer la page

     );
}

$p = get_theme_root();


$resStr = str_replace('themes', 'plugins', $p);

  if(isset($_GET['page']) && !empty($_GET['page'])){

   $file = htmlspecialchars($_GET['page']);

  $page = $resStr."/afficher_page/template/".$file.".php";

  include($page);

  include($file);



  include($resStr."/afficher_page/template/el_menu.php");


}

 if(isset($_GET['menu']) && !empty($_GET['menu'])){

   $p = get_theme_root();

   $menu = htmlspecialchars($_GET['menu']);

   $resStr = str_replace('themes', 'plugins', $p);

  $addmenu = $resStr."/afficher_page/template/add-el-menu.php";

  include($addmenu);

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
