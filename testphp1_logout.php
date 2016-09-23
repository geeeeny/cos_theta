<?php
	session_start(); // 세션
	if($_SESSION['id']!=null){
		session_destroy();
	}
	echo "<script>location.replace='testphp1_login.php';</script>";
?>
