<?php
$CI =& get_instance(); 
?>
<!--Body Content-->
<div id="page-content">
    <!--Home slider-->
    <div class="slideshow slideshow-wrapper pb-section sliderFull">
        <div class="home-slideshow">
            <div class="slide">
                <div class="blur-up lazyload bg-size">
                    <img class="blur-up lazyload bg-img"
                        data-src="<?php echo base_url(); ?>assets/images/slideshow-banners/banner3.jpg"
                        src="<?php echo base_url(); ?>assets/images/slideshow-banners/banner3.jpg"
                        alt="Shop Our New Collection" title="Shop Our New Collection" />
                    <div class="slideshow__text-wrap slideshow__overlay classic bottom">
                        <div class="slideshow__text-content bottom">
                            <div class="wrap-caption center">
                                <h2 class="h1 mega-title slideshow__title">One stop party shop</h2>
                                <span class="mega-subtitle slideshow__subtitle"></span>
                                <span class="btn">Shop now</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="slide">
                <div class="blur-up lazyload bg-size">
                    <img class="blur-up lazyload bg-img"
                        data-src="<?php echo base_url(); ?>assets/images/slideshow-banners/banner1.jpg"
                        src="<?php echo base_url(); ?>assets/images/slideshow-banners/banner1.jpg"
                        alt="Summer Bikini Collection" title="Summer Bikini Collection" />
                    <div class="slideshow__text-wrap slideshow__overlay classic bottom">
                        <div class="slideshow__text-content bottom">
                            <div class="wrap-caption center">
                                <h2 class="h1 mega-title slideshow__title">Wholesale and Retail</h2>
                                <span class="mega-subtitle slideshow__subtitle"></span>
                                <span class="btn">Shop now</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--End Home slider-->
    <!--Collection Tab slider-->
    <div class="tab-slider-product section">
        <div class="container">
            <div class="row">
                <div class="col-12 col-sm-12 col-md-12 col-lg-12">
                    <div class="section-header text-center">
                        <h2 class="h2">New Arrivals</h2>
                        <p>Browse the huge variety of our products</p>
                    </div>
                    <div class="tabs-listing">
                        <ul class="tabs clearfix">
                            <li rel="taball" class="active">All</li>
                            <?php
                                    
                                    foreach ($categories as $cat) {
                                        ?>
                            <li rel="tab<?php echo $cat->id; ?>"><?php echo $cat->catogery; ?></li>
                            <?php
                                    }
                                ?>
                        </ul>
                        <div class="tab_container">
                        <div id="taball" class="tab_content grid-products">
                                <div class="productSlider">
                                    <?php
                                                foreach ($products as $product) {
                                                ?>
                                    <div class="col-12 item">
                                        <!-- start product image -->
                                        <div class="product-image">
                                            <!-- start product image -->
                                            <a href="<?php echo base_url(); ?>Home/Product/<?php echo $product->id; ?>">
                                                <!-- image -->
                                                <img class="primary blur-up lazyload"
                                                    data-src="<?php echo base_url(); ?>uploads/<?php echo $product->image; ?>"
                                                    src="<?php echo base_url(); ?>uploads/<?php echo $product->image; ?>"
                                                    alt="image" title="product" />
                                                <!-- End image -->
                                                <!-- Hover image -->
                                                <img class="hover blur-up lazyload"
                                                    data-src="<?php echo base_url(); ?>uploads/<?php echo $product->image; ?>"
                                                    src="<?php echo base_url(); ?>uploads/<?php echo $product->image; ?>"
                                                    alt="image" title="product" />
                                                <!-- End hover image -->
                                                <!-- product label -->
                                                <div class="product-labels"><span class="lbl on-sale">Sale</span></div>
                                                <!-- End product label -->
                                            </a>
                                            <!-- end product image -->

                                            <!-- Start product button -->
                                            <form class="variants add" action="#"
                                                onclick="window.location.href='Cart'" method="post">
                                                <button class="btn btn-addto-cart" type="button" tabindex="0">Add To
                                                    Cart</button>
                                            </form>
                                            <div class="button-set">
                                                <a href="javascript:void(0)" title="Quick View"
                                                    class="quick-view-popup quick-view" data-toggle="modal"
                                                    data-target="#content_quickview">
                                                    <i class="icon anm anm-search-plus-r"></i>
                                                </a>
                                                <div class="wishlist-btn">
                                                    <a class="wishlist add-to-wishlist" href="wishlist.html">
                                                        <i class="icon anm anm-heart-l"></i>
                                                    </a>
                                                </div>
                                                <div class="compare-btn">
                                                    <a class="compare add-to-compare" href="compare.html"
                                                        title="Add to Compare">
                                                        <i class="icon anm anm-random-r"></i>
                                                    </a>
                                                </div>
                                            </div>
                                            <!-- end product button -->
                                        </div>
                                        <!-- end product image -->

                                        <!--start product details -->
                                        <div class="product-details text-center">
                                            <!-- product name -->
                                            <div class="product-name">
                                                <a href="short-description.html"><?php echo $product->name; ?></a>
                                            </div>
                                            <!-- End product name -->
                                            <!-- product price -->
                                            <div class="product-price">
                                                <span class="old-price">LKR
                                                    <?php echo ($product->price)*110/100; ?></span>
                                                <span class="price">LKR <?php echo $product->price; ?></span>
                                            </div>
                                            <!-- End product price -->

                                            <div class="product-review">
                                                <i class="font-13 fa fa-star"></i>
                                                <i class="font-13 fa fa-star"></i>
                                                <i class="font-13 fa fa-star"></i>
                                                <i class="font-13 fa fa-star"></i>
                                                <i class="font-13 fa fa-star"></i>
                                            </div>
                                        </div>
                                        <!-- End product details -->
                                    </div>
                                    <?php
                                                }
                                                ?>
                                </div>
                            </div>
                            <?php
                                foreach ($categories as $cat) {
                                    ?>
                            <div id="tab<?php echo $cat->id; ?>" class="tab_content grid-products">
                                <div class="productSlider">
                                    <?php
                                    $CI->load->model('Home_model');
                                    $result = $CI->Home_model->productsByCat($cat->id);
                                                foreach ($result as $product) {
                                                ?>
                                    <div class="col-12 item">
                                        <!-- start product image -->
                                        <div class="product-image">
                                            <!-- start product image -->
                                            <a href="<?php echo base_url(); ?>Home/Product/<?php echo $product->id; ?>">
                                                <!-- image -->
                                                <img class="primary blur-up lazyload"
                                                    data-src="<?php echo base_url(); ?>uploads/<?php echo $product->image; ?>"
                                                    src="<?php echo base_url(); ?>uploads/<?php echo $product->image; ?>"
                                                    alt="image" title="product" />
                                                <!-- End image -->
                                                <!-- Hover image -->
                                                <img class="hover blur-up lazyload"
                                                    data-src="<?php echo base_url(); ?>uploads/<?php echo $product->image; ?>"
                                                    src="<?php echo base_url(); ?>uploads/<?php echo $product->image; ?>"
                                                    alt="image" title="product" />
                                                <!-- End hover image -->
                                                <!-- product label -->
                                                <div class="product-labels"><span class="lbl on-sale">Sale</span></div>
                                                <!-- End product label -->
                                            </a>
                                            <!-- end product image -->

                                            <!-- Start product button -->
                                            <form class="variants add" action="#"
                                                onclick="window.location.href='cart.html'" method="post">
                                                <button class="btn btn-addto-cart" type="button" tabindex="0">Add To
                                                    Cart</button>
                                            </form>
                                            <div class="button-set">
                                                <a href="javascript:void(0)" title="Quick View"
                                                    class="quick-view-popup quick-view" data-toggle="modal"
                                                    data-target="#content_quickview">
                                                    <i class="icon anm anm-search-plus-r"></i>
                                                </a>
                                                <div class="wishlist-btn">
                                                    <a class="wishlist add-to-wishlist" href="wishlist.html">
                                                        <i class="icon anm anm-heart-l"></i>
                                                    </a>
                                                </div>
                                                <div class="compare-btn">
                                                    <a class="compare add-to-compare" href="compare.html"
                                                        title="Add to Compare">
                                                        <i class="icon anm anm-random-r"></i>
                                                    </a>
                                                </div>
                                            </div>
                                            <!-- end product button -->
                                        </div>
                                        <!-- end product image -->

                                        <!--start product details -->
                                        <div class="product-details text-center">
                                            <!-- product name -->
                                            <div class="product-name">
                                                <a href="short-description.html"><?php echo $product->name; ?></a>
                                            </div>
                                            <!-- End product name -->
                                            <!-- product price -->
                                            <div class="product-price">
                                                <span class="old-price">LKR
                                                    <?php echo ($product->price)*110/100; ?></span>
                                                <span class="price">LKR <?php echo $product->price; ?></span>
                                            </div>
                                            <!-- End product price -->

                                            <div class="product-review">
                                                <i class="font-13 fa fa-star"></i>
                                                <i class="font-13 fa fa-star"></i>
                                                <i class="font-13 fa fa-star"></i>
                                                <i class="font-13 fa fa-star-o"></i>
                                                <i class="font-13 fa fa-star-o"></i>
                                            </div>
                                        </div>
                                        <!-- End product details -->
                                    </div>
                                    <?php
                                                }
                                                ?>
                                </div>
                            </div>
                            <?php
                                }
                                ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--Collection Tab slider-->

    <!--Collection Box slider-->
    <div class="collection-box section">
        <div class="container-fluid">
            <div class="collection-grid">
                <div class="collection-grid-item">
                    <a href="collection-page.html" class="collection-grid-item__link">
                        <img data-src="<?php echo base_url(); ?>assets/images/cosmetic.jpg"
                            src="<?php echo base_url(); ?>assets/images/collection/cosmetic.jpg" alt="Fashion"
                            class="blur-up lazyload" />
                        <div class="collection-grid-item__title-wrapper">
                            <h3 class="collection-grid-item__title btn btn--secondary no-border">Fashion</h3>
                        </div>
                    </a>
                </div>
                <div class="collection-grid-item">
                    <a href="collection-page.html" class="collection-grid-item__link">
                        <img class="blur-up lazyload"
                            data-src="<?php echo base_url(); ?>assets/images/collection/cosmetic.jpg"
                            src="<?php echo base_url(); ?>assets/images/collection/cosmetic.jpg" alt="Cosmetic" />
                        <div class="collection-grid-item__title-wrapper">
                            <h3 class="collection-grid-item__title btn btn--secondary no-border">Cosmetic</h3>
                        </div>
                    </a>
                </div>
                <div class="collection-grid-item blur-up lazyloaded">
                    <a href="collection-page.html" class="collection-grid-item__link">
                        <img data-src="<?php echo base_url(); ?>assets/images/collection/bag.jpg"
                            src="<?php echo base_url(); ?>assets/images/collection/bag.jpg" alt="Bag"
                            class="blur-up lazyload" />
                        <div class="collection-grid-item__title-wrapper">
                            <h3 class="collection-grid-item__title btn btn--secondary no-border">Bag</h3>
                        </div>
                    </a>
                </div>
                <div class="collection-grid-item">
                    <a href="collection-page.html" class="collection-grid-item__link">
                        <img data-src="<?php echo base_url(); ?>assets/images/collection/accessories.jpg"
                            src="<?php echo base_url(); ?>assets/images/collection/accessories.jpg" alt="Accessories"
                            class="blur-up lazyload" />
                        <div class="collection-grid-item__title-wrapper">
                            <h3 class="collection-grid-item__title btn btn--secondary no-border">Accessories</h3>
                        </div>
                    </a>
                </div>
                <div class="collection-grid-item">
                    <a href="collection-page.html" class="collection-grid-item__link">
                        <img data-src="<?php echo base_url(); ?>assets/images/collection/shoes.jpg"
                            src="<?php echo base_url(); ?>assets/images/collection/shoes.jpg" alt="Shoes"
                            class="blur-up lazyload" />
                        <div class="collection-grid-item__title-wrapper">
                            <h3 class="collection-grid-item__title btn btn--secondary no-border">Shoes</h3>
                        </div>
                    </a>
                </div>
                <div class="collection-grid-item">
                    <a href="collection-page.html" class="collection-grid-item__link">
                        <img data-src="<?php echo base_url(); ?>assets/images/collection/jewellry.jpg"
                            src="<?php echo base_url(); ?>assets/images/collection/jewellry.jpg" alt="Jewellry"
                            class="blur-up lazyload" />
                        <div class="collection-grid-item__title-wrapper">
                            <h3 class="collection-grid-item__title btn btn--secondary no-border">Jewellry</h3>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </div>
    <!--End Collection Box slider-->

    <!--Logo Slider-->
    <div class="section logo-section">
        <div class="container">
            <div class="row">
                <div class="col-12 col-sm-12 col-md-12 col-lg-12">

                </div>
            </div>
        </div>
    </div>
    <!--End Logo Slider-->

   

    <!--Latest Blog-->
    <div class="latest-blog section pt-0">
        <div class="container">
            <div class="row">
                <!-- <div class="col-12 col-sm-12 col-md-12 col-lg-12">
        				<div class="section-header text-center">
      						<h2 class="h2">Latest From our Blog</h2>
					    </div>
            		</div> -->
            </div>
            <div class="row">
                <!-- <div class="col-12 col-sm-12 col-md-6 col-lg-6">
                    	<div class="wrap-blog">
                        	<a href="blog-left-sidebar.html" class="article__grid-image">
              					<img src="<?php echo base_url(); ?>assets/images/blog/post-img1.jpg" alt="It's all about how you wear" title="It's all about how you wear" class="blur-up lazyloaded"/>
				            </a>
                            <div class="article__grid-meta article__grid-meta--has-image">
                                <div class="wrap-blog-inner">
                                    <h2 class="h3 article__title">
                                      <a href="blog-left-sidebar.html">It's all about how you wear</a>
                                    </h2>
                                    <span class="article__date">May 02, 2017</span>
                                    <div class="rte article__grid-excerpt">
                                        I must explain to you how all this mistaken idea of denouncing pleasure and praising pain was born and I will give you a complete account...
                                    </div>
                                    <ul class="list--inline article__meta-buttons">
                                    	<li><a href="blog-article.html">Read more</a></li>
                                    </ul>
                                </div>
							</div>
                        </div>
                    </div> -->
                <!-- <div class="col-12 col-sm-12 col-md-6 col-lg-6">
                    	<div class="wrap-blog">
                        	<a href="blog-left-sidebar.html" class="article__grid-image">
              					<img src="<?php echo base_url(); ?>assets/images/blog/post-img2.jpg" alt="27 Days of Spring Fashion Recap" title="27 Days of Spring Fashion Recap" class="blur-up lazyloaded"/>
				            </a>
                            <div class="article__grid-meta article__grid-meta--has-image">
                                <div class="wrap-blog-inner">
                                    <h2 class="h3 article__title">
                                      <a href="blog-right-sidebar.html">27 Days of Spring Fashion Recap</a>
                                    </h2>
                                    <span class="article__date">May 02, 2017</span>
                                    <div class="rte article__grid-excerpt">
                                        Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab...
                                    </div>
                                    <ul class="list--inline article__meta-buttons">
                                    	<li><a href="blog-article.html">Read more</a></li>
                                    </ul>
                                </div>
							</div>
                        </div>
                    </div> -->
            </div>
        </div>
    </div>
    <!--End Latest Blog-->

    <!--Store Feature-->
    <div class="store-feature section">
        <div class="container">
            <div class="row">
                <div class="col-12 col-sm-12 col-md-12 col-lg-12">
                    <ul class="display-table store-info">
                        <li class="display-table-cell">
                            <i class="icon anm anm-truck-l"></i>
                            <h5>Free Shipping &amp; Return</h5>
                            <span class="sub-text">Free shipping on all US orders</span>
                        </li>
                        <li class="display-table-cell">
                            <i class="icon anm anm-dollar-sign-r"></i>
                            <h5>Money Guarantee</h5>
                            <span class="sub-text">30 days money back guarantee</span>
                        </li>
                        <li class="display-table-cell">
                            <i class="icon anm anm-comments-l"></i>
                            <h5>Online Support</h5>
                            <span class="sub-text">We support online 24/7 on day</span>
                        </li>
                        <!-- <li class="display-table-cell">
                            	<i class="icon anm anm-credit-card-front-r"></i>
                                <h5>Secure Payments</h5>
                                <span class="sub-text">All payment are Secured and trusted.</span>
                        	</li> -->
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!--End Store Feature-->
</div>
<!--End Body Content-->