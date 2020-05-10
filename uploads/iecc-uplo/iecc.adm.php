<?php
if(!$_POST['imgCode']){
    die('page not found');
}

$token      =   $_POST['token'];
$firstName  =   $_POST['firstName'];   
$middleName  =   $_POST['middleName'];   
$lastName  =   $_POST['lastName'];
$fatherNumber  =   $_POST['fatherNumber'];
$class  =   $_POST['class'];
$gender  =   $_POST['gender'];
$birth  =   $_POST['birth'];
$imgCode  =   $_POST['imgCode'];

// convet the data into array
$json = array(
'centre'     =>   $_POST['centre'],
'token'      =>   $_POST['token'],
'firstName'  =>   $_POST['firstName'],
'middleName'  =>   $_POST['middleName'],   
'lastName'  =>   $_POST['lastName'],

'fatherFirstName'  =>   $_POST['fatherFirstName'],
'fatherMiddleName'  =>   $_POST['fatherMiddleName'],
'fatherLastName'  =>   $_POST['fatherLastName'],

'motherFirstName'  =>   $_POST['motherFirstName'],
'motherMiddleName'  =>   $_POST['motherMiddleName'],
'motherLastName'  =>   $_POST['motherLastName'],

'institution'  =>   $_POST['institution'],
'presentHouse'  =>   $_POST['presentHouse'],
'presentCity'  =>   $_POST['presentCity'],
'presentThana'  =>   $_POST['presentThana'],
'presentPostCode'  =>   $_POST['presentPostCode'],
'presentCountry'  =>   $_POST['presentCountry'],


'permanentAddress'  =>   $_POST['permanentAddress'],
'nationility'  =>   $_POST['nationility'],
'personalNumber'  =>   $_POST['personalNumber'],
'fatherNumber'  =>   $_POST['fatherNumber'],
'motherNumber'  =>   $_POST['motherNumber'],
'emailAddress'  =>   $_POST['emailAddress'],
'facebookUsername'  =>   $_POST['facebookUsername'],
'skypeId'  =>   $_POST['skypeId'],


'class'  =>   $_POST['class'],
'group'  =>   $_POST['group'],
'blood'  =>   $_POST['blood'],
'religion'  =>   $_POST['religion'],
'gender'  =>   $_POST['gender'],
'birth'  =>   $_POST['birth'],
'imgCode'  =>   $_POST['imgCode'],

);

echo '<div id="data" style="display:none;">'. json_encode($json) . '</div>';

?>

<div class="iecc_final">
<div class="iecc_final__profile">
    <img clsss="iecc_final__profile__image" src="<?php echo $imgCode; ?>" alt="">
    <ul clsss="iecc_final__profile__des">
        <li>
            <span class="tit">Name : </span>
            <span class="dta"><?php echo $firstName . ' ' .  $middleName . ' ' .  $lastName?></span>
        </li>
        <li>
            <span class="tit">Date of Birth : </span>
            <span class="dta"><?php echo $birth?></span>
        </li>
        <li>
            <span class="tit">Father's Number : </span>
            <span class="dta"><?php echo $fatherNumber ?></span>
        </li>
        <li>
            <span class="tit">Class : </span>
            <span class="dta"><?php echo $class?></span>
        </li>
        <li>
            <span class="tit">Student ID : </span>
            <span class="dta"><?php echo $token?></span>
        </li>
        <li>
            <span class="tit">Gender : </span>
            <span class="dta"><?php echo $gender?></span>
        </li>
    </ul>
    <span class="note">
        WARNING!! Don't forget your student ID number.
    </span>
</div>

<div class="iecc_final__payment">
    <img id="bkash_logo" src="./asset/images/bkash.png" alt="bkash">
    <!-- bkash function will take two paramitter 1. number 2. fee for the course -->
    <?php 
        include('../../template/bkash.php'); 
        echo bkash('01677760308', '1530');
    ?>
    
    <input type="text" id="trx_iecc" placeholder="Must type TrxID">
    <p class="iecc_error"></p>
    <button id="iecc_submit_form">Submit Application</button>
</div>
</div>


<script>
    var iecc_submit_form = $("#iecc_submit_form");

        iecc_submit_form.on('click', ()=>{
            var err = $('.iecc_error');
            var trx = $('#trx_iecc').val().trim();
            if(trx.length == 0){
                err.text('Please Enter TrxID');
            }else if(trx.length > 0 && trx.length <= 5){
                err.text('Invalid TrxID!! Try again');
            }else{
                let data = {
                    trx : trx,
                }
                let old_data = document.getElementById('data').innerHTML;
                let all_data = {... data, ... JSON.parse(old_data)};
                // pasding all data to upload folder
                validateRequest('uploads/iecc-uplo/insert.php', '.iecc_error', all_data);
            }
        });

</script>



