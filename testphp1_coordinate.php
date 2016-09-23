<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
     <head>
	   <title>코디등록하기</title>
          <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
          <meta http-equiv="X-UA-Compatible" content="IE=edge" />
	 </head>
	 <Script Language="JAVAScript">
	   function check(){
	   var blank=0;
	   if(registration_form.file_upload.value=="")
	   blank=1;
	   if(coordinate_form.coor_name.value=="")
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
	 <?php
	    /*셀렉트 박스에 들어갈 리스트들*/
		$goods_top_list[]="";
		$goods_bottom_list[]="";
		$goods_shoes_list[]="";
		$goods_bag_list[]="";
		$goods_accessary_list[]="";//(모자,목걸이)
		$goods_vest_list[]="";
		
		$connect=mysql_connect("localhost","sjjo0319","sj0319");
	    mysql_selectdb("sjjo0319");  
	    mysql_query("set names utf8");//결과값이 한글일 경우 사용
		//상의 
	    $qry="SELECT goods_id FROM goods WHERE goods_type='상의';";
	    $result=mysql_query($qry);
	 
	    while($row=mysql_fetch_array($result)){
		    $goods_top_list[]=$row['goods_id']; //상의 목록 저장
	    }
		//하의 
	    $qry="SELECT goods_id FROM goods WHERE goods_type='하의';";
	    $result=mysql_query($qry);
	 
	    while($row=mysql_fetch_array($result)){
		    $goods_bottom_list[]=$row['goods_id'];
	    }
		//신발 
	    $qry="SELECT goods_id FROM goods WHERE goods_type='신발';";
	    $result=mysql_query($qry);
	 
	    while($row=mysql_fetch_array($result)){
		    $goods_shoes_list[]=$row['goods_id'];
	    }
		//가방
	    $qry="SELECT goods_id FROM goods WHERE goods_type='가방';";
	    $result=mysql_query($qry);
	 
	    while($row=mysql_fetch_array($result)){
		    $goods_bag_list[]=$row['goods_id'];
	    }
		//모자(액세서리)
	    $qry="SELECT goods_id FROM goods WHERE goods_type='모자';";
	    $result=mysql_query($qry);
	 
	    while($row=mysql_fetch_array($result)){
		    $goods_accessary_list[]=$row['goods_id'];
	    }
		//베스트
	    $qry="SELECT goods_id FROM goods WHERE goods_type='베스트';";
	    $result=mysql_query($qry);
	 
	    while($row=mysql_fetch_array($result)){
		    $goods_vest_list[]=$row['goods_id'];
	    }

       ?>
	 <center><br><br><br>
	 <p>새로운 코디를 등록해주세요.</p>
	 <form id="coordinate_form" method="post" enctype="multipart/form-data" action="testphp1_upload_coor.php" onsubmit="return check();">
	   
	   <table border = "1">
			<tr>
				<td>코디이미지</td>
				<td><input type="file" name="file_upload"></td>
			</tr>
			<tr>
				<td>코디명</td>
				<td><input type="text" name="coor_name"></td>
			</tr>
			<tr>
				<td>코디설명</td>
				<td><input type="text" name="coor_explain" style="width:200px"></td>
			</tr>
		</table>
		<br><br>
		<table border = "1">
			<tr>
				<td>상의(원피스)</td>
				<td>하의</td>
				<td>신발</td>
				<td>가방</td>
				<td>모자(악세서리)</td>
				<td>베스트</td>
			</tr>
			<tr>
				<td><select name="top">
				 <?
				   foreach($goods_top_list as $value){
				 ?>
				 <option value="<?=$value?>"><?=$value?></option>
				 <?
				   }
				 ?>
			   </select></td>
				<td><select name="bottom">
				 <?
				   foreach($goods_bottom_list as $value){
				 ?>
				 <option value="<?=$value?>"><?=$value?></option>
				 <?
				   }
				 ?>
			   </select></td>
				<td><select name="shoes">
				 <?
				   foreach($goods_shoes_list as $value){
				 ?>
				 <option value="<?=$value?>"><?=$value?></option>
				 <?
				   }
				 ?>
			   </select></td>
				<td><select name="bag">
				 <?
				   foreach($goods_bag_list as $value){
				 ?>
				 <option value="<?=$value?>"><?=$value?></option>
				 <?
				   }
				 ?>
			   </select></td>
				<td><select name="accessary">
				 <?
				   foreach($goods_accessary_list as $value){
				 ?>
				 <option value="<?=$value?>"><?=$value?></option>
				 <?
				   }
				 ?>
			   </select></td>
				<td><select name="vest">
				 <?
				   foreach($goods_vest_list as $value){
				 ?>
				 <option value="<?=$value?>"><?=$value?></option>
				 <?
				   }
				 ?>
			   </select></td>
			</tr>
		</table>
		<br><br>
	   <input type="submit" value="등록하기">
	 </form>
	 </center>


	 </body>
</html>