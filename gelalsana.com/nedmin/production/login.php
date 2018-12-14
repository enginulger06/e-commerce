<!DOCTYPE html> 
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Softruck ! | Yönetim Paneli</title>

    <!-- Bootstrap -->
    <link href="../vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="../vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="../vendors/nprogress/nprogress.css" rel="stylesheet">
    <!-- Animate.css -->
    <link href="../vendors/animate.css/animate.min.css" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="../build/css/custom.min.css" rel="stylesheet">
  </head>

  <body class="login">
    <div>
      <a class="hiddenanchor" id="signup"></a>
      <a class="hiddenanchor" id="signin"></a>

      <div class="login_wrapper">
        <div class="animate form login_form">
          <section class="login_content">

            <form action="../netting/islem.php" method="POST">
              <h1>Softruck  Login Form</h1>
              <div>
                <input type="text" id="first-name" name="kullanici_mail" class="form-control" placeholder="Kullanını Adınız(Mail)" required="required" />
              </div>
              <div>
                <input type="password" id="first-name" name="kullanici_password" class="form-control" placeholder="Password" required="required" />
              </div>
              <div>
                <button style="width: 100%; background-color: #73879C; color: white;" type="submit"  name="admingiris" class="btn btn-default">Giriş Yap</button>
              </div>

              <div class="clearfix"></div>

              <div class="separator">
                <p class="change_link">
                  <?php 
                    if ($_GET['durum']=="no") {
                      echo "Kullanıcı Bununamadı...";
                    }elseif ($_GET['durum']=="exit") {
                      echo "Başarıyla Çıkış Yaptınız.";
                    }
                  ?>
                </p>

                <div class="clearfix"></div>
                <br />

                <div>
                  <h1><i class="fa fa-paw"></i> Softruck Yazılım!</h1>
                  <p>©2018 Softruck  Yazılım Tarafından Kodlanmıştır.</p>
                </div>
              </div>
            </form>


          </section>
        </div>
      </div>
    </div>
  </body>
</html>
