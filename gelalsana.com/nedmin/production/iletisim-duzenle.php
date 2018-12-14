<?php 
include 'header.php';
/////////////// //////////////////
$iletisimsor=$db->prepare("SELECT * FROM iletisim where iletisim_id=:id");
$iletisimsor->execute(array(
  'id'=> $_GET['iletisim_id']
));
$say=$iletisimsor->rowCount();
$iletisimcek=$iletisimsor->fetch(PDO::FETCH_ASSOC);
?>
<!-- page content -->
<div class="right_col" role="main">
  <div class="">
    <div class="clearfix"></div>
    <div class="row">
      <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
          <div class="x_title">
            <h2>iletisim Düzenleme <small>
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

          <div class="x_content">
            <br />
            <!--    (/) => en kök dizine çıkma    (../) =>bir üst diziye çık   -->
            <form action="../netting/islem.php" method="POST" id="demo-form2" data-parsley-validate class="form-horizontal form-label-left">


              <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">iletisim Ad <span class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <input type="text" id="first-name" name="iletisim_ad" value="<?php echo $iletisimcek['iletisim_ad']; ?>"  class="form-control col-md-7 col-xs-12">
                </div>
              </div>

              <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">iletisim icon <span class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <input type="text" id="first-name" name="iletisim_icon" value="<?php echo $iletisimcek['iletisim_icon']; ?>"  class="form-control col-md-7 col-xs-12">
                </div>
              </div>

              <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">iletisim icerik <span class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <input type="text" id="first-name" name="iletisim_icerik" value="<?php echo $iletisimcek['iletisim_icerik']; ?>"  class="form-control col-md-7 col-xs-12">
                </div>
              </div>

              <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">iletisim Url <span class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <input type="text" id="first-name" name="iletisim_url" value="<?php echo $iletisimcek['iletisim_url']; ?>"  class="form-control col-md-7 col-xs-12">
                </div>
              </div>

              <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">iletisim Sira <span class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <input type="text" id="first-name" name="iletisim_sira" value="<?php echo $iletisimcek['iletisim_sira']; ?>"  class="form-control col-md-7 col-xs-12">
                </div>
              </div>

              <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">iletisim Durum <span class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <select id="header" class="form-control" name="iletisim_durum" required="">

                    <!-- Kısa İf KULLANIMI -->
                    <option value="1" <?php echo $iletisimcek['iletisim_durum']=='1' ? 'selected""': ''; ?>>Aktif</option>
                    <option value="0" <?php if($iletisimcek['iletisim_durum']=='0'){ echo 'selected=""';} ?>>Pasif</option>

                  </select>
                </div>
              </div>                    
              <div class="ln_solid"></div>
              <div class="form-group">

                <input type="hidden" name="iletisim_id" value="<?php echo $iletisimcek['iletisim_id']; ?>">

                <div align="right" class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                  <button  type="submit" name="iletisimduzenle" class="btn btn-success">Guncelle</button>
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
