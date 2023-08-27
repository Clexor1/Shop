<?php require_once '../app/config/config.php'; 
require_once '../app/classes/User.php';
//require_once '../inc/header.php';
require_once '../app/classes/Product.php';



$user = new User();
if($user->is_logged() && $user -> is_admin()):
    $products = new Product();
    $products = $products -> fetch_all();
?>
 <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel ="style">
<div class="container">
    <a href="add_product.php" class="btn btn-success">Add product</a>

    <table class="table table-striped">
        <thead>
            <tr>
                    <th scope="col">Product id</th>
                    <th scope="col">Name</th>
                    <th scope="col">Price</th>
                    <th scope="col">Size</th>
                    <th scope="col">Image</th>
                    <th scope="col">Created at</th>
                    <th scope="col">Actions</th>
            </tr>
        </thead>
        <tbody>
                    <?php foreach($products as $product) : ?>
                        <tr>
                            <th scope ="row"><?php echo $product['product_id']; ?></th>
                            <td><?php echo $product['name']; ?></td>
                            <td>$<?php echo $product['price']; ?></td>
                            <td><?php echo $product['size']; ?></td>
                            <td><?php echo $product['image']; ?></td>
                            <td><?php echo $product['created_at']; ?></td>
                            <td>
                                <a href="edit_product.php?id=<?php echo $product['product_id'];?>" class="btn btn-primary">Edit</a>
                                <a href="delete_product.php?id=<?php echo $product['product_id'];?>"  class="btn btn-primary">Delete</a>
                            </td>
                        </tr>
                        <?php endforeach; ?>
        </tbody>
    </table>

</div>
    
<?php endif; ?>


<?php require_once '../inc/footer.php'; ?>