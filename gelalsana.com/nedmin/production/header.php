<?php 
ob_start();
session_start();
include 'foksiyon.php';
include '../netting/baglan.php';
///// Belirli veriyi seçme işlemi//////////7
$ayarsor=$db->prepare("SELECT * FROM ayar where ayar_id=:id");
$ayarsor->execute(array(
  'id'=> 0
));
$ayarcek=$ayarsor->fetch(PDO::FETCH_ASSOC);


////////////////kullanici tablosundan SESSİON daki bilgileri getir. //////////////////
$kullanicisor=$db->prepare("SELECT * FROM kullanici where kullanici_mail=:mail");
$kullanicisor->execute(array(
  'mail'=> $_SESSION["kullanici_mail"]
));
$say=$kullanicisor->rowCount(); // Eğer kullanıcı oturumda varsa say değeri 1 olacak değilse 0.
$kullanicicek=$kullanicisor->fetch(PDO::FETCH_ASSOC);
// Sıfır olduğu için bu izinsiz giriş demektir yönlendirme ile engellenmiş olacak.
if ($say==0) {
  header("Location:login.php?durum=izinsiz");
  exit;
}

?>
  

<!DOCTYPE html>
<html lang="en">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <!-- Meta, title, CSS, favicons, etc. -->
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <title>Engin ÜLGER</title>

  <!-- Bootstrap -->
  <link href="../vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
  <!-- Font Awesome -->
  <link href="../vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
  <!-- NProgress -->
  <link href="../vendors/nprogress/nprogress.css" rel="stylesheet">
  <!-- iCheck -->
  <link href="../vendors/iCheck/skins/flat/green.css" rel="stylesheet">
  <!-- Datatables -->
  <link href="../vendors/datatables.net-bs/css/dataTables.bootstrap.min.css" rel="stylesheet">
  <link href="../vendors/datatables.net-buttons-bs/css/buttons.bootstrap.min.css" rel="stylesheet">
  <link href="../vendors/datatables.net-fixedheader-bs/css/fixedHeader.bootstrap.min.css" rel="stylesheet">
  <link href="../vendors/datatables.net-responsive-bs/css/responsive.bootstrap.min.css" rel="stylesheet">
  <link href="../vendors/datatables.net-scroller-bs/css/scroller.bootstrap.min.css" rel="stylesheet">


  <!-- Ck Editor admin panalinde yazıları sekillerdirme -->
  <script src="https://cdn.ckeditor.com/4.8.0/standard/ckeditor.js"></script>

  <script src="https://ajax.aspnetcdn.com/ajax/jQuery/jquery-3.3.1.min.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script> 


  <script src="http://code.jquery.com/jquery-1.10.1.min.js"></script>


  <!-- Custom Theme Style -->
  <link href="../build/css/custom.min.css" rel="stylesheet">
</head>


<?php
$gender = $_REQUEST['kategori_id'];
$a= $_POST['kategori_id'];
?>




