<?php
$df=0;
$ff="";
$w="";
$servername = "localhost";
    $username = "root";
    $paswword = "";
    $dbName = "logindb";


    $conn =  mysqli_connect($servername, $username, $paswword, $dbName);
    if(!$conn){
    die("there is error in connection");}

    
    if($_SERVER["REQUEST_METHOD"]=="POST"){
    $spec = $_POST["spec"];
    $rate = $_POST["rate"];
    $loc = $_POST["loc"];
    
    if($spec =="Food Speciality"){

    $spec="Burger' OR spec = 'Steak' OR spec = 'Pizza' OR spec = 'Pasta";}

    if($rate =="Rating" )
       $rate = 0.0;
    
    else{ $rate =$rate+0.0;}
    
    
        if($loc != "Location")
            $ff ="ORDER BY location ASC";
        $result = mysqli_query($conn,"SELECT * FROM restaurant WHERE (spec = '$spec' ) $ff");
        
        $c="";
while($row = mysqli_fetch_array($result)){
    $logo = $row["logo"];
    $name = $row["name"];
    #$rate = $row["rate"];
    $spec = $row["spec"];
    $locc = $row["location"];
   
 $k=mysqli_query($conn,"SELECT COUNT(rate) AS 'count' FROM review WHERE resname = '$name'");
    $rr = mysqli_fetch_array($k);
     $count = $rr['count'];
   if($count!=0){
   $k=mysqli_query($conn,"SELECT AVG(rate) AS 'av' FROM review WHERE resname = '$name'");
   $rr = mysqli_fetch_array($k);
   $av = number_format($rr['av'],1) ;
   $df=$av;
   $av.=" stars";
   
   }
   
   else{
       $df=0;
   $av="not rated yet";}

       if($df >= $rate) {
    
    $c .= " <div class='col-md-6 col-lg-3 animate pb-4 pb-lg-0'>
            <img src='$logo' class='d-block w-100' alt='menu-image'>
            <div class='menu-name pt-3' data-toggle='modal' data-target='#modalbox'>
              <h3 class='menu-title '><a href='Menu.php?res=$name&pic=$logo'>$name</a></h3>
              <p> Restaurant rate: <span id='categroized' style='color: rgba(196, 89, 2, 0.897);'>$av</span></p>
              <p>Food speciality: <span id='categroized' style='color: rgba(196, 89, 2, 0.897);'>$spec</span></p> 
              <p>Lcation: <span id='Location' style='color: rgba(148, 95, 53, 0.897);'>$locc KM</span></p>
              <br><br>
            </div>
       </div>  " ; }
} 

if($c=="")
$w ="<h1 style='color:red;'> No restaurant found </h1>";    
   

    }

    else {
    
$result = mysqli_query($conn,"SELECT * FROM restaurant");
$c="";
while($row = mysqli_fetch_array($result)){
    $logo = $row["logo"];
    $name = $row["name"];
    $rate = $row["rate"];
    $spec = $row["spec"];
    $locc = $row["location"];
   
    $k=mysqli_query($conn,"SELECT COUNT(rate) AS 'count' FROM review WHERE resname = '$name'");
    $rr = mysqli_fetch_array($k);
     $count = $rr['count'];
   if($count!=0){
   $k=mysqli_query($conn,"SELECT AVG(rate) AS 'av' FROM review WHERE resname = '$name'");
   $rr = mysqli_fetch_array($k);
   $av = number_format($rr['av'],1) ;
   
   $av.=" stars";
   
   }
   
   else{ 
   $av="not rated yet";}
    
    $c .= " <div class='col-md-6 col-lg-3 animate pb-4 pb-lg-0'>
            <img src='$logo' class='d-block w-100' alt='menu-image'>
            <div class='menu-name pt-3' data-toggle='modal' data-target='#modalbox'>
              <h3 class='menu-title '><a href='Menu.php?res=$name&pic=$logo'>$name</a></h3>
              <p> Restaurant rate: <span id='categroized' style='color: rgba(196, 89, 2, 0.897);'>$av</span></p>
             
              <p>Food speciality: <span id='categroized' style='color: rgba(196, 89, 2, 0.897);'>$spec</span></p> 
              <p>Lcation: <span id='Location' style='color: rgba(148, 95, 53, 0.897);'> $locc KM</span></p>
              <br><br>
            </div>
          </div>  " ;
}

    }

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <title>Home page</title>
  <link rel="shortcut icon" type="image/x-icon" href="img/logo.png">
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
  <style>
    *{
    margin: 0;
    padding: 0;
}
.rate {
    float: left;
    height: 46px;
    padding: 0 10px;
}
.rate:not(:checked) > input {
    position:absolute;
    top:-9999px;
}
.rate:not(:checked) > label {
    float:right;
    width:1em;
    overflow:hidden;
    white-space:nowrap;
    cursor:pointer;
    font-size:30px;
    color:#ccc;
}
.rate:not(:checked) > label:before {
    content: 'â?… ';
}
.rate > input:checked ~ label {
    color: #ffc700;    
}
.rate:not(:checked) > label:hover,
.rate:not(:checked) > label:hover ~ label {
    color: #deb217;  
}
.rate > input:checked + label:hover,
.rate > input:checked + label:hover ~ label,
.rate > input:checked ~ label:hover,
.rate > input:checked ~ label:hover ~ label,
.rate > label:hover ~ input:checked ~ label {
    color: #c59b08;
}
.dropbtn {
  background-color: #4CAF50;
  color: white;
  padding: 16px;
  font-size: 16px;
  border: none;
  cursor: pointer;
}

.dropdown {
  position: relative;
  display: inline-block;
}

.dropdown-content {
  display: none;
  position: absolute;
  right: 0;
  background-color: #f9f9f9;
  min-width: 160px;
  box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
  z-index: 1;
}

.dropdown-content a {
  color: black;
  padding: 12px 16px;
  text-decoration: none;
  display: block;
}

.dropdown-content a:hover {background-color: #f1f1f1;}

.dropdown:hover .dropdown-content {
  display: block;
}

.dropdown:hover .dropbtn {
  background-color: #3e8e41;
}
/* Modified from: https://github.com/mukulkant/Star-rating-using-pure-css */
  </style>
</head>

<body>
  <div class="main-content">
    <div class="header-body hero-wrap" style="background:linear-gradient(rgba(0,0,0,.5), rgba(0,0,0,.5)), 
                                                        url('img/login.jpg') bottom center/cover no-repeat;">
      <nav class="navbar navbar-expand-lg d-flex">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#myNavbar">
          <div class="toggler-btn">
            <div class="bar bar1"></div>
            <div class="bar bar2"></div>
          </div>
        </button>

        <a href="Home page.php" class="navbar-brand order-lg-1 pl-lg-5" data-toggle="tooltip" data-placement="bottom"
          title="Restaurants world">Restaurants world</a>
       
        <div class="order-lg-3 pr-3 pr-sm-5 ">
        
        </div>
        <!-- <div class="cart-dropdown order-lg-3 pr-3 pr-sm-5">
          <div class="cart-dropdown-inner">
            <a href="">
              <span class="cart-icon"><i class="fas fa-shopping-cart"></i></span>
              <span class="cart-empty">0</span>
            </a>
          </div>
          <div class="cart-dropdown-out">
            <p class="cart-text text-center">No products in the card </p>
          </div>
        </div> -->
        <!-- links -->
        <div class="collapse navbar-collapse order-lg-2 justify-content-center" id="myNavbar">
          <ul class="navbar-nav">
            <li class="nav-item ">
              <a href="Home page.php" class="nav-link text-capitalize">Home</a>
            </li>
            <li class="nav-item">
              <a href="Login page.php" class="nav-link text-capitalize">Logout</a>
            </li>
          </ul>
        </div>
      </nav>
      <div>
        <input type="text" class="search-header__input" placeholder="Axtar">
        <button class="btn search-header__close"><i class="fas fa-times" aria-hidden="true"></i></button>
      </div>

      <hr class="nav-line">

      <header class="header-wrap">
        <div class="container-fluid">
          <div class="row  ">
            <div class="col-md-12">
              <div class="header-wrap__text">
                <h1 class="bread">Restaurant</h1>
              </div>
                <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" >   
<div class="dropdown" style="float:left; margin-left:100px;">

  <Select name="spec" class="dropbtn" style="background-color: #654321;">
   
    <div class="dropdown-content" style="left:0;">
  <option selected>Food Speciality</option>
  <option>Burger</option>
  <option>Steak</option>
  <option>Pizza</option>
  <option>Pasta</option>
  </Select>

  </div>


  <div class="dropdown" style="float:left;">
  
    <Select name="rate" class="dropbtn" style="background-color: #654321;">
      <div class="dropdown-content" style="left:0;">
    <option selected>Rating</option>
    <option>5</option>
    <option>4</option>
    <option>3</option>
    <option>2</option>
    <option>1</option>
    </Select>
  
    </div>

    <div class="dropdown" style="float:left;">
  
      <Select name="loc" class="dropbtn" style="background-color: #654321;">
        <div class="dropdown-content" style="left:0;">
      <option selected>Location</option>
      <option>Nearest</option>
      </Select>
    
      </div>
  
<br><br></br>
<div class="dropdown" style="float:left;margin-left: 40%;">
    <button type="submit" class="dropbtn" style="background-color: #654321;">Search</button>

</div>
</form>

            </div>
          </div>
        </div>
      </header>
    </div>

    <section class="menyu py-5 pt-sm-1">
      <div class="container">
      
        <h3 class="subheading heading-line animate text-center pt-4">Our Restaurants</h3>
      
        <div class="row py-4">
          <?php echo $c; ?>
           <?php echo $w ; ?>
            <!--
            <div class="col-md-6 col-lg-3 animate pb-4 pb-lg-0">
            <img src="img/Faisal.jpg" class="d-block w-100" alt="menu-image">
            <div class="menu-name pt-3" data-toggle="modal" data-target="#modalbox">
              <h3 class="menu-title "><a href="Menu.html">Faisal burger</a></h3>
              <div class="rate">
                <input type="radio" id="star5" name="rate" value="5" />
                <label for="star5" title="5">5 stars</label>
                <input type="radio" id="star4" name="rate" value="4" />
                <label for="star4" title="4">4 stars</label>
                <input type="radio" id="star3" name="rate" value="3" />
                <label for="star3" title="3">3 stars</label>
                <input type="radio" id="star2" name="rate" value="2" />
                <label for="star2" title="2">2 stars</label>
                <input type="radio" id="star1" name="rate" value="1" />
                <label for="star1" title="1">1 star</label>
              </div>
              <br><br>
              <p>Food speciality: <span id="categroized" style="color: rgba(196, 89, 2, 0.897);">Burger</span></p>
              <p>Lcation: <span id="Location" style="color: rgba(196, 89, 2, 0.897);">.... KM</span></p>
              <br><br>
            </div>
          </div>
          <div class="col-md-6 col-lg-3 animate pb-4 pb-lg-0">
            <img src="img/Raed.jpg" class="d-block w-100" alt="menu-image">
            <div class="menu-name pt-3" data-toggle="modal" data-target="#modalbox">
              <h3 class="menu-title "><a href="Menu.html">Raed burger</a></h3>
              <div class="rate">
                <input type="radio" id="star5" name="rate" value="5" />
                <label for="star5" title="5">5 stars</label>
                <input type="radio" id="star4" name="rate" value="4" />
                <label for="star4" title="4">4 stars</label>
                <input type="radio" id="star3" name="rate" value="3" />
                <label for="star3" title="3">3 stars</label>
                <input type="radio" id="star2" name="rate" value="2" />
                <label for="star2" title="2">2 stars</label>
                <input type="radio" id="star1" name="rate" value="1" />
                <label for="star1" title="1">1 star</label>
              </div>
              <br><br>
              <p>Food speciality: <span id="categroized" style="color: rgba(196, 89, 2, 0.897);">Burger</span></p>
              <p>Lcation: <span id="Location" style="color: rgba(148, 95, 53, 0.897);">.... KM</span></p>
              <br><br>
            </div>
          </div>
          <div class="col-md-6 col-lg-3 animate pb-4 pb-lg-0">
            <img src="img/Turki burger.jpg" class="d-block w-100" alt="menu-image">
            <div class="menu-name pt-3" data-toggle="modal" data-target="#modalbox">
              <h3 class="menu-title "><a href="Menu.html">Turki burger</a></h3>
              <div class="rate">
                <input type="radio" id="star5" name="rate" value="5" />
                <label for="star5" title="5">5 stars</label>
                <input type="radio" id="star4" name="rate" value="4" />
                <label for="star4" title="4">4 stars</label>
                <input type="radio" id="star3" name="rate" value="3" />
                <label for="star3" title="3">3 stars</label>
                <input type="radio" id="star2" name="rate" value="2" />
                <label for="star2" title="2">2 stars</label>
                <input type="radio" id="star1" name="rate" value="1" />
                <label for="star1" title="1">1 star</label>
              </div>
              <br><br>
              <p>Food speciality: <span id="categroized" style="color: rgba(196, 89, 2, 0.897);">Burger</span></p>
              <p>Lcation: <span id="Location" style="color: rgba(196, 89, 2, 0.897);">.... KM</span></p>
              <br><br>
            </div>
          </div>
          <div class="col-md-6 col-lg-3 animate pb-4 pb-lg-0">
            <img src="img/BurgerWeek.png" class="d-block w-100" alt="menu-image">
            <div class="menu-name pt-3" data-toggle="modal" data-target="#modalbox">
              <h3 class="menu-title "><a href="Menu.html">BurgerWeek</a></h3>
              <div class="rate">
                <input type="radio" id="star5" name="rate" value="5" />
                <label for="star5" title="5">5 stars</label>
                <input type="radio" id="star4" name="rate" value="4" />
                <label for="star4" title="4">4 stars</label>
                <input type="radio" id="star3" name="rate" value="3" />
                <label for="star3" title="3">3 stars</label>
                <input type="radio" id="star2" name="rate" value="2" />
                <label for="star2" title="2">2 stars</label>
                <input type="radio" id="star1" name="rate" value="1" />
                <label for="star1" title="1">1 star</label>
              </div>
              <br><br>
              <p>Food speciality: <span id="categroized" style="color: rgba(196, 89, 2, 0.897);">Burger</span></p>
              <p>Lcation: <span id="Location" style="color: rgba(196, 89, 2, 0.897);">.... KM</span></p>
              <br><br>
            </div>
          </div>
          <div class="col-md-6 col-lg-3 animate pb-4 pb-lg-0">
            <img src="img/Pasta.jpeg" class="d-block w-100" alt="menu-image">
            <div class="menu-name pt-3" data-toggle="modal" data-target="#modalbox">
              <h3 class="menu-title "><a href="Menu.html">Pasta bar</a></h3>
              <div class="rate">
                <input type="radio" id="star5" name="rate" value="5" />
                <label for="star5" title="5">5 stars</label>
                <input type="radio" id="star4" name="rate" value="4" />
                <label for="star4" title="4">4 stars</label>
                <input type="radio" id="star3" name="rate" value="3" />
                <label for="star3" title="3">3 stars</label>
                <input type="radio" id="star2" name="rate" value="2" />
                <label for="star2" title="2">2 stars</label>
                <input type="radio" id="star1" name="rate" value="1" />
                <label for="star1" title="1">1 star</label>
              </div>
              <br><br>
              <p>Food speciality: <span id="categroized" style="color: rgba(196, 89, 2, 0.897);">Pasta</span></p>
              <p>Lcation: <span id="Location" style="color: rgba(196, 89, 2, 0.897);">.... KM</span></p>
              <br><br>
            </div>
          </div>
          <div class="col-md-6 col-lg-3 animate pb-4 pb-lg-0">
            <img src="img/Pizza time.jpeg" class="d-block w-100" alt="menu-image">
            <div class="menu-name pt-3" data-toggle="modal" data-target="#modalbox">
              <h3 class="menu-title "><a href="Menu.html">Pizza Time</a></h3>
              <div class="rate">
                <input type="radio" id="star5" name="rate" value="5" />
                <label for="star5" title="5">5 stars</label>
                <input type="radio" id="star4" name="rate" value="4" />
                <label for="star4" title="4">4 stars</label>
                <input type="radio" id="star3" name="rate" value="3" />
                <label for="star3" title="3">3 stars</label>
                <input type="radio" id="star2" name="rate" value="2" />
                <label for="star2" title="2">2 stars</label>
                <input type="radio" id="star1" name="rate" value="1" />
                <label for="star1" title="1">1 star</label>
              </div>
              <br><br>
              <p>Food speciality: <span id="categroized" style="color: rgba(196, 89, 2, 0.897);">Pizza</span></p>
              <p>Lcation: <span id="Location" style="color: rgba(196, 89, 2, 0.897);">... KM</span></p>
              <br><br>
            </div>
          </div>
          <div class="col-md-6 col-lg-3 animate pb-4 pb-lg-0">
            <img src="img/Pizza 3.jpeg" class="d-block w-100" alt="menu-image">
            <div class="menu-name pt-3" data-toggle="modal" data-target="#modalbox">
              <h3 class="menu-title "><a href="Menu.html">Pizza guy</a></h3>
              <div class="rate">
                <input type="radio" id="star5" name="rate" value="5" />
                <label for="star5" title="5">5 stars</label>
                <input type="radio" id="star4" name="rate" value="4" />
                <label for="star4" title="4">4 stars</label>
                <input type="radio" id="star3" name="rate" value="3" />
                <label for="star3" title="3">3 stars</label>
                <input type="radio" id="star2" name="rate" value="2" />
                <label for="star2" title="2">2 stars</label>
                <input type="radio" id="star1" name="rate" value="1" />
                <label for="star1" title="1">1 star</label>
              </div>
              <br><br>
              <p>Food speciality: <span id="categroized" style="color: rgba(196, 89, 2, 0.897);">Pizza</span></p>
              <p>Lcation: <span id="Location" style="color: rgba(196, 89, 2, 0.897);">.... KM</span></p>
              <br><br>
            </div>
          </div>
          <div class="col-md-6 col-lg-3 animate pb-4 pb-lg-0">
            <img src="img/Stake 2.jpeg" class="d-block w-100" alt="menu-image">
            <div class="menu-name pt-3" data-toggle="modal" data-target="#modalbox">
              <h3 class="menu-title "><a href="Menu.html">Stake house</a></h3>
              <div class="rate">
                <input type="radio" id="star5" name="rate" value="5" />
                <label for="star5" title="5">5 stars</label>
                <input type="radio" id="star4" name="rate" value="4" />
                <label for="star4" title="4">4 stars</label>
                <input type="radio" id="star3" name="rate" value="3" />
                <label for="star3" title="3">3 stars</label>
                <input type="radio" id="star2" name="rate" value="2" />
                <label for="star2" title="2">2 stars</label>
                <input type="radio" id="star1" name="rate" value="1" />
                <label for="star1" title="1">1 star</label>
              </div>
              <br><br>
              <p>Food speciality: <span id="categroized" style="color: rgba(196, 89, 2, 0.897);">Steak</span></p>
              <p>Lcation: <span id="Location" style="color: rgba(196, 89, 2, 0.897);">... KM</span></p>
              <br><br>
            </div>
          </div>
          <div class="col-md-6 col-lg-3 animate pb-4 pb-lg-0">
            <img src="img/Steak 1.jpeg" class="d-block w-100" alt="menu-image">
            <div class="menu-name pt-3" data-toggle="modal" data-target="#modalbox">
              <h3 class="menu-title "><a href="Menu.html">Stake Grill</a></h3>
              <div class="rate">
                <input type="radio" id="star5" name="rate" value="5" />
                <label for="star5" title="5">5 stars</label>
                <input type="radio" id="star4" name="rate" value="4" />
                <label for="star4" title="4">4 stars</label>
                <input type="radio" id="star3" name="rate" value="3" />
                <label for="star3" title="3">3 stars</label>
                <input type="radio" id="star2" name="rate" value="2" />
                <label for="star2" title="2">2 stars</label>
                <input type="radio" id="star1" name="rate" value="1" />
                <label for="star1" title="1">1 star</label>
              </div>
              <br><br>
              <p>Food speciality: <span id="categroized" style="color: rgba(196, 89, 2, 0.897);">Stake</span></p>
              <p>Lcation: <span id="Location" style="color: rgba(196, 89, 2, 0.897);">... KM</span></p>
              <br><br>
            </div>
          </div>
         
          -->
          
        </div>
      </div>
    </section>
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