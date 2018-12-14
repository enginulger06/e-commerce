
<?php include 'header.php'; ?>
<?php include 'slider.php'; ?>        
<?php 
$kategorisor=$db->prepare("SELECT * FROM kategori where kategori_durum=:durum and kategori_aile=:aile order by kategori_sira ASC");
$kategorisor->execute(array(
    'durum'=>1,
    'aile'=>0
     )); 
?>


        <!-- ****** Quick View Modal Area Start ****** -->
        <div class="modal fade" id="quickview" tabindex="-1" role="dialog" aria-labelledby="quickview" aria-hidden="true">
            <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
                <div class="modal-content">
                    <button type="button" class="close btn" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>

                    <div class="modal-body">
                        <div class="quickview_body">
                            <div class="container">
                                <div class="row">
                                    <div class="col-12 col-lg-5">
                                        <div class="quickview_pro_img">
                                            <img src="img/product-img/product-1.jpg" alt="">
                                        </div>
                                    </div>
                                    <div class="col-12 col-lg-7">
                                        <div class="quickview_pro_des">
                                            <h4 class="title">Boutique Silk Dress</h4>
                                            <div class="top_seller_product_rating mb-15">
                                                <i class="fa fa-star" aria-hidden="true"></i>
                                                <i class="fa fa-star" aria-hidden="true"></i>
                                                <i class="fa fa-star" aria-hidden="true"></i>
                                                <i class="fa fa-star" aria-hidden="true"></i>
                                                <i class="fa fa-star" aria-hidden="true"></i>
                                            </div>
                                            <h5 class="price">$120.99 <span>$130</span></h5>
                                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Mollitia expedita quibusdam aspernatur, sapiente consectetur accusantium perspiciatis praesentium eligendi, in fugiat?</p>
                                            <a href="#">View Full Product Details</a>
                                        </div>
                                        <!-- Add to Cart Form -->
                                        <form class="cart" method="post">
                                            <div class="quantity">
                                                <span class="qty-minus" onclick="var effect = document.getElementById('qty'); var qty = effect.value; if( !isNaN( qty ) &amp;&amp; qty &gt; 1 ) effect.value--;return false;"><i class="fa fa-minus" aria-hidden="true"></i></span>

                                                <input type="number" class="qty-text" id="qty" step="1" min="1" max="12" name="quantity" value="1">

                                                <span class="qty-plus" onclick="var effect = document.getElementById('qty'); var qty = effect.value; if( !isNaN( qty )) effect.value++;return false;"><i class="fa fa-plus" aria-hidden="true"></i></span>
                                            </div>
                                            <button type="submit" name="addtocart" value="5" class="cart-submit">Add to cart</button>
                                            <!-- Wishlist -->
                                            <div class="modal_pro_wishlist">
                                                <a href="wishlist.html" target="_blank"><i class="ti-heart"></i></a>
                                            </div>
                                            <!-- Compare -->
                                            <div class="modal_pro_compare">
                                                <a href="compare.html" target="_blank"><i class="ti-stats-up"></i></a>
                                            </div>
                                        </form>

                                        <div class="share_wf mt-30">
                                            <p>Share With Friend</p>
                                            <div class="_icon">
                                                <a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a>
                                                <a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a>
                                                <a href="#"><i class="fa fa-pinterest" aria-hidden="true"></i></a>
                                                <a href="#"><i class="fa fa-google-plus" aria-hidden="true"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- ****** Quick View Modal Area End ****** -->

        <section class="shop_grid_area section_padding_50">
            <div class="karl-projects-menu mb-50">
                    <div class="text-center portfolio-menu">
                        <button class="btn active" data-filter="*">TÜMÜ</button>
                        <?php 


                        while ($kategoricek=$kategorisor->fetch(PDO::FETCH_ASSOC)) { ?>
                        
                        <button class="btn" data-filter=".<?php echo $kategoricek['kategori_seo']; ?>"><?php echo $kategoricek['kategori_ad']; ?></button>
                        <?php } ?>
                        <!--
                        <button class="btn" data-filter=".man">MAN</button>
                        <button class="btn" data-filter=".access">ACCESSORIES</button>
                        <button class="btn" data-filter=".shoes">shoes</button>
                        <button class="btn" data-filter=".kids">KIDS</button> -->
                    </div>
            </div>
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-3 col-lg-2 d-none d-sm-none d-md-block">
                        <div class="shop_sidebar_area">
                            <div class="widget catagory mb-50">
                                <!--  Side Nav  -->
                                <div class="nav-side-menu">
                                    <h6 class="mb-0">Kategoriler</h6>
                                    <div class="menu-list">
                                        <ul id="menu-content2" class="menu-content collapse out">

                                            <!-- Single Item -->
                                            <li data-toggle="collapse" data-target="#women2">
                                                <a href="#">Ev Eşyaları</a>
                                                <ul class="sub-menu collapse show" id="women2">
                                                    <li><a href="#">Buzdolabı</a></li>
                                                    <li><a href="#">Fırın</a></li>
                                                    <li><a href="#">Tava</a></li>
                                                    <li><a href="#">Çamaşır Makinesi</a></li>
                                                   

                                                </ul>
                                            </li>
                                            <!-- Single Item -->
                                            <li data-toggle="collapse" data-target="#man2" class="collapsed">
                                                <a href="#">Man Wear</a>
                                                <ul class="sub-menu collapse" id="man2">
                                                    <li><a href="#">Man Dresses</a></li>
                                                    <li><a href="#">Man Black Dresses</a></li>
                                                    <li><a href="#">Man Mini Dresses</a></li>
                                                </ul>
                                            </li>
                                            <!-- Single Item -->
                                            <li data-toggle="collapse" data-target="#kids2" class="collapsed">
                                                <a href="#">Children</a>
                                                <ul class="sub-menu collapse" id="kids2">
                                                    <li><a href="#">Children Dresses</a></li>
                                                    <li><a href="#">Mini Dresses</a></li>
                                                </ul>
                                            </li>
                                            <!-- Single Item -->
                                            <li data-toggle="collapse" data-target="#bags2" class="collapsed">
                                                <a href="#">Bags &amp; Purses</a>
                                                <ul class="sub-menu collapse" id="bags2">
                                                    <li><a href="#">Bags</a></li>
                                                    <li><a href="#">Purses</a></li>
                                                </ul>
                                            </li>
                                            <!-- Single Item -->
                                            <li data-toggle="collapse" data-target="#eyewear2" class="collapsed">
                                                <a href="#">Eyewear</a>
                                                <ul class="sub-menu collapse" id="eyewear2">
                                                    <li><a href="#">Eyewear Style 1</a></li>
                                                    <li><a href="#">Eyewear Style 2</a></li>
                                                    <li><a href="#">Eyewear Style 3</a></li>
                                                </ul>
                                            </li>
                                            <!-- Single Item -->
                                            <li data-toggle="collapse" data-target="#footwear2" class="collapsed">
                                                <a href="#">Footwear</a>
                                                <ul class="sub-menu collapse" id="footwear2">
                                                    <li><a href="#">Footwear 1</a></li>
                                                    <li><a href="#">Footwear 2</a></li>
                                                    <li><a href="#">Footwear 3</a></li>
                                                </ul>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="widget recommended">
                                <h6 class="widget-title mb-30">Trend Ürünler</h6>

                                <div class="widget-desc">
                                    <!-- Single Recommended Product -->
                                    <div class="single-recommended-product d-flex mb-30">
                                        <div class="single-recommended-thumb mr-3">
                                            <img src="img/product-img/product-10.jpg" alt="">
                                        </div>
                                        <div class="single-recommended-desc">
                                            <h6>Men’s T-shirt</h6>
                                            <p>$ 39.99</p>
                                        </div>
                                    </div>
                                    <!-- Single Recommended Product -->
                                    <div class="single-recommended-product d-flex mb-30">
                                        <div class="single-recommended-thumb mr-3">
                                            <img src="img/product-img/product-11.jpg" alt="">
                                        </div>
                                        <div class="single-recommended-desc">
                                            <h6>Blue mini top</h6>
                                            <p>$ 19.99</p>
                                        </div>
                                    </div>
                                    <!-- Single Recommended Product -->
                                    <div class="single-recommended-product d-flex">
                                        <div class="single-recommended-thumb mr-3">
                                            <img src="img/product-img/product-12.jpg" alt="">
                                        </div>
                                        <div class="single-recommended-desc">
                                            <h6>Women’s T-shirt</h6>
                                            <p>$ 39.99</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-12 col-md-9 col-lg-10">
                        <div class="row karl-new-arrivals">

                            <?php 
                            //$kategorisor=$db->prepare("SELECT * FROM urun where urun_durum=:durum order by kategori_sira ASC");
                            $urunsor=$db->prepare("SELECT * FROM urun U, kategori K WHERE U.kategori_id = K.kategori_id and urun_durum=:durum order by urun_sira ASC");
                            $urunsor->execute(array(
                            'durum'=>1
                             )); 

                            while ($uruncek=$urunsor->fetch(PDO::FETCH_ASSOC)) { ?>
                              
                           

                             
                                
                                <!-- Single gallery Item -->
                                <div class="col-4 col-sm-3 col-md-3 col-lg-2 single_gallery_item <?php echo $uruncek['kategori_seo']; ?> esya2 wow fadeInUpBig" data-wow-delay="0.2s">
                                    <!-- Product Image -->
                                    <div class="product-img">
                                        <img src="<?php echo $uruncek['urun_resimyol']; ?>" alt="">
                                        <div class="product-quicview">
                                            <a href="#" data-toggle="modal" data-target="#quickview"><i class="ti-plus"></i></a>
                                        </div>
                                    </div>
                                    <!-- Product Description -->
                                    <div class="product-description">
                                        <h4 class="product-price">$<?php echo $uruncek['urun_fiyat'] ?></h4>
                                        <p><?php echo $uruncek['urun_ad'] ?></p>
                                        <!-- Add to Cart -->
                                        <a href="#" class="add-to-cart-btn">SEPETE EKLE</a>
                                    </div>
                                </div>
                                 <?php } ?>

                               
                           
                        </div>

                        <div class="shop_pagination_area wow fadeInUp" data-wow-delay="1.1s">
                            <nav aria-label="Page navigation">
                                <ul class="pagination pagination-sm">
                                    <li class="page-item active"><a class="page-link" href="#">01</a></li>
                                    <li class="page-item"><a class="page-link" href="#">02</a></li>
                                    <li class="page-item"><a class="page-link" href="#">03</a></li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </section>


<?php include 'footer.php'; ?>