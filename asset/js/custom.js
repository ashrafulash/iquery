(function(){
    function $(selector){
        return document.querySelector(selector);
    }

    function $$(selector){
        return document.querySelectorAll(selector);
    }
/*-------------------------------------
        Sidebar Toggler
---------------------------------------*/
    var device_width = window.innerWidth;

    var sidebar_btn = $(".sidebar-btn");
    var sidebar_close = $(".sidebar-close");

    var default_sidebar = $("#sidebar-default");

    var sidebar_container = $("#sidebar-container");


    if(device_width < 1200){
        sidebar_btn.style.display = 'inline-block';
        sidebar_close.style.display = 'inline-block';
    }

    var expand = !!default_sidebar.dataset.expand;


    sidebar_btn.addEventListener('click', function(){
        toggleNav();
    });

    sidebar_close.addEventListener('click', function(){
        toggleNav();
    })


    function toggleNav(){
        if(expand == true){
            
            var pos = -300;
            var interval = setInterval(function(){
                if(pos == 0){
                    clearInterval(interval);
                }else{
                pos += 4;
                    default_sidebar.style.left = pos + 'px';
                }
            }, 1);

            default_sidebar.setAttribute('data-expand', 'false');
            expand = false;
            $(".maincontent").style.filter = 'blur(7px)';
        }else if(expand == false){
            default_sidebar.style.left = '-300px';
            var pos = 0;
            var interval = setInterval(function(){
                if(pos == -300){
                    clearInterval(interval);
                }else{
                pos -= 4;
                    default_sidebar.style.left = pos + 'px';
                }
            }, 1);
            
            default_sidebar.setAttribute('data-expand', 'true');
            expand = true;
            $(".maincontent").style.filter = 'blur(0px)';
        }
    }
    
/*-------------------------------------
        preloder
---------------------------------------*/

var bar = $(".preloder__track");
var preloder = $(".preloder");
var number = $(".preloder__number")

window.addEventListener('load', function(e){

    var time = e.timeStamp;
    if(time < 1000){
        barmovement(1000);
    }
    else{
        barmovement(time);
    }

    function barmovement(val){

        var init = 0;
        var hold = setInterval(function(){
            init += 1;
            if(init == 101){
                clearInterval(hold);
                setTimeout(function(){
                    preloder.style.display = 'none';
                },800);
            }else{
                number.innerText = init + '%';
                bar.style.width = (init * 3) + 'px';
            }

        }, val / 300);

    }

})



}());
// -===========================================================
