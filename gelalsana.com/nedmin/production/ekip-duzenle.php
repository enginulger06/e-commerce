<?php 
include 'header.php';
/////////////// //////////////////
$ekipsor=$db->prepare("SELECT * FROM ekip where ekip_id=:id");
$ekipsor->execute(array(
  'id'=> $_GET['ekip_id']
));
$say=$ekipsor->rowCount();
$ekipcek=$ekipsor->fetch(PDO::FETCH_ASSOC);
?>
<!-- page content -->
<div class="right_col" role="main">
  <div class="">
    <div class="clearfix"></div>
    <div class="row">
      <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
          <div class="x_title">
            <h2>Ekip Düzenleme <small>
              <?php 
              if ($_GET['durum']=="ok"){?>
              <b style="color: green;">İşlem Başarılı...</b>
              <?php } elseif ($_GET['durum']=="no") { ?>
              <b style="color:red;">İşlem Başarısız...</b>
              <?php } elseif ($_GET['durum']=="dosyabuyuk") { ?>
              <b style="color:red;">Dosya Boyutu Yüksek İşlem Başarısız...</b>
              <?php } elseif ($_GET['durum']=="formathatali") { ?>
              <b style="color:red;">Format Hatalı İşlem Başarısız...</b>
              <?php } ?>
            </small></h2>
            <div class="clearfix"></div>
            <div align="right">
              <a href="ekip.php" ><button class="btn btn-success btn-xs">Geri Dön</button></a>
            </div>
          </div>

          <div class="x_content">
            <br />

            <form action="../netting/islem.php" method="POST" enctype="multipart/form-data" data-parsley-validate class="form-horizontal form-label-left">

              <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Yüklü Logo<br><span class="required"></span></label>
                <div class="col-md-6 col-sm-6 col-xs-12"> 
                  <img width="200"  src="../../<?php echo $ekipcek['ekip_resimyol']; ?>">       
                </div>
              </div>

              <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Resim Seç<span class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <input type="file" id="first-name"  name="ekip_resimyol"  class="form-control col-md-7 col-xs-12">
                </div>
              </div>

              
              <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name" >Ekip AdSoyad <span class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <input type="text" id="first-name" name="ekip_adsoyad" value="<?php echo $ekipcek['ekip_adsoyad']; ?>" class="form-control col-md-7 col-xs-12">
                </div>
              </div>

              <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Ekip Ünvani <span class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <input type="text" id="first-name" name="ekip_unvani" value="<?php echo $ekipcek['ekip_unvani']; ?>" class="form-control col-md-7 col-xs-12">
                </div>
              </div>
              <hr>
              <br/>
              <?php 
              $icon=$medya=$url=$href=$a=$b=""; 
              $icon  = $ekipcek['ekip_icon'];
              $medya = explode(",", $icon,3);

              $url=$ekipcek['ekip_url'];
              $href=explode(",", $url);
              for ($i=0; $i <count($medya); $i++) { 
                $ekip_icon=$ekip_url="";
                $ekip_icon="ekip_icon".$i;
                $ekip_url="ekip_url".$i;
                ?>
                <div class="form-group">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Ekip Medya İcon <span class="required">*</span>
                  </label>
                  <div class="col-md-6 col-sm-6 col-xs-12">
                    <input type="text" id="first-name" name="<?php echo $ekip_icon; ?>" value="<?php echo $medya[$i]; ?>" class="form-control col-md-7 col-xs-12">
                  </div> 
                </div>


              <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name"> http://www.  <span class="required">*</span>
                  </label>
                  <div class="col-md-6 col-sm-6 col-xs-12">
                    <input type="text" id="first-name" name="<?php echo $ekip_url; ?>" value="<?php echo $href[$i]; ?>" class="form-control col-md-7 col-xs-12">
                  </div>
              </div>
                <hr>
                <br/>

                <?php } ?>


              <div class="form-group">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Ekip Sıra <span class="required">*</span>
                  </label>
                  <div class="col-md-6 col-sm-6 col-xs-12">
                    <input type="text" id="first-name" name="ekip_sira" value="<?php echo $ekipcek['ekip_sira']; ?>" class="form-control col-md-7 col-xs-12">
                  </div>
              </div>

              <div class="form-group">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Ekip Durum <span class="required">*</span>
                  </label>
                  <div class="col-md-6 col-sm-6 col-xs-12">
                    <select id="header" class="form-control" name="ekip_durum" required="">

                      <!-- Kısa İf KULLANIMI -->
                      <option value="1" <?php echo $ekipcek['ekip_durum']=='1' ? 'selected""': ''; ?>>Aktif</option>
                      <option value="0" <?php if($ekipcek['ekip_durum']=='0'){ echo 'selected=""';} ?>>Pasif</option>     
                    </select>
                  </div>
              </div>

                <div class="ln_solid"></div>
                <div class="form-group">
                  <input type="hidden" name="eski_yol" value="<?php echo $ekipcek['ekip_resimyol']; ?>">
                  <input type="hidden" name="ekip_id" value="<?php echo $ekipcek['ekip_id']; ?>">
                  <div align="right" class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                    <button  type="submit" name="ekipduzenle" class="btn btn-success">Guncelle</button>
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
