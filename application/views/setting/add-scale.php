<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<section class="content-header">
		<div class="container-fluid">
			<div class="row mb-2">
				<div class="col-sm-6">
					<h1>Add Scale</h1>
				</div>
				<div class="col-sm-6">
					<ol class="breadcrumb float-sm-right">
						<li class="breadcrumb-item"><a href="<?php echo base_url(); ?>Dashboard">Home</a></li>
						<li class="breadcrumb-item active">Add Scale</li>
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
							<h3 class="card-title">Add Scale</h3>
						</div>
						<!-- /.card-header -->
						<!-- form start -->
						<?php echo form_open_multipart('Setting/Insert_Scale');?>
						<form method="" action="">
							<div class="card-body">
								<div id="successMessage"><?php echo $this->session->flashdata('success'); ?></div>
								<div class="form-group">
									<label>Scale Name</label>
									<input type="text" class="form-control" placeholder="Scale" name="scl"
										value="<?php echo set_value('scl'); ?>">
									<span class="text-danger"
										style="font-size:14px;"><?php echo form_error('scl'); ?></span>
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
						<th>Scale Name</th>
						<th>Action</th>
					</thead>

					<?php
					$i = 1;
						foreach ($scale as $scl) {
							?>
							<tr class="text-center" id="row<?php echo $scl->id; ?>">
								<td><?php echo $i; ?></td>
								<td><?php echo $scl->scale; ?></td>
								<td>
									<button id="<?php echo $scl->id; ?>" class="btn btn-flat btn-sm btn-danger delete_catogery"><i class="fas fa-trash-alt"></i></button>
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

