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
        public function create($name, $price, $size, $image){
            $sql = "INSERT INTO products (name, price, size, image) VALUES (?, ?, ?, ?)";
            $sql = $this-> conn -> prepare($sql);
            $sql -> bind_param("ssss", $name, $price, $size, $image);
            $sql ->execute();  //izvr

        }

    public function read($product_id){
        $sql = $this -> conn -> prepare("SELECT * FROM products WHERE product_id = ?");
        $sql -> bind_param("i", $product_id);
        $sql -> execute();
        $result = $sql -> get_result();
        return $result -> fetch_assoc();

    }

    public function update($product_id, $name, $price, $size, $image){
        $sql = "UPDATE products SET name = ?, price = ?, size = ?, image = ? WHERE product_id = ?";
        $sql = $this-> conn -> prepare($sql);
        $sql -> bind_param("ssssi", $name, $price, $size, $image, $product_id);
        $sql ->execute();  //izvr
    }

    public function delete($product_id){
        $sql = "DELETE FROM products WHERE product_id = ?";
        $sql = $this-> conn -> prepare($sql);
        $sql -> bind_param("i",$product_id);
        $sql ->execute();  //izvr
    }
}
?>