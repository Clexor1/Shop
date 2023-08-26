<?php
class Cart {
    protected $conn;

    public function __construct(){
        global $conn;
        $this -> conn = $conn;
}


    public function add_to_cart($product_id, $user_id){
        $sql = $this -> conn -> prepare("INSERT INTO cart (user_id, product_id) VALUES (?,?)");
        $sql -> bind_param("ii", $user_id, $product_id);
        $sql -> execute();
    }

    public function get_cart_items(){
        $sql = $this -> conn -> prepare ("SELECT p.product_id, p.name, p.price, p.size, p.image 
        FROM cart c
        INNER JOIN products p
        ON c.product_id = p.product_id 
        WHERE c.user_id = ?");

        $sql -> bind_param("i", $_SESSION['user_id']);
        $sql -> execute();
        $result = $sql -> get_result();
        return $result-> fetch_all(MYSQLI_ASSOC);
    }

}


?>