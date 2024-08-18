<?php include('config/db.php'); ?>
<?php
include('includes/header.php');
include('includes/topbar.php');
include('includes/sidebar.php'); 
?>



<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">User</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                        <li class="breadcrumb-item active">User</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid" >
            <?php displayMessage()?>
            <!-- user start -->
            <div class="card">
              <div class="card-header d-flex justify-content-end">
                
                <a class="btn btn-primary" href="addproduct.php" >Add New User</a>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="product-fetch" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>Id</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Password</th>
                    <th>Phone</th>
                    <th>Operation</th>
                  </tr>
                  </thead>
                  <tbody>
           <?php userFetch()?>
                  </tbody>
                </table>
              </div>
            </div> 
          </div>
            <!-- user start end -->
        </div>
        </section>
    <!-- Main Content end-->
</div>


 

<?php include('includes/footer.php'); ?>
<script>
  $(function () {
    $("#product-fetch").DataTable({
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
