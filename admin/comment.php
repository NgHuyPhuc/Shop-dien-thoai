<!DOCTYPE html>
<html>

<head>
    <?php
    include_once("./layouts/head.php")
    ?>
</head>
<?php
$row_per_page = isset($_GET['row_per_page']) ? $_GET['row_per_page'] : 4;
$page = isset($_GET["page"]) ? $_GET['page'] : 1;
// $row_per_page=3;
$per_row = $page * $row_per_page - $row_per_page;
$sql = "SELECT * 
    FROM `comment`,`product`
    WHERE `comment`.`prd_id`=`product`.`prd_id`
            LIMIT $per_row,$row_per_page";
$query = mysqli_query($conn, $sql);
$sql2 = "SELECT * FROM comment";
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
    ) {
        $list_page[] = $i;
    } elseif (
        $i == $left - 1 ||
        $i == $right + 1

    ) {
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
                <li class="active">Danh sách comment</li>
            </ol>
        </div>
        <!--/.row-->

        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Danh sách comment</h1>
            </div>
        </div>
        <!--/.row-->
        <div id="toolbar" class="btn-group">
            <a href="../add_user.php" class="btn btn-success">
                <i class="glyphicon glyphicon-plus"></i> Thêm comment
            </a>
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
                                    <th data-field="name" data-sortable="true">Người cmt</th>
                                    <th data-field="name" data-sortable="true">Email</th>
                                    <th data-field="name" data-sortable="true">Ngày</th>
                                    <th data-field="price" data-sortable="true">Details</th>
                                    <!-- <th>Quyền</th>
                                    <th>Hành động</th> -->
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                foreach ($query as $item) {
                                ?>
                                    <tr>
                                        <td style=""><?php echo $item['comm_id']?></td>
                                        <td style=""><?php echo $item['prd_name']?>  </td>
                                        <td style=""><?php echo $item['comm_name']?></td>
                                        <td style=""><?php echo $item['comm_mail']?></td>
                                        <td style=""><?php echo $item['comm_date']?></td>
                                        <td style=""><?php echo $item['comm_details']?></td>
                                        <td class="form-group">
                                            <a href="../edit_comment.php?user_id=<?php echo $item['comm_id']?>" class="btn btn-primary"><i class="glyphicon glyphicon-pencil"></i></a>
                                            <a href="../del_comment.php?user_id=<?php echo $item['comm_id']?>" class="btn btn-danger"><i class="glyphicon glyphicon-remove"></i></a>
                                        </td>
                                    </tr>
                                <?php
                                }
                                ?>




                            </tbody>
                        </table>
                    </div>
                    <!-- <div class="panel-footer">
                        <nav aria-label="Page navigation example">
                            <ul class="pagination">
                                <li class="page-item"><a class="page-link" href="#">&laquo;</a></li>
                                <li class="page-item"><a class="page-link" href="#">1</a></li>
                                <li class="page-item"><a class="page-link" href="#">2</a></li>
                                <li class="page-item"><a class="page-link" href="#">3</a></li>
                                <li class="page-item"><a class="page-link" href="#">&raquo;</a></li>
                            </ul>
                        </nav>
                    </div> -->
                    <div class="panel-footer">
                        <nav aria-label="Page navigation example">
                            <ul class="pagination">
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
                                        <li class="page-item <?php echo $list_page[$i] == $page ? 'active' : '' ?> "><a class="page-link" href="../comment.php?page=<?php echo $list_page[$i]?>"><?php echo $list_page[$i]?></a></li>
                                <?php
                                    }
                                ?>
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

    <script src="js/jquery-1.11.1.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/bootstrap-table.js"></script>
</body>

</html>