
<?php

function firstLogoForm()
{

  confirm($result = query("select * from setting where setting_id = 1"));
  if ($row = mysqli_fetch_assoc($result)) {
    $display =  <<<DELIMETER
      <div class="tab-pane fade show active" id="logo" role="tabpanel" aria-labelledby="logo-tab">
      <form action="" method="POST" enctype="multipart/form-data">
        <div class="row">
          <div class="col-12 text-center my-2">
            <h2>Update Logo</h2>
          </div>
          <div class="col-lg-6">
            <div class="form-group">
              <label for="existing-logo">Existing Logo</label>
              <img class ="img-fluid" width="80" src="assets/image/logo/{$row['setting_logo']}" alt="{$row['setting_logo']}">
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-lg-6">
            <div class="form-group">
              <label for="logo">Logo</label>
              <input type="file" accept="image/*" name="logo" class="form-control-file border" id="logo">
            </div>
          </div>

        </div>
        <div class="row col-12"> <button type="submit" name="logoUpdate" class="btn btn-primary">Update
            Logo</button></div>
      </form>
    </div>
    DELIMETER;
    echo $display;
  }
}


function secondForm()
{
  confirm($result = query("select * from setting where setting_id = 1"));
  if ($row = mysqli_fetch_assoc($result)) {

    $display = <<<DELIMETER
    <div class="tab-pane fade" id="favicon" role="tabpanel" aria-labelledby="favicon-tab">
    <form action="{$_SERVER['PHP_SELF']}" method="POST" enctype="multipart/form-data">
      <div class="row">
        <div class="col-12 text-center my-2">
          <h2>Update Favicon</h2>
        </div>
        <div class="col-lg-6">
          <div class="form-group">
            <label for="existing-logo">Existing Favicon</label>
            <img src="assets/image/favicon/{$row['setting_favicon']}" class="img-fluid" width="80" alt="{$row['setting_favicon']}">
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-lg-6">
          <div class="form-group">
            <label for="logo">Favicon</label>
            <input name="favicon" type="file" accept="image/*"  class="form-control-file border" id="logo">
          </div>
        </div>

      </div>
      <div class="row col-12"> <button type="submit" name="faviconUpdate" class="btn btn-primary">Update
          Favicon</button></div>
    </form>
  </div>
  DELIMETER;
    echo $display;
  }
}


function thirdForm()
{

  confirm($result = query("select * from setting where setting_id = 1"));
  if ($row = mysqli_fetch_assoc($result)) {

    $display = <<<DELIMETER
  <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">

  <form action="" method="POST" enctype="multipart/form-data">
    <div class="row">
      <div class="col-12 text-center my-3">
        <h2>Update Contact Info</h2>
      </div>

      <div class="col-lg-6">
        <div class="form-group">
          <label for="address">Address:</label>
          <input type="text" class="form-control" value="{$row['setting_address']}"  border" name="setting_address" id="address" placeholder=" New delhi India">
        </div>
        <div class="form-group">
          <label for="mobile-number">Phone Number:</label>
          <input type="text" class="form-control" value="{$row['setting_phone']}" name="setting_number" id="mobile-number"  placeholder=" +918449503795">
        </div>
      </div>
      <div class="col-lg-6">
        <div class="form-group">
          <label for="email-id">Email:</label>
          <input type="email" class="form-control border" value="{$row['setting_email']}" name="setting_email" id="email-id"  placeholder=" example@gmail.com">
        </div>
        <div class="form-group">
          <label for="work-days">Working Days:</label>
          <input type="text" class="form-control" value="{$row['setting_working_hours']}" name="setting_workingday" id="work-days"  placeholder="Mon - Sat">
        </div>
      </div>
    </div>

    <div class="row col-12"> <button type="submit" name="footerUpdate"  class="btn btn-primary">Footer Update</button></div>
  </form>
</div>
DELIMETER;
    echo $display;
  }
}

function fourthForm()
{

  confirm($result = query("select * from social where social_id = 1"));
  if ($row = mysqli_fetch_assoc($result)) {
    $display = <<<DELIMETER
    <div class="tab-pane fade" id="social-links" role="tabpanel" aria-labelledby="social-links-tab">

    <form action="" method="POST" enctype="multipart/form-data">
      <div class="row">
        <div class="col-12 text-center my-3">
          <h2>Update Social Links</h2>
        </div>

        <div class="col-lg-6">
          <div class="form-group">
            <label for="facebook">facebook:</label>
            <input type="text" class="form-control" value="{$row['facebook']}" id="facebook" name="facebook" placeholder="https://example.com">
          </div>
          <div class="form-group">
            <label for="twitter">Twitter:</label>
            <input type="text" class="form-control" value="{$row['twitter']}" id="twitter" name="twitter" placeholder="https://example.com">
          </div>
        </div>
        <div class="col-lg-6">
          <div class="form-group">
            <label for="instagram">Instagram:</label>
            <input type="text" class="form-control" value="{$row['instagram']}" id="instagram" name="instagram" placeholder="https://example.com">
          </div>
          <div class="form-group">
            <label for="youtube">Youtube:</label>
            <input type="text" class="form-control" value="{$row['youtube']}" id="youtube" name="youtube" placeholder="https://example.com">
          </div>
        </div>
      </div>

      <div class="row col-12"> <button type="submit" name="submit_social" class="btn btn-primary">Social Media</button></div>
    </form>
  </div>
  DELIMETER;
    echo $display;
  }
}

function fifthForm()
{

  confirm($result = query("select * from setting where setting_id = 1"));
  if ($row = mysqli_fetch_assoc($result)) {

    $display = <<<DELIMETER
  
  <div class="tab-pane fade" id="subscribe-marketing-porium" role="tabpanel" aria-labelledby="subscribe-marketing-porium-tab">
  <form action="" method="POST" enctype="multipart/form-data">
    <div class="row">
      <div class="col-12 text-center my-3">
        <h2>Suscribe News Letter</h2>
      </div>

      <div class="col-lg-6">
        <div class="form-group">
          <label for="">Subscribe Info</label>
          <textarea type="text"  rows="5" class="form-control"  name="subscribe_text" placeholder="https://example.com">{$row['setting_subscribe_info']}</textarea>
        </div>
        
      </div>
   
    </div>

    <div class="row col-12"> <button type="submit" name="subscribe_info" class="btn btn-primary">Update</button></div>
  </form>
</div>
DELIMETER;
    echo $display;
  }
}


function sixthForm()
{

  confirm($result = query("select * from payment_details where payment_id = 1"));
  if ($row = mysqli_fetch_assoc($result)) {

    $display = <<<DELIMETER
  
  <div class="tab-pane fade" id="payment" role="tabpanel" aria-labelledby="payment-tab">
  <form action="" method="POST" enctype="multipart/form-data">
<div class="row">
<div class="col-12 text-center my-3">
<h2>Razorpay</h2>
</div>

<div class="col-lg-6">
<div class="form-group">
<label for="address">Key Id</label>
<input type="text" class="form-control" name="key_id" value="{$row['payment_key']}" id="key_id" placeholder="Enter Your Razorpay Key">
</div>
<div class="form-group">
<label for="mobile-number">Secret Key</label>
<input type="text" class="form-control" name="secret_key" value="{$row['payment_secret_key']}"  id="secret_key"  placeholder="Enter Secret Key">
</div>
</div>

</div>

<div class="row col-12"> <button type="submit" name="updaterazor"  class="btn btn-primary">Razorpay Update</button></div>
</form>
</div>

DELIMETER;
    echo $display;
  }
}

?>