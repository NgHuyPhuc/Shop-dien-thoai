<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8" />
    <title>Cart</title>
    <?php
    include_once('./layouts/head.php');
    ?>
</head>

<body>

    <!--	Header	-->
    <?php
    include_once('./layouts/header.php');
    ?>
    <!--	End Header	-->

    <?php
    if (isset($_SESSION['cart'])) {

        

        $arr_id = array();
        foreach ($_SESSION['cart'] as $prd_id => $qty) {
            $arr_id[] = $prd_id;
        }
        $str_id = implode(",", $arr_id);
        $sql = "SELECT * FROM product WHERE prd_id IN($str_id)";
        $query = mysqli_query($conn, $sql);
    }
    ?>
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
            <?php
                        if (isset($_SESSION['cart'])) {

                            ?>
                <div id="main" class="col-lg-8 col-md-12 col-sm-12">
                    <!--	Slider	-->
                    <?php
                    include_once('./layouts/slider.php');

                    ?>
                    <!--	End Slider	-->

                    

                            

                    <!--	Cart	-->
                    <div id="my-cart">
                        <div class="row">
                            <div class="cart-nav-item col-lg-7 col-md-7 col-sm-12">Thông tin sản phẩm</div>
                            <div class="cart-nav-item col-lg-2 col-md-2 col-sm-12">Tùy chọn</div>
                            <div class="cart-nav-item col-lg-3 col-md-3 col-sm-12">Giá</div>
                        </div>
                        <form method="post">
                            <?php
                            $total = 0;
                            foreach ($query as $item) {
                                $total = $total + $item['prd_price']*$_SESSION['cart'][$item['prd_id']];
                            ?>
                                <div class="cart-item row">
                                    <div class="cart-thumb col-lg-7 col-md-7 col-sm-12">
                                        <img src="../admin/public/img/products/<?php echo $item['prd_image']?>">
                                        <h4><?php echo $item['prd_name']?></h4>
                                    </div>

                                    <div class="cart-quantity col-lg-2 col-md-2 col-sm-12">
                                        <input name="qty[<?php echo $item['prd_id']?>]" type="number" id="quantity" class="form-control form-blue quantity" value="<?php echo $_SESSION['cart'][$item['prd_id']]?>" min="1">
                                    </div>
                                    <div class="cart-price col-lg-3 col-md-3 col-sm-12"><b><?php echo $item['prd_price']*$_SESSION['cart'][$item['prd_id']]?>đ</b><a href="../del_cart.php?prd_id=<?php echo $item['prd_id']?>">Xóa</a></div>
                                </div>
                            <?php
                            }
                            ?>
                            <!-- <div class="cart-item row">
                                <div class="cart-thumb col-lg-7 col-md-7 col-sm-12">
                                    <img src="images/product-2.png">
                                    <h4>iPhone Xs Max 2 Sim - 256GB Gold</h4>
                                </div>
                                <div class="cart-quantity col-lg-2 col-md-2 col-sm-12">
                                    <input type="number" id="quantity" class="form-control form-blue quantity" value="1" min="1">
                                </div>
                                <div class="cart-price col-lg-3 col-md-3 col-sm-12"><b>32.990.000đ</b><a href="#">Xóa</a></div>
                            </div>
                            <div class="cart-item row">
                                <div class="cart-thumb col-lg-7 col-md-7 col-sm-12">
                                    <img src="images/product-3.png">
                                    <h4>iPhone Xs Max 2 Sim - 256GB Gold</h4>
                                </div>
                                <div class="cart-quantity col-lg-2 col-md-2 col-sm-12">
                                    <input type="number" id="quantity" class="form-control form-blue quantity" value="1" min="1">
                                </div>
                                <div class="cart-price col-lg-3 col-md-3 col-sm-12"><b>32.990.000đ</b><a href="#">Xóa</a></div>
                            </div>
                            <div class="cart-item row">
                                <div class="cart-thumb col-lg-7 col-md-7 col-sm-12">
                                    <img src="images/product-4.png">
                                    <h4>iPhone Xs Max 2 Sim - 256GB Gold</h4>
                                </div>
                                <div class="cart-quantity col-lg-2 col-md-2 col-sm-12">
                                    <input type="number" id="quantity" class="form-control form-blue quantity" value="1" min="1">
                                </div>
                                <div class="cart-price col-lg-3 col-md-3 col-sm-12"><b>32.990.000đ</b><a href="#">Xóa</a></div>
                            </div>
                            <div class="cart-item row">
                                <div class="cart-thumb col-lg-7 col-md-7 col-sm-12">
                                    <img src="images/product-5.png">
                                    <h4>iPhone Xs Max 2 Sim - 256GB Gold</h4>
                                </div>
                                <div class="cart-quantity col-lg-2 col-md-2 col-sm-12">
                                    <input type="number" id="quantity" class="form-control form-blue quantity" value="1" min="1">
                                </div>

                                <div class="cart-price col-lg-3 col-md-3 col-sm-12"><b>32.990.000đ</b><a href="#">Xóa</a></div>
                            </div> -->

                            <div class="row">
                                <div class="cart-thumb col-lg-7 col-md-7 col-sm-12">
                                    <button id="update-cart" class="btn btn-success" type="submit" name="sbm">Cập nhật giỏ hàng</button>
                                </div>
                                <div class="cart-total col-lg-2 col-md-2 col-sm-12"><b>Tổng cộng:</b></div>
                                <div class="cart-price col-lg-3 col-md-3 col-sm-12"><b><?php echo $total?>đ</b></div>
                            </div>
                        </form>

                    </div>
                    <!--	End Cart	-->

                    <!--	Customer Info	-->
                    <div id="customer">
                        <form method="post">
                            <div class="row">

                                <div id="customer-name" class="col-lg-4 col-md-4 col-sm-12">
                                    <input placeholder="Họ và tên (bắt buộc)" type="text" name="name" class="form-control" required>
                                </div>
                                <div id="customer-phone" class="col-lg-4 col-md-4 col-sm-12">
                                    <input placeholder="Số điện thoại (bắt buộc)" type="text" name="phone" class="form-control" required>
                                </div>
                                <div id="customer-mail" class="col-lg-4 col-md-4 col-sm-12">
                                    <input placeholder="Email (bắt buộc)" type="text" name="mail" class="form-control" required>
                                </div>
                                <div id="customer-add" class="col-lg-12 col-md-12 col-sm-12">
                                    <input placeholder="Địa chỉ nhà riêng hoặc cơ quan (bắt buộc)" type="text" name="add" class="form-control" required>
                                </div>

                            </div>
                        </form>
                        <div class="row">
                            <div class="by-now col-lg-6 col-md-6 col-sm-12">
                                <a href="#">
                                    <b>Mua ngay</b>
                                    <span>Giao hàng tận nơi siêu tốc</span>
                                </a>
                            </div>
                            <div class="by-now col-lg-6 col-md-6 col-sm-12">
                                <a href="#">
                                    <b>Trả góp Online</b>
                                    <span>Vui lòng call (+84) 0988 550 553</span>
                                </a>
                            </div>
                        </div>
                    </div>
                    <!--	End Customer Info	-->

                </div>
                

                <?php
                include_once('./layouts/sidebar.php');

                ?>
                <?php
                        }
                        else{
                            ?>
                            <p>Không có sản phẩm trong giỏ hàng</p>
                            <?php

                        }
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