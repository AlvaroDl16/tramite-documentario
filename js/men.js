const menu = document.getElementById('dropdown');
const submenu = document.querySelector('.submenu');
const arrow = document.querySelector('.fa-caret-down');

menu.addEventListener('click', (e)=>{
    e.preventDefault();
    submenu.classList.toggle('submenu__show');
    arrow.classList.toggle('down__rotate');
})

