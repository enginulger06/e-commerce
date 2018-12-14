<?php
ob_start();
session_start();
include 'baglan.php';
include '../production/foksiyon.php';



////////////// Admin Giris ////////////
if (isset($_POST['admingiris'])) {
	$kullanici_mail= $_POST['kullanici_mail'];
	$kullanici_password=md5($_POST['kullanici_password']);
	$kullanicisor=$db->prepare("SELECT * FROM kullanici where kullanici_mail=:mail and kullanici_password=:password and kullanici_yetki=:yetki");
	$kullanicisor->execute(array(
		'mail'=>$kullanici_mail,
		'password'=>$kullanici_password,
		'yetki'=>5
	));
	$say=$kullanicisor->rowCount(); // yukardaki sorguya göre rocount yaparak sayıyor. varmı yok mu diye
	if ($say==1) {
		$_SESSION['kullanici_mail']=$kullanici_mail;
		header("Location:../production/index.php");
		exit;
	} else {	
		header("Location:../production/login.php?durum=no");
		exit;
	}
	exit;
}




////////////// Kullanıcı duzenleme ///////////////////////////
if (isset($_POST['kullaniciduzenle'])){
	// Tablo Güncelleme işlem kodları
	$kullanici_id=$_POST['kullanici_id'];
	$kullanici_passwordone=$_POST['kullanici_passwordone'];
	$kullanici_passwordtwo=$_POST['kullanici_passwordtwo'];
	if (strlen($kullanici_passwordone)==0 and strlen($kullanici_passwordtwo)==0) {
		$kullanicikaydet=$db->prepare("UPDATE kullanici SET
			kullanici_adsoyad=:kullanici_adsoyad,
			kullanici_mail=:kullanici_mail,
			kullanici_durum=:kullanici_durum,
			kullanici_yetki=:kullanici_yetki WHERE kullanici_id= {$_POST['kullanici_id']}");
		$update=$kullanicikaydet->execute(array(
			'kullanici_adsoyad'=> $_POST['kullanici_adsoyad'],
			'kullanici_mail'=> $_POST['kullanici_mail'],
			'kullanici_durum'=> $_POST['kullanici_durum'], 
			'kullanici_yetki'=> $_POST['kullanici_yetki'] ));
		if ($update) {
			header("Location:../production/kullanici-duzenle.php?kullanici_id=$kullanici_id&durum=ok");
			exit;
		}else {	
			header("Location:../production/kullanici-duzenle.php?kullanici_id=$kullanici_id&durum=no");
			exit;
		}
	} else {
		if ($kullanici_passwordone==$kullanici_passwordtwo) {
			$password=md5($kullanici_passwordone);
			$kullanicikaydet=$db->prepare("UPDATE kullanici SET
				kullanici_adsoyad=:kullanici_adsoyad,
				kullanici_mail=:kullanici_mail,
				kullanici_password=:kullanici_password,
				kullanici_durum=:kullanici_durum
				kullanici_yetki=:kullanici_yetki WHERE kullanici_id= {$_POST['kullanici_id']}");
			$update=$kullanicikaydet->execute(array(
				'kullanici_adsoyad'=> $_POST['kullanici_adsoyad'],
				'kullanici_mail'=> $_POST['kullanici_mail'],
				'kullanici_password'=> $password,
				'kullanici_durum'=> $_POST['kullanici_durum'],
				'kullanici_yetki'=> $_POST['kullanici_yetki'] ));
			if ($update) {
				header("Location:../production/kullanici-duzenle.php?kullanici_id=$kullanici_id&durum=ok");
				exit;
			}else {	
				header("Location:../production/kullanici-duzenle.php?kullanici_id=$kullanici_id&durum=no");
				exit;
			}
		} else {
			header("Location:../production/kullanici-duzenle.php?kullanici_id=$kullanici_id&durum=farklisifre");
			exit;
		}	
	}
}

////////////// Kullanıcı silme ///////////////////////////
if ($_GET['kullanicisil']=="ok"){
	$kullanici_id=$_POST['kullanici_id'];
	$sil=$db->prepare("DELETE from kullanici where kullanici_id=:id");
	$kotrol=$sil->execute(array(
		'id'=> $_GET['kullanici_id']
	));

	if ($kotrol) {
		header("Location:../production/kullanicilar.php?sil=ok");
		exit;
	}else {	
		header("Location:../production/kullanicilar.php?sil=no");
		exit;
	}
}






/////////// Kyllanici Kayit Ol /////////
if (isset($_POST['kayitol'])){

	$kullanici_passwordone=$_POST['kullanici_passwordone'];
	$kullanici_passwordtwo=$_POST['kullanici_passwordtwo'];
	
	if ($kullanici_passwordone==$kullanici_passwordtwo) {
		$password=md5($kullanici_passwordone);
		$kaydet=$db->prepare("INSERT INTO kullanici SET
			kullanici_mail=:kullanici_mail,
			kullanici_password=:kullanici_password,
			kullanici_durum=:kullanici_durum,
			kullanici_yetki=:kullanici_yetki");
		$insert=$kaydet->execute(array(
			'kullanici_mail'=> $_POST['kullanici_mail'],
			'kullanici_password'=> $password,
			'kullanici_durum'=>1,
			'kullanici_yetki'=> 1));
		if ($insert) {
				header("Location:../../index.php?durum=kayit_ok");
				exit;
			}else {	
				header("Location:../../index.php?durum=kayit_no");
				exit;
			}

	} else {
		header("Location:../../header.php?index.php?durum=kayit_farklisifre");
		exit;
	}
	
}


//////////// Giriş Yap ////////////
if (isset($_POST['girisyap'])) {
	$kullanici_mail= $_POST['kullanici_mail'];
	$kullanici_password=md5($_POST['kullanici_password']);
	$kullanicisor=$db->prepare("SELECT * FROM kullanici where kullanici_mail=:mail and kullanici_password=:password and kullanici_yetki=:yetki");
	$kullanicisor->execute(array(
		'mail'=>$kullanici_mail,
		'password'=>$kullanici_password,
		'yetki'=>1
	));
	$say=$kullanicisor->rowCount(); // yukardaki sorguya göre rocount yaparak sayıyor. varmı yok mu diye
	if ($say==1) {
		$_SESSION['kullanici_mail']=$kullanici_mail;
		header("Location:../../index.php");
		exit;
	} else {	
		header("Location:../../index.php?durum=giris_no");
		exit;
	}
	exit;
}




























////////////// Genel Güncelleme ///////////////////////////
if (isset($_POST['genelayarkaydet'])){
	// Tablo Güncelleme işlem kodları
	$ayarkaydet=$db->prepare("UPDATE ayar SET
		ayar_url=:ayar_url,
		ayar_title=:ayar_title,
		ayar_description=:ayar_description,
		ayar_keywords=:ayar_keywords,
		ayar_author=:ayar_author,
		ayar_tel=:ayar_tel,
		ayar_whatsapp=:ayar_whatsapp,
		ayar_mail=:ayar_mail,
		ayar_bakim=:ayar_bakim
		WHERE ayar_id=0");
	$update=$ayarkaydet->execute(array(
		'ayar_url'=> $_POST['ayar_url'],
		'ayar_title'=> $_POST['ayar_title'],
		'ayar_description' => $_POST['ayar_description'],
		'ayar_keywords' => $_POST['ayar_keywords'],
		'ayar_author' => $_POST['ayar_author'],
		'ayar_tel' => $_POST['ayar_tel'],
		'ayar_whatsapp' => $_POST['ayar_whatsapp'],
		'ayar_mail' => $_POST['ayar_mail'],
		'ayar_bakim' => $_POST['ayar_bakim']
	));
	if ($update) {
		header("Location:../production/genel-ayar.php?durum=ok");
		exit;
	}else {	
		header("Location:../production/genel-ayar.php?durum=no");
		exit;
	}
}




///////////////// Hakkımızda Güncelleme/////////////
if (isset($_POST['hakkimizdaduzenle'])) {
	$hakkimizda_id=$_POST['hakkimizda_id'];
	//$hakkimizda_seo=seo($_POST['hakkimizda_ad']);
	$hakkimizdakaydet=$db->prepare("UPDATE hakkimizda SET
		hakkimizda_baslik=:hakkimizda_baslik,
		hakkimizda_icerik=:hakkimizda_icerik,
		hakkimizda_video=:hakkimizda_video,
		hakkimizda_vizyon=:hakkimizda_vizyon,
		hakkimizda_misyon=:hakkimizda_misyon WHERE hakkimizda_id= {$_POST['hakkimizda_id']}");
	$update=$hakkimizdakaydet->execute(array(
		'hakkimizda_baslik'=>$_POST['hakkimizda_baslik'],
		'hakkimizda_icerik'=>$_POST['hakkimizda_icerik'],
		'hakkimizda_video'=>$_POST['hakkimizda_video'],
		'hakkimizda_vizyon'=>$_POST['hakkimizda_vizyon'],
		'hakkimizda_misyon'=>$_POST['hakkimizda_misyon'] ));

	if ($update) {
		header("Location:../production/hakkimizda.php?hakkimizda_id=$hakkimizda_id&durum=ok");
		exit;
	}else {
		header("Location:../production/hakkimizda.php?hakkimizda_id=$hakkimizda_id&durum=no");
		exit;
	}
} 










//////// Slinder ekleme ///////
if (isset($_POST['sliderekle'])) {

	$kaydet=$db->prepare("INSERT INTO slider SET
		slider_ad=:slider_ad,
		slider_icerik=:slider_icerik,
		slider_grup=:slider_grup,
		slider_sira=:slider_sira,
		slider_durum=:slider_durum");
	$insert=$kaydet->execute(array(
		'slider_ad'=> $_POST['slider_ad'],
		'slider_icerik'=> $_POST['slider_icerik'],
		'slider_grup'=> $_POST['slider_grup'],
		'slider_sira'=> $_POST['slider_sira'],
		'slider_durum'=> $_POST['slider_durum']
	));


	if ($insert) {
		Header("Location:../production/slider.php?durum=ok");
		exit;
	} else {
		Header("Location:../production/slider-ekle.php?durum=no");
		exit;
	}
}
////////////// Slider duzenleme ///////////////////////////
if (isset($_POST['sliderduzenle'])){
	

		$sliderkaydet=$db->prepare("UPDATE slider SET
			slider_ad=:slider_ad,
			slider_icerik=:slider_icerik,
			slider_sira=:slider_sira,
			slider_grup=:slider_grup,
			slider_durum=:slider_durum WHERE slider_id= {$_POST['slider_id']}");
		$update=$sliderkaydet->execute(array(
			'slider_ad'=>$_POST['slider_ad'],
			'slider_icerik'=>$_POST['slider_icerik'],
			'slider_sira'=>$_POST['slider_sira'],
			'slider_grup'=> $_POST['slider_grup'],
			'slider_durum'=>$_POST['slider_durum'] ));
		if ($update) {
			$resimsilunlink=$_POST['eski_yol'];
			unlink("../../$resimsilunlink");
			header("Location:../production/slider-duzenle.php?slider_id=$slider_id&durum=ok");
			exit;
		}else{	
			header("Location:../production/slider-duzenle.php?slider_id=$slider_id&durum=no");
			exit;
		}
}

////////////// Slider silme ///////////////////////////
if ($_GET['slidersil']=="ok"){
	islemkontrol(); 
	$slider_id=$_POST['slider_id'];
	$sil=$db->prepare("DELETE from slider where slider_id=:id");
	$kotrol=$sil->execute(array(
		'id'=> $_GET['slider_id']
	));

	if ($kotrol) {
		
		header("Location:../production/slider.php?sil=ok");
		exit;
	}else {
		header("Location:../production/slider.php?sil=no");
		exit;
	}
}









//////// logo günceleme ve ekleme ///////
if (isset($_POST['logoduzenle'])) {

	if ($_FILES['ayar_logo']['size']>2097152) {
		Header("Location:../production/genel-ayar.php?durum=dosyabuyuk");
		exit;
	}
 
	$izinli_uzantılar=array('jpg','gif','png');

	$ext=strtolower(substr($_FILES['ayar_logo']["name"],strpos($_FILES['ayar_logo']["name"],'.')+1));
	if (in_array($ext,$izinli_uzantılar) === false) {
		Header("Location:../production/genel-ayar.php?durum=formathatali");
		exit;
	}

	$uploads_dir = '../../dimg';
	@$tmp_name = $_FILES['ayar_logo']["tmp_name"];
	@$name = $_FILES['ayar_logo']["name"];
	$benzersizsayi4=rand(20000,32000);
	$refimgyol=substr($uploads_dir, 6)."/".$benzersizsayi4.$name;
	@move_uploaded_file($tmp_name, "$uploads_dir/$benzersizsayi4$name");
	$duzenle=$db->prepare("UPDATE ayar SET
		ayar_logo=:logo
		WHERE ayar_id=0");
	$update=$duzenle->execute(array(
		'logo' => $refimgyol
	));
	if ($update) {
		$resimsilunlink=$_POST['eski_yol'];
		unlink("../../$resimsilunlink");
		Header("Location:../production/genel-ayar.php?durum=ok");
		exit;
	} else {
		Header("Location:../production/genel-ayar.php?durum=no");
		exit;
	}

}

//////// favicon günceleme ve ekleme ///////
if (isset($_POST['faviconduzenle'])) {
	if ($_FILES['ayar_favicon']['size']>1048576) {
		Header("Location:../production/genel-ayar.php?durum=dosyabuyuk");
		exit;
	}
	$izinli_uzantılar=array('jpg','gif','png','ico');
	$ext=strtolower(substr($_FILES['ayar_favicon']["name"],strpos($_FILES['ayar_favicon']["name"],'.')+1));
	if (in_array($ext,$izinli_uzantılar) === false) {
		Header("Location:../production/genel-ayar.php?durum=formathatali");
		exit;
	}
	$uploads_dir = '../../dimg';
	@$tmp_name = $_FILES['ayar_favicon']["tmp_name"];
	@$name = $_FILES['ayar_favicon']["name"];
	$benzersizsayi4=rand(20000,32000);
	$refimgyol=substr($uploads_dir, 6)."/".$benzersizsayi4.$name;
	@move_uploaded_file($tmp_name, "$uploads_dir/$benzersizsayi4$name");
	$duzenle=$db->prepare("UPDATE ayar SET
		ayar_favicon=:favicon
		WHERE ayar_id=0");
	$update=$duzenle->execute(array(
		'favicon' => $refimgyol));
	if ($update) {
		$resimsilunlink=$_POST['eski_yol'];
		unlink("../../$resimsilunlink");
		Header("Location:../production/genel-ayar.php?durum=ok");
		exit;
	} else {
		Header("Location:../production/genel-ayar.php?durum=no");
		exit;
	}

}




///////////// Menü Ekle ///////////////////////////
if (isset($_POST['menuekle'])){
	$menu_seourl=seo($_POST['menu_ad']);
	$menuekle=$db->prepare("INSERT INTO menu SET
		menu_ad=:menu_ad,
		menu_href=:menu_href,
		menu_durum=:menu_durum,
		menu_sira=:menu_sira,
		menu_seourl=:menu_seourl ");
	$insert=$menuekle->execute(array(
		'menu_ad' =>$_POST['menu_ad'],
		'menu_href' =>$_POST['menu_href'],
		'menu_durum'=> $_POST['menu_durum'],
		'menu_sira'=> $_POST['menu_sira'],
		'menu_seourl'=>$menu_seourl ));
	if ($insert) {
		header("Location:../production/menu.php?durum=ok");
		exit;
	}else {	
		header("Location:../production/menu.php?durum=no");
		exit;
	}
}
////////////// Menu duzenleme ///////////////////////////
if (isset($_POST['menuduzenle'])){
	// Tablo Güncelleme işlem kodları
	$menu_id=$_POST['menu_id'];
	$menu_seourl="http://localhost/templat/#".seo($_POST['menu_ad']);
	$menukaydet=$db->prepare("UPDATE menu SET
		menu_ad=:menu_ad,
		menu_href=:menu_href,
		menu_sira=:menu_sira,
		menu_durum=:menu_durum,
		menu_seourl=:menu_seourl WHERE menu_id= {$_POST['menu_id']}");
	$update=$menukaydet->execute(array(
		'menu_ad'=>$_POST['menu_ad'],
		'menu_href'=>$_POST['menu_href'],
		'menu_sira'=>$_POST['menu_sira'],
		'menu_durum'=>$_POST['menu_durum'],
		'menu_seourl'=>$menu_seourl ));
	if ($update) {
		header("Location:../production/menu-duzenle.php?menu_id=$menu_id&durum=ok");
		exit;
	}else {	
		header("Location:../production/menu-duzenle.php?menu_id=$menu_id&durum=no");
		exit;
	}
}
////////////// Menü silme ///////////////////////////
if ($_GET['menusil']=="ok"){
	islemkontrol(); 
	$menu_id=$_POST['menu_id'];
	$sil=$db->prepare("DELETE from menu where menu_id=:id");
	$kotrol=$sil->execute(array(
		'id'=> $_GET['menu_id']
	));

	if ($kotrol) {
		header("Location:../production/menu.php?sil=ok");
		exit;
	}else {	
		header("Location:../production/menu.php?sil=no");
		exit;
	}
}







///////////////////// Ürün Ekleme /////////////////////77
if (isset($_POST['uuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuurunekle'])) {
	if (empty($_FILES['urun_resimyol']["name"])) {
		Header("Location:../production/urun-ekle.php?durum=hata");
		exit;
	} 
	if ($_FILES['urun_resimyol']['size']>2097152) {
		Header("Location:../production/urun-ekle.php?durum=dosyabuyuk");
		exit;
	}
	$izinli_uzantılar=array('jpg','gif','png');
	$ext=strtolower(substr($_FILES['urun_resimyol']["name"],strpos($_FILES['urun_resimyol']["name"],'.')+1));
	if (in_array($ext,$izinli_uzantılar) === false) {
		Header("Location:../production/urun-ekle.php?durum=formathatali");
		exit;
	}
	$uploads_dir = '../../dimg/urun';
	@$tmp_name = $_FILES['urun_resimyol']["tmp_name"];
	@$name = $_FILES['urun_resimyol']["name"];
	//resmin isminin benzersiz olması için
	$benzersizsayi1=rand(20000,32000);
	$benzersizsayi2=rand(20000,32000);
	$benzersizsayi3=rand(20000,32000);
	$benzersizsayi4=rand(20000,32000);
	$benzersizad=$benzersizsayi1.$benzersizsayi2.$benzersizsayi3.$benzersizsayi4;

	$refimgyol=substr($uploads_dir, 6)."/".$benzersizad.$name;
	@move_uploaded_file($tmp_name, "$uploads_dir/$benzersizad$name");
	$urunekle=$db->prepare("INSERT INTO urun SET
		urun_baslik=:urun_baslik,
		urun_icerik=:urun_icerik,
		urun_resimyol=:urun_resimyol,
		urun_sira=:urun_sira,
		urun_durum=:urun_durum");
	$insert=$urunekle->execute(array(
		'urun_baslik'=>$_POST['urun_baslik'],
		'urun_icerik'=>$_POST['urun_icerik'],
		'urun_resimyol'=>$refimgyol,
		'urun_sira'=>$_POST['urun_sira'],
		'urun_durum'=>$_POST['urun_durum']));
	if ($insert) {
		header("Location:../production/urunler.php?durum=ok");
		exit();
	} else {
		header("Location:../production/urun-ekle.php?durum=no");
		exit();
	}
}

//////////// urun-sil ////////////////
if ($_GET['uuuuurunsil']=="ok") {
	islemkontrol(); 
	$urunsor=$db->prepare("SELECT * FROM urun where urun_id={$_GET['urun_id']}");
	$urunsor->execute();
	$uruncek=$urunsor->fetch(PDO::FETCH_ASSOC);
	$resimsilunlink=$uruncek['urun_resimyol'];
	$urun_id=$_POST['urun_id'];
	$sil=$db->prepare("DELETE from urun WHERE urun_id=:id");
	$kontrol=$sil->execute(array(
		'id'=>$_GET['urun_id'] ));
	if ($kontrol) {
		unlink("../../$resimsilunlink");
		header("Location:../production/urunler.php?sil=ok");
		exit();
	} else {
		header("Location:../production/urunler.php?sil=no");
		exit();
	}
}

//////////////  Ürün Düzenle /////////////////7
if (isset($_POST['uuuuurunduzenle'])) {
	$urun_id=$_POST['urun_id'];
	if ($_FILES['urun_resimyol']['size']>0) {
		if ($_FILES['urun_resimyol']['size']>2097152) {
			Header("Location:../production/urun-duzenle.php?urun_id=$urun_id&durum=dosyabuyuk");
			exit;
		}
		$izinli_uzantılar=array('jpg','gif','png');
		$ext=strtolower(substr($_FILES['urun_resimyol']["name"],strpos($_FILES['urun_resimyol']["name"],'.')+1));
		if (in_array($ext,$izinli_uzantılar) === false) {
			Header("Location:../production/urun-duzenle.php?urun_id=$urun_id&durum=formathatali");
			exit;
		}
		$uploads_dir = '../../dimg/urun';
		@$tmp_name = $_FILES['urun_resimyol']["tmp_name"];
		@$name = $_FILES['urun_resimyol']["name"];
		$benzersizsayi1=rand(20000,32000);
		$benzersizsayi2=rand(20000,32000);
		$benzersizsayi3=rand(20000,32000);
		$benzersizsayi4=rand(20000,32000);
		$benzersizad=$benzersizsayi1.$benzersizsayi2.$benzersizsayi3.$benzersizsayi4;
		$refimgyol=substr($uploads_dir, 6)."/".$benzersizad.$name;
		@move_uploaded_file($tmp_name, "$uploads_dir/$benzersizad$name");
		$urunduzenle=$db->prepare("UPDATE urun SET
			urun_baslik=:urun_baslik,
			urun_icerik=:urun_icerik,
			urun_sira=:urun_sira,
			urun_resimyol=:urun_resimyol,
			urun_durum=:urun_durum WHERE urun_id={$_POST['urun_id']}");
		$update=$urunduzenle->execute(array(
			'urun_baslik'=>$_POST['urun_baslik'],
			'urun_icerik'=>$_POST['urun_icerik'],
			'urun_sira'=>$_POST['urun_sira'],
			'urun_resimyol' => $refimgyol,
			'urun_durum'=>$_POST['urun_durum']));
		if ($update) {
			$resimsilunlink=$_POST['eski_yol'];
			unlink("../../$resimsilunlink");
			Header("Location:../production/urun-duzenle.php?urun_id=$urun_id&durum=ok");
			exit();
		} else {
			Header("Location:../production/urun-duzenle.php?urun_id=$urun_id&durum=no");
			exit();
		}
	} else {
		$urunduzenle=$db->prepare("UPDATE urun SET
			urun_baslik=:urun_baslik,
			urun_icerik=:urun_icerik,
			urun_sira=:urun_sira,
			urun_durum=:urun_durum WHERE urun_id={$_POST['urun_id']}");
		$update=$urunduzenle->execute(array(
			'urun_baslik'=>$_POST['urun_baslik'],
			'urun_icerik'=>$_POST['urun_icerik'],
			'urun_sira'=>$_POST['urun_sira'],
			'urun_durum'=>$_POST['urun_durum']));
		if ($update) {
			Header("Location:../production/urun-duzenle.php?urun_id=$urun_id&durum=ok");
			exit;
		} else {
			Header("Location:../production/urun-duzenle.php?urun_id=$urun_id&durum=no");
			exit;
		}
	}
}

/////////////////// urun Genel Açıklama /////////////
if (isset($_POST['urunaciklama'])) {

	$kaydet=$db->prepare("UPDATE ayar SET	
		ayar_urun_aciklama=:ayar_urun_aciklama where ayar_id=0 ");

	$insert=$kaydet->execute(array(
		'ayar_urun_aciklama'=> $_POST['ayar_urun_aciklama'] ));
	if ($insert) {
		Header("Location:../production/urun-aciklama.php?durum=ok");
		exit;
	} else {
		Header("Location:../production/urun-aciklama.php?durum=no");
		exit;
	}

}






////////////////////// İletisim Güncelleme ////////////////////////
if (isset($_POST['copyrightayarkaydet'])) {
	$ayarkaydet=$db->prepare("UPDATE ayar SET
		ayar_mesai=:ayar_mesai,
		ayar_copyright=:ayar_copyright,
		ayar_copyright_link=:ayar_copyright_link,
		ayar_copyright_ad=:ayar_copyright_ad Where ayar_id=0");
	$update=$ayarkaydet->execute(array(
		'ayar_mesai'=>$_POST['ayar_mesai'],
		'ayar_copyright'=>$_POST['ayar_copyright'],
		'ayar_copyright_link'=>$_POST['ayar_copyright_link'],
		'ayar_copyright_ad'=>$_POST['ayar_copyright_ad']
	));

	if ($update) {
		header("Location:../production/copyright.php?durum=ok");
		exit;
	}else {
		header("Location:../production/copyright.php?durum=no");
		exit;
	}
}





///////////////// Api Güncelleme /////////////
if (isset($_POST['apiayarkaydet'])) {
	$ayarkaydet=$db->prepare("UPDATE ayar SET
		ayar_maps=:ayar_maps,
		ayar_analystic=:ayar_analystic,
		ayar_zopim=:ayar_zopim where ayar_id=0");
	$update=$ayarkaydet->execute(array(
		'ayar_maps'=>$_POST['ayar_maps'],
		'ayar_analystic'=>$_POST['ayar_analystic'],
		'ayar_zopim'=>$_POST['ayar_zopim']
	));

	if ($update) {
		header("Location:../production/api-ayarlar.php?durum=ok");
		exit;
	}else {
		header("Location:../production/api-ayarlar.php?durum=no");
		exit;
	}
}


/////////////// Sosyal Medya Ekleme //////////////
if (isset($_POST['smedyaekle'])){
	$smedyaekle=$db->prepare("INSERT INTO smedya SET
		smedya_ad=:smedya_ad,
		smedya_url=:smedya_url,
		smedya_class=:smedya_class,
		smedya_durum=:smedya_durum,
		smedya_sira=:smedya_sira ");
	$insert=$smedyaekle->execute(array(
		'smedya_ad'=>$_POST['smedya_ad'],
		'smedya_url'=>$_POST['smedya_url'],
		'smedya_class'=>$_POST['smedya_class'],
		'smedya_durum'=>$_POST['smedya_durum'],
		'smedya_sira'=>$_POST['smedya_sira'] ));
	if ($insert) {
		header("Location:../production/smedya.php?durum=ok");
		exit;
	}else {	
		header("Location:../production/smedya.php?durum=no");
		exit;
	}
}
///////////// smedya duzenleme ///////////////////////////
if (isset($_POST['smedyaduzenle'])){
	// Tablo Güncelleme işlem kodları
	$smedya_id=$_POST['smedya_id'];
	$smedyakaydet=$db->prepare("UPDATE smedya SET
		smedya_ad=:smedya_ad,
		smedya_url=:smedya_url,
		smedya_class=:smedya_class,
		smedya_sira=:smedya_sira,
		smedya_durum=:smedya_durum WHERE smedya_id= {$_POST['smedya_id']}");
	$update=$smedyakaydet->execute(array(
		'smedya_ad'=>$_POST['smedya_ad'],
		'smedya_url'=>$_POST['smedya_url'],
		'smedya_class'=>$_POST['smedya_class'],
		'smedya_sira'=>$_POST['smedya_sira'],
		'smedya_durum'=>$_POST['smedya_durum'] ));
	if ($update) {
		header("Location:../production/smedya.php?smedya_id=$smedya_id&durum=ok");
		exit;
	}else {	
		header("Location:../production/smedya-duzenle.php?smedya_id=$smedya_id&durum=no");
		exit;
	}
}
////////////// smedya silme ///////////////////////////
if ($_GET['smedyasil']=="ok"){
	islemkontrol(); 
	$smedya_id=$_POST['smedya_id'];
	$sil=$db->prepare("DELETE from smedya where smedya_id=:id");
	$kotrol=$sil->execute(array(
		'id'=> $_GET['smedya_id']
	));

	if ($kotrol) {
		header("Location:../production/smedya.php?sil=ok");
		exit;
	}else {	
		header("Location:../production/smedya.php?sil=no");
		exit;
	}
}







/////////////// iletisim Ekleme //////////////
if (isset($_POST['iletisimekle'])){
	$iletisimekle=$db->prepare("INSERT INTO iletisim SET
		iletisim_ad=:iletisim_ad,
		iletisim_icon=:iletisim_icon,
		iletisim_icerik=:iletisim_icerik,
		iletisim_url=:iletisim_url,
		iletisim_durum=:iletisim_durum,
		iletisim_sira=:iletisim_sira ");
	$insert=$iletisimekle->execute(array(
		'iletisim_ad'=>$_POST['iletisim_ad'],
		'iletisim_icon'=>$_POST['iletisim_icon'],
		'iletisim_icerik'=>$_POST['iletisim_icerik'],
		'iletisim_url'=>$_POST['iletisim_url'],
		'iletisim_durum'=>$_POST['iletisim_durum'],
		'iletisim_sira'=>$_POST['iletisim_sira'] ));
	if ($insert) {
		header("Location:../production/iletisim.php?durum=ok");
		exit;
	}else {	
		header("Location:../production/iletisim.php?durum=no");
		exit;
	}
}
///////////// iletisim duzenleme ///////////////////////////
if (isset($_POST['iletisimduzenle'])){
	// Tablo Güncelleme işlem kodları
	$iletisim_id=$_POST['iletisim_id'];
	$iletisimkaydet=$db->prepare("UPDATE iletisim SET
		iletisim_ad=:iletisim_ad,
		iletisim_icon=:iletisim_icon,
		iletisim_icerik=:iletisim_icerik,
		iletisim_url=:iletisim_url,
		iletisim_sira=:iletisim_sira,
		iletisim_durum=:iletisim_durum WHERE iletisim_id= {$_POST['iletisim_id']}");
	$update=$iletisimkaydet->execute(array(
		'iletisim_ad'=>$_POST['iletisim_ad'],
		'iletisim_icon'=>$_POST['iletisim_icon'],
		'iletisim_icerik'=>$_POST['iletisim_icerik'],
		'iletisim_url'=>$_POST['iletisim_url'],
		'iletisim_sira'=>$_POST['iletisim_sira'],
		'iletisim_durum'=>$_POST['iletisim_durum'] ));
	if ($update) {
		header("Location:../production/iletisim.php?iletisim_id=$iletisim_id&durum=ok");
		exit;
	}else {	
		header("Location:../production/iletisim-duzenle.php?iletisim_id=$iletisim_id&durum=no");
		exit;
	}
}
////////////// iletisim silme ///////////////////////////
if ($_GET['iletisimsil']=="ok"){
	islemkontrol(); 
	$iletisim_id=$_POST['iletisim_id'];
	$sil=$db->prepare("DELETE from iletisim where iletisim_id=:id");
	$kotrol=$sil->execute(array(
		'id'=> $_GET['iletisim_id']
	));

	if ($kotrol) {
		header("Location:../production/iletisim.php?sil=ok");
		exit;
	}else {	
		header("Location:../production/iletisim.php?sil=no");
		exit;
	}
}












///////////////// Mail Güncelleme /////////////
if (isset($_POST['mailayarkaydet'])) {
	$ayarkaydet=$db->prepare("UPDATE ayar SET
		ayar_smtphost=:ayar_smtphost,
		ayar_smtpuser=:ayar_smtpuser,
		ayar_smtppassword=:ayar_smtppassword,
		ayar_smtpport=:ayar_smtpport where ayar_id=0");
	$update=$ayarkaydet->execute(array(
		'ayar_smtphost'=>$_POST['ayar_smtphost'],
		'ayar_smtpuser'=>$_POST['ayar_smtpuser'],
		'ayar_smtppassword'=>$_POST['ayar_smtppassword'],
		'ayar_smtpport'=>$_POST['ayar_smtpport']
	));

	if ($update) {
		header("Location:../production/mail-ayarlar.php?durum=ok");
		exit;
	}else {
		header("Location:../production/mail-ayarlar.php?durum=no");
		exit;
	}
}




///////////////// Foter Güncelleme/////////////
if (isset($_POST['foterduzenle'])) {
	$foter_id=$_POST['foter_id'];
	$foter_seo=seo($_POST['foter_ad']);
	$foterkaydet=$db->prepare("UPDATE foter SET
		foter_ad=:foter_ad,
		foter_icerik=:foter_icerik,
		foter_seo=:foter_seo,
		foter_url=:foter_url,
		foter_durum=:foter_durum,
		foter_sira=:foter_sira,
		foter_grup=:foter_grup WHERE foter_id= {$_POST['foter_id']}");
	$update=$foterkaydet->execute(array(
		'foter_ad'=>$_POST['foter_ad'],
		'foter_icerik'=>$_POST['foter_icerik'],
		'foter_seo'=>$foter_seo,
		'foter_url'=>$_POST['foter_url'],
		'foter_durum'=>$_POST['foter_durum'],
		'foter_sira'=>$_POST['foter_sira'],
		'foter_grup'=>$_POST['foter_grup'] ));

	if ($update) {
		header("Location:../production/foter-duzenle.php?foter_id=$foter_id&durum=ok");
		exit;
	}else {
		header("Location:../production/foter-duzenle.php?foter_id=$foter_id&durum=no");
		exit;
	}
} 
//////////////// foter-Ekle ///////////////////7
if (isset($_POST['foterekle'])) {
	$foter_seo=seo($_POST['foter_ad']);	
	
	$kaydet=$db->prepare("INSERT INTO foter SET
		foter_ad=:foter_ad,
		foter_icerik=:foter_icerik,
		foter_seo=:foter_seo,
		foter_url=:foter_url,
		foter_durum=:foter_durum,
		foter_sira=:foter_sira,
		foter_grup=:foter_grup
		");
	$insert=$kaydet->execute(array(
		'foter_ad'=>$_POST['foter_ad'],
		'foter_icerik'=>$_POST['foter_icerik'],
		'foter_seo'=>$foter_seo,
		'foter_url'=>$_POST['foter_url'],
		'foter_durum'=>$_POST['foter_durum'],
		'foter_sira'=>$_POST['foter_sira'],
		'foter_grup'=>$_POST['foter_grup'] ));
	if ($insert) {
		Header("Location:../production/foter.php?durum=ok");
		exit;
	} else {
		Header("Location:../production/foter.php?durum=no");
		exit;
	}
} 
////////////// foter silme ///////////////////////////
if ($_GET['fotersil']=="ok"){
	islemkontrol(); 
	$foter_id=$_POST['foter_id'];
	$sil=$db->prepare("DELETE from foter where foter_id=:id");
	$kotrol=$sil->execute(array(
		'id'=> $_GET['foter_id']
	));

	if ($kotrol) {
		header("Location:../production/foter.php?sil=ok");
		exit;
	}else {
		header("Location:../production/foter.php?sil=no");
		exit;
	}
}




//////////////// Tanıtım Güncelleme/////////////
if (isset($_POST['tanitimduzenle'])) {
	$tanitim_id=$_POST['tanitim_id'];
	$tanitimkaydet=$db->prepare("UPDATE tanitim SET
		tanitim_ad=:tanitim_ad,
		tanitim_baslik=:tanitim_baslik,
		tanitim_icerik=:tanitim_icerik,
		tanitim_href=:tanitim_href,
		tanitim_icon=:tanitim_icon,
		tanitim_active=:tanitim_active,
		tanitim_sira=:tanitim_sira,
		tanitim_durum=:tanitim_durum WHERE tanitim_id= {$_POST['tanitim_id']}");
	$update=$tanitimkaydet->execute(array(
		'tanitim_ad'=> $_POST['tanitim_ad'],
		'tanitim_baslik'=> $_POST['tanitim_baslik'],
		'tanitim_icerik'=> $_POST['tanitim_icerik'],
		'tanitim_href'=> $_POST['tanitim_href'],
		'tanitim_icon'=> $_POST['tanitim_icon'],
		'tanitim_active'=> $_POST['tanitim_active'],
		'tanitim_sira'=> $_POST['tanitim_sira'],
		'tanitim_durum'=> $_POST['tanitim_durum'] ));
	if ($update) {
		header("Location:../production/tanitim-duzenle.php?tanitim_id=$tanitim_id&durum=ok");
		exit;
	}else {
		header("Location:../production/tanitim-duzenle.php?tanitim_id=$tanitim_id&durum=no");
		exit;
	}
}
//////////////// tanitim-Ekle ///////////////////7
if (isset($_POST['tanitimekle'])) {

	$kaydet=$db->prepare("INSERT INTO tanitim SET
		tanitim_ad=:tanitim_ad,
		tanitim_baslik=:tanitim_baslik,
		tanitim_icerik=:tanitim_icerik,
		tanitim_href=:tanitim_href,
		tanitim_icon=:tanitim_icon,
		tanitim_active=:tanitim_active,
		tanitim_sira=:tanitim_sira,
		tanitim_durum=:tanitim_durum
		");
	$insert=$kaydet->execute(array(
		'tanitim_ad'=> $_POST['tanitim_ad'],
		'tanitim_baslik'=> $_POST['tanitim_baslik'],
		'tanitim_icerik'=> $_POST['tanitim_icerik'],
		'tanitim_href'=> $_POST['tanitim_href'],
		'tanitim_icon'=> $_POST['tanitim_icon'],
		'tanitim_active'=> $_POST['tanitim_active'],
		'tanitim_sira'=> $_POST['tanitim_sira'],
		'tanitim_durum'=> $_POST['tanitim_durum'] ));
	if ($insert) {
		Header("Location:../production/tanitim.php?durum=ok");
		exit;
	} else {
		Header("Location:../production/tanitim-ekle.php?durum=no");
		exit;
	}
} 
////////////// tanitim silme ///////////////////////////
if ($_GET['tanitimsil']=="ok"){
	islemkontrol(); 
	$tanitim_id=$_POST['tanitim_id'];
	$sil=$db->prepare("DELETE from tanitim where tanitim_id=:id");
	$kotrol=$sil->execute(array(
		'id'=> $_GET['tanitim_id']
	));

	if ($kotrol) {
		header("Location:../production/tanitim.php?sil=ok");
		exit;
	}else {
		header("Location:../production/tanitim.php?sil=no");
		exit;
	}
}









//////////////// Ekip-Ekle ///////////////////7
if (isset($_POST['ekipekle'])) {
	
	exit();
	if (empty($_FILES['ekip_resimyol']["name"])) {
		Header("Location:../production/ekip-ekle.php?durum=hata");
		exit;
	} 

	if ($_FILES['ekip_resimyol']['size']>2097152) {
		Header("Location:../production/ekip-ekle.php?durum=dosyabuyuk");
		exit;
	}

	$izinli_uzantılar=array('jpg','gif','png');

	$ext=strtolower(substr($_FILES['ekip_resimyol']["name"],strpos($_FILES['ekip_resimyol']["name"],'.')+1));
	if (in_array($ext,$izinli_uzantılar) === false) {
		Header("Location:../production/ekip-ekle.php?durum=formathatali");
		exit;
	}

	$ekip_icon=$_POST['ekip_icon0'].",".$_POST['ekip_icon1'].",".$_POST['ekip_icon2'];
	$ekip_url=$_POST['ekip_url0'].",".$_POST['ekip_url1'].",".$_POST['ekip_url2'];

	$uploads_dir = '../../dimg/ekip';
	@$tmp_name = $_FILES['ekip_resimyol']["tmp_name"];
	@$name = $_FILES['ekip_resimyol']["name"];
	//resmin isminin benzersiz olması için
	$benzersizsayi1=rand(20000,32000);
	$benzersizsayi2=rand(20000,32000);
	$benzersizsayi3=rand(20000,32000);
	$benzersizsayi4=rand(20000,32000);
	$benzersizad=$benzersizsayi1.$benzersizsayi2.$benzersizsayi3.$benzersizsayi4;

	$refimgyol=substr($uploads_dir, 6)."/".$benzersizad.$name;
	@move_uploaded_file($tmp_name, "$uploads_dir/$benzersizad$name");

	echo $refimgyol;
	exit();
	$kaydet=$db->prepare("INSERT INTO ekip SET
		ekip_adsoyad=:ekip_adsoyad,
		ekip_unvani=:ekip_unvani,
		ekip_icon=:ekip_icon,
		ekip_url=:ekip_url,
		ekip_sira=:ekip_sira,
		ekip_durum=:ekip_durum,
		ekip_resimyol=:ekip_resimyol
		");

	$insert=$kaydet->execute(array(
		'ekip_adsoyad'=> $_POST['ekip_adsoyad'],
		'ekip_unvani'=> $_POST['ekip_unvani'],
		'ekip_icon'=> $ekip_icon,
		'ekip_url'=> $ekip_url,
		'ekip_sira'=> $_POST['ekip_sira'],
		'ekip_durum'=> $_POST['ekip_durum'],
		'ekip_resimyol'=> $refimgyol
	));
	if ($insert) {
		Header("Location:../production/ekip.php?durum=ok");
		exit;
	} else {
		Header("Location:../production/ekip-ekle.php?durum=no");
		exit;
	}
}
////////////// ekip silme ///////////////////////////
if ($_GET['ekipsil']=="ok"){
	islemkontrol(); 
	$ekipsor=$db->prepare("SELECT * FROM ekip where ekip_id={$_GET['ekip_id']}");
	$ekipsor->execute();
	$ekipcek=$ekipsor->fetch(PDO::FETCH_ASSOC);
	$resimsilunlink=$ekipcek['ekip_resimyol'];



	$ekip_id=$_POST['ekip_id'];
	$sil=$db->prepare("DELETE from ekip where ekip_id=:id");
	$kotrol=$sil->execute(array(
		'id'=> $_GET['ekip_id']
	));

	if ($kotrol) {
		unlink("../../$resimsilunlink");
		header("Location:../production/ekip.php?sil=ok");
		exit;
	}else {
		header("Location:../production/ekip.php?sil=no");
		exit;
	}
}
////////////// Ekip duzenleme ///////////////////////////
if (isset($_POST['ekipduzenle'])){
	$ekip_id=$_POST['ekip_id'];
	if ($_FILES['ekip_resimyol']['size']>0) {
		if ($_FILES['ekip_resimyol']['size']>2097152) {
			Header("Location:../production/ekip-duzenle.php?ekip_id=$ekip_id&durum=dosyabuyuk");
			exit;
		}
		$izinli_uzantılar=array('jpg','gif','png');
		$ext=strtolower(substr($_FILES['ekip_resimyol']["name"],strpos($_FILES['ekip_resimyol']["name"],'.')+1));
		if (in_array($ext,$izinli_uzantılar) === false) {
			Header("Location:../production/ekip-duzenle.php?ekip_id=$ekip_id&durum=formathatali");
			exit;
		}
		$uploads_dir = '../../dimg/ekip';
		@$tmp_name = $_FILES['ekip_resimyol']["tmp_name"];
		@$name = $_FILES['ekip_resimyol']["name"];
		$benzersizsayi1=rand(20000,32000);
		$benzersizsayi2=rand(20000,32000);
		$benzersizsayi3=rand(20000,32000);
		$benzersizsayi4=rand(20000,32000);
		$benzersizad=$benzersizsayi1.$benzersizsayi2.$benzersizsayi3.$benzersizsayi4;
		$refimgyol=substr($uploads_dir, 6)."/".$benzersizad.$name;
		@move_uploaded_file($tmp_name, "$uploads_dir/$benzersizad$name");
		$ekip_icon=$_POST['ekip_icon0'].",".$_POST['ekip_icon1'].",".$_POST['ekip_icon2'];
		$ekip_url=$_POST['ekip_url0'].",".$_POST['ekip_url1'].",".$_POST['ekip_url2'];
		$ekipkaydet=$db->prepare("UPDATE ekip SET
			ekip_adsoyad=:ekip_adsoyad,
			ekip_unvani=:ekip_unvani,
			ekip_icon=:ekip_icon,
			ekip_url=:ekip_url,
			ekip_sira=:ekip_sira,
			ekip_resimyol=:ekip_resimyol,
			ekip_durum=:ekip_durum WHERE ekip_id= {$_POST['ekip_id']}");
		$update=$ekipkaydet->execute(array(
			'ekip_adsoyad'=> $_POST['ekip_adsoyad'],
			'ekip_unvani'=> $_POST['ekip_unvani'],
			'ekip_icon'=> $ekip_icon,
			'ekip_url'=> $ekip_url,
			'ekip_sira'=> $_POST['ekip_sira'],
			'ekip_resimyol' => $refimgyol,
			'ekip_durum'=> $_POST['ekip_durum'] ));
		if ($update) {
			$resimsilunlink=$_POST['eski_yol'];
			unlink("../../$resimsilunlink");
			Header("Location:../production/ekip-duzenle.php?ekip_id=$ekip_id&durum=ok");
			exit();
		} else {
			Header("Location:../production/ekip-duzenle.php?ekip_id=$ekip_id&durum=no");
			exit();
		}
	} else {
		$ekip_icon=$_POST['ekip_icon0'].",".$_POST['ekip_icon1'].",".$_POST['ekip_icon2'];
		$ekip_url=$_POST['ekip_url0'].",".$_POST['ekip_url1'].",".$_POST['ekip_url2'];
		$ekipkaydet=$db->prepare("UPDATE ekip SET
			ekip_adsoyad=:ekip_adsoyad,
			ekip_unvani=:ekip_unvani,
			ekip_icon=:ekip_icon,
			ekip_url=:ekip_url,
			ekip_sira=:ekip_sira,
			ekip_durum=:ekip_durum WHERE ekip_id= {$_POST['ekip_id']}");
		$update=$ekipkaydet->execute(array(
			'ekip_adsoyad'=> $_POST['ekip_adsoyad'],
			'ekip_unvani'=> $_POST['ekip_unvani'],
			'ekip_icon'=> $ekip_icon,
			'ekip_url'=> $ekip_url,
			'ekip_sira'=> $_POST['ekip_sira'],
			'ekip_durum'=> $_POST['ekip_durum'] ));
		if ($update) {
			Header("Location:../production/ekip-duzenle.php?ekip_id=$ekip_id&durum=ok");
			exit();
		} else {
			Header("Location:../production/ekip-duzenle.php?ekip_id=$ekip_id&durum=no");
			exit();
		}
	}
}
//////////////////// Ekip Genel Açıklama /////////////
if (isset($_POST['ekipaciklama'])) {

	$kaydet=$db->prepare("UPDATE ayar SET	
		ayar_ekip_aciklama=:ayar_ekip_aciklama where ayar_id=0 ");

	$insert=$kaydet->execute(array(
		'ayar_ekip_aciklama'=> $_POST['ayar_ekip_aciklama'] ));
	if ($insert) {
		Header("Location:../production/ekip-aciklama.php?durum=ok");
		exit;
	} else {
		Header("Location:../production/ekip-aciklama.php?durum=no");
		exit;
	}
}






































//////////////// Urun-Ekle ///////////////////7
if (isset($_POST['urunekle'])) {
	$urun_seo=seo($_POST['urun_ad']);

	
	
	if (empty($_FILES['urun_resimyol']["name"])) {
		Header("Location:../production/urun-ekle.php?durum=hata");
		exit;
	} 
	if ($_FILES['urun_resimyol']['size']>2097152) {
		Header("Location:../production/urun-ekle.php?durum=dosyabuyuk");
		exit;
	}
	$izinli_uzantılar=array('jpg','gif','png');
	$ext=strtolower(substr($_FILES['urun_resimyol']["name"],strpos($_FILES['urun_resimyol']["name"],'.')+1));
	if (in_array($ext,$izinli_uzantılar) === false) {
		Header("Location:../production/urun-ekle.php?durum=formathatali");
		exit;
	}
	$uploads_dir = '../../dimg/urun';
	@$tmp_name = $_FILES['urun_resimyol']["tmp_name"];
	@$name = $_FILES['urun_resimyol']["name"];
	//resmin isminin benzersiz olması için
	$benzersizsayi1=rand(20000,32000);
	$benzersizsayi2=rand(20000,32000);
	$benzersizsayi3=rand(20000,32000);
	$benzersizsayi4=rand(20000,32000);
	$benzersizad=$benzersizsayi1.$benzersizsayi2.$benzersizsayi3.$benzersizsayi4;
	$refimgyol=substr($uploads_dir, 6)."/".$benzersizad.$name;
	@move_uploaded_file($tmp_name, "$uploads_dir/$benzersizad$name");

	$kaydet=$db->prepare("INSERT INTO urun SET
		urun_ad=:urun_ad,
		urun_resimyol=:urun_resimyol,
		urun_seo=:urun_seo,
		urun_fiyat=:urun_fiyat,
		kategori_id=:kategori_id,
		alt_kategori_id=:alt_kategori_id,
		urun_sira=:urun_sira,
		urun_durum=:urun_durum
		");
	$insert=$kaydet->execute(array(
		'urun_ad'=> $_POST['urun_ad'],
		'urun_resimyol'=> $refimgyol,
		'urun_seo'=> $urun_seo,
		'urun_fiyat'=>$_POST['urun_fiyat'],
		'kategori_id'=>$_POST['kategori_id'],
		'alt_kategori_id'=>$_POST['alt_kategori_id'],
		'urun_sira'=> $_POST['urun_sira'],
		'urun_durum'=> $_POST['urun_durum']
	));
	if ($insert) {
		Header("Location:../production/urun.php?durum=ok");
		exit;
	} else {
		Header("Location:../production/urun.php?durum=no");
		exit;
	}

}
////////////// urun silme ///////////////////////////
if ($_GET['urunsil']=="ok"){
	islemkontrol(); 
	$urun_id=$_POST['urun_id'];
	$urunsor=$db->prepare("SELECT * FROM urun where urun_id={$_GET['urun_id']}");
	$urunsor->execute();
	$uruncek=$urunsor->fetch(PDO::FETCH_ASSOC);
	$resimsilunlink=$uruncek['urun_resimyol'];
	$sil=$db->prepare("DELETE from urun where urun_id=:id");
	$kotrol=$sil->execute(array(
		'id'=> $_GET['urun_id']
	));
	if ($kotrol) {
		unlink("../../$resimsilunlink");
		header("Location:../production/urun.php?sil=ok");
		exit;
	}else {
		header("Location:../production/urun.php?sil=no");
		exit;
	}
}
////////////// urun duzenleme ///////////////////////////
if (isset($_POST['urunduzenle'])){
	$urun_id=$_POST['urun_id'];
	if ($_FILES['urun_resimyol']['size']>0) {
		if ($_FILES['urun_resimyol']['size']>2097152) {
			Header("Location:../production/urun-duzenle.php?urun_id=$urun_id&durum=dosyabuyuk");
			exit;
		}
		$izinli_uzantılar=array('jpg','gif','png');
		$ext=strtolower(substr($_FILES['urun_resimyol']["name"],strpos($_FILES['urun_resimyol']["name"],'.')+1));
		if (in_array($ext,$izinli_uzantılar) === false) {
			Header("Location:../production/urun-duzenle.php?urun_id=$urun_id&durum=formathatali");
			exit;
		}
		$uploads_dir = '../../dimg/urun';
		@$tmp_name = $_FILES['urun_resimyol']["tmp_name"];
		@$name = $_FILES['urun_resimyol']["name"];
		$benzersizsayi1=rand(20000,32000);
		$benzersizsayi2=rand(20000,32000);
		$benzersizsayi3=rand(20000,32000);
		$benzersizsayi4=rand(20000,32000);
		$benzersizad=$benzersizsayi1.$benzersizsayi2.$benzersizsayi3.$benzersizsayi4;
		$refimgyol=substr($uploads_dir, 6)."/".$benzersizad.$name;
		@move_uploaded_file($tmp_name, "$uploads_dir/$benzersizad$name");
		$urunkaydet=$db->prepare("UPDATE urun SET
			urun_ad=:urun_ad,
			urun_yazi=:urun_yazi,
			urun_sira=:urun_sira,
			urun_resimyol=:urun_resimyol,
			urun_durum=:urun_durum WHERE urun_id= {$_POST['urun_id']}");
		$update=$urunkaydet->execute(array(
			'urun_ad'=> $_POST['urun_ad'],
			'urun_yazi'=> $_POST['urun_yazi'],
			'urun_sira'=> $_POST['urun_sira'],
			'urun_resimyol' => $refimgyol,
			'urun_durum'=> $_POST['urun_durum']));
		if ($update) {
			$resimsilunlink=$_POST['eski_yol'];
			unlink("../../$resimsilunlink");
			Header("Location:../production/urun-duzenle.php?urun_id=$urun_id&durum=ok");
			exit();
		} else {
			Header("Location:../production/urun-duzenle.php?urun_id=$urun_id&durum=no");
			exit();
		}
	} else {
		$urunkaydet=$db->prepare("UPDATE urun SET
			urun_ad=:urun_ad,
			urun_yazi=:urun_yazi,
			urun_sira=:urun_sira,
			urun_durum=:urun_durum WHERE urun_id= {$_POST['urun_id']}");
		$update=$urunkaydet->execute(array(
			'urun_ad'=> $_POST['urun_ad'],
			'urun_yazi'=> $_POST['urun_yazi'],
			'urun_sira'=> $_POST['urun_sira'],
			'urun_durum'=> $_POST['urun_durum']));
		if ($update) {
			header("Location:../production/urun-duzenle.php?urun_id=$urun_id&durum=ok");
			exit;
		}else {	
			header("Location:../production/urun-duzenle.php?urun_id=$urun_id&durum=no");
			exit;
		}
	}
}

































//////////////// kategori-ekle ///////////////////
if (isset($_POST['kategoriekle'])) {
	$kategori_seo=seo($_POST['kategori_ad']);

	$kategorisor=$db->prepare("SELECT kategori_id FROM kategori");
	$kategorisor->execute();
    $say=$kategorisor->rowCount();

	if ($_POST['kategori_aile']==0) {

		if ($_FILES['kategori_icon']['size']>1048576) {
			Header("Location:../production/kategori-ekle.php?durum=dosyabuyuk");
			exit;
		}
		$izinli_uzantılar=array('jpg','gif','png');
		$ext=strtolower(substr($_FILES['kategori_icon']["name"],strpos($_FILES['kategori_icon']["name"],'.')+1));
		if (in_array($ext,$izinli_uzantılar) === false) {
			Header("Location:../production/kategori-ekle.php?durum=formathatali");
			exit;
		}
		$uploads_dir = '../../dimg/icon';
		@$tmp_name = $_FILES['kategori_icon']["tmp_name"];
		@$name = $_FILES['kategori_icon']["name"];
		$benzersizsayi4=rand(20000,32000);
		$refimgyol=substr($uploads_dir, 6)."/".$benzersizsayi4.$name;
		@move_uploaded_file($tmp_name, "$uploads_dir/$benzersizsayi4$name");

		$kaydet=$db->prepare("INSERT INTO kategori SET
			kategori_ad=:kategori_ad,
			kategori_seo=:kategori_seo,
			kategori_icon=:kategori_icon,
			kategori_durum=:kategori_durum,
			kategori_sira=:kategori_sira
			");
		$insert=$kaydet->execute(array(
			'kategori_ad'=> $_POST['kategori_ad'],
			'kategori_seo'=> $kategori_seo,
			'kategori_icon'=> $refimgyol, 
			'kategori_durum'=> $_POST['kategori_durum'],
			'kategori_sira'=> $say+1
		));

		if ($insert) {
		Header("Location:../production/kategori-ekle.php?durum=ok");
		exit;
	} else {
		Header("Location:../production/kategori-ekle.php?durum=no");
		exit;
	}

		
	} else {


		$kaydet=$db->prepare("INSERT INTO kategori SET
			kategori_ad=:kategori_ad,
			kategori_seo=:kategori_seo,
			kategori_aile=:kategori_aile,
			kategori_durum=:kategori_durum,
			kategori_sira=:kategori_sira

			");
		$insert=$kaydet->execute(array(
			'kategori_ad'=> $_POST['kategori_ad'],
			'kategori_seo'=> $kategori_seo,
			'kategori_aile'=> $_POST['kategori_aile'], 
			'kategori_durum'=> $_POST['kategori_durum'],
			'kategori_sira'=> $say+1
		));

		if ($insert) {
			Header("Location:../production/kategori-ekle.php?durum=ok");
			exit;
		} else {
			Header("Location:../production/kategori-ekle.php?durum=no");
			exit;
		}







	}
	
	
	
}
////////////// kategori silme ///////////////////////////
if ($_GET['kategorisil']=="ok"){
	islemkontrol(); 
	$kategorisor=$db->prepare("SELECT * FROM kategori where kategori_id={$_GET['kategori_id']}");
	$kategorisor->execute();
	$kategoricek=$kategorisor->fetch(PDO::FETCH_ASSOC);
	$kategori_id=$_POST['kategori_id'];
	$sil=$db->prepare("DELETE from kategori where kategori_id=:id");
	$kotrol=$sil->execute(array(
		'id'=> $_GET['kategori_id']
	));

	if ($kotrol) {
		header("Location:../production/kategori.php?sil=ok");
		exit;
	}else {
		header("Location:../production/kategori.php?sil=no");
		exit;
	}
}



////////////// kategori duzenleme ///////////////////////////
if (isset($_POST['kategoriduzenle'])){
	$kategori_seo=seo($_POST['kategori_ad']);
	$kategori_id=$_POST['kategori_id'];


	if ($_POST['kategori_aile']==0) {
		$kategorikaydet=$db->prepare("UPDATE kategori SET
			kategori_ad=:kategori_ad,
			kategori_seo=:kategori_seo,
			kategori_aile=:kategori_aile,
			kategori_durum=:kategori_durum
			WHERE kategori_id= {$_POST['kategori_id']}");
		$update=$kategorikaydet->execute(array(
			'kategori_ad'=> $_POST['kategori_ad'],
			'kategori_seo'=> $kategori_seo,
			'kategori_aile'=> $_POST['kategori_aile'],
			'kategori_durum'=> $_POST['kategori_durum']
		));
		if ($update) {
			header("Location:../production/kategori-duzenle.php?kategori_id=$kategori_id&durum=ok");
			exit;
		}else {	
			header("Location:../production/kategori-duzenle.php?kategori_id=$kategori_id&durum=no");
			exit;
		}

	} else {

		              

		$kategorikaydet=$db->prepare("UPDATE kategori SET
			kategori_ad=:kategori_ad,
			kategori_seo=:kategori_seo,
			kategori_aile=:kategori_aile,
			kategori_durum=:kategori_durum WHERE kategori_id= {$_POST['kategori_id']}");
		$update=$kategorikaydet->execute(array(
			'kategori_ad'=> $_POST['kategori_ad'],
			'kategori_seo'=> $kategori_seo,
			'kategori_aile'=> $_POST['kategori_aile2'],
			'kategori_durum'=> $_POST['kategori_durum']
		));
		if ($update) {
			header("Location:../production/kategori-duzenle.php?kategori_id=$kategori_id&durum=ok");
			exit;
		}else {	
			header("Location:../production/kategori-duzenle.php?kategori_id=$kategori_id&durum=no");
			exit;
		}







	}
	
}








?>
