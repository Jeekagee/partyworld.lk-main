<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Add Varients</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>Dashboard">Home</a></li>
              <li class="breadcrumb-item active">Add Varients</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
            <div class="col-12">
                
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Products</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <div>
                            Product Id : <?php echo $poduct_id = $product->product_id; ?>
                        </div>
                        <div>
                            Product Name : <?php echo $product->name; ?>
                        </div>

                        <table class="table table-bordered table-striped">
                        <thead>
                        <tr class="text-center">
                            <th>#</th>
                            <th>Image</th>
                            <th>Color</th>
                            <th>Size Scale</th>
                            <th>Size</th>
                            <th>Price</th>
                            <th>Actions</th>
                        </tr>
                        </thead>
                        <tbody>
                                <?php
                                $i = 1;
                                foreach ($varients as $var) {
                                   ?>
                                    <tr class="text-center">
                                        <td><?php echo $i; ?></td>
                                        <td class="text-center"><img height="40px" src="<?php echo base_url(); ?>uploads/<?php echo $var->image; ?>" alt="<?php echo $var->color; ?>"></td>
                                        <td>
                                            <?php
                                                $CI =& get_instance();
                                                if ($var->color != 0) {
                                                    $color = $CI->Product_model->show_color($var->color);
                                                    echo $color->color;
                                                }
                                                
                                            ?>
                                        </td>
                                        <td>
                                            <?php
                                            if ($var->scale != 0) {
                                                $scale = $CI->Product_model->show_scale($var->scale);
                                                echo $scale->scale;
                                            }
                                            ?>
                                        </td>
                                        <td>
                                            <?php
                                            if ($var->size != 0) {
                                                $size = $CI->Product_model->show_sizee($var->size);
                                                echo $size->size;
                                            }
                                                
                                            ?>
                                        </td>

                                        <td class="text-right">
                                            <?php echo $var->price; ?>.00
                                        </td>
                                        <td class="text-center">
                                            <div class="margin">
                                                <div class="btn-group">
                                                    <a href="<?php echo base_url(); ?>Product/delete_varient/<?php echo $var->id; ?>/<?php echo $product->id; ?>" class="btn btn-flat btn-sm btn-danger"><i class="fas fa-trash-alt"></i></a>
                                                    
                                                </div>

                                                <div class="btn-group">
                                                    <a href="<?php echo base_url(); ?>Product/add_img/<?php echo $var->id; ?>" class="btn btn-flat btn-sm btn-warning"><i class="fas fa-plus"></i></a>
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
                        <div class="mt-2">
                            <!-- Button trigger modal -->
                            <button type="button" class="btn btn-flat btn-success" data-toggle="modal" data-target="#varient">
                            <i class="fas fa-plus"></i> Add New
                            </button>
                        </div>
                    </div>
                    <!-- /.card-body -->
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

    <!-- Varient Modal -->
    <div class="modal fade" id="varient" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
        <div class="modal-header bg-cyan">
            <h5 class="modal-title" id="exampleModalLabel">Add New Varient</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
           <form action="<?php echo base_url(); ?>Product/insert_varient" method="post">
                <input type="text" name="product_id" id="p_id" value="<?php echo $product->id; ?>" hidden>
                <input type="text" name="scale" id="scale" value="<?php echo $product->scale; ?>" hidden>
               <div>
                   <div>
                       <label>Select Color</label>
                   </div>
                   <div>
                       <select name="color" id="color" class="form-control">
                           <?php
                            foreach ($colors as $clr) {
                                ?>
                                <option value="<?php echo $clr->id; ?>" style="color: <?php echo $clr->hex; ?>;">
                                    <?php echo $clr->color; ?>
                                </option>
                                <?php
                            }
                           ?>
                       </select>
                   </div>

                   <div>
                       <label>Select Size</label>
                   </div>
                   <div>
                       <select name="size" id="size"  class="form-control">
                            <?php
                                foreach ($sizes as $sz) {
                                    ?>
                                    <option value="<?php echo $sz->id; ?>">
                                        <?php echo $sz->size; ?>
                                    </option>
                                    <?php
                                }
                           ?>
                       </select>
                   </div>

                   <div>
                       <label>Price</label>
                   </div>
                   <div>
                       <input type="text" name="price" class="form-control">
                   </div>
               </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary btn-flat" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary btn-flat">Save</button>
        </div>
        </div>
    </div>
    </div>
    </form>

    

  