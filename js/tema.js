const boton = document.querySelector('.theme__mode');

boton.addEventListener('click', ()=>{
    document.body.classList.toggle('dark');
    boton.classList.toggle('theme_mode_active');

    if (document.body.classList.contains('dark')) {
        localStorage.setItem('dark-mode', 'true');
    }else{
        
        localStorage.setItem('dark-mode', 'false');
    }
})


if (localStorage.getItem('dark-mode') === 'true') {
    document.body.classList.add('dark');
    boton.classList.add('theme_mode_active');
}else{
    document.body.classList.remove('dark');
    boton.classList.remove('theme_mode_active');
}
