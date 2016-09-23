<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
     <head>
	   <title>이미지선택</title>
          <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
          <meta http-equiv="X-UA-Compatible" content="IE=edge" />
		  
	 </head>
	 <body>
	   <?php
	     $goods_id=$_POST['goods_id'];
	     $goods_name=$_POST['goods_name'];
	     $goods_price=$_POST['goods_price'];
	     $goods_type=$_POST['goods_type'];
	     $floor=$_POST['floor'];
	     $area=$_POST['area'];
		 
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
         //파일명 변경
         @rename("./image/".$_FILES['file_upload']['name'], "./image/".$goods_id.'.PNG');		 
	   
	     $connect=mysql_connect("localhost","sjjo0319","sj0319");
	     mysql_selectdb("sjjo0319");
	   
	     mysql_query("set names utf8");//결과값이 한글일 경우 사용
	     /*goods 테이블에 투플 삽입*/
	     $qry="INSERT INTO goods VALUES ('$goods_id','$goods_name','$goods_price','$goods_type','$floor','$area');";
	     $result=mysql_query($qry);
		 
		 die('File uploaded successfully.');
	   ?>
	 </body>
</html>