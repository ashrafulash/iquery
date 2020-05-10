<?php 
    declare(strict_types = 1);
    include('../includes/ajax.request.inc.php');
    include('../includes/class-loader.inc.php');
?>
<div class="adm_content">

</div>
<script>
$(document).ready(function(){
    
    var
    adm_content = $('.adm_content');

    load_request({
        url: 'admission/start-up.php',
        time: 1000,
        target : adm_content,
        obb:{request : 'ajax_request'}
    })
    


}());
</script>

