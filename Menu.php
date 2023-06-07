<?php  

$servername = "localhost";
    $username = "root";
    $paswword = "";
    $dbName = "logindb";


    $conn =  mysqli_connect($servername, $username, $paswword, $dbName);
    if(!$conn){
    die("there is error in connection");}

$res= $_GET["res"];
$pic= $_GET["pic"];

if($_SERVER["REQUEST_METHOD"]=="POST"){
$nam = $_POST["nam"];
$com = $_POST["com"];
$rate = $_POST["rate"];

mysqli_query($conn,"INSERT INTO review VALUES ('$res','$nam','$com',$rate) "); 
     


}

 
   
    $result = mysqli_query($conn,"SELECT * FROM menu WHERE resname ='$res' "); 
     $d="";
     $f="";
    while($row = mysqli_fetch_array($result)){
    $des = $row["des"];
    $price = $row["price"];
    $name = $row["name"];
    $kind = $row["kind"];
    
    if($kind ==0){
        
        $d .=" <div class='menu-name pt-2 d-flex justify-content-between align-items-center' data-toggle='modal'
                data-target='#modalbox'>
                <h3 class='menu-title '>$name</h3>
                <span class='menu-item-price align-self-end'>$price</span>
              </div>
                <p class='menu-description'></p> ";
        
        
        
    }
    else{
        
        
       $f .= " <div class='menu-name pt-2 d-flex justify-content-between align-items-center' data-toggle='modal'
                data-target='#modalbox'>
                <h3 class='menu-title '>$name</h3>
                <span class='menu-item-price align-self-end'>$price</span>
              </div>
               <p class='menu-description'>$des</p> ";
              
               
               
                
        
        
        
        
    }
   
    
    
    
    }
     
    $m="";
    $yy = mysqli_query($conn,"SELECT * FROM review WHERE resname ='$res' ");
    while($roww = mysqli_fetch_array($yy)){
    $nemee= $roww["name"];
    $commentt = $roww["comment"];
    $ratee = $roww["rate"];
    
    

    $m.= "<div class='menu-name pt-3 d-flex justify-content-between align-items-center' data-toggle='modal'
                data-target='#modalbox'>
                <h3 class='menu-title '>$nemee</h3>
              </div>
              <p class='menu-description'>$commentt <span class='subheading'> $ratee/5 stars </span> </p>";
    
    
    }
    
 
 ?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <title>Restaurant description </title>
  <link rel="shortcut icon" type="image/x-icon" href="<?php echo $pic; ?>">
  <!-- owl carousel css  -->
  <link rel="stylesheet" href="css/owl.carousel.min.css">
  <!-- mosaic gallery-->
  <!-- <link rel="stylesheet" href="http://scriptpie.com/cubeportfolio/live-preview/cubeportfolio/css/cubeportfolio.min.css"> -->
  <!-- google fonts Libre+Baskerville, Open+Sans, Varela+Round, Kaushan+Script -->
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
    body {font-family: Arial, Helvetica, sans-serif;}
    
    /* The Modal (background) */
    .modal {
      display: none; /* Hidden by default */
      position: fixed; /* Stay in place */
      z-index: 1; /* Sit on top */
      padding-top: 100px; /* Location of the box */
      left: 0;
      top: 0;
      width: 100%; /* Full width */
      height: 100%; /* Full height */
      overflow: auto; /* Enable scroll if needed */
      background-color: rgb(0,0,0); /* Fallback color */
      background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
    }
    
    /* Modal Content */
    .modal-content {
      background-color: #fefefe;
      margin: auto;
      padding: 20px;
      border: 1px solid #888;
      width: 80%;
    }
    
    /* The Close Button */
    .close {
      color: #aaaaaa;
      float: right;
      font-size: 28px;
      font-weight: bold;
    }
    
    .close:hover,
    .close:focus {
      color: #000;
      text-decoration: none;
      cursor: pointer;
    }
    </style>
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
    content: '★ ';
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

  </style>
</head>

<body>
  <div class="main-content">
    <div class="header-body hero-wrap" style="background:linear-gradient(rgba(0,0,0,.5), rgba(0,0,0,.5)), 
                                                        url('<?php echo $pic; ?>') bottom center/cover no-repeat; height: 700px;  ">
      <nav class="navbar navbar-expand-lg d-flex">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#myNavbar">
          <div class="toggler-btn">
            <div class="bar bar1"></div>
            <div class="bar bar2"></div>
          </div>
        </button>

        <a href="menu.php" class="navbar-brand order-lg-1 pl-lg-5" data-toggle="tooltip" data-placement="bottom"
          title="Coffee World">Restaurants world</a>
        <!-- data-html="true" yazaraq,title-da html taglarden istifade ederek tooltipde deyisiklik etmek olar-->

        <div class="order-lg-3 pr-3 pr-sm-5 ">
        
        </div>
 
        <div class="collapse navbar-collapse order-lg-2 justify-content-center" id="myNavbar">
          <ul class="navbar-nav">
            <li class="nav-item ">
              <a href="Home page.php" class="nav-link text-capitalize">Home</a>
            </li>
            <li class="nav-item ">
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
                <h1 class="bread"><?php echo $res; ?></h1>
              </div>
              

