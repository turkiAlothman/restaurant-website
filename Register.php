<?php

 $user = $password =""; $c ="";
if($_SERVER["REQUEST_METHOD"]=="POST"){
if(empty($_POST["name"]))
$user="fill user name !!";
if(empty($_POST["password"]))
$user="fill password !!";

$x= $_POST["name"];
$y= $_POST["email"];
$z= $_POST["password"];

$r= $_POST["rating"];

if("Customer"==$r)
     $r=0;
 else $r=1;


$servername = "localhost";
    $username = "root";
    $paswword = "";
    $dbName = "logindb";


    $conn =  mysqli_connect($servername, $username, $paswword, $dbName);
    if(!$conn){
      die("there is error in connection");
    }
    $fing= "SELECT * FROM user WHERE email = '$y' ";
    
    
    if ($result=mysqli_query($conn,$fing))
    {
     if(mysqli_num_rows($result)== 1)
         $c=" <h1 style='color:red;'> this email already exist ! </h1> " ;
      else{
    
          mysqli_query($conn,"INSERT INTO user(name,email,password,role)VALUES('$x','$y','$z',$r)");
          $c=" <h1 style='color:green;'> the account is created succesfuly </h1> " ;
      }
         
      
 //   $rowcount=mysqli_num_rows($result);
   // printf("Result set has %d rows.\n",$rowcount);

    // Free result set
    mysqli_free_result($result);
    }

  }
  
  
  ?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <title>Register page</title>
  <link rel="shortcut icon" type="image/x-icon" href="img/Login.jpg">
  <!-- owl carousel css  -->
  <link rel="stylesheet" href="css/owl.carousel.min.css">
  <link
    href="https://fonts.googleapis.com/css?family=Libre+Baskerville|Open+Sans|Varela+Round|Handlee|Kaushan+Script&display=swap"
    rel="stylesheet">
  <!-- bootstrap css  -->
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <!-- main css  -->
  <link rel="stylesheet" href="css/style.css">
  <!-- scrollreveal > always include in the head  -->
  <script src="https://unpkg.com/scrollreveal@4"></script>

</head>


<body>
  <div class="main-content">
    <div class="header-body hero-wrap" style="background:linear-gradient(rgba(0,0,0,.5), rgba(0,0,0,.5)), 
                                                        url('img/Login.jpg') bottom center/cover no-repeat; height: 600px;">
      <nav class="navbar navbar-expand-lg d-flex">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#myNavbar">
          <!-- <div class="toggler-btn">
            <div class="bar bar1"></div>
            <div class="bar bar2"></div>
            <div class="bar bar3"></div>
          </div> -->
        </button>

        <p  class="navbar-brand order-lg-1 pl-lg-5">Restaurants world</p>
        <div class="order-lg-3 pr-3 pr-sm-5 ">
         
        </div>
        <div class="collapse navbar-collapse order-lg-2 justify-content-center" id="myNavbar">
          <ul class="navbar-nav">
            
            <li class="nav-item">
              <a href="Login page.php" class="nav-link text-capitalize">Login</a>
            </li>
          </ul>
        </div>
       
      </nav>
      <div>
        <input type="text" class="search-header__input" placeholder="Search..">
        <button class="btn search-header__close"><i class="fas fa-times" aria-hidden="true"></i></button>
      </div>

      <hr class="nav-line">

      <header class="header-wrap">
        <div class="container-fluid">
          <div class="row  ">
            <div class="col-md-12">
              <div class="header-wrap__text">
                <h1 class="bread">Register</h1>
              </div>
            </div>
          </div>
        </div>
      </header>
    </div>
    
    <section class="contact-main">
      <div class="container-fluid">
        <div class="row py-4 justify-content-between">
          <div class="col-md-3 contact-main__first animate text-center py-3">
            <i class="fas fa-globe-americas welcome-info-icon display-4 p-1 my-0"></i>
            <h5 class="subheading py-1">Contact us</h5>
            <p>SWE 381 Project</p>
            
            <div class="social pt-2 ">
              <!-- <a href="#"><i class="fab fa-facebook-f mx-2"></i></a>
              <a href="#"><i class="fab fa-instagram mx-2"></i></a> -->
            </div>
          </div>
          <br> <br> <br> <br> <br> <br> <br> <br> <br> <br>

          <div class="col-md-6 middle add-ornament-top add-ornament-bottom py-3">
            <h5 class="subheading text-center py-3">Register!</h5>
           <?php echo $c;  ?>
            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" class="needs-validation contact-form" novalidate>
              <div class="form-row">
                <div class="col-md-4 mb-3 col-xs-12">
                  <label for="validationCustom01">Name</label>
                  <input type="text" name="name" class="form-control" id="validationCustom01" placeholder="First name" required>
                  <div class="valid-feedback sr-only">Looks good!</div>
                  <div class="invalid-feedback">Please enter your name</div>
                </div>
                <div class="col-md-4 mb-3">
                  <label for="validationCustom02">Email</label>
                  <input type="email" name="email" class="form-control" id="validationCustom02" placeholder="Email address" required>
                  <div class="valid-feedback sr-only">Looks good!</div>
                  <div class="invalid-feedback">Please enter your email address</div>
                </div>
                <div class="col-md-4 mb-3">
                  <label for="pass">Password</label>
                  <input type="password" name="password" class="form-control" id="pass" placeholder="Password" required>
                  <div class="valid-feedback sr-only">Looks good!</div>
                  <div class="invalid-feedback">Please enter your password</div>
                
                </div>
              <label for="validationCustom02" style="font-size: 15px;">User type  
                    <select name="rating">
                      <option selected >Customer</option>
                      <option>Manager</option>
                    </select>

                  </label>
              </div>
              
                <div class="col-12">
                  <button class="btn btn-button btn-bfr btn-anim d-flex mx-auto" type="submit">Register now</button>
                </div>
              </div>
            </form>
          </div>

        </div>
      </div>
    </section>

