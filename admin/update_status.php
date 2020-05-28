<?php
if(!isset($_POST['act'])){
    die('Unauthorized Attempt');
}
include('../includes/class-loader.inc.php');
$cont = new Controller();
if($_POST['act'] !== 'delete'){
    $cont->status_update('student_tb','student_id', $_POST['id'], $_POST['act']);
    $cont->status_update('token_tb','token', $_POST['id'], $_POST['act']);
    $cont->status_update('payment','student_id', $_POST['id'], $_POST['act']);
}
else{
    $cont->delete('student_tb','student_id',$_POST['id']);
    $cont->status_update('token_tb','token', $_POST['id'], 'available');
}

?>