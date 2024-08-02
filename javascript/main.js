// ------------------Image slide-------------------------//

let imageSlide = document.querySelectorAll('.img-items img');
let prev = document.querySelector(".prev");
let next = document.querySelector(".next");
let dots = document.querySelectorAll(".dot");

let counter =0;
//ham dung khi nhan next
function slideNext(){
    imageSlide[counter].style.animation = "next1 0.5s ease forwards";
    if(counter>=imageSlide.length - 1){
        counter = 0;
    }else{
        counter++;
    }
    imageSlide[counter].style.animation = "next2 0.5s ease forwards";
    indicator();
}
next.addEventListener('click', slideNext);
//.ham dung khi nhan prev
function slidePrev(){
    imageSlide[counter].style.animation = "prev1 0.5s ease forwards";
    if(counter==0){
        counter = imageSlide.length - 1;
    }else{
        counter--;
    }
    imageSlide[counter].style.animation = "prev2 0.5s ease forwards";
    indicator();
}
prev.addEventListener('click', slidePrev);
// chuyen hinh dau cham
function indicator(){
    dots.forEach((dot)=>{
        dot.classList.remove("active");
    });
    dots[counter].classList.add("active");
};

//ham tu di chuyen hinh
function autoSlide(){
     deletInterval = setInterval(timer, 5000);
    function timer(){
        slideNext();
        indicator();
    }
}
autoSlide();
//dung khi con tro di chuyen toi
const container = document.querySelector(".hero .body");
container.addEventListener('mouseover', function(){
    clearInterval(deletInterval);
})
//tro ve auto slide khi roi con tro ra
container.addEventListener('mouseout', autoSlide);

function switchImage(currentImage){
    currentImage.classList.add("active");
    let imgId = currentImage.getAttribute("attr");
    if(imgId >counter){
        imageSlide[counter].style.animation = "next1 0.5s ease forwards";
        counter= imgId;
        imageSlide[counter].style.animation = "next2 0.5s ease forwards";
    }else if(imgId == counter){
        return;
    }else{
        imageSlide[counter].style.animation = "prev1 0.5s ease forwards";
        counter = imgId;
        imageSlide[counter].style.animation = "prev2 0.5s ease forwards";
    }
    indicator();
}
dots.forEach((dot)=>{
    dot.setAttribute("onclick", "switchImage(this)");

})

// ---------------------Scroll
const header = document.querySelector("header");
window.addEventListener('scroll', ()=>{
    x= window.pageYOffset;
    if(x>0){
        header.classList.add('sticky');
    }else{
        header.classList.remove('sticky');
    }
});