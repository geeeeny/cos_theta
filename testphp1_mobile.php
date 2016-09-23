<!DOCTYPE HTML>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title> Mobile </title>
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0, user-scalable=no, target-densitydpi=medium-dpi" />
<link rel="stylesheet" href="http://dohoons.com/test/flick/common.css" type="text/css" />

<style type="text/css"> 
body {font-family:  08SeoulNamsan;
background-color:white;
height:100%; 
padding:0;
overflow:hidden; 
}
h1 { font-size:16px; font-weight:bold; }

h2 { margin-top:10px; text-align:center; }

#touchSlider6 
{ 
width:100%; 
height:95%; 
margin:0 auto; 
background:#FBCFD0; 
position:relative; 
overflow:hidden; 
}

.main{
width:100%;
height:100%;
position:absolute;
z-index:1;

}
.main1{
width:100%;
height:100%;
margin-top:5vw;


}

#touchSlider6 ul { width:100%; height:100%;  position:absolute; top:0; left:0; overflow:hidden; }
#touchSlider6 ul li { float:left; width:100%; height:100%;  background:#FBCFD0; font-size:14px; color:#fff; }
 
.btn_area {  background:#FBCFD0; overflow:hidden; }
.btn_area button 
{ display:block; width:100px; height:10%; background:#FBCFD0; font-size:16px; color:#fff; font-weight:bold; }

.btn_area button.btn_prev { float:left; }
.btn_area button.btn_next { float:right; }
.btn_area .btn_page {
 display:inline-block;
 width:33.3%;
 height:30px;
 margin:0px;
 font-size:0px; 
 line-height:0; 
 text-indent:-9999px; 
 background:#E8E8E8;
 border: 2px solid #FFF;
 }
.btn_area .btn_page.on { background:#FBCFD0; }

.scroll{
background:#39C;

overflow: auto;
}

table{
width:95%;
border:1px solid #E8E8E8;
}
td{


padding:5% 0;
}
table img {

width:90%;
}
.mainname{
font-size:4vw;
 font-weight:bold;
margin-top:2vw;

}

.money{
font-size:3.5vw;
 font-weight:bold;
 margin:1vw 0;
}
.explain{
font-size:3.5vw;
}
.photo{
width:40%;
}
.name{
	position:absolute;
	z-index:2;
	font-color:white;
text-align:center;
width:100%;
	top:94%;

 font-size:5.5vw;
}
</style>

<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.6.1/jquery.min.js"></script>
<script type="text/javascript" src="js/jquery.event.drag-1.5.min.js"></script>
<script type="text/javascript" src="js/jquery.touchSlider.js"></script>
<script type="text/javascript"> 
$(document).ready(function() {
	
	$("#touchSlider6").touchSlider({
		flexible : true,
		paging : $("#touchSlider6").prev().find(".btn_page"),
		initComplete : function (e) {
			$("#touchSlider6").prev().find(".btn_page").each(function (i, el) {
				$(this).text("page " + (i+1));
			});
		},
		counter : function (e) {
			$("#touchSlider6").prev().find(".btn_page").removeClass("on").eq(e.current-1).addClass("on");
		}
	});
	
});
</script>
</head>
<body>
<?php
	   $coor_num=$_GET['coornum'];
	   
	   $connect=mysql_connect("localhost","sjjo0319","sj0319");
	   mysql_selectdb("sjjo0319");
	   
	   mysql_query("set names utf8");//결과값이 한글일 경우 사용
	   
	   $qry="SELECT * FROM coor_goods WHERE coor_num ='$coor_num';";
	   $result=mysql_query($qry);
	 
	   while($row=mysql_fetch_array($result)){
		   $goods_list[]=$row['goods_id']; //관련 상품이 goods_list[] 배열에 저장됨
	   }
	   
	   $qry="SELECT * FROM coordinate WHERE coor_num ='$coor_num';";
	   $result=mysql_query($qry);
	 
	   while($row=mysql_fetch_array($result)){
		   $coor_name=$row['coor_name']; 
	   }
?>
<div class="btn_area" style="text-align:center;">
	<button type="button" class="btn_page">paging</button>
</div>
 

<div id="touchSlider6">
	<ul>
		<li>
		<img class="main" src="image/mobile_<?=$coor_num?>.png">
		<p class ="name" ><?=$coor_name?></p>
		</li>
		
		<li class="scroll" style="background:white"> <!-- 2페이지 -->
		
			<div style="width:100%" >
			
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
			//$area=$row['area'];
			?>
			<center>
			<table >
			​<tr> 
			<td class="photo">
			<center> <img src ="image/<?=$goods_id?>.PNG"></center>
			</td>		  
			<td class ="expla" >
			<div class ="mainname"><?=$goods_name?></div>
			<div class ="money" ><?=$goods_price?>원</div>
			<p class="explain">상품코드:<?=$goods_id?></p>
			</td>
			</tr>
			</table>
			</center>
			<?
				}
			?>

			   <!--<img class="main1" src="images/back.jpg">-->
			</div>
		</li> <!--2페이지끝-->
		<li style="background:white">
		
			<img class="main" src="images/map.png">
			
		</li>
	</ul>
</div>
</body>
</html>