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
    $datap = mysqli_num_rows($rsp);
    if($datap >= 1) {
        echo "Email taken !! Press ESCAPE";
    }
}
?>