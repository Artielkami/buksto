<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<body  bgcolor="FFFFCC">
<?php 
	include ("includes/conn.php");
	// Dùng hàm addslashes() d? tránh SQL injection, dùng hàm md5() d? mã hóa password
	$username = addslashes( $_POST['usrname'] );
	$password = md5( addslashes( $_POST['passwd'] ) );
	$verify_password = md5( addslashes( $_POST['repasswd'] ) );
	$email = addslashes( $_POST['email'] );
	$ten = addslashes( $_POST['fname'] );
	$sinhnhat = addslashes( $_POST['sn'] );
	$url = addslashes( $_POST['dc'] );
	// Ki?m tra 7 thông tin, n?u có b?t k? thông tin chua di?n thì s? báo l?i
	if ( ! $username || ! $_POST['passwd'] || ! $_POST['repasswd'] || ! $email || ! $ten || ! $sinhnhat || ! $url)
	{
		print "<p align=center><font size=5px color=red>Xin vui lòng nhập đủ các thông tin!</br> </font><a href='register1.php'>Ðăng ký lại</a></p>";
		exit;  
	}
	// Ki?m tra username nay co nguoi dung chua
	if ( mysql_num_rows(mysql_query("SELECT username FROM members WHERE username='$username'"))>0)
	{
		print "<p align=center><font size=5px color=red>Username này đã có người dùng, Bạn vui lòng chọn username khác!</br></font> <a href='register1.php''>Ðang ký lại</a></p>";
		exit;
	}
	
	// Ki?m tra email nay co nguoi dung chua
	if ( mysql_num_rows(mysql_query("SELECT email FROM members WHERE email='$email'"))>0)
	{
		print "<p align=center><font size=5px color=red>Email này dã có người dùng, Bạn vui lòng chọn Email khác! </br></font><a href='register1.php''>Ðăng ký lại</a></p>";
		exit;
	}
	// Ki?m tra m?t kh?u, b?t bu?c m?t kh?u nh?p lúc d?u và m?t kh?u lúc sau ph?i trùng nhau
	if ( $password != $verify_password )
	{
		print "<p align=center><font size=5px color=red>Mật khẩu không giốnng nhau, bạn hãy nhập lại mật khẩu!</br></font><a href='register1.php''>Ðăng ký lại</a></p>";
		exit;
	}
	// Tiến hành tạo tài khoản
	$a=mysql_query("INSERT INTO members (username, password, email,diachi,Name,Birthday) VALUES ('{$username}', '{$password}', '{$email}', '{$url}', '{$ten}', '{$sinhnhat}')");
	// Thông báo hoàn t?t vi?c t?o tài kho?n
	if ($a)
		print "<p align=center><font size=5px>Tài khoản <font color=blue><b>{$username}</b></font> đã được tạo.</br> <a href='index.php'>Click vào đây để đăng nhập</a></font></p>";
		
?>
</body>