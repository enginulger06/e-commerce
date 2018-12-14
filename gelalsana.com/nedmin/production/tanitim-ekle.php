<?php 
include 'header.php';
/////////////// //////////////////

?>
        <!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <div class="clearfix"></div>
            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>tanitim Ekleme <small>

                      <?php 
                          if ($_GET['durum']=="ok"){?>

                          <b style="color: green;">İşlem Başarılı...</b>

                          <?php } elseif ($_GET['durum']=="no") { ?>

                          <b style="color:red;">İşlem Başarısız...</b>

                          <?php } ?>


                  </small></h2>
                    <div class="clearfix"></div>
                    <div align="right">
                        <a href="tanitim.php" ><button class="btn btn-success btn-xs">Geri Dön</button></a>
                    </div>
                  </div>

                  <div class="x_content">
                    <br />
 

                    <!--    (/) => en kök dizine çıkma    (../) =>bir üst diziye çık   -->
                    <!-- enctype="multipart/form-data" çok önemli resim eklerken dosyaya taşıyor.  -->
                    <form action="../netting/islem.php" method="POST" enctype="multipart/form-data"  id="demo-form2" data-parsley-validate class="form-horizontal form-label-left">



                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name" >Ad <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="first-name" name="tanitim_ad" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name" >Başlık <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="first-name" name="tanitim_baslik" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>

                    

                        <!-- CK editör başlangıç -->
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">İcerik <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <textarea class="ckeditor" id="editor1" name="tanitim_icerik"></textarea>
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
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Href <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="first-name" name="tanitim_href" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">tanitim İcon <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="first-name" name="tanitim_icon" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Activite <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="first-name" name="tanitim_active" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>
                      
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">tanitim Sıra <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="first-name" name="tanitim_sira" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">tanitim Durum<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <select id="heard" class="form-control" name="tanitim_durum" required>

                            <option value="1" >Aktif</option>

                            <option value="0" >Pasif</option>
    
                          </select>
                        </div>
                      </div>

                      <div class="ln_solid"></div>
                      <div class="form-group">
                        <div align="right" class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                          <button  type="submit" name="tanitimekle" class="btn btn-success">Ekle</button>
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
