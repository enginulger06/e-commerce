<?php  
include 'header.php';
include '../netting/baglan.php';
  // Belirli veriyi seçme işlemi
$slidersor=$db->prepare("SELECT * FROM slider ORDER BY slider_grup ASC");
$slidersor->execute();
?>
<!-- page content -->
<div class="right_col" role="main">
  <div class="">
    <div class="clearfix"></div>
    <div class="row">
      <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
          <div class="x_title">
            <h2>Slider Listeleme <small>

              <?php 
              if ($_GET['durum']=="ok" or $_GET['sil']=="ok"){?>

              <b style="color: green;">İşlem Başarılı...</b>

              <?php } elseif ($_GET['durum']=="no" or $_GET['sil']=="no") { ?>

              <b style="color:red;">İşlem Başarısız...</b>

              <?php } ?>
            </small></h2>
            <div class="clearfix"> </div>
            <div align="right">
              <a href="slider-ekle.php" ><button class="btn btn-success btn-xs">Yeni Ekle</button></a>
            </div>
          </div>
          <div class="x_content">
            <br />
            <!-- div başlangıç -->
            <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
              <!-- thead kısmı başlık -->
              <thead>
                <tr>
                  <th>Sıra No</th>
                  <th>Ad</th>
                  <th>Grup</th>
                  <th>Sıra</th>
                  <th>Durum</th>
                  <th></th>
                  <th></th>
                </tr>
              </thead>
              <!-- tbody kısmı veriler -->
              <tbody>
                <?php
                $say=0; 
                while ($slidercek=$slidersor->fetch(PDO::FETCH_ASSOC)) { $say++ ?>
                <tr>
                  <td width="20"><?php echo $say ?></td>
                  <td><?php echo $slidercek['slider_ad']; ?></td>
                  <td><?php if ($slidercek['slider_grup']==1) {
                    echo "Sol";
                  }elseif ($slidercek['slider_grup']==2) {
                    echo "Orta";
                  }elseif ($slidercek['slider_grup']==3) {
                    echo "Sağ";
                  } ?></td>
                  <td><?php echo $slidercek['slider_sira']; ?></td>
                  <td><center><?php 
                  if ($slidercek['slider_durum']==1){?>
                  <button class="btn btn-success btn-xs">Aktif</button>
                  <?php } else {?>
                  <button class="btn btn-danger btn-xs">Pasif</button>
                  <?php } ?></center></td>
                  <td><center>
                    <a href="slider-duzenle.php?slider_id=<?php echo $slidercek['slider_id']; ?>">
                      <button class="btn btn-primary btn-xs">Düzenle</button>
                    </a>
                  </center></td>
                  <td><center>
                    <a href="../netting/islem.php?slider_id=<?php echo $slidercek['slider_id']; ?>&slidersil=ok">
                      <button class="btn btn-danger btn-xs">Sil</button>
                    </a>
                  </center></td>

                </tr>

                <?php } ?>

              </tbody>
            </table>
            <!-- div kapanış -->
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
