<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
     <head>
	   <title>이미지선택</title>
          <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
          <meta http-equiv="X-UA-Compatible" content="IE=edge" />
		  
	 </head>
	 <body>
	 <?php
	   $connect=mysql_connect("localhost","sjjo0319","sj0319");
	   mysql_selectdb("sjjo0319");
	   
	   mysql_query("set names utf8");//결과값이 한글일 경우 사용
	   /*모든 상품 id 받아오기*/
	   $qry="SELECT goods_id FROM goods;";
	   $result=mysql_query($qry);
	 
	   while($row=mysql_fetch_array($result)){
		   $goods_list[]=$row['goods_id']; //모든 상품 id가 goods_list[] 배열에 저장됨
	   }

	   mysql_close($connect);

	 ?>
	 
	 <form method="post" action="testphp1_related_coor.php">
	 <?
	       foreach($goods_list as $value){
	 ?>
	   <input type="radio" name="clothes" value="<?=$value?>" onclick="this.form.submit();"><?=$value?><br>
	 <?
	       }
	 ?>  
	 </form>

	 </body>
</html>
