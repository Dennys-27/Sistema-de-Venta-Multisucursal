var emp_id = $('#EMP_IDx').val(); 


function init(){
    $("#mantenimiento_form").on("submit",function(e){
        guardaryeditar(e);
    });
}


// Esta función se activa en el envío del formulario para guardar o editar datos.
function guardaryeditar(e){
    e.preventDefault();
    
    // Recopila los datos del formulario utilizando FormData.
    var formData = new FormData($("#mantenimiento_form")[0]);
    
    // Agrega datos adicionales a formData.
    formData.append('emp_id',$('#EMP_IDx').val());
    
    // Utiliza AJAX para enviar datos al servidor para guardar o editar.
    $.ajax({
        url:"../../controller/sucursal.php?op=guardaryeditar",
        type:"POST",
        data:formData,
        contentType:false,
        processData:false,
        success:function(data){
            console.log(data);
            // Recarga el DataTable y cierra el modal en caso de éxito.
            $('#table_data').DataTable().ajax.reload();
            $('#modalmantenimiento').modal('hide');

            // Muestra un mensaje de éxito utilizando la biblioteca SweetAlert.
            swal.fire({
                title:'Sucursal',
                text: 'Registro Confirmado',
                icon: 'success'
            }); 
        }
    });
}


// Esta parte inicializa el DataTable al cargar el documento.
$(document).ready(function(){

    $('#table_data').DataTable({
        "aProcessing": true,
        "aServerSide": true,
        dom: 'Bfrtip',
        buttons: [
            'copyHtml5',
            'excelHtml5',
            'csvHtml5',
        ],
        "ajax":{
            url:"../../controller/sucursal.php?op=listar",
            type:"post",
            data:{emp_id:emp_id}
        },
        "bDestroy": true,
        "responsive": true,
        "bInfo":true,
        "iDisplayLength": 10,
        "order": [[ 0, "desc" ]],
        "language": {
            "sProcessing":     "Procesando...",
            "sLengthMenu":     "Mostrar _MENU_ registros",
            "sZeroRecords":    "No se encontraron resultados",
            "sEmptyTable":     "Ningún dato disponible en esta tabla",
            "sInfo":           "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
            "sInfoEmpty":      "Mostrando registros del 0 al 0 de un total de 0 registros",
            "sInfoFiltered":   "(filtrado de un total de _MAX_ registros)",
            "sInfoPostFix":    "",
            "sSearch":         "Buscar:",
            "sUrl":            "",
            "sInfoThousands":  ",",
            "sLoadingRecords": "Cargando...",
            "oPaginate": {
                "sFirst":    "Primero",
                "sLast":     "Último",
                "sNext":     "Siguiente",
                "sPrevious": "Anterior"
            },
            "oAria": {
                "sSortAscending":  ": Activar para ordenar la columna de manera ascendente",
                "sSortDescending": ": Activar para ordenar la columna de manera descendente"
            }
        },
    });

});

// Esta función se utiliza para llenar el formulario al editar un registro.
function editar(suc_id){
    $.post("../../controller/sucursal.php?op=mostrar",{suc_id:suc_id},function(data){
        data=JSON.parse(data);
        $('#suc_id').val(data.SUC_ID);
        $('#suc_nom').val(data.SUC_NOM);
    });
    $('#lbltitulo').html('Editar Registro');
    $('#modalmantenimiento').modal('show');
}



// Esta función se utiliza para confirmar y eliminar un registro.
function eliminar(suc_id){
    swal.fire({
        title:"Eliminar!",
        text:"¿Desea Eliminar el Registro?",
        icon: "error",
        confirmButtonText : "Sí",
        showCancelButton : true,
        cancelButtonText: "No",
    }).then((result)=>{
        if (result.value){
            $.post("../../controller/sucursal.php?op=eliminar",{suc_id:suc_id},function(data){
                console.log(data);
            });

            // Recarga el DataTable y muestra un mensaje de éxito al eliminar.
            $('#table_data').DataTable().ajax.reload();

            swal.fire({
                title:'Categoria',
                text: 'Registro Eliminado',
                icon: 'success'
            });
        }
    });
}

// Este escuchador de eventos abre el modal para agregar un nuevo registro.
$(document).on("click","#btnnuevo",function(){
    $('#suc_id').val('');
    $('#suc_nom').val('');
    $('#lbltitulo').html('Nuevo Registro');
    $("#mantenimiento_form")[0].reset();
    $('#modalmantenimiento').modal('show');
});

// Llama a la función init para configurar la página al cargar el documento.
init();