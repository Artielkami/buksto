<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<body bgcolor="#FFFFCC">
<?php session_start();
error_reporting (E_ALL ^ E_NOTICE);?>

<form  method="post" action="timkiem.php?act=do">
  <table width="403" border="0" align="center" cellspacing="4" cellpadding="0">
    <tr>
      <td width="83">T&ecirc;n s&aacute;ch </td>
     <?php echo "<td width=386><input name=tensach type=text size=35 value= '$_POST[tensach]'></td>";?> 
    </tr>
    <tr>
      <td>T&aacute;c gi&#7843; </td>
     <?php echo "<td><input name=tacgia type=text size=35 value='$_POST[tacgia]'></td>";  ?>
    </tr>
    <tr>
      <td height="72" colspan="2">
        
        <div align="center">
          <input type="submit" name="Submit" value="Tìm kiếm">
        </div></td></tr>
  </table>
  <p align="center"><a href="index.php"><b>Quay về trang chủ</a></b></p>
</form>

<?php
    
include("includes/conn.php");
if (Empty($_GET['act']))$_GET['act']="undo";
if ( $_GET['act'] != "to" ) 
{
if ( $_GET['act'] == "do" ) 
{
	$_SESSION["tensach"] =( $_POST['tensach'] );
	$_SESSION["tacgia"] = ( $_POST['tacgia'] );
}
else 
{	
    $_SESSION["tensach"] =$_SESSION["tensach"];
	$_SESSION["tacgia"] =$_SESSION["tacgia"];
}	

	$numberRecordPerPage= 4;
	$b=0;
	for($a=1;$a<=16;$a++)
    {
	$query = mysql_query("SELECT * from book$a where title like '%$_SESSION[tensach]%' and author like '%$_SESSION[tacgia]%'") or die("Co loi:".mysql_error());
	while($row=mysql_fetch_array($query))
	{
	$b++;
	$sql="INSERT INTO search (id,title,author,price) VALUES ('$row[id]','$row[title]','$row[author]','$row[price]')";
	mysql_query($sql) or die("Query to get blah failed with error: ".mysql_error());
	}
	}
    echo "<b>Số kết quả tìm được:<font color=blue> $b</font> </b>";
	$numberPage	= ceil($b / $numberRecordPerPage);
	
	$curPage				= isset($_GET["page"])?$_GET["page"]:1;
	$startRecord			= ($curPage-1)*$numberRecordPerPage;
    if($b==0) echo "<p align=center><font size=5px color=red>Không tìm thấy kết quả!</font></p>";

$mysql =mysql_query( "SELECT * FROM search LIMIT $startRecord,$numberRecordPerPage");
while($row1=mysql_fetch_array($mysql))
{
echo "<h3>$row1[title]</h3>";
echo "Tác giả: $row1[author] - Giá bán: <font color=red><b>".number_format($row1['price'],3)."</b></font> VNĐ&nbsp&nbsp&nbsp&nbsp";
echo "<p align=left><font size=4><a href=chitiet.php?item=$row1[id]>Chi tiết...</a></font></p>";
echo "<font size=4><a href=addcart.php?item=$row1[id]><img src=Images/btn_buy.gif width=50px height=20 border=0 /></a></font>";
mysql_query("DELETE from search");
}
echo "<p align=center><b>Page:</b>";
	     for ($k=1; $k<=$numberPage; $k++):
		 print '<a href="timkiem.php?page='.$k.'">'.$k.'</a>&nbsp;&nbsp;';
	     endfor;
}
?>
</body>