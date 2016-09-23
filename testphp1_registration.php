<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
     <head>
	   <title>등록하기</title>
          <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
          <meta http-equiv="X-UA-Compatible" content="IE=edge" />
	 </head>
	 <Script Language="JAVAScript">
	   function check(){
	   var blank=0;
	   if(registration_form.file_upload.value=="")
	   blank=1;
	   if(registration_form.goods_id.value=="")
	   blank=1;
	   if(registration_form.goods_name.value=="")
	   blank=1;
       if(registration_form.goods_price.value=="")
	   blank=1;
       if(registration_form.goods_type.value=="")
	   blank=1;
       if(registration_form.floor.value=="")
	   blank=1;
       if(registration_form.area.value=="")
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
	  <?php
	    session_start();//세션
		if($_SESSION['id']==null){//로그인 하지 않았다면
		  echo "<script>window.alert('로그인 페이지로 이동합니다.');</script>";
          echo "<script>location.href='testphp1_login.php';</script>";
	    }else{//로그인 했다면 
	      echo "<center><br><br><br>";
	      echo $_SESSION['name']."(".$_SESSION['id'].")님이 로그인 하였습니다.";
	      echo "&nbsp;<a href='testphp1_logout.php'><input type='button' value='로그아웃'></a>";
          echo "</center>";
	   }
	 ?>
	 <center><br><br><br>
	 <p>새로운 상품을 등록해주세요.</p>
	 <form id="registration_form" method="post" enctype="multipart/form-data" action="testphp1_upload.php" onsubmit="return check();">
	   
	   <table border="1">
			<tr>
				<th>상품이미지</th>
				<th>상품코드</th>
				<th>상품명</th>
				<th>가격</th>
				<th>종류</th>
				<th>층</th>
				<th>구역</th>
			</tr>
			<tr>
				<td><input type="file" name="file_upload"></td>
				<td><input type="text" name="goods_id"></td>
				<td><input type="text" name="goods_name"></td>
				<td><input type="text" name="goods_price"></td>
				<td><select name="goods_type">
		 <option value="상의">상의(원피스)</option>
		 <option value="하의">하의</option>
		 <option value="신발">신발</option>
		 <option value="가방">가방</option>
		 <option value="모자">모자(액세서리)</option>
		 <option value="베스트">베스트</option>
	   </select></td>
				<td><select name="floor">
		 <option value="1">1F</option>
		 <option value="2">2F</option>
	   </select></td>
				<td><select name="area">
		 <option value="A">A</option>
		 <option value="B">B</option>
		 <option value="C">C</option>
		 <option value="D">D</option>
		 <option value="E">E</option>
		 <option value="F">F</option>
		 <option value="G">G</option>
		 <option value="H">H</option>
		 <option value="I">I</option>
		 <option value="J">J</option>
		 <option value="K">K</option>
		 <option value="L">L</option>
		 
	   </select></td>
			</tr>
		</table><br><br>
	   <input type="submit" value="등록하기">
	 </form>
	 </center>


	 </body>
</html>