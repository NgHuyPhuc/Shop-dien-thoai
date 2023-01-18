<?php

include_once("./shared/connect.php");
if(isset($_GET['prd_id']))
{
    $id= $_GET['prd_id'];
    $sql = "DELETE 
            FROM product 
            WHERE prd_id=$id";
    mysqli_query($conn,$sql);
    header("location: product.php");
}

?>