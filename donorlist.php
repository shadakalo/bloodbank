<?php
            session_start();
            spl_autoload_register(function($class){

             include "classes/".$class.".php";

           });

?>
<?php 
      $msg= '';
      $user = new Donor();
      if ($user->getSession()) {
        $uid  = $_SESSION['uid'] ;
        $usid = $_SESSION['usid'] ;
        $msg = $_SESSION['msg'];
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
    <title>Blood Bank</title>

    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="bootstrap-social/bootstrap-social.css">


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

      
             .tbal{
            text-align: center;
          }
          tr:nth-child(odd) {background-color: #ffcccc}
          
          tr:hover{
            background-color:#e6e6e6 ;
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
    



<div class= "col-md-offset-1 col-md-10" >  
    <img src="images/logo.jpg" style="height:180px;width: 100%" > 

<?php if ($msg == 'donor') {
  
?>
   <div class="navbar navbar-inverse navbar-static-top">
    <div class="container-fluid">
      <a href="#" class="navbar-brand navbar-left"><img style="max-width:40px; margin-top: -10px;"src="images/002.jpg"></a>
      <button class="navbar-toggle", data-toggle='collapse', data-target='.navHeadercollapse'>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <div class="collapse navbar-collapse navHeadercollapse">
        <ul class="nav navbar-nav navbar-right">   
          <li ><a href="index.php"><span class="glyphicon glyphicon-home"></span>&nbsp;&nbsp;Home</a></li>
          <li><a href="donorlist.php"><span class="glyphicon glyphicon-th-list"></span>&nbsp;&nbsp;Donor List</a></li>
          <li><a href="request.php"><span class="glyphicon glyphicon-tint"></span>&nbsp;&nbsp;Request For Blood</a></li>
          <li><a href="finddonor.php"><span class="glyphicon glyphicon-search"></span>&nbsp;&nbsp;Find a donor</a></li>
          
          <li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle='dropdown'><span class="glyphicon glyphicon-log-in"></span>&nbsp;&nbsp;<?php echo $usid?> <b class="caret"></b></a>
          <ul class="dropdown-menu">
            <li><a href="userprofile.php">My Profile</a></li>
            <li><a href="changepassword.php">Change Password</a></li>
            <li><a href="logout.php">LogOut</a></li>
          </ul>
          </li>
        </ul> 
      </div>
    </div>
   </div>
   <?php }elseif ($msg == 'member') {
   
    ?>

    <div class="navbar navbar-inverse navbar-static-top">
    <div class="container-fluid">
      <a href="#" class="navbar-brand navbar-left"><img style="max-width:40px; margin-top: -10px;"src="images/002.jpg"></a>
      <button class="navbar-toggle", data-toggle='collapse', data-target='.navHeadercollapse'>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <div class="collapse navbar-collapse navHeadercollapse">
        <ul class="nav navbar-nav navbar-right">   
          <li ><a href="index.php"><span class="glyphicon glyphicon-home"></span>&nbsp;&nbsp;Home</a></li>
          <li><a href="donorlist.php"><span class="glyphicon glyphicon-th-list"></span>&nbsp;&nbsp;Donor List</a></li>
          <li><a href="request.php"><span class="glyphicon glyphicon-tint"></span>&nbsp;&nbsp;Request For Blood</a></li>
          <li><a href="finddonor.php"><span class="glyphicon glyphicon-search"></span>&nbsp;&nbsp;Find a donor</a></li>
         
          <li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle='dropdown'><span class="glyphicon glyphicon-log-in"></span>&nbsp;&nbsp;<?php echo $usid?> <b class="caret"></b></a>
          <ul class="dropdown-menu">
            <li><a href="memberprofile.php">My Profile</a></li>
            <li><a href="changememberpassword.php">Change Password</a></li>
            <li><a href="logout.php">LogOut</a></li>
          </ul>
          </li>
        </ul> 
      </div>
    </div>
   </div>
   <?php }elseif ($msg == 'admin') {
        
    ?>
    <div class="navbar navbar-inverse navbar-static-top">
    <div class="container-fluid">
      <a href="#" class="navbar-brand navbar-left"><img style="max-width:40px; margin-top: -10px;"src="images/002.jpg"></a>
      <button class="navbar-toggle", data-toggle='collapse', data-target='.navHeadercollapse'>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <div class="collapse navbar-collapse navHeadercollapse">
        <ul class="nav navbar-nav navbar-right">   
          
          <li><a href="memberlist.php"><span class="glyphicon glyphicon-th-list"></span>&nbsp;&nbsp;Member List</a></li>
          <li><a href="donorlist.php"><span class="glyphicon glyphicon-th-list"></span>&nbsp;&nbsp;Donor List</a></li>
          <li><a href="bloodrequest.php"><span class="glyphicon glyphicon-tint"></span>&nbsp;&nbsp;Blood Requests</a></li>
           <li><a href="finddonor.php"><span class="glyphicon glyphicon-search"></span>&nbsp;&nbsp;Find a donor</a></li>

          
          
          <li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle='dropdown'><span class="glyphicon glyphicon-log-in"></span>&nbsp;&nbsp;<?php echo $usid?> <b class="caret"></b></a>
          <ul class="dropdown-menu">
            <li><a href="adminprofile.php">My Profile</a></li>
            <li><a href="changeadminrpassword.php">Change Password</a></li>
            <li><a href="logout.php">LogOut</a></li>
          </ul>
          </li>
        </ul> 
      </div>
    </div>
   </div>


<?php }else{ ?>
<div class="navbar navbar-inverse navbar-static-top">
    <div class="container-fluid">
      <a href="#" class="navbar-brand navbar-left"><img style="max-width:40px; margin-top: -10px;"src="images/002.jpg"></a>
      <button class="navbar-toggle", data-toggle='collapse', data-target='.navHeadercollapse'>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <div class="collapse navbar-collapse navHeadercollapse">
        <ul class="nav navbar-nav navbar-right">   
          <li ><a href="index.php"><span class="glyphicon glyphicon-home"></span>&nbsp;&nbsp;Home</a></li>
          <li><a href="memberregister.php"><span class="glyphicon glyphicon-list-alt"></span>&nbsp;&nbsp;Member Registration</a></li>
          <li><a href="register.php"><span class="glyphicon glyphicon-list-alt"></span>&nbsp;&nbsp;Donor Registration</a></li>
          <li><a href="donorlist.php"><span class="glyphicon glyphicon-th-list"></span>&nbsp;&nbsp;Donor List</a></li>
          <li><a href="request.php"><span class="glyphicon glyphicon-tint"></span>&nbsp;&nbsp;Request For Blood</a></li>
          <li><a href="finddonor.php"><span class="glyphicon glyphicon-search"></span>&nbsp;&nbsp;Find a donor</a></li>
          <li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle='dropdown'><span class="glyphicon glyphicon-log-in"></span>&nbsp;&nbsp;Log In <b class="caret"></b></a>
          <ul class="dropdown-menu">
            <li><a href="login.php">Donor LogIn</a></li>
            <li><a href="memberlogin.php">Member LogIn</a></li>
 
          </ul>
          </li>
        </ul> 
      </div>
    </div>
   </div>
<?php } ?>
</div>
 

<div class="">
  <div class="col-md-offset-1 col-md-10" style="position: relative;top: -22px;">
    <div class="panel panel-default card" style="border-radius: 0px;">
      <div class="panel-body">
        <div class="row">
          <div class="col-md-12">
                  <center><h2 style="margin-top: 5px;">Donor List </h2></center>
            <div class="table-responsive"> 
             
                  <table class="table table-bordered tbal">
                                <tr style="background-color: red ; color: white;">
                                    <th><center>Id</center></th>
                                    <th><center>Name</center></th>
                                    <th><center>Blood Group</center></th>
                                    <th><center>Availability</center></th>
                                    <th><center>Detail</center></th>
                                </tr>

                <?php 

                  $i=0;
                  foreach ($user->readAll() as $key => $value) {
                    
                    $i++


                ?>
                                <tr>
                                  <td><?php echo $i;?></td>
                                  <td><?php echo $value['name'];?></td>
                                  <td><?php echo $value['blood'];?></td>
                                  
                                  <td><?php 
                                        if ($value['avail']=='Available') {
                                          echo "<span style='color:green;'>Available</span>";
                                        }else{
                                          echo "<span style='color:red;'>Unavailable</span>";
                                        }


                                  ?></td>
                                  <td>
                                    <?php 
                                        if ($user->getSession()) {
                                    ?>
                                    <a href="profile.php?id=<?php echo $value['id'];?>">View Profile</a>
                                    <?php }else{ ?>

                                    <a href="donorlist.php" onclick="alert('you must be logged in to View Profile .')">View Profile</a>

                                  <?php } ?>
                                  </td>
                                </tr>

                                

                <?php  } ?>

                    </table>


          </div>  
          </div>
        </div>
      </div>
    </div>
  </div>
</div>











































       <footer class="page-footer blue center-on-small-only" id="footer">
            <div class="footer-copyright text-center rgba-black-light">
                <div class="col-md-offset-1 col-md-10" style="margin-bottom: 20px;">
                  © <span style="font-weight: bold;">Md Tanvir Haque</span> All rights Reserved
                </div>
            </div>
        </footer>



    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>




