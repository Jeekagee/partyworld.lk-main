<!-- /.content-wrapper -->
<footer class="main-footer">
    <div class="float-right d-none d-sm-block">
      <b>Version</b> 3.1.0
    </div>
    <strong>Copyright &copy; 2014-2021 <a href="https://adminlte.io">AdminLTE.io</a>.</strong> All rights reserved.
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="<?php echo base_url(); ?>assets/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="<?php echo base_url(); ?>assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- bs-custom-file-input -->
<script src="<?php echo base_url(); ?>assets/plugins/bs-custom-file-input/bs-custom-file-input.min.js"></script>
<!-- AdminLTE App -->
<script src="<?php echo base_url(); ?>assets/dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?php echo base_url(); ?>assets/dist/js/demo.js"></script>
<!-- Page specific script -->
<!-- DataTables -->
<script src="<?php echo base_url(); ?>assets/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url(); ?>assets/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="<?php echo base_url(); ?>assets/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="<?php echo base_url(); ?>assets/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script>
$(function () {
  bsCustomFileInput.init();
});

setTimeout(function() {
    $('#successMessage').fadeOut('slow');
}, 3000); // <-- time in milliseconds

</script>

<script>
  $(function () {
    $("#example1").DataTable({
      "responsive": true,
      "autoWidth": false,
    });
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    });
  });
</script>

<script>
  $('#scale').on('change', function() {
    var scale = $(this).val();
    $.ajax({
      url:"<?php echo base_url(); ?>Product/show_size",
      type:"POST",
      cache:false,
      data:{scale:scale},
      success:function(data){
        //alert(data);
        $("#size").html(data);
      }
    });
  });

</script>

<script>
  $(document).ready(function() {
        $('.delete').click(function() {
            var id = $(this).attr("id");
            if (confirm("Are you sure you want to delete this Product?")) {
                $.ajax({
                    type: "POST",
                    url: "<?php echo base_url(); ?>Product/deletePro",
                    data: ({
                        id: id
                    }),
                    cache: false,
                    success: function(html) {
                        //alert("hi");
                        $("#row" + id).fadeOut('slow');
                    }
                });
            } else {
                return false;
            }
        });
  });
</script>
</body>
</html>