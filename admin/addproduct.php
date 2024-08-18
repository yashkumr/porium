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
                    <h1 class="m-0 text-dark">Products</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                        <li class="breadcrumb-item active">Add Product</li>
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
                        <h3 class="card-title">Add Product</h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form role="form" action="response.php" method="post" enctype="multipart/form-data">
                        <div class="card-body">
                            <div class="row">

                                <div class="form-group  col-12">
                                    <label for="product-name">Product Name</label>
                                    <input type="text" class="form-control" placeholder="Enter Product Name" name="product_name">
                                </div>
                                <div class="form-group col-md-3">
                                    <label for="product-sku">Product SKU <span class="text-danger">*</span></label>
                                    <!-- <span class="text text-danger"> Already Used This Product Code</span> -->
                                    <input type="text" class="form-control" placeholder="Enter Product Code" name="product_code">

                                </div>
                                <div class="form-group col-md-3">
                                    <label for="product-quantity">Stock</label>
                                    <input type="number" name="product_stock" min="1" class="form-control" placeholder="Quantity" required>
                                </div>
                                <div class="form-group col-md-3">
                                    <label>Category</label>
                                    <select class="custom-select" name="product_category">
                                        <option value selected disabled>Select Category</option>
                                        <?php categoryFetch(); ?>
                                    </select>
                                </div>
                                <div class="form-group col-md-3">
                                    <label for="price">Old Amount</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">₹</span>
                                        </div>
                                        <input type="text" class="form-control" name="product_old_price" placeholder="Amount">
                                        <div class="input-group-append">
                                            <span class="input-group-text">.00</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                            <div class="form-group col-md-4">
                                    <label for="price">Current Amount</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">₹</span>
                                        </div>
                                        <input type="text" class="form-control" name="product_price" placeholder="Amount">
                                        <div class="input-group-append">
                                            <span class="input-group-text">.00</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group col-md-4">
                                    <label>Status</label>
                                    <select class="custom-select" name="product_status">
                                        <option value="1" selected >Active</option>
                                        <option value="0"  >Hide</option>
                                        
                                    </select>
                                </div>
                            <div class="form-group col-md-4">
                                <label for="exampleInputEmail1">Product Image</label>
                                <input type="file" name="images[]"   class="form-control" multiple="multiple" accept="image/*">
                            </div>
                            </div>

                            <!-- product description -->

                            <div class="row">
                                <div class="col-md-12">
                                    <label for="">Product Description</label>
                                    <div class="card card-outline card-info">
                                        <div class="card-header">
                                            <h3 class="card-title">
                                               Product Description
                                            </h3>
                                            <!-- tools box -->
                                           
                                            <!-- /. tools -->
                                        </div>
                                        <!-- /.card-header -->
                                        <div class="card-body pad">
                                            <div class="mb-3">
                                                <textarea id="textareas" class="textarea" placeholder="Place some text here" style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;" name="product_description"></textarea>
                                            </div>
                                            
                                        </div>
                                    </div>
                                </div>
                                <!-- /.col-->
                            </div>

                            <!-- product description end -->
                           
                        </div>



                        <!-- /.card-body -->

                        <div class="card-footer">
                            <button type="submit" name="addProduct" class="btn btn-primary">Add Product</button>
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
<script>
  $(function () {
    // Summernote
    $('#textareas').summernote()
  })
</script>