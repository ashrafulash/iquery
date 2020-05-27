<?php 

if(isset($_POST['username']) && isset($_POST['pwd'])){
    $username = $_POST['username'];
    $pwd = $_POST['pwd'];

    if(empty($username) || empty($pwd)){
        echo 'Empty Field';
    }
    else{
        include('../includes/class-loader.inc.php');
    
        $admin = new Admin();
        if($admin->match($username, $pwd) == 'true'){
            session_start();
            $_SESSION['username'] = $username;
            $_SESSION['uid'] = '789abc';
?>   
                <script>
                    window.location.href = 'admin/main.php';
                </script>

<?php


        }
        else{
            echo 'Invalid Credential!';
        }
    }
    
}
else{
    echo 'page not found';
}

?>



