<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<body bgcolor="#FFFFCC">
<?php
session_start();
include ("includes/conn.php");
$idb=$_GET['item'];
for($i=1;$i<=16;$i++)
{
$myStrSQL1 = "SELECT * FROM book$i WHERE id=$idb";
$query  = mysql_query($myStrSQL1) or die("Query to get blah failed with error: ".mysql_error());
if(mysql_num_rows($query) > 0)
     {
	while($row=mysql_fetch_array($query))
	     {
		echo "<div class=pro>";
		echo "<h3>$row[title]</h3>";echo "<img src='Images_book/$row[id].jpg' width=100px height=100 border=0>";
		echo "Tác giả: $row[author] - Giá bán: <font color=red><b>".number_format($row['price'],3)."</b></font> VNĐ<br>";
		echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Số trang:&nbsp;$row[sotrang] - Kích thước:&nbsp;$row[kichthuoc]<br>";
		echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Năm xuất bản:&nbsp;$row[namxb]";
		echo "<p align=right><font size=4><a href=addcart.php?item=$row[id]><img src=Images/btn_buy.gif width=50px height=20 border=0 align=left/></a></font></p>";
		$a = str_replace("\r\n","<br>", $row['tomtat']);
		echo "$a ";
		echo" <a href = timkiem.php><font size=5px>Trở về</font>";
		
	     }
     }
	 }
?>
</body>