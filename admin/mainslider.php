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
                    <h1 class="m-0 text-dark">Main Slider</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                        <li class="breadcrumb-item active">Slider</li>
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
            <?php displayMessage()?>
            <div class="col-12">

                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Slider</h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form role="form" action="response.php" method="post" enctype="multipart/form-data">
                        <div class="card-body">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Add Slider</label>
                                <input type="file" name="slider" class="form-control"  placeholder="Add Slider">
                            </div>
                        </div>
                        <div class="card-footer">
                            <button type="submit" name="addSlider" class="btn btn-primary">Add Slider</button>
                        </div>
                    </form>
                </div>
                <!-- /.card -->
                <!-- Product add Form End -->

                <!-- data table forms  -->

                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Main Slider</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table id="product-fetch" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Slider Image</th>
                                    <th>Slider Name</th>
                                    <th>Active</th>
                                    <th> Operations
                                    </th>
                                </tr>
                            </thead>
                            <tbody>

                                <?php fetchMainsliderData() ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <!-- data table forms end -->



        </div>
    </section>
    <!-- Main Content end-->
</div>



<?php include('includes/footer.php'); ?>
<script>
    $(function() {
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