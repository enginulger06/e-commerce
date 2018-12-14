<?php 
ob_start();
session_start();
date_default_timezone_set('Europe/Istanbul');
include 'nedmin/netting/baglan.php';
//Ayar Tablosundan Site Ayarlarımızı Çekiyoruz
$ayarsor=$db->prepare("SELECT * FROM ayar where ayar_id=:id");
$ayarsor->execute(array(
  'id' => 0
));
$ayarcek=$ayarsor->fetch(PDO::FETCH_ASSOC);

?>

<!DOCTYPE html>
<html lang="en">

<head>


   <meta charset="UTF-8">
   <meta name="description" content="<?php echo $ayarcek['ayar_description'] ?>">
   <meta name="author" content="<?php echo $ayarcek['ayar_author'] ?>">
   <meta name="keywords" content="<?php echo $ayarcek['ayar_keywords'] ?>">


   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
 <!-- The above 4 meta tags *must* come first in the head; any other head content must come *after* these tags 
 -->
 <!-- -->
 <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/meyer-reset/2.0/reset.min.css">

 <!-- Title  -->
 <title><?php echo $ayarcek['ayar_title']; ?></title>

 <!-- Favicon  -->
 <link rel="icon" href="<?php echo $ayarcek['ayar_favicon']; ?>">

 <!-- Core Style CSS -->
 <link rel="stylesheet" href="css/core-style3.css">
 <link rel="stylesheet" href="style1.css">

 <!-- Responsive CSS -->
 <link href="css/responsive3.css" rel="stylesheet">


 <!-- Ck Editör -->
 <script src="https://cdn.ckeditor.com/4.11.1/standard/ckeditor.js"></script>





</head>

<body>
    <div class="catagories-side-menu">
        <!-- Close Icon -->
        <div id="sideMenuClose">
            <i class="ti-close"></i>
        </div>
        <!--  Side Nav  -->
        <div class="nav-side-menu">
            <div class="menu-list">
                <h6>Categories</h6>
                <ul id="menu-content" class="menu-content collapse out">
                    <!-- Single Item -->
                    <li data-toggle="collapse" data-target="#women" class="collapsed active">
                        <a href="#">Woman wear <span class="arrow"></span></a>
                        <ul class="sub-menu collapse" id="women">
                            <li><a href="#">Midi Dresses</a></li>
                            <li><a href="#">Maxi Dresses</a></li>
                            <li><a href="#">Prom Dresses</a></li>
                            <li><a href="#">Little Black Dresses</a></li>
                            <li><a href="#">Mini Dresses</a></li>
                        </ul>
                    </li>
                    <!-- Single Item -->
                    <li data-toggle="collapse" data-target="#man" class="collapsed">
                        <a href="#">Man Wear <span class="arrow"></span></a>
                        <ul class="sub-menu collapse" id="man">
                            <li><a href="#">Man Dresses</a></li>
                            <li><a href="#">Man Black Dresses</a></li>
                            <li><a href="#">Man Mini Dresses</a></li>
                        </ul>
                    </li>
                    <!-- Single Item -->
                    <li data-toggle="collapse" data-target="#kids" class="collapsed">
                        <a href="#">Children <span class="arrow"></span></a>
                        <ul class="sub-menu collapse" id="kids">
                            <li><a href="#">Children Dresses</a></li>
                            <li><a href="#">Mini Dresses</a></li>
                        </ul>
                    </li>
                    <!-- Single Item -->
                    <li data-toggle="collapse" data-target="#bags" class="collapsed">
                        <a href="#">Bags &amp; Purses <span class="arrow"></span></a>
                        <ul class="sub-menu collapse" id="bags">
                            <li><a href="#">Bags</a></li>
                            <li><a href="#">Purses</a></li>
                        </ul>
                    </li>
                    <!-- Single Item -->
                    <li data-toggle="collapse" data-target="#eyewear" class="collapsed">
                        <a href="#">Eyewear <span class="arrow"></span></a>
                        <ul class="sub-menu collapse" id="eyewear">
                            <li><a href="#">Eyewear Style 1</a></li>
                            <li><a href="#">Eyewear Style 2</a></li>
                            <li><a href="#">Eyewear Style 3</a></li>
                        </ul>
                    </li>
                    <!-- Single Item -->
                    <li data-toggle="collapse" data-target="#footwear" class="collapsed">
                        <a href="#">Footwear <span class="arrow"></span></a>
                        <ul class="sub-menu collapse" id="footwear">
                            <li><a href="#">Footwear 1</a></li>
                            <li><a href="#">Footwear 2</a></li>
                            <li><a href="#">Footwear 3</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </div>

    

    <div id="wrapper">

        <!-- ****** Header Area Start ****** -->
        <header class="header_area ">
            <!-- Top Header Area Start -->
            <div class="top_header_area">
                <div class="container-fluid h-100">

                    <div class="row h-100 align-items-start justify-content-end ">

                        <div class="col-12 col-lg-12">
                            <div class="top_single_area d-flex align-items-center ">
                                <!-- Logo Area -->
                                <div class="top_logo ml-2">
                                    <a href="#"><img src="<?php echo $ayarcek['ayar_logo']; ?>" alt=""></a>
                                </div>

                                <!-- Search -->
                                <div class="header_search">
                                    <form action="#" id="header_search_form">
                                        <input type="text" class="search_input" placeholder="Search Item" required="required">
                                        <button class="header_search_button"><img src="img/search.png" alt=""></button>
                                    </form>
                                </div>

                                <!-- Cart & Menu Area -->
                                <div class="header-cart-menu d-flex align-items-center mt-1 ml-auto">

                                <div class="menu_btn mr-15 d-none d-sm-none d-md-block">
                                   
                                <button class="btn btn-outline-dark btn-sm p3" type="button" id="formButton" style="border-radius: 10px;">Giriş</button>


                                 <button class="btn btn-outline-dark btn-sm" type="button"  style="border-radius: 10px;"><i class="fa fa-camera" style="padding-right: 8px;"></i>Yükle</button>
                                </div>



