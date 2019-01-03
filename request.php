<?php
            session_start();
            spl_autoload_register(function($class){

             include "classes/".$class.".php";

           });

?>
<?php 
      $user = new Donor();
      $msg='';
      if ($user->getSession()) {
        $uid  = $_SESSION['uid'] ;
        $usid = $_SESSION['usid'] ;
        $msg = $_SESSION['msg'];
      }
?>
<?php 

      $mseg ='';
  if (isset($_POST['submit'])) {
               
               $name      = $_POST['name'];
               $blood     = $_POST['blood'];
               $age     = $_POST['age'];
               $ndate     = $_POST['ndate'];
               $unit     = $_POST['unit'];
               $disease     = $_POST['disease'];
               $email     = $_POST['email'];
               $mobile     = $_POST['mobile'];
               $hname     = $_POST['hname'];
               $division     = $_POST['division'];
               $city     = $_POST['city'];
               $address     = $_POST['address'];
               $dos     = $_POST['dos'];
               $pin     = $_POST['pin'];

                $user->setName($name);
                $user->setBlood($blood);
                $user->setAge($age);
                $user->setNdate($ndate);
                $user->setUnit($unit);
                $user->setDisease($disease);
                $user->setEmail($email);
                $user->setMobile($mobile);
                $user->setHname($hname);
                $user->setDivision($division);
                $user->setCity($city);
                $user->setAddress($address);
                $user->setDos($dos);
                $user->setPin($pin);                
                if( $user->requestInsert()){
                      $mseg='2';
                   
                }else{
                      $mseg ='1';
                }
       }
