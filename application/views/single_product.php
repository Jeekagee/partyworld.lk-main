<!--Body Content-->
<div id="page-content">
    <!--MainContent-->
    <div id="MainContent" class="main-content" role="main">
        <!--Breadcrumb-->
        <div class="bredcrumbWrap">
            <div class="container breadcrumbs">
                <a href="" title="Back to the home page">Home</a><span
                    aria-hidden="true">›</span><span><?php echo $product->name; ?></span>
            </div>
        </div>
        <!--End Breadcrumb-->

        <div id="ProductSection-product-template" class="product-template__container prstyle1 container">
            <!--product-single-->
            <div class="product-single">
                <div class="row">
                    <div class="col-lg-6 col-md-6 col-sm-12 col-12">
                        <div class="product-details-img">

                            <div class="zoompro-wrap product-zoom-right pl-20">
                                <div class="zoompro-span" id="product_img">
                                    <img class="zoompro blur-up lazyload"
                                        data-zoom-image="<?php echo base_url(); ?>uploads/<?php echo $product->image; ?>"
                                        alt="" src="<?php echo base_url(); ?>uploads/<?php echo $product->image; ?>" />
                                </div>
                                <div class="product-labels"><span class="lbl on-sale">Sale</span><span
                                        class="lbl pr-label1">new</span></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-12 col-12">
                        <div class="product-single__meta">
                            <h1 class="product-single__title"><?php echo $product->name; ?></h1>
                            <div class="product-nav clearfix">
                                <a href="#" class="next" title="Next"><i class="fa fa-angle-right"
                                        aria-hidden="true"></i></a>
                            </div>
                            <div class="prInfoRow">
                                <div class="product-stock"> <span class="instock ">In Stock</span></div>
                                <div class="product-sku">CODE: <span
                                        class="variant-sku"><?php echo $product->product_id; ?></span></div>
                                <div class="product-review"><a class="reviewLink" href="#tab2"><i
                                            class="font-13 fa fa-star"></i><i class="font-13 fa fa-star"></i><i
                                            class="font-13 fa fa-star"></i><i class="font-13 fa fa-star-o"></i><i
                                            class="font-13 fa fa-star-o"></i><span class="spr-badge-caption">6
                                            reviews</span></a></div>
                            </div>
                            <p class="product-single__price product-single__price-product-template">
                                <span class="visually-hidden">Regular price</span>
                                <s id="ComparePrice-product-template"><span class="money">LKR
                                        <?php echo ($product->price)*110/100; ?></span></s>
                                <span
                                    class="product-price__price product-price__price-product-template product-price__sale product-price__sale--single">
                                    <span id="ProductPrice-product-template"><span class="money">LKR
                                            <?php echo $product->price; ?></span></span>
                                </span>
                                <span class="discount-badge"> <span class="devider">|</span>&nbsp;
                                    <span>You Save</span>
                                    <span id="SaveAmount-product-template" class="product-single__save-amount">
                                        <span class="money">LKR
                                            <?php echo ($product->price)*110/100 - $product->price; ?></span>
                                    </span>
                                    <span class="off">(<span>10</span>%)</span>
                                </span>
                            </p>
                            <div class="orderMsg" data-user="23" data-time="24">
                                <img src="<?php echo base_url(); ?>assets/images/order-icon.jpg" alt="" /> <strong
                                    class="items">5</strong> sold in last <strong class="time">26</strong> hours
                            </div>
                        </div>
                        <div class="product-single__description rte">
                            <ul>
                                <!-- <li>Lorem ipsum dolor sit amet, consectetur adipiscing elit</li>
                                            <li>Sed ut perspiciatis unde omnis iste natus error sit</li>
                                            <li>Neque porro quisquam est qui dolorem ipsum quia dolor</li>
                                            <li>Lorem Ipsum is not simply random text.</li> -->
                            </ul>
                            <p><?php echo $product->description; ?></p>
                        </div>
                        <div id="quantity_message">Hurry! Only <span class="items">4</span> left in stock.</div>
                        <form method="post" action="<?php echo base_url(); ?>Cart/Add" accept-charset="UTF-8"
                            class="product-form product-form-product-template hidedropdown"
                            enctype="multipart/form-data">

                            <input type="text" name="product_id" value="<?php echo $product->id; ?>" hidden>

                            <div class="swatch clearfix swatch-0 option1" data-option-index="0">
                                <div class="product-form__item">
                                    <label class="header">Color:</label>
                                    <?php
                                                    $CI =& get_instance();
                                                    foreach ($colors as $clr) {
                                                        $color = $CI->Home_model->color_code($clr->color);
                                                        
                                                        ?>
                                    <div data-value="<?php echo $color->id; ?>"
                                        class="swatch-element color <?php echo $color->id; ?> available">
                                        <input
                                            onclick="select_color(<?php echo $color->id; ?>,<?php echo $product->id; ?>)"
                                            class="swatchInput" id="swatch-0-<?php echo $color->id; ?>" type="radio"
                                            name="color" value="<?php echo $color->id; ?>">
                                        <label class="swatchLbl color small" for="swatch-0-<?php echo $color->id; ?>"
                                            style="background-color:<?php echo $color->hex; ?>;" title="Black"></label>
                                    </div>
                                    <?php
                                                    }
                                                ?>
                                </div>
                            </div>
                            <div class="swatch clearfix swatch-1 option2" data-option-index="1">
                                <div class="product-form__item">
                                    <div>
                                    <label class="header">Size: <span class="slVariant">
                                        <?php echo $CI->Home_model->size_scale_name($product->scale); ?>
                                    </span></label>
                                    </div>
                                    <div id="sizes">

                                    </div>
                                </div>
                            </div>
                            <!-- Product Action -->
                            <div class="product-action clearfix">
                                <div class="product-form__item--quantity">
                                    <div class="wrapQtyBtn">
                                        <div class="qtyField">
                                            <a class="qtyBtn minus" href="javascript:void(0);"><i
                                                    class="fa anm anm-minus-r" aria-hidden="true"></i></a>
                                            <input type="text" id="Quantity" name="quantity" value="1"
                                                class="product-form__input qty">
                                            <a class="qtyBtn plus" href="javascript:void(0);"><i
                                                    class="fa anm anm-plus-r" aria-hidden="true"></i></a>
                                        </div>
                                    </div>
                                </div>
                                <div class="product-form__item--submit">
                                    <button type="submit" name="add" class="btn product-form__cart-submit">
                                        <span>Add to cart</span>
                                    </button>
                                </div>
                                <div class="shopify-payment-button" data-shopify="payment-button">
                                    <button type="button"
                                        class="shopify-payment-button__button shopify-payment-button__button--unbranded">Buy
                                        it now</button>
                                </div>
                            </div>
                            <!-- End Product Action -->
                        </form>

                        
                        <p class="shippingMsg"><i class="fa fa-clock-o" aria-hidden="true"></i> ESTIMATED DELIVERY
                            BETWEEN 3 Days</p>
                        <div class="userViewMsg" data-user="20" data-time="11000"><i class="fa fa-users"
                                aria-hidden="true"></i> <strong class="uersView">14</strong> PEOPLE ARE LOOKING FOR THIS
                            PRODUCT</div>
                    </div>
                </div>
            </div>
            <!--End-product-single-->
            <!--Product Fearure-->
            <div class="prFeatures">
                <div class="row">
                    <div class="col-12 col-sm-6 col-md-3 col-lg-3 feature">
                        <img src="<?php echo base_url(); ?>assets/images/credit-card.png" alt="Safe Payment"
                            title="Safe Payment" />
                        <div class="details">
                            <h3>Safe Payment</h3>Pay with the world's most payment methods.
                        </div>
                    </div>
                    <div class="col-12 col-sm-6 col-md-3 col-lg-3 feature">
                        <img src="<?php echo base_url(); ?>assets/images/shield.png" alt="Confidence"
                            title="Confidence" />
                        <div class="details">
                            <h3>Confidence</h3>Protection covers your purchase and personal data.
                        </div>
                    </div>
                    <div class="col-12 col-sm-6 col-md-3 col-lg-3 feature">
                        <img src="<?php echo base_url(); ?>assets/images/worldwide.png" alt="Worldwide Delivery"
                            title="Worldwide Delivery" />
                        <div class="details">
                            <h3>Worldwide Delivery</h3>FREE &amp; fast shipping to over 200+ countries &amp; regions.
                        </div>
                    </div>
                    <div class="col-12 col-sm-6 col-md-3 col-lg-3 feature">
                        <img src="<?php echo base_url(); ?>assets/images/phone-call.png" alt="Hotline"
                            title="Hotline" />
                        <div class="details">
                            <h3>Hotline</h3>Talk to help line for your question on 4141 456 789, 4125 666 888
                        </div>
                    </div>
                </div>
            </div>
            <!--End Product Fearure-->
            <!--Product Tabs-->
            <div class="tabs-listing">
                <div id="tab2" class="tab-content">
                    <div id="shopify-product-reviews">
                        <div class="spr-container">
                            <div class="spr-header clearfix">
                                <div class="spr-summary">
                                    <span class="product-review"><a class="reviewLink"><i
                                                class="font-13 fa fa-star"></i><i class="font-13 fa fa-star"></i><i
                                                class="font-13 fa fa-star"></i><i class="font-13 fa fa-star-o"></i><i
                                                class="font-13 fa fa-star-o"></i> </a><span
                                            class="spr-summary-actions-togglereviews">Based on 6
                                            reviews456</span></span>
                                    <span class="spr-summary-actions">
                                        <a href="#" class="spr-summary-actions-newreview btn">Write a review</a>
                                    </span>
                                </div>
                            </div>
                            <div class="spr-content">
                                <div class="spr-form clearfix">
                                    <form method="post" action="#" id="new-review-form" class="new-review-form">
                                        <h3 class="spr-form-title">Write a review</h3>
                                        <fieldset class="spr-form-contact">
                                            <div class="spr-form-contact-name">
                                                <label class="spr-form-label"
                                                    for="review_author_10508262282">Name</label>
                                                <input class="spr-form-input spr-form-input-text "
                                                    id="review_author_10508262282" type="text" name="review[author]"
                                                    value="" placeholder="Enter your name">
                                            </div>
                                            <div class="spr-form-contact-email">
                                                <label class="spr-form-label"
                                                    for="review_email_10508262282">Email</label>
                                                <input class="spr-form-input spr-form-input-email "
                                                    id="review_email_10508262282" type="email" name="review[email]"
                                                    value="" placeholder="john.smith@example.com">
                                            </div>
                                        </fieldset>
                                        <fieldset class="spr-form-review">
                                            <div class="spr-form-review-rating">
                                                <label class="spr-form-label">Rating</label>
                                                <div class="spr-form-input spr-starrating">
                                                    <div class="product-review"><a class="reviewLink" href="#"><i
                                                                class="fa fa-star-o"></i><i
                                                                class="font-13 fa fa-star-o"></i><i
                                                                class="font-13 fa fa-star-o"></i><i
                                                                class="font-13 fa fa-star-o"></i><i
                                                                class="font-13 fa fa-star-o"></i></a></div>
                                                </div>
                                            </div>

                                            <div class="spr-form-review-title">
                                                <label class="spr-form-label" for="review_title_10508262282">Review
                                                    Title</label>
                                                <input class="spr-form-input spr-form-input-text "
                                                    id="review_title_10508262282" type="text" name="review[title]"
                                                    value="" placeholder="Give your review a title">
                                            </div>

                                            <div class="spr-form-review-body">
                                                <label class="spr-form-label" for="review_body_10508262282">Body of
                                                    Review <span
                                                        class="spr-form-review-body-charactersremaining">(1500)</span></label>
                                                <div class="spr-form-input">
                                                    <textarea class="spr-form-input spr-form-input-textarea "
                                                        id="review_body_10508262282" data-product-id="10508262282"
                                                        name="review[body]" rows="10"
                                                        placeholder="Write your comments here"></textarea>
                                                </div>
                                            </div>
                                        </fieldset>
                                        <fieldset class="spr-form-actions">
                                            <input type="submit"
                                                class="spr-button spr-button-primary button button-primary btn btn-primary"
                                                value="Submit Review">
                                        </fieldset>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--End Product Tabs-->

    </div>
    <!--#ProductSection-product-template-->
</div>
<!--MainContent-->
</div>
<!--End Body Content-->
