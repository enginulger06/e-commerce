<?php 
  include 'header.php';
  include '../netting/baglan.php';
  // Belirli veriyi seçme işlemi
  $tanitimsor=$db->prepare("SELECT * FROM tanitim where tanitim_id=:id");
  $tanitimsor->execute(array( 'id'=>$_GET['tanitim_id']));
  $tanitimcek=$tanitimsor->fetch(PDO::FETCH_ASSOC);
  
?>


        <!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <div class="clearfix"></div>
            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>tanitim Ayarlar <small>

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
                    <form action="../netting/islem.php" method="POST" id="demo-form2" data-parsley-validate class="form-horizontal form-label-left">

                      <br/>


                       <!-- Başlıklar -->
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Ad<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="first-name" name="tanitim_ad" value="<?php echo $tanitimcek['tanitim_ad'] ?>" required="required" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Başlık<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="first-name" name="tanitim_baslik" value="<?php echo $tanitimcek['tanitim_baslik'] ?>" required="required" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>
                     
                      <!-- icerik CK editör başlangıç -->
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">İçerik <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <textarea class="ckeditor" id="editor1" name="tanitim_icerik"><?php echo $tanitimcek['tanitim_icerik']; ?></textarea>
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
                      <!-- ./Ana -->
                       <hr>
                       <br/>

                       <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Href <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="first-name" name="tanitim_href" value="<?php echo $tanitimcek['tanitim_href']; ?>"  class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>

                       <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">İcon <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="first-name" name="tanitim_icon" value="<?php echo $tanitimcek['tanitim_icon']; ?>"  class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Active <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="first-name" name="tanitim_active" value="<?php echo $tanitimcek['tanitim_active']; ?>"  class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>


                       <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">tanitim Sira <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="first-name" name="tanitim_sira" value="<?php echo $tanitimcek['tanitim_sira']; ?>"  class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">tanitim Durum <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <select id="header" class="form-control" name="tanitim_durum" required="">
                            
                            <!-- Kısa İf KULLANIMI -->
                            <option value="1" <?php echo $tanitimcek['tanitim_durum']=='1' ? 'selected""': ''; ?>>Aktif</option>
                            <option value="0" <?php if($tanitimcek['tanitim_durum']=='0'){ echo 'selected=""';} ?>>Pasif</option>
                                             
                          </select>
                        </div>
                      </div>

                








                       


                     
                      <div class="ln_solid"></div>
                      <div class="form-group">
                        <input type="hidden" name="tanitim_id" value="<?php echo $tanitimcek['tanitim_id']; ?>">
                        <div align="right" class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                          <a href="tanitim-duzenle.php?tanitim_id=<?php echo $tanitimcek['tanitim_id']; ?>">
                          <button  type="submit" name="tanitimduzenle" class="btn btn-success">Guncelle</button>
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
