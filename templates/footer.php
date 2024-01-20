</main>

    <script src="<?php echo $ulr_base;?>js/tema.js"></script>
    <script src="<?php echo $ulr_base;?>js/men.js"></script>
    <script src="<?php echo $ulr_base;?>js/modalito.js"></script>
    <script src="<?php echo $ulr_base;?>js/modal_rechazo.js"></script>

    <script>
        $(document).ready( function(){
            $("#tabla_id").DataTable({
                "pageLength":4,
                lengthMenu:[
                    [4,10,25,50],
                    [4,10,25,50]
                ],
                columnDefs:[
                    {orderable:false, targets:[8]}
                ],
                "languaje":{
                    "url":"https://cdn.datatables.net/plug-ins/1.13.7/i18n/es-ES.json"
                }
            });
        });
    </script>

    <script>
        function borrar(id) {
            Swal.fire({
            title: "Deseas eliminar el registro?",
            showCancelButton: true,
            confirmButtonText: "Si, borrar",
            }).then((result) => {
            if (result.isConfirmed) {
                window.location="<?php echo $ulr_base; ?>controllers/secretarias/eliminar_enviados.php?txtID="+id;
            }
            });
        }

        function borrar_usuario(id) {
            Swal.fire({
            title: "Deseas eliminar el registro?",
            showCancelButton: true,
            confirmButtonText: "Si, borrar",
            }).then((result) => {
            if (result.isConfirmed) {
                window.location="<?php echo $ulr_base; ?>controllers/admin/eliminar_usuario.php?txtID="+id;
            }
            });
        }
    </script>

</body>
</html>