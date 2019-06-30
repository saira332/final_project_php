<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Products</title>
   
</head>
<body>
<?php
    session_start();
    include("../MasterPage/header.php");
    ?>
    <?php
    $_SESSION['message']=' ';
    $host='127.0.0.1'; //yeh humry localhost ka default ip hain
    $username='root';
    $password='';
    $dbname='projrct';
    $con=new mysqli($host,$username,$password,$dbname);
    
    if($con->connect_error)
    {
        echo "Connection Failed";
    }
    else{
           
        if (isset($_GET["del"]))
        {
            $delete = $_GET["del"];
            $query="SELECT * FROM `products` WHERE id='$delete'";
            $run = mysqli_query($con, $query);
            $row=mysqli_fetch_array($run);
        }
        if(isset($_POST["delete_product"]))
        {
            $product_id=$_POST['product_id'];
            $q = "DELETE FROM `products` WHERE id='$product_id'";
            $r = mysqli_query($con, $q);
            
            if($r)
            {
                echo "<script>alert('product has been updated succesfully!')</script>";
                echo "<script>window.open('show_products.php','_self')</script>";
        
            }
            else{
                echo "Not Deleted";
            }
            
        }
          
    
    }
    
        
?>




    
     
     <form action="delete_product" method="post" >
    
     <div class="container" style="width: 65%">
<div style="clear: both"></div>
        <h3 class="title">Delete product <a href="Adminpanel.html"><i style="float:left" class="fas fa-arrow-left mr-3"></i></a></h3>
        <div class="table-responsive">
            <table class="table">
            <tr>
               <td><input type="hidden" <?php echo "value ='".$row[0]."'"?> name="product_id"/></td>
            </tr>
            <tr>
               <td>Product Name</td>
               <td><input type="text" <?php echo "value ='".$row[1]."'"?> name="product_name"/></td>
            </tr>
            <tr>
               <td>Product Price</td>
               <td><input type="text" <?php echo "value ='".$row[2]."'"?> name="product_price"/></td>
            </tr>
            
            
            
          </table>
          <div class="alert alert-error"><?= $_SESSION['message']?></div>
          <div align="center"><input type="submit" name="delete_product" value="Delete product"/></div>
     </form>
  
       <?php
               
 
       include("../MasterPage/footer.php");
    ?>
</body>
</html>