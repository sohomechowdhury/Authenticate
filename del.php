<?php
$sname= "localhost";

$unmae= "root";

$password = "";

$db_name = "form";

$conn = mysqli_connect($sname, $unmae, $password, $db_name);

if ($conn) {
    $email=$_POST["email"];

    $checkp="SELECT * FROM details WHERE email = '$email'";
    $rsp = mysqli_query($conn,$checkp);
    $data = mysqli_fetch_assoc($rsp);
    $i=$data['filename'];
    $datap = mysqli_num_rows($rsp);
    if($datap >= 1) {
       
$check="DELETE FROM details WHERE email = '$email'";
unlink('image/'.$i);
$run=mysqli_query($conn,$check);

 if($run){
     echo "Deleted Successfully 👍";
 }}
 else{
    echo "NO Records found 😥!!";
 }
    }


 else{
     echo"Failed to delete";
 }