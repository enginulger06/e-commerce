<?php 
include 'header.php';
include '../netting/baglan.php';
  // Belirli veriyi seçme işlemi
$alt_kategorisor=$db->prepare("SELECT * FROM alt_kategori ORDER BY alt_kategori_id ASC");
$alt_kategorisor->execute();

?>


<!-- page content -->
<div class="right_col" role="main">
  <div class="">
    <div class="clearfix"></div>
    <div class="row">
      <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
          <div class="x_title">
            <h2>Alt Kategori Listeleme <small>
             <?php 
             if ($_GET['durum']=="ok" or $_GET['sil']=="ok"){?>

             <b style="color: green;">İşlem Başarılı...</b>

             <?php } elseif ($_GET['durum']=="no" or $_GET['sil']=="no") { ?>

             <b style="color:red;">İşlem Başarısız...</b>

             <?php } ?>


           </small></h2>
           <div class="clearfix"> </div>
           <div align="right">
            <a href="alt_kategori-ekle.php" ><button class="btn btn-success btn-xs">Alt Kategori Ekle</button></a><br/>
            <a href=".php" ><button class="btn btn-success btn-xs">Geri Dön</button></a>
          </div>
        </div>

        <div class="x_content">
          <br />


          <style>
          table { table-layout: fixed; word-break: break-all; }
          table th, table td { overflow: hidden; }
        </style>

        <!-- div başlangıç -->
        <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
          <!-- thead kısmı başlık -->
          <thead>
            <tr>
              <th>Sıra No</th>
              <th>Alt kategori Ad</th>
              <th>Alt kategori filter</th>
              <th></th>
              <th></th>
            </tr>
          </thead>
          <!-- tbody kısmı veriler -->
          <tbody>
            <?php $say=0;
            while ($alt_kategoricek=$alt_kategorisor->fetch(PDO::FETCH_ASSOC)) { $say++ ?>

            <tr>
              <td><?php echo $say ?></td>
              <td><?php echo $alt_kategoricek['alt_kategori_ad']; ?></td>
              <td><?php echo $alt_kategoricek['alt_kategori_filter']; ?></td>
              <td><center>
                <a href="alt_kategori-duzenle.php?alt_kategori_id=<?php echo $alt_kategoricek['alt_kategori_id']; ?>">
                  <button class="btn btn-primary btn-xs">Düzenle</button>
                </a>
              </center></td>

              <td><center>
                <a href="../netting/islem.php?alt_kategori_id=<?php echo $alt_kategoricek['alt_kategori_id']; ?>&alt_kategorisil=ok">
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
