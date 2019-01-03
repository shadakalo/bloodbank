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
		$num = 0 ;
	if (isset($_POST['submit'])) {
		$oldpass = $_POST['oldpass'];
		$pass    = $_POST['pass'];
		$pass1   = $_POST['pass1'];

		if (empty($oldpass) or empty($pass) or empty($pass1)) {
				$num = 1;
			}else{
				if (strlen($pass)>='8') {
					
					if ($pass == $pass1) {
							$oldpass = md5($oldpass);
							$user->setId($uid);
							$user->setPass($oldpass);
							if ($user->checkPass()) {
								$pass = md5($pass);
								$user->setId($uid);
								$user->setPass($pass);
								$user->changePass();
								$num = 6;

							}else{
									$num = 2;;
								}
					}else{
							$num = 3;
					}

				}else{
					$num = 4;
				}
				
				
			}	

		}



?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8 ">
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
      .input  {
        border: none;
        border-bottom: groove;
        }
        .form-control:focus {
             border-color: #FF0000;
              box-shadow: inset 0 1px 1px rgba(0, 0, 0, 0.075), 0 0 8px rgba(255, 0, 0, 0.6);
                            }
         .btn-info{
               background-color: rgb(0, 166, 255);
               border-radius: 0px;    
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
          <li><a href="request.php"><span class="glyphicon glyphicon-pencil"></span>&nbsp;&nbsp;Doctor Articles</a></li>
          <li><a href="index.php"><span class="glyphicon glyphicon-grain"></span>&nbsp;&nbsp;About us</a></li>
          
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

   <div class="container">
    <div class="col-md-offset-4 col-md-4">
      <div class="panel panel-default card">
        <div class="panel-heading" style="background-color: red;color: white;" >
          <h3 class="panel-title">
            <center>Change Password </center>
          </h3>
        </div>
        <div class="panel-body">
        <?php
        	if ($num == 1) {
        		echo "<span style='color:red;'><b>*   Fields can not be empty</span></b></br></br>";
        	}elseif ($num == 2) {
        		echo "<span style='color:red;'><b>*   Wrong Old Password</span></br></br></b>";
        	}elseif ($num == 3) {
        		echo "<span style='color:red;'><b>*  New Passwords not matched </span></b></br></br>";
        	}elseif ($num == 4) {
        		echo "<span style='color:red;'><b>*  Too short password (min 8 digits) </span></b></br></br>";
        	}elseif($num == 6){
        		echo "<span style='color:green;'><b>*  Password Change Successful !!! </span></b></br></br>";
        	}

         ?>	
              
          <form role="form" action="" method="post">
               <div class="form-group">
                   <label for="pass">
                     Old Password
                    </label>
                   <input class="form-control  input" name="oldpass" type="password"  placeholder="Enter your Old Password " />
              </div>
               <div class="form-group">
                   <label for="pass">
                     Password
                    </label>
                   <input class="form-control  input" name="pass" type="password"  placeholder="Enter your Password " />
              </div>
              <div class="form-group">
                   <label for="pass">
                     Confirm Password
                    </label>
                   <input class="form-control  input" name="pass1" type="password"  placeholder="Re-type The Password " />
              </div>
              </br><center><input type="submit" name="submit" value="Submit" class="btn btn-info  "></input></center>
          </form>          
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