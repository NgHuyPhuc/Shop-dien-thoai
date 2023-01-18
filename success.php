<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8" />
<title>Order Success</title>
<?php
include_once('./layouts/head.php');
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
                
                <!--	Order Success	-->
                <div id="order-success">
                	<div class="row">
                    	<div id="order-success-img" class="col-lg-3 col-md-3 col-sm-12"></div>
                        <div id="order-success-txt" class="col-lg-9 col-md-9 col-sm-12">
                        	<h3>bạn đã đặt hàng thành công !</h3>
                            <p>Vui lòng kiểm tra email để xem lại thông tin đơn hàng của mình.</p>
                        </div>
                    </div>    
                </div>
                <!--	End Order Success	-->
                
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
