$(document).ready(function(){

$(window).on('scroll', (e)=>{
        var scroll = $(this).scrollTop();
        header_color_match('#banner', scroll);
        header_color_match('#about', scroll);
        header_color_match('#instruction', scroll);
        header_color_match('#client', scroll);
        header_color_match('footer', scroll);
        // home sidebar toggle
        home_sidebar_toggle('#about', scroll);
        // overflow toggle
        overflow_toggle('#about', scroll, 150);
        // instruction switcher
        class_switcher('#instruction', scroll, 500, 'active', [
                '.ins-1', '.ins-2','.ins-3'
        ], [
                '.ins-target-1', '.ins-target-2','.ins-target-3' 
        ]);


})


/*----------------------------------
        header color change
-----------------------------------*/ 


function header_color_match(sel, scroll){
        var header = $("header");
        var transparent = 'background: var(--color-transparent)';
        var offset = $(sel).offset().top;
        if(scroll > (offset - 100)){
                var selector = $(sel);

                var current = selector.attr('style');
                header.attr('style', transparent);
                header.css({
                        'mix-blend-mode' : ' difference',
                })
                if(scroll > offset){
                        header.attr('style', current);  
                        header.css({
                                'mix-blend-mode' : 'normal',
                        })
                }
        }
}

/*------------------------------------------
        home sidebar toggle on Scroll
--------------------------------------------*/ 
        function home_sidebar_toggle(sel, scroll){


                var 
                offset    = $(sel).offset().top,
                sidebar     = $("#home_sidebar"),
                hero    = $(".about-hero-image"),
                sidebar_width   = sidebar.width(),
                screen_width    = $(window).width(),
                tl = new TimelineLite();

                if(screen_width >= 991){
                        if(scroll  > (offset - 200)){
                        tl 
                        .to(sidebar, .6 , {
                                x: sidebar_width,
                        })

                        .to(hero, .4 , {
                                y: 0,
                                delay: 0,
                                scale: .8 
                        },'-=.5')
                        }
                        else{
                                tl 
                                .to(sidebar, .6 , {
                                        x: 0,
                                })

                                .to(hero, .4 , {
                                        y: -110, 
                                        delay: 0,
                                        scale: 1  
                                }, '-=.5')
                        }
                }
        }
/*-------------------------------------------
        home sidebar toggle on click 
---------------------------------------------*/ 
        (function(){
                var 
                sidebar = $("#home_sidebar"),
                btn     = $('.toggle-sidebar-btn'),
                close   = $('.sidebar-close'),
                body    = $('body');

                btn.on('click', ()=>{
                        sidebar.css({
                                'display': 'block',
                        });

                        body.css({
                                'overflow' : 'hidden',
                        })
                });

                close.on('click', ()=>{
                        sidebar.css({
                                'display': 'none', 
                        })

                        body.css({
                                'overflow' : 'unset',
                        })
                })


        }());

/*----------------------------------
        overflow toggle
-----------------------------------*/ 
        function overflow_toggle(sel, scroll, off, obb){
                var offset    = $(sel).offset().top;

                if(scroll > (offset - off)){
                        $(sel).css({
                                'overflow': 'hidden',
                        })       
                }
                else{
                        $(sel).css({
                                'overflow': 'unset',
                        })   
                }
        }
/*----------------------------------
        i-btn ripple hover
-----------------------------------*/ 
        var ibtn = $(".i-btn");
        var ripple = $(ibtn.children()[1]);
        
        ibtn.on('mouseenter', (x)=>{
                ripple.css({
                        top : x.offsetY,
                        left : x.offsetX,
                })
                
        })
/*----------------------------------
        instruction switcher 
-----------------------------------*/ 
        function class_switcher(sel, scroll, off, cls, arr, target_arr){
                var 
                        offset          = $(sel).offset().top,
                        fullHeight      = $(sel).height(), 
                        bar = $("#scroll-inner-bar"),
                        barContainer = $(".content__scroll").height(),
                        sc = scroll - offset;
                        
                //scroll the bar
                if(scroll > (offset - off)){
                        var calc = () => {
                                return ((sc * barContainer) / fullHeight );
                        }

                        bar.css({
                                height: calc() + 20,
                        })
                }
                //switch active class
                target_arr.map( (item, index)=>{
                        var tr_offset = $(item).offset().top;
                        if(scroll > (tr_offset - off)){
                                switcher_function(index);
                        }
                })

                function switcher_function(i){
                        arr.map(item =>{
                                $(item).removeClass(cls);
                        });

                        $(arr[i]).addClass(cls);
                        
                }
        }

/*----------------------------------
        client slick slider 
-----------------------------------*/ 
        $('.client-slider').slick({
        dots: false,
        infinite: true,
        speed: 300,
        arrows: false,
        autoplay: true,
        slidesToShow: 6,
        slidesToScroll: 1,
        autoplaySpeed: 1500,
        responsive: [
                {
                breakpoint: 1024,
                settings: {
                        slidesToShow: 5,
                        slidesToScroll: 1,
                        infinite: true,
                        dots: false
                }
                },
                {
                breakpoint: 600,
                settings: {
                        slidesToScroll: 1,
                        slidesToShow: 5,
                        slidesToScroll: 1,
                        infinite: true,
                        dots: false
                }
                },
                {
                breakpoint: 480,
                settings: {
                        slidesToShow: 1,
                        slidesToScroll: 1
                }
                }
                // You can unslick at a given breakpoint now by adding:
                // settings: "unslick"
                // instead of a settings object
                ]
        });

});