<div class="overlay">
</div>
<div class="main-popup">
  <div class="popup-header">
    <div id="popup-close-button"><a href="#"></a></div>
    <ul>
      <li><a href="#" id="sign-in">Giriş</a></li>
      <li><a href="#" id="register">Kayıt Ol</a></li>
    </ul>
  </div><!--.popup-header-->
  <div class="popup-content">
    <form action="nedmin/netting/islem.php" method="POST" class="sign-in">
      <label for="email">Email:</label>
      <input type="text" id="email" name="kullanici_mail">
      <label for="password">Şifre:</label>
      <input type="password" id="password" name="kullanici_password">
      <p class="check-mark">
        <input type="checkbox" id="remember-me" name="kullanici_hatirla" value="1">
        <label for="remember-me">Beni Hatırla</label>
      </p>
      <button type="submit" id="submit" style="background-color: #ceaee8;color: #fff;height: 50px;width: 90%;margin-left: 5%;margin-right: 5%;margin-top: 25px;padding: 0;cursor: pointer;outline: none;border-radius: 5px;font-size: 1em;border: none;" name="girisyap">Giriş Yap</button> 

    </form>
   
    <form action="nedmin/netting/islem.php" method="POST" class="register">
      <label for="email-register">Email: 
        <?php 
        if ($_GET['durum']=="kayit_ok"){?>
        <b style="color: green;"> İşlem Başarılı...</b>
        <?php } elseif ($_GET['durum']=="kayit_no") { ?>
        <b style="color:red;"> İşlem Başarısız...</b>
        <?php } elseif ($_GET['durum']=="kayit_farklisifre") { ?>
        <b style="color:red;"> Hata! Girdiğiniz şifreler eşleşmiyor.</b>
        <?php } ?>
      </label>
      <input type="email" name="kullanici_mail" id="email-register">
      <label for="password-register">Şifre:</label>
      <input type="password" name="kullanici_passwordone" id="password-register">
      <label for="password-confirmation">Tekrar Şifre:</label>
      <input type="password" name="kullanici_passwordtwo" id="password-confirmation">
      <p class="check-mark">
        <input type="checkbox" name="sartlar" id="accept-terms">
        <label for="accept-terms">Şartları kabul ediyorum<a href="#"> Oku</a></label>
      </p>
      <button type="submit" id="submit" style="background-color: #ceaee8;color: #fff;height: 50px;width: 90%;margin-left: 5%;margin-right: 5%;padding: 0;cursor: pointer;outline: none;border-radius: 5px;font-size: 1em;border: none;" name="kayitol">Kayıt Ol</button>

    </form>
  </div><!--.popup-content-->
</div><!--.main-popup-->
                              <!-- Cart Area -->
                              <div class="cart">
                                <a href="#" id="header-cart-btn" target="_blank"><span class="cart_quantity">2</span> <i class="ti-bag"></i> Your Bag $20</a>
                                <!-- Cart List Area Start -->
                                <ul class="cart-list">
                                    <li>
                                        <a href="#" class="image"><img src="img/product-img/product-10.jpg" class="cart-thumb" alt=""></a>
                                        <div class="cart-item-desc">
                                            <h6><a href="#">Women's Fashion</a></h6>
                                            <p>1x - <span class="price">$10</span></p>
                                        </div>
                                        <span class="dropdown-product-remove"><i class="icon-cross"></i></span>
                                    </li>
                                    <li>
                                        <a href="#" class="image"><img src="img/product-img/product-11.jpg" class="cart-thumb" alt=""></a>
                                        <div class="cart-item-desc">
                                            <h6><a href="#">Women's Fashion</a></h6>
                                            <p>1x - <span class="price">$10</span></p>
                                        </div>
                                        <span class="dropdown-product-remove"><i class="icon-cross"></i></span>
                                    </li>
                                    <li class="total">
                                        <span class="pull-right">Total: $20.00</span>
                                        <a href="cart.html" class="btn btn-sm btn-cart">Cart</a>
                                        <a href="checkout-1.html" class="btn btn-sm btn-checkout">Checkout</a>
                                    </li>
                                </ul>
                            </div>

                            <div class="header-right-side-menu ml-15">
                                <a href="#" id="sideMenuBtn"><i class="ti-menu" aria-hidden="true"></i></a>
                            </div>

                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</header>
<!-- ****** Header Area End ****** -->


