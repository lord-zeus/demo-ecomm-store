<!-- Configuration-->
<?php require_once("../resources/config.php"); ?>

<!-- Header and nav-->
<?php include(TEMPLATE_FRONT .  "/header.php");?>

<?php
// http://localhost/ecomm-store/public/thank_you.php?tx=32431341&amt=489&cc=USD&st=Completed

    
    process_transaction();

?>


<!-- Page Content -->
<div class="container">

    <h1 class="text-center">Thank You</h1>


<?php include(TEMPLATE_FRONT .  "/footer.php");?>