<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<section class="content-header">
		<div class="container-fluid">
			<div class="row mb-2">
				<div class="col-sm-6">
					<h1>Add Color</h1>
				</div>
				<div class="col-sm-6">
					<ol class="breadcrumb float-sm-right">
						<li class="breadcrumb-item"><a href="<?php echo base_url(); ?>Dashboard">Home</a></li>
						<li class="breadcrumb-item active">Add Color</li>
					</ol>
				</div>
			</div>
		</div><!-- /.container-fluid -->
	</section>
	<style>
		.dot {
		height: 25px;
		width: 25px;
		border-radius: 50%;
		display: inline-block;
		}
	</style>
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
							<h3 class="card-title">Add Color</h3>
						</div>
						<!-- /.card-header -->
						<!-- form start -->
						<?php echo form_open_multipart('Setting/Insert_Color');?>
						<form method="" action="">
							<div class="card-body">
								<div id="successMessage"><?php echo $this->session->flashdata('success'); ?></div>
								<div class="form-group">
									<label>Color Name</label>
									<input type="text" class="form-control" placeholder="Color Name" name="clr_name"
										value="<?php echo set_value('clr_name'); ?>">
									<span class="text-danger"
										style="font-size:14px;"><?php echo form_error('clr_name'); ?></span>
								</div>

								<div class="form-group">
									<label>Select Color</label>
									<input type="color" class="form-control" placeholder="Select Color" name="clr"
										value="<?php echo set_value('clr'); ?>">
									<span class="text-danger"
										style="font-size:14px;"><?php echo form_error('clr'); ?></span>
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

			<div style="margin-top:20px; padding:20px;">
				<table class="table table-hover">
					<thead class="thead-dark text-center">
						<th>#</th>
						<th>Color Name</th>
						<th>Color</th>
						<th>Action</th>
					</thead>

					<?php
					$i = 1;
						foreach ($color as $clr) {
							?>
							<tr class="text-center" id="clr<?php echo $clr->id; ?>">
								<td><?php echo $i; ?></td>
								<td><?php echo $clr->color; ?></td>
								<td>
									<span class="dot" style="background-color: <?php echo $clr->hex; ?>;"></span>
								</td>
								<td>
									<button id="<?php echo $clr->id; ?>" class="btn btn-flat btn-sm btn-danger delete_color"><i class="fas fa-trash-alt"></i></button>
								</td>
							</tr>
							<?php
							$i++;
						}
					?>
				</table>
			</div>
		</div>
	</section>
	<!-- /.content -->
</div>
<!-- /.content-wrapper -->