?>
<?php
  if (isset($_POST['update'])) {
    $pin = $_POST['pin'];
    $user->setPin($pin);
    if ($user->requestCheck()) {
      header('location: requestupdate.php?pin='.$pin);
    }else{
      $mseg= 3;
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
        .input  {
        border: none;
        border-bottom: groove;
        }

      .form-control:focus {
             border-color: #FF0000;
              box-shadow: inset 0 1px 1px rgba(0, 0, 0, 0.075), 0 0 8px rgba(255, 0, 0, 0.6);
                            }
      .btn-primary{
       background-color: red;
             }
     .btn-primary:hover, .btn-primary:focus, .btn-primary:active, .btn-primary.active, .open > .dropdown-toggle.btn-primary {
        background: #FF0000;
        }
       .panelwidth {
          width: 300px;
          
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


<?php

  if ($mseg == 2) {
     echo "<center><b style='color:green;'><h3>>>Request Submitted Successfully<<</h3></b></center>";

  }

 ?>

</div>




<div class="">
  <div class="">
      <div class="col-md-offset-1 col-md-10" style="position: relative;top: -22px;">
          <div class="panel panel-default card" style="background-color: #fff;border-radius: 0px;">
          <div class="panel-body">
            <center><h2>POST BLOOD REQUEST</h2>
               <p>Dear, Please fill the following information to post your blood request. We will inform our donors and we hope the needy people recover soon. </p>
            </center>
           
        </div>
      </div>
     </div>
  </div>
</div>
<div class="container">
  <div class="row">
  <div class="col-md-offset-1 col-md-10" style="position: relative;top: -22px;">
    <div class="panel panel-default card" style="background-color: #fff;border-radius: 0px;">

      <div class="panel-heading" style="background-color: white;">
        <div class="panel-title" >

          If your are already posted your blood request and want to update your blood request then please enter request code and press submit.
        </div><hr>
        <div class="panel-body">
            <?php if ($msg == 3) {
                 echo "<center><span style='color:red;'>*&nbsp;Error ... No blood Request Submitted with this PIN</span></center></br></br>";
                }?>
            <form action="" method="post">
              <div class="form-group">
                 
                 <center><b> Enter Your Blood Request PIN code</b> </center>
              
                 <input class="form-control  input" name="pin" type="text"  placeholder="Enter  PIN you entered earlier " required="" />
               </div>
                <?php if ($user->getSession()) {
                  ?>
                <center><input type="submit" name="update" value="Submit" class="btn btn-info  "></input></center>
                <?php }else{ ?>
                <center><input type="submit"   class="btn btn-info" onclick="alert('You must be logged in before you update blood request .')" ></input></center>
                <?php } ?>
                </form>
                
        </div>
      </div>
    </div>
  </div>
 </div>
</div>


<div class="">
  <div class="col-md-offset-1 col-md-10" style="position: relative;top: -22px;">
    <div class="panel panel-default panel1 card" style="background-color: #fff;border-radius: 0px;">
      <div class="panel-body">
<?php
   if($mseg == 1){

                    echo "<span style='color:red;'>*Error ... PIN already Exists</span></br>";

                }

?>
         <form role="form" action="" method="post">
              <div class="panel panel-default card">
                <div class="panel-heading">
                  <h3 class="panel-title">
                    Patient Information
                  </h3>
                </div>
                <div class="panel-body">
                <div class="form-group">
                 <label for="name">
                  Patient Name
                  </label>
                 <input class="form-control  input1" name="name" type="text" placeholder="Enter Patient Name " required=""  />
               </div>
               <div class="form-group ">
                  <label for="blood">Patient Blood Group</label>
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
                 <label for="age">
                   Patient Age
                  </label>
                 <input class="form-control  input1" name="age" type="text" placeholder="Enter Patient Age "  required="" />
               </div>
              
                 <div class="form-group">
                 <label for="ndate">
                   When you need blood
                  </label>
                 <input class="form-control  input1" name="ndate" type="date"   required="" />
               </div>
               <div class="form-group">
                 <label for="unit">
                    How many units you need 
                  </label>
                 <input class="form-control  input1" name="unit" type="text" placeholder="enter unit number "  required="" />
               </div>
                <div class="form-group">
                   <label for="disease">
                     Type of disease
                    </label>
                   <textarea class="form-control input1" name="disease" rows="3" cols="18" placeholder="Give detail info about disease" required=""></textarea>
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
                       <input class="form-control  input1" name="email" type="email"  placeholder="Enter  Email " required="" />
                     </div>
                     <div class="form-group">
                       <label for="mobile">
                         Contact Number
                        </label>
                       <input class="form-control  input1" name="mobile" type="text" placeholder="Enter  Contact Number " required="" />
                     </div>
                     <div class="form-group">
                 <label for="hname">
                  Hospital Name
                  </label>
                 <input class="form-control  input1" name="hname" type="text" placeholder="Enter Hospital Name " required=""  />
               </div>
                 <div class="form-group ">
                  <label for="division">Division</label>
                  <select class="form-control" name="division" value="" required="">
                    <option value="" >-----Select-----</option>
                    <option value="Dhaka">Dhaka</option>
                    <option value="Barishal">Barishal</option>
                    <option value="Chittagong">Chittagong</option>
                    <option value="Khulna">Khulna</option>
                    <option value="Mymensingh">Mymensingh</option>
                    <option value="Rajshahi">Rajshahi</option>
                    <option value="Rangpur">Rangpur</option>
                    <option value="Sylhet">Sylhet</option>
                    </select>
                 </div>
                 <div class="form-group ">
                  <label for="city">City</label>
                  <select class="form-control" name="city" value="" required="">
                    <option value="" >-----Select-----</option>
                    <option value="" disabled="" class="red">(Dhaka Division)</option>
                    <option value="Dhaka">Dhaka</option>
                    <option value="Faridpur">Faridpur</option>
                    <option value="Gazipur">Gazipur</option>
                    <option value="Gopalganj">Gopalganj</option>
                    <option value="Kishoreganj">Kishoreganj</option>
                    <option value="Madaripur">Madaripur</option>
                    <option value="Manikganj">Manikganj</option>
                    <option value="Munshiganj">Munshiganj</option>
                    <option value="Narayanganj">Narayanganj</option>
                    <option value="Narshingdi">Narshingdi</option>
                    <option value="Rajbari">Rajbari</option>
                    <option value="Tangail">Tangail</option>
                    <option value="" disabled="">-------</option>
                    <option value="" disabled="" class="red">(Barishal Division)</option>
                    <option value="Barguna">Barguna</option>
                    <option value="Barishal">Barishal</option>
                    <option value="Bhola">Bhola</option>
                    <option value="Jhalokathi">Jhalokathi</option>
                    <option value="Patuakhali">Patuakhali</option>
                    <option value="Pirojpur">Pirojpur</option>
                    <option value="" disabled="" >-------</option>
                    <option value="" disabled="" class="red">(Chittagong Division)</option>
                    <option value="Bandarban">Bandarban</option>
                    <option value="Brahmanbaria">Brahmanbaria</option>
                    <option value="Chadpur">Chadpur</option>
                    <option value="Chittagong">Chittagong</option>
                    <option value="Comilla">Comilla</option>
                    <option value="Cox's Bazar">Cox's Bazar</option>
                    <option value="Feni">Feni</option>
                    <option value="Khagrachhari">Khagrachhari</option>
                    <option value="Lakshmipur">Lakshmipur</option>
                    <option value="Noakhli">Noakhli</option>
                    <option value="Rangamati">Rangamati</option>
                    <option value="" disabled="">-------</option>
                    <option value="" disabled="" class="red">(Khulna Division)</option>
                    <option value="Bagerhat">Bagerhat</option>
                    <option value="Chuadanga">Chuadanga</option>
                    <option value="Jessore">Jessore</option>
                    <option value="Jhenaidah">Jhenaidah</option>
                    <option value="Khulna">Khulna</option>
                    <option value="Kushtia">Kushtia</option>
                    <option value="Magura">Magura</option>
                    <option value="Meherpur">Meherpur</option>
                    <option value="Narail">Narail</option>
                    <option value="Shatkhira">Shatkhira</option>
                    <option value="" disabled="">-------</option>
                    <option value="" disabled="" class="red">(Mymensingh Division)</option>
                    <option value="Jamalpur">Jamalpur</option>
                    <option value="Mymensingh">Mymensingh</option>
                    <option value="Netrokona">Netrokona</option>
                    <option value="Sherpur">Sherpur</option>
                    <option value="" disabled="">-------</option>
                    <option value="" disabled="" class="red">(Rajshahi Division)</option>
                    <option value="Bogra">Bogra</option>
                    <option value="Chapainabanganj">Chapainabanganj</option>
                    <option value="Joypurhat">Joypurhat</option>
                    <option value="Pabna">Pabna</option>
                    <option value="Naogaon">Naogaon</option>
                    <option value="Natore">Natore</option>
                    <option value="Rajshahi">Rajshahi</option>
                    <option value="Shirajganj">Shirajganj</option>
                    <option value="" disabled="">-------</option>
                    <option value="" disabled="" class="red">(Rangpur Division)</option>
                    <option value="Dinajpur">Dinajpur</option>
                    <option value="Gaibandha">Gaibandha</option>
                    <option value="Kurigram">Kurigram</option>
                    <option value="Lalmonirhat">Lalmonirhat</option>
                    <option value="Niphamari">Niphamari</option>
                    <option value="Panchagar">Panchagar</option>
                    <option value="Rangpur">Rangpur</option>
                    <option value="Thakurgoan">Thakurgoan</option>
                    <option value="" disabled="">-------</option>
                    <option value="" disabled="" class="red">(Sylhet Division)</option>
                    <option value="Habiganj">Habiganj</option>
                    <option value="Maulvibazar">Maulvibazar</option>
                    <option value="Sunamganj">Sunamganj</option>
                    <option value="Sylhet">Sylhet</option>
                    <option value="" disabled="">-------</option>
                  </select>
                 </div>
                 <div class="form-group">
                   <label for="address">
                     Address
                    </label>
                   <textarea class="form-control input1" name="address" rows="3" cols="18" placeholder="Enter  Address " required=""></textarea>
                 </div>
                 <div class="form-group">
                 <label for="dos">
                   Request submission date
                  </label>
                 <input class="form-control  input1" name="dos" type="date"   required="" />
               </div>
               <div class="form-group">
                 <label for="pin">
                  PIN
                  </label>
                 <input class="form-control  input1" name="pin" type="text" placeholder="Enter UNIQUE PIN to use it in future " required=""  />
               </div>

                    <?php if ($user->getSession()) {
  
                          ?>
                       <center><input type="submit" name="submit" value="Submit" class="btn btn-info  "></input></center>
                       <?php }else{ ?>
                       <center><input type="submit"   class="btn btn-info" onclick="alert('You must be logged in before you send any blood request .')" ></input></center>
                       <?php } ?>
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




