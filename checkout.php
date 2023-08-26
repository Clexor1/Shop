<?php
require_once 'inc/header.php';
require_once 'app/classes/Cart.php';
require_once 'app/classes/Order.php';


if(!$user -> is_logged()){
    header('location: login.php');
    exit();
}





if($_SERVER['REQUEST_METHOD'] == "POST"){ 

    $delivery_address = $_POST['country']. ", " . $_POST['city']. ", ". $_POST['zip']. ", " . $_POST['adress'];
    $order = new Order();
    $order = $order -> create($delivery_address);
  
    
        $_SESSION['message']['type'] = "success"; //danger ili success
        $_SESSION['message']['text'] = "Uspjesno narucene majice";
        header("Location: orders.php");
        exit();
}



?>
<form action="" method ="post">
    <div class = "form-group mb-3">
        <label for="country">Drzava</label>
        <input type="text" class="form-control" id = "country" name ="country" required>
    </div>
    <div class = "form-group mb-3">
        <label for="country">Grad</label>
        <input type="text" class="form-control" id = "city" name ="city" required>
    </div>
    <div class = "form-group mb-3">
        <label for="country">Postanski broj</label>
        <input type="text" class="form-control" id = "zip" name ="zip" required>
    </div>
    <div class = "form-group mb-3">
        <label for="country">Adresa</label>
        <input type="text" class="form-control" id = "adress" name ="adress" required>
    </div>
    <button type ="submit" class= "btn btn-primary ">Order</button>

    
</form>

<?php require_once 'inc/footer.php'; ?>

<link rel="stylesheet" href="public/css/style.css">