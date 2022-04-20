<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Inventory</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>Dashboard">Home</a></li>
              <li class="breadcrumb-item active">Inventory</li>
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
                        <h3 class="card-title">Inventory</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table id="example1" class="table table-bordered table-striped">
                        <thead>
                        <tr class="text-center">
                            <th>#</th>
                            <th>Item ID</th>
                            <th>Item Name</th>
                            <th>Quantity</th>
                            <th>Actions</th>
                        </tr>
                        </thead>
                        <a href=""></a>
                        <tbody>
                        <?php
                                    $i=1;
                                    foreach ($inventory as $inv) {
                                    ?>
                                        <tr id="row<?php echo $inv->id; ?>">
                                            <td class="text-center"><?php echo $i; ?></td>
                                            <td><?php echo $inv->product_id; ?></td>
                                            <td><?php echo $inv->name; ?></td>
                                            <td><?php echo $inv->quantity; ?></td>
                                            
                                            <td class="text-center">
                                            
                                            <div class="margin">
                                                <div class="btn-group">
                                                    <a href="<?php echo base_url(); ?>Inventory/View/<?php echo $inv->id; ?>" class="btn btn-flat btn-sm btn-success"><i class="fas fa-eye"></i></a>
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

  