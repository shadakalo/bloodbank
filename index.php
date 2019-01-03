<?php
            session_start();
            spl_autoload_register(function($class){
             include "classes/".$class.".php";
           });

?>
<?php 
      $user = new Donor();
      $msg = '';
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
      .btn-primary{
       background-color: red;
             }
     .btn-primary:hover, .btn-primary:focus, .btn-primary:active, .btn-primary.active, .open > .dropdown-toggle.btn-primary {
        background: #FF0000;
        }
       .panelwidth {
          width: 300px;
          
            }
    
        .btn-block{
          text-align: justify;

                  }
                  .btn1
                {
              background-color: white;
              border-color: white;
              color: black;
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
    <div class="container-fluid" >
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


</div>
  
        <div class= "col-md-offset-1 col-md-10" style="position: relative;bottom: 21px;">
      <div class=" panel panel-default" style="border-radius: 0px;">
         <div class="panel-body">
            <div class="row">
              <div class=" col-md-12">
                <div class="carousel" data-ride='carousel' id='carousel-ex'>
                  <ol class="carousel-indicators">
                    <li data-target='#carousel-ex' data-slide-to='0' class="active"></li>
                    <li data-target='#carousel-ex' data-slide-to='1'></li>
                    <li data-target='#carousel-ex' data-slide-to='2'></li>
                   </ol>
                  <div class="carousel-inner">
                      <div class="item active">
                        <img src="images/003.jpg" alt="image">
                       </div>
                       <div class="item">
                         <img src="images/004.jpg" alt="image">
                       </div>
                       <div class="item">
                        <img src="images/007.jpg" alt="image">
                      </div>
        
                        <a href="#carousel-ex" class="left carousel-control" data-slide='prev'>
                          <span class="glyphicon glyphicon-chevron-left"></span>
                        </a>
                         <a href="#carousel-ex" class="right carousel-control" data-slide='next'>
                           <span class="glyphicon glyphicon-chevron-right"></span>
                        </a>
                   </div>
                 </div>
              </div>
           </div>
           <div class="row">
              <div class="col-md-6">
                <center><p style="font-size:30px; color:#8A0808; font-family:Haettenschweiler;">All About Blood Donation</p></center>
                 <p style="font-family:Monotype Corsiva;">Blood donation is a major concern to the society as donated blood is lifesaving for individuals who need it. Blood is scarce. There is a shortage to active blood donors to meet the need of increased blood demand. Blood donation as a therapeutic exercise. Globally, approximately 80 million units of blood are donated each year. One of the biggest challenges to blood safety particularly is accessing safe and adequate quantities of blood and blood products. Safe supply of blood and blood components is essential, to enable a wide range of critical care procedures to be carried out in hospitals. Good knowledge about blood donation practices is not transforming in donating blood. Interactive awareness on blood donation should be organized to create awareness and opportunities for blood donation. Blood donation could be therefore recommended that voluntary blood donations as often as possible may be therapeutically beneficial to the donors in terms of thrombotic complications and efficient blood flow mechanisms. This is also a plus for blood donation campaigns.</p>

              </div>
              <div class="col-md-6">
              <center><p style="font-size:30px; color:#8A0808; font-family:Haettenschweiler;">Health Benefits Of Blood Donation</p></center>
              <p style="font-family:Monotype Corsiva;">
              Health benefits of donating blood include good health, reduced risk of cancer and hemochromatosis. It helps in reducing risk of damage to liver and pancreas. Donating blood may help in improving cardiovascular health and reducing obesity.
              Everyday blood transfusions take place that save lives of many people all over the world. About 5 million Americans need blood transfusion. Donating blood is good for health of donors as well as those who need it. It is important that blood donation takes place in hospital or clinic or blood bank presence of medical experts.  Donors should ensure that they are in good health to avoid any health issues post transfusion to those who use it.
              Donating blood can help in treating patients suffering from cancer, bleeding disorders, chronic anemia associated with cancer, sickle cell anemia and other hereditary blood abnormalities. It is important to know that human blood cannot be manufactured, people are the only source and that is why it is important to donate blood and help those who need it. It is also possible to store your own blood for your future needs. Make sure the blood is stored at a good blood bank.</p>
              </div>
           </div>
         </div>
       </div>
       </div>

  


<div class="col-md-offset-1 col-md-10" style="position: relative;bottom: 21px;" >
      
      <div class="col-md-4">
          <div class="panel panel-default card " style="border-radius: 0px;">
            <div class="panel-heading">
             <h3 class="panel-title">
                Leave a feedback
             </h3>
            </div>
           <div class="panel-body">
             <form role="form" action="" method="post">
                <div class="form-group">     
                   <label for="name">
                     Name
                   </label>
                  <input class="form-control input" name="name" type="text" />
                </div>
                <div class="form-group">
                    <label for="email">
                     Email
                     </label>
                   <input class="form-control input" name="email" type="email" />
                 </div>
                 <div class="form-group">
                  <label for="comment">Comment</label>
                    <textarea class="form-control input" name="comment" rows="3" cols="18"></textarea>
                 </div>
                 <input type="submit" name="submit" value="send message" class="btn btn-primary disabled "></input>
              </form>
            </div>
          </div>
      </div>

        <div class="col-md-4">
          <div class="panel panel-default card" style="border-radius: 0px;">
            <div class="panel-heading">
              <h3 class="panel-title">
                 Contact Us
              </h3>
            </div>
            <div class="panel-body">
              <form role="form" action="" method="post">
                <div class="form-group">
                 <label for="name">
                   Name
                  </label>
                 <input class="form-control  input" name="name" type="text" />
               </div>
               <div class="form-group">
                  <label for="email">
                     Email
                  </label>
                  <input class="form-control  input" name="email" type="email" />
               </div>
               <div class="form-group">
                 <label for="phone">Phone</label>
                  <input class="form-control  input" name="phone" type="text" />
               </div>
               <div class="form-group">
                 <label for="address">Address</label>
                 <input class="form-control  input" name="address" type="text" />
               </div>
               <input type="submit" name="submit" value="send message" class="btn btn-primary disabled "></input>
              </form>
        </div>
      </div>
     </div>
   
        <div class="col-md-4  ">
          <div class="panel panel-default card " style="border-radius: 0px;">
            <div class="panel-heading">
              <h3 class="panel-title">
                 Connect With Us
              </h3>
            </div>
            <div class="panel-body">
               <br/>
               <a class="btn1 btn btn-block btn-social btn-twitter">
                <span class="fa fa-twitter"> </span>  TWITTER
               </a>
               <a class="btn1 btn btn-block btn-social btn-facebook">
                <span class="fa fa-facebook"></span>  FACEBOOK 
               </a>
                <a class="btn1 btn btn-block btn-social btn-instagram">
                 <span class="fa fa-instagram"></span>    INSTAGRAM 
               </a>
               <a class="btn1 btn btn-block btn-social btn-linkedin">
               <span class="fa fa-linkedin"></span>    LINKEDIN   
                </a>
                <br/>
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




