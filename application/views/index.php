<div id="layer" style="color: #CC33FF">
      <marquee loop="-1" scrollamount="2" width="100%">
        Cách tỏ tình hay nhất của phụ nữ là: đừng tỏ tình gì cả! hãy mặc đàn ông biết nắm lấy cơ hội. Y. Lecamp | Cái hấp dẫn và đẹp đẽ không phải là luôn tốt, nhưng cái tốt thì luôn đẹp. Ninon De Lenclos
        | Cách tốt nhất trong tình yêu là khi yêu không đòi hỏi.Saint Augustin | Happiness depends upon ourselves. Hạnh phúc do ở nơi chúng ta | Trong số học của tình yêu, một cộng với một là tất cả, và hai trừ đi một là không còn gì cả. | Sống  không  yêu là sống một cách không  lành mạnh | Tình yêu giống như món xúp, những  muỗng đầu thì quá nóng, những  muỗng cuối thì quá lạnh | Muốn yêu thì đừng  suy nghĩ | Biết một vài câu hỏi tốt hơn là biết tất cả các câu trả lời. | Không nên làm phiền người khác về những gì ta có thể làm được một mình. Thomas Jefferson | Quen nhau nay đã nên thương.
        Cùng nhau chấp nối tơ vương chữ tình
        Bến xinh xinh, người xinh xinh
        Trên trời dưới nước, giữa mình với ta. Nguyễn Du
      </marquee>
    </div>
	<body bgcolor="#FFFFFF">
<table width="100%" height="581">
  <tr>
    <td colspan="3"  style="border-style:dotted; border-width:medium; border-color:#CC33FF" valign="top" bgcolor="#FED120"><?php  include ("header.php"); ?>&nbsp;</td>
  </tr>
  <tr>
    <td width="20%" style="border-style:dotted; border-color:#CC33FF" valign="top" bgcolor="C1E20D"><?php   include ("left_panel.php");   ?>&nbsp;</td>
    <td width="60%" style="border-style:dotted; border-color:#CC33FF" valign="top" bgcolor="C1E20D"><?php   if($_SESSION['user_id']==null){include ("homepage.html");} else include("main.php"); 
?>&nbsp;</td>
    <td width="20%" style="border-style:dotted; border-color:#CC33FF" valign="top" bgcolor="C1E20D"><?php   include ("right_panel.php"); ?>&nbsp;</td>
  </tr>
  <tr>
    <td colspan="3" style="border-style:dotted; border-color:#CC33FF" valign="top" bgcolor="227CE8"><?php  include ("footer.php");  $temp="Bạn cần đăng nhập để mua sách!"."username: 'admin'; pass:'admin'";
if($_SESSION['user_id']==null) 
 echo' <script type="text/javascript">
        function hello(temp){
             alert(temp);
			
        }
        hello("'.$temp.'");
		
        </script>'; ?>&nbsp;</td>
  </tr>
</table>  
