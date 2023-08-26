<?php
class Product{
    protected $conn;

        public function __construct(){
            global $conn;
            $this -> conn = $conn;
    }

    public function fetch_all(){
        $sql = "SELECT * FROM products";
        $result = $this -> conn-> query ($sql);
        return $result -> fetch_all(MYSQLI_ASSOC);
    }


    public function read($product_id){
        $sql = $this -> conn -> prepare("SELECT * FROM products WHERE product_id = ?");
        $sql -> bind_param("i", $product_id);
        $sql -> execute();
        $result = $sql -> get_result();
        return $result -> fetch_assoc();

    }
}
?>