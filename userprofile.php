<?php
		session_start();

        spl_autoload_register(function($class){

          include "classes/".$class.".php";

       });
?>
<?php 
      $user = new Donor();
      if ($user->getSession()) {
      	$uid  = $_SESSION['uid'] ;
		$usid = $_SESSION['usid'] ;
      }
?>
<?php
	$user->setId($uid);
	$user->setUserid($usid);
	$profile = $user->readUser();
?>
<?php
	if (isset($_POST['delete'])) {
		$user->deleteUser($uid);
		header("Location: login.php");
    exit();
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

 <div class= "col-md-offset-1 col-md-10" >  
    <img src="images/logo.jpg" style="height:180px;width: 100%" > 

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
</div>
   <div class="">
	   <div class="col-md-offset-1 col-md-10" style="position: relative;top: -22px">
	   		<div class="panel panel-default card" style="border-radius: 0px">
	   			<div class="panel-body">
		              	<p>Welcome - <b style='color:red;font-size:15px;'><?php echo $profile['name']; ?></b>      <a href = "logout.php" style="float:right;" class="btn btn-warning">Sign Out</a>
     					 </p>
		              <div class='container-fluid' style='background-color:#D8D8D8;'>
		              	<div class='row'>
		              		<div class='col-md-12 table-responsive' ><br/>
				              	<table  >
					              	<tr>
						              	<th><b>User ID</b></th>
						              	<th>&nbsp; : &nbsp;&nbsp;&nbsp;</th>
						              	<td><b style='color:#21610B;'><?php echo $usid; ?></b></td>
					              	</tr>

					              	<tr>
						              	<th><b>Full Name</b></th>
						              	<th>&nbsp; : &nbsp;&nbsp;&nbsp;</th>
						              	<td><b style='color:#21610B;'><?php echo $profile['name']; ?></b></td>
					              	</tr>

					              	<tr>
						              	<th><b>Blood Group</b></th>
						              	<th>&nbsp; : &nbsp;&nbsp;&nbsp;</th>
						              	<td><b style='color:#21610B;'><?php echo $profile['blood']; ?></b></td>
					              	</tr>

					              	<tr>
						              	<th><b>Weight</b></th>
						              	<th>&nbsp; : &nbsp;&nbsp;&nbsp;</th>
						              	<td><b style='color:#21610B;'><?php echo $profile['weight']; ?>&nbsp;Kg</b></td>
					              	</tr>

					              	<tr>
						              	<th><b>Age</b></th>
						              	<th>&nbsp; : &nbsp;&nbsp;&nbsp;</th>
						              	<td><b style='color:#21610B;'><?php echo $profile['age']; ?>&nbsp;Years</b></td>
					              	</tr>

					              	<tr>
						              	<th><b>Gender</b></th>
						              	<th>&nbsp; : &nbsp;&nbsp;&nbsp;</th>
						              	<td><b style='color:#21610B;'><?php echo $profile['gender']; ?></b></td>
					              	</tr>
					              	
                          <tr>
                            <th><b>Division</b></th>
                            <th>&nbsp; : &nbsp;&nbsp;&nbsp;</th>
                            <td><b style='color:#21610B;'><?php echo $profile['division']; ?></b></td>
                          </tr>

                          <tr>
                            <th><b>City</b></th>
                            <th>&nbsp; : &nbsp;&nbsp;&nbsp;</th>
                            <td><b style='color:#21610B;'><?php echo $profile['city']; ?></b></td>
                          </tr>
					              
					              	<tr>
						              	<th><b>Address</b></th>
						              	<th>&nbsp; : &nbsp;&nbsp;&nbsp;</th>
						              	<td><b style='color:#21610B;'><?php echo $profile['address']; ?></b></td>
					              	</tr>

					              	<tr>
						              	<th><b>Email</b></th>
						              	<th>&nbsp; : &nbsp;&nbsp;&nbsp;</th>
						              	<td><b style='color:#21610B;'><?php echo $profile['email']; ?></b></td>
					              	</tr>

					              	<tr>
						              	<th><b>Contact Number</b></th>
						              	<th>&nbsp; : &nbsp;&nbsp;&nbsp;</th>
						              	<td><b style='color:#21610B;'>0<?php echo $profile['mobile']; ?></b></td>
					              	</tr>

					              	<tr>
						              	<th><b>Availability </b></th>
						              	<th>&nbsp; : &nbsp;&nbsp;&nbsp;</th>
						              	<td><b style='color:#21610B;'><?php 
                                        if ($profile['avail']=='Available') {
                                          echo "<span style='color:#00b300;'>Available</span>";
                                        }else{
                                          echo "<span style='color:red;'>Unavailable</span>";
                                        }
                                  ?>
                            </b></td>
					              	</tr>
				              	</table>
				              	</br></br>
				              	<form action="" method="post"> 
				              	<a href="updateprofile.php" class="btn btn-info">Update Profile</a> &nbsp;&nbsp;&nbsp;
				              	<input type="submit" name="delete" value="Delete Profile" class="btn btn-info"  onclick="return confirm('Are you sure ? You wanna Delete Account ??')"></input>	
				              	</form></br></br>
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