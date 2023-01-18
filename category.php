<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8" />
<title>Category</title>
<?php
include_once('./layouts/head.php');
?>
</head>
<?php
if(isset($_GET['cat_id']))
{
    $cat_id=$_GET['cat_id'];
    $sql="SELECT *
        FROM product WHERE cat_id=$cat_id
        ORDER BY prd_id DESC";
    // $query=mysqli_query($conn,$sql);

    // $sql = "SELECT * 
    // FROM `product` 
    // WHERE cat_id=$cat_id
    // ORDER BY prd_id DESC";

    $query = mysqli_query($conn, $sql);
    // var_dump($query);
    $count = mysqli_num_rows($query);
    // $query = mysqli_fetch_array($query);
}
?>

<body>

<!--	Header	-->
<?php
    include_once('./layouts/header.php');
?>
<!--	End Header	-->

<!--	Body	-->
<div id="body">
	<div class="container">
    	<div class="row">
        	<div class="col-lg-12 col-md-12 col-sm-12">
            	<nav>
                	<div id="menu" class="collapse navbar-collapse">
                    <?php
                        include_once('./layouts/menu.php');
                    ?>
                    </div>
                </nav>
            </div>
        </div>
        <div class="row">
        	<div id="main" class="col-lg-8 col-md-12 col-sm-12">
            	<!--	Slider	-->
                <?php
                    include_once('./layouts/slider.php');
                ?>
                <!--	End Slider	-->
                
                <!--	List Product	-->
                <div class="products">
                    <h3><?php echo $_GET['cat_name']?> (hiện có <?php echo $count?> sản phẩm)</h3>
                    <div class="product-list card-deck">
                        <?php
                        foreach($query as $item)
                        {
                            ?>
                                <div class="product-item card text-center">
                                <a href="../product.php?prd_id=<?php echo $item['prd_id']?>"><img src="../admin/public/img/products/<?php echo $item['prd_image']?>"></a>
                                <h4><a href="../product.php?prd_id=<?php echo $item['prd_id']?>"><?php echo $item['prd_name']?></a></h4>
                                <p>Giá Bán: <span><?php echo $item['prd_price'] ?>đ</span></p>
                                </div>
                            <?php  
                        }
                        ?>
                        <!-- <div class="product-item card text-center">
                            <a href="#"><img src="images/product-1.png"></a>
                            <h4><a href="#">iPhone Xs Max 2 Sim - 256GB</a></h4>
                            <p>Giá Bán: <span>32.990.000đ</span></p>
                        </div>

                        <div class="product-item card text-center">
                            <a href="#"><img src="images/product-2.png"></a>
                            <h4><a href="#">iPhone Xs Max 2 Sim - 256GB</a></h4>
                            <p>Giá Bán: <span>32.990.000đ</span></p>
                        </div>
                        <div class="product-item card text-center">
                            <a href="#"><img src="images/product-3.png"></a>
                            <h4><a href="#">iPhone Xs Max 2 Sim - 256GB</a></h4>
                            <p>Giá Bán: <span>32.990.000đ</span></p>
                        </div> -->
                    </div>
                </div>
                <!--	End List Product	-->
                
                <div id="pagination">
                    <ul class="pagination">
                        <li class="page-item"><a class="page-link" href="#">Trang trước</a></li>
                        <li class="page-item active"><a class="page-link" href="#">1</a></li>
                        <li class="page-item"><a class="page-link" href="#">2</a></li>
                        <li class="page-item"><a class="page-link" href="#">3</a></li>
                        <li class="page-item"><a class="page-link" href="#">Trang sau</a></li>
                    </ul> 
                </div>
                
            </div>
            
            <div id="sidebar" class="col-lg-4 col-md-12 col-sm-12">
            	<div id="banner">
                	<div class="banner-item">
                    	<a href="#"><img class="img-fluid" src="images/banner-1.png"></a>
                    </div>
                    <div class="banner-item">
                    	<a href="#"><img class="img-fluid" src="images/banner-2.png"></a>
                    </div>
                    <div class="banner-item">
                    	<a href="#"><img class="img-fluid" src="images/banner-3.png"></a>
                    </div>
                    <div class="banner-item">
                    	<a href="#"><img class="img-fluid" src="images/banner-4.png"></a>
                    </div>
                    <div class="banner-item">
                    	<a href="#"><img class="img-fluid" src="images/banner-5.png"></a>
                    </div>
                    <div class="banner-item">
                    	<a href="#"><img class="img-fluid" src="images/banner-6.png"></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!--	End Body	-->

<!--	Footer	-->
<?php
    include_once('./layouts/footer.php');
?>
<!--	End Footer	-->













</body>
</html>
