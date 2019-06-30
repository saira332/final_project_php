<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>
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
                    <li>Login</li>
                </ul>
                <h2>LOGIN</h2>
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
                <div class="col-lg-6 col-md-6 col-sm-12">
                    <h4 class="title">
                        <span>Welcome Back!</span>
                    </h4>
                    <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry"s standard dummy text ever since the 1500s.</p>
                    <p>It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.</p>
                    <p class="withpadding">Still not registered? <a href="Signup.php">Click Here</a> to register now.</p>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-12">
                    <h4 class="title">
                        <span>Login Form</span>
                    </h4>
                    <form method="post", action="<?php echo $_SERVER['PHP_SELF']?>">
                        <div class="form-group">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-user"></i></span>
                                <input type="text" class="form-control" name="fmail" placeholder="Username">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-lock"></i></span>
                                <input type="password" class="form-control" name="fpas" placeholder="Password">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="checkbox">
                                <label>
                                    <input type="checkbox"> Remember me
                                </label>
                            </div>
                        </div>
                        <div class="form-group">
                            <button type="submit" class="button">Sign in</button>
                        </div>
                    </form>
                    <a href="forget_password.php"> Forgot Password</a>
                </div>
                <!-- end login -->
            </div>
            <!-- end content -->
        </div>
        <!-- end container -->
    </section>
    <!-- end section -->
    
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
                $mail=$_REQUEST['fmail'];
                $pass=$_REQUEST['fpas'];
                if(empty($mail))
                {
                    throw new Exception("Plz Enter Mail");
                }
                if(empty($pass))
                {
                    throw new Exception("Plz Enter Password");
                }
                $query="SELECT * FROM `users` ";
                $results=$com->query($query); 
                while($row=$results->fetch_assoc()) //DataBase mai Array ko Assocate Krny k LiYa
                {
                    //echo $row['id']."&nbsp".$row['name']."&nbsp". $row['mail']."&nbsp".$row['pas']."&nbsp".$row['pn']."<br />";
                    if($row['email']==$mail && $row['password']==$pass)
                    {
                        echo "<script>window.open('dashboard.php','_self')</script>";
                    }
                }
             
                echo "<script>alert('insert valid data!')</script>";
                
                echo "<br />";
            }
        }   
        catch(Exception $e)
        { 
            echo 'Message: ' .$e->getMessage();
        }
    }
    ?>
    <?php
        include("../MasterPage/footer.php");
    ?>
</body>
</html>