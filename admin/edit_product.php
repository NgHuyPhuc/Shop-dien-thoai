<!DOCTYPE html>
<html>

<head>
    <?php
    include_once("./layouts/head.php")
    ?>
</head>
<?php
if (isset($_GET['prd_id'])) {
    $id = $_GET['prd_id'];
    $sql = "SELECT * 
            FROM product,category
            WHERE product.cat_id=category.cat_id AND prd_id= $id";

    $valueget = mysqli_query($conn, $sql);
    $value = mysqli_fetch_array($valueget);

    $sql2="SELECT * 
    FROM category
    ORDER BY cat_id ASC";
    $querycategory = mysqli_query($conn,$sql2);
}

if(isset($_POST['sbm']))
{
    //Basic
    $prd_name = $_POST['prd_name'];
    $prd_price = $_POST['prd_price'];
    $prd_warranty = $_POST['prd_warranty'];
    $prd_accessories = $_POST['prd_accessories'];
    $prd_promotion = $_POST['prd_promotion'];
    $prd_new = $_POST['prd_new'];

    //Advanced

    
    if( $prd_image = $_FILES["prd_image"]["name"] ==""){
        $prd_image = $value['prd_image'];
    }
    else{
        $prd_image = $_FILES["prd_image"]["name"];
        $file_size = $_FILES["prd_image"]["size"];
        $file_type = $_FILES["prd_image"]["type"];
        $file_error = $_FILES["prd_image"]["error"];
        $file_tmp_name = $_FILES["prd_image"]["tmp_name"];
        if($file_error==0)
        {
            move_uploaded_file($file_tmp_name,'./public/img/products/'.$prd_image);
        }
    }
    // $prd_image = $_FILES["prd_image"]["name"];
    $file_size = $_FILES["prd_image"]["size"];
    $file_type = $_FILES["prd_image"]["type"];
    $file_error = $_FILES["prd_image"]["error"];
    $file_tmp_name = $_FILES["prd_image"]["tmp_name"];
    if($file_error==0)
    {
        move_uploaded_file($file_tmp_name,'./public/img/products/'.$prd_image);
    }

    // $prd_image = $_POST['prd_image'];

    $cat_id = $_POST['cat_id'];
    $prd_status = $_POST['prd_status'];
    if(isset($_POST['prd_featured']))
    {
        $prd_featured = $_POST['prd_featured'];
    }
    else{
        $prd_featured = 0;
    }
    $prd_details = $_POST['prd_details'];

    $sqlupdate = "UPDATE product
                SET prd_name = '$prd_name',
                    prd_price = $prd_price,
                    prd_warranty = '$prd_warranty',
                    prd_accessories = '$prd_accessories',
                    prd_promotion = '$prd_promotion',
                    prd_new = '$prd_new',
                    prd_image = '$prd_image',
                    cat_id = $cat_id,
                    prd_status = $prd_status,
                    prd_featured = $prd_featured,
                    prd_details = '$prd_details'
                    WHERE prd_id= $id";

    mysqli_query($conn,$sqlupdate);
    header("location:./product.php");
}
?>

<body>
    <?php
    include_once("./layouts/header.php")
    ?>

    <?php
    include_once("./layouts/sidebar.php")
    ?>
    <div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
        <div class="row">
            <ol class="breadcrumb">
                <li><a href="#"><svg class="glyph stroked home">
                            <use xlink:href="#stroked-home"></use>
                        </svg></a></li>
                <li><a href="">Qu???n l?? s???n ph???m</a></li>
                <li class="active">S???n ph???m s??? 1</li>
            </ol>
        </div>
        <!--/.row-->

        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">S???n ph???m: S???n ph???m s??? 1</h1>
            </div>
        </div>
        <!--/.row-->
        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-body">
                        <div class="col-md-6">
                            <form role="form" method="post" enctype="multipart/form-data">
                                <div class="form-group">
                                    <label>T??n s???n ph???m</label>
                                    <input type="text" name="prd_name" required class="form-control" value="<?php echo $value['prd_name'] ?>" placeholder="">
                                </div>

                                <div class="form-group">
                                    <label>Gi?? s???n ph???m</label>
                                    <input type="number" name="prd_price" required value="<?php echo $value['prd_price'] ?>" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label>B???o h??nh</label>
                                    <input type="text" name="prd_warranty" required value="<?php echo $value['prd_warranty'] ?>" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label>Ph??? ki???n</label>
                                    <input type="text" name="prd_accessories" required value="<?php echo $value['prd_accessories'] ?>" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label>Khuy???n m??i</label>
                                    <input type="text" name="prd_promotion" required value="<?php echo $value['prd_promotion'] ?>" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label>T??nh tr???ng</label>
                                    <input type="text" name="prd_new" required value="<?php echo $value['prd_new'] ?>" type="text" class="form-control">
                                </div>

                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>???nh s???n ph???m</label>
                                <input type="file" name="prd_image">
                                <br>
                                <div>
                                    <img width='170' src="img/products/<?php echo $value['prd_image']?>">
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Danh m???c</label>
                                <select name="cat_id" class="form-control">

                                <!-- <option value=<?php echo $value['cat_id']?>><?php echo $value['cat_name']?></option> -->

                                    <?php
                                    foreach($querycategory as $item)
                                    {
                                    ?>
                                        <option <?php if($item['cat_id']==$value['cat_id'])
                                        {echo 'selected';}?> 
                                        value=<?php echo $item['cat_id']?>><?php echo $item['cat_name']?></option>
                                    <?php
                                    }
                                    ?> 
                                    
                                    <!-- <option selected value=1>iPhone</option>
                                    <option value=2>Samsung</option>
                                    <option value=3>Nokia</option>
                                    <option value=4>LG</option> -->
                                </select>
                            </div>

                            <div class="form-group">
                                <label>Tr???ng th??i</label>
                                <select name="prd_status" class="form-control">
                                    
                                    <option <?php echo $value['prd_status'] == 1 ? 'selected' : '' ?> value=1>C??n h??ng</option>
                                    <option <?php echo $value['prd_status'] == 0 ? 'selected' : '' ?> value=0>H???t h??ng</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <label>S???n ph???m n???i b???t</label>
                                <div class="checkbox">
                                    <label>
                                        <input <?php echo $value['prd_featured'] == 1 ? 'checked':''?> name="prd_featured" type="checkbox" value=1>N???i b???t
                                    </label>
                                </div>
                            </div>
                            <div class="form-group">
                                <label>M?? t??? s???n ph???m</label>
                                <textarea name="prd_details" required class="form-control" rows="3"><?php echo $value['prd_details'] ?></textarea>
                            </div>
                            <button type="submit" name="sbm" class="btn btn-primary">C???p nh???t</button>
                            <button type="reset" class="btn btn-default">L??m m???i</button>
                        </div>
                        </form>
                    </div>
                </div>
            </div><!-- /.col-->
        </div><!-- /.row -->

    </div>
    <!--/.main-->
    <?php
    include_once("./layouts/footer.php")
    ?>
</body>

</html>