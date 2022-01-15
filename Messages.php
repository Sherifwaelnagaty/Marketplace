<!DOCTYPE html>
<head>
    <title>Chat</title>
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
                            <?php
                                if(!isset($_SESSION["Email"])){
                                    echo'<a href="Login.php"><i class="fa fa-user"></i>Login</a>';   
                                }else{
                                    if($_SESSION["Email"]){
                                    echo'<i class="fa fa-user">'.' '.$_SESSION["FirstName"].' '.$_SESSION["LastName"].'</i>';
                                    echo'<span class="arrow_carrot-down"></span>';
                                    echo'<ul>';
                                    echo'<li><a href="Edit">Edit</a></li>';
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
            <div class="humberger__open">
                <i class="fa fa-bars"></i>
            </div>
        </div>
    </header>
   
    <section class="breadcrumb-section set-bg" data-setbg="img/R.jpg">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="breadcrumb__text">
                        <h2>Chat</h2>
                    </div>
                </div>
            </div>
        </div>
    </section><?php
                $servername = "localhost";
                $un = "root";
                $password = "";
                $DB = "web project";

            $conn = new mysqli($servername, $un, $password, $DB);

             
            ?>
            <br>
                    <div class="hero__search__form">
                            <form method="POST" class="form-inline">
                                <div class="hero__search__categories">
                                    Users
                                </div>
                                <input type="text" name="name" placeholder="What do yo u need?">                                
                                <button type="submit" name='search'class="site-btn">SEARCH</button>
                            </form>
                        </div>
                    </div>
                </div>

            <?php
            if(isset($_POST['search'])) {
                $search=$_POST['name'];
                $searchUser = "SELECT * FROM users WHERE FirstName = '$search'";
                $searchUserResult = mysqli_query($conn,$searchUser);

                while($searchUserRow = mysqli_fetch_array($searchUserResult)){  ?>
                    
                    <div>
                        <br><br><br>
                    <img src = "<?=$searchUserRow['ProfilePicture']?>" class="img-circle" width = "40"/>
                    <?=$searchUserRow['FirstName'].' '.$searchUserRow['LastName']?>
                    <a href="./message.php?receiver=<?=$searchUserRow['userID']?>">Send message</a>
                    </div>

            <?php }
            }
            ?>
            <div>
            <?php
            $lastMessage = "SELECT DISTINCT sent_by FROM chat WHERE received_by = ".$_SESSION['ID'];
            $lastMessageResult = mysqli_query($conn,$lastMessage);
            if(mysqli_num_rows($lastMessageResult) > 0) {
                while($lastMessageRow = mysqli_fetch_array($lastMessageResult)) {
                    $sent_by = $lastMessageRow['sent_by'];
                    $getSender = "SELECT * FROM users WHERE userID = '$sent_by'";
                    $getSenderResult = mysqli_query($conn,$getSender) or die(mysqli_error($conn));
                    $getSenderRow = mysqli_fetch_array($getSenderResult);
                    ?>
                    <div>
                    <img src = "./images/<?=$getSenderRow['ProfilePicture']?>" class="img-circle" width = "40"/> 
                    <?=$getSenderRow['FirstName'].' '.$getSenderRow['LastName'];?>
                    <a href="./message.php?receiver=<?=$sent_by?>">Send message</a>
                    </div>
            <?php }
            } 
            else {
                echo '<br><br><br>';
            }
            ?>
</div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="js/main.js"></script>
</body>

</html>