<br><br></br>



            </div>
          </div>
        </div>
      </header>
    </div>

    <section class="menyu py-5 pt-sm-1">
      <div class="container">
        <h3 class="subheading heading-line animate text-center pt-4" style="margin-bottom: -30px;">Our menu</h3>
      </div>
    </section>

    <section class="menyu-content pb-5">
      
      <div class="container ">
        <div class="menyu-content__items add-ornament-top add-ornament-bottom mt-5">
          <div class="row py-4">
              <div class="col-lg-4 menu-item"> <!-- food -->   
              <h5 class="subheading "><u>Food & sweet</u></h5>
             <?php echo $f; ?>
              <!--  
              <div class="menu-name pt-2 d-flex justify-content-between align-items-center" data-toggle="modal"
                data-target="#modalbox">
                  
                <h3 class="menu-title " id="myBtn">Chicken burger</h3>
          
             
              <span class="menu-item-price align-self-end">8$</span>
              </div>
              <p class="menu-description">Chicken burger with special sauce </p>
              
              -->
             
            </div>
            <div class="col-lg-4 menu-item">
              <h5 class="subheading "><u>Drinks</u></h5>
             <?php echo $d; ?>
              <!--  
              <div class="menu-name pt-2 d-flex justify-content-between align-items-center" data-toggle="modal"
                data-target="#modalbox">
                <h3 class="menu-title ">Water</h3>
                <span class="menu-item-price align-self-end">0.5$</span>
              </div>
              
              -->
              
              
            
            </div>
          </div>
        </div>
    </section>
    <div class="container">
      <h3 class="subheading heading-line animate text-center pt-4" style="margin-bottom: -30px;">Customers' comments</h3>
    </div>
    <section class="menyu-content pb-5">
      
      <div class="container ">
        <div class="menyu-content__items add-ornament-top add-ornament-bottom mt-5">
          <div class="row py-4">
            <div class="col-lg-4 menu-item">
              <h5 class="subheading "><u>Customer Comments</u></h5>
              
              <?php echo $m; ?>
            
            </div>
          </div>
        </div>
    </section>
    <div class="container">
      <h3 class="subheading heading-line animate text-center pt-4" style="margin-bottom: -30px;">Rate our restaurant</h3>
    </div>
    <section class="menyu-content pb-7">
      
      <div class="container ">
        <div class="menyu-content__items add-ornament-top add-ornament-bottom mt-5">
          <div class="row py-4">
            <div class="col-lg-7 menu-item">
              <h5 class="subheading " style="text-align: center;"><u>Add comment and rate the restaurant</u></h5>
              <div class="col-md-12 mb-3">
                  <form name="Rating" action="<?php echo "Menu.php?res=$res&pic=$pic";  ?>" method="post" >
          <label for="phone">Name:</label>
          <input type="text" name="nam" class="form-control" id="phone" placeholder="name" required>
          <br>
          <label for="phone">Your opinion:</label>
          <input type="text" name="com" class="form-control" id="phone" placeholder="comment" required>
          <br>
         
          <div > <!--  class="rate"  -->
            
            <input type="radio" id="star5" name="rate" value="5" required />
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
          <button class="btn btn-button btn-bfr btn-anim d-flex mx-auto" type="submit">Submit</button>
        </form>
          </div>
        </div>
    </section>
    


    <div class="search-overlay"></div>

    <!-- loader -->
    <div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px">
        <circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee" />
        <circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10"
          stroke="#cb7152" /></svg></div>
          <script>
            // Get the modal
            var modal = document.getElementById("myModal");
            
            // Get the button that opens the modal
            var btn = document.getElementById("myBtn");
            
            // Get the <span> element that closes the modal
            var span = document.getElementsByClassName("close")[0];
            
            // When the user clicks the button, open the modal 
            btn.onclick = function() {
              modal.style.display = "block";
            }
            
            // When the user clicks on <span> (x), close the modal
            span.onclick = function() {
              modal.style.display = "none";
            }
            
            // When the user clicks anywhere outside of the modal, close it
            window.onclick = function(event) {
              if (event.target == modal) {
                modal.style.display = "none";
              }
            }
            </script>
            
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