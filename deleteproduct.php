<?php
    if ($_SERVER["REQUEST_METHOD"] == "GET") {
        if(isset($_GET['product_id'])){
            $product_id = $_GET['product_id'];
            $sql = "DELETE FROM products WHERE id='$product_id'";
            if(mysqli_query($con, $sql)) {
                echo "<script>alert('Data Deleted !');</script>";
                echo "<script>window.location='products.php';</script>";
            }
            else{
                echo "<script>alert('Error while deleting data !');</script>";
                echo "<script>window.location='products.php';</script>";
            }
        }
    }
 ?>
