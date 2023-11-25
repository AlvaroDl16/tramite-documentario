const modal_rechazar = document.querySelector('.modal__container_rechazar');
const btn_recahzo = document.querySelectorAll('.modal_rechazo');
const btn_cancelar_rechazo = document.getElementById('cancelar_modal_rechazo');
const input_id_rechazar = document.getElementById('input_id_rechazar');

btn_recahzo.forEach(el => {
    el.addEventListener("click", (e)=>{  
        e.preventDefault();
        let id_rechazar = el.getAttribute("id");
        input_id_rechazar.value = id_rechazar;
        modal_rechazar.classList.add("show_modal_rechazar");
    })
});



    btn_cancelar_rechazo.addEventListener("click", ()=>{
        modal_rechazar.classList.remove('show_modal_rechazar');
    })

