<?php
$sname= "localhost";

$unmae= "root";

$password = "";

$db_name = "form";

$conn = mysqli_connect($sname, $unmae, $password, $db_name);

if (!$conn) {

    echo " Connection unsuccessful 😔";
}
if ($conn) {

    echo " Welcome 😊";
}


$fn=$_POST["fn"];
$ph=$_POST["ph"];
$email=$_POST["email"];
$pass=$_POST["pass"];


$check="SELECT * FROM details WHERE phonenum = '$_POST[ph]'";
$rs = mysqli_query($conn,$check);
$data = mysqli_num_rows($rs);
if($data>= 1) {
    echo "Phone Number Already  Exists<br/>";
}
else{
$checke="SELECT * FROM details WHERE email = '$email'";
$rse = mysqli_query($conn,$checke);
$datae = mysqli_num_rows($rse);
if($datae >= 1) {
    echo "Email Already  Exists<br/>";
}

else{
     $checkp="SELECT * FROM details WHERE password = '$pass'";
        $rsp = mysqli_query($conn,$checkp);
        $datap = mysqli_num_rows($rsp);
        if($datap >= 1) {
            echo "Password Already  Exists<br/>";
        }

    
    else{
    $query="UPDATE details SET email = '$email', phonenum= '$ph',password = '$pass' WHERE firstname ='$fn'";

$run=mysqli_query($conn,$query);
 if($run){
     echo "Updated Successfully";
 }
 else{
     echo"Failed to update";
 }
    }
}
}


