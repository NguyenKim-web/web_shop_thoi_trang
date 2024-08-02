
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
const filterButton = document.querySelector(".select-box button");
const filterBar = document.querySelector(".columns-top__filter");
filterButton.addEventListener('click', ()=>{
    filterBar.classList.toggle("show-filterBar");
});

//-----------change image of product-------------//
const columns = document.querySelectorAll(".product-box img");

columns.forEach((item, index)=>{
    mouseOver(item,index+1);
    mouseOut(item,index+1);
})

function mouseOver(item, index){
    item.addEventListener("mouseover",()=>{
        console.log(index);
        item.setAttribute("src", "./images/female"+(index)+"-back.jpg");
    })
}
function mouseOut(item, index){
    item.addEventListener("mouseout",()=>{
        console.log(index);
        item.setAttribute("src", "./images/female"+(index)+".jpg");
    })
}
