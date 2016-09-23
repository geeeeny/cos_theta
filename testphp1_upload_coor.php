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
		 $register_id=$_SESSION['id'];
	     $coor_name=$_POST['coor_name'];
		 $coor_explain=$POST['coor_explain'];
		 
	     $goods1=$_POST['top'];
	     $goods2=$_POST['bottom'];
	     $goods3=$_POST['shoes'];
	     $goods4=$_POST['bag'];
	     $goods5=$_POST['accessary'];
		 $goods6=$_POST['vest'];
	   
	     //Check for errors 에러가 1이상이면 오류가 발생한 것
	     if($_FILES['file_upload']['error']>0){
			 die('An error ocurred when uploading.');
		 }
		 //이미지 파일 크기 체크. 실제 image가 아니면 0으로 나오게 됨
		 if(!getimagesize($_FILES['file_upload']['tmp_name'])){
			 die('Please ensure you are uploading an image.');
		 }
		 //Check filetype. 파일 타입 체크
		 if($_FILES['file_upload']['type']!='image/png'){
			 die('Unsupported filetype uploaded.');
		 }
		 //Check filesize. 파일 크기 체크
		 if($_FILES['file_upload']['size']>500000){
			 die('File uploaded exceeds maximum upload size.');
		 }
		 //Check if the file exists. 파일이 이미 존재하는지 체크
		 //unlink("upload/$fileName");을 사용하여 삭제 가능
		 if(file_exists('upload/'.$_FILES['file_upload']['name'])){
			 die('File with that name already exists.');
		 }
		 //Upload file. move_uploaded_file()을 사용하여 최종적으로 업로드
		 if(!move_uploaded_file($_FILES['file_upload']['tmp_name'],
		 'image/'.$_FILES['file_upload']['name'])){
			 die('Error uploading file - check destination is writeable.');
		 }	 
	   
	     $connect=mysql_connect("localhost","sjjo0319","sj0319");
	     mysql_selectdb("sjjo0319");
	   
	     mysql_query("set names utf8");//결과값이 한글일 경우 사용
		 /*가장 최근에 저장된 coor_num을 알아냄*/
	     $qry = "SELECT coor_num FROM coordinate WHERE coor_num=(SELECT MAX(coor_num) FROM coordinate);";
	     $result=mysql_query($qry);
		 $row=mysql_fetch_array($result);
		 $coor_num=$row[0]+1;
		 
		 //파일명 변경
         @rename("./image/".$_FILES['file_upload']['name'], "./image/c_".$coor_num.'.PNG');	
		 
	     /*coordinate 테이블에 투플 삽입*/
	     $qry="INSERT INTO coordinate(coor_num,coor_name,coor_explain,register_id,date) VALUES ('$coor_num','$coor_name','$coor_explain','$register_id',CURRENT_TIMESTAMP);";
	     $result=mysql_query($qry);
		 
		 /*coor_goods테이블에 저장*/
		 if(!$goods1==null){
			 $qry = "INSERT INTO coor_goods(coor_num,goods_id) VALUES ('$coor_num','$goods1');";
			 $result=mysql_query($qry);
		 }
		 if(!$goods2==null){
			 $qry = "INSERT INTO coor_goods(coor_num,goods_id) VALUES ('$coor_num','$goods2');";
			 $result=mysql_query($qry);
		 }
		 if(!$goods3==null){
			 $qry = "INSERT INTO coor_goods(coor_num,goods_id) VALUES ('$coor_num','$goods3');";
			 $result=mysql_query($qry);
		 }
		 if(!$goods4==null){
			 $qry = "INSERT INTO coor_goods(coor_num,goods_id) VALUES ('$coor_num','$goods4');";
			 $result=mysql_query($qry);
		 }
		 if(!$goods5==null){
			 $qry = "INSERT INTO coor_goods(coor_num,goods_id) VALUES ('$coor_num','$goods5');";
			 $result=mysql_query($qry);
		 }
		 if(!$goods6==null){
			 $qry = "INSERT INTO coor_goods(coor_num,goods_id) VALUES ('$coor_num','$goods6');";
			 $result=mysql_query($qry);
		 }
	     echo 'coordination uploaded successfully.';
	   ?>
	 </body>
</html>