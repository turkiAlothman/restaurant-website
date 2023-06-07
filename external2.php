<?php 

$c="<label> Meals:</label> <div class='form-group'> <select name ='mal'>";
$res= $_POST["sport"];

$servername = "localhost";
    $username = "root";
    $paswword = "";
    $dbName = "logindb";
    
    $conn =  mysqli_connect($servername, $username, $paswword, $dbName);
    if(!$conn){
    die("there is error in connection");}
    
    $result = mysqli_query($conn,"SELECT * FROM menu WHERE resname ='$res' "); 
    
    while($row = mysqli_fetch_array($result)){
        $t =$row["name"];

        $c.="<option>$t </option>";         
        
        
    }
     
    $c.="</select> </div>";


            

 
$c.="<button type='submit' class='btn btn-success save-btn'>remove</button> ";


echo $c;

?>