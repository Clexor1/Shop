<?php
require_once 'inc/header.php';
require_once 'app/classes/Cart.php';


if(!$user -> is_logged()){
    header('location: login.php');
    exit();
}



$cart = new Cart();
$cart_items = $cart -> get_cart_items();
var_dump($cart);

?>

<table class= "table table-striped">
    <thead>
        <tr>
            <th scope="col">Product name</th>
            <th scope="col">Size</th>
            <th scope="col">Price</th>
            <th scope="col">Image</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach($cart_items as $item) : ?>
            <tr>
            <td><?php echo $item['name']; ?></td>
            <td><?php echo $item['size']; ?></td>
            <td><?php echo $item['price']; ?></td>
            <td><img src="<?php echo $item['image']; ?>" height="50" alt=""></td>
            </tr>
            <?php endforeach; ?>
    </tbody>

</table>
<a href="checkout.php" class="btn btn-success">Checkout</a>
<?php require_once 'inc/footer.php'; ?>
<link rel="stylesheet" href="public/css/style.css">