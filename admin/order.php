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
            <h1 class="m-0 text-dark">Order</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="index.php">Home</a></li>
              <li class="breadcrumb-item active">Order Management</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
                   <!-- Product table -->
                   <div class="card">
              <div class="card-header">
                <h3 class="card-title">Orders</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="product-fetch" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>Id</th>
                    <th>Customer</th>
                    <th>Product Name (SKU)</th>
                    <th>Payment</th>
                    <th>Amount (₹)</th>
                    <th>Address</th>
                    <th>Shipping Status</th>
                    <th> Operations   
                    </th>
                  </tr>
                  </thead>
                  <tbody>
                  <tr>
                    <td>1</td>
                    <td>Ankit </td>
                    <td>Wood <b>(Wooden0123)</b></td>
                    <td>
                        COD
                    </td>
                    <td> 500</td>
                    <td>Hari Nagar</td>
                    <td>
                        <select name="shipping_status">
                            <option selected value="pending">Pending</option>
                            <option value="complete">Complete</option>
                            <option value="rejected">Rejected</option>
                        </select>
                    </td>
                    <td>
                        <a href="" class="btn btn-success btn-sm" >Update</a>
                        <a href="" class="btn btn-info btn-sm" >Edit</a>
                        <a href="" class="btn btn-danger btn-sm">Delete</a>
                    </td>
                  </tr>
                 
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


<?php include ('includes/footer.php');?>