function hideSize(val){
    val.addEventListener('click', () =>{
        val.children[1].style.overflow  = 'visible';
        val.children[1].style.height  = '100px';
    })
}

const div1 = document.querySelector('.profile_lrg_first');
const div2 = document.querySelector('.profile_lrg_deux');
const div3 = document.querySelector('.profile_lrg_trois');
const div4 = document.querySelector('.profile_lrg_quatre');
const div5 = document.querySelector('.profile_lrg_cinque');
const div6 = document.querySelector('.profile_lrg_six');

const btn1 = document.querySelector('.nav_li_profile_1');
const btn2 = document.querySelector('.nav_li_profile_2');
const btn3 = document.querySelector('.nav_li_profile_3');
const btn4 = document.querySelector('.nav_li_profile_4');
const btn5 = document.querySelector('.nav_li_profile_5');
const btn6 = document.querySelector('.nav_li_profile_6');

console.log(btn1)
btn1.addEventListener('click', () => {
    div1.style.display = "flex";
    div2.style.display = "none";
    div3.style.display = "none";
    div4.style.display = "none";
    div5.style.display = "none";
    div6.style.display = "none";
})
btn2.addEventListener('click', () => {
    div1.style.display = "none";
    div2.style.display = "flex";
    div3.style.display = "none";
    div4.style.display = "none";
    div5.style.display = "none";
    div6.style.display = "none";
})
btn3.addEventListener('click', () => {
    div1.style.display = "none";
    div2.style.display = "none";
    div3.style.display = "flex";
    div4.style.display = "none";
    div5.style.display = "none";
    div6.style.display = "none";
})
btn4.addEventListener('click', () => {
    div1.style.display = "none";
    div2.style.display = "none";
    div3.style.display = "none";
    div4.style.display = "flex";
    div5.style.display = "none";
    div6.style.display = "none";
})
btn5.addEventListener('click', () => {
    div1.style.display = "none";
    div2.style.display = "none";
    div3.style.display = "none";
    div4.style.display = "none";
    div5.style.display = "flex";
    div6.style.display = "none";
})
btn6.addEventListener('click', () => {
    div1.style.display = "none";
    div2.style.display = "none";
    div3.style.display = "none";
    div4.style.display = "none";
    div5.style.display = "none";
    div6.style.display = "flex";
})