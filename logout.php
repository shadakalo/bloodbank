<?php
		session_start();

        spl_autoload_register(function($class){

          include "classes/".$class.".php";

       });
?>
<?php 
      $user = new Donor();
      $user->logoutUser();
      header("Location: index.php");
      exit();
?>