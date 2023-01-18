<!DOCTYPE html>
<html>
<head>
<?php 
		include_once("./layouts/headlogin.php");
	?>
</head>

<?php
	// session_start();
	// $err="Tài khoản hoặc mật khẩu không chính xác";
	
	if(isset($_POST["sbm"]))
	{
		$email= $_POST["email"];
		$pass= $_POST["pass"];
		$err=null;
		// echo $_POST["email"];
		// echo $_POST["pass"];
		$sql="SELECT * 
			FROM user
			Where user_mail='$email' and user_pass='$pass'";
		$query=mysqli_query($conn,$sql);
		$count=mysqli_num_rows($query);
		if($email == "" || $pass=="")
		{
			$err="Thông tin không được để trống";
		}
		elseif($count>0){

			$_SESSION["loginthanhcongz"]=$email;
			header("location:./admin.php");
		}
		else{
			$err="Tài khoản không hợp lệ";
		}
	}
?>


<body>
	<img src="public/img/products/" alt="">
	<div class="row">
		<div class="col-xs-10 col-xs-offset-1 col-sm-8 col-sm-offset-2 col-md-4 col-md-offset-4">
			<div class="login-panel panel panel-default">
				<div class="panel-heading">Vietpro Mobile Shop - Administrator</div>
				<div class="panel-body">
					<?php if(isset($err))
					{?>
						<div class="alert alert-danger"><?php echo $err ?></div>
					<?php 
					}?>
					<form role="form" method="post">
						<fieldset>
							<div class="form-group">
								<input class="form-control" placeholder="E-mail" name="email" type="email" autofocus>
							</div>
							<div class="form-group">
								<input class="form-control" placeholder="Mật khẩu" name="pass" type="password" value="">
							</div>
							<div class="checkbox">
								<label>
									<input name="remember" type="checkbox" value="Remember Me">Nhớ tài khoản
								</label>
							</div>
							<button type="submit" name="sbm" class="btn btn-primary">Đăng nhập</button>
						</fieldset>
					</form>
				</div>
			</div>
		</div><!-- /.col-->
	</div><!-- /.row -->	
</body>

</html>
