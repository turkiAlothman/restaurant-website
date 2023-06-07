<?php

 $user = $password =""; $c ="";
if($_SERVER["REQUEST_METHOD"]=="POST"){
if(empty($_POST["name"]))
$user="fill user name !!";
if(empty($_POST["password"]))
$user="fill password !!";

$x= $_POST["name"];
$y= $_POST["password"];
$z= $_POST["rating"];

$servername = "localhost";
    $username = "root";
    $paswword = "";
    $dbName = "logindb";

 if("Customer"==$z)
     $z=0;
 else $z=1;

    $conn =  mysqli_connect($servername, $username, $paswword, $dbName);
    if(!$conn){
      die("there is error in connection");
    }
    $fing= "SELECT * FROM user WHERE email = '$x' and password ='$y' and role = $z";
    
    
    if ($result=mysqli_query($conn,$fing))
    {
     if(mysqli_num_rows($result)!= 1)
         $c=" <h1 style='color:red;'> email or password is not correct </h1> " ;
      else{
 if(0==$z)
header("Location: http://localhost/Ourr%20project/Home%20page.php");
 else          
          header("Location: http://localhost/Ourr%20project/Admin-index.php");
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
  <title>Restaurants world</title>
  <link rel="shortcut icon" type="image/x-icon" href="img/Login.jpg">
  
 
 
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
                <h1 class="bread">Welcome</h1>
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
            <p>SWE 381 project</p>
            <br><br><br><br>
            
           
          </div>

          <div class="col-md-6 middle add-ornament-top add-ornament-bottom py-3">
            <h5 class="subheading text-center py-3">Login!</h5>
            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" class="needs-validation contact-form" novalidate>
              <?php echo $c; ?>
                <div class="form-row">
                <div class="col-md-4 mb-3">
                  
                    <label for="validationCustom02">Email</label>
                    <input type="email" name="name" class="form-control" id="validationCustom02"  placeholder="Email address" required>
                  <div class="valid-feedback sr-only">Looks good!</div>
                  <div class="invalid-feedback">Please enter your email address</div>
                </div>
                <div class="col-md-4 mb-3">
                  <label for="validationCustom02">Password</label>
                  <input type="password" name="password" class="form-control"  id="validationCustom02" placeholder="Password" required>
                  <div class="valid-feedback sr-only">Looks good!</div>
                  <div class="invalid-feedback">Please enter your password</div>
                  
                </div>
              </div>
           
              <div class="form-row">
               
                <div class="form-group sr-only">
                 
                </div>
                <div class="col-12">
                  <label for="validationCustom02" style="font-size: 15px;">User type  
                    <select name="rating">
                      <option selected >Customer</option>
                      <option>Manager</option>
                    </select>

                  </label>
                  
                  <button class="btn btn-button btn-bfr btn-anim d-flex mx-auto" type="submit">submit</button>
                  <br>
                  <button class="btn btn-button btn-bfr btn-anim d-flex mx-auto"  ><a href="http://localhost/Ourr%20project/Register.php">Don't have an account?</a></button>
                </div>
              </div>
            </form>
          </div>

        </div>
      </div>
    </section>

<br><br>
  
    <!-- <div class="search-overlay"></div> -->

    <!-- loader -->
    <!-- <div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px">
        <circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee" />
        <circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10"
          stroke="#cb7152" /></svg></div> -->

    <script src="js/jquery-3.4.1.min.js"></script>
    <script src="js/bootstrap.bundle.min.js"></script>
    <script src="js/jquery.magnific-popup.min.js"></script>
    <script src="js/owl.carousel.min.js"></script>
   
    <script src="js/all.js"></script>
    <script src="js/jquery.mb.YTPlayer.min.js"></script>
    <script src="js/script.js"></script>
</body>

</html>