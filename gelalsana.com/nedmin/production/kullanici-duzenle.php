<?php 
include 'header.php';
/////////////// //////////////////
  $kullanicisor=$db->prepare("SELECT * FROM kullanici where kullanici_id=:id");
  $kullanicisor->execute(array(
      'id'=> $_GET['kullanici_id']
  ));
  $say=$kullanicisor->rowCount();
  $kullanicicek=$kullanicisor->fetch(PDO::FETCH_ASSOC);
?>
        <!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <div class="clearfix"></div>
            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Kullanıcı Düzenleme <small>

                      <?php 
                          if ($_GET['durum']=="ok"){?>

                          <b style="color: green;">İşlem Başarılı...</b>

                          <?php } elseif ($_GET['durum']=="no") { ?>

                          <b style="color:red;">İşlem Başarısız...</b>

                          <?php } elseif ($_GET['durum']=="farklisifre") { ?>

                           <b style="color:red;">Hata! Girdiğiniz şifreler eşleşmiyor.</b>

                          <?php } ?>


                  </small></h2>
                    <div class="clearfix"></div>
                      <div align="right">
                        <a href="kullanicilar.php" ><button class="btn btn-success btn-xs">Geri Dön</button></a>
                      </div>
                  </div>

                  <div class="x_content">
                    <br />


                    <!--    (/) => en kök dizine çıkma    (../) =>bir üst diziye çık   -->
                    <form action="../netting/islem.php" method="POST" id="demo-form2" data-parsley-validate class="form-horizontal form-label-left">

                      <?php 
                      // pythonda split işlemi 2018-02-25 15:38:06
                      //boşluk işlemi ile diziye atıyor aşağıda $zaman[0]=2018-02-25
                      $zaman=explode(" ", $kullanicicek['kullanici_zaman']);
                        ?>

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Kayıt Tarihi <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="first-name" disabled="" name="kullanici_zaman" value="<?php echo $zaman[0]; ?>"  class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Ad Soyad <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="first-name" name="kullanici_adsoyad" value="<?php echo $kullanicicek['kullanici_adsoyad']; ?>"  class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>


                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Mail <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="first-name" name="kullanici_mail" value="<?php echo $kullanicicek['kullanici_mail']; ?>" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>

                      <hr>

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Şifreyi değiştir <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="first-name" name="kullanici_passwordone"  class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>

                       <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Yeni Şifrenizi Tekrar Giriniz <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="first-name" name="kullanici_passwordtwo"  class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>

                      <hr>

                       
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Kullanıcı Durum<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <select id="heard" class="form-control" name="kullanici_durum" required>

                            <option value="1" >Aktif</option>

                            <option value="0" >Pasif</option>
    
                          </select>
                        </div>
                      </div>



                       <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Yetki <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="first-name" name="kullanici_yetk," value="<?php echo $kullanicicek['kullanici_yetki']; ?>" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>




                      <div class="ln_solid"></div>
                      <div class="form-group">

                        <input type="hidden" name="kullanici_id" value="<?php echo $kullanicicek['kullanici_id']; ?>">

                        <div align="right" class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                          <button  type="submit" name="kullaniciduzenle" class="btn btn-success">Guncelle</button>
                        </div>
                      </div>

                    </form>



                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- /page content -->

        <!-- footer content -->
          <?php 
              include 'footer.php';
          ?>
        <!-- /footer content -->
