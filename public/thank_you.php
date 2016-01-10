<!-- Configuration-->
<?php require_once("../resources/config.php"); ?>
<?php require_once("cart.php"); ?>

<!-- Header and nav-->
<?php include(TEMPLATE_FRONT .  "/header.php");?>

<?php
// http://localhost/ecomm-store/public/thank_you.php?tx=32431341&amt=489&cc=USD&st=Completed
if(isset($_GET['tx'])) { 
    $amount = $_GET['amt'];//amount
    $currency = $_GET['cc']; //currency
    $transaction = $_GET['tx']; //transaction id
    $status = $_GET['st']; //status
    
    $query = query("INSERT INTO orders(order_amount, order_transaction, order_status, order_currency) VALUES('$amount', '$transaction', '$status', '$currency')");
    
    confirm_query($query);
    
    session_destroy();
    
} else {
    redirect("index.php");
}

?>


<!-- Page Content -->
<div class="container">

    <h1 class="text-center">Thank You</h1>


<?php include(TEMPLATE_FRONT .  "/footer.php");?>