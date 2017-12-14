<body bgcolor="#FFFFCC">
<?php
session_start();
unset($_SESSION['addindex']);
unset($_SESSION['user_id']);
header('Content-Type: text/html; charset=UTF-8');
echo "<title>Thoát</title>";
if (session_destroy()) 
	
	echo "<div align=center><font color=red size=5px>Thoát thành công!</font> </div>";
else
	echo "Ko thể thoát dc, có lỗi trong việc hủy session";
?>
<p align="center"><a href="index.php"><img src=Images/home.jpeg width=60px height=40 border=0 align=center/></a></p>
</body>