<body class="nav-md">
  <div class="container body">
    <div class="main_container">
      <div class="col-md-3 left_col">
        <div class="left_col scroll-view">
          <div class="navbar nav_title" style="border: 0;">
            <a href="index.php" class="site_title"><i class="fa fa-paw"></i> <span>Gentelella Alela!</span></a>
          </div>

          <div class="clearfix"></div>

          <!-- menu profile quick info -->
          <div class="profile clearfix">
            <div class="profile_pic">
              <img src="images/img.jpg" alt="profile_img" class="img-circle profile_img">

            </div>
            <div class="profile_info">
              <span>Hoşgeldin</span>
              <h2><?php echo $kullanicicek['kullanici_adsoyad']; ?></h2>
            </div>
          </div>
          <!-- /menu profile quick info -->

          <br />

          <!-- sidebar menu -->
          <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
            <div class="menu_section">
              <h3>General</h3>
              <ul class="nav side-menu">
                <li><a href="index.php"><i class="fa fa-home"></i> Anasayfa</a></li>


                <li><a><i class="fa fa-cogs"></i> Site Ayarlar <span class="fa fa-cogs"></span></a>
                  <ul class="nav child_menu">
                    <li><a href="genel-ayar.php">Genel Ayarlar</a></li>
                    <li><a href="api-ayarlar.php">Api Ayarlar</a></li>
                    <li><a href="copyright.php">Copyright</a></li>
                    <li><a href="smedya.php">Sosyal Medya</a></li>
                    <li><a href="mail-ayarlar.php">Mail Ayarlar</a></li>
                  </ul>
                </li>


                <li><a><i class="fa fa-cogs"></i> Kategoriler <span class="fa fa-cogs"></span></a>
                  <ul class="nav child_menu">
                    <li><a href="kategori.php">Kategori Yönetin</a></li>
                    <li><a href="kategori-ekle.php">Kategori Oluştur</a></li>
                    <li><a href="kategori-siralama.php">Başlık Sırası</a></li>
                  </ul>
                </li>

                 <li><a><i class="fa fa-cogs"></i> Foter <span class="fa fa-cogs"></span></a>
                  <ul class="nav child_menu">
                    <li><a href="foter.php">Foter Yönetin</a></li>
                    <li><a href="foter-ekle.php">Foter Oluştur</a></li>
                    <li><a href="foter-siralama.php">Foter Sırası</a></li>
                  </ul>
                </li>


                <li><a href="slider.php"><i class="fa fa-image"></i> Slider</a></li>
                <li><a href="urun.php"><i class="fa fa-shopping-basket"></i> Ürün</a></li>
                <li><a href="hakkimizda.php"><i class="fa fa-list-alt"></i> Hakkimizda</a></li>
                
                <li><a href="hakkimizda.php"><i class="fa fa-info"></i> Biz Kimiz</a></li>
                <li><a href="ekip.php"><i class="fa fa-image"></i> Ekibimiz</a></li>
                <li><a href="kullanicilar.php"><i class="fa fa-user"></i> Kullanıcılar</a></li>
                <li><a href="menu.php"><i class="fa fa-list"></i> Menüler</a></li>
                <li><a href="kategori.php"><i class="fa fa-list"></i> Kategori</a></li>
                <li><a href="alt_kategori.php"><i class="fa fa-list"></i>Alt Kategori</a></li>                        
              </ul>
            </div>
          </div>
          <!-- /sidebar menu -->

          <!-- /menu footer buttons -->
          <div class="sidebar-footer hidden-small">
            <a data-toggle="tooltip" data-placement="top" title="Settings">
              <span class="glyphicon glyphicon-cog" aria-hidden="true"></span>
            </a>
            <a data-toggle="tooltip" data-placement="top" title="FullScreen">
              <span class="glyphicon glyphicon-fullscreen" aria-hidden="true"></span>
            </a>
            <a data-toggle="tooltip" data-placement="top" title="Lock">
              <span class="glyphicon glyphicon-eye-close" aria-hidden="true"></span>
            </a>
            <a data-toggle="tooltip" data-placement="top" title="Logout">
              <span class="glyphicon glyphicon-off" aria-hidden="true"></span>
            </a>
          </div>
          <!-- /menu footer buttons -->
        </div>
      </div>

      <!-- top navigation -->
      <div class="top_nav">
        <div class="nav_menu">
          <nav>
            <div class="nav toggle">
              <a id="menu_toggle"><i class="fa fa-bars"></i></a>
            </div>

            <ul class="nav navbar-nav navbar-right">
              <li class="">
                <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                  <img src="images/img.jpg" alt=""><?php echo $kullanicicek['kullanici_adsoyad']; ?>
                  <span class=" fa fa-angle-down"></span>
                </a>
                <ul class="dropdown-menu dropdown-usermenu pull-right">
                  <li><a href="javascript:;"> Profil Bilgilerim</a></li>
                  
                  <li><a href="logout.php"><i class="fa fa-sign-out pull-right"></i> Güvenli Çıkış</a></li>
                </ul>
              </li>

              <li role="presentation" class="dropdown">
                <a href="javascript:;" class="dropdown-toggle info-number" data-toggle="dropdown" aria-expanded="false">
                  <i class="fa fa-envelope-o"></i>
                  <span class="badge bg-green">6</span>
                </a>
                <ul id="menu1" class="dropdown-menu list-unstyled msg_list" role="menu">
                  <li>
                    <a>
                      <span class="image"><img src="images/img.jpg" alt="Profile Image" /></span>
                      <span>
                        <span>John Smith</span>
                        <span class="time">3 mins ago</span>
                      </span>
                      <span class="message">
                        Film festivals used to be do-or-die moments for movie makers. They were where...
                      </span>
                    </a>
                  </li>
                  <li>
                    <a>
                      <span class="image"><img src="images/img.jpg" alt="Profile Image" /></span>
                      <span>
                        <span>John Smith</span>
                        <span class="time">3 mins ago</span>
                      </span>
                      <span class="message">
                        Film festivals used to be do-or-die moments for movie makers. They were where...
                      </span>
                    </a>
                  </li>
                  <li>
                    <a>
                      <span class="image"><img src="images/img.jpg" alt="Profile Image" /></span>
                      <span>
                        <span>John Smith</span>
                        <span class="time">3 mins ago</span>
                      </span>
                      <span class="message">
                        Film festivals used to be do-or-die moments for movie makers. They were where...
                      </span>
                    </a>
                  </li>
                  <li>
                    <a>
                      <span class="image"><img src="images/img.jpg" alt="Profile Image" /></span>
                      <span>
                        <span>John Smith</span>
                        <span class="time">3 mins ago</span>
                      </span>
                      <span class="message">
                        Film festivals used to be do-or-die moments for movie makers. They were where...
                      </span>
                    </a>
                  </li>
                  <li>
                    <div class="text-center">
                      <a>
                        <strong>See All Alerts</strong>
                        <i class="fa fa-angle-right"></i>
                      </a>
                    </div>
                  </li>
                </ul>
              </li>
            </ul>
          </nav>
        </div>
      </div>
        <!-- /top navigation -->