<br><br>
  

    

    <section class="menyu-content pb-5">
      
      <div class="container ">
        <div class="menyu-content__items add-ornament-top add-ornament-bottom mt-5">
         
        </div>
    </section>

    

    <!-- <footer id="footer">
      <h1 class="heading footer-heading text-center py-4">Coffee World</h1>
      <div class="container-fluid text-white ">
        <div class="row text-center d-flex">
          <div class="footer-col col-md-4 col-sm-6 order-sm-1 pb-4">
            <h3 class="heading">Address here</h3>
            <p class="footer-text">Complete Address</p>
            <a href="about.html"><button class="btn btn-button">Details</button></a>
          </div>
          <div class="footer-col col-md-4 col-sm-12 order-sm-3">
            <h3 class="heading">Subscribe us</h3>
            <form>
              <div class="form-group">
                <input type="email" class="form-control footer-email" id="exampleInputEmail1"
                  aria-describedby="emailHelp" placeholder="Email address" required>
                <button class="btn btn-button footer-btn">Subscribe</button>
              </div>
              <small id="emailHelp" class="form-text text-muted pb-3">Subscribe us for updates</small>
            </form>
          </div>
          <div class="footer-col col-md-4 col-sm-6 order-sm-2">
            <h3 class="heading">Contacts us</h3>
            <p class="happyhour-phone">number here</p>
            <a href="">
              <p class="footer-text footer-contact-mail">email here</p>
            </a>
            <div
              class="direction-social-icons footer-social d-flex align-items-center justify-content-between mx-auto mb-3">
              <a href="#"><i class="fab fa-facebook-f "></i></a>
              <a href="#"><i class="fab fa-instagram"></i></a>
            </div>
          </div>
        </div>
        <div class="row text-center pt-md-0 pt-xl-3">
          <div class="col-md-12">
            <p class="footer-text">Copyright &copy;
              <script>document.write(new Date().getFullYear());</script>
              Created by
              <a href="http://webworld.az" target="_blank" class="ww">Z1TECHS</a> -Zaeem Naveed</p>
          </div>
        </div>
      </div>
    </footer> -->
    <div class="search-overlay"></div>

    <!-- loader -->
    <div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px">
        <circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee" />
        <circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10"
          stroke="#cb7152" /></svg></div>

    <script src="js/jquery-3.4.1.min.js"></script>
    <script src="js/bootstrap.bundle.min.js"></script>
    <!-- cubeportfolio mosaic -->
    <!-- <script type="text/javascript"
            src="http://scriptpie.com/cubeportfolio/live-preview/cubeportfolio/js/jquery.cubeportfolio.min.js"></script>
          <script type="text/javascript"
            src="http://scriptpie.com/cubeportfolio/live-preview/templates/mosaic/js/main.js"></script> -->
    <script src="js/jquery.magnific-popup.min.js"></script>
    <script src="js/owl.carousel.min.js"></script>
    <!-- font awesome js  -->
    <script src="js/all.js"></script>
    <script src="js/jquery.mb.YTPlayer.min.js"></script>
    <script src="js/script.js"></script>
</body>

</html>