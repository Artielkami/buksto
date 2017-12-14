<body bgcolor="#FED120">
<?php 
session_start();
error_reporting (E_ALL ^ E_NOTICE);
header('Content-Type: text/html; charset=UTF-8');
echo '<title>Homepage</title>';
require_once("includes/conn.php"); 
if ( !$_SESSION['user_id'] )
{ 
	echo "Bạn chưa đăng nhập! <a href='register1.php'>  Click vào đây để đăng ký</a>"; 
	print <<<EOF
<form action="login.php?act=do" method="post">
  <p align="right">Tên truy nhập:
    <input type="text" name="username" value="">
  </p>
  <p align="right">Mật khẩu:
    <input type="password" name="password" value="">
  </p>
  <p align="right">
    <input type="submit" name="submit" value="Đăng nhập">
  </p>
</form>
EOF;
}
else
{
	$user_id = intval($_SESSION['user_id']);
	$sql_query = @mysql_query("SELECT * FROM members WHERE id='{$user_id}'");
	$member = @mysql_fetch_array( $sql_query ); 
	echo "Bạn đang đăng nhập với tài khoản: <b>{$member['username']}</b>"; 
	echo "<br><a href='suathongtin.php'>Sửa thông tin</a>";
	if ($member['admin']=="1")  {
	echo "<br><a href='thanhvien.php'>Thành viên</a>";
	echo "<br><a href='hoadon.php'>Hóa đơn</a>";
	echo "<br><a href='capnhat_sach.php'>Cập nhật sách</a>";
	}
	echo "<br><a href='thoat.php'>Thoát ra</a>";
} 
?>
</body>