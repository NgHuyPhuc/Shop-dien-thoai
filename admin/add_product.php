<!DOCTYPE html>
<html>
<head>
<?php 
		include_once("./layouts/head.php")

	?>
</head>
<?php
$sql="SELECT * 
    FROM category
    ORDER BY cat_id ASC";
$querycategory = mysqli_query($conn,$sql);

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

    $prd_image = $_FILES["prd_image"]["name"];
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

    $sqlinsert="INSERT INTO product(
                prd_name,
                prd_price,
                prd_warranty,
                prd_accessories,
                prd_promotion,
                prd_new,
                prd_image,
                cat_id,
                prd_status,
                prd_featured,
                prd_details
                )
                VALUES(
                    '$prd_name',
                    '$prd_price',
                    '$prd_warranty',
                    '$prd_accessories',
                    '$prd_promotion',
                    '$prd_new',
                    '$prd_image',
                    '$cat_id',
                    '$prd_status',
                    '$prd_featured',
                    '$prd_details'
                )";
    mysqli_query($conn,$sqlinsert);
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
                <li><a href="#"><svg class="glyph stroked home"><use xlink:href="#stroked-home"></use></svg></a></li>
                <li><a href="">Qu???n l?? s???n ph???m</a></li>
				<li class="active">Th??m s???n ph???m</li>
			</ol>
		</div><!--/.row-->
		
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">Th??m s???n ph???m</h1>
			</div>
        </div><!--/.row-->
        <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-body">
                            <div class="col-md-6">
                                <form role="form" method="post" enctype="multipart/form-data">
                                <div class="form-group">
                                    <label>T??n s???n ph???m</label>
                                    <input required name="prd_name" class="form-control" placeholder="">
                                </div>
                                                                
                                <div class="form-group">
                                    <label>Gi?? s???n ph???m</label>
                                    <input required name="prd_price" type="number" min="0" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label>B???o h??nh</label>
                                    <input required name="prd_warranty" type="text" class="form-control">
                                </div>    
                                <div class="form-group">
                                    <label>Ph??? ki???n</label>
                                    <input required name="prd_accessories" type="text" class="form-control">
                                </div>                  
                                <div class="form-group">
                                    <label>Khuy???n m??i</label>
                                    <input required name="prd_promotion" type="text" class="form-control">
                                </div>  
                                <div class="form-group">
                                    <label>T??nh tr???ng</label>
                                    <input required name="prd_new" type="text" class="form-control">
                                </div>  
                                
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>???nh s???n ph???m</label>
                                    
                                    <input required name="prd_image" type="file">
                                    <br>
                                    <div>
                                        <img src="img/download.jpeg">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>Danh m???c</label>
                                    <select name="cat_id" class="form-control">
                                        <?php 
                                        foreach($querycategory as $value)
                                        {
                                        ?>
                                            <option value=<?php echo $value['cat_id']?>><?php echo $value['cat_name']?></option>
                                        <?php
                                        }
                                        ?>
                                        <option value=2>Samsung</option>
                                        <option value=3>Nokia</option>
                                        <option value=4>LG</option>
                                    </select>
                                </div>
                                
                                <div class="form-group">
                                    <label>Tr???ng th??i</label>
                                    <select name="prd_status" class="form-control">
                                        <option value=1 selected>C??n h??ng</option>
                                        <option value=0>H???t h??ng</option>
                                    </select>
                                </div>
                                
                                <div class="form-group">
                                    <label>S???n ph???m n???i b???t</label>
                                    <div class="checkbox">
                                        <label>
                                            <input name="prd_featured" type="checkbox" value=1>N???i b???t
                                        </label>
                                    </div>
                                </div>
                                <div class="form-group">
                                        <label>M?? t??? s???n ph???m</label>
                                        <textarea id="prd_details" required name="prd_details" class="form-control" rows="3"></textarea>
                                        <script>
                                            CKEDITOR.replace( 'prd_details' );
                                        </script>
                                    </div>
                                <button name="sbm" type="submit" class="btn btn-success">Th??m m???i</button>
                                <button type="reset" class="btn btn-default">L??m m???i</button>
                            </div>
                        </form>
                        </div>
                    </div>
                </div><!-- /.col-->
            </div><!-- /.row -->
		
	</div>	<!--/.main-->	
    <?php 
		include_once("./layouts/footer.php")
	?>
</body>

</html>
