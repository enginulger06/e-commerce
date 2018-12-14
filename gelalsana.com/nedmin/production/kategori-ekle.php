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
            <h2>Kategori Oluştur<small>

              <?php 
              if ($_GET['durum']=="ok"){?>

              <b style="color: green;">İşlem Başarılı...</b>

              <?php } elseif ($_GET['durum']=="no") { ?>

              <b style="color:red;">İşlem Başarısız...</b>

              <?php } elseif ($_GET['durum']=="dosyabuyuk") { ?>

              <b style="color:red;">Dosya Boyutu Yüksek İşlem Başarısız...</b>

              <?php } elseif ($_GET['durum']=="formathatali") { ?>

              <b style="color:red;">Format Hatalı İşlem Başarısız...</b>

              <?php } ?>


            </small></h2>
            <div class="clearfix"></div>
            <div align="right">
              <a href="kategori.php" ><button class="btn btn-success btn-xs">Geri Dön</button></a>
            </div>
          </div>

          <div class="x_content">
            <br />


            <!--    (/) => en kök dizine çıkma    (../) =>bir üst diziye çık   -->
            <!-- enctype="multipart/form-data" çok önemli resim eklerken dosyaya taşıyor.  -->
            <form action="../netting/islem.php" method="POST" enctype="multipart/form-data"  id="demo-form2" data-parsley-validate class="form-horizontal form-label-left">



              <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name" >Kategori Ad <span class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <input type="text" id="first-name" name="kategori_ad" placeholder="kategori Adını Giriniz" class="form-control col-md-7 col-xs-12">
                </div>
              </div>

            

              <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name" >Aile Kategori <span class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <div class="form-group">
                    <select id="dropCat" onchange="show1()" class="form-control" name="kategori_aile">
                      <option value=""><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Üst kategori seç</font></font></option>

                        <?php 

                        $kategorisor=$db->prepare("SELECT * FROM kategori where kategori_aile=:aile");
                        $kategorisor->execute(array(
                          'aile'=> 0
                        ));
                   

                      while ($kategoricek=$kategorisor->fetch(PDO::FETCH_ASSOC)) { ?>

                      <option value="<?php echo $kategoricek['kategori_id']; ?>">
                        <font style="vertical-align: inherit;"><font style="vertical-align: inherit;">
                          <?php echo $kategoricek['kategori_ad']; ?>
                        </font></font>
                      </option>

                      <?php } ?>
                    </select> 
                    <p><font style="vertical-align: inherit;">
                      <font style="vertical-align: inherit;">Not: Üst Kategoriyi oluşturmak için, Bu açılır menüyü Boş bırakın.</font></font>
                    </p>
                  </div>
                </div>
              </div>


          

              <!-- burası yok ama mantığını öğren  script id=catImage
              <div class="form-group" id="catImage">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">İcon Seç <span class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <input type="file" id="first-name catImage"  name="kategori_icon"  class="form-control col-md-7 col-xs-12">
                </div>
              </div>
              -->

                <!--Alie kategori seçersen icon input alanı gizliyor -->
              <script>
                function show1(){
                   $("#catImage").show();
                   if ($("#dropCat").val() != "") {
                      $("#catImage").hide();
                    } else {
                      $("#catImage").show();
                    }
                 
                }

              </script>





              <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Kategori Durum<span class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <select id="heard" class="form-control" name="kategori_durum" required>

                    <option value="1" >Aktif</option>
                    <option value="0" >Pasif</option>

                  </select>
                </div>
              </div>



              <div class="ln_solid"></div>
              <div class="form-group">
                <div align="right" class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                  <button  type="submit" name="kategoriekle" class="btn btn-success">Ekle</button>
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
