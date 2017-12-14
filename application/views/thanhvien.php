<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<body bgcolor="#FFFFCC">
<table width="100%" border="3"  bgcolor="#FFCCFF"cellspacing="0" style="border-style:dotted" bordercolor="#3333CC">
<tr bgcolor="#FF99FF">
<td>ID</td>
<td>Username</td>
<td>Email</td>
<td>Địa chỉ</td>
<td>Tên thật</td>
<td>Sinh nhật</td>
<td>Xóa</td>
</tr>
<?php 
require_once("includes/conn.php"); 
if(Empty($_GET['act']))$_GET['act']='hehe';
if($_GET['act'])
{
$sql="delete from members where id='$_GET[act]'";
mysql_query($sql) or die(mysql_error());
}
$sql="select * from members";
$query=mysql_query($sql) or die (mysql_error());
$s=mysql_num_rows($query);
$numberRecordPerPage= 5;
$numberPage	= ceil($s / $numberRecordPerPage);
$curPage				= isset($_GET["page"])?$_GET["page"]:1;
$startRecord			= ($curPage-1)*$numberRecordPerPage;
$query =mysql_query( "select * from members LIMIT $startRecord,$numberRecordPerPage") or die("Query to get blah failed with error: ".mysql_error());
while($row=mysql_fetch_array($query))
{
?>
<tr>
<td><?php echo $row['id']?></td>
<td><?php echo $row['username']?></td>
<td><?php echo $row['email']?></td>
<td><?php echo $row['diachi']?></td>
<td><?php echo $row['Name']?></td>
<td><?php echo $row['Birthday']?></td>
<td><?php echo "<a href=thanhvien.php?act=$row[id]><b>Xóa</b></a>"?></td>
<tr>
</tr>
<?php
}
echo "<p align=center><b>Page:</b>";
	     for ($k=1; $k<=$numberPage; $k++):
		 print '<a href="thanhvien.php?page='.$k.'">'.$k.'</a>&nbsp;&nbsp;';
	     endfor;
?>
</table>
<p align="center"><a href=index.php><img src=Images/home.jpeg width=60px height=40 border=0 align=center/></a></p>
</body>