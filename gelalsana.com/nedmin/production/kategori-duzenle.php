<?php 
include 'header.php';
/////////////// //////////////////
$kategorisor=$db->prepare("SELECT * FROM kategori where kategori_id=:id");
$kategorisor->execute(array(
  'id'=> $_GET['kategori_id']
));
$say=$kategorisor->rowCount();
$kategoricek=$kategorisor->fetch(PDO::FETCH_ASSOC);
?>
<!-- page content -->
<div class="right_col" role="main">
  <div class="">
    <div class="clearfix"></div>
    <div class="row">
      <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
          <div class="x_title">
            <h2>Photo Kategori Düzenleme <small>

              <?php 
              if ($_GET['durum']=="ok"){?>

              <b style="color: green;">İşlem Başarılı...</b>

              <?php } elseif ($_GET['durum']=="no") { ?>

              <b style="color:red;">İşlem Başarısız...</b>

              <?php } ?>


            </small></h2>
            <div class="clearfix"></div>
            <div align="right">
              <a href="kategori.php" ><button class="btn btn-success btn-xs">Geri Dön</button></a>
            </div>
          </div>

          <div class="x_content">
            <br />


            <form action="../netting/islem.php" method="POST" id="demo-form2" enctype="multipart/form-data" data-parsley-validate class="form-horizontal form-label-left">



              <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name" >Kategori Ad <span class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <input type="text" id="first-name" name="kategori_ad" value="<?php echo $kategoricek['kategori_ad']; ?>" class="form-control col-md-7 col-xs-12">
                </div>
              </div>


              <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Kategori Durum <span class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <select id="header" class="form-control" name="kategori_durum" required="">

                    <!-- Kısa İf KULLANIMI -->
                    <option value="1" <?php echo $kategoricek['kategori_durum']=='1' ? 'selected""': ''; ?>>Aktif</option>
                    <option value="0" <?php if($kategoricek['kategori_durum']=='0'){ echo 'selected=""';} ?>>Pasif</option>     
                  </select>
                </div>
              </div>









              <?php 

              if ($kategoricek['kategori_aile']==0) { ?>
                <!--
              <div class="form-group" id="catImage2">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Kategori icon <span class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">


                  <img height="100" width="100" src="../../<?php echo $kategoricek['kategori_icon']; ?>" alt="">

                </div>

              </div>

              
              <div class="form-group" id="catImage">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">İcon Seç <span class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <input type="file" id="first-name catImage"  name="kategori_icon"  class="form-control col-md-7 col-xs-12">
                </div>
              </div>
              -->


              <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name" >Aile Kategori <span class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <div class="form-group">
                    <select id="dropCat" onchange="show1()" class="form-control" name="kategori_aile">


                      <option value=""><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Üst kategori seç</font></font>
                      </option>

                      <?php 

                      $kategorisor2=$db->prepare("SELECT * FROM kategori where kategori_aile=:aile");
                      $kategorisor2->execute(array(
                        'aile'=> 0
                      ));


                      while ($kategoricek2=$kategorisor2->fetch(PDO::FETCH_ASSOC)) { ?>
                      
                      <option value="<?php echo $kategoricek2['kategori_id']; ?>">
                        <font style="vertical-align: inherit;"><font style="vertical-align: inherit;">
                          <?php echo $kategoricek2['kategori_ad']; ?>
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



              <!--
              <script>

                function show1(){ 
                 $("#catImage").show();
                 $("#catImage2").show()
                 if ($("#dropCat").val() != "") {
                  $("#catImage").hide();
                  $("#catImage2").hide();
                } else {
                  $("#catImage").show();
                  $("#catImage2").show();
                }

              }

            </script>
            -->



            <?php  } else { ?>




            <div class="form-group">
              <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name" >Aile Kategori <span class="required">*</span>
              </label>
              <div class="col-md-6 col-sm-6 col-xs-12">
                <div class="form-group">
                  <select id="dropCat" onchange="show1()" class="form-control" name="kategori_aile2">




                    <?php 

                    $kategorisor2=$db->prepare("SELECT * FROM kategori where kategori_id=:id");
                    $kategorisor2->execute(array(
                      'id'=> $kategoricek['kategori_aile']
                    ));
                    $kategoricek2=$kategorisor2->fetch(PDO::FETCH_ASSOC)

                    ?>

                    <!-- Burada ki kategori_id yukarda olana ait -->
                    <option value="<?php echo $kategoricek['kategori_aile']; ?>"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;"><?php echo $kategoricek2['kategori_ad']; ?></font></font>
                    </option>








                    <?php

                    $kategorisor3=$db->prepare("SELECT * FROM kategori where kategori_aile=:aile");
                    $kategorisor3->execute(array(
                      'aile'=> 0
                    ));


                    while ($kategoricek3=$kategorisor3->fetch(PDO::FETCH_ASSOC)) {

                      if ($kategoricek['kategori_aile'] != $kategoricek3['kategori_id']) { ?>


                      <option value="<?php echo $kategoricek3['kategori_id']; ?>">
                        <font style="vertical-align: inherit;"><font style="vertical-align: inherit;">
                          <?php echo $kategoricek3['kategori_ad']; ?>
                        </font></font>
                      </option>








                      <?php  } } ?>



                      <option value=""><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Üst kategori seç</font></font>
                      </option>



                    </select> 
                    <p><font style="vertical-align: inherit;">
                      <font style="vertical-align: inherit;">Not: Üst Kategoriyi oluşturmak için, Bu açılır menüyü Boş bırakın.</font></font>
                    </p>
                  </div>
                </div>
              </div>






              <!--
              <div class="form-group" id="catImage">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">İcon Seç <span class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <input type="file" id="first-name catImage"  name="kategori_icon"  class="form-control col-md-7 col-xs-12">
                </div>
              </div>
              -->







              <?php } ?>


              <script>
                $('#catImage').hide();
                
                  function show1(){
                     $("#catImage").show();                
                     if ($("#dropCat").val() != "") {
                      $("#catImage").hide();
                    } else {
                      $("#catImage").show();
                    }

                  }

            </script>




            <div class="ln_solid"></div>
            <div class="form-group">

              <input type="hidden" name="kategori_id" value="<?php echo $kategoricek['kategori_id']; ?>">
              <input type="hidden" name="kategori_aile" value="<?php echo $kategoricek['kategori_aile']; ?>">

              <div align="right" class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                <button  type="submit" name="kategoriduzenle" class="btn btn-success">Guncelle</button>
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
