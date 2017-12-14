<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php
	include ("includes/conn.php");
    $sql = "SELECT * FROM Danhmuc ORDER BY Madm";
	$query = mysqli_query($db_connection, $sql);
print '<Table Border="0" Cellspacing="0" Cellpadding="5" width="100%">';
		while (list($maDM, $tenDM) = mysqli_fetch_row($query) ) {
			print '<Tr>';
				    print '<Td>';
					print '<font size="4px"><A Href="addindex.php?id='.$maDM.'"><font color="#0189C7">'.$tenDM.'</A></font>';
					print '</Td>';
			print '</Tr>';
		}
print '</Table>';
?>

				