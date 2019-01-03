<?php
  

        spl_autoload_register(function($class){

          include "classes/".$class.".php";

       });
?>
<?php 
      $user = new Donor();
      foreach ($user->getImage() as $key => $value) {
        
   
     
      
     
?>


<img style="width: 150px;height: 150px;" src="data:dbimage/jpeg;base64,<?php echo base64_encode( $value['image'] ); ?>"  />

 
<?php } ?>

<?php

 
 if(isset($_POST['submit'])){
 
      $name = $_FILES['image'] ['name'];
      $type = $_FILES['image'] ['type'];
      $size = $_FILES['image'] ['size'];
      $temp = $_FILES['image'] ['tmp_name'];
      move_uploaded_file($temp, 'dbimage/'.$name);
      $location = "dbimage/" . $_FILES["image"]["name"];

      $user->setImage($location);
      $user->imageUpload();

  }

  ?>




<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
    <link rel="icon" href="favicon.ico" type="image/x-icon">
    <title>Bootstrap 101 Template</title>

    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="bootstrap-social/bootstrap-social.css">
    <link rel="stylesheet" type="text/css" href="cs.css">


    <style type="text/css">
    .navbar-inverse {
    background-color: #FF0000;
    border-color: #E7E7E7;
    }     
    .carousel-indicators li { visibility: hidden; }  
    .navbar .nav > li.dropdown.open.active > a:hover, 
    .navbar .nav > li.dropdown.open > a
    {
       background-color: #FF0000;
    }
    .dropdown-menu a:hover{
    color: green !important;
      }

    div.card {
             box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
               }
         .btn-info{
       background-color: rgb(0, 166, 255);
       border-radius: 0px;
       width: 120px;
       height: 35px;
             }
        .btn-info:hover, .btn-info:active, .btn-info:focus {
                color: #ffffff !important;
                background-color: rgb(0, 166, 255) !important;
                border-color: rgb(0, 166, 255) !important;
              }
        #footer {
         height: 100px;
       background-color: #f5f5f5;
            }
    </style>

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="js/html5shiv.min.js"></script>
      <script src="js/respond.min.js"></script>
    <![endif]-->
  </head>
  <body style="background-color: #f5f5f5">




                               <form action="" method="post" enctype="multipart/form-data"> 
                                


                                    <input type="file" name="image" />
                                     <input type="submit" name="submit" value="Upload" />





                              </form>


               




    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>