<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
 <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	 <meta name="viewport" content="width=device-width, inital-scale=1.0, maximum-scale=1.0,
	 minimum-scale=1.0, user-scalable=no,"/>
 
 <title> Web </title>
	 
	 
	 <style type="text/css">
	 
	* {box-sizing:border-box}
body {
  font-family: 08SeoulNamsan;
  margin:0;
  color:white;
  width:100%;
  height:100%;
  overflow:hidden;
  
}


/* Slideshow container */
.slideshow-container {
  max-width: 100%;
  height:100%;
  position: relative;
  margin: auto;
  overflow:hidden;
}

/* Caption text */
.text {
  color: #f2f2f2;
  font-size: 15px;
  padding: 8px 12px;
  position: absolute;
  bottom: 8px;
  width: 100%;
  text-align: center;
}

/* Number text (1/3 etc) */
.numbertext {
  color: #f2f2f2;
  font-size: 12px;
  padding: 8px 12px;
  position: absolute;
  top: 0;
}

/* The dots/bullets/indicators */
.dot {
  height: 13px;
  width: 13px;
  margin: 0 2px;
  background-color:#E8E8E8;
  border-radius: 50%;
  display: inline-block;
  transition: background-color 0.6s ease;
}

.active {
  background-color: #779BCB;
}

/* Fading animation */
.fade {
  -webkit-animation-name: fade;
  -webkit-animation-duration: 1s;
  animation-name: fade;
  animation-duration: 1s;
}

@-webkit-keyframes fade {
  from {opacity: .6} 
  to {opacity: 1}
}

@keyframes fade {
  from {opacity: .6} 
  to {opacity: 1}
}

/* On smaller screens, decrease text size */
@media only screen and (max-width: 300px) {
  .text {font-size: 11px}
}
 .slnext {
 right: 0;


}
.slprev, .slnext {
background-color:transparent;
border-color:transparent;
position: absolute;
  top: 0;
  top: 50%;
  width: auto;
  margin-top: -22px;

  color:gray;
  font-weight: bold;
  font-family: 08SeoulNamsan;
  font-size: 30px;
  transition: 0.6s ease;



}
.window{
width:450px;
height:100%;
margin-left:5%;
padding-bottom:3%;
  background: url('image/window1.png') no-repeat;
display:block;
 overflow: hidden;
visibiliy:visible;
padding-left:1%;
padding-right:1%;
position: absolute;
}
.pick{
margin-top:20%;
font-size:30px;
}
.name{
margin-top:10%;
font-size:50px;
font-weight: bold;
}
.talk{
color:#808080;
font-size:20px;
margin-top:80%;
}

.window1{
width:450px;
height:100%;
margin-left:5%;
padding-bottom:3%;
margin-bottom:14%;
display:block;
overflow: hidden;.
visibiliy:visible;
position: absolute;

}

.qr_code{
bottm:0;
margin-top:-20%;
z-index:2;
position: absolute;
left:5vw;

}
	 
</style>
</head>
 <body>
 <?php
	   $connect=mysql_connect("localhost","sjjo0319","sj0319");
	   mysql_selectdb("sjjo0319");
	   
	   mysql_query("set names utf8");//결과값이 한글일 경우 사용
	   /*like 순으로 코디 저장*/
	   $qry="SELECT coor_num FROM coordinate AS c ORDER BY c.like DESC;";
	   $result=mysql_query($qry);
	 
	   while($row=mysql_fetch_array($result)){
		   $best_coor[]=$row['coor_num'];
	   }
 ?>

 
<div class="slideshow-container">
<?
    for($i=0; $i<5;$i++){
	$qry="SELECT r.register_name, c.coor_name, c.explain FROM coordinate AS c, register AS r 
	WHERE c.register_id=r.register_id AND c.coor_num='$best_coor[$i]';";
	   $result=mysql_query($qry);
	 
	   $row=mysql_fetch_array($result)
	
?>
<div class="mySlides fade">
  <div class="window">
  <center>
  <p class="pick"><?=$row['register_name']?>'s pick</p>
  <p class="name"><?=$row['coor_name']?></p>
  </center>
  </div>
  <div class="window1">
  <p class="talk"><?=$row['explain']?></p>
  </div>
  
  <a href="testphp1_coor_info.php?strname=<?=$best_coor[$i]?>"><img src="./image/c_<?=$best_coor[$i]?>.png" style="z-index:1; width:100%"></a>
  <div class="qr_code">
 <img src='./image/QR_<?=$best_coor[$i]?>.jpg' style="z-index:2; width:12vw" />
 </div>
 
</div>
<?
    }
?>
<div class="text" style="text-align:center">
  <span class="dot"></span> 
  <span class="dot"></span> 
  <span class="dot"></span>
  <span class="dot"></span> 
  <span class="dot"></span> 
  
</div>
<button class="slprev" onclick="plusSlides(-1)"><</a></button>
<button class="slnext" onclick="plusSlides(1)">></a></button>

</div>


<script>
var slideIndex = 0;
showSlides_a();

function plusSlides(n) {
  showSlides(slideIndex += n);
}
function showSlides_a() {//자동
    var i;
    var slides = document.getElementsByClassName("mySlides");
    var dots = document.getElementsByClassName("dot");
    for (i = 0; i < slides.length; i++) {
       slides[i].style.display = "none";  
    }
    slideIndex++;
    if (slideIndex> slides.length) {slideIndex = 1}    
    for (i = 0; i < dots.length; i++) {
        dots[i].className = dots[i].className.replace(" active", "");
    }
    slides[slideIndex-1].style.display = "block";  
    dots[slideIndex-1].className += " active";
    setTimeout(showSlides_a, 7000); // Change image every 7 seconds
}
function showSlides(n) {//수동
  var j;
  var slides = document.getElementsByClassName("mySlides");
  var dots = document.getElementsByClassName("dot");
  if (n > slides.length) {slideIndex = 1} 
  if (n < 1) {slideIndex = slides.length}
  for (j = 0; j < slides.length; j++) {
      slides[j].style.display = "none"; 
  }
  for (j = 0; j < dots.length; j++) {
      dots[j].className = dots[j].className.replace(" active", "");
  }
  slides[slideIndex-1].style.display = "block"; 
  dots[slideIndex-1].className += " active";
}





</script>
 
</body>
 </html>
	 
	 