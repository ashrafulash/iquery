<?php

if(isset($_POST['id'])){
    include('../../includes/class-loader.inc.php');
    $cont = new Controller();
    $id = $_POST['id'];
    $act = $_POST['act'];
    
    if($act != 'delete'){
        if($act == 'accepted'){
            $amount = $_POST['amount'];
            $month  = $_POST['month'];
            $cont->update_one('payment','id', $id, 'amount', $amount);
            $cont->update_one('payment','id', $id, 'month', $month);
        }

        $cont->status_update('payment', 'id', $id, $act);
        echo '<span class="successToken">'.$act.' Successful</span>';
    }
    elseif($act == 'delete'){
        $cont->delete('payment', 'id', $id);
        echo '<span class="errorToken">'.$act.' Successful</span>';
    }


}
else{
    echo 'Page Not found';
}

?>