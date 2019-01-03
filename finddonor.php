<?php
            session_start();
            spl_autoload_register(function($class){

             include "classes/".$class.".php";

           });
?>
<?php 
      $user = new Donor();
      $mseg = '';
      if ($user->getSession()) {
        $uid  = $_SESSION['uid'] ;
      $usid = $_SESSION['usid'] ;
      $mseg = $_SESSION['msg'];
      }
?>
<?php 
  
  $msg = '';
  if (isset($_POST['search'])) {
      $blood = $_POST['blood'];
      $division = $_POST['division'];
      $city = $_POST['city'];

      if (empty($blood)) {
          $msg = 3;
      } else{

                if (!empty($blood) && !empty($division) && !empty($city)) {
                    $user->setBlood($blood);
                    $user->setDivision($division);
                    $user->setCity($city);
                      if(!$user->donorSearchByAll()){
                         $msg = 1;
                      }else{
                              $data = $user->donorSearchByAll() ;
                              $msg = 2;
                         
                      }
                }elseif (!empty($blood) && !empty($division)) {
                    $user->setBlood($blood);
                    $user->setDivision($division);
                      if(!$user->donorSearchBytwo()){
                          $msg = 1;
                      }else{
                              $data = $user->donorSearchBytwo();
                              $msg = 2;
                            
                      }
                }elseif (!empty($blood) && !empty($city)) {
                    $user->setBlood($blood);
                    $user->setCity($city);
                      if(!$user->donorSearchBylasttwo()){
                          $msg = 1;
                      }else{
                              $data = $user->donorSearchBylasttwo();
                              $msg = 2;
                            
                      }
                }else {
                      $user->setBlood($blood);
                      if(!$user->donorSearchByone()){
                          $msg = 1;
                      }else{
                              $data = $user->donorSearchByone();
                              $msg = 2;
                      }
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
               width: 120px;    
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
<?php if ($mseg == 'donor') {
  
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
   <?php }elseif ($mseg == 'member') {
   
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
   <?php }elseif ($mseg == 'admin') {
        
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
          <div class="panel panel-default card" style="border-radius: 0px;" >
             <center><h2>Find a blood donor</h2></center>
            <div class="panel-body">
            <?php   if ($msg == 1) {

                                echo "<center><h5><b style='color:red;'>No Donor Found</b></h5></center>";

                              }elseif ($msg == 3) {
                                echo "<center><h3><b style='color:red;'>* Blood group can not be empty </b></h3></center>";
                              }?>
               <div class="row">
                  <div class="col-md-offset-3 col-md-6">
                    <div class="panel panel-default">
                      <div class="panel-body card" style="background-color: #D8D8D8;">
                          <form role="form" action="" method="post">
                             <div class="form-group ">
                                <label for="blood">Blood Group</label>
                                <select class="form-control" name="blood" value="" >
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
                            <div class="form-group ">
                                <label for="division">Division</label>
                                <select class="form-control" name="division" value="" >
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
                                  <select class="form-control" name="city" value="" >
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
                                 <?php if ($user->getSession()) {
                                  ?>
                                  <center><input type="submit" name="search" value="search" class="btn btn-info  "></input></center>
                                   <?php }else{ ?>
                                  <center><input type="submit" value="search" class="btn btn-info" onclick="alert('You must be logged in before you send any blood request .')" ></input></center>
                                   <?php } ?>
                          </form>
                        </div>
                     </div>     
                  </div>
                </div>

                    <?php 
                           if ($msg == 2) {
                              
                           foreach ($data as $key => $profile) {
                         
                    ?>
                        <hr>
                        <div class="row">
                          <div class="col-md-12">
                            <div class="panel panel-default card">
                              <div class="panel-body" style="background-color: #D8D8D8;">
                                 <b> Donor&nbsp; :&nbsp;</b>    <b style="color: red;"><?php echo $profile['name']; ?></b></br></br>

                                <div       class="col-md-6 table-responsive">
                                  <table class="table">
                                        <tr>
                                          <th><b>User ID</b></th>
                                          <th>:</th>
                                          <td><b style='color:#21610B;'><?php echo $profile['userid']; ?></b></td>
                                        </tr>

                                        <tr>
                                          <th><b>Full Name</b></th>
                                          <th>:</th>
                                          <td><b style='color:#21610B;'><?php echo $profile['name']; ?></b></td>
                                        </tr>
                                        <tr>
                                          <th><b>Blood Group</b></th>
                                          <th>:</th>
                                          <td><b style='color:#21610B;'><?php echo $profile['blood']; ?></b></td>
                                        </tr>
                                        <tr>
                                          <th><b>Weight</b></th>
                                          <th>:</th>
                                          <td><b style='color:#21610B;'><?php echo $profile['weight']; ?>&nbsp;Kg</b></td>
                                        </tr>

                                        <tr>
                                          <th><b>Age</b></th>
                                          <th>:</th>
                                          <td><b style='color:#21610B;'><?php echo $profile['age']; ?>&nbsp;Years</b></td>
                                        </tr>

                                        <tr>
                                          <th><b>Gender</b></th>
                                          <th>:</th>
                                          <td><b style='color:#21610B;'><?php echo $profile['gender']; ?></b></td>
                                        </tr>     
                                         
                                  </table>
                                </div>
                               
                                 <div class="col-md-6 table-responsive">
                                  <table class="table">
                                            <tr>
                                              <th><b>Division</b></th>
                                              <th>:</th>
                                              <td><b style='color:#21610B;'><?php echo $profile['division']; ?></b></td>
                                            </tr>
                                            <tr>
                                              <th><b>City</b></th>
                                              <th>:</th>
                                              <td><b style='color:#21610B;'><?php echo $profile['city']; ?></b></td>
                                            </tr>
                                            <tr>
                                              <th><b>Address</b></th>
                                              <th>:</th>
                                              <td><b style='color:#21610B;'><?php echo $profile['address']; ?></b></td>
                                            </tr>

                                            <tr>
                                              <th><b>Email</b></th>
                                              <th>:</th>
                                              <td><b style='color:#21610B;'><?php echo $profile['email']; ?></b></td>
                                            </tr>

                                            <tr>
                                              <th><b>Number</b></th>
                                              <th>:</th>
                                              <td><b style='color:#21610B;'>0<?php echo $profile['mobile']; ?></b></td>
                                            </tr>
                                            <tr>
                                            <tr>
                                              <th><b>Availability </b></th>
                                              <th>:</th>
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
                                </div>




                              </div>
                             </div>
                            </div>
                        </div>    
                        <?php }

                              }
                                  ?>

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