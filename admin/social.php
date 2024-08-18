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
                    <h1 class="m-0 text-dark">Social</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                        <li class="breadcrumb-item active">Social</li>
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
                        <h3 class="card-title">Social Media</h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <?php
                       confirm($result = query("select * from social"));
                       $row = mysqli_fetch_assoc($result);
                    ?>
                    <form role="form" action="response.php" method="post" enctype="multipart/form-data">
                        <div class="card-body">
                            

                                <div class="form-group  col-12">
                                    <label for="product-name">Twitter</label>
                                    <input type="text" value="<?php if(!empty($row['twitter'])){ echo $row['twitter']; }?>" class="form-control" placeholder="Enter Twiter Account Url" name="social_twitter">
                                </div>
                                <div class="form-group  col-12">
                                    <label for="product-name">Facebook</label>
                                    <input type="text" value="<?php if(!empty($row['facebook'])){ echo $row['facebook']; }?>" class="form-control" placeholder="Enter Facebook Url" name="social_facebook">
                                </div>
                                <div class="form-group  col-12">
                                    <label for="product-name">Instagram</label>
                                    <input type="text" value="<?php if(!empty($row['instagram'])){ echo $row['instagram']; }?>" class="form-control" placeholder="Enter Instagram Url" name="social_instagram">
                                </div>
                               
                        <!-- /.card-body -->

                        <div class="card-footer">
                            <button type="submit" name="addSocialMedia" class="btn btn-primary">Add Product</button>
                        </div>
                    </form>
                </div>
                <!-- /.card -->

                <!-- Product add Form End -->





            </div>
    </section>
    <!-- Main Content end-->
</div>


 

<?php include('includes/footer.php'); ?>
