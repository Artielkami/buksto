<body bgcolor="#FFFFCC">
<?php 
session_start();
error_reporting(E_ALL^E_NOTICE);
header('Content-Type: text/html; charset=UTF-8');
echo '<title>Sửa thông tin sách</title>';
require_once("includes/conn.php"); 
//if(Empty($_GET['act_sua']))$_GET['act_sua']='keke';
 if ($_GET['do']!="sua")$_SESSION['book_id'] = $_GET['act_sua'];
	$sql_query = mysql_query("SELECT * FROM book$_SESSION[addcapnhat] WHERE id='$_SESSION[book_id]' ");
	$book = mysql_fetch_array( $sql_query ); 
	//----Noi dung thong bao sau khi sua
	 if ($_GET['do']=="sua") {
		$id = addslashes( $_POST['id'] );
		$title = addslashes( $_POST['title'] );
		$author = addslashes( $_POST['author'] );
		$price = addslashes( $_POST['price'] );
		$sql="
		update `book$_SESSION[addcapnhat]` set
		`id`='$id',
		`title`= '$title',
		`author` = '$author',
		`price` ='$price' where `id`='$_SESSION[book_id]'";
		if (mysql_query($sql)){
			echo "<p align=center><font color=red size=5px>Sửa thành công</font></p>";
			echo "<p align=center><a href='capnhat_sach.php'><img src=Images/back.jpeg width=40px height=40 border=0 align=center/><br></a></p";}
		else
			echo "<p align=center><font color=red size=5px>Sửa không thành công</font></p>";
		
}
	else
       {
	    echo "<div align=center><b><font size=4>Đang sửa sách <font color=red></font></b>.</div></font></br>";
		echo"
		<form method='POST' action='?do=sua'>
			<table border='0' width='30%' id='table1' cellspacing='3' cellpadding='0' align='center'>
				<tr>
					<td>ID:</td>
					<td><input type='text' value='{$book['id']}' name='id' size='30'></td>
				</tr>
				<tr>
					<td>TITLE:</td>
					<td><input type='text' value='{$book['title']}' name='title' size='30'></td>
				</tr>
				<tr>
					<td>AUTHOR:</td>
					<td><input type='text' value='{$book['author']}' name='author' size='30'></td>
				</tr>
				<tr>
					<td>PRICE:</td>
					<td><input type='text' value='{$book['price']}' name='price' size='30'></td>
				</tr>
				
			</table>
			<p align='center'><input type='submit' value='Sửa'><input type='reset' value='Khôi phục' name='B2'></p><p align=center><a href='capnhat_sach.php'><img src=Images/back.jpeg width=40px height=40 border=0 align=center/><br></a></p>
		</form>
		";
		} 

?>
</body>