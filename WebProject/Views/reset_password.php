<?php
session_start();
$_SESSION['message']='';

$servername = "localhost";
$username='root';
$password='';
$dbname='projrct';
$conn= mysqli_connect($servername,$username,$password,$dbname);

if($_SERVER['REQUEST_METHOD']=='POST')
{
  if (empty($_POST["password"] && $_POST['psw'])) {
    $_SESSION['message'] = "All fileds are required";
  
  }
  else if (!filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)) {
    $_SESSION['message'] = "Invalid email format"; 
  }
 else if($_POST['password']== $_POST['psw'])
	{
        $email = $_POST['email'];
		 $pwd = $_POST['password'];
		 $query = "UPDATE `users` SET `password`='$pwd' WHERE email = '$email'";
		 $query = "UPDATE `registration` SET `Password`='$pwd' WHERE Email='$email'";
		 mysqli_query($conn,$query);
     echo "<script>alert('Pasword reset successful')</script>";
     echo "<script>window.open('resetpassword.php','_self')</script>";
  }
  else{
    $_SESSION['message']="Two password do not match!";
    }
	
}

?>
<!DOCTYPE>
<html>
<head>
    <title>Reset Password</title>
    <!--<meta charset="utf-8">-->
    
    <link href="css/all.min.css" rel="stylesheet" />
    
    <style>
    
label{
  color: white;
}
p{
  color: white;
}
/* Full-width input fields */
  input[type=text], input[type=password] {
  width: 100%;
  padding: 15px;
  margin: 5px 0 22px 0;
  display: inline-block;
  border: none;
  background: #f1f1f1;
}

input[type=text]:focus, input[type=password]:focus {
  background-color: #ddd;
  outline: none;
}

hr {
  border: 1px solid darkorange;
  margin-bottom: 25px;
}

/* Set a style for all buttons */
button {
  background-color: #4CAF50;
  color: white;
  padding: 14px 20px;
  margin: 8px 0;
  border: none;
  cursor: pointer;
  width: 100%;
  opacity: 0.9;
}

button:hover {
  opacity:1;
}



/* Add padding to container elements */
.container {
  padding: 16px;
width:40%;
margin:0 0 0 30%;
background-color: gray;
}

/* Clear floats */
.clearfix::after {
  content: "";
  clear: both;
  display: table;
}

/* Change styles for cancel button and signup button on extra small screens */
  .signupbtn {
    width: 100%;
    align: center;
    background-color: darkorange;
  }
  .alert-error{
    color:red;
  }
  .title{
            text-align: center;
            color: white;   
        }
        .fas{
           color: darkorange;
        }

    </style>
</head>
<body>
<form  action="" method="POST">
  <div class="container">
  <h1 class="title">Reset Password<a href="index.php"><i style="float:left" class="fas fa-arrow-left mr-3"></i></a></h1>
    
    
    <hr>
    
    <label for="email"><b>Email</b></label>
    <input type="text" placeholder="Enter Email" name="email">

    <label for="psw"><b>Password</b></label>
    <input type="password" placeholder="Enter Password" name="password">
    
    <label for="psw-repeat"><b>Repeat Password</b></label>
    <input type="password" placeholder="Repeat Password" name="psw">

    <div class="alert alert-error"><?= $_SESSION['message']?></div>
    <div class="clearfix">

      <button type="submit" class="signupbtn" href="#">Reset</button>

    </div>
  </div>
</form>
</body>
</html>