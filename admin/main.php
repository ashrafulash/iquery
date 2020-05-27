<?php 
session_start();
if(isset($_SESSION['uid'])):

?>

<!-- header -->
<?php include('header.php');?>
<!-- sidebar -->
<?php include('sidebar.php'); ?>
<div class="admin__content">
    <!-- admission -->
    <?php include('admission.php'); ?>
</div>
<!-- footer -->
<?php include('popup.php'); ?>
<!-- footer -->
<?php include('footer.php'); ?>

<?php else: echo 'page not found'; endif; ?>