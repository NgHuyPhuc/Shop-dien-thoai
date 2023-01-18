<?php

include_once("./shared/connect.php");
if(isset($_GET['cat_id']))
{
    $id= $_GET['cat_id'];
    $sql = "DELETE 
            FROM category
            WHERE cat_id=$id";
    mysqli_query($conn,$sql);
    header("location: category.php");
}

?>