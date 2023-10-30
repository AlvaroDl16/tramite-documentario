const boton = document.querySelector('.theme__mode');

boton.addEventListener('click', ()=>{
    document.body.classList.toggle('dark');
    boton.classList.toggle('theme_mode_active');
})

