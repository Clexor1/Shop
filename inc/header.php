<?php
require_once('app/config/config.php');
require_once('app/classes/User.php');
$user = new User();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shop</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel ="style">
</head>
<body>
      <nav>
        <ul>
            <li><a href="index.php">Home</a></li>
            <li><a href="#news">About us</a></li>
            <?php
            if(!$user->is_logged()): ?>
            <li><a href="login.php">Login</a></li>
            <li><a href="register.php">Registration</a></li>
            <?php else: ?>
            <li><a href="">My orders</a></li>
            <li><a href="logout.php">Logout</a></li>   
            <?php endif;?>
            <li style="float:right"><a class="active" href="#about">Shop</a></li>
        </ul>
      </nav>
<div class="container">
<?php  if (isset($_SESSION['message'])) : ?>
            <div class="alert alert-<?php echo $_SESSION['message']['type'];?> alert-dismissible fade show" role="alert">
            <?php
            echo $_SESSION['message']['text'];
            unset($_SESSION['message']);
            ?>   
            </div>
        <?php  endif; ?>