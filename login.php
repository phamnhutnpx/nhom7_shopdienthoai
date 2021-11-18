<?php
include 'inc/header.php';
?>

<?php
$login_check = Session::get('customer_login');
if ($login_check) {
	echo "<script>window.location ='index.php'</script>";
}
?>

<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit'])) {

	$insertCustomers = $cs->insert_customers($_POST);
}
?>
<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['login'])) {

	$login_Customers = $cs->login_customers($_POST);
}
?>
<div class="main">
	<div class="content">
		<div class="login_panel">
			<h3>Đăng nhập</h3>
			<?php
			if (isset($login_Customers)) {
				echo $login_Customers;
			}
			?>
			<form action="" method="post">
				<input type="email" name="email" class="field" placeholder="Email của bạn">
				<input type="password" name="password" class="field" placeholder="Mật khẩu">
				<p class="note"><a href="#">Quên mật khẩu</a></p>
				<div class="buttons">
					<div><input type="submit" name="login" class="grey" value="Đăng nhập"></div>
				</div>
			</form>
		</div>
		<?php

		?>
		<div class="register_account">
			<h3>Đăng kí Tài khoản</h3>
			<?php
			if (isset($insertCustomers)) {
				echo $insertCustomers;
			}
			?>
			<form action="" method="POST">
				<table>
					<tbody>
						<tr>
							<td>
								<div>
									<input type="text" name="name" placeholder="Họ tên">
								</div>
								<div>
									<input type="email" name="email" class="field" placeholder="Email">
								</div>
								<div>
									<input type="password" name="password" class="field" placeholder="Mật khẩu">
								</div>
							</td>
							<td>
								<div>
									<input type="text" name="address" placeholder="Địa chỉ">
								</div>
								<div>
									<input type="text" name="phone" placeholder="Điện thoại">
								</div>

							</td>
						</tr>
					</tbody>
				</table>
				<div class="search">
					<div><input type="submit" name="submit" class="grey" value="Tạo tài khoản"></div>
				</div>
				<div class="clear"></div>
			</form>
		</div>
		<div class="clear"></div>
	</div>
</div>
<?php
include 'inc/footer.php';

?>