<body>
<h2 align="center"><a href="cart.php"><img src="Images/button_cart.gif" width="70px" height="40" border="0" align="center"/></a></h2>
<div>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<?php
session_start();
$ok=1;
$s=0;
	if(isset($_SESSION['cart']))
	{
		foreach($_SESSION['cart'] as $k=>$v)
		{
			if(isset($k))
			{
			$ok=2;
			$s+=$v;
			}
			
		} 
	}

	if ($ok != 2)
	{
		echo '</br><p align=center><b>Bạn không có món hàng nào trong giỏ hàng</b></p>';
	} else 
	{
		$items = $_SESSION['cart'];
		echo "<b>Bạn đang có trong giỏ hàng</b>";
		echo "<b><br>Số loại hàng: <font color=red>".count($items)."</font></b>";
		echo "<b><br>Số lượng hàng: <font color=red>".$s."</font></b>";
	}
?>
</div>