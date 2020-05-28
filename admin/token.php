<?php 
session_start();
if(isset($_SESSION['uid'])):
    include('../includes/class-loader.inc.php');
    $student = new Student();
    $tkn = new Token();
    $cont = new Controller();
?>

<!-- header -->
<?php include('header.php');?>
<!-- sidebar -->
<?php include('sidebar.php'); ?>
<div class="admin__content">
<?php
    $errorToken = ' ';
    //add new token to the list
    if(isset($_POST['inpuTokenID']) && isset($_POST['centreToAddToken'])){
        $token = trim($_POST['inpuTokenID']);
        $centre = trim($_POST['centreToAddToken']);
        
        if(empty($token) || empty($centre)){
            $errorToken = '<p class="errorToken">Empty Input Fields</p>';
        }
        else{
            
            
            if($student->find_student($token) == 'true'){
                $errorToken = '<p class="errorToken">This Token already Used</p>';
            }
            else{
                
                if($tkn->find_token('all','all',$token) == 'true'){
                    $errorToken = '<p class="errorToken">This Token already Exists</p>';
                }
                else{
                    // insert token
                    print_r($token, $centre);
                    $cont->insert_token_id($token, $centre);
                    $errorToken = '<p class="successToken">Successful</p>';
                }
                
            }

            

        }
        
    }

    // delete token form the list
    if(isset($_GET['act']) == 'delete'){
        $cont->delete('token_tb','id', $_GET['id']);
    }


?>
    <div class="admin_token">
        <div class="header">
            <h1>Add Token To The List</h1> 
            <?php echo $errorToken; ?>
            <form action="token.php" method="POST">
                <table>
                    <tr>
                        <td><input name="inpuTokenID" id="tokenInput" type="number" min="0" placeholder="Enter New Token ID"></td>
                        <td>
                            <select name="centreToAddToken" id="centreToAddToken">
                                <option value="Invitation English Coaching Centre">Invitation English Coaching Centre</option>
                                <option value="Invitation IELTS Centre">Invitation IELTS Centre</option>
                                <option value="Invitation ICT Centre">Invitation ICT Centre</option>
                                <option value="Invitation Day and Night Care">Invitation Day and Night Care</option>
                                <option value="Invitation Sports Club">Invitation Sports Club</option>
                            </select>
                            <button id="addTokenID" type="submit">Add Token</button>
                        </td>
                    </tr>
                </table>
            </form>
        </div>
        <div class="admin_token_body">
            <table cellspacing="0" cellpadding="0">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Token</th>
                        <th>Centre</th>
                        <th>Status</th>
                        <th>Date</th>
                        <th>Action</th>
                    </tr>
                    <tbody>
                        <?php
                            $x = 1;
                            foreach($tkn->get_token('all','all') as $item){  
                        ?>
                            <tr>
                                <td><?php echo $x; ?></td>
                                <td><?php echo $item['token'] ?></td>
                                <td><?php echo $item['center'] ?></td>
                                <td><?php echo $item['status'] ?></td>
                                <td><?php echo $item['date'] ?></td>
                                <td><a href="token.php?act=delete&id=<?php echo $item['id'] ?>">Delete</a></td>
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
    $('.mitem_token').addClass('active');
</script>