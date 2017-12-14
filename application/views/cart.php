<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php 
session_start();
include("includes/conn.php");
error_reporting (E_ALL ^ E_NOTICE);
if(isset($_POST['submit']))
{
	foreach($_POST['qty'] as $key=>$value)
	{
		if( ($value == 0) and (is_numeric($value)))
		{
			unset ($_SESSION['cart'][$key]);
		}
		elseif(($value > 0) and (is_numeric($value)))
		{
			$_SESSION['cart'][$key]=$value;
		}
	}
	header("location:cart.php");
}
?>
<head>
	<title>Cart</title>
</head>
<html>
<body bgcolor="#FFFFCC">
<h1 align="center">GIỎ HÀNG</h1>
<?php
$ok=1;
$s=0;
if(isset($_SESSION['cart']))
{
	foreach($_SESSION['cart'] as $k => $v)
	{
		if(isset($k))
		{
			$ok=2;
			$s++;
		}
	}
}
if($ok == 2)
{


			echo "<form action=cart.php method=post>";
			foreach($_SESSION['cart'] as $key=>$value)
			{
				$item[]=$key;
			}
			$str=implode(",",$item);
			$total=0;
			$numberRecordPerPage= 3;
			$numberPage	= ceil($s / $numberRecordPerPage);
	
	        $curPage				= isset($_GET["page"])?$_GET["page"]:1;
	        $startRecord			= ($curPage-1)*$numberRecordPerPage;
			for($i=1;$i<=16;$i++)
{			
			$sql="select * from book$i where id in ($str)";
			$query=mysql_query($sql) or die("Query to get blah failed with error: ".mysql_error());

			while($row=mysql_fetch_array($query))
			{
			$sql2="INSERT INTO search (id,title,author,price) VALUES ('$row[id]','$row[title]','$row[author]','$row[price]')";
	        mysql_query($sql2) or die("Query to get blah failed with error: ".mysql_error());
			}
}			
            $mysql =mysql_query( "SELECT * FROM search");
			while($row=mysql_fetch_array($mysql))
			{
            $total+=$_SESSION['cart'][$row['id']]*$row['price'];
			}
           $mysql =mysql_query( "SELECT * FROM search LIMIT $startRecord,$numberRecordPerPage") or die("Query to get blah failed with error: ".mysql_error());
            while($row=mysql_fetch_array($mysql))
			{
			echo "<div class=pro>";
			echo "<h3>$row[title]</h3>";
			echo "Tác giả: $row[author] - Giá bán: <font color=red><b>".number_format($row['price'],3)."</b> VNĐ</font>";
			echo "<p align=right ><b>Số lượng:</b> <input type=text name=qty[$row[id]] size=10 value={$_SESSION['cart'][$row[id]]}> - ";
			echo "<a href=delcart.php?productid=$row[id]>Xóa sách này</a></p>";
			echo "<p align=right> Giá tiền cho món hàng: <font color=red> ". number_format($_SESSION['cart'][$row['id']]*$row['price'],3) ." VND</font></p>";
			echo "</div>";
			
			mysql_query("DELETE from search");
			}
        echo "<div class=pro align=right>";
		echo "<b>Tổng tiến tất cả hàng: <font color=red>". number_format($total,3)." VND</font></b>";
		echo "</div>";
		echo "<p align=right><input type='submit' name=submit value='Cập nhật giỏ hàng'></p>";
		echo "<div class=pro align=center>";
		echo "<b><a href=index.php>Mua sách tiếp</a> - <a href=?act=thanhtoan&ok=1>Thanh toán</a> - <a href=delcart.php?productid=0>Xóa bỏ giỏ hàng</a></b>";
		echo "</div>";	
		if(!isset($_GET['ok']))
{
$_GET['ok']='undefine';
}
	if ($_GET['ok']=="1")
	{
	
	$sql="INSERT INTO `hoadon` (`hoadon_sanpham`,`hoadon_khachhang`,`hoadon_tongtien`,`diachi`) VALUES ('$str','$_SESSION[tenkh]','$total','$_SESSION[dc]')";
	$result = mysql_query($sql) or die("Query to get blah failed with error: ".mysql_error());
	if ($result)
	{
	$temp="Hóa đơn của bạn đã đc lưu trong CSDL! Hàng sẽ được chuyển đến địa chỉ bạn đã đăng ký";
echo '
        <script type="text/javascript">
        function hello(temp){
             alert(temp);
			 window.location="index.php";
        }
        hello("'.$temp.'");
        </script>
        ';
	}
	}
		echo "<p align=center><b>Page:</b>";
	     for ($k=1; $k<=$numberPage; $k++):
		 print '<a href="cart.php?page='.$k.'">'.$k.'</a>&nbsp;&nbsp;';
	     endfor;
}

else
	{
		echo "<div class=pro>";
		echo '<p align=center><b>Bạn không có món hàng nào trong giỏ hàng</b><br /><a href=index.php><b>Quay về trang chủ</b></a></p>';
		echo "</div>";
	}
	
?>
</body>
</html>