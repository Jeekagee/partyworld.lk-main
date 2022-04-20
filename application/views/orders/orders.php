<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Orders</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>Dashboard">Home</a></li>
              <li class="breadcrumb-item active">Orders</li>
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
                        <h3 class="card-title">Orders</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table id="example1" class="table table-bordered table-striped">
                        <thead>
                        <tr class="text-center">
                            <th>#</th>
                            <th>Order ID</th>
                            <th>Mobile</th>
                            <th>Address</th>
                            <th>Total</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <a href=""></a>
                        <tbody>
                                <?php
                                    $CI =& get_instance();
                                    $i=1;
                                    foreach ($orders as $order) {
                                    ?>
                                        <tr id="row<?php echo $order_id = $order->order_id; ?>">
                                            <td class="text-center"><?php echo $i; ?></td>
                                            <td>
                                                <?php echo $order->order_id; ?>
                                            </td>
                                            <td>
                                                <?php
                                                    $customer = $CI->Orders_model->customer_data($order->customer_id);
                                                    echo $customer->mobile;
                                                ?>
                                            </td>
                                            <td>
                                                <?php echo $customer->address; ?>
                                            </td>
                                            <td>
                                                <?php
                                                    echo $CI->Orders_model->order_total($order_id);
                                                ?>
                                            </td>
                                            

                                            <td>
                                                <?php echo $order->status; ?>
                                            </td>
                                            <td class="text-center">
                                            
                                            <div class="margin">
                                                <div class="btn-group">
                                                    <a href="<?php echo base_url(); ?>Product/View/<?php //echo $product->id; ?>" class="btn btn-flat btn-sm btn-success"><i class="fas fa-eye"></i></a>
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

  