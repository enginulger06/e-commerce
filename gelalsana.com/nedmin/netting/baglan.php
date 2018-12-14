<?php 

try {

	$db = new PDO("mysql:host=localhost;dbname=gelal;charset=utf8",'root','1840engin');
	//echo "Veritabanı bağlantısı sağlandı";
} catch (PDOException $e) {

	echo $e->getMessage();
}


?>