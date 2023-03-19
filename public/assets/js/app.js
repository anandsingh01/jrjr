
let topMenuClose = document.querySelector('.top_menu');
let closeBtn = document.querySelector('.cancle');

closeBtn.addEventListener('click',function(){
    topMenuClose.style.display = "none";
});

let openNav = document.querySelector('.open_menu');
let closeNav = document.querySelector('.toggle_btn');
let mainMenu = document.querySelector('.main_menu');
let overlay = document.querySelector('.overlay');

closeNav.addEventListener('click',()=>{
    mainMenu.style.display = 'none';
    openNav.style.display = 'block';
    closeNav.style.display = 'none';
    document.body.style.overflow = 'auto';
});

openNav.addEventListener('click',()=>{
    mainMenu.style.display = 'block';
    openNav.style.display = 'none';
    closeNav.style.display = 'block';
    document.body.style.overflow = 'hidden';
})

