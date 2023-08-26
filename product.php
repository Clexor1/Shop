<?php
require_once 'inc/header.php';
require_once 'app/classes/product.php';
require_once 'app/classes/Cart.php';

$product = new product();
$product = $product ->read ($_GET['product_id']);

if($_SERVER['REQUEST_METHOD'] == "POST"){  //dali je poslan zahtjev
    $product_id = $product['product_id'];
    $user_id = $_SESSION['user_id'];
    $cart = new Cart();
    $cart -> add_to_cart($product_id, $user_id);

    header('Location:cart.php');
    exit();
}
?>
<link rel="stylesheet" href="public/css/style.css">

<div class = "row">
            <div class = "col-lg-6">
                <img src="<?php echo $product['image']; ?>" class="img-fluid">
            </div>
                <div class = "col-lg-6">
                    <div class = "card-body">
                        <h2><?php echo $product['name']; ?></h2>
                        <p >Size: <?php echo $product['size']?></p>
                        <p >Price: $<?php echo $product['price']?></p>
                        <form action="" method = "post">
                            <button type="submit" class = "btn btn-primary">Add to cart</button>
                        </form>
                </div>
</div>  
 <?php require_once 'inc/footer.php';?>
