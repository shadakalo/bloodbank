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
  $profile = $user->readMember();
?>
<?php 
         if (isset($_POST['update'])) {
               $userid  = $_POST['userid'];
              
               $name = $_POST['name'];
               $blood = $_POST['blood'];
               $weight  = $_POST['weight'];
               $gender  = $_POST['gender'];
               $age  = $_POST['age'];
               $dob  = $_POST['dob'];
               $mobile  = $_POST['mobile'];
               $address  = $_POST['address'];
               $joini  = $_POST['joini'];
               $occu  = $_POST['occu'];
    
                     $user->setName($name);
                     $user->setBlood($blood);
                     $user->setWeight($weight);
                     $user->setGender($gender);
                     $user->setAge($age);
                     $user->setDob($dob);
                     $user->setMobile($mobile);
                     $user->setAddress($address);
                     $user->setJoin($joini);
                     $user->setOccu($occu);   

                     
                 if ($user->memberprofileUpdate($uid)) {
                    header("Location: memberprofile.php");
                    exit();
                  } 
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

    
     .input1  {
        border: none;
        border-radius: 0px;
        }
        


      .form-control:focus {
             border-color: #FF0000;
              box-shadow: inset 0 1px 1px rgba(0, 0, 0, 0.075), 0 0 8px rgba(255, 0, 0, 0.6);
                            }
      
        .btn-info{
       background-color: rgb(0, 166, 255);
       border-radius: 0px;
       width: 100px;
       height: 35px;
             }
        .btn-info:hover, .btn-info:active, .btn-info:focus {
                color: #ffffff !important;
                background-color: rgb(0, 166, 255) !important;
                border-color: rgb(0, 166, 255) !important;
              }
        .panel1{
          border: 0px;
          background-color: #f5f5f5;
        }
        select :disabled.red{
           color:  #ff3333;
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
            <li><a href="memberprofile.php">My Profile</a></li>
            <li><a href="changememberpassword.php">Change Password</a></li>
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
    <div class="panel panel-default panel1 card" style="background-color: #fff;border-radius: 0px;">
      <br>
      <center><h2>Update Profile Info</h2></center>
      <div class="panel-body">
          <p>
          
                    </p>
         <form role="form" action="" method="post">
              <div class="panel panel-default card">
                <div class="panel-heading">
                  <h3 class="panel-title">Log In Information</h3>
                </div>
                <div class="panel-body">
                  <div class="form-group">
                     <label for="userid">
                       User Id
                      </label>
                     <input class="form-control  input1" name="userid" type="text"  disabled="" value="<?php echo $usid ?>" />
                   </div>
                  </div>
              </div>
              <div class="panel panel-default card">
                <div class="panel-heading">
                  <h3 class="panel-title">
                    Basic Information
                  </h3>
                </div>
                <div class="panel-body">
                <div class="form-group">
                 <label for="name">
                  Full Name
                  </label>
                 <input class="form-control  input1" name="name" type="text"  value="<?php echo $profile['name']; ?>" />
               </div>
               <div class="form-group ">
                  <label for="blood">Blood Group</label>
                  <select class="form-control" name="blood" value="" required="">
                    <option value="<?php echo $profile['blood']; ?>">-----Select-----</option>
                    <option value="A+">A+</option>
                    <option value="A-">A-</option>
                    <option value="B+">B+</option>
                    <option value="B-">B-</option>
                    <option value="AB+">AB+</option>
                    <option value="AB-">AB-</option>
                    <option value="O+">O+</option>
                    <option value="O-">O-</option>
                  </select>
                </div>

               <div class="form-group">
                 <label for="weight">
                   Weight
                  </label>
                 <input class="form-control  input1" name="weight" type="text" value="<?php echo $profile['weight']; ?>" />
               </div>
                <div class="form-group ">
                 <label for="gender">Gender</label>
                      <select class="form-control" name="gender" value="" required="">
                          <option value="<?php echo $profile['gender']; ?>" >-----Select-----</option>
                          <option value="Male">Male</option>
                          <option value="Female">Female</option>
                      </select>
               </div>
               
               <div class="form-group">
                 <label for="age">
                   Age
                  </label>
                 <input class="form-control  input1" name="age" type="text" value="<?php echo $profile['age']; ?>"/>
               </div>
               <div class="form-group">
                 <label for="dob">
                   Date of birth
                  </label>
                 <input class="form-control  input1" name="dob" type="date" value="<?php echo $profile['dob']; ?>" />
               </div>
               </div>
              </div>

           <div class="panel panel-default card">
             <div class="panel-heading">
                <h3 class="panel-title">
                  Contact Information
                 </h3>
             </div>
               <div class="panel-body">
                 <div class="form-group">
                   <label for="email">
                     Email
                    </label>
                   <input class="form-control  input1" name="email" type="email" disabled="" value="<?php echo $profile['email']; ?>"  />
                 </div>
                 <div class="form-group">
                   <label for="mobile">
                     Contact Number
                    </label>
                   <input class="form-control  input1" name="mobile" type="text" value="<?php echo $profile['mobile']; ?>" />
                 </div>
                 <div class="form-group">
                   <label for="address">
                     Address
                    </label>
                   <textarea class="form-control input1" name="address" rows="3" cols="18"  ><?php echo $profile['address']; ?></textarea>
                 </div>
                 <div class="form-group">
                   <label for="joini">
                     Why join 
                    </label>
                   <textarea class="form-control input1" name="joini" rows="3" cols="18"  ><?php echo $profile['joini']; ?></textarea>
                 </div>
                 <div class="form-group">
                 <label for="occu">
                   Occupation
                  </label>
                 <input class="form-control  input1" name="occu" type="text"  value="<?php echo $profile['occu']; ?>"/>
               </div>
                  
                </br>
                </br>

               </br> <center>
                          <a href="memberprofile.php" class="btn btn-info"> Back</a>
                          <input type="submit" name="update" value="Submit" class="btn btn-info  "></input>

                    </center>
              </div>
             </div>
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