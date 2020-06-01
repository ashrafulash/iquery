
<?php
if(isset($_POST['token'])) :
    $sel = $_POST['centre'];
    $token = $_POST['token'];

    $json = array(
        "centre"            =>  $sel,
        "token"             =>  $token,
        "firstName"         =>  $_POST['firstName'],
        "middleName"        =>  $_POST['middleName'],
        "lastName"          =>  $_POST['lastName'],
        "fatherFirstName"   =>  $_POST['fatherFirstName'],
        "fatherMiddleName"  =>  $_POST['fatherMiddleName'],
        "fatherLastName"    =>  $_POST['fatherLastName'],
        "motherFirstName"   =>  $_POST['motherFirstName'],
        "motherMiddleName"  =>  $_POST['motherMiddleName'],
        "motherLastName"    =>  $_POST['motherLastName'],
        "institution"       =>  $_POST['institution'],
        "presentHouse"      =>  $_POST['presentHouse'],
        "presentCity"       =>  $_POST['presentCity'],
        "presentThana"      =>  $_POST['presentThana'],
        "presentPostCode"   =>  $_POST['presentPostCode'],
        "presentCountry"    =>  $_POST['presentCountry'],
        "permanentAddress"  =>  $_POST['permanentAddress'],
        "nationility"       =>  $_POST['nationility'],
        "personalNumber"    =>  $_POST['personalNumber'],
        "fatherNumber"      =>  $_POST['fatherNumber'],
        "motherNumber"      =>  $_POST['motherNumber'],
        "emailAddress"      =>  $_POST['emailAddress'],
        "facebookUsername"  =>  $_POST['facebookUsername'],
        "skypeId"           =>  $_POST['skypeId'],

    );
    echo '<div id="data" style="display: none;">'. json_encode($json)  .' </div>';
?>
    
    <div class="iecc_form">
        <div class="row">
            <div class="col-lg-8 col-md-12">
                <div class="iecc_form__header">
                    <h2 class="title" id="selected_center"><?php echo $sel ?></h2>
                    <p class="token_id"><span>Token ID : </span><strong id="selected_token"><?php echo $token ?></strong></p>
                </div>
                <form class="iecc_form__body">
                    <!-- choose your class -->
                    <span>
                        <label class="v_label" for="class">Class</label>
        
                            <div class="custom-select" onclick="class_select_fun(this)" style="width:150px;">
                            <select>
                                <option value="1">Select Class</option>
                                <option value="1">class 6</option>
                                <option value="2">class 7</option>
                                <option value="3">class 8</option>
                                <option value="4">class 9</option>
                                <option value="5">class 10</option>
                                <option value="6">class 11</option>
                                <option value="7">class 12</option>
                                <option value="7">Degree</option>
                                <option value="7">Honors</option> 
                                <option value="8">Others</option>
                            </select>
                            </div>

                    </span>
                    <!-- Select grop  -->
                    <span>
                        <label class="v_label" for="class">Blood Group</label>
        
                            <div class="custom-select" onclick="blood_select_fun(this)" style="width:150px;">
                            <select>
                                <option value="1">Select Group</option>
                                <option value="1">O+</option>
                                <option value="1">O-</option>
                                <option value="2">A+</option>
                                <option value="3">A-</option>
                                <option value="4">B+</option>
                                <option value="4">B-</option>
                                <option value="4">AB+</option>
                                <option value="4">AB-</option>
                                <option value="4">Skip</option>
                            </select>
                            </div>

                    </span>
                    <!-- Blood group  -->
                    <span>
                        <label class="v_label" for="class">Your Group</label>
        
                            <div class="custom-select" onclick="group_select_fun(this)" style="width:150px;">
                            <select>
                                <option value="1">Select Group</option>
                                <option value="1">Humanities</option>
                                <option value="2">Business Study</option>
                                <option value="3">Science</option>
                                <option value="4">Other</option>
                            </select>
                            </div>

                    </span>
                    <!-- Religion  -->
                    <span>
                        <label class="v_label" for="class">Religion</label>
        
                            <div class="custom-select" onclick="religion_select_fun(this)" style="width:150px;">
                            <select>
                                <option value="1">Select</option>
                                <option value="1">Islam</option>
                                <option value="2">Hinduism</option>
                                <option value="3">Buddhism</option>
                                <option value="4">Christianity</option>
                                <option value="4">Sikhism</option>
                                <option value="4">Atheism</option>
                            </select>
                            </div>

                    </span>
                    <!-- Gender  -->
                    <span>
                        <label class="v_label" for="class">Gender</label>
        
                            <div class="custom-select" onclick="gender_select_fun(this)" style="width:150px;">
                            <select>
                                <option value="1">Select</option>
                                <option value="1">Male</option>
                                <option value="2">Female</option>
                            </select>
                            </div>

                    </span>
                    <!-- Gender  -->
                    <span>
                        <label class="v_label" for="iecc_birth">Birthday</label>
                        <input id="iecc_birth" type="date" placeholder="pick Date">
                    </span>
                </form>
                <div class="image_upload">
                    <Script>
                        pageRequest('./admission/fineCrop.php', 10, '.image_upload');
                    </Script>
                </div>
                <div class="iecc_form__footer">
                    <span id="errMsg_2"></span>
                    <button id="iecc_form_submit_btn">Submit</button>
                </div>

            </div>
            <div class="col-lg-4 col-md-12">
                <?php include('faq.iecc.adm.php'); ?>
            </div>
        </div>
    </div>

<?php

else:
    echo 'Page Not Found 404';

endif;

?>

<script src="./asset/js/validation.iecc.two.js"></script>