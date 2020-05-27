<?php
if(!isset($_POST['act'])){
    die('Unauthorized Attempt');
}
include('../includes/class-loader.inc.php');
$cont = new Controller();
if($_POST['act'] !== 'delete'){
    $cont->status_update('student_tb','student_id', $_POST['id'], $_POST['act']);
}
else{
    $cont->delete('student_tb','student_id',$_POST['id']);
}

?>