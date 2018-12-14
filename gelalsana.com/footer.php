       
<?php
include 'nedmin/production/foksiyon.php';
include 'nedmin/netting/baglan.php';
///// Belirli veriyi seçme işlemi//////////7
$ayarsor=$db->prepare("SELECT * FROM ayar where ayar_id=:id");
$ayarsor->execute(array(
  'id'=> 0
));
$ayarcek=$ayarsor->fetch(PDO::FETCH_ASSOC);

 ?>

        <!-- ****** Footer Area Start ****** -->
        <footer class="footer_area">
            <div class="container">
                <div class="row">
                    <!-- Single Footer Area Start -->
                    <div class="col-12 col-md-6 col-lg-3">
                        <div class="single_footer_area">
                            <div class="footer-logo">
                                <img src="img/core-img/logo.png" alt="">
                            </div>
                            <div class="copywrite_text d-flex align-items-center">
                                <p>
Copyright &copy;<script>document.write(new Date().getFullYear());</script> <?php echo $ayarcek['ayar_copyright']; ?> <i class="fa fa-heart-o" aria-hidden="true"></i> by <a href="<?php echo $ayarcek['ayar_copyright_link']; ?>" target="_blank"><?php echo $ayarcek['ayar_copyright_ad']; ?></a>
<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --></p>
                            </div>
                        </div>
                    </div>
<?php 
$fotersor=$db->prepare("SELECT * FROM foter where foter_durum=:durum order by foter_sira ASC");
$fotersor->execute(array(
'durum'=>1));
?>
                    <!-- Single Footer Area Start -->
                    <div class="col-12 col-sm-6 col-md-3 col-lg-2">
                        <div class="single_footer_area">
                            <ul class="footer_widget_menu">
                                <?php while ($fotercek=$fotersor->fetch(PDO::FETCH_ASSOC)) { 
                                    if ($fotercek['foter_grup']=='1') {   ?>                                
                                <li><a href="<?php
                                //boş değilse
                                if (!empty($fotercek['foter_url'])){ 
                                    echo $fotercek['foter_url'];
                                } else {
                                    echo "sayfa-".seo($fotercek['foter_ad']);
                                } ?>"><?php echo $fotercek['foter_ad']; ?></a></li>
                                <?php } } ?>
                               
                            </ul>
                        </div>
                    </div>
<?php 
$fotersor=$db->prepare("SELECT * FROM foter where foter_durum=:durum order by foter_sira ASC");
$fotersor->execute(array(
'durum'=>1));
?>
                    <!-- Single Footer Area Start -->
                    <div class="col-12 col-sm-6 col-md-3 col-lg-2">
                        <div class="single_footer_area">
                            <ul class="footer_widget_menu">
                                <?php while ($fotercek=$fotersor->fetch(PDO::FETCH_ASSOC)) { 
                                    if ($fotercek['foter_grup']=='0') {   ?>                                
                                <li><a href="<?php
                                //boş değilse
                                if (!empty($fotercek['foter_url'])){ 
                                    echo $fotercek['foter_url'];
                                } else {
                                    echo "sayfa-".seo($fotercek['foter_ad']);
                                } ?>"><?php echo $fotercek['foter_ad']; ?></a></li>
                                <?php } } ?>
                               
                            </ul>
                        </div>
                    </div>
                                   
                </div>
                <div class="line"></div>



<?php 

$smedyasor=$db->prepare("SELECT * FROM smedya where smedya_durum=:durum order by smedya_sira ASC");
$smedyasor->execute(array(
    'durum'=>1)); 

 ?>

                <!-- Footer Bottom Area Start -->
                <div class="footer_bottom_area">
                    <div class="row">
                        <div class="col-12">
                            <div class="footer_social_area text-center">
                                <?php while ($smedyacek=$smedyasor->fetch(PDO::FETCH_ASSOC)) {  ?>

                                <a href="<?php echo $smedyacek['smedya_url'];?>"><i class="<?php echo $smedyacek['smedya_class']; ?>" aria-hidden="true"></i></a>
                                <!--<a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a>
                                <a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a>
                                <a href="#"><i class="fa fa-linkedin" aria-hidden="true"></i></a>-->
                            <?php } ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </footer>
        <!-- ****** Footer Area End ****** -->
    </div>
    <!-- /.wrapper end -->

    <!-- jQuery (Necessary for All JavaScript Plugins) -->
    <script src="js/jquery/jquery-2.2.4.min.js"></script>
    <!-- Popper js -->
    <script src="js/popper.min.js"></script>
    <!-- Bootstrap js -->
    <script src="js/bootstrap.min.js"></script>
    <!-- Plugins js -->
    <script src="js/plugins.js"></script>
    <!-- Active js -->
    <script src="js/active.js"></script>

    <script  src="js/index.js"></script>


</body>

</html>