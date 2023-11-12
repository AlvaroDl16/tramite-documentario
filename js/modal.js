const modal = document.querySelector('.modal__container');
const btn = document.getElementById('modal_despacho');
const btn_cancelar = document.getElementById('cancelar_modal');

btn.addEventListener("click", (e)=>{
    e.preventDefault();
    modal.classList.add("show_modal");
})

btn_cancelar.addEventListener("click", ()=>{
    modal.classList.remove('show_modal');
})