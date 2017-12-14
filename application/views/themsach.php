<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<body bgcolor="#FFFFCC">
<?php 
session_start();
error_reporting(E_ALL^E_NOTICE);
echo '<title>Thêm sách</title>';
require_once("includes/conn.php"); 
if ($_GET['do']=="them")
	 
	{   $id=addslashes( $_POST['id'] );
		$title = addslashes( $_POST['title'] );
		$author = addslashes( $_POST['author'] );
		$price = addslashes( $_POST['price'] );
		$sql="
		INSERT INTO `book$_SESSION[addcapnhat]` (`id`,`title`,
		`author`,
		`price`) VALUES ('$id','$title','$author','$price')";
		if (mysql_query($sql)){
			echo "<p align=center><font color=red size=5px>Thêm thành công</font></p>";
			echo "<p align=center><a href='capnhat_sach.php'><img src=Images/back.jpeg width=40px height=40 border=0 align=center/><br></a></p";}
		else
			echo "<p align=center><font color=red size=5px>Không thành công</font></p>";
		
}
	else
       {
	    echo "<div align=center><b><font size=4>Thêm sách <font color=red></font></b>.</div></font></br>";
		echo"
		<form method='POST' action='?do=them'>
			<table border='0' width='30%' id='table1' cellspacing='3' cellpadding='0' align='center'>
				<tr>
					<td>ID:</td>
					<td><input type='text' value='' name='id' size='30'></td>
				</tr>
				<tr>
					<td>TITLE:</td>
					<td><input type='text' value='' name='title' size='30'></td>
				</tr>
				<tr>
					<td>AUTHOR:</td>
					<td><input type='text' value='' name='author' size='30'></td>
				</tr>
				<tr>
					<td>PRICE:</td>
					<td><input type='text' value='' name='price' size='30'></td>
				</tr>
				
			</table>
			<p align='center'><input type='submit' value='Thêm'><input type='reset' value='Khôi phục' name='B2'></p><p align=center><a href='capnhat_sach.php'><img src=Images/back.jpeg width=40px height=40 border=0 align=center/><br></a></p>
		</form>
		";
		} 

?>
</body>