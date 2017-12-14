<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>Dang ky thanh vien</title>
<body  bgcolor="FFFFCC">
<?php
error_reporting(E_ALL^E_NOTICE);
// Tải file conn.php lên
require_once("includes/conn.php");
if ( $_GET['act'] == "do" )
{
	// Dùng hàm addslashes() để tránh SQL injection, dùng hàm md5() để mã hóa password
	$username = addslashes( $_POST['username'] );
	$password = md5( addslashes( $_POST['password'] ) );
	$verify_password = md5( addslashes( $_POST['verify_password'] ) );
	$email = addslashes( $_POST['email'] );
	$ten = addslashes( $_POST['name'] );
	$sinhnhat = addslashes( $_POST['sn'] );
	$url = addslashes( $_POST['url'] );
	// Kiểm tra 7 thông tin, nếu có bất kỳ thông tin chưa điền thì sẽ báo lỗi
	if ( ! $username || ! $_POST['password'] || ! $_POST['verify_password'] || ! $email || ! $ten || ! $sinhnhat || ! $ten)
	{
		print "<p align=center><font size=5px color=red>Xin vui lòng nhập đầy đủ các thông tin!</br> </font><a href='javascript:history.go(-1)'>Đăng ký lại</a></p>";
		exit;
	}
	// Kiểm tra username nay co nguoi dung chua
	if ( mysql_num_rows(mysql_query("SELECT username FROM members WHERE username='$username'"))>0)
	{
		print "<p align=center><font size=5px color=red>Username này đã có người dùng, Bạn vui lòng chọn username khác!</br></font> <a href='javascript:history.go(-1)'>Đăng ký lại</a></p>";
		exit;
	}
	
	// Kiểm tra email nay co nguoi dung chua
	if ( mysql_num_rows(mysql_query("SELECT email FROM members WHERE email='$email'"))>0)
	{
		print "<p align=center><font size=5px color=red>Email này đã có người dùng, Bạn vui lòng chọn Email khác! </br></font><a href='javascript:history.go(-1)'>Đăng ký lại</a></p>";
		exit;
	}
	// Kiểm tra mật khẩu, bắt buộc mật khẩu nhập lúc đầu và mật khẩu lúc sau phải trùng nhau
	if ( $password != $verify_password )
	{
		print "<p align=center><font size=5px color=red>Mật khẩu không giống nhau, bạn hãy nhập lại mật khẩu!</br></font><a href='javascript:history.go(-1)'>Đăng ký lại</a></p>";
		exit;
	}
	// Tiến hành tạo tài khoản
	$a=mysql_query("INSERT INTO members (username, password, email,diachi,Name,Birthday) VALUES ('{$username}', '{$password}', '{$email}', '{$url}', '{$ten}', '{$sinhnhat}')");
	// Thông báo hoàn tất việc tạo tài khoản
	if ($a)
		print "<p align=center><font size=5px>Tài khoản <font color=blue><b>{$username}</b></font> đã được tạo.</br> <a href='index.php'>Click vào đây để đăng nhập</a></font></p>";
}
else
{
// Form đăng ký
print <<<EOF
<p align="center"><b><font size="5">Đăng ký</font></b></p>
<form action="register.php?act=do" method="post">
<table align="center" border="0" width="400" cellspacing="1" bordercolor="#C0C0C0">
		<tr>
			<td>Tên truy nhập:</td>
			<td><input type="text" name="username" value=""></td>
		</tr>
		<tr>
			<td>Mật khẩu:</td>
			<td><input type="password" name="password" value=""></td>
		</tr>
		<tr>
			<td>Xác nhận mật khẩu:</td>
			<td><input type="password" name="verify_password" value=""></td>
		</tr>
		<tr>
			<td>Địa chỉ E-mail:</td>
			<td><input type="text" name="email" value=""></td>
		</tr>
		<tr>
			<td>Địa chỉ</td>
			<td><input type="text" name="url" value=""></td>
		</tr>
		<tr>
			<td>Tên thật:</td>
			<td><input type="text" name="name" value=""></td>
		</tr>
		<tr>
			<td>Sinh nhật  (Ngày/Tháng/Năm):</td>
			<td><input type="text" name="sn" value=""></td>
		</tr>
		<tr>
			<td colspan="2" align="center"><input type="submit" name="submit" value="Đăng ký tài khoản"><input type="reset" name="submit" value="Hủy bỏ"></td>
			
		</tr>
	</table>
</form>
<p align="center"><a href="index.php">Quay về trang chủ</a></p> 
EOF;
}
?> 
</body>