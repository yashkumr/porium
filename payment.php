<?php
    require('config/db.php');
    require("razorpay-php/Razorpay.php");
    include "razorpay-php/payment-connection.php";

    use Razorpay\Api\Api;

    $api = new Api($keyId, $secretKey);
    // $username = $_SESSION['user_name'];

    $email = "ankit@gmail.com";
    $mobile = "8447411912";
    $address = "tihar village";
    $note = "Thank You for purchasing";
    $displayCurrency ="INR";
  
   confirm($result = query("select * from users where email = '{$_COOKIE['emailOrPhone']}'"));
   $row = mysqli_fetch_assoc($result);
   confirm($result = query("select * from setting where setting_id = 1"));
   $logo = mysqli_fetch_assoc($result);

   confirm($order = query("select * from orders where user_id = '{$row['user_id']}' and order_status='Completed'"));

   $orderRow = mysqli_fetch_assoc($order);

    print_r($row['name']);

    $orderData = [
        'receipt'         => 3456,
        'amount'          => 1000 * 100, // 2000 rupees in paise
        'currency'        => 'INR',
        'payment_capture' => 1 // auto capture
    ];

    $razorpayOrder = $api->order->create($orderData);

    $razorpayOrderId = $razorpayOrder['id'];

    $_SESSION['razorpay_order_id'] = $razorpayOrderId;

    $displayAmount = $amount = $orderData['amount'];


    if ($displayCurrency !== 'INR')
    {
        $url = "https://api.fixer.io/latest?symbols=$displayCurrency&base=INR";
        $exchange = json_decode(file_get_contents($url), true);

        $displayAmount = $exchange['rates'][$displayCurrency] * $amount / 100;
    }

    $data = [
        "key"               => $keyId,
        "amount"            => $amount,
        "name"              => "{$row['name']}",
        "description"       => "Tron Legacy",
        "image"             => "admin/assets/image/logo/{$logo['setting_logo']}",
        "prefill"           => [
        "name"              => "Daft Punk",
        "email"             => "customer@merchant.com",
        "contact"           => "9999999999",
        ],
        "notes"             => [
        "address"           => "Hello World",
        "merchant_order_id" => "12312321",
        ],
        "theme"             => [
        "color"             => "#F37254"
        ],
        "order_id"          => $razorpayOrderId,
    ];

    if ($displayCurrency !== 'INR')
    {
        $data['display_currency']  = $displayCurrency;
        $data['display_amount']    = $displayAmount;
    }

    $json = json_encode($data);




?>




  <button>
  <form action="payment-success.php" method="POST">
  <script
    src="https://checkout.razorpay.com/v1/checkout.js"
    data-key="<?php echo $data['key']?>"
    data-amount="<?php echo $data['amount']?>"
    data-currency="INR"
    data-name="<?php echo $data['name']?>"
    data-image="<?php echo $data['image']?>"
    data-description="<?php echo $data['description']?>"
    data-prefill.name="<?php echo $data['prefill']['name']?>"
    data-prefill.email="<?php echo $data['prefill']['email']?>"
    data-prefill.contact="<?php echo $data['prefill']['contact']?>"
    data-notes.shopping_order_id="3456"
    data-order_id="<?php echo $data['order_id']?>"
    <?php if ($displayCurrency !== 'INR') { ?> data-display_amount="<?php echo $data['display_amount']?>" <?php } ?>
    <?php if ($displayCurrency !== 'INR') { ?> data-display_currency="<?php echo $data['display_currency']?>" <?php } ?>
  >
  </script>
  <!-- Any extra fields to be submitted with the form but not sent to Razorpay -->
  <input type="hidden" name="shopping_order_id" value="3456">


</form>
  </button>
