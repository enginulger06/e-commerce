<?php 
include 'header.php';
include '../netting/baglan.php';
  // Belirli veriyi seçme işlemi
$hakkimizdasor=$db->prepare("SELECT * FROM hakkimizda where hakkimizda_id=:id");
$hakkimizdasor->execute(array( 'id'=>0));
$hakkimizdacek=$hakkimizdasor->fetch(PDO::FETCH_ASSOC);

?>


<!-- page content -->
<div class="right_col" role="main">
  <div class="">
    <div class="clearfix"></div>
    <div class="row">
      <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
          <div class="x_title">
            <h2>Hakkimizda Ayarlar <small>

              <?php 
              if ($_GET['durum']=="ok"){?>

                <b style="color: green;">İşlem Başarılı...</b>

              <?php } elseif ($_GET['durum']=="no") { ?>

                <b style="color:red;">İşlem Başarısız...</b>

              <?php } ?>


            </small></h2>
            <div class="clearfix"></div>

          </div>

          <div class="x_content">
            <br />



            <!--    (/) => en kök dizine çıkma    (../) =>bir üst diziye çık   -->
            <form action="../netting/islem.php" method="POST" id="demo-form2" data-parsley-validate class="form-horizontal form-label-left">

              <br/>


              <!-- Başlıklar -->
              <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Başlık <span class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <input type="text" id="first-name" name="hakkimizda_baslik" value="<?php echo $hakkimizdacek['hakkimizda_baslik']; ?>" required="required" class="form-control col-md-7 col-xs-12">
                </div>
              </div>


              <!-- CK editör başlangıç -->
              <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">İçerik <span class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <textarea class="ckeditor" id="editor1" name="hakkimizda_icerik"><?php echo $hakkimizdacek['hakkimizda_icerik']; ?></textarea>
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

              <br/>

              <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Video <span class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <input type="text" id="first-name" name="hakkimizda_video" value="<?php echo $hakkimizdacek['hakkimizda_video']; ?>"  class="form-control col-md-7 col-xs-12">
                </div>
              </div>


              <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Vizyon <span class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <input type="text" id="first-name" name="hakkimizda_vizyon" value="<?php echo $hakkimizdacek['hakkimizda_vizyon']; ?>"  class="form-control col-md-7 col-xs-12">
                </div>
              </div>

              <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Misyon <span class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <input type="text" id="first-name" name="hakkimizda_misyon" value="<?php echo $hakkimizdacek['hakkimizda_misyon']; ?>"  class="form-control col-md-7 col-xs-12">
                </div>
              </div>


              <div class="ln_solid"></div>
              <div class="form-group">
                <input type="hidden" name="hakkimizda_id" value="<?php echo $hakkimizdacek['hakkimizda_id']; ?>">
                <div align="right" class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                  <a href="hakkimizda-duzenle.php?hakkimizda_id=<?php echo $hakkimizdacek['hakkimizda_id']; ?>">
                    <button  type="submit" name="hakkimizdaduzenle" class="btn btn-success">Guncelle</button>
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
