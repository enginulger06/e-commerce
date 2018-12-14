<?php 
  include 'header.php';
  // Belirli veriyi seçme işlemi
  $kullanicisor=$db->prepare("SELECT * FROM kullanici");
  $kullanicisor->execute();

?>


        <!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <div class="clearfix"></div>
            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Kullanıcı Listeleme <small>

                      <?php 
                          if ($_GET['durum']=="ok" or $_GET['sil']=="ok"){?>

                          <b style="color: green;">İşlem Başarılı...</b>

                          <?php } elseif ($_GET['durum']=="no" or $_GET['sil']=="no") { ?>

                          <b style="color:red;">İşlem Başarısız...</b>

                          <?php } ?>


                  </small></h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                      <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                        <ul class="dropdown-menu" role="menu">
                          <li><a href="#">Settings 1</a>
                          </li>
                          <li><a href="#">Settings 2</a>
                          </li>
                        </ul>
                      </li>
                      <li><a class="close-link"><i class="fa fa-close"></i></a>
                      </li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>

                  <div class="x_content">
                    <br />
                     <?php 
                      // pythonda split işlemi 2018-02-25 15:38:06
                      //boşluk işlemi ile diziye atıyor aşağıda $zaman[0]=2018-02-25
                      $zaman=explode(" ", $kullanicicek['kullanici_zaman']);
                        ?>

                    <!-- div başlangıç -->
                         <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                      <!-- thead kısmı başlık -->
                      <thead>
                        <tr>
                          <th>Kayıt Tarihi</th>
                          <th>Ad Soyad</th>
                          <th>Kullanıcı</th>
                          <th>Yetkisi</th>
                          <th></th>
                          <th></th>
                        </tr>
                      </thead>
                      <!-- tbody kısmı veriler -->
                      <tbody>


                        <?php while ($kullanicicek=$kullanicisor->fetch(PDO::FETCH_ASSOC)) {?>
                        
                        <tr>
                          <td><?php echo explode(" ",$kullanicicek['kullanici_zaman'])[0]; ?></td>
                          <td><?php echo $kullanicicek['kullanici_adsoyad']; ?></td>
                          <td><?php echo $kullanicicek['kullanici_mail']; ?></td>
                          <td><?php echo $kullanicicek['kullanici_yetki']; ?></td>
                          <td><center>
                            <a href="kullanici-duzenle.php?kullanici_id=<?php echo $kullanicicek['kullanici_id']; ?>">
                              <button class="btn btn-primary btn-xs">Düzenle</button>
                            </a>
                          </center></td>

                          <td><center>
                            <a href="../netting/islem.php?kullanici_id=<?php echo $kullanicicek['kullanici_id']; ?>&kullanicisil=ok">
                              <button class="btn btn-danger btn-xs">Sil</button>
                            </a>
                          </center></td>
          
                        </tr>

                        <?php } 



                        ?>
                        
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
