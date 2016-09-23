<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
     <head>
	   <title>이미지선택</title>
          <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
          <meta http-equiv="X-UA-Compatible" content="IE=edge" />
		  
	 </head>
	 <Script Language="JAVAScript">
	   function check(){
	   var blank=0;
	   if(login_form.id.value=="")
	   blank=1;
	   if(login_form.pw.value=="")
	   blank=1;
	   if(blank==1){
	    alert("빈란이 있습니다. 채워주세요.");
		return (false)
	   }
	   else{
		return (true);
	   }
	   }
     </Script>
	 
	 <body>
	 <center><br><br><br>
	 <form name="login_form" action="testphp1_login_check.php" method="post" onsubmit="return check();">
	   
	   <table>
			<tr>
				<td align = "right">ID :</td>
				<td><input type="text" name="id"></td>
			</tr>
			<br>
			<tr>
				<td align = "right">PW :</td>
				<td><input type="password" name="pw"></td>
			</tr>
		</table><br><input type="submit" name="login" value="로그인" >
	 </center>
	 </form>
	 </body>
</html>