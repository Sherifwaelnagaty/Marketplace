<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "web project";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
        
$sql = "SELECT * FROM products";


$result=mysqli_query($conn,$sql);
$query="SELECT count(*) as product_id from products";
$count=mysqli_query($conn, $query);
$data = mysqli_fetch_assoc($count);
?>
<!DOCTYPE html>
<html>
<head>
    <title>Products</title>
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
                    <div class="col-lg-6">
                        <div class="header__top__left">
                            <ul>
                                <?php
                               session_start();
                                if(!isset($_SESSION["Email"])){
                                    echo'<li><i class="fa fa-envelope"></i>Email</li>';   
                                }else{
                                    if($_SESSION["Email"]){
                                    echo'<li><i class="fa fa-envelope"></i>'.$_SESSION["Email"].'</li>';             
                                    }
                                }
                                ?>
                                <li>Free Shipping for all Order of $99</li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-6">
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
                                <?php
                                if(!isset($_SESSION["Email"])){
                                    echo'<a href="Login.php"><i class="fa fa-user"></i>Login</a>';   
                                }else{
                                    if($_SESSION["Email"]){
                                    echo'<i class="fa fa-user">'.' '.$_SESSION["FirstName"].' '.$_SESSION["LastName"].'</i>';
                                    echo'<span class="arrow_carrot-down"></span>';
                                    echo'<ul>';
                                    echo'<li><a href="Edit.php">Edit</a></li>';
                                    echo'<li><a href="SignOut.php">Signout</a></li>';
                                    echo'</ul>';
                                    }
                                }
                                ?>
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
                            <li><a href="./index.php">Home</a></li>
                            <li class="active"><a href="Products.php">Products</a></li>
                            <?php
                                if(!isset($_SESSION["Email"])){
                                    echo'<li><a href="contact.php">Contact</a></li>';   
                                }else
                                {if($_SESSION["Email"]){
                                        echo'<li><a href="Messages.php">Chat</a></li>'; 
                                }if ($_SESSION["Types"]=="HR Partner") {
                                        echo'<li><a href="Penalty.php">AddPenalty</a></li>';
                                }elseif ($_SESSION["Types"]=="Admin"){
                                        echo'<li><a href="Customers.php">Customers</a></li>';
                                }
                            }
                            ?>  
                        </ul>
                    </nav>
                </div>
                <div class="col-lg-3">
                    <div class="header__cart">
                        <ul><?php 
                            if(!isset($_SESSION["Email"])){                
                            }else{
                            echo'<li><a href="shopping-cart.php"><i class="fa fa-shopping-bag"></i>';
                            include "Cart.php";
                            include "DBController.php";
                            $db= new DBController();
                            $Cart = new Cart($db);
                            echo'<span>'.$Cart->Quantity($_SESSION["ID"]);
                            echo'</span></a></li>';
                            }
                        ?> 
                        </ul>
                        
                        <?php 
                        if(!isset($_SESSION["Email"])){
                        }else{
                            echo '<div class="header__cart__price">item:'; 
                            $db= new DBController();
                            $Cart = new Cart($db);
                            echo'<span>'.$Cart->Totalprice($_SESSION["ID"]);
                        }
                        ?></span></div>
                    </div>
                </div>
            </div>
        </div>
    </header>
    
    <section class="hero hero-normal">
        <div class="container">
            <div class="row">
                <div class="col-lg-3">
                    <div class="hero__categories">
                        <div class="hero__categories__all">
                            <i class="fa fa-bars"></i>
                            <span>All departments</span>
                        </div>
                        <ul>
                            <li><a href="Food.html">Food</a></li>
                            <li><a href="Electronics.html">Electronics</a></li>
                            <li><a href="Fashion.html">Fashion</a></li>
                            <li><a href="Perfumes.html">Perfumes</a></li>
                            <li><a href="Mobile Phones.html">Mobile Phones</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-9">
                    <div class="hero__search">
                        <div class="hero__search__form">
                            <form action="#">
                                <div class="hero__search__categories">
                                    All Categories
                                    <span class="arrow_carrot-down"></span>
                                </div>
                                <input type="text" placeholder="What do yo u need?">
                                <button type="submit" class="site-btn">SEARCH</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    
    <section class="breadcrumb-section set-bg" data-setbg="img/R.jpg">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="breadcrumb__text">
                        <h2>Products</h2>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- <div class="container">
        <div class="alert alert-success">
            <strong>Success!</strong>Order Done! 
        </div>
    </div> -->
  
    <section class="product spad">
                    <div class="container">
                        <div class="row">
                            <?php  while ($row = mysqli_fetch_array($result)) 
                            {?>
                            
                                <div class="col-lg-3 col-md-4 col-sm-6 mix oranges fresh-meat">
                                    <div class="product__item">
                                        <div class="product__item__pic set-bg" data-setbg="<?php echo $row['product_image'];?>">
                                        </div>
                                        <div class="featured__item__text">
                                            <h6>
                                                <a href="product.php?id=<?php echo $row['productID']; ?>">
                                            <?php echo $row['product_name']; ?>
                                        </a></h6>
                                        
                                            <h6><?php echo $row['product_price']; ?> $</h6>
                                        </div>
                                    </div>
                                </div>
                            
                         <?php }?>
                        </div>
                    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="js/main.js"></script>
</body>

</html>