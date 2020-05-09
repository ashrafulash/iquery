<?php
if(isset($_POST['sel']) && isset($_POST['token'])){
    include('class-loader.inc.php');
    include('ajax.request.inc.php');
    $sel    = $_POST['sel'];
    $token  = $_POST['token'];

//check if any field empty

    if(empty($sel) && empty ($token)){
        echo '<p class="empty">Empty Fields<p>';
    }
    elseif(empty($sel)){
            echo '<p class="empty">Select a Centre<p>';
    }
    elseif(empty($token)){
            echo '<p class="empty">Empty Token<p>';
    }
    else{
        //check if the token already used or pending
        $cls = new Token();
        if($cls->find_token('all', 'all', $token) == 'true'){
            
            if($cls->find_token($sel, 'all', $token) == 'true'){
                if($cls->find_token($sel, 'available', $token) == 'true'){
                    header('location:../admission/redirect.adm.php?sel='.$sel.'&token=' . $token);
                }
                else{
                    echo 'Token Already Used';
                }
            }
            else{
                echo 'Wrong Token';
            }

        }
        else{
            echo 'invalid token';
        }
    }

}
else{
    echo '<p class="ut">Unnatural Attempt<p>';
}

?>

