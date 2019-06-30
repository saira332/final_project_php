<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Products</title>
    <style>
    .title{
            text-align: center;
            color: #66afe9;
            background-color: #efefef;
            padding: 2%;
        }
        table{
            background-color: #efefef;
        }
        table, td{
            text-align: center;
        }
        .alert-error{
    color:red;
  }
    </style>
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
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            if (empty($_POST["product_title"] && $_POST["product_price"])) {
                $_SESSION['message'] = "All fileds are required";
            } 
    
              
            
        else if(isset($_POST['Add_product']))
         {
        //     $product_cate=$_POST['product_cat'];
            $product_titl=$_POST['product_title'];
            $product_pric=$_POST['product_price'];
           $product_status=1;
            $product_imag=$_FILES['product_image']['name'];
            $product_image_tmp=$_FILES['product_image']['tmp_name'];
    
            move_uploaded_file($product_image_tmp,"$product_imag");
    
            $insert_produc="INSERT INTO  `products`( `name`, `price`, `image`,  `status`) VALUES ('$product_titl','$product_pric','$product_imag','$product_status')"; 
            $insert_pro=mysqli_query($con, $insert_produc);
    
            if($insert_pro)
            {
                echo "<script>alert('Product has been inserted!')</script>";
                echo "<script>window.open('insert_products.php','_self')</script>";
    
            }
            else{
                echo "Not Inserted";
            }
                            
        }
    
    }
    
    }
   
?>
    <script src="js/jquery 3.1.1.js"></script>
    <script src="js/bootstrap.min.js"></script>
     
     <form action="insert_products" method="post" enctype="multipart/form-data">
    
     <div class="container" style="width: 65%">
<div style="clear: both"></div>
        <h3 class="title">Insert New Products <a href="Adminpanel.html"><i style="float:left" class="fas fa-arrow-left mr-3"></i></a></h3>
        <div class="table-responsive">
            <table class="table">
            <tr>
               <td>Product Name</td>
               <td><input type="text" name="product_title"/></td>
            </tr>
        
            <tr>
               <td>Product Price</td>
               <td><input type="text" name="product_price"/></td>
            </tr>
            <tr>
               <td>Product Image</td>
               <td><input type="file" name="product_image"/></td>
            </tr>
            
          </table>
          <div class="alert alert-error"><?= $_SESSION['message']?></div>
          <div align="center"><input type="submit" name="Add_product" value="Insert Product"/></div>
     </form>
  
       <?php
       include("../MasterPage/footer.php");
    ?>
</body>
</html>