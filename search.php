<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <title>Search</title>
    <?php
    include_once('./layouts/head.php');
    ?>
</head>
<?php
if (isset($_GET['search'])) {
    
    $arr=explode(" ",$_GET['search']);
    $search = "%".implode("%",$arr)."%";
    $sql = "SELECT * FROM product 
            WHERE prd_name like '$search'";
    $querysearch = mysqli_query($conn,$sql);
    // $all = mysqli_fetch_array($querysearch);
    // foreach($querysearch as $item){
    //     echo $item['prd_name'];
    // }
    $count = mysqli_num_rows($querysearch);
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
                        <div id="search-result">Kết quả tìm kiếm với sản phẩm <span><?php echo $_GET['search']?></span></div>
                        <div class="product-list card-deck">
                            <?php
                            foreach ($querysearch as $index => $item) {
                                // while($item = mysqli_fetch_array($querysearch)){
                            ?>
                                <div class="product-item card text-center">
                                    <a href="../product.php?prd_id=<?php echo $item['prd_id']?>"><img src="../admin/public/img/products/<?php echo $item['prd_image']?>"></a>
                                    <h4><a href="../product.php?prd_id=<?php echo $item['prd_id']?>"><?php echo $item['prd_name']?></a></h4>
                                    <p>Giá Bán: <span><?php echo $item['prd_price']?>đ</span></p>
                                </div>
                            <?php
                            }
                            ?>

                            <!-- <div class="product-item card text-center">
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

                <?php
                include_once('./layouts/sidebar.php');
                ?>
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