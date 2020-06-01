<?php 
include('../../includes/class-loader.inc.php');
if(!$_POST['imgCode']){
    die('Page not found');
}
$centre = $_POST['centre'];
$token      =   $_POST['token'];
$imgCode  =   $_POST['imgCode'];
$trx  =   $_POST['trx'];
$date = date("j-m-Y");
$status = 'pending';


//check if the token already used or pending
$cls = new Token();
if($cls->find_token('all', 'all', $token) == 'true'){
    
    if($cls->find_token($centre, 'all', $token) == 'true'){
        if($cls->find_token($centre, 'available', $token) == 'true'){
            
                //find trx id already used or not
                $pay = new Payment();
                if($pay->find_trx($trx) == 'true'){
                    // check trx belongs to 
                    $row = $pay->get_trx($trx, 'all');
                    $sr = $row[0]['student_id'];
                    $oneStu = new Student();
                    if($oneStu->one($sr)){
                        echo 'This TrxID used by ' . $oneStu->one($sr)[0]['firstName'] . ' ' .$oneStu->one($sr)[0]['middleName'] . ' ' . $oneStu->one($sr)[0]['lastName'];
                    }
                    else{
                        echo 'This TrxID used';
                    }
                    

                }
                //trx is fine to use
                else{

                    //check if the student already exists
                        $student = new Student();
                        if($student->find_student($token) == 'true'){
                            echo 'This ID is Belongs to ' . $student->one($token)[0]['firstName'] . ' ' .$student->one($token)[0]['middleName'] . ' ' . $student->one($token)[0]['lastName'];   
                        }else{
                            //fine to insert information
                            // create Image File
                            $fileName  = $token;
                            $ext = 'txt';
                            $file = $fileName .'.'. $ext;
                            $uploadSource = fopen($file, 'w') or die('File not found !!');
                            fwrite($uploadSource, $imgCode) or die('Image can not upload !!');
                            fclose($uploadSource);

                            // insert data to student table 
                            $cont = new Controller();
                            $cont->insert_student_data(array(
                                'centre'     =>   $_POST['centre'],
                                'student_id'      =>   $_POST['token'],
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
                                'date'      =>  $date,
                                'status'    =>  $status,
                                
                                ));

                                //insert data to payment table
                                $cont->insert_payment_data(array(
                                    'centre'     =>   $_POST['centre'],
                                    'student_id'  =>   $token,
                                    'date'      =>  $date,
                                    'status'    =>  $status,
                                    'amount'    => '1250',
                                    'month'     => 'null',
                                    'trx_id'  =>   $_POST['trx'],
                                    'purpose' => 'admission with monthly fee',
                                ));

                                //UPDATE token status in token table
                                $cont->status_update('token_tb', 'token', $token, 'pending');
                                //redirect to thank you page after successful form submission
                                ?>
                                    <script>
                                        let obb = {sel: null}
                                        validateRequest('admission/thanks.php', '.adm_content', obb);
                                    </script>
                                <?php
                                
                        }

                }

            // trx find done

        }
        else{
            echo 'Token Already Used'; 
        }
    }
    else{
        echo 'Wrong Token! Try again';
    }

}
else{
    echo 'Unauthorised Token';
}