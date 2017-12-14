<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<table width="100%" border="1">
  <tr>
    <td width="25%" valign="top"><?php
	session_start();
	include ("includes/conn.php");
    $sql = "SELECT * FROM Danhmuc ORDER BY Madm";
	$query = mysql_query($sql);
print '<Table Border="0" Cellspacing="0" Cellpadding="5" width="100%">';
		while (list($maDM, $tenDM) = mysql_fetch_row($query) ) {
			print '<Tr>';
				    print '<Td>';
					print '<font size="4px"><A Href="addcapnhat.php?id='.$maDM.'">'.$tenDM.'</A></font>';
					print '</Td>';
			print '</Tr>';
		}
print '</Table>';
?>&nbsp;
  </td>
  <td valign="top"><body bgcolor="#FFFFCC">

<table width="100%"  border="3" bgcolor="#FFCCFF"cellspacing="0" style="border-style:dotted" bordercolor="#3333CC">
<tr bgcolor="#FF99FF" >
<td>ID</td>
<td>Tên sách</td>
<td>Tác giả</td>
<td>Giá sách</td>
<td>Sửa</td>
<td>Xóa</td>
</tr>
<?php 
require_once("includes/conn.php");
if(Empty($_SESSION['addcapnhat']))$_SESSION['addcapnhat']=1;
if(Empty($_GET['act']))$_GET['act']='hehe';
if($_GET['act'])
{
$sql="delete from book$_SESSION[addcapnhat] where id='$_GET[act]'";
mysql_query($sql) or die(mysql_error());
}

echo "<a href=themsach.php><b><img src=Images/add.jpeg width=40px height=40 border=0 align=center/></b></a>";
$sql="select * from book$_SESSION[addcapnhat]";
$query=mysql_query($sql) or die (mysql_error());
$s=mysql_num_rows($query);
$numberRecordPerPage= 5;
$numberPage	= ceil($s / $numberRecordPerPage);
$curPage				= isset($_GET["page"])?$_GET["page"]:1;
$startRecord			= ($curPage-1)*$numberRecordPerPage;
$query =mysql_query( "select * from book$_SESSION[addcapnhat] LIMIT $startRecord,$numberRecordPerPage") or die("Query to get blah failed with error: ".mysql_error());
while($row=mysql_fetch_array($query))
{
?>
<tr>
<td><?php echo $row['id']?></td>
<td><?php echo $row['title']?></td>
<td><?php echo $row['author']?></td>
<td><?php echo number_format($row['price'],3)."VNĐ"?></td>
<td><?php echo "<a href=sua_sach.php?act_sua=$row[id]><img src=Images/edit.jpeg width=40px height=40 border=0 align=center/> </a>"?></td>
<td><?php echo "<a href=capnhat_sach.php?act=$row[id]><img src=Images/del.jpeg width=40px height=40 border=0 align=center/></a>"?></td>
<tr>
</tr>
<?php
}
echo "<p align=center><b>Page:</b>";
	     for ($k=1; $k<=$numberPage; $k++):
		 print '<a href="capnhat_sach.php?page='.$k.'">'.$k.'</a>&nbsp;&nbsp;';
	     endfor;
?>
</table>
<p align="center"><a href=index.php><img src=Images/home.jpeg width=60px height=40 border=0 align=center/></a></p>&nbsp;</td>
  </tr>
</table>
</body>
