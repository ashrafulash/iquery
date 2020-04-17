var loadingTime = null;
window.addEventListener('load', (e)=>{
    loadingTime = e.timeStamp;
})

$(document).ready(function(e) { 

let sel = {
    loader : $('#preloader'),
    loader_img : $('#preloader__img'),
}

function display_width(target){
    return device_display = $(target).width();
}



tl = new TimelineLite(); 


tl 
    .to(sel.loader_img, 1,{
        y: -500,
        opacity: 0,
        delay: loadingTime < 2000 ? 2 : (loadingTime/1000),
    })

    .to(sel.loader, 1 , {
        opacity: 0,
        onComplete: onComplete,
    })

    // display done when preloader complete
    function onComplete(){
        sel.loader.css({
            'display': 'none',
        })
    }
    





});