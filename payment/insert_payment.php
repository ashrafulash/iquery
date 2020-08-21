<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no">
    <title>iQuery</title>
    <link rel="icon" href="./asset/images/fav.png" type="image/gif" sizes="20x20">
    <style>
        @import url('../asset/src/min-css/all.min.css');
        @import url('../asset/src/min-css/master.css');
    </style>
    
    <script defer src="../asset/js/jquery-1.12.4.min.js"></script>
</head>
<body>


<?php 
session_start();
include('../includes/class-loader.inc.php');

$cont = new Controller();

if(!isset($_SESSION["student_id"])){
    header('location:../');
}

 //insert data to payment table
 $cont->insert_payment_data(array(
    'centre'    =>   $_SESSION["centre"],
    'student_id'=>   $_SESSION["student_id"],
    'date'      =>   $_SESSION["date"],
    'status'    =>   $_SESSION["status"],
    'amount'    =>   $_SESSION["amount"],
    'month'     =>   $_SESSION["month"],
    'trx_id'    =>   $_SESSION["trx_id"],
    'purpose'   =>   $_SESSION["purpose"],
));



unset($_SESSION["student_id"]);


?>

<div class="thanks">
    <span class="thanks__icon">
        <i class="fas fa-check"></i>
    </span>
    <h1 class="2 thanks__title">You're all set!</h1>
    <p class="thanks__des">Thanks For being awesome <br> We hope you enjoy learning with us.</p>
    <h2 class="thanks__founder">M.A. TAHER</h2>
    <p class="thanks__degree">M.A. in English Study</p>
    <p class="thanks__uni">Jahangirnagar University</p>
    
</div>


</body>
</html>

