function searchData(inp){
    const val = $(inp).val().trim();
        $.post('search.php', {inp: val}, (data, status) =>{
            if(status == 'success'){
                $('.pending_application').html(data);
            }else{
                $('.pending_application').html('<h1>Not Found</h1>');
            }
        }); 
}


function videApplication(inp){
    const val = $(inp).attr('data-id');
    $.post('admission.details.php', {inp: val}, (data, status) =>{
        if(status == 'success'){
            $('.admin__content').html(data);
        }else{
            $('.admin__content').html('<h1>Not Found</h1>');
        }
    }); 
    
}


function update_status(act, id){
    $prompt = prompt('Enter CONFIRM to continue:');
    if($prompt == 'confirm'){
        $.post('update_status.php', {act: act, id: id}, (data, status) =>{
            if(status == 'success'){

                $.post('admission.details.php', {inp: id}, (data, status) =>{
                    if(status == 'success'){
                        $('.admin__content').html(data);
                    }else{
                        $('.admin__content').html('<h1>Not Found</h1>');
                    }
                }); 

                if(act == 'delete'){
                    window.location.href = 'main.php';
                    console.log('hello') 
                }

                notification(true, 'Successful');
            }else{
                notification(true, 'Failed');
            }
        }); 
    }
    
}
