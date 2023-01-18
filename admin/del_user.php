<?php

include_once("./shared/connect.php");
if(isset($_GET['user_id']))
{
    $id= $_GET['user_id'];
    $sql = "DELETE 
            FROM user
            WHERE user_id=$id";
    mysqli_query($conn,$sql);
    header("location: user.php");
}

?>