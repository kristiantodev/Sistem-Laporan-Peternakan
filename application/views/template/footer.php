    <!--end switcher-->
    <!-- Bootstrap JS -->
    <script src="<?php echo base_url();?>assets/assets/js/bootstrap.bundle.min.js"></script>
    <!--plugins-->
    <script src="<?php echo base_url();?>assets/assets/js/jquery.min.js"></script>
    <script src="<?php echo base_url();?>assets/assets/plugins/simplebar/js/simplebar.min.js"></script>
    <script src="<?php echo base_url();?>assets/assets/plugins/metismenu/js/metisMenu.min.js"></script>
    <script src="<?php echo base_url();?>assets/assets/plugins/perfect-scrollbar/js/perfect-scrollbar.js"></script>
    <script src="<?php echo base_url();?>assets/assets/plugins/datatable/js/jquery.dataTables.min.js"></script>
    <script src="<?php echo base_url();?>assets/assets/plugins/datatable/js/dataTables.bootstrap5.min.js"></script>
      <!-- Sweet-Alert  -->
        <script src="<?php echo base_url();?>assets/plugins/sweet-alert2/sweetalert2.min.js"></script>
        <script src="<?php echo base_url();?>assets/pages/sweet-alert.init.js"></script>
        <script src="<?php echo base_url();?>assets/alert.js"></script>
    <script>
        $(document).ready(function() {
            $('#example').DataTable();
          } );
    </script>
    <script>
        $(document).ready(function() {
            var table = $('#example2').DataTable( {
                lengthChange: false,
                buttons: [ 'copy', 'excel', 'pdf', 'print']
            } );
         
            table.buttons().container()
                .appendTo( '#example2_wrapper .col-md-6:eq(0)' );
        } );
    </script>
    <!--app JS-->
    <script src="<?php echo base_url();?>assets/assets/js/app.js"></script>
</body>

</html>