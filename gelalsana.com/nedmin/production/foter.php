 <?php 
 include 'header.php';
 include '../netting/baglan.php';
  // Belirli veriyi seçme işlemi
 $fotersor=$db->prepare("SELECT * FROM foter ORDER BY foter_grup DESC");
 $fotersor->execute();
 ?>

 
 <!-- page content -->
 <div class="right_col" role="main">
  <div class="">
    <div class="clearfix"></div>
    <div class="row">
      <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
          <div class="x_title">
            <h2>Foter Link Tablosu<small>
              <?php 
              if ($_GET['durum']=="ok" or $_GET['sil']=="ok"){?>

              <b style="color: green;">İşlem Başarılı...</b>

              <?php } elseif ($_GET['durum']=="no" or $_GET['sil']=="no") { ?>

              <b style="color:red;">İşlem Başarısız...</b>

              <?php } ?>


            </small></h2>
            <div class="clearfix"> </div>
            <div align="right">
              <a href="foter-ekle.php" ><button class="btn btn-success btn-xs">Yeni Ekle</button></a>
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
                while ($fotercek=$fotersor->fetch(PDO::FETCH_ASSOC)) { $say++ ?>
                <tr>
                  <td><?php echo $say ?></td>
                  <td><?php echo $fotercek['foter_ad']; ?></td>
                  <td><?php 

                  if ($fotercek['foter_grup']=='1'){
                      echo "Sol";
                  } else {
                      echo "Sağ";
                  } ?> </td>
                  <td><?php echo $fotercek['foter_sira']; ?></td>
                  <td><center><?php 
                  if ($fotercek['foter_durum']==1){?>
                  <button class="btn btn-success btn-xs">Aktif</button>
                  <?php } else {?>
                  <button class="btn btn-danger btn-xs">Pasif</button>
                  <?php } ?></center></td>
                  <td><center>
                    <a href="foter-duzenle.php?foter_id=<?php echo $fotercek['foter_id']; ?>">
                      <button class="btn btn-primary btn-xs">Düzenle</button>
                    </a>
                  </center></td>
                  <td><center>
                    <a href="../netting/islem.php?foter_id=<?php echo $fotercek['foter_id']; ?>&fotersil=ok">
                      <button class="btn btn-danger btn-xs">Sil</button>
                    </a>
                  </center></td>
                </tr>

                <?php } ?>

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
