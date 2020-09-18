
/*====================================
        constructor function
=====================================*/

var x, i, j, selElmnt, a, b, c;
/*look for any elements with the class "custom-select":*/
x = document.getElementsByClassName("custom-select");
for (i = 0; i < x.length; i++) {
selElmnt = x[i].getElementsByTagName("select")[0];
/*for each element, create a new DIV that will act as the selected item:*/
a = document.createElement("DIV");
a.setAttribute("class", "select-selected");
a.innerHTML = selElmnt.options[selElmnt.selectedIndex].innerHTML;
x[i].appendChild(a);
/*for each element, create a new DIV that will contain the option list:*/
b = document.createElement("DIV");
b.setAttribute("class", "select-items select-hide");

for (j = 1; j < selElmnt.length; j++) {
    /*for each option in the original select element,
    create a new DIV that will act as an option item:*/
    c = document.createElement("DIV");
    c.innerHTML = selElmnt.options[j].innerHTML;
    c.addEventListener("click", function(e) {
        /*when an item is clicked, update the original select box,
        and the selected item:*/
        var y, i, k, s, h;
        s = this.parentNode.parentNode.getElementsByTagName("select")[0];
        h = this.parentNode.previousSibling;
        for (i = 0; i < s.length; i++) {
        if (s.options[i].innerHTML == this.innerHTML) {
            s.selectedIndex = i;
            h.innerHTML = this.innerHTML;
            y = this.parentNode.getElementsByClassName("same-as-selected");
            for (k = 0; k < y.length; k++) {
            y[k].removeAttribute("class");
            }
            this.setAttribute("class", "same-as-selected");
            
            break;
        }
        }
        h.click();
    });
    b.appendChild(c);
}
x[i].appendChild(b);
a.addEventListener("click", function(e) {
    /*when the select box is clicked, close any other select boxes,
    and open/close the current select box:*/
    e.stopPropagation();
    closeAllSelect(this);
    this.nextSibling.classList.toggle("select-hide");
    this.classList.toggle("select-arrow-active");
    });
}
function closeAllSelect(elmnt) {
/*a function that will close all select boxes in the document,
except the current select box:*/
var x, y, i, arrNo = [];
x = document.getElementsByClassName("select-items");
y = document.getElementsByClassName("select-selected");
for (i = 0; i < y.length; i++) {
    if (elmnt == y[i]) {
    arrNo.push(i)
    } else {
    y[i].classList.remove("select-arrow-active");
    }
}
for (i = 0; i < x.length; i++) {
    if (arrNo.indexOf(i)) {
    x[i].classList.add("select-hide");
    }
}
}
/*if the user clicks anywhere outside the select box,
then close all select boxes:*/
document.addEventListener("click", closeAllSelect);

/*===============================================
                Controller
=================================================*/ 
let vali = new Input_vali();

data = {
class : false,
group : false,
blood : false,
religion: false,
gender : false,
birth: false,
imgCode: false,
};

function class_select_fun(b){
    var item = $(b).children();
    data.class = item[1].innerText;
}

function group_select_fun(b){
    var item = $(b).children();
    data.group = item[1].innerText;
}

function blood_select_fun(b){
    var item = $(b).children();
    data.blood = item[1].innerText;
}


function religion_select_fun(b){
    var item = $(b).children();
    data.religion = item[1].innerText;
}

function gender_select_fun(b){
    var item = $(b).children();
    data.gender = item[1].innerText;
}

$('#iecc_form_submit_btn').on('click', ()=>{

imgData = $("#croppedImg").attr('src');
if(imgData){
    data.imgCode = imgData;
}

var birth = $('#iecc_birth').val().trim();
data.birth = birth.length != 0 ? birth : false;

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

    let old_data = document.getElementById('data').innerHTML;
    let all_data = {... data, ... JSON.parse(old_data)};
    // passing all data to incldues folder
    validateRequest('uploads/ict-uplo/ict.adm.php', '.adm_content', all_data);
}
else{
    $('#errMsg_2').html('Something Wrong <i class="fas fa-arrow-up"></i>');
}
})









