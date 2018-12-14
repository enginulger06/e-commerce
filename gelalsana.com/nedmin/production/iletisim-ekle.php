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
                    <h2>iletisim Ekleme <small>

                      <?php 
                          if ($_GET['durum']=="ok"){?>

                          <b style="color: green;">İşlem Başarılı...</b>

                          <?php } elseif ($_GET['durum']=="no") { ?>

                          <b style="color:red;">İşlem Başarısız...</b>

                          <?php } ?>


                  </small></h2>
                    <div class="clearfix"></div>
                    <div align="right">
                        <a href="iletisim.php" ><button class="btn btn-success btn-xs">Geri Dön</button></a>
                    </div>
                  </div>

                  <div class="x_content">
                    <br />


                    <!--    (/) => en kök dizine çıkma    (../) =>bir üst diziye çık   -->
                    <form action="../netting/islem.php" method="POST" id="demo-form2" data-parsley-validate class="form-horizontal form-label-left">

                     

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name" >iletisim Ad <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="first-name" name="iletisim_ad" placeholder="iletisim Adını Giriniz" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>

                       <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">iletisim icon <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="first-name" name="iletisim_icon" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name" >iletisim icerik <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="first-name" name="iletisim_icerik" placeholder="iletisim icerik Giriniz" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">iletisim Url <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="first-name" name="iletisim_url" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">iletisim Sıra <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="first-name" name="iletisim_sira" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">iletisim Durum<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <select id="heard" class="form-control" name="iletisim_durum" required>

                            <option value="1" >Aktif</option>

                            <option value="0" >Pasif</option>
    
                          </select>
                        </div>
                      </div>

                    

                      <div class="ln_solid"></div>
                      <div class="form-group">
                        <div align="right" class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                          <button  type="submit" name="iletisimekle" class="btn btn-success">Ekle</button>
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
