<small id="sel_request"><?php echo $_GET['sel']; ?></small>
<small id="token_request"><?php echo $_GET['token']; ?></small>

<script>

    var obb = {
        sel: $('#sel_request').text(),
        token: $('#token_request').text(),
    }
    // rediect request o Invitation Engish COacign Centre
    if(obb.sel == 'Invitation English Coaching Centre'){
        validateRequest('admission/iecc/iecc.adm.php', '.adm_content', obb);
    }
    else if(obb.sel == 'thanks'){
        validateRequest('admission/thanks.php', '.adm_content', obb);
    }
    else{
        document.write('page Not Found');
    }

    
</script>



