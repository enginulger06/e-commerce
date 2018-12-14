<?php 
include 'header.php';
/////////////// //////////////////
  $medyasor=$db->prepare("SELECT * FROM medya where medya_id=:id");
  $medyasor->execute(array(
      'id'=> $_GET['medya_id']
  ));
  $say=$medyasor->rowCount();
  $medyacek=$medyasor->fetch(PDO::FETCH_ASSOC);
?>
        <!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <div class="clearfix"></div>
            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>medya Düzenleme <small>

                      <?php 
                          if ($_GET['durum']=="ok"){?>

                          <b style="color: green;">İşlem Başarılı...</b>

                          <?php } elseif ($_GET['durum']=="no") { ?>

                          <b style="color:red;">İşlem Başarısız...</b>

                          <?php } ?>


                  </small></h2>
                    <div class="clearfix"></div>
                    <div align="right">
                        <a href="medya.php" ><button class="btn btn-success btn-xs">Geri Dön</button></a>
                    </div>
                  </div>

                  <div class="x_content">
                    <br />


                    <!--    (/) => en kök dizine çıkma    (../) =>bir üst diziye çık   -->
                    <form action="../netting/islem.php" method="POST" id="demo-form2" data-parsley-validate class="form-horizontal form-label-left">


                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">medya Ad <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="first-name" name="medya_ad" value="<?php echo $medyacek['medya_ad']; ?>"  class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">medya url <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="first-name" name="medya_url" value="<?php echo $medyacek['medya_url']; ?>"  class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>


                       <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">medya icon <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="first-name" name="medya_icon" value="<?php echo $medyacek['medya_icon']; ?>"  class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">medya Sira <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="first-name" name="medya_sira" value="<?php echo $medyacek['medya_sira']; ?>"  class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">medya Durum <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <select id="header" class="form-control" name="medya_durum" required="">
                            
                            <!-- Kısa İf KULLANIMI -->
                            <option value="1" <?php echo $medyacek['medya_durum']=='1' ? 'selected""': ''; ?>>Aktif</option>
                            <option value="0" <?php if($medyacek['medya_durum']=='0'){ echo 'selected=""';} ?>>Pasif</option>
                         
                          </select>
                        </div>
                      </div>                    
                      <div class="ln_solid"></div>
                      <div class="form-group">

                        <input type="hidden" name="medya_id" value="<?php echo $medyacek['medya_id']; ?>">

                        <div align="right" class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                          <button  type="submit" name="medyaduzenle" class="btn btn-success">Guncelle</button>
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
