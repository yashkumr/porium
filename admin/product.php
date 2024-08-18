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
                    <h1 class="m-0 text-dark">Product</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                        <li class="breadcrumb-item active">Product</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
          <?php displayMessage()?>
            <!-- Product table -->
            <div class="card">
              <div class="card-header d-flex justify-content-end">
                
                <a class="btn btn-primary" href="addproduct.php" >Add New Product</a>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="product-fetch" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>Id</th>
                    <th>Product Name</th>
                    <th>Product Image</th>
                    <th>SKU Code</th>

                    <th>Stock</th>
                    <th>Active</th>
                    <th> Operations   
                    </th>
                  </tr>
                  </thead>
                  <tbody>
                  
                  <?php productFetch();?>
                  </tbody>
                </table>
              </div>
            </div> 
          </div>
            <!-- product table end -->
        </div>
    </section>
    <!-- Main Content end-->
</div>







<?php include('includes/footer.php'); ?>

<!-- product-table -->
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