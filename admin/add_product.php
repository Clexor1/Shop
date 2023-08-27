<link rel="stylesheet" href="https://unpkg.com/dropzone@5/dist/min/dropzone.min.css" type="text/css" />
<?php require_once '../app/config/config.php'; 
require_once '../app/classes/User.php';
require_once '../app/classes/Product.php';

$user = new User;
if($user->is_logged() && $user -> is_admin()):
    if($_SERVER['REQUEST_METHOD'] == "POST"){ 

    $product_obj = new Product();

    $name = $_POST['name'];
    $price = $_POST['price'];
    $size = $_POST['size'];
    $image = $_POST['photo_path'];

   $product_obj -> create($name, $price, $size, $image);
    header('Location: index.php');
    }
endif;
?>

<form action="" method="post">
    <input type="text" name ="name" placeholder="Product name">
    <input type="text" name ="price" step="0.01" placeholder="Product price">
    <input type="text" name ="size" placeholder="Product size">
    <input type="hidden" name ="photo_path" id="photoPathInput">
    <div id="dropzone-upload" class="dropzone"></div>
    <input type="submit" name="" id="" value="Add product">

</form>
<script src="https://unpkg.com/dropzone@5/dist/min/dropzone.min.js"></script>


<script>

    Dropzone.options.dropzoneUpload = {
        url: "upload_photo.php",
        paramName: "photo",
        maxFilesize: 20,
        acceptedFiles:"image/*",
        init: function(){
            this.on("success", function(file, response){
            const jsonResponse = JSON.parse(response);
        if(jsonResponse.success){
            document.getElementById('photoPathInput').value = jsonResponse.photo_path;

        }
        else{
            console.error(jsonResponse.error);
        }
        } );
        }
    };
</script>