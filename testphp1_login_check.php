<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
     <head>
	   <title>이미지선택</title>
          <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
          <meta http-equiv="X-UA-Compatible" content="IE=edge" />
		  
	 </head>
	 <body>
	 <?php
	   session_start();//세션
	   $id = $_POST['id']; // 아이디 
       $pw = $_POST['pw']; // 패스워드
	   
	   $connect=mysql_connect("localhost","sjjo0319","sj0319");
	   mysql_selectdb("sjjo0319");
	   
	   mysql_query("set names utf8");//결과값이 한글일 경우 사용
	   
	   /*관리자일 경우 관리자 등록 페이지로 이동*/
	   $qry="SELECT * FROM administrator WHERE administrator_id ='$id' AND administrator_pw ='$pw';";
	   $result=mysql_query($qry);
	   $row=mysql_fetch_array($result);
	   
	   if($id==$row['administrator_id'] && $pw==$row['administrator_pw']){ // id와 pw가 맞다면 login
         $_SESSION['id']=$row['administrator_id'];
         $_SESSION['name']=$row['administrator_name'];
         echo "<script>location.href='testphp1_registration.php';</script>";
       }else{//관리자가 아니면 등록자인지 확인하여 등록자면 testphp1_coordinate.php 페이지로 이동함 
		   	   $qry="SELECT * FROM register WHERE register_id ='$id' AND register_pw ='$pw';";
			   $result=mysql_query($qry);
			   $row=mysql_fetch_array($result);
	    
			   if($id==$row['register_id'] && $pw==$row['register_pw']){ // id와 pw가 맞다면 login
			   $_SESSION['id']=$row['register_id'];
			   $_SESSION['name']=$row['register_name'];
				echo "<script>location.href='testphp1_coordinate.php';</script>";
			   }else{ // id 또는 pw가 다르다면 login 폼으로   
				   echo "<script>window.alert('잘못된 아이디 또는 비밀번호 입니다.');</script>";
				   echo "<script>location.href='testphp1_login.php';</script>";
			   }
			}
	   


	 ?>
	 </body>
</html>