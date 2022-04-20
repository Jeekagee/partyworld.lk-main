<div id="page-content" style="padding-top: 100px;">
    	<!--Page Title-->
    	<div class="page section-header text-center">
			<div class="page-title">
        		<div class="wrapper"><h1 class="page-width">Create an Account</h1></div>
      		</div>
		</div>
        <!--End Page Title-->
        
        <div class="container fts-16">
        	<div class="row">
                <div class="col-12 col-sm-12 col-md-6 col-lg-6 main-col offset-md-3">
                	<div class="mb-4">
                       <form method="post" action="<?php echo base_url(); ?>Customer/create" id="CustomerLoginForm" accept-charset="UTF-8" class="contact-form">	
                          <div class="row">
                                <div class="col-12 col-sm-12 col-md-12 col-lg-12">
                                <?php
                                if ($this->session->flashdata('signup')) {
                                    echo $this->session->flashdata('signup');
                                }
                                ?>
                                </div>
	                          <div class="col-12 col-sm-12 col-md-12 col-lg-12">
                                <div class="form-group">
                                    <label for="FirstName">First Name </label>
                                    <input type="text" name="firstname" placeholder="Enter First name" id="FirstName" autofocus="">
                                    <span class="form-error"><?php echo form_error('firstname'); ?></span>
                                </div>
                               </div>
                               <div class="col-12 col-sm-12 col-md-12 col-lg-12">
                                <div class="form-group">
                                    <label for="LastName">Last Name</label>
                                    <input type="text" name="lastname" placeholder="Enter Last name" id="LastName">
                                    <span class="form-error"><?php echo form_error('lastname'); ?></span>
                                </div>
                               </div>
                            <div class="col-12 col-sm-12 col-md-12 col-lg-12">
                                <div class="form-group">
                                    <label >Email</label>
                                    <input type="email" name="email" placeholder="jhon@email.com" id="CustomerEmail" class="" autocorrect="off" autocapitalize="off" autofocus="">
                                    <span class="form-error"><?php echo form_error('email'); ?></span>
                                </div>
                            </div>

                            <div class="col-12 col-sm-12 col-md-12 col-lg-12">
                                <div class="form-group">
                                    <label>Mobile</label>
                                    <input type="text" name="mobile" placeholder="0771234567">
                                    <span class="form-error"><?php echo form_error('mobile'); ?></span>
                                </div>
                            </div>

                            <div class="col-12 col-sm-12 col-md-12 col-lg-12">
                                <div class="form-group">
                                    <label for="CustomerPassword">Password</label>
                                    <input type="password" value="" name="password" placeholder="" id="CustomerPassword" class="">                        	
                                    <span class="form-error"><?php echo form_error('password'); ?></span>
                                </div>
                            </div>
                          </div>
                          <div class="row">
                            <div class="text-center col-12 col-sm-12 col-md-12 col-lg-12">
                                <input type="submit" class="btn mb-3" value="Create">
                                <p class="mb-4">
                                    Already have an account? <a href="<?php echo base_url(); ?>Customer/login" style="color:#FF5F00">Sign In Now</a>
                                </p>
                            </div>
                         </div>
                     </form>
                    </div>
               	</div>
            </div>
        </div>
        
    </div>