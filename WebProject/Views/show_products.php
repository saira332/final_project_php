<\<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Show Products</title>
</head>
<body>
<?php
    include("../MasterPage/header.php");
    include("../Model/db.php");
   
        ?>
 <table border = 1 style = "margin: 100px; padding:10px;">
 <tr style ="padding:10px;"> 
 <th>Id</th> 
 <th>Name</th> 
 <th>Price</th> 
 <th>Image</th> 
 <th>Status</th> 
 </tr>

<?php

 $servername = "localhost";  
 $username = "root";         
 $password = "";             
 $dbname = "projrct";   
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

$sql = "SELECT * FROM `products`";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "<tr>";
        foreach($row as $col){
            echo "<td>" .  $col . "</td>";
           
        }
        echo "<td><a href='edit_products.php?edit=$row[id]'> Edit</a> </td>"  ;
        echo "<td><a href='delete_product.php?del=$row[id]'> Delete</a> </td>"  ;
        echo "</tr>";
    }
}
?>
</table>








    <?php
       include("../MasterPage/footer.php");
    ?>
</body>
</html>