<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <title>Home</title>
    <?php
    include_once('./layouts/head.php');
    ?>
</head>
<?php

$sqlnoibat = "SELECT * 
FROM `product` 
WHERE prd_featured = 1
ORDER BY prd_id DESC
LIMIT 6";

$query = mysqli_query($conn, $sqlnoibat);

$sqllast = "SELECT * 
FROM `product` 
ORDER BY prd_id DESC
LIMIT 6";

$querylast = mysqli_query($conn, $sqllast);
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
                        <?php
                        include_once('./layouts/menu.php');
                        ?>
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

                    <!--	Feature Product	-->
                    <div class="products">
                        <h3>Sản phẩm nổi bật</h3>
                        <div class="product-list card-deck">
                            <?php
                            foreach ($query as $item) {
                            ?>
                                <div class="product-item card text-center">
                                    <a href="../product.php?prd_id=<?php echo $item['prd_id']?>"><img src="../admin/public/img/products/<?php echo $item['prd_image'] ?>"></a>
                                    <h4><a href="../product.php?prd_id=<?php echo $item['prd_id']?>"><?php echo $item['prd_name'] ?></a></h4>
                                    <p>Giá Bán: <span><?php echo $item['prd_price'] ?>đ</span></p>
                                </div>
                            <?php
                            }
                            ?>
                        </div>
                    </div>
                    <!--	End Feature Product	-->


                    <!--	Latest Product	-->
                    <div class="products">
                        <h3>Sản phẩm mới</h3>
                        <div class="product-list card-deck">
                            <?php
                            foreach ($querylast as $item) {
                            ?>
                                <div class="product-item card text-center">
                                    <a href="../product.php?prd_id=<?php echo $item['prd_id']?>"><img src="../admin/public/img/products/<?php echo $item['prd_image'] ?>"></a>
                                    <h4><a href="../product.php?prd_id=<?php echo $item['prd_id']?>"><?php echo $item['prd_name'] ?></a></h4>
                                    <p>Giá Bán: <span><?php echo $item['prd_price'] ?>đ</span></p>
                                </div>
                            <?php
                            }
                            ?>
                        </div>
                        <!--	End Latest Product	-->

                    </div>

                    
        </div>
        <?php
                include_once('./layouts/sidebar.php');
            ?>
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








</body>
</html>
