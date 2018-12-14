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
            <h2>Ürün Düzenleme <small>
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
              <a href="urunler.php" ><button class="btn btn-success btn-xs">Geri Dön</button></a>
            </div>
          </div>

          <div class="x_content">
            <br />



            <form action="../netting/islem.php" method="POST" enctype="multipart/form-data" data-parsley-validate class="form-horizontal form-label-left">

              <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Yüklü Logo<br><span class="required"></span></label>
                <div class="col-md-6 col-sm-6 col-xs-12"> 
                  <img width="200"  src="../../<?php echo $uruncek['urun_resimyol']; ?>">       
                </div>
              </div>

              <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Resim Seç<span class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <input type="file" id="first-name"  name="urun_resimyol"  class="form-control col-md-7 col-xs-12">
                </div>
              </div>


              <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Ürün Başlık <span class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <input type="text" id="first-name" name="urun_baslik" value="<?php echo $uruncek['urun_baslik']; ?>"  class="form-control col-md-7 col-xs-12">
                </div>
              </div>


              <!-- CK editör başlangıç -->
              <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Ürün İçerik <span class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <textarea class="ckeditor" id="editor1" name="urun_icerik"><?php echo $uruncek['urun_icerik']; ?></textarea>
                </div>
              </div>
              <script type="text/javascript">
                CKEDITOR.replace( 'editor1',

                {
                  filebrowserBrowseUr1 : 'ckfinder/ckfinder.html',
                  filebrowserImageBrowserUr1 : 'ckfinder/ckfinder.html?type=Images',
                  filebrowserFlashBrowseUr1 : 'ckfinder/ckfinder.html?type=Flash',
                  filebrowserUploadUrl : 'ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files',
                  filebrowserImageUploadUr1 : 'ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images',
                  filebrowserFlashUploadUr1 : 'ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash',
                  forcePasteAsPlainText: true
                }
                );
              </script>
              <!-- CK editör bitiş -->


              <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Ürün Sira <span class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <input type="text" id="first-name" name="urun_sira" value="<?php echo $uruncek['urun_sira']; ?>"  class="form-control col-md-7 col-xs-12">
                </div>
              </div>


              <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Ürün Durum <span class="required">*</span>
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
