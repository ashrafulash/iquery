var loadingTime = null;
window.addEventListener('load', (e)=>{
    loadingTime = e.timeStamp;
})

$(document).ready(function(e) { 

let sel = {
    body : $('body'),
    loader : $('#preloader'),
    loader_img : $('#preloader__img'),
    welcome: $("#welcome_section "),
    welcome_el : $('#welcome_section > p , #welcome_section > div'),
    yes_btn : $("#yes_btn"),
    tl_1 : $(".tl_1"),
    tl_2 : $(".tl_2"),
    tl_3 : $(".tl_3"),
    tl_4 : $(".tl_4"),
    tl_5 : $("#tl_5"),
    tl_6 : $("#tl_6"),
    main : $("#main"),

}

function display_width(target){
    return device_display = $(target).width();
}

/*-----------------------------
        preloader Start
-------------------------------*/
sel.body.css({
    'overflow': 'hidden',
    'background' : '#303778',
});

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
    });

    // display done when preloader complete
    function onComplete(){
        sel.loader.css({
            'display': 'none',
        })
    }

/*-----------------------------
        preloader end
-------------------------------*/

/*-----------------------------
    welcome animation start
-------------------------------*/

sel.welcome_el.css({
    'opacity' : 0,
})


tl 
    .fromTo(sel.tl_1, 1, {
        y: 100,
        opacity: 0,

    },
    {
        y: 0,
        opacity: 1,
        onComplete: function(){
            tl.to(sel.tl_1, 1, {opacity: 0, y: -50,  delay: 1})
            .fromTo(sel.tl_2, 1, {
                y: 100,
                opacity : 0,
            }, {

                y: 0,
                opacity : 1,
                onComplete: function(){
                    
                    sel.body.css({
                        background: '#191E2A',
                    })

                    tl.to(sel.tl_2, 1, {
                        y: -100,
                        opacity : 0,
                        delay: 2,
                    })

                    .fromTo(sel.tl_3, 1,{
                        y: -100,
                        opacity : 0,
                    }, {

                        y : 0,
                        opacity : 1,
                        onComplete : function(){
                            sel.body.css({
                                'overflow' : 'unset',
                            });

                            tl. fromTo(sel.tl_4, 1, {
                                opacity: 0,
                                y: 100,
                            }, {
                                opacity: 1,
                                y: 0,
                                delay : 1,
                                onComplete : function(){
                                    sel.yes_btn.on('click', ()=>{

                                        sel.body.css({
                                            overflow: 'hidden',
                                        })




                                        

                                        tl.to(sel.tl_5, 1, {
                                            width: 1000,
                                            height: 1000,
                                            scale: 5,
                                            x: -1000,
                                            y: -1000,

                                            onComplete: function(){
                                                sel.tl_6.css({
                                                display: 'block',
                                                });

                                                sel.tl_3.css({
                                                    display: 'none',
                                                });

                                                sel.tl_4.css({
                                                    display: 'none',
                                                });

                                                sel.body.css({
                                                    background: '#0D0121',
                                                });

                                                tl.fromTo(sel.tl_6, 3, {
                                                    opacity: 0,
                                                    scale: 0.5,
                                                },{
                                                    opacity: 1,
                                                    scale: 1,

                                                    onComplete: function(){
                                                        tl.to(sel.tl_6,1,{
                                                            opacity : 0,
                                                            scale: .2,
                                                        })
                                                        .to(sel.tl_5,1,{
                                                            opacity : 0,
                                                            onComplete : function(){
                                                                sel.welcome.css({
                                                                    display: 'none',
                                                                })

                                                                sel.body.css({
                                                                    background: '#fff',
                                                                    overflow: 'unset',
                                                                })

                                                                sel.main.css({
                                                                    display: 'block',
                                                                }) 
                                                            }
                                                        })

                                                    }
                                                })
                                            }
                                        })

                                        

                                    })
                                }
                            })
                        }
                    })

                }
            })

            
        }

    },
    '-=1')




    
    


/*-----------------------------
    welcome animation end
-------------------------------*/

});