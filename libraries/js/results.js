$(document).ready(function (){
    
});

function exportarExcel(){
      $("#datos_a_enviar").val( $("<div>").append( $("#tblResults").eq(0).clone()).html());
    $("#FormularioExportacion").submit();
}