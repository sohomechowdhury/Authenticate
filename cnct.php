<?php
$sname= "localhost";

$unmae= "root";

$password = "";

$db_name = "form";

$conn = mysqli_connect($sname, $unmae, $password, $db_name);

if (!$conn) {

    echo " Joining unsuccessful 😔";
}
if ($conn) {

    echo " Welcome 😊";
}


$fn=$_POST["fn"];
$ln=$_POST["ln"];
$ph=$_POST["ph"];
$email=$_POST["email"];
$pass=$_POST["pass"];
$filename = $_FILES["uploadfile"]["name"];
$tempname = $_FILES["uploadfile"]["tmp_name"];
$folder = "./image/" . $filename;

$check="SELECT * FROM details WHERE phonenum = '$_POST[ph]'";
$rs = mysqli_query($conn,$check);
$data = mysqli_num_rows($rs);
if($data>= 1) {
    echo "Phone Number Already in Exists<br/>";
}
else{
$checke="SELECT * FROM details WHERE email = '$email'";
$rse = mysqli_query($conn,$checke);
$datae = mysqli_num_rows($rse);
if($datae >= 1) {
    echo "Email Already in Exists<br/>";
}
else{
    $query="INSERT INTO details (firstname, lastname, phonenum, email, password,filename) VALUES ('$fn','$ln','$ph','$email','$pass','$filename')";
if (move_uploaded_file($tempname, $folder)) {
    echo "<h3>  Image uploaded successfully!</h3>";
} else {
    echo "<h3>  Failed to upload image!</h3>";
}
$run=mysqli_query($conn,$query);
 if($run){
     echo "\nThanks for Joining";
 }
 else{
     echo"Fill each detail or Server might be off.Plz notify admin";
 }
 ?>
 
 <!DOCTYPE html>
 <html lang="en">
 <head>
     <meta charset="UTF-8">
     <meta http-equiv="X-UA-Compatible" content="IE=edge">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <title>Document</title>
     <style>
          
 #display-image{
     width: 100%;
     justify-content: center;
     padding: 5px;
     margin: 15px;
 }
 img{
     margin: 5px;
     width: 350px;
     height: 250px;
 }
     </style>
 </head>
 <body>
 <div id="display-image">
     <?php
  
  $query ="SELECT * FROM details WHERE email = '$email'";
  $result = mysqli_query($conn, $query);
 
  while ($data = mysqli_fetch_assoc($result)) {
  ?>
      <img src="./image/<?php echo $data['filename']; ?>">
 
  <?php
  }
  ?>
 </div>
 </body>
 </html>

<?php
}
}
?>


