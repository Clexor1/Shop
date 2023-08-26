<link rel="stylesheet" href="public/css/style.css">
<?php require_once "inc/header.php";?>
<?php require_once "app/classes/User.php";?>




<?php
    if($user->is_logged()){
        header('location: index.php');
        exit();
    }


 if($_SERVER['REQUEST_METHOD'] == "POST"){  //dali je poslan zahtjev
    $username = $_POST['username'];
    $password = $_POST['password'];
    $user = new User();
    $result = $user->login($username, $password);

    if(!$result ){
    $_SESSION['message']['type'] = "danger"; //danger ili success
    $_SESSION['message']['text'] = "Netocan username ili sifra";
    header("Location: login.php");
    exit();
    }
    header("Location: index.php");
    exit();

}
?>
    <div class = "row  justify-content-center">
        <div class = "col-lg-5">
            <h1 class="text-center py-5">Login</h1>
            <form action="" method="POST">
                <div class="mb-3">
                    <label for="username" class="form-label">Username</label>
                    <input type="username" name = "username" class="form-control" id="username">
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" name = "password" class="form-control" id="password">
                </div>
                <button type="submit" class="btn btn-primary">Login</button>
            </form>
        </div>
        <a href="register.php">Registracija</a>
    </div>
    
<?php require_once 'inc/footer.php';?>