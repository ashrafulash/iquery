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
        useful functions
-----------------------------------*/ 
function body_overflow(val){
        if(val){
                $('body').css({
                        overflow : 'hidden',
                }); 
        }else{
                $('body').css({
                        overflow : 'unset'
                });
        }
}

function popup(val){
        var 
        tl      = new TimelineLite(),
        overlay = $('.overlay');
        if(val){
                overlay.css({
                        display: 'block',
                })

                tl.fromTo(overlay, .3, {
                        scale: 1.2,
                },{
                        scale: 1,
                        opacity: 1,
                        onComplete: function(){
                                body_overflow(true);
                        }
                })
        }else{
                tl.to(overlay, .3, {
                        scale: .9,
                        opacity: 0,
                        onComplete: function(){
                                overlay.css({
                                        display: 'none',
                                })
                                body_overflow(false);
                        }
                }) 

                

        }
}

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

// popup close 
$('#close-popup').click(()=> popup(false));

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
                breakpoint: 768,
                settings: {
                        slidesToScroll: 1,
                        slidesToShow: 5,
                        slidesToScroll: 1,
                        infinite: true,
                        dots: false
                }
                },
                {
                breakpoint: 575,
                settings: {
                        slidesToScroll: 1,
                        slidesToShow: 4,
                        slidesToScroll: 1,
                        infinite: true,
                        dots: false
                }
                },
                {
                breakpoint: 480,
                settings: {
                        slidesToShow: 3,
                        slidesToScroll: 1
                }
                }
                // You can unslick at a given breakpoint now by adding:
                // settings: "unslick"
                // instead of a settings object
                ]
        });

/*----------------------------------
        admission panel
-----------------------------------*/
(function(){
        var
        admission_btn   = $('#admission_panel'),
        popup_body      = $(".popup-body")

        admission_btn.on('click', (e)=>{
                e.preventDefault();

                popup(true);
                load_request({
                        url: 'admission/index.php',
                        time: 10,
                        target : popup_body,
                        obb:{request : 'ajax_request'}
                })
        })
}());


/*----------------------------------
        Result panel
-----------------------------------*/
(function(){
        var
        result_btn   = $('#result_panel'),
        popup_body      = $(".popup-body")

        result_btn.on('click', (e)=>{
                e.preventDefault();

                popup(true);
                load_request({
                        url: 'admission/image-crop.php',
                        time: 10,
                        target : popup_body,
                        obb:{request : 'ajax_request'}
                })
        })
}());



});
