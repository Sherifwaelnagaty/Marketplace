<!DOCTYPE html>
<head>
    <title>Login</title>
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@200;300;400;600;900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="css/elegant-icons.css" type="text/css">
    <link rel="stylesheet" href="css/jquery-ui.min.css" type="text/css">
    <link rel="stylesheet" href="css/style.css" type="text/css">
</head>

<body>
    <header class="header">
        <div class="header__top">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 col-md-6">
                        <div class="header__top__left">
                            <ul>
                            <li><i class="fa fa-envelope"></i>Email</li>   
                            <li>Free Shipping for all Order of 99 LE</li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6">
                        <div class="header__top__right">
                            <div class="header__top__right__language">
                                <img src="img/language.png" alt="">
                                <div>English</div>
                                <span class="arrow_carrot-down"></span>
                                <ul>
                                    <li><a href="#">English</a></li>
                                </ul>
                            </div>
                            <div class="header__top__right__language">
                            <a href="Login.php"><i class="fa fa-user"></i>Login</a>   
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-lg-3">
                    <div class="header__logo">
                        <h2>Market Place</h2>
                    </div>
                </div>
                <div class="col-lg-6">
                    <nav class="header__menu">
                        <ul>
                            <li class="active"><a href="./index.php">Home</a></li>
                            <li><a href="Products.php">Products</a></li>
                            <li><a href="contact.php">Contact</a></li>   
                                             
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </header>
    
    <section class="breadcrumb-section set-bg" data-setbg="img/R.jpg">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="breadcrumb__text">
                        <h2>Login</h2>
                    </div>
                </div>
            </div>
        </div>
    </section>
        <br><br><br>
        <?php
        include "users.php";
        include "DBController.php";
        session_start();
        $db= new DBController();
        $users = new users($db);
        ?>
        <div class="container">
        <div class="col-lg-12">
        <form action="Login.php" method="Post" onsubmit="return validate(this)">
        <div class="form-group">
        <label for="email">Email:</label>
        <input type="text" class="form-control" id="email" placeholder="Email" name="Email">
        <?php
        if(isset($_POST["Submit"])){ 
            if(!filter_var($_POST["Email"],FILTER_VALIDATE_EMAIL,FILTER_FLAG_QUERY_REQUIRED)===FALSE){
                $users->Login($_POST['Email'],$_POST['Password']);    
                    header("Location:index.php");
            }else{
            echo "<h7>Email is not Valid</h7><br>";
            }     
        }
        ?>
        <label for="pwd">Password:</label>
        <input type="password" class="form-control" id="email" placeholder="Password" name="Password"><br>
        <a href="Register.php">Create new account?</a><br>
        <input type="submit" value="Submit" name="Submit">
        <script>
            function validate(form){
                fail="";
                if(form.Email.value==""){
                    fail+="Enter your Email  ";
                }
                if(form.Password.value==""){
                    fail+="Enter your Password";
                }
                if(fail==""){
                    return true;
                }else{
                    alert(fail);
                    return false;
                }
            }
        </script>
        </form></div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="js/main.js"></script>
</body>

</html>