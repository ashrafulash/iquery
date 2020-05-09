
/*====================================
        constructor function
=====================================*/
function Input_vali (){

    // check if the input empty
    this.isEmpty = (sel)=>{
        let inp = $(sel).val().trim();
        return inp.length == 0 ? 'empty' : inp.length;
    }
    // showError Input
    this.emptyError = (sel, para) =>{
        var len = this.isEmpty(sel);
        var req = para.l ? para.l - 1 : 0;

        if(len == 'empty'){
            $(sel).css({
                border: '1px solid ' + para.e,
            });
            return false;

        }else{
                if(len <= req){
                    $(sel).css({
                        border: '1px solid ' + para.e,
                    });
                    return false;
                }
                else{
                    $(sel).css({
                        border: '1px solid ' + para.s,
                    });

                    return $(sel).val().trim();
                }
        }
    }
}

/*====================================
        Controller
=====================================*/
let vali = new Input_vali();
let val_next_btn = $('#iecc_form_next_btn');


let data = {
    centre      :   $('#selected_center').text().trim(),
    token       :   $('#selected_token').text().trim(),
}

let data_opt = {};

val_next_btn.on('click', ()=>{

    data.firstName              =   vali.emptyError('#first_name', {s:'#e1e2e6', e:'red', l: 3});
    data_opt.middleName         =   $('#middle_name').val().trim();
    data_opt.lastName           =   $('#last_name').val().trim();
    data.fatherFirstName        =   vali.emptyError('#father_first_name', {s:'#e1e2e6', e:'red', l: 3});
    data_opt.fatherMiddleName   =   $('#father_middle_name').val().trim();
    data_opt.fatherLastName     =   $('#father_last_name').val().trim();
    data.motherFirstName        =   vali.emptyError('#mother_first_name', {s:'#e1e2e6', e:'red', l: 3});
    data_opt.motherMiddleName   =   $('#mother_middle_name').val().trim();
    data_opt.motherLastName     =   $('#mother_last_name').val().trim();
    data.institution            =   vali.emptyError('#institution_name', {s:'#e1e2e6', e:'red', l: 3});
    data.presentHouse           =   vali.emptyError('#present_house_address', {s:'#e1e2e6', e:'red', l: 3});
    data.presentCity            =   vali.emptyError('#present_city', {s:'#e1e2e6', e:'red', l: 3});
    data.presentThana           =   vali.emptyError('#present_thana', {s:'#e1e2e6', e:'red', l: 3});
    data_opt.presentPostCode    =   $('#present_post_code').val().trim();
    data.presentCountry         =   vali.emptyError('#present_country', {s:'#e1e2e6', e:'red', l: 3});
    data.permanentAddress       =   vali.emptyError('#permanent_address', {s:'#e1e2e6', e:'red', l: 6});
    data.nationility            =   vali.emptyError('#nationility', {s:'#e1e2e6', e:'red', l: 3});
    data_opt.personalNumber     =   $('#personal_phone').val().trim();
    data.fatherNumber           =   vali.emptyError('#father_phone', {s:'#e1e2e6', e:'red', l: 11});
    data_opt.motherNumber       =   $('#mother_phone').val().trim();
    data_opt.emailAddress       =   $('#email_address').val().trim();
    data_opt.facebookUsername   =   $('#facebook_uername').val().trim();
    data_opt.skypeId            =   $('#skype_id').val().trim();
    
    
    let nextPage = Object.entries(data);
    let goNext  = nextPage.map(item=>{
        return item[1];
    });
    let bool = goNext.every(item=> {
        if(item == false){
            return false;
        }
        else{
            return true;
        }
    });
    
    if(bool){
        $('#errMsg_2').html(' ');
        let all_data = {...data, ...data_opt};
        validateRequest('admission/iecc/iecc.adm.second.php', '.adm_content', all_data);
    }
    else{
        $('#errMsg_2').html('Something Wrong <i class="fas fa-arrow-up"></i>');
    }


});