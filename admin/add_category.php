<!DOCTYPE html>
<html>
<head>
<?php 
		include_once("./layouts/head.php")
	?>
</head>
<?php
$sql = "SELECT * 
    FROM category";
$querycategory = mysqli_query($conn, $sql);

if (isset($_POST['sbm'])) {
	//Basic
	$cat_name = $_POST['cat_name'];
	$errorname = '';
	$checkname = true;
	foreach ($querycategory as $item) {
		if ($item['cat_name'] == $cat_name) {
			$checkname = false;
		}
	}
	if ($checkname == false) {
		$errorname = 'Danh mục đã tồn tại !';
	}
	else {
		echo $sqlinsert = "INSERT INTO category(
			cat_name
			)
			VALUES(
				'$cat_name'
			)";
		mysqli_query($conn, $sqlinsert);
		header("location:./category.php");
	}
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
				<li><a href="">Quản lý danh mục</a></li>
				<li class="active">Thêm danh mục</li>
			</ol>
		</div><!--/.row-->
		
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">Thêm danh mục</h1>
			</div>
		</div><!--/.row-->
        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-body">
                        <div class="col-md-8">
							<?php
								if(isset($_POST['sbm']))
								{
									if($checkname == false)
									{
									?>
                        				<div class="alert alert-danger"><?php echo $errorname?></div>
									<?php
									}
								}
							?>

                            <form role="form" method="post">
                            <div class="form-group">
                                <label>Tên danh mục:</label>
                                <input required type="text" name="cat_name" class="form-control" placeholder="Tên danh mục...">
                            </div>
                            <button type="submit" name="sbm" class="btn btn-success">Thêm mới</button>
                            <button type="reset" class="btn btn-default">Làm mới</button>
                        </div>
                    	</form>
                    </div>
                </div>
            </div><!-- /.col-->
	</div>	<!--/.main-->	
	<?php 
		include_once("./layouts/footer.php")
	?>
</body>

</html>
