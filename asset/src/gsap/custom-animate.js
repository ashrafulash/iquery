$(document).ready(function(){
    var 
        arrow_1 = $('.arrow-1'),
        arrow_2 = $('.arrow-2')

    var tl = new TimelineLite();

    setInterval(()=>{

        tl 
        .fromTo(arrow_1, 2, {
            x: 0,
        },
        {
            x: 115,
            onComplete: function(){
                {
                    tl 
                        .fromTo(arrow_2, 2, {
                            x: -20,
                        },
                        {
                            x: 110,
                        }, '-=.5')
                }
            },
        });


    },1500)

});