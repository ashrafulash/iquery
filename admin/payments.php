<?php 
session_start();
if(isset($_SESSION['uid'])):
    include('../includes/class-loader.inc.php');
    $view = new View();
?>

<!-- header -->
<?php include('header.php');?>
<!-- sidebar -->
<?php include('sidebar.php'); ?>
<div class="admin__content">
    <div class="admin_payment">
        <?php
            $key  = 'pending';
            $field = 'status';
            $errorToken = ' ';

            if(isset($_POST['key']) && isset($_POST['filterOption'])){
                $key_inp = trim($_POST['key']);
                $field_inp = trim($_POST['filterOption']);

                if(empty($key_inp) || empty($field_inp)){
                    $errorToken = '<p class="errorToken">Empty Input Fields</p>';
                }else{
                    $key = $key_inp;
                    $field = $field_inp;
                }
            }
        
        ?>
        <div class="header">
            <h1>Search Payment List</h1>
            <?php echo $errorToken; ?>
            <form action="payments.php" method="POST">
                <input type="text" name="key" placeholder="Search Keyword">
                <select name="filterOption" id="">
                    <option value="student_id">Student ID</option> 
                    <option value="id">Payment No</option>
                    <option value="trx_id">Trx ID</option> 
                    <option value="purpose">Purpose</option> 
                    <option value="purpose">Amount</option> 
                    <option value="date">Date</option> 
                    <option value="status">Status</option>
                    <option value="centre">Centre</option>
                    <option value="centre">Month</option>
                </select>
                <button type="submit">Submit</button>
            </form>
        </div>


        <div class="admin_payment_body">
            <table cellspacing="0" cellpadding="0">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Centre</th>
                        <th>Student ID</th>
                        <th>Trx ID</th>
                        <th>Status</th>
                        <th>Date</th>
                        <th>Action</th>
                    </tr>
                    <tbody>
                        <?php
                            $x = 1;
                            foreach($view->show_based('payment',$field,$key) as $item){
                                ?>
                                    <tr>
                                        <td><?php echo $x; ?></td>
                                        <td><?php echo $item['centre']; ?></td>
                                        <td><?php echo $item['student_id']; ?></td>
                                        <td><?php echo $item['trx_id']; ?></td>
                                        <td><?php echo $item['status']; ?></td>
                                        <td><?php echo $item['date']; ?></td>
                                        <td>
                                            <a href="singlepayment.php?id=<?php echo $item['id'] ?>">Details</a>
                                        </td>
                                    </tr>
                                <?php
                                $x++;
                            }
                        
                        ?>
                    </tbody>
                </thead>
            </table>
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
</script>