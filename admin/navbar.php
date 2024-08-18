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
            <h1 class="m-0 text-dark">Navbar</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="index.php">Home</a></li>
              <li class="breadcrumb-item active">Navbar</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
       
      <!-- Product add Form  -->
      <div class="col-12">
                <?php displayMessage() ?>
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Navbar</h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form role="form" action="response.php" method="post" enctype="multipart/form-data">
                        <div class="card-body">
                            <div class="row">

                                <div class="form-group  col-12">
                                    <label for="product-name">NavBar Name</label>
                                    <input type="text" class="form-control" placeholder="Enter Navbar Name" name="top_navbar_name">
                                </div>
                               
                            
                            <div class="card-footer col-12">
                                <button type="submit" name="addNavbar" class="btn btn-primary">Add Navbar</button>
                            </div>
                        </div>



                        <!-- /.card-body -->

                    </form>
                </div>
                <!-- /.card -->

                <!-- Product add Form End -->

  <!-- Category table -->
  <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Navbar Table</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table id="addCategoryFetch" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Navbar Name</th>
                                    <th>Status</th>

                                    <th> Operations
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                
                            <?php displayFetchingNavbar()?>
                                
                            </tbody>
                        </table>
                    </div>
                </div>
          
            <!-- Category table end -->


        </div>
    </section>
    <!-- Main Content end-->
</div>


<?php include 'includes/footer.php'; ?>
<script>
  $(function () {
    $("#addCategoryFetch").DataTable({
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