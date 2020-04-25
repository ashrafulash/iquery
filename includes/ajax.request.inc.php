<?php 
    if(isset($_POST['request'])){
        if($_POST['request'] != 'ajax_request'){
            header('location:../index.php');
        }
    }else{
        header('location:../index.php');
    }
?>

<script>

/*-------------------------------------
    Ajax request handler
---------------------------------------*/
    function load_request(obb){
    $(obb.target).html('<div class="adm_preloader"><img src="./asset/images/load.gif" alt="load.gif"></div>');
    setTimeout(()=>{
            $.post(obb.url, obb.obb, (data, status) =>{
                    if(status == 'success'){
                        $(obb.target).html(data);
                    }else{
                        $(obb.target).html('<h1>Page Not Found</h1>');
                    }
            }); 

            }, obb.time)     
    }
/*-------------------------------------
    ajax Page loader
---------------------------------------*/
    function pageRequest (url, time, taret){
        load_request({
            url: url,
            time: time,
            target : $(taret),
            obb:{request : 'ajax_request'}
        }) 
    }

/*-------------------------------------
    toggle part -show -hide
---------------------------------------*/
function toggler(target, act){
    if(act == 'open'){
        $(target).css({
            display: 'inline-block',
        })
    }
    else if(act == 'close'){
        $(target).css({
            display: 'none',
        })
    }  
}


</script>