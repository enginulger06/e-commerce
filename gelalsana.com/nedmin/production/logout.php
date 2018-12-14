<?php 
	session_start();

	session_destroy(); // session hafızasından silerek güvenli çıkış yapılıyor.
	header("Location:login.php?durum=exit");
	exit;

?>