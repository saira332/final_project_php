<?php


    if (isset($_POST['mail_to']) == true && empty($_POST['mail_to']) == false){
        $mailto = $_POST['mail_to'];
        if (filter_var($mailto, FILTER_VALIDATE_EMAIL) == true){
            require '../PHPMailer-master/PHPMailerAutoload.php';
   $mail = new PHPMailer();
   $mail ->IsSmtp();
   $mail ->SMTPDebug = 0;
   $mail ->SMTPAuth = true;
   $mail ->SMTPSecure = 'ssl';
   $mail ->Host = "smtp.gmail.com";
   $mail ->Port = 465; 
   $mail ->IsHTML(true);
   $mail ->Username = "kinosha.196@gmail.com";
   $mail ->Password = "kino@123";
   $mail ->addAddress($mailto);
   $name = $_POST['name'];
   $mail ->addReplyTo($mailto,$name);
    $mailSub = "Forget Password";
    $mailMsg = "http://localhost:8081/WebProject/reset_password.php";
   $mail ->Subject = $mailSub;
   $mail ->Body = $mailMsg;

   

   if(!$mail->Send())
   {
    echo "<script>alert('Mail has Not been Send!')</script>";
    echo "<script>window.open('forget_password.php','_self')</script>";
   }
   else
   {
    echo "<script>alert('Mail has been Send!')</script>";
    echo "<script>window.open('forget_password.php','_self')</script>";
       //echo "Mail Sent";
   }
        }
        else{
            echo "<script>alert('Invalid Email!')</script>";
            echo "<script>window.open('forget_password.php','_self')</script>";
            //echo "Thats's a invalid email";
        }
    }

?>

<!DOCTYPE>
<html>
<head>
    <title>Forget Password</title>
    <!--<meta charset="utf-8">-->
    
    
    
    <style>
    
label{
  color: white;
}
p{
  color: white;
}
/* Full-width input fields */
  input[type=text]{
  width: 100%;
  padding: 15px;
  margin: 5px 0 22px 0;
  display: inline-block;
  border: none;
  background: #f1f1f1;
}

input[type=text]:focus{
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
<?php
        include("../MasterPage/header.php");
    ?>
<form  action="" method="POST">
  <div class="container">
  <h1 class="title">Forget Password<a href="signin.php"><i style="float:left" class="fas fa-arrow-left mr-3"></i></a></h1>
    
   
    <hr>
    
     
    
    <label for="name"><b>Name</b></label>
    <input type="text" name="name" placeholder="Your name.." required>
    <label for="email"><b>Email</b></label>
    <input type="text" placeholder="Enter Your Email..." name="mail_to" required>

    
    <div class="clearfix">

      <button type="submit" class="signupbtn" href="#">Submit</button>

    </div>
  </div>
</form>
<?php
        include("../MasterPage/footer.php");
    ?>
</body>
</html>