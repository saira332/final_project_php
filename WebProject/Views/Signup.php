

<?php
    $host='127.0.0.1'; //yeh humry localhost ka default ip hain
    $username='root';
    $password='';
    $dbname='projrct';
    $com=new mysqli($host,$username,$password,$dbname);
    if($com->connect_error)
    {
        echo "Connection Failed";
    }
    else
    {
        try
        {
            if($_SERVER["REQUEST_METHOD"]== "POST")
            {
               // header("location:../index.php");
                $name=$_REQUEST['fname'];
                $uname=$_REQUEST['fusername'];
                $mail=$_REQUEST['fmail'];
                $pas=$_REQUEST['fpas'];
                $gender=$_REQUEST['fgender'];
                echo $name;
                if(empty($name))
                {
                    throw new Exception("Plz Enter Name");
                }
                if(empty($uname))
                {
                    throw new Exception("Plz Enter UserName");
                }
                if(empty($mail))
                {
                    throw new Exception("Plz Enter Mail");
                }
                if(empty($pas))
                {
                    throw new Exception("Plz Enter PassWord");
                }
                if(empty($gender))
                {
                    throw new Exception("Plz Enter gender");
                }
                $query="INSERT INTO `users`(`username`, `name`, `email`, `password`, `gender`) VALUES ('$uname','$name','$mail','$pas','$gender')";
                $insert=mysqli_query($com, $query);
                if($insert)  // yeh hum query ko excute kr rahy hain
                {
                    echo "<b style='padding-left: 200px'> Data Save! </b>";
                }
                else
                {
                    echo "Error";
                }
            }
        }   
        catch(Exception $e)
        { 
            echo 'Message: ' .$e->getMessage();
        }
    }
    ?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Sign Up</title>
</head>
<body>
<?php
        include("../MasterPage/header.php");
    ?>
      

<section class="post-wrapper-top">
    <div class="container">
        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
            <ul class="breadcrumb">
                <li><a href="index.html">Home</a></li>
                <li>Register</li>
            </ul>
            <h2>REGISTER</h2>
        </div>
        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
            <!-- search -->
            <div class="search-bar">
                <form action="" method="get">
                    <fieldset>
                        <input type="image" src="img/pixel.gif" class="searchsubmit" alt="" />
                        <input type="text" class="search_text showtextback" name="s" id="s" value="Search..." />
                    </fieldset>
                </form>
            </div>
            <!-- / end div .search-bar -->
        </div>
    </div>
</section>
<!-- end post-wrapper-top -->

<section class="section1">
    <div class="container clearfix">
        <div class="content col-lg-12 col-md-12 col-sm-12 clearfix">
            <div class="col-lg-4 col-md-4 col-sm-12">
                <h4 class="title">
                    <span>Why Join Us?</span>
                </h4>
                <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry"s standard dummy text ever since the 1500s..</p>
                <p>It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.</p>
            </div>

            <div class="col-lg-4 col-md-4 col-sm-12">
                <h4 class="title">
                    <span>Benefits</span>
                </h4>
                <ul class="check">
                    <li><a href="#">5+ homepage style (check features menu)</a></li>
                    <li><a href="#">Compatible any eCommerce solutions</a></li>
                    <li><a href="#">Limitless color combinations</a></li>
                    <li><a href="#">Limitless page templates (15+ custom pages)</a></li>
                    <li><a href="#">100% responsive layout design</a></li>
                    <li><a href="#">Awesome slideshows for your contents</a></li>
                    <li><a href="#">Super awesome portfolio sections</a></li>
                    <li><a href="#">700+ custom font icons included</a></li>
                </ul>
            </div>
            <!-- end login -->

            <div class="col-lg-4 col-md-4 col-sm-12">
                <h4 class="title">
                    <span>Register Form</span>
                </h4>
                <form method="post", action="<?php echo $_SERVER['PHP_SELF']?>">
                    <div class="form-group">
                        <input type="text"  class="form-control" name="fname" placeholder="Name">
                    </div>
                    <!-- <div class="form-group">
                        <input type="text" class="form-control" placeholder="Last name">
                        
                    </div> -->
                    <div class="form-group">
                       <input type="text" class="form-control" name="fusername" placeholder="User name">
                    </div>
                    <div class="form-group">
                        <input type="email" class="form-control" name="fmail" placeholder="Email">
                    </div>
                    <div class="form-group">
                        <input type="password" class="form-control" name="fpas" placeholder="Password">
                    </div>
                    <div class="form-group">
                        <input type="password" class="form-control" placeholder="Re-enter password">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" name="fgender" placeholder="gender">
                    </div>
                    <div class="form-group">
                         <input type="submit" class="button" value="Register an account">
                    </div>
                </form>
            </div>
            <!-- end register -->
        </div>
        <!-- end content -->
    </div>
    <!-- end container -->
</section>
<!-- end section -->

       <?php
        include("../MasterPage/footer.php");
    ?>
</body>
</html>