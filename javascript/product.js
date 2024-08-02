
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

//----------------product description ----------//
 let hide_desc = document.querySelector(".description .desc-top p");
 let desc_title = document.querySelector(".description .decs-title");
 let desc_contents = document.querySelectorAll(".description .desc-content0");
 let desc_content = document.querySelector(".description .desc-content");
 let del = document.querySelector(".desc-content3 p");
 let desc_content3 = document.querySelector(".desc-content .desc-content3");
 let sub_titles = document.querySelectorAll(".description .sub-title");


hide_desc.addEventListener('click', ()=>{
    desc_title.classList.toggle('hide');
    desc_content.classList.toggle('hide');
})

sub_titles.forEach((value, index)=>{
    sub_titles[index].addEventListener('click', ()=>{
        sub_titles.forEach((value, i)=>{
            sub_titles[i].classList.remove('active');
        })
        sub_titles[index].classList.add('active');
        desc_contents.forEach((value, i)=>{
            desc_contents[i].classList.add('hide1');
        })
        desc_contents[index].classList.remove('hide1');
    })
    
})

del.addEventListener('click', ()=>{
    desc_content3.classList.add('hide1');
    sub_titles[2].classList.remove('active');
    desc_contents[0].classList.remove('hide1');
    sub_titles[0].classList.add('active');
})
// desc_content3.addEventListener('click', ()=>{
//     desc_content3.classList.remove('negative');
//     })

