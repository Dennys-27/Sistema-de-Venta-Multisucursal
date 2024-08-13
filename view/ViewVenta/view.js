$(document).ready(function(){
    var vent_id = getUrlParameter('v')
    $.post("../../controller/venta.php?op=mostrar",{vent_id:vent_id},function(data){
        data = JSON.parse(data);
                $('#txtdirecc').html(data.EMP_DIRECC);
                $('#txtruc').html(data.EMP_RUC);
                $('#txtemail').html(data.EMP_CORREO);
                $('#txtweb').html(data.EMP_PAG);
                $('#txttelf').html(data.EMP_TELF);
                $('#vent_id').html(data.VENT_ID);
                $('#fech_crea').html(data.FECH_CREA);
                $('#pag_nom').html(data.PAG_NOM);
                $('#vent_subtotal').html(data.VENT_SUBTOTAL);
                $('#vent_igv').html(data.VENT_IGV);
                $('#vent_total').html(data.VENT_TOTAL);
                $('#vent_total_1').html(data.VENT_TOTAL);
                $('#vent_coment').html(data.VENT_COMENT);
                $('#usu_nom').html(data.USU_NOM + " " + data.USU_APE);
                $('#mon_nom').html(data.MON_NOM);
                $('#cli_nom').html(data.CLI_NOM);
                $('#cli_ruc').html(data.CLI_RUC);
                $('#cli_direcc').html(data.CLI_DIRECC);
                $('#cli_correo').html(data.CLI_CORREO);
    });

    $.post("../../controller/venta.php?op=listardetalleformato", { vent_id: vent_id}, function (data) {
        $('#products-list').html(data);
    });
});















var getUrlParameter = function getUrlParameter(sParam) {
    var sPageURL = decodeURIComponent(window.location.search.substring(1)),
        sURLVariables = sPageURL.split('&'),
        sParameterName,
        i;

    for (i = 0; i < sURLVariables.length; i++) {
        sParameterName = sURLVariables[i].split('=');

        if (sParameterName[0] === sParam) {
            return sParameterName[1] === undefined ? true : sParameterName[1];
        }
    }
};



