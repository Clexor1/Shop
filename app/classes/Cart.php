<?php
class Cart {
    protected $conn;

    public function __construct(){
        global $conn;
        $this -> conn = $conn;
}


    public function add_to_cart($product_id, $user_id, $quantity){
        $sql = $this -> conn -> prepare("INSERT INTO cart (user_id, product_id, quantity) VALUES (?,?,?)");
        $sql -> bind_param("iii", $user_id, $product_id, $quantity);
        $sql -> execute();
    }

    public function get_cart_items(){
        $sql = $this -> conn -> prepare ("SELECT p.product_id, p.name, p.price, p.size, p.image, c.quantity 
        FROM cart c
        INNER JOIN products p
        ON c.product_id = p.product_id 
        WHERE c.user_id = ?");

        $sql -> bind_param("i", $_SESSION['user_id']);
        $sql -> execute();
        $result = $sql -> get_result();
        return $result-> fetch_all(MYSQLI_ASSOC);
    }


    public function destroy_cart(){

    $sql = $this -> conn -> prepare("DELETE FROM cart WHERE user_id = ?");
    $sql -> bind_param("i", $_SESSION['user_id']);
    $sql -> execute();
    }

}


?>