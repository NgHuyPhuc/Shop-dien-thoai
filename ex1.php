<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<?php
    // $conn = mysqli_connect("localhost","root","","vietpro_mobile_shop");

    // mysqli_query($conn,"SET NAMES 'utf8'");
    // $sql="INSERT INTO category(cat_name)
    //         VALUES ('huawei')";
    // $sql="UPDATE category
    //         SET cat_name='dienthoaitq'
    //         WHERE cat_id=10";
    // $sql="DELETE FROM category
    //         WHERE cat_id=10";
    // $sql ="SELECT * FROM user";
    // $query = mysqli_query($conn,$sql);
    // $row = mysqli_fetch_all($query);
    // $row = mysqli_fetch_array($query);
    

    // echo"<pre>";
    // var_dump($row);
    // print_r($row);
    // echo"</pre>";

    // echo($row[3]);
    // print_r($row);

    // while( $row = mysqli_fetch_array($query))
    // {
    //     echo $row["user_mail"];
    //     echo "</br>";
    //     echo $row["user_pass"];
    //     echo "<hr/>";
    // }

    // $sql ="SELECT prd_name, cat_name
    // FROM product  INNER JOIN category
    // ON category.cat_id=product.cat_id";
    // $sql="SELECT product.prd_name,category.cat_name
    // FROM product,category
    // WHERE product.cat_id=category.cat_id";
    // $query = mysqli_query($conn,$sql);

    
    // if(isset($_POST["sbm"])){

    //     echo $file_name = $_FILES["fileupload"]["name"];
    //     echo $file_size = $_FILES["fileupload"]["size"];
    //     echo $file_type = $_FILES["fileupload"]["type"];
    //     echo $file_error = $_FILES["fileupload"]["error"];
    //     echo $file_tmp_name = $_FILES["fileupload"]["tmp_name"];

    //     if($file_error==0){
    //         move_uploaded_file($file_tmp_name,"./upload/".$file_name);
    //     }
    // }
    if(isset($_POST['sbm']))
    {
        // print_r($_POST) ;
        foreach($_POST['mua'] as $item)
        {
            echo $item.",";
        }

    }
    
?>
<body>
    <!-- <form method="POST" enctype="multipart/form-data">
        <input type="file" name="fileupload"/>
        <input type="submit" name="sbm" value="upload">
    </form> -->
    <form action="" method="post">
        <input type="checkbox" name="mua[]" value="Xuan">Xuan</input>
        <input type="checkbox" name="mua[]" value="Ha">Ha</input>
        <input type="checkbox" name="mua[]" value="Thu">Thu</input>
        <input type="checkbox" name="mua[]" value="Dong">Dong</input>
        <button name="sbm" type="submit">post</button>
    </form>

</body>

</html>