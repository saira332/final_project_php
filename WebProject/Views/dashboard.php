<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Check & Balance</title>
    <style>
    .back{
            height: 300px;
            background-image: url('../images/slider3.jpg');
        }
        table{
            margin-top: 100px;
            margin-left:300px;
            margin-bottom:100px;
            border: 1px solid black;
            text-align : center;
            align: center;
        }
        table tr{
            padding : 10px;
        }
        table tr td,table tr th{
            padding : 20px;
        }
    </style>
</head>
<body>
<?php
        include("../MasterPage/header.php");
    ?>
        <div class="back">
    
        </div>
        <h1 align= center>Dashboard</h1>
        <table border= 1>
            <thead>
                <tr>
                    <th><a href ="./show_products.php" >Products </a></th>
               
                    <th><a href ="./show_employees.php" >Employees </a></th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td><a href ="./insert_products.php" > Insert Products </a></td>
                
                    <td><a href ="./insert_employee.php" > Insert Employees </a></td>
                </tr>
            </tbody>
        </table>

       <?php
        include("../MasterPage/footer.php");
    ?>
</body>
</html>
