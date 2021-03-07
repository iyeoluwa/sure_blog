
//this function is for the menu
let burger = document.getElementById('open-menu');
let xburger = document.getElementById('close-menu');
let menu = document.getElementById('mobile-menu');
let parent = document.getElementById('parent-button');
 isOpened = false;

 parent.addEventListener('click',toggleClass);
function openMenu(){
    //toggle the menu button
    burger.classList.add('opened');
    //get div that is hidden to show
    menu.classList.add('visible');
    xburger.classList.add('opened')

}

function closeMenu(){
    //toggle the menu button
    burger.classList.remove('opened');
    //get div that is hidden to show
    menu.classList.remove('visible');
    xburger.classList.remove('opened')
    isOpened = false;
}

function toggleClass(){
    if(isOpened){
        closeMenu()
    }else{
        openMenu();
        isOpened = true;
    }
}
