<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no">
    <title>iQuery</title>
    <link rel="icon" href="./asset/images/fav.png" type="image/gif" sizes="20x20">
    <style>
        @import url('../asset/src/min-css/all.min.css');
        @import url('../asset/src/min-css/bootstrap.min.css');
        @import url('../asset/src/min-css/master.css');
        @import url('../asset/src/min-css/payment_invoice.css');
    </style>
    
    <script defer src="../asset/js/jquery-1.12.4.min.js"></script>
</head>
<body>

<?php


 if(isset($_POST['submit'])){
    
     $student_id     = $_POST['student_id'];
     $payment_type   = $_POST['payment_type'];
     $amount         = $_POST['amount'];
     $trx_id         = $_POST['trx_id'];
     $phone          = $_POST['phone'];

    include('../includes/class-loader.inc.php');

    $cls = new Student();

    if(empty($cls->one($student_id))){
        ?>
        
            <h1 class="no_data"> No Data Found with the student ID : <?php echo $student_id ?> </h1>
            <a class="try_again" href="../">Try Again</a>

        <?php
        die();
    }

    $data = $cls->one($student_id)[0];

    

    $file = $student_id. '.txt';

    // see center type then show data

if( $data['centre'] = 'Invitation ICT Centre' ){

    $myfile = fopen("../uploads/ict-uplo/".$file, "r") or die("Unable to open file!");
    $read = fread($myfile,filesize("../uploads/ict-uplo/".$file));

}
elseif( $data['centre'] = 'Invitation English Coaching Centre' ){

    $myfile = fopen("../uploads/iecc-uplo/".$file, "r") or die("Unable to open file!");
    $read = fread($myfile,filesize("../uploads/iecc-uplo/".$file));

}







    //find trx id already used or not
    $pay = new Payment();
    if($pay->find_trx($trx_id) == 'true'){
        // check trx belongs to 
        $row = $pay->get_trx($trx_id, 'all');
        $sr = $row[0]['student_id'];
        $oneStu = new Student();

        if($oneStu->one($sr)){
            ?>
        
            <h1 class="no_data"><?php echo 'This TrxID "'. $trx_id .'" is already used by ' . $oneStu->one($sr)[0]['firstName'] . ' ' .$oneStu->one($sr)[0]['middleName'] . ' ' . $oneStu->one($sr)[0]['lastName']; ?></h1>
            <a class="try_again" href="../">Try Again</a>

        <?php
            
        }
        else{
            ?>
        
                <h1 class="no_data"><?php echo 'This TrxID "'. $trx_id .'" is already used'  ?></h1>
                <a class="try_again" href="../">Try Again</a>

            <?php
        }
        
        die();

    }

    session_start();
    $_SESSION["centre"] = $data["centre"];
    $_SESSION["student_id"] = $student_id;
    $_SESSION["date"] = date("d-m-Y");
    $_SESSION["status"] = 'pending';
    $_SESSION["amount"] = $amount;
    $_SESSION["month"] = 'null';
    $_SESSION["month"] = 'null';
    $_SESSION["trx_id"] = $trx_id;
    $_SESSION["purpose"] = $payment_type;

        
?>

<div class="container">      
    <div class="payment_receive">

        <div class="row">
            <div class="col-lg-3 col-md-3 col-sm-4 mb-sm-5">
                <img class="w-100" src="<?php echo $read ?>" alt="Student_image">
            </div>
            <div class="col-lg-9 col-md-9">
                <ul class="student_details">
                
                        <li>
                            <span>Name : </span>
                            <span><?php echo $data['firstName'] . ' ' . $data['middleName'] . ' ' . $data["lastName"] ?></span>
                        </li> 
                        <li>
                            <span>Student ID : </span>
                            <span><?php echo $data['student_id'] ?></span>
                        </li> 
                        <li>
                            <span>Institute : </span>
                            <span><?php echo $data['centre'] ?></span>
                        </li>  
                        <li>
                            <span>Class : </span>
                            <span><?php echo $data['class'] ?></span>
                        </li> 
                        <li>
                            <span>Phone : </span>
                            <span><?php echo $phone ?></span>
                        </li> 
                        
                        <li>
                            <span>Admission Date : </span>
                            <span><?php echo $data['date'] ?></span>
                        </li> 
       
                </ul>
            </div>
        </div>

        <div class="details">

              <div class="row">
                  <div class="col-lg-9 offset-lg-3 offset-sm-0 offset-col-0">
                  <ul>
                    <li>
                        <span>Date : </span>
                        <span><?php echo date("d-m-Y"); ?></span>
                    </li>
                    <li>
                        <span>Payment Type : </span>
                        <span><?php echo $payment_type; ?></span>
                    </li>
                    <li>
                        <span>Amount : </span>
                        <span><?php echo $amount; ?>Tk.</span>
                    </li>
                    <li class="trx">
                        <span>TrxID : </span>
                        <span><?php echo $trx_id; ?></span>
                    </li>
                </ul>
                  </div>
              </div>


        </div>

        <div class="bottom text-right mt-3">

            <a href="insert_payment.php" class="act_btn accept">Confirm Payment</a>
            <button onclick="print_now()" class="act_btn print">Print Now</button>

        </div>

    </div>
</div>  



<?php
}else{
    header("location:../");
}

?>

<script>
    function print_now(){
        window.print();
    }

</script>

</body>
</html>

