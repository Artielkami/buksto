<body bgcolor="#FFFFCC">
<table width="100%" border="3"  bgcolor="#FFCCFF"cellspacing="0" style="border-style:dotted" bordercolor="#3333CC">
<tr bgcolor="#FF99FF">
<td>ID</td>
<td>Tên khách hàng</td>
<td>Mã sản phẩm</td>
<td>Tổng tiền</td>
<td>Địa chỉ</td>
<td>Thời gian mua</td>
<td>Xóa</td>
</tr>
<?php 
header('Content-Type: text/html; charset=UTF-8');
require_once("includes/conn.php"); 
if(Empty($_GET['act']))$_GET['act']='hehe';
if($_GET['act'])
{
$sql1="delete from hoadon where hoadon_id='$_GET[act]'";
mysql_query($sql1) or die(mysql_error());
}
$sql="select * from hoadon";
$query=mysql_query($sql) or die (mysql_error());
$s=mysql_num_rows($query);
$numberRecordPerPage= 5;
$numberPage	= ceil($s / $numberRecordPerPage);
$curPage				= isset($_GET["page"])?$_GET["page"]:1;
$startRecord			= ($curPage-1)*$numberRecordPerPage;
$query =mysql_query( "select * from hoadon LIMIT $startRecord,$numberRecordPerPage") or die("Query to get blah failed with error: ".mysql_error());
while($row=mysql_fetch_array($query))
{
?>
<tr>
<td><?php echo $row['hoadon_id']?></td>
<td><?php echo $row['hoadon_khachhang']?></td>
<td><?php echo $row['hoadon_sanpham']?></td>
<td><?php echo number_format($row['hoadon_tongtien'],3)."VNĐ"?></td>
<td><?php echo $row['diachi']?></td>
<td><?php echo $row['ngaymua']?></td>
<td><?php echo "<a href=hoadon.php?act=$row[hoadon_id]><b>Xóa</b></a>"?></td>
</tr>
<?php
}

echo "<p align=center><b>Page:</b>";
	     for ($k=1; $k<=$numberPage; $k++):
		 print '<a href="hoadon.php?page='.$k.'">'.$k.'</a>&nbsp;&nbsp;';
	     endfor;
?>
</table>
<p align="center"><b>Tổng doanh thu quý 2</b></p>


<table width="50%" border="0"  bgcolor="#FFCCFF"cellspacing="0" style="border-style:dotted" bordercolor="#3333CC">
<tr bgcolor="#FF99FF">
<td>Tháng</td>
<td>Số tiền</td>
<td>Tổng tiền quý 2</td>
</tr>
<?php 
$tongtien=0;
$tongtien2=0;
$tongtien3=0;
$tongtien4=0;
$tongtien5=0;
$sql2="select * from hoadon where ngaymua between '2010-04-01' and '2010-04-31'"; 
$sql3="select * from hoadon where ngaymua between '2010-05-01' and '2010-05-28'";
$sql4="select * from hoadon where ngaymua between '2010-06-01' and '2010-06-31'";

$query2=mysql_query($sql2) or die (mysql_error());
$query3=mysql_query($sql3) or die (mysql_error());
$query4=mysql_query($sql4) or die (mysql_error());

while($result2=mysql_fetch_array($query2))
{
$tongtien2+=$result2['hoadon_tongtien'];
}
while($result3=mysql_fetch_array($query3))
{
$tongtien3+=$result3['hoadon_tongtien'];
}
while($result4=mysql_fetch_array($query4))
{
$tongtien4+=$result4['hoadon_tongtien'];
}

$tongtien=$tongtien2+$tongtien3+$tongtien4;
?>
<tr><td>4</td><td><?php echo number_format($tongtien2,3)." VND" ?><td><td></td></tr>
<tr><td>5</td><td><?php echo number_format($tongtien3,3)." VND"?></td><td><?php echo number_format($tongtien,3)?></td></tr>
<tr><td>6</td><td><?php echo number_format($tongtien4,3)." VND" ?></td></tr>

</tr>
</table>
<p align="center"><a href=index.php><img src=Images/home.jpeg width=60px height=40 border=0 align=center/></a></p>

