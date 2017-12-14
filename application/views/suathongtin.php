<body bgcolor="#FFFFCC">
<?php 
session_start();
error_reporting(E_ALL^E_NOTICE);
header('Content-Type: text/html; charset=UTF-8');
echo '<title>Sửa thông tin cá nhân</title>';
require_once("includes/conn.php"); 
if ( !$_SESSION['user_id'] )
{ 
	echo "Bạn chưa đăng nhập! <a href='login.php'>Nhấp vào đây để đăng nhập</a> hoặc <a href='register.php'>Nhấp vào đây để đăng ký</a>"; 
}
else
{ 
	$user_id = intval($_SESSION['user_id']);
	$sql_query = mysql_query("SELECT * FROM members WHERE id='{$user_id}'");
	$member = mysql_fetch_array( $sql_query ); 
	//----Noi dung thong bao sau khi sua
	$thanhcong='Sửa thành công';
	$kothanh='Sửa ko thành công';
	    if ($_GET['do']=="sua") {
		$ten = addslashes( $_POST['name'] );
		$pass = md5( addslashes( $_POST['pass'] ) );
		$sn = addslashes( $_POST['sn'] );
		$url = addslashes( $_POST['url'] );
		$email = addslashes( $_POST['email'] );
		$sql="
		UPDATE `members` SET
		`email` = '".$email."',
		`diachi` = '".$url."',
		`Name` = '".$ten."',
		`Birthday` = '".$sn."' WHERE `id` =$user_id LIMIT 1 ;";
		
		if (mysql_query($sql))
			echo "<p align=center><font color=red size=5px>$thanhcong</font></p>";
		else
			echo $kothanh;
			
		if ($_POST['pass']!="") {
			$sqlx="UPDATE `members` SET `password` = '".$pass."' WHERE `id` = '$user_id' LIMIT 1 ";
			//$suapass=;
			if (mysql_query($sqlx)) 
				echo "(Đã đổi pass) ";
			else
				echo "(Chưa đổi pass) ";
		}
	}
	else
	    echo "<div align=center><b><font size=4>Đang sửa tài khoản <font color=red>{$member['username']}</font></b>.</div></font></br>";
		echo"
		<form method='POST' action='?do=sua'>
			<table border='0' width='30%' id='table1' cellspacing='3' cellpadding='0' align='center'>
				<tr>
					<td>Tên:</td>
					<td><input type='text' value='{$member['Name']}' name='name' size='30'></td>
				</tr>
				<tr>
					<td>Địa chỉ:</td>
					<td><input type='text' value='{$member['diachi']}' name='url' size='30'></td>
				</tr>
				<tr>
					<td>Sinh Nhật:</td>
					<td><input type='text' name='sn' value='{$member['Birthday']}' size='30'></td>
				</tr>
				<tr>
					<td>Email:</td>
					<td><input type='text' name='email' value='{$member['email']}' size='30'></td>
				</tr>
				<tr>
					<td>Pass:</td>
					<td><input type='password' name='pass' size='30'></td>
				</tr>
			</table>
			<p align='center'><input type='submit' value='Sửa'><input type='reset' value='Khôi phục' name='B2'></p><p align=center><a href='index.php'><img src=Images/home.jpeg width=60px height=40 border=0 align=center/><br></a></p>
		</form>
		";
		
} 
?>
</body>