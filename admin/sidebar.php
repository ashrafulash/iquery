<?php 
if(isset($_SESSION['uid'])):
?>
<div class="admin__sidebar">
        <div class="admin__sidebar__logo">
            <img src="../asset/images/iquery-logo.png" alt="">
            <span>Dashboard</span>
        </div>
        <ul class="admin__sidebar__nav">
            <li><a class="mitem_admission" href="main.php">Admission</a></li>
            <li><a class="mitem_token" href="token.php">Token</a></li>
            <li><a class="mitem_email" href="#">Email</a></li>
            <li><a class="mitem_update" href="#">Update</a></li>
            <li><a class="mitem_payments" href="#">Payments</a></li>
            <li><a class="mitm" href="#">Batches</a></li>
            <li><a class="mitm" href="#">Payments</a></li>
            <li><a class="mitm" href="#">Payments</a></li>
            <li><a class="mitm" href="#">Payments</a></li>
            <li><a class="mitm" href="logout.php">Logout/Exit</a></li>
        </ul>
</div>
<?php else: echo 'page not found'; endif; ?>