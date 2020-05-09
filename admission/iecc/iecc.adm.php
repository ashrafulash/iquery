<?php
if(isset($_POST['token'])) :
    $sel = $_POST['sel'];
    $token = $_POST['token'];
?>

    <div class="iecc_form">
        <div class="row">
            <div class="col-lg-8 col-md-12">
                <div class="iecc_form__header">
                    <h2 class="title" id="selected_center"><?php echo $sel ?></h2>
                    <p class="token_id"><span>Token ID : </span><strong id="selected_token"><?php echo $token ?></strong></p>
                </div>
                <form class="iecc_form__body">
                    <!-- first Name -->
                    <span>
                        <label for="first_name">First Name<small>*</small></label>
                        <input id="first_name" name="first_name" type="text">
                    </span>
                    <!-- Middle Name -->
                    <span>
                        <label for="middle_name">Middle Name<small>optional</small></label>
                        <input id="middle_name" name="last_name" type="text">
                    </span>
                    <!-- Last Name -->
                    <span>
                        <label for="last_name">Last Name<small>optional</small></label>
                        <input id="last_name" name="last_name" type="text">
                    </span>
                    <!-- Father's Frist Name -->
                    <span>
                        <label for="father_first_name">Father's Frist Name<small>*</small></label>
                        <input id="father_first_name" name="father_first_name" type="text">
                    </span>
                    <!-- Father's middle Name -->
                    <span>
                        <label for="father_middle_name">Father's Middle Name<small>optional</small></label>
                        <input id="father_middle_name" name="father_middle_name" type="text">
                    </span>
                    <!-- Father's Last Name -->
                    <span>
                        <label for="father_last_name">Father's Last Name<small>optional</small></label>
                        <input id="father_last_name" name="father_last_name" type="text">
                    </span>
                    <!-- mother's Frist Name -->
                    <span>
                        <label for=mother_first_name">mother's Frist Name<small>*</small></label>
                        <input id="mother_first_name" name="mother_first_name" type="text">
                    </span>
                    <!-- mother's middle Name -->
                    <span>
                        <label for="mother_middle_name">mother's Middle Name<small>optional</small></label>
                        <input id="mother_middle_name" name="mother_middle_name" type="text">
                    </span>
                    <!-- Mother's Last Name -->
                    <span>
                        <label for="mother_last_name">mother's Last Name<small>optional</small></label>
                        <input id="mother_last_name" name="mother_last_name" type="text">
                    </span>
                    <!-- Institution's Last Name -->
                    <span>
                        <label for="institution_name">Institution Name<small>*</small></label>
                        <input id="institution_name" name="institution_name" type="text">
                    </span>

                    <!-- Present House Address -->
                    <span>
                        <label for="present_house_address">Present House Address<small>*</small></label>
                        <input id="present_house_address" name="present_house_address" type="text">
                    </span>
                    <!-- Present City -->
                    <span>
                        <label for="present_city">Present City<small>*</small></label>
                        <input id="present_city" name="present_city" type="text">
                    </span>
                    <!-- Present Thana -->
                    <span>
                        <label for="present_thana">Present Thana<small>*</small></label>
                        <input id="present_thana" name="present_thana" type="text">
                    </span>
                    <!-- Present Post -->
                    <span>
                        <label for="present_post_code">Present Post Code<small>optional</small></label>
                        <input id="present_post_code" name="present_post_code" type="text">
                    </span>
                    <!-- Present Country -->
                    <span>
                        <label for="present_country">Present Country<small>*</small></label>
                        <input id="present_country" name="present_country" type="text">
                    </span>
                    <!-- Permanent Address -->
                    <span>
                        <label for="permanent_address">Permanent Address<small>*</small></label>
                        <input id="permanent_address" name="permanent_address" type="text">
                    </span>
                    <!-- Nationility  -->
                    <span>
                        <label for="nationility">Nationility<small>*</small></label>
                        <input id="nationility" name="nationility" type="text">
                    </span>
                    <!-- Personal Phone Number  -->
                    <span>
                        <label for="personal_phone">Personal Phone Number<small>optional</small></label>
                        <input id="personal_phone" min="0" name="personal_phone" type="number">
                    </span>
                    <!-- Father's Phone Number  -->
                    <span>
                        <label for="father_phone">Father's Phone Number<small>*</small></label>
                        <input id="father_phone" min="0" name="father_phone" type="number">
                    </span>
                    <!-- Mother's Phone Number  -->
                    <span>
                        <label for="mother_phone">Mother's Phone Number<small>optional</small></label>
                        <input id="mother_phone" min="0" name="mother_phone" type="number">
                    </span>
                    <!-- Your E-mail Address  -->
                    <span>
                        <label for="email_address">Your Email Address<small>optional</small></label>
                        <input id="email_address" name="email_address" type="email">
                    </span>
                    <!-- Facebook Username  -->
                    <span>
                        <label for="facebook_uername">Facebook Username<small>optional</small></label>
                        <input id="facebook_uername" name="facebook_uername" type="text">
                    </span>
                    <!-- Skype ID  -->
                    <span>
                        <label for="skype_id">Skype ID<small>optional</small></label>
                        <input id="skype_id" name="skype_id" type="text">
                    </span>
                </form>
                <div class="iecc_form__footer">
                    <span id="errMsg_2"></span>
                    <button id="iecc_form_next_btn">Next</button>
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

<script src='./asset/js/validation.iecc.one.js'></script>