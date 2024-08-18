<?php include('config/db.php'); ?>
<?php
include('includes/header.php');
include('includes/topbar.php');
include('includes/sidebar.php');
include('helper/forms.php');
?>



<!-- LOGO LOGIC -->
<?php

$destination = "assets/image/logo/";

confirm($result = query("select * from setting where setting_id = 1"));


if (isset($_POST['logoUpdate'])) {
  if (mysqli_num_rows($result) == 0) {
    if (isset($_FILES['logo']['name'])) {

      if (move_uploaded_file($_FILES['logo']['tmp_name'], $destination . $_FILES['logo']['name'])) {

        confirm(query("INSERT into setting (setting_logo) values ('{$_FILES['logo']['name']}')"));

        message("Logo Inserted Sucessfully");
      }
    }
  } else {
    if ($row = mysqli_fetch_assoc($result)) {
      if (isset($_FILES['logo']['name'])) {
        $previous_logo = $row['setting_logo'];
        $file_name = escape_string($_FILES['logo']['name']);
        if (move_uploaded_file($_FILES['logo']['tmp_name'], $destination . $file_name)) {

          query("update setting set setting_logo = '{$file_name}' where setting_id = 1");

          unlink($destination . $previous_logo);

          message("Logo Update SuccessFully");

          redirect("settings.php");
        }
      }
    }
  }
}
?>
<!-- LOGO LOGIC END -->

<!-- FAVICON LOGIC -->
<?php

$destination = "assets/image/favicon/";

confirm($result = query("select * from setting where setting_id = 1"));

if (isset($_POST['faviconUpdate'])) {

  if (mysqli_num_rows($result) == 0) {
    if (isset($_FILES['favicon']['name'])) {

      if (move_uploaded_file($_FILES['favicon']['tmp_name'], $destination . $_FILES['favicon']['name'])) {

        confirm(query("INSERT into setting (setting_favicon) values ('{$_FILES['favicon']['name']}')"));

        message("Favicon Inserted Sucessfully");
      }
    }
  } else {
    if ($row = mysqli_fetch_assoc($result)) {
      if (isset($_FILES['favicon']['name'])) {
        $previous_favicon = $row['setting_favicon'];
        $file_name = escape_string($_FILES['favicon']['name']);
        if (move_uploaded_file($_FILES['favicon']['tmp_name'], $destination . $file_name)) {

          query("update setting set setting_favicon = '{$file_name}' where setting_id = 1");

          unlink($destination . $previous_favicon);

          message("favicon Update SuccessFully");

          redirect("settings.php");
        }
      }
    }
  }
}
?>
<!-- FAVICON LOGIC END -->
<!-- FOOTER LOGIC -->
<?php

confirm($result = query("select * from setting where setting_id = 1"));

if (isset($_POST['footerUpdate'])) {
  $address = escape_string($_POST['setting_address']);
  $work = escape_string($_POST['setting_workingday']);
  $phone = escape_string($_POST['setting_number']);
  $email = escape_string($_POST['setting_email']);

  if ($row = mysqli_fetch_assoc($result)) {
    confirm(query("update setting set setting_address = '{$address}', setting_phone = '{$phone}', setting_working_hours='{$work}', setting_email = '{$email}' where setting_id = 1"));

    message("Update Footer SucessFully");
    // redirect("settings.php");
  } else {
    message("Data Not Found");
  }

  redirect("settings.php");
}



?>
<!-- FOOTER LOGIC END -->
<!-- SOCIAL MEDIA -->
<?php
confirm($result = query("select * from social where social_id = 1"));

if (isset($_POST['submit_social'])) {
  $facebook = escape_string($_POST['facebook']);
  $twitter = escape_string($_POST['twitter']);
  $instagram = escape_string($_POST['instagram']);
  $youtube = escape_string($_POST['youtube']);

  if ($row = mysqli_fetch_assoc($result)) {
    confirm(query("update social set facebook= '{$facebook}', twitter = '{$twitter}', instagram='{$instagram}', youtube = '{$youtube}' where social_id = 1"));
    message("Update Social Link SucessFully");
    // redirect("settings.php");
  } else {
    message("Data Not Found");
  }

  redirect("settings.php");
}
?>
<!-- SOCIAL MEDIA END -->
<!-- SUSCRIBE NEW LETTER -->
<?php 
  confirm($result = query("select * from setting where setting_id = 1"));
  
  if (isset($_POST['subscribe_info'])) {

    $subscribeText= escape_string($_POST['subscribe_text']);
  
    if ($row = mysqli_fetch_assoc($result)) {
     
      confirm(query("update setting set setting_subscribe_info = '{$subscribeText}' where setting_id = 1"));
      message("Update SucessFully");
      // redirect("settings.php");
    } else {
      message("Data Not Found");
    }
  
    // redirect("settings.php");
  }

?>
<!-- SUSCRIBE NEW LETTER END -->


<!-- Razorpay -->
<?php 


  if(isset($_POST['updaterazor'])){

    $payment_id = escape_string($_POST['key_id']);
    $payment_key = escape_string($_POST['secret_key']);
   confirm(query("Update payment_details set payment_key ='{$payment_id}',payment_secret_key='{$payment_key}' where payment_id = 1 "));
    message('Update Successfully');
  }
?>
<!-- Razorpay End -->




<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0 text-dark">Setting</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="index.php">Home</a></li>
            <li class="breadcrumb-item active">Setting</li>
          </ol>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
  <!-- /.content-header -->

  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">
      <?php displayMessage() ?>
      <div class="row">
        <div class="col-12">
          <div class="card card-primary card-outline card-tabs">
            <div class="card-header p-0 pt-1 border-bottom-0">
              <ul class="nav nav-tabs" id="custom-tabs-three-tab" role="tablist">
                <li class="nav-item">
                  <a class="nav-link active" id="logo-tab" data-toggle="pill" href="#logo" role="tab" aria-controls="logo" aria-selected="true">Home</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" id="favicon-tab" data-toggle="pill" href="#favicon" role="tab" aria-controls="favicon" aria-selected="false">Favicon</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" id="contact-tab" data-toggle="pill" href="#contact" role="tab" aria-controls="contact" aria-selected="false">Footer & Contact-info</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" id="social-links-tab" data-toggle="pill" href="#social-links" role="tab" aria-controls="social-links" aria-selected="false">Social Links</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" id="subscribe-marketing-porium-tab" data-toggle="pill" href="#subscribe-marketing-porium" role="tab" aria-controls="subscribe-marketing-porium" aria-selected="false">Subscribe News Letter</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" id="payment-tab" data-toggle="pill" href="#payment" role="tab" aria-controls="payment" aria-selected="false">Payment Setting</a>
                </li>
              </ul>
            </div>
            <div class="card-body">
              <div class="tab-content " id="custom-tabs-three-tabContent">


                <!-- forms -->
                <!-- admin/helper/forms.php -->


                <?php firstLogoForm() ?>
                <?php secondForm() ?>
                <?php thirdForm() ?>
                <?php fourthForm() ?>
                <?php fifthForm()?>
                <?php sixthForm()?>
                <!-- forms end -->
                
                



              </div>
            </div>
            <!-- /.card -->
          </div>
        </div>

      </div>

    </div>
  </section>
  <!-- Main Content end-->
</div>

<?php include('includes/footer.php'); ?>