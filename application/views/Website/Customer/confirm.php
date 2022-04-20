<div id="page-content" style="padding-top: 100px;">
    	<!--Page Title-->
    	<div class="page section-header text-center">
			<div class="page-title">
        		<div class="wrapper"><h1 class="page-width">Customer Confirmation</h1></div>
      		</div>
		</div>
        <!--End Page Title-->
        
        <div class="container fts-16">
        	<div class="row">
                <div class="col-12 col-sm-12 col-md-6 col-lg-6 main-col offset-md-3">
                	<div class="mb-4">
                       <form method="post" action="<?php echo base_url(); ?>Customer/confirm_code" id="CustomerLoginForm" accept-charset="UTF-8" class="contact-form">	
                          <div class="row">
                            <div class="col-12 col-sm-12 col-md-12 col-lg-12">
                                <?php
                                if ($this->session->flashdata('login')) {
                                    echo $this->session->flashdata('login');
                                }
                                ?>
                            </div>
	                          <div class="col-12 col-sm-12 col-md-12 col-lg-12">
                                <div class="form-group">
                                    <labe>You have been Receive 6 Digit code!!</label>
                                    <input type="text" name="code" placeholder="Enter 6 Digit code">
                                </div>
                               </div>
                          </div>
                          <div class="row">
                            <div class="text-center col-12 col-sm-12 col-md-12 col-lg-12">
                                <input type="submit" class="btn mb-3" value="Submit">
                                <p class="mb-4">
                                    Resend Code <a href="<?php echo base_url(); ?>Customer/resend_code" style="color:#FF5F00">Click Here</a>
                                </p>
                                <a href="<?php echo base_url(); ?>/Customer/login" class="btn btn-success">Skip this</a>
                            </div>
                         </div>
                     </form>
                    </div>
               	</div>
            </div>
        </div>
        
    </div>