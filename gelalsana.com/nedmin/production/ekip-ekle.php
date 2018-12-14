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
                    <h2>Ekip Ekleme <small>

                      <?php 
                          if ($_GET['durum']=="ok"){?>
                          <b style="color: green;">İşlem Başarılı...</b>
                          <?php } elseif ($_GET['durum']=="no") { ?>
                          <b style="color:red;">İşlem Başarısız...</b>
                          <?php } elseif ($_GET['durum']=="hata") { ?>
                          <b style="color:red;">Uyarı! Dosya Seçilmedi</b>
                          <?php } elseif ($_GET['durum']=="dosyabuyuk") { ?>
                          <b style="color:red;">Dosya Boyutu Yüksek İşlem Başarısız...</b>
                          <?php } elseif ($_GET['durum']=="formathatali") { ?>
                          <b style="color:red;">Format Hatalı İşlem Başarısız...</b>
                          <?php } ?>

                  </small></h2>
                    <div class="clearfix"></div>
                    <div align="right">
                        <a href="ekip.php" ><button class="btn btn-success btn-xs">Geri Dön</button></a>
                    </div>
                  </div>

                  <div class="x_content">
                    <br />
 

                    <!--    (/) => en kök dizine çıkma    (../) =>bir üst diziye çık   -->
                    <!-- enctype="multipart/form-data" çok önemli resim eklerken dosyaya taşıyor.  -->
                    <form action="../netting/islem.php" method="POST" enctype="multipart/form-data"  id="demo-form2" data-parsley-validate class="form-horizontal form-label-left">

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Resim Seç (400x400)<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="file" id="first-name"  name="ekip_resimyol"  class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>



                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name" >Ekip AdSoyad <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="first-name" name="ekip_adsoyad" placeholder="ekip Adını Giriniz" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>

                       <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Ekip Ünvani <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="first-name" name="ekip_unvani" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>

                      <hr>
                      <br/>






                    <?php 
                      
                      for ($i=0; $i <3 ; $i++) { 
                        $ekip_icon=$ekip_url="";
                        $ekip_icon="ekip_icon".$i;
                        $ekip_url="ekip_url".$i;
                       ?>

                      <div class="row">

                      <div class="form-group col-md-6 col-sm-6 col-xs-6">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name"><?php echo $i ?>.İcon <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="first-name" name="<?php echo $ekip_icon; ?>" class="form-control col-md-7 col-xs-12" >
                        </div>
                      </div>

                      <div class="form-group col-md-6 col-sm-6 col-xs-6">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name"><?php echo $i ?>.Url <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="first-name" name="<?php echo $ekip_url; ?>" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>
                    </div>
  
                    <?php } ?>


                      <hr>
                      <br/>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Ekip Sıra <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="first-name" name="ekip_sira" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Ekip Durum<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <select id="heard" class="form-control" name="ekip_durum" required>

                            <option value="1" >Aktif</option>
                            <option value="0" >Pasif</option>
    
                          </select>
                        </div>
                      </div>

                    

                      <div class="ln_solid"></div>
                      <div class="form-group">
                        <div align="right" class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                          <button  type="submit" name="ekipekle" class="btn btn-success">Ekle</button>
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
