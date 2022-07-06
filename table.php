<html>
    <head>
        <style>
            img{
     margin: 5px;
     width: 100px;
     height: 100px;
 }
    
        </style>
    </head>
<body>
<?php 
$sname= "localhost";

$unmae= "root";

$password = "";

$db_name = "form";

$conn = mysqli_connect($sname, $unmae, $password, $db_name);
$query = "SELECT * FROM details";


echo '<table border="0" cellspacing="2" cellpadding="2"> 
      <tr> 
          <td> <font face="Arial">Value1</font> </td> 
          <td> <font face="Arial">Value2</font> </td> 
          <td> <font face="Arial">Value3</font> </td> 
          <td> <font face="Arial">Value4</font> </td> 
          <td> <font face="Arial">Value5</font> </td> 
          <td> <font face="Arial">Value6</font> </td> 
      </tr>';

if ($result = mysqli_query($conn,$query)) {
    while ($row = $result->fetch_assoc()) {
        $field1name = $row["firstname"];
        $field2name = $row["lastname"];
        $field3name = $row["phonenum"];
        $field4name = $row["email"];
        $field5name = $row["password"]; 
        $field6name = $row["filename"];
        echo '<tr> 
                  <td>'.$field1name.'</td> 
                  <td>'.$field2name.'</td> 
                  <td>'.$field3name.'</td> 
                  <td>'.$field4name.'</td> 
                  <td>'.$field5name.'</td>
                  <td>'.$field6name.'</td>
                  <td>'?><img src="./image/<?php echo $row['filename']; ?>">
                  <?php
                  '</td>
              </tr>';
    }
    $result->free();
} 

?>
<iframe src="https://docs.google.com/gview?url=https://D:/xampp/htdocs/Form/sohome_chowdhury_cv.pdf&embedded=true" style="width:600px; height:500px;" frameborder="0"></iframe>
</body>
</html>