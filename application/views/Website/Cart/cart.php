<div id="page-content" style="padding-top: 100px;">
    	<!--Page Title-->
    	<div class="page section-header text-center">
			<div class="page-title">
        		<div class="wrapper"><h1 class="page-width">Shopping Cart</h1></div>
      		</div>
		</div>
        <!--End Page Title-->
        
        <div class="container">
        	<div class="row">
                <div class="col-12 col-sm-12 col-md-12 col-lg-12 main-col">
                	<div class="alert alert-success text-uppercase" role="alert">
						<i class="icon anm anm-truck-l icon-large"></i> &nbsp;<strong>Congratulations!</strong> You've got free shipping!
					</div>
                	<form action="#" method="post" class="cart style2">
                		<table>
                            <thead class="cart__row cart__header">
                                <tr>
                                    <th colspan="2" class="text-center">Product</th>
                                    <th class="text-center">Price</th>
                                    <th class="text-center">Quantity</th>
                                    <th class="text-right">Total</th>
                                    <th class="action">&nbsp;</th>
                                </tr>
                            </thead>
                    		<tbody>
                                <?php
                                $CI =& get_instance();
                                $CI->load->model('Home_model');

                                $subtotal = 0;

                                foreach ($cart_items as $items) {
                                    $product_id = $items->product_id;
                                    // Product Details
                                    $product = $CI->Cart_model->product_data($product_id);
                                    ?>
                                        <tr class="cart__row border-bottom line1 cart-flex border-top">
                                            <td class="cart__image-wrapper cart-flex-item">
                                                <?php
                                                    $size_id = $items->size_id;
                                                    $color_id = $items->color_id;
                                                    if ($size_id == 0 AND $color_id == 0) {
                                                        ?>
                                                        <a href="#"><img class="cart__image" src="uploads/<?php echo $product->image; ?>" alt="<?php echo $product->name; ?>"></a>
                                                        <?php
                                                    }
                                                    else{
                                                        $varient_img = $CI->Cart_model->varient_img($product_id,$size_id,$color_id);
                                                        if ($varient_img == NULL) {
                                                            ?>
                                                            <a href="#"><img class="cart__image" src="uploads/none.jpg" alt="<?php echo $product->name; ?>"></a>
                                                            <?php
                                                        }
                                                        else{
                                                            ?>
                                                            <a href="#"><img class="cart__image" src="uploads/<?php echo $varient_img; ?>" alt="<?php echo $product->name; ?>"></a>
                                                            <?php
                                                        }
                                                    }
                                                ?>
                                                
                                            </td>
                                            <td class="cart__meta small--text-left cart-flex-item" style="width:300px;">
                                                <div class="list-view-item__title">
                                                    <a href="#">
                                                        <?php echo $product->name; ?>
                                                    </a>
                                                </div>
                                                
                                                <div class="cart__meta-text">
                                                    Color:
                                                    <?php
                                                        $color_id = $items->color_id;
                                                        if ($color_id == 0) {
                                                            echo "None";
                                                        }
                                                        else{
                                                            $color_name = $CI->Home_model->color_code($color_id)->color;
                                                            $color_code = $CI->Home_model->color_code($color_id)->hex;
                                                            echo "<span style='color:$color_code'>$color_name</span>";
                                                        }
                                                    ?>
                                                    <br>Size:
                                                    <?php
                                                        $size_id = $items->size_id;
                                                        if ($size_id == 0) {
                                                            echo "None";
                                                        }
                                                        else{
                                                            echo $CI->Home_model->size($size_id)->size;
                                                        }
                                                    ?>
                                                    <br>
                                                </div>
                                            </td>
                                            <td class="cart__price-wrapper cart-flex-item">
                                                <span class="money">LKR <?php echo $price =  $items->price; ?>.00</span>
                                            </td>
                                            <td class="cart__update-wrapper cart-flex-item text-right">
                                                <div class="cart__qty text-center">
                                                    <div class="qtyField">
                                                        <a class="qtyBtn minus" href="javascript:void(0);"><i class="icon icon-minus"></i></a>
                                                        <input class="cart__qty-input qty" type="text" name="updates[]" id="qty" value="<?php echo $quantity = $items->quantity; ?>" pattern="[0-9]*">
                                                        <a class="qtyBtn plus" href="javascript:void(0);"><i class="icon icon-plus"></i></a>
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="text-right small--hide cart-price">
                                                <div><span class="money">LKR <?php echo $total =  $price*$quantity; ?>.00</span></div>
                                            </td>
                                            <td class="text-center small--hide">
                                                <a href="<?php echo base_url(); ?>Cart/delete_cart/<?php echo $items->cart_id; ?>" class="btn btn--secondary cart__remove" title="Remove tem"><i class="icon icon anm anm-times-l"></i></a>
                                                <a href="#" class="btn btn-secondary btn--small  small--hide">Update</a>
                                            </td>
                                        </tr>
                                    <?php
                                    $subtotal = $subtotal+$total;
                                }
                                ?>
                            </tbody>
                    		<tfoot>
                                <tr>
                                    <td colspan="3" class="text-left"><a href="<?php echo base_url(); ?>Home" class="btn btn-secondary btn--small cart-continue">Continue shopping</a></td>
                                    <td colspan="3" class="text-right">
                                        <a href="<?php echo base_url(); ?>Cart/clear_cart" class="btn btn-secondary btn--small  small--hide">Clear Cart</a>
                                    </td>
                                </tr>
                            </tfoot>
                    </table> 
                    </form>                   
               	</div>
                
                
                <div class="container mt-4">
                    <div class="row">
                        <div class="col-12 col-sm-12 col-md-4 col-lg-4 cart__footer">
                            <div class="solid-border">	
                              <div class="row border-bottom pb-2">
                                <span class="col-12 col-sm-6 cart__subtotal-title">Subtotal</span>
                                <span class="col-12 col-sm-6 text-right"><span class="money">LKR <?php echo $subtotal; ?>.00</span></span>
                              </div>
                              <div class="row border-bottom pb-2 pt-2">
                                <span class="col-12 col-sm-6 cart__subtotal-title">Tax</span>
                                <span class="col-12 col-sm-6 text-right">LKR 00.00</span>
                              </div>
                              <div class="row border-bottom pb-2 pt-2">
                                <span class="col-12 col-sm-6 cart__subtotal-title">Shipping</span>
                                <span class="col-12 col-sm-6 text-right">Free shipping</span>
                              </div>
                              <div class="row border-bottom pb-2 pt-2">
                                <span class="col-12 col-sm-6 cart__subtotal-title"><strong>Grand Total</strong></span>
                                <span class="col-12 col-sm-6 cart__subtotal-title cart__subtotal text-right"><span class="money">LKR <?php echo $subtotal; ?>.00</span></span>
                              </div>
                              <div class="cart__shipping">Shipping &amp; taxes calculated at checkout</div>
                              <p class="cart_tearm">
                                <label>
                                  <input type="checkbox" name="tearm" class="checkbox" value="tearm" required="">
                                  I agree with the terms and conditions
								</label>
                              </p>
                              <a style="width:100%" href="<?php echo base_url(); ?>Cart/checkout" class="btn btn--small-wide checkout">Proceed To Checkout</a>
                              <div class="paymnet-img"><img src="assets/images/payment-img.jpg" alt="Payment"></div>
                              <p><a href="#;">Checkout with Multiple Addresses</a></p>
                            </div>
        
                        </div>
                    </div>
                </div>
                
            </div>
        </div>
        
    </div>