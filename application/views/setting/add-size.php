<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<section class="content-header">
		<div class="container-fluid">
			<div class="row mb-2">
				<div class="col-sm-6">
					<h1>Add Size</h1>
				</div>
				<div class="col-sm-6">
					<ol class="breadcrumb float-sm-right">
						<li class="breadcrumb-item"><a href="<?php echo base_url(); ?>Dashboard">Home</a></li>
						<li class="breadcrumb-item active">Add Size</li>
					</ol>
				</div>
			</div>
		</div><!-- /.container-fluid -->
	</section>

	<!-- Main content -->
	<section class="content">
		<div class="container-fluid">
			<div class="row">

                <div class="col-md-3"></div>

				<!-- left column -->
				<div class="col-md-6">
					<!-- general form elements -->
					<div class="card card-primary">
						<div class="card-header">
							<h3 class="card-title">Add Size</h3>
						</div>
						<!-- /.card-header -->
						<!-- form start -->
						<?php echo form_open_multipart('Setting/Insert_Size');?>
						<form method="" action="">
							<div class="card-body">
								<div id="successMessage"><?php echo $this->session->flashdata('success'); ?></div>
								
                                <div class="form-group">
									<label>Select Size Scale</label>
									<select name="scale" id="scale" class="form-control">
                                        <?php
                                            foreach ($scales as $scl) {
                                                echo "<option value='$scl->id'>$scl->scale</option>";
                                            }
                                        ?>
                                    </select>
									<span class="text-danger"
										style="font-size:14px;"><?php echo form_error('size'); ?></span>
								</div>
                                
                                <div class="form-group">
									<label>Size Name</label>
									<input type="text" class="form-control" placeholder="Size" name="size"
										value="<?php echo set_value('size'); ?>">
									<span class="text-danger"
										style="font-size:14px;"><?php echo form_error('size'); ?></span>
								</div>
							</div>
							<!-- /.card-body -->
							<div class="card-footer">
								<button type="submit" class="btn btn-primary">Submit</button>
							</div>
						</form>
					</div>
					<!-- /.card -->
				</div>

                <div class="col-md-3"></div>
			</div>

            <div>

            </div>
		</div>
	</section>
	<!-- /.content -->
</div>
<!-- /.content-wrapper -->

