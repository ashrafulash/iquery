<?php 
    include('../includes/ajax.request.inc.php');
?>
<div class="adm_choose">
    <span>Choose Centre</span>
    <label onclick="toggler('.adm_choose__option', 'open')" id="adm_selected_center" placeholder="Choose One">Choose One</label>
    <ul class="adm_choose__option">
        <li><button id="adm_close_option_btn" onclick="toggler('.adm_choose__option', 'close')" ><i class="fas fa-compress-alt"></i></button></li>
        <li onclick="adm_selected_item('iecc')">Invitation English Coaching Centre</li>
        <li onclick="adm_selected_item('ielts')">Invitation IELTS Centre</li>
        <li onclick="adm_selected_item('idnc')">Invitation Day & Night Care</li>
        <li onclick="adm_selected_item('sports')">Invitation Sports Club</li>
        <li onclick="adm_selected_item('ict')">Invitation ICT Centre</li>
    </ul>
    <input type="text" id="adm_token" placeholder="Enter Token">
    <button id="collect_token" onclick="pageRequest('admission/token.php', 500, '.adm_content')">Collect Token</button>
    <button id="adm_start">Start</button>
</div>

<script>
        function adm_selected_item(val){
            switch(val){
                case 'iecc':
                    $('#adm_selected_center').text('Invitation English Coaching Centre');
                break;
                case 'ielts':
                    $('#adm_selected_center').text('Invitation IELTS Centre');
                break;
                case 'idnc':
                    $('#adm_selected_center').text('Invitation Day & Night Care');
                break;
                case 'sports':
                    $('#adm_selected_center').text('Invitation Sports Club');
                break;
                case 'ict':
                    $('#adm_selected_center').text('Invitation ICT Centre');
                break;
                default:
                    $('#adm_selected_center').text('Error! Can Not Select');
                break;
            }

            toggler('.adm_choose__option', 'close');

            return false;
            
        }
</script>
