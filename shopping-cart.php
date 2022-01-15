<!DOCTYPE html>
<head>
    <title>Shopping Cart</title>
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
                            <li><a href="Products.php">Products</a></li>
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
                        <h2>Shopping Cart</h2>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <?php  
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "web project";

    
    $conn = new mysqli($servername, $username, $password, $dbname);
            
    $sql = "SELECT products.product_name,products.product_price,products.product_image,cart.productQuantity,products.productID FROM products,cart WHERE products.productID=cart.productID AND cart.userID='".$_SESSION["ID"]."'";
    $result=mysqli_query($conn, $sql);
    if(isset($_GET['id'])){
        $sql1="SELECT productQuantity FROM cart WHERE productID='".$_GET['id']."'AND userID='".$_SESSION["ID"]."'";
        $result1=mysqli_query($conn, $sql1);
        $row=mysqli_fetch_array($result1);
        if(isset($row['productQuantity'])){
        for($i=0;$i<1;$i++){
            $sum=$row['productQuantity'];
        }
        $sum++;
        $sql2="UPDATE cart SET productQuantity ='".$sum."'WHERE userID='".$_SESSION["ID"]."'AND productID='".$_GET['id']."'";
        $result2=mysqli_query($conn, $sql2);
        }else{
        $sql3="INSERT INTO `cart`(`userID`, `productID`, `productQuantity`) VALUES ('".$_SESSION["ID"]."','".$_GET["id"]."','1')";
        $result3=mysqli_query($conn, $sql3);
        }
    }
    ?>
    <!-- Shoping Cart Section Begin -->
    <section class="shoping-cart spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="shoping__cart__table">
                        <table>
                            <thead>
                                <tr>
                                    <th class="shoping__product">Products</th>
                                    <th>Price</th>
                                    <th>Quantity</th>
                                    <th>Total</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php while($row=mysqli_fetch_array($result)){?>
                                <tr>
                                    <td class="shoping__cart__item">
                                        <?php echo'<h5>'.$row['product_name'].'</h5>';?>
                                    </td>
                                    <td class="shoping__cart__price">
                                        $<?php echo $row['product_price']; ?> 
                                    </td>
                                    <td class="shoping__cart__quantity">
                                        <div class="quantity">
                                            <div class="pro-qty">
                                            <?php echo'<input type="text" value="'.$row['productQuantity'].'">';?>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="shoping__cart__total">
                                    <?php echo $row['product_price']*$row['productQuantity'];?>
                                    </td>
                                    <td class="shoping__cart__item__close">
                                    <?php echo'<a href="delete_cart.php?id='.$row['productID'].'">';?><span class="icon_close"></span></a>
                                    </td>
                                </tr>
                            </tbody>
                            <?php } ?>
                        </table>
                    </div>
                </div>
                <?php
                $sqll="SELECT products.product_price,cart.productQuantity,products.product_name FROM products,cart WHERE cart.productID=products.productID AND cart.userID='".$_SESSION["ID"]."'";
        
                    $resultt =$conn->query($sqll);
                    $sum=0;
                ?>
                    <div class="col-lg-6">
                    <div class="checkout__order">
                                <h4>Check out</h4>
                                <div class="checkout__order__products">Products <span>Total</span></div>
                                
                                <?php while($row2 = mysqli_fetch_array($resultt)){
                                    $sum+=$row2["product_price"]*$row2["productQuantity"];
                                echo '<ul>';
                                echo '<li>'.$row2["product_name"].'<span>$ '.$row2["product_price"]*$row2["productQuantity"].'</span></li>';
                                echo'</ul>';
                                }?>
                                <?php
                                echo'<div class="checkout__order__total">Total <span>$'.$sum.'</span></div>';
                                ?>
                                <?php if(isset($sum)){
                                echo'<a href="Order.php"><button type="submit" action="index.php" class="site-btn">PLACE ORDER</button></a>';
                                }?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="js/main.js"></script>


</body>

</html>