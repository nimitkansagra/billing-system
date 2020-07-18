<?php
    if ($_SERVER["REQUEST_METHOD"] == "GET") {
        if(isset($_GET['vendor_id'])){

            $vendor_id = $_GET['vendor_id'];
            $sql = "DELETE FROM vendors WHERE id='$vendor_id'";
            if(mysqli_query($con, $sql)) {
                echo "<script>alert('Data Deleted !');</script>";
                echo "<script>window.location='vendors.php';</script>";
            }
            else{
                echo "<script>alert('Error while deleting data !');</script>";
                echo "<script>window.location='vendors.php';</script>";
            }
        }
    }
 ?>
