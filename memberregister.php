<?php
            spl_autoload_register(function($class){

             include "classes/".$class.".php";

           });

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


    <!-- Load jQuery and bootstrap datepicker scripts -->
        <script src="js/jquery-1.9.1.min.js"></script>
        <script src="js/bootstrap-datepicker.js"></script>
        <script type="text/javascript">
            // When the document is ready
            $(document).ready(function () {
                
                $('#example1').datepicker({
                    format: "yyyy/mm/dd"
                });  
            
            });

            $(document).ready(function () {
                
                $('#example2').datepicker({
                    format: "yyyy/mm/dd"
                });  
            
            });
        </script>


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
</div>



<div class="">
  <div class="col-md-offset-1 col-md-10">
    <div class="panel panel-default panel1 card" style="background-color: #fff;position: relative;top: -20px; border-radius: 0px;">
    <br>
      <center><h2 style="margin-top: 0px;">Member Registration</h2></center>
      <div class="panel-body">
          <p>
         
          <?php 

           $user = new Donor();

           if (isset($_POST['create'])) {
               $userid  = $_POST['userid'];
               $pass  = $_POST['pass'];
               $pass1  = $_POST['pass1'];
               $name = $_POST['name'];
               $blood = $_POST['blood'];
               $weight  = $_POST['weight'];
               $gender  = $_POST['gender'];
               $age  = $_POST['age'];
               $dob  = $_POST['dob'];
               $email  = $_POST['email'];
               $mobile  = $_POST['mobile'];
               $address  = $_POST['address'];
               $joini  = $_POST['joini'];
               $occu  = $_POST['occu'];
               
               



               if (strlen($pass)>='8') {
                
                     if ($pass == $pass1) {
                      $pass = md5($pass);
                     $user->setUserid($userid);        
                     $user->setPass($pass);
                     $user->setName($name);
                     $user->setBlood($blood);
                     $user->setWeight($weight);
                     $user->setGender($gender);
                     $user->setAge($age);
                     $user->setDob($dob);
                     $user->setEmail($email);
                     $user->setMobile($mobile);
                     $user->setAddress($address);
                     $user->setJoin($joini);
                     $user->setOccu($occu);   


                     $reg = $user->memberInsert();
                     
                     }else{
                      echo " <span style='color : RED;'>* password doesn't match</span>";
                     }
              }else{
                echo " <span style='color : RED;'>* Too short password (minimum 8 digit)</span>";
              }
            }

          ?>
                    </p>
         <form role="form" action="" method="post">
              <div class="panel panel-default card">
                <div class="panel-heading">
                  <h3 class="panel-title">Log In Information</h3>
                </div>
                <dir class="panel-body">
                  <div class="form-group">
                     <label for="userid">
                       User Id
                      </label>
                     <input class="form-control  input1" name="userid" type="text" placeholder="Enter your UNIQUE UserId " required="" />
                   </div>
                   <div class="form-group">
                     <label for="pass">
                       Password
                      </label>
                     <input class="form-control  input1" name="pass" type="password" placeholder="Enter your password " required="" />
                   </div>
                   <div class="form-group">
                     <label for="pass1">
                       Confirm Password
                      </label>
                     <input class="form-control  input1" name="pass1" type="password" placeholder="Re-type the password " required="" />
                   </div>
                </dir>
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
                 <input class="form-control  input1" name="name" type="text" placeholder="Enter your Full Name " required=""  />
               </div>
               <div class="form-group ">
                  <label for="blood">Blood Group</label>
                  <select class="form-control" name="blood" value="" required="">
                    <option value="" >-----Select-----</option>
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
                 <input class="form-control  input1" name="weight" type="text" placeholder="Enter your Weight " required="" />
               </div>
                <div class="form-group ">
                 <label for="gender">Gender</label>
                      <select class="form-control" name="gender" value="" required="">
                          <option value="" >-----Select-----</option>
                          <option value="Male">Male</option>
                          <option value="Female">Female</option>
                      </select>
               </div>
               
               <div class="form-group">
                 <label for="age">
                   Age
                  </label>
                 <input class="form-control  input1" name="age" type="text" placeholder="Enter your Age "  required="" />
               </div>
               <div class="form-group">
                 <label for="dob">
                   Date of birth
                  </label>
                 <input class="form-control  input1" name="dob" type="date" placeholder="Enter your DOB "  required="" />
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
                   <input class="form-control  input1" name="email" type="email"  placeholder="Enter your Email " required="" />
                 </div>
                 <div class="form-group">
                   <label for="mobile">
                     Contact Number
                    </label>
                   <input class="form-control  input1" name="mobile" type="text" placeholder="Enter your Contact Number " required="" />
                 </div>
                 <div class="form-group">
                   <label for="address">
                     Address
                    </label>
                   <textarea class="form-control input1" name="address" rows="3" cols="18" placeholder="Enter your Address " required=""></textarea>
                 </div>
                 <div class="form-group">
                   <label for="joini">
                     Why join 
                    </label>
                   <textarea class="form-control input1" name="joini" rows="3" cols="18" placeholder="Enter joining reason " required="" ></textarea>
                 </div>
                 <div class="form-group">
                 <label for="occu">
                   Occupation
                  </label>
                 <input class="form-control  input1" name="occu" type="text" placeholder="Enter your occupation "  required="" />
               </div>
                  
                </br>
                </br>

               </br> <center><input type="submit" name="create" value="Submit" class="btn btn-info  "></input></center>
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