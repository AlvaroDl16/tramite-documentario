const modal = document.querySelector('.modal__container');
const btn = document.querySelectorAll('.modal_despacho');
const btn_cancelar = document.getElementById('cancelar_modal_despacho');
const input_id = document.getElementById('input_id');

btn.forEach(element => {
    element.addEventListener("click", (e)=>{  
        e.preventDefault();
        let id = element.getAttribute("id");
        input_id.value = id;
        modal.classList.add("show_modal");
    })
});


    btn_cancelar.addEventListener("click", ()=>{
        modal.classList.remove('show_modal');
    })

