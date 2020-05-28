function notification (bool, msg){
    if(bool){
        var adm  = $('.admin__content');
        adm.css({
            'filter':'brightness(0.5)',
            'pointer-events':'none',
        })
        
        var panel = $('.status_notification');
        panel.css({
            'display':'block',
        })
        panel.text(msg);

        setTimeout(()=>{
            panel.css({
                'display':'none',
            })
            adm.css({
                'filter':'brightness(1)',
                'pointer-events':'all',
            })
        },1500)

    }
}


// change active class on slidebar
var mitm = $('.mitm');
mitm.click(item =>{
    mitm.map((i,menu)=>{
        $(menu).removeClass('active');
    })
})