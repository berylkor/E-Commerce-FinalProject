<?php
    include_once('../settings/core.php');
    check_login();
    include_once("../functions/display_cart.php");
    // session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cart</title>
    <link rel="shortcut icon" href="../images/favicon/favicon.ico" type="image/x-icon">
    <link rel="stylesheet" href="../css/cart.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,300,0,100" />
</head>
<body class="cart_body">
    <header>
        <h3 id="Logo">NicheNest</h3>
        <div class="action_buttons">
            <a href="home_view.php"><button>Home</button></a>
            <a href="brand_view.php"><button>Brands</button></a>
            <a href="products_view.php"><button>Products</button></a>
            <a href="cart_view.php"><button>Cart</button></a>
            <a href="logout_view.php"><button>Logout</button></a>
        </div>
    </header>
    <main>
        <div class="cart_container">
            <h1>Cart</h1>
            <div class="mastercontainer">
                <input type="checkbox" id="mastercheckbox" class="selectors">
                <h3>Items Selected</h3>
            </div>
            <form action="../actions/add_order_action.php" method="post">
                <?php
                    $custid = $_SESSION['user_id'];
                    display_cart($custid);
                ?>
                
            </form>
        </div>
    </main>
</body>
<script src="../js/cart.js"></script>
</html>
