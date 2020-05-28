<?php 
session_start();
if(isset($_SESSION['uid'])):

?>

<!-- header -->
<?php include('header.php');?>
<!-- sidebar -->
<?php include('sidebar.php'); ?>
<div class="admin__content">
    <div class="admin_email">
        <div class="bulk_sms">

            <?php 
                $errorMsg = ' ';
                if(isset($_POST['InstName']) && isset($_POST['Number']) && isset($_POST['messageSMS'])){
                    $institute  =   trim($_POST['InstName']);
                    $number     =   trim($_POST['Number']);
                    $sms        =   trim($_POST['messageSMS']);
                    if(empty($institute) || empty($number) || empty($sms)){
                        $errorMsg = '<p class="errorToken">Empty Field</p>';
                    }else{

                        


                    }
                }
            
            ?>
            <h1>Send Bulk SMS</h1>
            <?php echo $errorMsg; ?>
            <form action="email.php" method="POST">
                <table>
                    <tr>
                        <td>Name</td>
                        <td><input type="text" name="InstName" placeholder="Institution Name"></td>
                    </tr>
                    <tr>
                        <td>Number</td>
                        <td><input type="number" name="Number" placeholder="Mobile Number"></td>
                    </tr>
                    <tr>
                        <td>Message</td>
                        <td>
                            <textarea type="text" name="messageSMS" placeholder="Type your Message"></textarea>
                        </td>
                    </tr>
                    <tr>
                        <td></td>
                        <td><button type="SUBMIT">SEND SMS</button></td>
                    </tr>
                </table>
            </form>
        </div>
        <div class="send_email">
            <h1>Send Email</h1>
            <form action=""></form>
        </div>
    </div>

</div>
<!-- footer -->
<?php include('popup.php'); ?>
<!-- footer -->
<?php include('footer.php'); ?>

<?php else: echo 'page not found'; endif; ?>


<script>
    $('.mitem_email').addClass('active');
</script>