<!DOCTYPE html>
<html>

<head>
	<?php
	include_once("./layouts/head.php")
	?>
</head>
<?php
if (isset($_GET['user_id'])) {
	$id = $_GET['user_id'];
    $sql = "SELECT * 
            FROM user
            WHERE user_id= $id";

    $valueget = mysqli_query($conn, $sql);
	
	if (isset($_POST['sbm'])) {
		//Basic
		$user_full = $_POST['user_full'];
		$user_mail = $_POST['user_mail'];
		$user_pass = $_POST['user_pass'];
		$user_re_pass = $_POST['user_re_pass'];
		$user_level = $_POST['user_level'];
		$errortk = '';
		$errormk = '';
		$checktk = true;
		$checkmk = true;
		foreach ($queryuser as $item) {
			if ($item['user_full'] == $user_mail) {
				$checktk = false;
			}
		}
		if ($user_pass != $user_re_pass) {
			$checkmk = false;
		}


		if ($checktk == false) {
			$errortk = 'Email đã tồn tại !';
		} elseif ($checkmk == false) {
			$errormk = 'Mật khẩu không chính xác';
		} else {
			$sqlupdate = "UPDATE user
                SET user_full = '$user_full',
					user_mail = $user_mail,
					user_pass = '$user_pass',
					user_level = $user_level
                    WHERE user_id= $id";

			mysqli_query($conn, $sqlupdate);
			header("location:./user.php");
		}
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
				<li><a href="">Quản lý thành viên</a></li>
				<li class="active">Nguyễn Văn A</li>
			</ol>
		</div>
		<!--/.row-->

		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">Thành viên: Nguyễn Văn A</h1>
			</div>
		</div>
		<!--/.row-->
		<div class="row">
			<div class="col-lg-12">
				<div class="panel panel-default">
					<div class="panel-body">
						<div class="col-md-8">
						<?php
							if(isset($_POST['sbm']))
							{

							
							if ($checktk == false || $checkmk == false) {
							?>
								<div class="alert alert-danger"><?php
								if (isset($_POST['sbm'])) {
									if ($errormk != '') {
										echo $errormk;
									} elseif ($errortk != '') {
										echo $errortk;
									}
								}

								?></div>

							<?php

							}
							}
							?>
							<form role="form" method="post">
								<div class="form-group">
									<label>Họ & Tên</label>
									<input type="text" name="user_full" required class="form-control" value="Nguyễn Văn A" placeholder="">
								</div>
								<div class="form-group">
									<label>Email</label>
									<input type="text" name="user_mail" required value="nguyenvana@gmail.com" class="form-control">
								</div>
								<div class="form-group">
									<label>Mật khẩu</label>
									<input type="password" name="user_pass" required class="form-control">
								</div>
								<div class="form-group">
									<label>Nhập lại mật khẩu</label>
									<input type="password" name="user_re_pass" required class="form-control">
								</div>
								<div class="form-group">
									<label>Quyền</label>
									<select name="user_level" class="form-control">
										<option value=1>Admin</option>
										<option value=2 selected>Member</option>
									</select>
								</div>
								<button type="submit" name="sbm" class="btn btn-primary">Cập nhật</button>
								<button type="reset" class="btn btn-default">Làm mới</button>
						</div>
						</form>
					</div>
				</div>
			</div><!-- /.col-->
		</div><!-- /.row -->

	</div>
	<!--/.main-->
</body>

</html>