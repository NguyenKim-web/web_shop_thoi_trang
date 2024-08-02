
// ---------------------Scroll-------------------//
const header = document.querySelector(".body");
window.addEventListener('scroll', ()=>{
    x= window.pageYOffset;
    if(x>0){
        header.classList.add('sticky');
    }else{
        header.classList.remove('sticky');
    }
});

//----------------open filter box----------//

