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
            <h2>Urun Ekleme <small>
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
              <a href="urun.php" ><button class="btn btn-success btn-xs">Geri Dön</button></a>
            </div>
          </div>

          <div class="x_content">
            <br />

            <?php 

            function load_country(){
             include '../netting/baglan.php';
                          // Belirli veriyi seçme işlemi
             $kategorisor=$db->prepare("SELECT * FROM kategori where kategori_aile=:aile order by kategori_sira ASC");
             $kategorisor->execute(array(
               'aile'=> 0 
             ));
             $output='';


             while ($kategoricek=$kategorisor->fetch(PDO::FETCH_ASSOC)) {

              $output .= "<option value='".$kategoricek['kategori_id']."'>".$kategoricek['kategori_ad']."</option>";
            }
            return $output;
          }
          ?>


          <!--    (/) => en kök dizine çıkma    (../) =>bir üst diziye çık   -->
          <!-- enctype="multipart/form-data" çok önemli resim eklerken dosyaya taşıyor.  -->
          <form action="../netting/islem.php" method="POST" enctype="multipart/form-data"  id="demo-form2" data-parsley-validate class="form-horizontal form-label-left">

            <div class="form-group">
              <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Resim Seç (800x800)<span class="required">*</span>
              </label>
              <div class="col-md-6 col-sm-6 col-xs-12">
                <input type="file" id="first-name"  name="urun_resimyol"  class="form-control col-md-7 col-xs-12">
              </div>
            </div>



            <div class="form-group">
              <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Ürün Ad <span class="required">*</span>
              </label>
              <div class="col-md-6 col-sm-6 col-xs-12">
                <input type="text" id="first-name" name="urun_ad" class="form-control col-md-7 col-xs-12">
              </div>
            </div>

            <div class="form-group">
              <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Ürün Fiyatı <span class="required">*</span>
              </label>
              <div class="col-md-6 col-sm-6 col-xs-12">
                <input type="text" id="first-name" name="urun_fiyat" class="form-control col-md-7 col-xs-12">
              </div>
            </div>






            <br>


            <div class="form-group">
              <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name" >Üst Kategori <span class="required">*</span>
              </label>
              <div class="col-md-6 col-sm-6 col-xs-12">


                <select id="heard2"  class="form-control"  name="kategori_id"  required>

                  <option value="0"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Üst kategori seç</font></font></option>

                  <?php echo load_country(); ?>

                </select>                            
              </div>
            </div>


            <br>


            <script>

             $(function(){
              $("#heard2").on("change",function(){
                var id = $(this).val();
                $.ajax({
                  method: 'POST',
                  data: {id:id},
                  url: 'ajax.php',
                  dataType: "text",
                  success:function(data){
                    $('#alt_kategori_id').html(data);
                  }
                });
              });
            });
          </script>




          <div class="form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name" >Alt Kategori <span class="required">*</span>
            </label>
            <div class="col-md-6 col-sm-6 col-xs-12">

              <select id="alt_kategori_id"  class="form-control"  name="alt_kategori_id" required>

                <option value="">Alt kategori seç</option>
              </select>                            
            </div>
          </div>





          <br>

          <div class="form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Ürün Sıra <span class="required">*</span>
            </label>
            <div class="col-md-6 col-sm-6 col-xs-12">
              <input type="text" id="first-name" name="urun_sira" class="form-control col-md-7 col-xs-12">
            </div>
          </div>




          <div class="form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">urun Durum<span class="required">*</span>
            </label>
            <div class="col-md-6 col-sm-6 col-xs-12">
              <select id="heard" class="form-control" name="urun_durum" required>

                <option value="1" >Aktif</option>
                <option value="0" >Pasif</option>

              </select>
            </div>
          </div>



          <div class="ln_solid"></div>
          <div class="form-group">
            <div align="right" class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
              <button  type="submit" name="urunekle" class="btn btn-success">Ekle</button>
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
