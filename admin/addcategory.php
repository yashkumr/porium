<?php include 'config/db.php'; ?>
<?php
include 'includes/header.php';
include 'includes/topbar.php';
include 'includes/sidebar.php';
?>


<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
    
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Categories</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                        <li class="breadcrumb-item active">Add Category</li>
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
            <!-- Product add Form  -->
            <div class="col-12">

                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Add Category</h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form role="form" method="post" action="response.php">
                        <div class="card-body">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Category</label>
                                <input type="text" class="form-control" id="exampleInputEmail1" name="category"
                                    placeholder="Enter Category">
                            </div>
                        </div>
                        <div class="card-footer">
                            <button type="submit" name="addCategory" class="btn btn-primary">Add Category</button>
                        </div>
                    </form>
                </div>
</div>
                <!-- /.card -->
                <!-- Category add Form End -->
                

                <!-- Category table -->
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Category Table</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table id="addCategoryFetch" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Category Name</th>
                                    <th>Status</th>

                                    <th> Operations
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                
                            <?php displayFetchingCategory()?>
                                
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