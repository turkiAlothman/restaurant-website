<?php

 $c ="";
if($_SERVER["REQUEST_METHOD"]=="POST"){
if(empty($_POST["name"]))
$user="fill user name !!";
if(empty($_POST["password"]))
$user="fill password !!";

$rname= $_POST["rname"];
$spe= ucfirst($_POST["spe"]) ;
$loc= $_POST["loc"];
$logo= $_POST["logo"];
$mname= $_POST["mname"];
$mdes= $_POST["mdes"];
$mprice= $_POST["mprice"];

$kind= $_POST["kind"];

if($kind =="food")
    $kind=1;
else $kind=0;
    


$servername = "localhost";
    $username = "root";
    $paswword = "";
    $dbName = "logindb";


    $conn =  mysqli_connect($servername, $username, $paswword, $dbName);
    if(!$conn){
      die("there is error in connection");
    }
  $i=1;
  $x="";
  $y="";
  
  while($loc[$i]!=","){
      $x.= $loc[$i];
      $i++;
  }
  $i++;
  
   while($loc[$i]!=")"){
      $y.= $loc[$i];
      $i++;
  }
    
    
  
  $w= -1;
   $new = sqrt(intval($x)**2 + intval($y)**2 );
         $new =  intval($new);
          mysqli_query($conn,"INSERT INTO restaurant(name,logo,spec,location,rate)VALUES('$rname','$logo','$spe',$new,$w)");
          
          
          mysqli_query($conn,"INSERT INTO menu(resname,des,price,name,kind)VALUES('$rname','$mdes','$mprice','$mname',$kind)");
         
          
          $c=" <h1 style='color:green;'> Restaurant added seccusfully </h1> " ;
      
         
      
 //   $rowcount=mysqli_num_rows($result);
   // printf("Result set has %d rows.\n",$rowcount);

    // Free result set

    }

  
  
  
  ?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Admin</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center">
                <div class="sidebar-brand-icon rotate-n-15">
                    <i class="fas fa-laugh-wink"></i>
                </div>
                <div class="sidebar-brand-text mx-3">Restaurants <sup>World</sup></div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="Admin-Add restaurant.php" 
                     >
                    <i class="fas fa-fw fa-folder"></i>
                    <span>Add Restaurants</span>
                </a>
                <a class="nav-link collapsed" href="Admin-Edit restaurant.php" 
                     >
                    <i class="fas fa-fw fa-folder"></i>
                    <span>Edit Restaurants</span>
                </a>
                <a class="nav-link collapsed" href="Admin remove restaurant.php" 
                >
               <i class="fas fa-fw fa-folder"></i>
               <span>Remove Restaurants</span>
           </a>

            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">


            <!-- Nav Item - Tables -->
            <li class="nav-item">
                <a class="nav-link" href="Admin-Customer rates.php">
                    <i class="fas fa-fw fa-table"></i>
                    <span>Customers rates and reviews  </span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">
<!-- End of Sidebar hhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhh-->
         <li class="nav-item">
                <a class="nav-link" href="add menu.php">
                    <i class="fas fa-fw fa-table"></i>
                    <span>Add meal</span></a>
            </li>
             <li class="nav-item">
                <a class="nav-link" href="edit menu.php">
                    <i class="fas fa-fw fa-table"></i>
                    <span>Edit meal</span></a>
            </li>
             <li class="nav-item">
                <a class="nav-link" href="remove menu.php">
                    <i class="fas fa-fw fa-table"></i>
                    <span>Remove meal</span></a>
            </li>

        <!-- End of Sidebar hhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhh-->
        </ul>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>

                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">

                        <!-- Nav Item - Search Dropdown (Visible Only XS) -->
                 

                        <!-- Nav Item - Alerts -->
                      

                      

                        <div class="topbar-divider d-none d-sm-block"></div>

                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                           
                                <img class="img-profile rounded-circle"
                                    src="img/Admin.png">
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="userDropdown">
                             
                                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Logout
                                </a>
                            </div>
                        </li>

                    </ul>

                </nav>
                <!-- End of Topbar -->
                

                <!-- /.container-fluid -->
                <div class="row">
                    <div class="container">  
                         <?php echo $c; ?>
                        <h1> Add Restaurant</h1>  
                            
                        <form  action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" >  
                                
                          <div class="form-group">  
                            <label> Restaurant Name:</label>  
                            <input type="text" name="rname" class="form-control" required="">  
                          </div> 
                            
                            <div class="form-group">  
                            <label> speciality</label>  
                            <input type="text" name="spe" class="form-control" placeholder="Burger , Pasta , Pizza , Steak" value="" required="">  
                          </div>
                            
                          <div class="form-group">  
                            <label> Location</label>  
                            <input type="text" placeholder="(x,y)" name="loc"  class="form-control" value="" required="">  
                          </div> 
                            
                          <div class="form-group">  
                            <label> logo</label>  
                            <input type="text" name="logo" class="form-control" value="" placeholder="http://......." required="">  
                          </div> 
                            
                          <div class="form-group">  
                            <label> Meal name </label>  
                            <input type="text" name="mname" class="form-control" value="" required="Food menus">  
                          </div>
                            <div class="form-group">  
                            <label>Meal description</label>  
                            <input type="text" name="mdes" class="form-control" value="" required="Food menus">  
                          </div>
                            <div class="form-group">  
                            <label>Meal price</label>  
                            <input type="text" name="mprice" class="form-control" value="" required="Food menus">  
                          </div>
                            
                          <div class="dropdown" style="float:left; margin-left:100px;">

  <Select name="kind">
   
    
  <option selected>food</option>
  
  <option>drink</option>
  </Select>

                              <br>
                              <br>
                              <br>
                          
                          
                           
                          <button type="submit" class="btn btn-success save-btn">Save</button>  
                            
                        </form>  
                        <br/>  
                        
                           
                      </div>  
            </div>
            
            <!-- End of Main Content -->
            
            <!-- Footer -->
          
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" href="Login page.php">Logout</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="vendor/chart.js/Chart.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="js/demo/chart-area-demo.js"></script>
    <script src="js/demo/chart-pie-demo.js"></script>
    <script type="text/javascript">  
                               
        
          
    </script>  
</body>

</html>