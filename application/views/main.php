<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<body>
<?php    session_start();
         error_reporting (E_ALL ^ E_NOTICE);
         include("includes/conn.php");
		 if($_SESSION['addindex']==null)$_SESSION['addindex']=1;
	     $sql = "SELECT COUNT(*) FROM book$_SESSION[addindex]";
	     //$result = ;
         $rowCount = mysql_fetch_array(mysql_query($sql));
         $numberRecordPerPage	= 4;
	     $totalRecord			= $rowCount[0];
         $numberPage	= ceil($totalRecord / $numberRecordPerPage);
         $curPage				= isset($_GET["page"])?$_GET["page"]:1;
	     $startRecord			= ($curPage-1)*$numberRecordPerPage;
		 $sql = "SELECT * FROM book$_SESSION[addindex] LIMIT $startRecord,$numberRecordPerPage";
		 $query  = mysql_query($sql) or die("Query to get blah failed with error: ".mysql_error());
		
         if(mysql_num_rows($query) > 0)
     {
	while($row=mysql_fetch_array($query))
	     {
		echo "<div class=pro>";
		echo "<h3>$row[title]</h3>";echo "<img src='Images_book/$row[id].jpg' width=100px height=100 border=0>";
		echo "Tác giả: $row[author] - Giá bán: <font color=red><b>".number_format($row['price'],3)."</b></font> VNĐ";
		echo "<p align=left><font size=4><a href=chitiet.php?item=$row[id]>Chi tiết...</a></font></p>";
		echo "<p align=right><font size=4><a href=addcart.php?item=$row[id]><img src=Images/btn_buy.gif width=50px height=20 border=0 align=left/></a></font></p>";
		echo "</div>";
	     }
     }
	 echo "<p align=center><b>Page</b>:&nbsp";
	     for ($k=1; $k<=$numberPage; $k++):
		 echo '<a href="index.php?page='.$k.'">'.$k.'</a>&nbsp;&nbsp;';
	     endfor;
?>
</body>
</html>