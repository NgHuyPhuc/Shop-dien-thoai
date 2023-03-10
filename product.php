<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <title>Product</title>
    <?php
    include_once('./layouts/head.php');
    ?>
</head>
<?php

//sql hien thi san pham
$prd_id = $_GET['prd_id'];
$sql = "SELECT * FROM product
        WHERE prd_id = $prd_id";
$queryitem = mysqli_query($conn, $sql);
$productitem = mysqli_fetch_array($queryitem);

//sql comment
$sqlcmt = "SELECT *FROM comment
        WHERE prd_id=$prd_id ORDER BY comm_id DESC";
$querycomment = mysqli_query($conn, $sqlcmt);

if(isset($_POST['sbm']))
{
    $comm_name = $_POST['comm_name'];
    $comm_mail = $_POST['comm_mail'];
    $comm_details = $_POST['comm_details'];
    date_default_timezone_get('Asia/Ho_Chi_Minh');
    $comm_date = date('Y-m-d H:i:s');
    $sqlinsert = "INSERT INTO comment(
        prd_id,
        comm_name,
        comm_mail,
        comm_details,
        comm_date
        )
        VALUES(
            '$prd_id',
            '$comm_name',
            '$comm_mail',
            '$comm_details',
            '$comm_date'

        )";
    mysqli_query($conn, $sqlinsert);
    header("location:./product.php?prd_id=$prd_id");
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
                    <div id="product">
                        <div id="product-head" class="row">
                            <div id="product-img" class="col-lg-6 col-md-6 col-sm-12">
                                <img src="../admin/public/img/products/<?php echo $productitem['prd_image']; ?>">
                            </div>
                            <div id="product-details" class="col-lg-6 col-md-6 col-sm-12">
                                <h1><?php echo $productitem['prd_name']; ?></h1>
                                <ul>
                                    <li><span>B???o h??nh:</span> <?php echo $productitem['prd_warranty']; ?></li>
                                    <li><span>??i k??m:</span> <?php echo $productitem['prd_accessories']; ?></li>
                                    <li><span>T??nh tr???ng:</span> <?php echo $productitem['prd_new']; ?></li>
                                    <li><span>Khuy???n M???i:</span> <?php echo $productitem['prd_promotion']; ?></li>
                                    <li id="price">Gi?? B??n (ch??a bao g???m VAT)</li>
                                    <li id="price-number"><?php echo $productitem['prd_price']; ?>??</li>
                                    <li id="status" class="<?php echo $productitem['prd_status'] == 1 ? "text-alert" : "text-danger" ?>"><?php echo $productitem['prd_status'] == 1 ? "C??n h??ng" : "H???t h??ng" ?></li>
                                </ul>
                                <div id="add-cart"><a href="../add_card.php?prd_id=<?php echo $productitem['prd_id']?>">Mua ngay</a></div>
                            </div>
                        </div>
                        <div id="product-body" class="row">
                            <div class="col-lg-12 col-md-12 col-sm-12">
                                <h3>????nh gi?? v??? iPhone X 64GB</h3>
                                <p>
                                    M??n h??nh OLED c?? h??? tr??? HDR l?? m???t s??? n??ng c???p m???i c???a Apple thay v?? m??n h??nh LCD v???i IPS ???????c t??m th???y tr??n iPhone 8 v?? iPhone 8 Plus ??em ?????n t??? l??? t????ng ph???n cao h??n ????ng k??? l?? 1.000.000: 1, so v???i 1.300: 1 ( iPhone 8 Plus ) v?? 1.400: 1 ( iPhone 8 ).
                                </p>
                                <p>
                                    M??n h??nh OLED m?? Apple ??ang g???i m??n h??nh Super Retina HD c?? th??? hi???n th??? t??ng m??u ??en s??u h??n. ??i???u n??y ???????c th???c hi???n b???ng c??ch t???t c??c ??i???m ???nh ???????c hi???n th??? m??u ??en c??n m??n h??nh LCD th??ng th?????ng, nh???ng ??i???m ???nh ???? ???????c gi??? l???i. Kh??ng nh???ng th???, m??n h??nh OLED c?? th??? ti???t ki???m pin ????ng k???.
                                </p>
                                <p>
                                    C??? ba m???u iPhone m???i ?????u c?? camera sau 12MP v?? 7MP cho camera tr?????c, nh??ng ch??? iPhone X v?? iPhone 8 Plus c?? th??m m???t c???m bi???n cho camera sau. Camera k??p tr??n m??y nh?? th?????ng l???: m???t g??c r???ng v?? m???t tele. V???y Apple ???? t??ch h???p nh???ng g?? v??o camera c???a iPhone X?
                                </p>
                                <p>
                                    Ch???ng rung quang h???c (OIS) l?? m???t trong nh???ng t??nh n??ng ???????c nhi???u h??ng ??i???n tho???i tr??n th??? gi???i ??p d???ng. ?????i v???i iPhone X, h??ng t??ch h???p ch???ng rung n??y cho c??? hai camera, kh??ng nh?? IPhone 8 Plus ch??? c?? OIS tr??n camera g??c r???ng n??n camera tele v???n rung v?? ch???t l?????ng b???c h??nh kh??ng ?????m b???o.
                                </p>
                                <p>
                                    Th??? hai, ???ng k??nh tele c???a iPhone 8 Plus c?? kh???u ????? f / 2.8, trong khi iPhone X c?? ???ng k??nh tele f / 2.2, t???o ra m???t ???????ng cong nh??? v?? c?? th??? ch???p thi???u s??ng t???t h??n v???i ???ng k??nh tele tr??n iPhone X.
                                </p>
                                <p>
                                    Portrait Mode l?? t??nh n??ng ch???p ???nh x??a ph??ng tr?????c ????y ch??? c?? v???i camera sau c???a iPhone 7 Plus, hi???n ???????c t??ch h???p tr??n c??? iPhone 8 Plus v?? iPhone X. Tuy nhi??n, nh??? s???c m???nh c???a c???m bi???n tr??n m???t tr?????c c???a iPhone X, Camera TrueDepth c??ng c?? th??? ch???p v???i Potrait mode.
                                </p>
                            </div>
                        </div>

                        <!--	Comment	-->
                        <div id="comment" class="row">
                            <div class="col-lg-12 col-md-12 col-sm-12">
                                <h3>B??nh lu???n s???n ph???m</h3>
                                <form method="post">
                                    <div class="form-group">
                                        <label>T??n:</label>
                                        <input name="comm_name" required type="text" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label>Email:</label>
                                        <input name="comm_mail" required type="email" class="form-control" id="pwd">
                                    </div>
                                    <div class="form-group">
                                        <label>N???i dung:</label>
                                        <textarea name="comm_details" required rows="8" class="form-control"></textarea>
                                    </div>
                                    <button type="submit" name="sbm" class="btn btn-primary">G???i</button>
                                </form>
                            </div>
                        </div>
                        <!--	End Comment	-->

                        <!--	Comments List	-->
                        <div id="comments-list" class="row">
                            <div class="col-lg-12 col-md-12 col-sm-12">
                                <?php
                                foreach($querycomment as $item){
                                // while ($item = mysqli_fetch_array($query)) {
                                    // while($item){
                                ?>
                                    <div class="comment-item">
                                        <ul>
                                            <li><b><?php echo $item['comm_name'] ?></b></li>
                                            <li><?php echo $item['comm_date'] ?></li>
                                            <li>
                                                <p><?php echo $item['comm_details'] ?></p>
                                            </li>
                                        </ul>
                                    </div>
                                <?php
                                }
                                ?>




                                <!-- <div class="comment-item">
                                    <ul>
                                        <li><b>Nguy???n V??n A</b></li>
                                        <li>2018-01-03 20:40:10</li>
                                        <li>
                                            <p>Ki???u d??ng ?????p, c???m ???ng r???t nh???y, c???m tr??n tay c???m gi??c kh??ng b??? c???n. Ch???p ???nh t????ng ?????i n??t, ch??i game r???t ph??. N???u gi?? m???m m???t ch??t th?? s??? b??n kh?? ch???y. M???t s???n ph???m t???t m?? m???i ng?????i c?? th??? c??n nh???c.</p>
                                        </li>
                                    </ul>
                                </div> -->

                            </div>
                        </div>
                        <!--	End Comments List	-->
                    </div>
                    <!--	End Product	-->
                    <div id="pagination">
                        <ul class="pagination">
                            <li class="page-item"><a class="page-link" href="#">Trang tr?????c</a></li>
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