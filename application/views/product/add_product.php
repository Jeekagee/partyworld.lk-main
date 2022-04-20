<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Add Product</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>Dashboard">Home</a></li>
              <li class="breadcrumb-item active">Add Product</li>
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
                            <h3 class="card-title">Add New Product</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <?php echo form_open_multipart('Product/insert');?>
                            <div class="card-body">
                            <div id="successMessage"><?php echo $this->session->flashdata('success'); ?></div>
                            <div class="form-group">
                                <label>Product Code</label>
                                <input type="text" class="form-control" placeholder="Product ID" name="pro_id" value="<?php echo set_value('pro_id'); ?>">
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
                                <label>Price</label>
                                <input type="text" class="form-control" placeholder="Price" name="price" value="<?php echo set_value('price'); ?>">
                                <span class="text-danger" style="font-size:14px;"><?php echo form_error('price'); ?></span>
                            </div>

                            <div class="form-group">
                                <label>Product Catogery</label>
                                <select name="cat" id="cat" class="form-control" >
                                  <option value="">None</option>
                                <?php
                                  foreach ($cats as $cat) {
                                    echo "<option value='$cat->id'>$cat->catogery</option>";
                                  }
                                ?>
                                </select>
                                <span class="text-danger" style="font-size:14px;"><?php echo form_error('pro_des'); ?></span>
                            </div>

                            <div class="form-group">
                                <label>Size Scale</label>
                                <select name="scale" id="scale" class="form-control" >
                                  <option value="">None</option>
                                <?php
                                  foreach ($scales as $scl) {
                                    echo "<option value='$scl->id'>$scl->scale</option>";
                                  }
                                ?>
                                </select>
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

                            <div class="form-group">
                                <label>Tags(Seperate each with Comma)</label>
                                <input type="text" class="form-control" placeholder="Ex: Fancy,Party,.." name="tags" value="<?php echo set_value('tags'); ?>">
                                <span class="text-danger" style="font-size:14px;"><?php echo form_error('tags'); ?></span>
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
        </div>
        

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  