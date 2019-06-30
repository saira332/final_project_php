<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Employees</title>
   
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
            $query="SELECT * FROM `employees` WHERE id='$delete'";
            $run = mysqli_query($con, $query);
            $row=mysqli_fetch_array($run);
        }
        if(isset($_POST["edit_employee"]))
        {
            $employee_id=$_POST['employee_id'];
            $q = "DELETE FROM `employees`  WHERE id='$employee_id'";
            $r = mysqli_query($con, $q);
            
            if($r)
            {
                echo "<script>alert('Employee has been Deleted succesfully!')</script>";
                echo "<script>window.open('show_employees.php','_self')</script>";
        
            }
            else{
                echo "Not Updated";
            }
            
        }
          
    
    }
    
        
?>




    <script src="js/jquery 3.1.1.js"></script>
    <script src="js/bootstrap.min.js"></script>
     
     <form action="delete_employee" method="post" enctype="multipart/form-data">
    
     <div class="container" style="width: 65%">
<div style="clear: both"></div>
        <h3 class="title">Delete Employee <a href="Adminpanel.html"><i style="float:left" class="fas fa-arrow-left mr-3"></i></a></h3>
        <div class="table-responsive">
            <table class="table">
            <tr>
               <td><input type="hidden" <?php echo "value ='".$row[0]."'"?> name="employee_id"/></td>
            </tr>
            
         
            
            
          </table>
          <div class="alert alert-error"><?= $_SESSION['message']?></div>
          <div align="center"><input type="submit" name="delete_employee" value="Delete employee"/></div>
     </form>
  
       <?php
               
 
       include("../MasterPage/footer.php");
    ?>
</body>
</html>