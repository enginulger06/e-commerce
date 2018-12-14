 <?php 
 include 'header.php';
 include '../netting/baglan.php';
  // Belirli veriyi seçme işlemi
 $tanitimsor=$db->prepare("SELECT * FROM tanitim ORDER BY tanitim_sira ASC");
 $tanitimsor->execute();
 ?>
 
 
 <!-- page content -->
 <div class="right_col" role="main">
  <div class="">
    <div class="clearfix"></div>
    <div class="row">
      <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
          <div class="x_title">
            <h2>Tanitim Tablosu<small>
              <?php 
              if ($_GET['durum']=="ok" or $_GET['sil']=="ok"){?>

              <b style="color: green;">İşlem Başarılı...</b>

              <?php } elseif ($_GET['durum']=="no" or $_GET['sil']=="no") { ?>

              <b style="color:red;">İşlem Başarısız...</b>

              <?php } ?>


            </small></h2>
            <div class="clearfix"> </div>
            <div align="right">
              <a href="tanitim-ekle.php" ><button class="btn btn-success btn-xs">Yeni Ekle</button></a>
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
                  <th>Başlık</th>
                  <th>active</th>
                  <th>Sira</th>
                  <th>Durum</th>
                  <th></th>
                  <th></th>
                </tr>
              </thead>
              <!-- tbody kısmı veriler -->
              <tbody>
                <?php
                $say=0;
                while ($tanitimcek=$tanitimsor->fetch(PDO::FETCH_ASSOC)) { $say++ ?>
                <tr>
                  <td><?php echo $say ?></td>
                  <td><?php echo $tanitimcek['tanitim_ad']; ?></td>
                  <td><?php echo $tanitimcek['tanitim_baslik']; ?></td>
                  <td><?php echo $tanitimcek['tanitim_active']; ?></td>
                  <td><?php echo $tanitimcek['tanitim_sira']; ?></td>
                  <td><center><?php 
                  if ($tanitimcek['tanitim_durum']==1){?>
                  <button class="btn btn-success btn-xs">Aktif</button>
                  <?php } else {?>
                  <button class="btn btn-danger btn-xs">Pasif</button>
                  <?php } ?></center></td>
                  <td><center>
                    <a href="tanitim-duzenle.php?tanitim_id=<?php echo $tanitimcek['tanitim_id']; ?>">
                      <button class="btn btn-primary btn-xs">Düzenle</button>
                    </a>
                  </center></td>
                  <td><center>
                    <a href="../netting/islem.php?tanitim_id=<?php echo $tanitimcek['tanitim_id']; ?>&tanitimsil=ok">
                      <button class="btn btn-danger btn-xs">Sil</button>
                    </a>
                  </center></td>
                </tr>
                <?php }  ?>

              </tbody>
            </table>
            <!-- div kapanış -->
            <hr>
            <br/>
            <br/>
            <hr>
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
