<?php 
    include('../includes/ajax.request.inc.php');
?>
<div class="adm-token">
    <button id="backToStart" onclick="pageRequest('admission/start-up.php', 500, '.adm_content')">Previous</button>
    <div class="row">
        <div class="col-lg-5 col-md-6 col-sm-12">
            <div class="adm-token__header">
                <ul>
                    <li class="token_center_item active" onclick="pageRequest('admission/token/iecc.token.php', 500, '.adm-token__body')">
                        Invitation English Coaching
                    </li>

                    <li class="token_center_item" onclick="pageRequest('admission/token/ielts.token.php', 500, '.adm-token__body')">
                        Invitation IELTS Centre
                    </li>
                    <li class="token_center_item" onclick="pageRequest('admission/token/idnc.token.php', 500, '.adm-token__body')">
                        Invitation Day & Night Care
                    </li>
                    <li class="token_center_item" onclick="pageRequest('admission/token/sports.token.php', 500, '.adm-token__body')">
                        Invitation Sports Club
                    </li>
                    <li class="token_center_item" onclick="pageRequest('admission/token/ict.token.php', 500, '.adm-token__body')">
                        Invitation ICT Centre
                    </li>
                </ul>
            </div>
        </div>
        <div class="col-lg-7 col-md-6 col-sm-12">
            
            <div class="adm-token__body">
                <script>
                    pageRequest('admission/token/iecc.token.php', 10, '.adm-token__body');
                </script>
            </div>
        </div>
    </div>
</div>


<script>
    var item = $(".token_center_item");
    // remove active
    function removeActiveClassFromCenter(){
        item.map((i, btn) =>{
            $(btn).removeClass('active');
        })
    }
    item.map((i, btn) =>{
        $(btn).on('click', ()=>{
            removeActiveClassFromCenter();
            $(btn).addClass('active');
        })

    })


    

</script>

