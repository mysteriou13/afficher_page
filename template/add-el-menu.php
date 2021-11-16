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

  $nbtab = count($tab)-1;
  $nb = -1;
   while($nb <= $nbtab-1){

  $nb++;
  echo "<OPTION>".$tab[$nb];

  }

   ?>


</SELECT>

<?php

  if(isset($_POST['name_menu'])  && !empty($_POST['name_menu'])){


  $class_sql->add_el_menu($_POST['name_menu'],$_POST['name_el'],$_POST['link_menu']);

  }

?>


</div>

<input type = "submit">

 </form>


</div>
