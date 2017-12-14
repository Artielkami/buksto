<body bgcolor="#FFFFCC">
<?php
session_start();
error_reporting (E_ALL ^ E_NOTICE);
header('Content-Type: text/html; charset=UTF-8');
echo '<title>Đăng nhập</title>';
require_once("includes/conn.php");
if ( $_GET['act'] == "do" )
{
	// Dùng hàm addslashes() để tránh SQL injection, dùng hàm md5() để mã hóa password
	$username = addslashes( $_POST['username'] );
	$password = md5( addslashes( $_POST['password'] ) );
	// Lấy thông tin của username đã nhập trong table members
	$query = mysql_query("SELECT id, username, password,Name,diachi FROM members WHERE username='{$username}'");
	$member = mysql_fetch_array( $query );
	// Nếu username này không tồn tại thì....
	if (mysql_num_rows( $query ) <= 0 )
	{
		print "<p align=center><font size=5px color=red>Tên truy nhập không tồn tại.</br></font> <a href='javascript:history.go(-1)'>Click vào đây để quay trở lại</a></p>";
		exit;
	}
	// Nếu username này tồn tại thì tiếp tục kiểm tra mật khẩu
	if ( $password != $member['password'] )
	{
		print "<p align=center><font size=5px color=red>Nhập sai mật khẩu.</br></font><a href='javascript:history.go(-1)'>Click vào đây để quay trở lại</a></p>";
		exit;
	}
	// Khởi động phiên làm việc (session)
	if (!isset( $_SESSION['user_id']))
    {$_SESSION['user_id']="doit";}
    $_SESSION['user_id'] = $member['id'];
	$_SESSION['tenkh']=$member['Name'];
	$_SESSION['dc']=$member['diachi'];
   // Thông báo đăng nhập thành công
	$temp="Bạn đăng nhập với tài khoản: '{$member['username']}' thành công!";
echo '<script type="text/javascript">
        function hello(temp){
             alert(temp);
			 window.location="index.php";
        }
        hello("'.$temp.'");
        </script>
        ';
}
?> 
</body>