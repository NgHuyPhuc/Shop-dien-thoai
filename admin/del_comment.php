<?php

include_once("./shared/connect.php");
if(isset($_GET['comm_id']))
{
    $id= $_GET['comm_id'];
    $sql = "DELETE 
            FROM comment 
            WHERE comm_id=$id";
    mysqli_query($conn,$sql);
    header("location: comment.php");
}

?>