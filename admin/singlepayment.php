<?php 
session_start();
if(isset($_SESSION['uid'])):
    include('../includes/class-loader.inc.php');
    $view = new View();
    $cont = new Controller();
    $table_id = $_GET['id'];
    $data = $view->show_based('payment', 'id', $table_id);
    $row = $data[0];

    if(isset($_GET['act'])){
        echo $_GET['amount'];
    }

    $user = new Student();
    $user = $user->one($row['student_id']);
    if($user){
        $user = $user[0];
    }
?>

<!-- header -->
<?php include('header.php');?>
<!-- sidebar -->
<?php include('sidebar.php'); ?>
<style>
    @import url('../asset/src/min-css/invoice.css');
</style>
<div class="admin__content">
<div class="paymentSingle">
        
        <table cellspacing="0" cellpadding="0" border="0" class="paymentSingle__parentTable">
            <tr>
                <!-- header -->
                <td>
                    <table  cellspacing="0" cellpadding="0" border="0">
                        <tr>
                            <td class="iquery_invoice">
                                <span>IQUERY</span>
                                <span>INVOICE</span>
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>
            <tr>
                <!-- user information -->
                <td>
                    <table class="userInfo" cellspacing="0" cellpadding="0" border="0">
                        <tr>
                            <td>
                                <span class="client_name"><?php echo $user['firstName'] . ' ' . $user['middleName'] . ' ' . $user['lastName']?></span>
                                <p class="address">Date Issued : <strong><?php echo $user['date'] ?></strong></p>
                                <p class="address">Invoice ID : <strong><?php echo $row['id'] ?></strong></p>
                                <p class="address">From : <strong><?php echo $user['class'] ?></strong></p>
                            </td>
                            <td>
                                <p class="address">
                                    Student ID :
                                    <strong><?php echo $user['student_id'] ?></strong>
                                </p>
                                <p class="address">
                                    Fatehr's Name :
                                    <strong><?php echo $user['fatherFirstName'] . ' ' . $user['fatherMiddleName'] . ' ' . $user['fatherLastName'] ?></strong>
                                </p>
                                <p class="address">
                                    Father's Mobile :
                                    <strong><?php echo $user['fatherNumber'] ?></strong>
                                </p>
                                <p class="address">
                                    Student Status :
                                    <strong><?php echo $user['status'] ?></strong>
                                </p>
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>
            <tr>
                <!-- payments description -->
                <td>
                    <table class="paymentInfo" cellspacing="0" cellpadding="0" border="0">
                        <tr>
                            <th>Purpose</th>
                            <th>Month</th>
                            <th>Status</th>
                            <th>Amount</th>
                        </tr>
                        <tr>
                            <td><?php echo $row['purpose']; ?></td>
                            <td><?php echo $row['month']; ?></td>
                            <td><?php echo $row['status']; ?></td>
                            <td><?php echo $row['amount']; ?></td>
                        </tr>
                    </table>
                </td>
            </tr>
            <tr>
                <!-- footer information -->
                <td>
                    <table class="footerInfo" cellspacing="0" cellpadding="0" border="0">
                        <tr>
                            <td class="first">Payment Information</td>
                            <td class="first">Date</td>
                            <td class="first">Trx ID</td>
                        </tr>
                        <tr>
                            <td ><strong class="pay">Bkash Payment</strong></td>
                            <td><?php echo $row['date'] ?></td>
                            <td><strong class="trx"><?php echo $row['trx_id'] ?></strong></td>
                        </tr>
                        <tr>
                            <td class="first "></td>
                            <td class="first centre"><?php echo $row['centre'] ?></td>
                            <td class="first"></td>
                        </tr>
                    </table>
                </td>
            </tr>
        </table>
        <p class="autho">
            <span>Authority</span>
        </p>
        <div class="payment_bottom">
            <p class="errorMEssage"></p>
            <button class="act_btn accept" onclick="paymentAction('accepted', <?php echo $table_id ?>)">Accept</button>
            <button class="act_btn delete" onclick="paymentAction('delete', <?php echo $table_id ?>)">Delete</button>
            <button class="act_btn pending" onclick="paymentAction('pending', <?php echo $table_id ?>)">Pending</button>
            <button class="act_btn block" onclick="paymentAction('blocked', <?php echo $table_id ?>)">block</button>
            <button class="act_btn print" onclick="paymentAction('print', <?php echo $table_id ?>)">Print</button>
        </div>
    </div>
</div>
<!-- footer -->
<?php include('popup.php'); ?>
<!-- footer -->
<?php include('footer.php'); ?>

<?php else: echo 'page not found'; endif; ?>


<script>
    $('.mitem_payments').addClass('active');
        function paymentAction(act, id){
            if(act == 'accepted'){
                var amount = prompt('Enter Amount:');
                if(amount){
                    var month = prompt('Enter Month:');
                    $.post('action/payment.update.php', {id: id, act:act, amount:amount, month: month}, (data, status) =>{
                        if(status == 'success'){
                            $('.errorMEssage').html(data);
                            location.reload();
                        }else{
                            $('.errorMEssage').html('<h1>Action Error!!</h1>');
                        }
                    });
                }
                else{
                    alert('Please Enter Valid Amount!!')
                }
            }
            else if(act == 'delete'){
                $con = prompt('Enter Confirm:');
                if($con == 'confirm'){
                    $.post('action/payment.update.php', {id: id, act:act}, (data, status) =>{
                        if(status == 'success'){
                            $('.errorMEssage').html(data);
                            window.location.href = 'payments.php';
                        }else{
                            $('.errorMEssage').html('<h1>Action Error!!</h1>');
                        }
                    });
                }
                else{
                    alert('Invalid!!')
                }
            }
            else if(act == 'print'){
                window.print();
                document.close();
            }
            else{
                $con = prompt('Enter Confirm:');
                if($con == 'confirm'){
                    $.post('action/payment.update.php', {id: id, act:act}, (data, status) =>{
                        if(status == 'success'){
                            $('.errorMEssage').html(data);
                            location.reload();
                        }else{
                            $('.errorMEssage').html('<h1>Action Error!!</h1>');
                        }
                    });
                }
            }
        }
</script>
