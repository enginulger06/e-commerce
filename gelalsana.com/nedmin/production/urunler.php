<?php 
include 'header.php';
include '../netting/baglan.php';
  // Belirli veriyi seçme işlemi
$urunsor=$db->prepare("SELECT * FROM urun order by urun_id ASC");
$urunsor->execute();
?>


<!-- page content -->
<div class="right_col" role="main">
  <div class="">
    <div class="clearfix"></div>
    <div class="row">
      <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
          <div class="x_title">
            <h2>Ürünler Listeleme <small>
              <?php 
              if ($_GET['durum']=="ok" or $_GET['sil']=="ok"){?>
              <b style="color: green;">İşlem Başarılı...</b>
              <?php } elseif ($_GET['durum']=="no" or $_GET['sil']=="no") { ?>
              <b style="color:red;">İşlem Başarısız...</b>
              <?php } ?>
            </small></h2>
            <div class="clearfix"> </div>
            <div align="right">
              <a href="urun-ekle.php" ><button class="btn btn-success btn-xs">Yeni Ekle</button></a>
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
                  <th>Ürün Detay</th>
                  <th>Ürün Resim</th>
                  <th>Ürün Sira</th>
                  <th>Ürün Durum</th>
                  <th></th>
                  <th></th>
                </tr>
              </thead>
              <!-- tbody kısmı veriler -->
              <tbody>
                <?php
                $say=0;
                while ($uruncek=$urunsor->fetch(PDO::FETCH_ASSOC)) { $say++ ?>
                <tr>
                  <td width="10"><?php echo $say ?></td>                                             
                  <td width="10"><?php echo $uruncek['urun_detay']; ?></td>
                  <td width="50"><img width="200" src="../../<?php echo $uruncek['urun_resimyol']; ?>"</td>
                  <td width="10"><?php echo $uruncek['urun_sira']; ?></td>
                  <td width="10"><center><?php 
                  if ($uruncek['urun_durum']==1){?>
                  <button class="btn btn-success btn-xs">Aktif</button>
                  <?php } else {?>
                  <button class="btn btn-danger btn-xs">Pasif</button>
                  <?php } ?></center></td>
                  <td width="10"><center>
                    <a href="urun-duzenle.php?urun_id=<?php echo $uruncek['urun_id']; ?>">
                      <button class="btn btn-primary btn-xs">Düzenle</button>
                    </a>
                  </center></td>
                  <td width="10"><center>
                    <a href="../netting/islem.php?urun_id=<?php echo $uruncek['urun_id']; ?>&urunsil=ok">
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
