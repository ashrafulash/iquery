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

    function validateRequest (url, taret, data){
        load_request({
            url: url,
            time: 500,
            target : $(taret),
            obb: data
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

/*-------------------------------------
    Copy To clip board
---------------------------------------*/

function copyToClipboard (str, btn) {
  const el = document.createElement('textarea');  // Create a <textarea> element
    el.value = document.querySelector(str).innerText;                                 // Set its value to the string that you want copied
    el.setAttribute('readonly', '');                // Make it readonly to be tamper-proof
    el.style.position = 'absolute';                 
    el.style.left = '-9999px';                      // Move outside the screen to make it invisible
    document.body.appendChild(el);                  // Append the <textarea> element to the HTML document
    const selected =            
        document.getSelection().rangeCount > 0        // Check if there is any content selected previously
        ? document.getSelection().getRangeAt(0)     // Store selection if found
        : false;                                    // Mark as false to know no selection existed before
    el.select();                                    // Select the <textarea> content
    document.execCommand('copy');                   // Copy - only works as a result of a user action (e.g. click events)
        const txt = btn;
        txt.innerText = 'DONE';
        txt.style.background = 'green';
    document.body.removeChild(el);                  // Remove the <textarea> element
    if (selected) {                                 // If a selection existed before copying
        document.getSelection().removeAllRanges();    // Unselect everything on the HTML document
        document.getSelection().addRange(selected);   // Restore the original selection
    }
};

</script>