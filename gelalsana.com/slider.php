<?php include 'nedmin/netting/baglan.php'; ?>


        <section class="offer_area ">
            <div class="container-fluid h-100">
                <div class="row h-100 align-items-center justify-content-end">
                    <div class="col-12 col-sm-12 col-md-12 col-lg-12" style="padding: 0;">
                    <div id="demo" class="carousel slide" data-ride="carousel">
                      <ul class="carousel-indicators">
                        <li data-target="#demo" data-slide-to="0" class="active"></li>
                        <li data-target="#demo" data-slide-to="1"></li>
                        <li data-target="#demo" data-slide-to="2"></li>
                      </ul>
                      <div class="carousel-inner">
                        
                        <div class="carousel-item active">
                          <section class="top-discount-area d-flex align-items-center">
                                <!-- Single Discount Area -->
                                <?php 

                                $slidersor=$db->prepare("SELECT * FROM slider where slider_grup=:grup order by slider_sira ASC");
                                $slidersor->execute(array(
                                'grup'=>1 ));

                                while ($slidercek=$slidersor->fetch(PDO::FETCH_ASSOC)) { ?>
                                <div class="single-discount-area">
                                    <h5><a href="#"><?php echo $slidercek['slider_ad']; ?></a></h5>
                                    <?php echo $slidercek['slider_icerik'] ?>
                                </div>
                                <?php }  ?>
                            </section>  
                        </div>
                       
                        <div class="carousel-item">
                            <section class="top-discount-area d-flex align-items-center">
                                <!-- Single Discount Area -->
                                <?php 
                                $slidersor=$db->prepare("SELECT * FROM slider where slider_grup=:grup order by slider_sira ASC");
                                $slidersor->execute(array(
                                'grup'=>2 ));

                                while ($slidercek=$slidersor->fetch(PDO::FETCH_ASSOC)) { ?>
                                       
                                <div class="single-discount-area">
                                    <h5><a href="#"><?php echo $slidercek['slider_ad']; ?></a></h5>
                                    <?php echo $slidercek['slider_icerik'] ?>
                                </div>
                                <?php  } ?>
                            </section>
                        </div>
                      
                        <div class="carousel-item">
                            <section class="top-discount-area d-flex align-items-center">
                                <!-- Single Discount Area -->
                                <?php 
                                $slidersor=$db->prepare("SELECT * FROM slider where slider_grup=:grup order by slider_sira ASC");
                                $slidersor->execute(array(
                                'grup'=>3 ));

                                while ($slidercek=$slidersor->fetch(PDO::FETCH_ASSOC)) { ?>
                                    
                                <div class="single-discount-area">
                                    <h5><a href="#"><?php echo $slidercek['slider_ad']; ?></a></h5>
                                    <?php echo $slidercek['slider_icerik'] ?>
                                </div>
                                <?php } ?>
                                
                            </section>
                        </div>
                  
                      </div>
                      <a class="carousel-control-prev" href="#demo" data-slide="prev" style="width: 5%">
                        <span class="carousel-control-prev-icon"></span>
                      </a>
                      <a class="carousel-control-next" href="#demo" data-slide="next" style="width: 5%">
                        <span class="carousel-control-next-icon"></span>
                      </a>
                    </div>
                    </div>

                </div>
            </div>
        </section>
