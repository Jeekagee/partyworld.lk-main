<div id="page-content" style="padding-top: 100px;">
    	<!--Page Title-->
    	<div class="page section-header text-center">
			<div class="page-title">
        		<div class="wrapper"><h1 class="page-width">Customer Login</h1></div>
      		</div>
		</div>
        <!--End Page Title-->

        
        <div class="container fts-16">
        	<div class="row">
                <div class="col-12 col-sm-12 col-md-6 col-lg-6 main-col offset-md-3">
                	<div class="mb-4">
                       <form method="post" action="<?php echo base_url(); ?>Customer/SignIn" id="CustomerLoginForm" accept-charset="UTF-8" class="contact-form">	
                          <div class="row">
                              <div class="col-12 col-sm-12 col-md-12 col-lg-12">
                                <div id="sigup">
                                    <?php
                                    if ($this->session->flashdata('login')) {
                                        echo $this->session->flashdata('login');
                                    }
                                    ?>
                                </div>
                              </div>
                              
                            <div class="col-12 col-sm-12 col-md-12 col-lg-12">
                                <div class="form-group">
                                    <label for="CustomerEmail">Email/Mobile</label>
                                    <input type="text" name="username" placeholder="jhon@email.com/0771234567" id="CustomerEmail" class="" autocorrect="off" autocapitalize="off" autofocus="">
                                </div>
                            </div>
                            <div class="col-12 col-sm-12 col-md-12 col-lg-12">
                                <div class="form-group">
                                    <label for="CustomerPassword">Password</label>
                                    <input type="password" value="" name="password" placeholder="" id="CustomerPassword" class="">                        	
                                </div>
                            </div>
                          </div>
                          <div class="row">
                            <div class="text-center col-12 col-sm-12 col-md-12 col-lg-12">
                                <input type="submit" class="btn mb-3" value="Sign In">
                                <p class="mb-4">
									<a href="#" id="RecoverPassword" style="color:#FF5F00">Forgot your password?</a> &nbsp; | &nbsp;
								    New to Partyworld <a href="<?php echo base_url(); ?>Customer/signUp" style="color:#FF5F00">Create account</a>
                                </p>
                            </div>
                         </div>
                     </form>
                    </div>
               	</div>
            </div>
        </div>
        
    </div>