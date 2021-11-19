<div  class = "position-link">

 ajouter  element au menu <?php echo $_GET['menu']?>

 <form  method = "post" action = "<?php $_SERVER['PHP_SELF']?>">

<div>
  nom  element <input type = "text" name = "name_el">
</div>

   <input type = "hidden" name = "name_menu" value = "<?php echo $_GET['menu']?>">

<div>
link vers le page


<SELECT name="link_menu" size="1">

  <?php

/*
liste des page
*/

  $tab = $class_sql->liste_page('post_title');

 $tab_liste = $class_sql->liste_page_link_page();

  $nbtab = count($tab)-1;

    $nb_link = count($tab_liste)-1;


  $nb = -1;

  $linknb = -1;





  while($nb <= $nbtab-1){


$t = $tab_liste[$nb_link];
  $nb++;
  echo "<OPTION value ='";echo $t; echo"'>".$tab[$nb];



  }

   ?>


</SELECT>

<?php



  if(isset($_POST['name_menu'])  && !empty($_POST['name_menu'])){


  $class_sql->add_el_menu($_POST['name_menu'],$_POST['link_menu']);

  }

?>


</div>

<input type = "submit">

 </form>


</div>
