<?php 
include 'header.php';
/////////////// //////////////////
$urunsor=$db->prepare("SELECT * FROM urun where urun_id=:id");
$urunsor->execute(array(
  'id'=> $_GET['urun_id']
));
$say=$urunsor->rowCount();
$uruncek=$urunsor->fetch(PDO::FETCH_ASSOC);
?>
<!-- page content -->
<div class="right_col" role="main">
  <div class="">
    <div class="clearfix"></div>
    <div class="row">
      <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
          <div class="x_title">
            <h2>Photo Düzenleme <small>
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
              <a href="urun.php" ><button class="btn btn-success btn-xs">Geri Dön</button></a>
            </div>
          </div>

          <div class="x_content">
            <br />

            <form action="../netting/islem.php" method="POST" enctype="multipart/form-data" data-parsley-validate class="form-horizontal form-label-left">

              <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Yüklü Photo<br><span class="required"></span></label>
                <div class="col-md-6 col-sm-6 col-xs-12"> 
                  <img width="200"  src="../../<?php echo $uruncek['urun_resimyol']; ?>">       
                </div>
              </div>

              <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Photo Seç<span class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <input type="file" id="first-name"  name="urun_resimyol"  class="form-control col-md-7 col-xs-12">
                </div>
              </div>


              <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" list="secim" for="first-name" >Kategori Seç <span class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <input type="text" id="first-name" list="secim" name="urun_ad" value="<?php echo $uruncek['urun_ad']; ?>" class="form-control col-md-7 col-xs-12">

                  <?php include '../netting/baglan.php';
                          // Belirli veriyi seçme işlemi
                  $pkategorisor=$db->prepare("SELECT * FROM pkategori ORDER BY pkategori_sira ASC");
                  $pkategorisor->execute();
                  ?>

                  <datalist id="secim">
                    <?php while ($pkategoricek=$pkategorisor->fetch(PDO::FETCH_ASSOC)) { ?>
                      <option value="<?php echo substr($pkategoricek['pkategori_data'],1);?>">
                    <?php } ?>
                  </datalist>
                </div>
              </div>

                <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Photo Yazi <span class="required">*</span>
                    </label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                      <input type="text" id="first-name" name="urun_yazi" value="<?php echo $uruncek['urun_yazi']; ?>" class="form-control col-md-7 col-xs-12">
                    </div>
                  </div>


                <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Photo Sıra <span class="required">*</span>
                    </label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                      <input type="text" id="first-name" name="urun_sira" value="<?php echo $uruncek['urun_sira']; ?>" class="form-control col-md-7 col-xs-12">
                    </div>
                </div>

                <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Photo Durum <span class="required">*</span>
                    </label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                      <select id="header" class="form-control" name="urun_durum" required="">

                        <!-- Kısa İf KULLANIMI -->
                        <option value="1" <?php echo $uruncek['urun_durum']=='1' ? 'selected""': ''; ?>>Aktif</option>
                        <option value="0" <?php if($uruncek['urun_durum']=='0'){ echo 'selected=""';} ?>>Pasif</option>     
                      </select>
                    </div>
                </div>

                <div class="ln_solid"></div>
                <div class="form-group">
                    <input type="hidden" name="eski_yol" value="<?php echo $uruncek['urun_resimyol']; ?>">
                    <input type="hidden" name="urun_id" value="<?php echo $uruncek['urun_id']; ?>">
                    <div align="right" class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                      <button  type="submit" name="urunduzenle" class="btn btn-success">Guncelle</button>
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
