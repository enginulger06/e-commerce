<?php 
  include 'header.php';
  include '../netting/baglan.php';
  // Belirli veriyi seçme işlemi
?>
        <!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <div class="clearfix"></div>
            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Ekip Ekleme <small>

                      <?php 
                          if ($_GET['durum']=="ok"){?>

                          <b style="color: green;">İşlem Başarılı...</b>

                          <?php } elseif ($_GET['durum']=="no") { ?>

                          <b style="color:red;">İşlem Başarısız...</b>

                          <?php } ?>


                  </small></h2>
                    <div class="clearfix"></div>
                    <div align="right">
                        <a href="ekip.php" ><button class="btn btn-success btn-xs">Geri Dön</button></a>
                    </div>
                  </div>

                  <div class="x_content">
                    <br />


                    <hr>

                    <form action="../netting/islem.php" method="POST" id="demo-form2" enctype="multipart/form-data" data-parsley-validate class="form-horizontal form-label-left">
                       
                       <!-- CK editör başlangıç -->
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Ekip Genel Açıklama <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <textarea class="ckeditor" id="editor1" name="ayar_ekip_aciklama"><?php echo $ayarcek['ayar_ekip_aciklama']; ?></textarea>
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


                      <div class="ln_solid"></div>
                      <div class="form-group">
                        <div align="right" class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                          <button  type="submit" name="ekipaciklama" class="btn btn-success">Yayınla</button>
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
       
                       
                        


                          
                        
                       