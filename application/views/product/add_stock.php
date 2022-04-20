<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Add Stock</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>Dashboard">Home</a></li>
              <li class="breadcrumb-item active">Add Stock</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <!-- left column -->
                <div class="col-lg-6">
                    <!-- general form elements -->
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Add New Stock</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <?php echo form_open_multipart('Product/insert');?> 
                        <form method="" action="">
                            <div class="card-body">
                            <div id="successMessage"><?php echo $this->session->flashdata('success'); ?></div>
                            <div class="form-group">
                                <label>Product ID</label>
                                <div>
                                    <select name="p_id" id="p_id" class="form-control">
                                        <option value="">Select Product ID</optoin>
                                        <?php
                                        foreach ($product_ids as $product_id) {
                                            echo "<option value='$product_id->product_id'>$product_id->product_id</optoin>";
                                        }
                                        ?>
                                    </select>
                                </div>
                                <span class="text-danger" style="font-size:14px;"><?php echo form_error('pro_id'); ?></span>
                            </div>
                            <div class="form-group">
                                <label>Product Name</label>
                                <input type="text" class="form-control" placeholder="Product Name" name="pro_name" value="<?php echo set_value('pro_name'); ?>">
                                <span class="text-danger" style="font-size:14px;"><?php echo form_error('pro_name'); ?></span>
                            </div>
                            <div class="form-group">
                                <label>Product Description(Short)</label>
                                <input type="text" class="form-control" placeholder="Product Description" name="pro_des" value="<?php echo set_value('pro_des'); ?>">
                                <span class="text-danger" style="font-size:14px;"><?php echo form_error('pro_des'); ?></span>
                            </div>
                            
                            <div class="form-group">
                                <label>Default Image</label>
                                <input class="form-control" type = "file" name = "pro_img"/>
                                <span class="text-danger" style="font-size:14px;">

                                <?php 
                                    $file_errors = $this->session->flashdata('file_error');
                                    print_r($file_errors);
                                ?>
                                </span>
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
            </div>
        </div>
        

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  