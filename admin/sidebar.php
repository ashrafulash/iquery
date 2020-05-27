<?php 
if(isset($_SESSION['uid'])):
?>
<div class="admin__sidebar">
        <div class="admin__sidebar__logo">
            <img src="../asset/images/iquery-logo.png" alt="">
            <span>Dashboard</span>
        </div>
        <ul class="admin__sidebar__nav">
            <li><a class="active" href="main.php">Admission</a></li>
            <li><a href="#">Token</a></li>
            <li><a href="#">Email</a></li>
            <li><a href="#">Update</a></li>
            <li><a href="#">Payments</a></li>
            <li><a href="#">Batches</a></li>
            <li><a href="#">Payments</a></li>
            <li><a href="#">Payments</a></li>
            <li><a href="#">Payments</a></li>
            <li><a href="logout.php">Logout/Exit</a></li>
        </ul>
</div>
<?php else: echo 'page not found'; endif; ?>