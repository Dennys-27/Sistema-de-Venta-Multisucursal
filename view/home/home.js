var suc_id = $('#SUC_IDx').val();

$.post("../../controller/compra.php?op=listartopproducto",{suc_id:suc_id},function(data){
    $("#listartopproducto").html(data);
});
$.post("../../controller/venta.php?op=listartopproducto",{suc_id:suc_id},function(data){
    $("#ventas").html(data);
});
