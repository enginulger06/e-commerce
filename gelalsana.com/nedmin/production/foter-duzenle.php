<?php 
include 'header.php';
include '../netting/baglan.php';

  // Belirli veriyi seçme işlemi
$fotersor=$db->prepare("SELECT * FROM foter where foter_id=:id");
$fotersor->execute(array( 'id'=>$_GET['foter_id']));
$fotercek=$fotersor->fetch(PDO::FETCH_ASSOC);

?>


<!-- page content -->
<div class="right_col" role="main">
  <div class="">
    <div class="clearfix"></div>
    <div class="row">
      <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
          <div class="x_title">
            <h2>Foter Link Ayarlar <small>

              <?php 
              if ($_GET['durum']=="ok"){?>

                <b style="color: green;">İşlem Başarılı...</b>

              <?php } elseif ($_GET['durum']=="no") { ?>

                <b style="color:red;">İşlem Başarısız...</b>

              <?php } ?>


            </small></h2>
            <div class="clearfix"></div>
            <div align="right">
              <a href="foter.php" ><button class="btn btn-success btn-xs">Geri Dön</button></a>
            </div>
          </div>

          <div class="x_content">
            <br />



            <!--    (/) => en kök dizine çıkma    (../) =>bir üst diziye çık   -->
            <form action="../netting/islem.php" method="POST" id="demo-form2" data-parsley-validate class="form-horizontal form-label-left">

              <br/>


               <!-- Başlıklar -->
              <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Sayfa Linki<span class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <!-- $_SERVER['HTTP_HOST] = Bulunduğumuz sitenin ana adresini alabiliyoruz. -->
                   <!-- $_SERVER['REQUEST_URI] = Bulunduğumuz sitenin tüm adresini alabiliyoruz. -->
                   <!-- ."/".$_SERVER['REQUEST_URI']  -->
                   <!-- $_SERVER['HTTP_HOST'] =<?php $ayarcek['ayar_url']?> ?> -->                  
                   <input type="text" id="first-name" disabled="" name="foter_ad" value="<?php echo $ayarcek['ayar_url']?>/sayfa-<?php echo seo($fotercek['foter_ad']) ?>" required="required" class="form-control col-md-7 col-xs-12">
                </div>
              </div>


              <!-- Başlıklar -->
              <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Ad<span class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <input type="text" id="first-name" name="foter_ad" value="<?php echo $fotercek['foter_ad'] ?>" required="required" class="form-control col-md-7 col-xs-12">
                </div>
              </div>

              <!-- CK editör başlangıç -->
              <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">İçerik <span class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <textarea class="ckeditor" id="editor1" name="foter_icerik"><?php echo $fotercek['foter_icerik']; ?></textarea>
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
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">URL <span class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <input type="text" id="first-name" name="foter_url" value="<?php echo $fotercek['foter_url']; ?>"  class="form-control col-md-7 col-xs-12">
                </div>
              </div>


              <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Grup <span class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <select id="header" class="form-control" name="foter_grup" required="">

                    <!-- Kısa İf KULLANIMI -->
                    <option value="1" <?php echo $fotercek['foter_grup']=='1' ? 'selected""': ''; ?>>Sol</option>
                    <option value="0" <?php if($fotercek['foter_grup']=='0'){ echo 'selected=""';} ?>>Sağ</option>

                  </select>
                </div>
              </div>



              <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">foter Sira <span class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <input type="text" id="first-name" name="foter_sira" value="<?php echo $fotercek['foter_sira']; ?>"  class="form-control col-md-7 col-xs-12">
                </div>
              </div>

              <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">foter Durum <span class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <select id="header" class="form-control" name="foter_durum" required="">

                    <!-- Kısa İf KULLANIMI -->
                    <option value="1" <?php echo $fotercek['foter_durum']=='1' ? 'selected""': ''; ?>>Aktif</option>
                    <option value="0" <?php if($fotercek['foter_durum']=='0'){ echo 'selected=""';} ?>>Pasif</option>

                  </select>
                </div>
              </div>














              <div class="ln_solid"></div>
              <div class="form-group">
                <input type="hidden" name="foter_id" value="<?php echo $fotercek['foter_id']; ?>">
                <div align="right" class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                  <a href="foter-duzenle.php?foter_id=<?php echo $fotercek['foter_id']; ?>">
                    <button  type="submit" name="foterduzenle" class="btn btn-success">Guncelle</button>
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
