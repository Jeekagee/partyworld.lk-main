<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Products</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>Dashboard">Home</a></li>
              <li class="breadcrumb-item active">Products</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Products</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table id="example1" class="table table-bordered table-striped">
                        <thead>
                        <tr class="text-center">
                            <th>#</th>
                            <th>Code</th>
                            <th>Image</th>
                            <th>Name</th>
                            <th>Catogery</th>
                            <th>Scale</th>
                            <th>Price</th>
                            <th>Actions</th>
                        </tr>
                        </thead>
                        <a href=""></a>
                        <tbody>
                                <?php
                                    $i=1;
                                    foreach ($products as $product) {
                                    ?>
                                        <tr id="row<?php echo $product->id; ?>">
                                            <td class="text-center"><?php echo $i; ?></td>
                                            <td><?php echo $product->product_id; ?></td>
                                            <td class="text-center"><img height="40px" src="<?php echo base_url(); ?>uploads/<?php echo $product->image; ?>" alt="<?php echo $product->name; ?>"></td>
                                            <td><?php echo $product->name; ?></td>
                                            <td class="text-center">
                                                <?php 
                                                $CI =& get_instance();
                                                if ($product->catogery != 0) {
                                                    $catogery = $CI->Product_model->show_catogery($product->catogery);
                                                    echo $catogery->catogery;
                                                } 
                                                ?>
                                            </td>
                                            <td class="text-center">
                                                <?php 
                                                    $CI =& get_instance();
                                                    if ($product->scale != 0) {
                                                        $scale = $CI->Product_model->show_scale($product->scale);
                                                        echo $scale->scale;
                                                    } 
                                                ?>
                                            </td>

                                            <td class="text-right">
                                                <?php echo $product->price; ?>.00
                                            </td>
                                            <td class="text-center">
                                            
                                            <div class="margin">
                                                <div class="btn-group">
                                                    <a href="<?php echo base_url(); ?>Product/View/<?php echo $product->id; ?>" class="btn btn-flat btn-sm btn-success"><i class="fas fa-eye"></i></a>
                                                </div>
                                                
                                                <div class="btn-group">
                                                    <a href="" class="btn btn-flat btn-sm btn-primary"><i class="fas fa-pen"></i></a>
                                                </div>

                                                <div class="btn-group">
                                                    <a id="<?php echo $product->id; ?>" class="btn btn-flat btn-sm btn-danger delete"><i class="fas fa-trash-alt"></i></a>
                                                </div>

                                                <div class="btn-group">
                                                    <a href="<?php echo base_url(); ?>Product/AddVarients/<?php echo $product->id; ?>" class="btn btn-flat btn-sm btn-warning"><i class="fas fa-plus"></i></a>
                                                </div>
                                            </div>
                                            </td>
                                        </tr>
                                    <?php
                                    $i++;
                                    }
                                ?>
                        </tbody>
                        
                        </table>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
            <!-- /.col -->
        </div>
        

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  