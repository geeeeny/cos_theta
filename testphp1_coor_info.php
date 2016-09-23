<!DOCTYPE HTML>
<html>
<head>
<title>코디정보</title>
   <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge" />
<style type="text/css">
* {
	font-size: 12px;
	line-height: 1.4em;
	margin: 0px;
	padding: 0px;
}

#wrap {
	margin-right: auto;
	margin-left: auto;
	padding-top: 1%;
}

body{
	width: 100%;
	height: 100%;
	overflow:hidden;
}



#wrap #info #clothes_info {
	
	padding-left: 10%;
	padding-right: 1%;
	padding-top: 1.5%;
	width:100%;
	height:100%;
		
	margin-top:3%;
}

#wrap #info #location_info {
		display: inline-block;
	padding-left: 5%;

	padding-top: 1.5%;
	width:100%;

	
	margin:1%;
}
table{
width:100%;
height:100%;
}
td{
width:50%;
height:100%;
}

#wrap #info #clothes_info #img_box {
	display: inline-block;
	width: 30%;
	padding: 1%;
	float:left;

	border-width: 1px;
	border-style: solid;
	border-color: #E8E8E8;
	
	
}
#wrap #info #location_info .img {
width:33vw;
	display: inline-block;
float:left;
	position:absolute;
	top:1.3vw;
	left:28vw;

}
#wrap #info #location_info .img2 {
   width:33vw;
   display: inline-block;
    float:left;
   position:absolute; 
   top:28.5vw;
   left:28vw;
}
.point{
z-index:2;
}
.box2{
z-index:1;
}

#wrap #info #clothes_info img {
	border-bottom-width: 2px;
	border-bottom-style: solid;
	border-bottom-color: #E8E8E8;
	
 	display: block;
	margin-left: auto;
    margin-right: auto;
	width: 100%;
}



#wrap #info #clothes_info ul {
	color: #999;
	padding-left: 30px;
	
}
#wrap #info #clothes_info div p {
	text-align: center;
	margin-top: 5%;
}

.score {
	color: #F90;
}
.highlight {
	color: #9C3;
}



</style>
</head>
<body>
<?php
	   $coor_num=$_GET['strname'];
	   
	   $connect=mysql_connect("localhost","sjjo0319","sj0319");
	   mysql_selectdb("sjjo0319");
	   
	   mysql_query("set names utf8");//결과값이 한글일 경우 사용
	   
	   $qry="SELECT goods_id FROM coor_goods WHERE coor_num ='$coor_num';";
	   $result=mysql_query($qry);
	 
	   while($row=mysql_fetch_array($result)){
		   $goods_list[]=$row['goods_id']; //관련 상품이 goods_list[] 배열에 저장됨
	   }
?>
<div id = "wrap">
	<div id="info">
	<center>
	<table>
	<tr> 
	<td>
 	<div id="clothes_info">
	<?
	  foreach($goods_list as $value){
	     $qry="SELECT * FROM goods WHERE goods_id ='$value';";
         $result=mysql_query($qry);
	     $row=mysql_fetch_array($result);
	     $goods_id=$row['goods_id'];
	     $goods_name=$row['goods_name'];
	     $goods_price=$row['goods_price'];
	     //$goods_type=$row['goods_type'];
	     //$floor=$row['floor'];
	     $area=$row['area'];
	?>
        <div id="img_box"><img src = "image/<?=$goods_id?>.PNG" width = "100%">
          <p><b><?=$goods_name?></a></b></p>
          <br>
          <ul>
            <li class="highlight"><?=$goods_id?></li>
            <li>가격: <?=$goods_price?></li>
            <li class="score">위치: <?=$area?></li>
			<li></li>
			<li></li>
          </ul>
        </div>
	<?
	   }
	
	  for($i=0; $i<6-count($goods_list); $i++){
    ?>
	<div id="img_box"><img src = "image/hanger.png" width = "100%">
          <p><b></a>상품정보없음</b></p>
          <br>
          <ul>
            <li class="highlight"></li>
            <li></li>
            <li></li>
			<li></li>
			<li></li>
          </ul>
        </div>
    <?
      }
    ?>
	</div> <!---옷정보--->
	</td>
	<td>
      <div id ="location_info">
		<div class="img box2">
			<img class="img point" src="image/first_floor.png" style="z-index:1" >
			<?
			foreach($goods_list as $value){
				$qry="SELECT * FROM goods WHERE goods_id ='$value';";
				$result=mysql_query($qry);
				$row=mysql_fetch_array($result);
				//$goods_type=$row['goods_type'];
				$floor=$row['floor'];
				$area=$row['area'];
				if($floor==1){
	        ?>
			<img class="img point" src = "image/<?=$area?><?=$floor?>.png" >			
			<?
					}
				}
			?>
		</div> 
     
		<div class="img box2">
			<img class="img2 point" src="image/second_floor.png" style="z-index:1" >
			<?
			foreach($goods_list as $value){
				$qry="SELECT * FROM goods WHERE goods_id ='$value';";
				$result=mysql_query($qry);
				$row=mysql_fetch_array($result);
				//$goods_type=$row['goods_type'];
				$floor=$row['floor'];
				$area=$row['area'];
				if($floor==2){
	        ?>
			<img class="img2 point" src = "image/<?=$area?><?=$floor?>.png" >		
			<?
					}
				}
			?>
		</div>
	
		</div>
		</td>
		</tr>
		</table>
		</center>
	</div>
 </div>
</body>
</html>