<!DOCTYPE html>
<html>

<head>
    <?php
    include_once("./layouts/head.php")
    ?>
</head>
<?php
$row_per_page = isset($_GET['row_per_page']) ? $_GET['row_per_page'] : 3;
$page = isset($_GET["page"]) ? $_GET['page'] : 1;
// $row_per_page=3;
$per_row = $page * $row_per_page - $row_per_page;
$sql = "SELECT * FROM product,category
            WHERE product.cat_id=category.cat_id
            ORDER BY product.prd_id DESC
            LIMIT $per_row,$row_per_page";
$query = mysqli_query($conn, $sql);
$sql2 = "SELECT * FROM product,category
            WHERE product.cat_id=category.cat_id";
$query2 = mysqli_query($conn, $sql2);

$total_page = ceil(mysqli_num_rows($query2) / $row_per_page);


$list_page = array();
$delta = 2;
$left = $page - $delta;
$right = $page + $delta;

for ($i = 1; $i <= $total_page; $i++) {
    if (
        $i == 1 || $i == $total_page || $i == $page ||
        ($i >= $left) && ($i <= $right)
    ) 
    {
        $list_page[] = $i;
    } 
    elseif (
        $i == $left - 1 ||
        $i == $right + 1
    ) 
    {
        $list_page[] = "...";
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
                <li><a href="#"><svg class="glyph stroked home">
                            <use xlink:href="#stroked-home"></use>
                        </svg></a></li>
                <li class="active">Danh sách sản phẩm <?php echo $total_page ?></li>
            </ol>
        </div>
        <!--/.row-->

        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Danh sách sản phẩm </h1>
            </div>
        </div>
        <!--/.row-->
        <div id="toolbar" class="btn-group">
            <a href="../add_product.php" class="btn btn-success">
                <i class="glyphicon glyphicon-plus"></i> Thêm sản phẩm
            </a>
            <?php print_r($list_page); ?>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-body">
                        <table data-toolbar="#toolbar" data-toggle="table">

                            <thead>
                                <tr>
                                    <th data-field="id" data-sortable="true">ID</th>
                                    <th data-field="name" data-sortable="true">Tên sản phẩm</th>
                                    <th data-field="price" data-sortable="true">Giá</th>
                                    <th>Ảnh sản phẩm</th>
                                    <th>Trạng thái</th>
                                    <th>Danh mục</th>
                                    <th>Hành động</th>
                                </tr>
                            </thead>
                            <tbody>
                                <!-- <img src="public/img/products/" alt=""> -->
                                <?php
                                // while ($row = mysqli_fetch_array($query)) {
                                    foreach($query as $row){
                                ?>
                                    <tr>
                                        <td style=""><?php echo $row['prd_id'] ?></td>
                                        <td style=""><?php echo $row['prd_name'] ?></td>
                                        <td style=""><?php echo $row['prd_price'] ?> vnd</td>
                                        <td style="text-align: center"><img width="130" height="180" src="img/products/<?php echo $row['prd_image'] ?>" /></td>

                                        <td><span class="label label-<?php echo $row['prd_status'] == 1 ? "success" : "danger" ?>"><?php echo $row['prd_status'] == 1 ? "Còn hàng" : "Hết hàng" ?></span></td>
                                        <!-- <td><span class="label label-danger">Hết hàng</span></td> -->

                                        <td><?php echo $row['cat_name'] ?></td>
                                        <td class="form-group">
                                            <a href="../edit_product.php?prd_id=<?php echo $row['prd_id']?>" class="btn btn-primary"><i class="glyphicon glyphicon-pencil"></i></a>
                                            <a href="../del_product.php?prd_id=<?php echo $row['prd_id']?>" class="btn btn-danger"><i class="glyphicon glyphicon-remove"></i></a>
                                        </td>
                                    </tr>
                                <?php
                                }
                                ?>
                                <!-- <tr>
                                    <td style="">1</td>
                                    <td style="">Sản phẩm số 2</td>
                                    <td style="">18.500.000 vnd</td>
                                    <td style="text-align: center"><img width="130" height="180" src="img/download.jpeg" /></td>
                                    <td><span class="label label-danger">Hết hàng</span></td>
                                    <td>Danh mục số 1</td>
                                    <td class="form-group">
                                        <a href="product-edit.html" class="btn btn-primary"><i class="glyphicon glyphicon-pencil"></i></a>
                                        <a href="product-edit.html" class="btn btn-danger"><i class="glyphicon glyphicon-remove"></i></a>
                                    </td>
                                </tr> -->
                            </tbody>
                        </table>
                    </div>
                    <div class="panel-footer">
                        <nav aria-label="Page navigation example">
                            <ul class="pagination">
                                <!-- <li class="page-item"><a class="page-link" href="#">&laquo;</a></li>
                                <li class="page-item"><a class="page-link" href="#">1</a></li>
                                <li class="page-item"><a class="page-link" href="#">2</a></li>
                                <li class="page-item"><a class="page-link" href="#">3</a></li>
                                <li class="page-item"><a class="page-link" href="#">&raquo;</a></li> -->

                                <?php
                                for ($i = 0; $i < count($list_page); $i++) {
                                    if($list_page[$i]=='...')
                                    {
                                ?>
                                        <li class="page-item"><span class="page-link"><?php echo $list_page[$i]?></span></li>

                                    <?php
                                    }
                                    else{
                                    ?>
                                        <li class="page-item <?php echo $list_page[$i] == $page ? 'active' : '' ?> "><a class="page-link" href="../product.php?page=<?php echo $list_page[$i]?>"><?php echo $list_page[$i]?></a></li>
                                <?php
                                    }
                                ?>


                                <?php
                                }
                                ?>


                                <br/>
                                <br/>
                                <?php
                                for ($i = 0; $i < count($list_page); $i++) {
                                ?>
                                    <li class="page-item <?php echo $list_page[$i] == $page ? 'active' : '' ?>"><a class="page-link" href="../product.php?page=<?php
                                        if ($list_page[$i] == '...' && $list_page[$i + 1] == $left) {
                                            echo $left - 1;
                                        } elseif ($list_page[$i] == '...' && $list_page[$i - 1] == $right) {
                                            echo $right + 1;
                                        } else {
                                            echo $list_page[$i];
                                        }
                                        ?>">
                                        <?php echo $list_page[$i] ?></a></li>
                                <?php
                                }
                                ?>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
        <!--/.row-->
    </div>
    <!--/.main-->

    <?php
    include_once("./layouts/footer.php")
    ?>
    <script src="js/jquery-1.11.1.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/bootstrap-table.js"></script>
</body>

</html>