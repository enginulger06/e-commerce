<?php  
include 'header.php';
$menusor=$db->prepare("SELECT * FROM menu where menu_id=:id");
$menusor->execute(array(
  'id'=> $_GET['menu_id']
));
$say=$menusor->rowCount();
$menucek=$menusor->fetch(PDO::FETCH_ASSOC);
?>
<!-- page content -->
<div class="right_col" role="main">
  <div class="">
    <div class="clearfix"></div>
    <div class="row">
      <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
          <div class="x_title">
            <h2>Menü Düzenleme <small>
              <?php 
              if ($_GET['durum']=="ok"){?>
              <b style="color: green;">İşlem Başarılı...</b>
              <?php } elseif ($_GET['durum']=="no") { ?>
              <b style="color:red;">İşlem Başarısız...</b>
              <?php } ?>
            </small></h2>
            <div class="clearfix"></div>
            <div align="right">
              <a href="menu.php" ><button class="btn btn-success btn-xs">Geri Dön</button></a>
            </div>
          </div>
          <div class="x_content">
            <br />
            <!--    (/) => en kök dizine çıkma    (../) =>bir üst diziye çık   -->
            <form action="../netting/islem.php" method="POST" id="demo-form2" data-parsley-validate class="form-horizontal form-label-left">

              <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Sayfa Linki <span class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <input type="text" id="first-name"  name="" value="<?php echo $ayarcek['ayar_url'] ?>/#<?php echo seo($menucek['menu_ad']); ?>" class="form-control col-md-7 col-xs-12">
                </div>
              </div>

              <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Menü Ad <span class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <input type="text" id="first-name" name="menu_ad" value="<?php echo $menucek['menu_ad']; ?>"  class="form-control col-md-7 col-xs-12">
                </div>
              </div>

              <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Menü Href <span class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <input type="text" id="first-name" name="menu_href" value="<?php echo $menucek['menu_href']; ?>"  class="form-control col-md-7 col-xs-12">
                </div>
              </div>


              <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Menu Sira <span class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <input type="text" id="first-name" name="menu_sira" value="<?php echo $menucek['menu_sira']; ?>"  class="form-control col-md-7 col-xs-12">
                </div>
              </div>

              <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Menü Durum <span class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <select id="header" class="form-control" name="menu_durum" required="">
                    <option value="1" <?php echo $menucek['menu_durum']=='1' ? 'selected""': ''; ?>>Aktif</option>
                    <option value="0" <?php if($menucek['menu_durum']=='0'){ echo 'selected=""';} ?>>Pasif</option>
                  </select>
                </div>
              </div>

              <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Menu Seo Url <span class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <input type="text" id="first-name" name="menu_seourl" value="<?php echo $menucek['menu_seourl']; ?>"  class="form-control col-md-7 col-xs-12">
                </div>
              </div>

              <div class="ln_solid"></div>
              <div class="form-group">
                <input type="hidden" name="menu_id" value="<?php echo $menucek['menu_id']; ?>">
                <div align="right" class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                  <button  type="submit" name="menuduzenle" class="btn btn-success">Guncelle</button>
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
