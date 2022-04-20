<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Add Image</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>Dashboard">Home</a></li>
              <li class="breadcrumb-item active">Add Image</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
            <div class="col-6">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Products</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                      <div id="successMessage"><?php echo $this->session->flashdata('file_error'); ?></div>
                      <?php echo form_open_multipart('Product/insert_varient_img');?>
                          <div class="form-group">
                              <label>Add Image</label>
                              <input type="text" name="var_id" id="var_id" value="<?php echo $var_id; ?>" hidden>
                              <input class="form-control" type = "file" name = "var_img"/>
                              <span class="text-danger" style="font-size:14px;">
                              
                              <input style="margin-top:10px;" type="submit" value="Upload" class="btn btn-flat btn-primary">
                              <?php 
                                  $file_errors = $this->session->flashdata('file_error');
                                  print_r($file_errors);
                              ?>
                              </span>
                          </div>
                      </form>
                    </div>
                </div>
                <!-- /.card -->
            </div>
            <!-- /.col -->
            </div>
        </div>
        

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->