<?php 
include 'header.php';
?>


<!-- page content -->
<div class="right_col" role="main">
  <div class="">
    <div class="clearfix"></div>
    <div class="row">
      <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
          <div class="x_title">
            <h2>Copyright Ayarları<small>
              <?php 
              if ($_GET['durum']=="ok" or $_GET['sil']=="ok"){?>
              <b style="color: green;">İşlem Başarılı...</b>
              <?php } elseif ($_GET['durum']=="no" or $_GET['sil']=="no") { ?>
              <b style="color:red;">İşlem Başarısız...</b>
              <?php } ?>

            </small></h2>
            <div class="clearfix"> </div>
          </div>
          <div class="x_content">
            <br />
            
          
            <br/>
            <hr>
            <p><h2>Copyright Genel Bilgiler</h2></p>
            <hr>
            <!--    (/) => en kök dizine çıkma    (../) =>bir üst diziye çık   -->
            <form action="../netting/islem.php" method="POST" id="demo-form2" data-parsley-validate class="form-horizontal form-label-left">


              <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Mesai <span class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <input type="text" id="first-name" name="ayar_mesai" value="<?php echo $ayarcek['ayar_mesai'] ?>"  class="form-control col-md-7 col-xs-12">
                </div>
              </div>

              <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Copyright <span class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <input type="text" id="first-name" name="ayar_copyright" value="<?php echo $ayarcek['ayar_copyright'] ?>"  class="form-control col-md-7 col-xs-12">
                </div>
              </div>

              <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Copyright Link <span class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <input type="text" id="first-name" name="ayar_copyright_link" value="<?php echo $ayarcek['ayar_copyright_link'] ?>"  class="form-control col-md-7 col-xs-12">
                </div>
              </div>

              <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Copyright Ad <span class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <input type="text" id="first-name" name="ayar_copyright_ad" value="<?php echo $ayarcek['ayar_copyright_ad'] ?>" class="form-control col-md-7 col-xs-12">
                </div>
              </div>

              <div class="ln_solid"></div>
              <div class="form-group">
                <div align="right" class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                  <button  type="submit" name="copyrightayarkaydet" class="btn btn-success">Guncelle</button>
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
