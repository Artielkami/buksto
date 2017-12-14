<HTML>
<HEAD>
<TITLE> New Document </TITLE>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<SCRIPT LANGUAGE="JavaScript">
<!--
	var params;
	var req;

	function submitFORM() {
		var url = "doRegister.php";
		var un = document.getElementById("usrname");
		var pw = document.getElementById("passwd");
		var repw= document.getElementById("repasswd");
		var fn = document.getElementById("fname");
		var em = document.getElementById("email");
		var sn = document.getElementById("sn");
        var dc= document.getElementById("dc");
		
		var params;
		params  = "usrname="  + encodeURI(un.value);
		params += "&passwd="  + encodeURI(pw.value);
		params += "&repasswd="  + encodeURI(repw.value);
		params += "&fname="	  + encodeURI(fn.value);
		params += "&email="	  + encodeURI(em.value);
		params += "&sn="	  + encodeURI(sn.value);
        params += "&dc="	  + encodeURI(dc.value);
		//alert(params);

		if (window.XMLHttpRequest) { // Non-IE browsers
			req = new XMLHttpRequest();
			req.onreadystatechange = processStateChange;
			try {
				req.open("POST", url);
				req.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
				req.send(params);
			} catch (e) {
				alert(e);
			}
		}
		else if (window.ActiveXObject) { // IE
			req = new ActiveXObject("Microsoft.XMLHTTP");
			if (req) {
				req.onreadystatechange = processStateChange;
				req.open("POST", url);
				req.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
				req.send(params);
			}
		}	
		document("message").innerHTML = "Inserting into data ...";
		//document.all.message.innerHTML = "Inserting into data ...";
	}

	function processStateChange() {
		if (req.readyState == 4) { // Complete
			if (req.status == 200) { // OK response
				document.getElementById("data").innerHTML = req.responseText;
			}
			else {
				alert("Problem: " + req.statusText);
			}
		}
	}

//-->
</SCRIPT>
</HEAD>
<BODY  bgcolor="#FFFFCC">
<!--FORM id="register"-->
	<Center>
		<H1>Đăng ký thành viên</H1>
		<DIV id="message" style="color:#FF0000;font-weight:bold"></DIV>
	</Center>

	<TABLE width="400" align="center" cellpadding="5" cellspacing="0">
		<TR>
			<TD align="right">Tên truy cập:</TD>
			<TD><Input Type="Textbox" id="usrname"></TD>
		</TR>
		
		<TR>
			<TD align="right">Mật khẩu:</TD>
			<TD><Input Type="password" id="passwd"></TD>
		</TR>
		<TR>
			<TD align="right">Xác nhận mật khẩu:</TD>
			<TD><Input Type="password" id="repasswd"></TD>
		</TR>
		<TR>
			<TD align="right">Tên thật:</TD>
			<TD><Input Type="Textbox" id="fname"></TD>
		</TR>
		<TR>
			<TD align="right">Địa chỉ Email:</TD>
			<TD><Input Type="Textbox" id="email"></TD>
		</TR>
		<TR>
			<TD align="right">Sinh nhật:</TD>
			<TD><Input Type="Textbox" id="sn"></TD>
		</TR>
		<TR>
			<TD align="right">Địa chỉ:</TD>
			<TD><Input Type="Textbox" id="dc"></TD>
		</TR>
		<TR>
			<TD align="right"></TD>
			<TD>
				<Input Type="Button" Value="Đăng ký tài khoản" onClick="submitFORM()">
				<Input Type="Reset" Value="Hủy bỏ">
			</TD>
		</TR>
	</TABLE>
<!--/FORM-->
<p align="center"><a href=index.php><img src=Images/home.jpeg width=60px height=40 border=0 align=center/></a></p>
<center>
	<DIV id="data" style="color:#FF0000;font-weight:bold"></DIV>
</center>
</BODY>
</HTML>
