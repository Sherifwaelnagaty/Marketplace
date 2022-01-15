<!DOCTYPE html>
<head>
    <title>Register</title>

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
                        <h2>Register</h2>
                    </div>
                </div>
            </div>
        </div>
    </section>
    
    <section class="checkout spad">
        <div class="container">
            <div class="checkout__form">
                <form action="Login.php" method="post"enctype="multipart/form-data" onsubmit="return validate(this)">
                    <div class="row">
                        <div class="col-lg-8">
                            <div class="row">
                                <div class="col-xl-3">
                                    <div class="checkout__input">
                                        <p>First Name<span>*</span></p>
                                        <input type="text" name="FirstName">
                                    </div>
                                </div>
                                <div class="col-xl-3">
                                    <div class="checkout__input">
                                        <p>Last Name<span>*</span></p>
                                        <input type="text" name="LastName">
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3">
                            <div class="checkout__input">
                                <p>Address<span>*</span></p>
                                  <textarea class="form-control" rows="5" id="comment" name="Address"></textarea>
                            </div>
                            <div class="row">
                                <div class="col-xl-3">
                                    <div class="checkout__input">
                                        <p>Phone<span>*</span></p>
                                        <input type="text" name="MobileNumber">
                                    </div>
                                </div>
                                <div class="col-xl-3">
                                    <div class="checkout__input">
                                        <p>Email<span>*</span></p>
                                        <input type="text" name="Email">
                                        <?php
                                        include "users.php";
                                        include "DBController.php";
                                        $db= new DBController();
                                        $users = new users($db);

                                        if(isset($_POST["Submit"])){
                                            if(!filter_var($_POST["Email"],FILTER_VALIDATE_EMAIL,FILTER_FLAG_QUERY_REQUIRED)===FALSE){
                                            $users->Register($_POST["FirstName"],$_POST["LastName"],$_POST["Address"],$_POST["Email"],$_POST["MobileNumber"],$_POST["Password"],$_POST["Birthdate"],$_FILES['Pic']);
                                            }else{
                                                echo "<h7>Email is not Valid</h7><br>";
                                            }
                                        }
                                        ?>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3">
                            <div class="checkout__input">    
                            <p>Birth Date<span>*</span></p>
                            <input type="date" id="birthday" name="Birthdate">
                            </div>
                            <div class="col-xl-3">
                            <div class="checkout__input">
                                <p>Password<span>*</span></p>
                                <input type="Password" name="Password">
                            </div>
                            <div class="col-xl-3">
                                <p>Profile Picture<span>*</span></p>
                                  <input type="file" name="Pic">
                            </div>
                            <br>
                        <input type="Submit" value="Submit" name="Submit">
                        </form>
                       <?php function customError($errno, $errstr) {
                            echo "<b>Error:</b> [$errno] $errstr";
                            }

                            set_error_handler("customError");

                            ?>
                        <script>
                        function validate(form){
                            fail="";
                            if(form.Email.value==""){
                                fail+="Enter your Email   ";
                            }
                            if(form.Password.value==""){
                                fail+="Enter your Password  ";
                            }
                            if(form.Birthdate.value==""){
                                fail+="Enter your Birthdate  ";
                            }
                            if(form.MobileNumber.value==""){
                                fail+="Enter your MobileNumber ";
                            }
                            if(form.Address.value==""){
                                fail+="Enter your Address  ";
                            }
                            if(form.FirstName.value==""){
                                fail+="Enter your FirstName  ";
                            }
                            if(form.LastName.value==""){
                                fail+="Enter your LastName";
                            }
                            if(fail==""){
                                return true;
                            }else{
                                alert(fail);
                                return false;
                            }
                        }
                        </script>
    </section>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="js/main.js"></script>
</body>

</html>