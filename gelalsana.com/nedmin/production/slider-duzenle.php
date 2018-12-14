<?php  
include 'header.php'; 
/////////////// //////////////////
$slidersor=$db->prepare("SELECT * FROM slider where slider_id=:id");
$slidersor->execute(array(
  'id'=> $_GET['slider_id']
));
$say=$slidersor->rowCount();
$slidercek=$slidersor->fetch(PDO::FETCH_ASSOC);
?>


<!-- page content -->
<div class="right_col" role="main">
  <div class="">
    <div class="clearfix"></div>
    <div class="row">
      <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
          <div class="x_title">
            <h2>Slider Düzenleme <small>

              <?php 
              if ($_GET['durum']=="ok"){?>

                <b style="color: green;">İşlem Başarılı...</b>

              <?php } elseif ($_GET['durum']=="no") { ?>

                <b style="color:red;">İşlem Başarısız...</b>

              <?php } ?>


            </small></h2>
            <div class="clearfix"></div>
            <div align="right">
              <a href="slider.php" ><button class="btn btn-success btn-xs">Geri Dön</button></a>
            </div>
          </div>

          <div class="x_content">
            <br />


            <form action="../netting/islem.php" method="POST" id="demo-form2" enctype="multipart/form-data" data-parsley-validate class="form-horizontal form-label-left">




              <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Slider Ad <span class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <input type="text" id="first-name"  name="slider_ad" value="<?php echo $slidercek['slider_ad']; ?>" class="form-control col-md-7 col-xs-12">
                </div>
              </div>



               <!-- CK editör başlangıç -->
              <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">İçerik <span class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <textarea class="ckeditor" id="editor1" name="urun_icerik"><?php echo $slidercek['slider_icerik']; ?></textarea>
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
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Slider Grup <span class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <select id="header" class="form-control" name="slider_grup" required="">

                    <!-- Kısa İf KULLANIMI -->
                    <option value="1" <?php echo $slidercek['slider_grup']==1 ? 'selected""': ''; ?>>Sol</option>
                    <option value="2" <?php if($slidercek['slider_grup']==2){ echo 'selected=""';} ?>>Orta</option>

                    <option value="3" <?php if($slidercek['slider_grup']==3){ echo 'selected=""';} ?>>Sağ</option>

                  </select>
                </div>
              </div>

              <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">slider Sıra <span class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <input type="text" id="first-name" name="slider_sira" value="<?php echo $slidercek['slider_sira']; ?>"  class="form-control col-md-7 col-xs-12">
                </div>
              </div>


              <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Slider Durum <span class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <select id="header" class="form-control" name="slider_durum" required="">

                    <!-- Kısa İf KULLANIMI -->
                    <option value="1" <?php echo $slidercek['slider_durum']=='1' ? 'selected""': ''; ?>>Aktif</option>
                    <option value="0" <?php if($slidercek['slider_durum']=='0'){ echo 'selected=""';} ?>>Pasif</option>
                    
                  </select>
                </div>
              </div>

              <div class="ln_solid"></div>
              <div class="form-group">

                <input type="hidden" name="slider_id" value="<?php echo $slidercek['slider_id']; ?>">
                <input type="hidden" name="eski_yol" value="<?php echo $slidercek['slider_resimyol']; ?>">
                

                <div align="right" class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                  <button  type="submit" name="sliderduzenle" class="btn btn-success">Guncelle</button>
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
