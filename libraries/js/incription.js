$(document).ready(function () {

    $("#divOtroClub").hide();
    $("#divOtraMarca").hide();

    $("#txtFechaNacimiento").datepicker({

        dateFormat: 'yy-mm-dd',
        changeMonth: true,
        changeYear: true,
        dayNamesMin: ["Do", "Lu", "Ma", "Mi", "Ju", "Vi", "Sa"],
        dayNamesShort: ["Dom", "Lun", "Mar", "Mie", "Jue", "Vie", "Sab"],
        monthNames:
                ["Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio",
                    "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre"],
        monthNamesShort:
                ["Ene", "Feb", "Mar", "Abr", "May", "Jun",
                    "Jul", "Ago", "Sep", "Oct", "Nov", "Dic"],
        yearRange: '1950:2020',

    });


    $("#btnContinuar").click(function () {
        var inputs = $('#FrmIncripcion').find(':input[required]');
        var vacios = 0;
        $.each(inputs, function (index, input) {

            value = $(input).val();
            if (value.trim() === "") {
                vacios++;
                $(input).css('border-color', 'red');
            } else {
                $(input).css('border-color', '#ccc');
            }
        });


        if (vacios > 0) {


            swal(
                    'Alerta',
                    'Debe completar todos los campos marcados con (*)',
                    'warning'
                    )
            return;
            // alertify.alert("", "Debe completar todos los campos marcados con (*)"); 
        }


        var cmbTipoDocumento = $("#cmbTipoDocumento").val();
        var txtNumeroDocumento = $("#txtNumeroDocumento").val();
        var txtNombres = $("#txtNombres").val();
        var txtApellidos = $("#txtApellidos").val();
        var cmbGenero = $("#cmbGenero").val();
        var cmbTipoSangre = $("#cmbTipoSangre").val();
        var cmbFactorRH = $("#cmbFactorRH").val();
        var txtFechaNacimiento = $("#txtFechaNacimiento").val();
        var txtEmail = $("#txtEmail").val();
        var txtConfirmacionEmail = $("#txtConfirmacionEmail").val();
        var cmbCountry = $("#cmbCountry").val();
        var cmbDepartments = $("#cmbDepartments").val();
        var cmbCities = $("#cmbCities").val();
        var txtDireccion = $("#txtDireccion").val();
        var txtTelefono = $("#txtTelefono").val();
        var txtCelular = $("#txtCelular").val();
        var txtEmpresa = $("#txtEmpresa").val();
        var txtCargo = $("#txtCargo").val();
        var txtEps = $("#txtEps").val();
        var cmbLeague = $("#cmbLeague").val();
        var cmbClub = $("#cmbClub").val();
        var txtOtroClub = $("#txtOtroClub").val();
        var cmbMarca = $("#cmbMarca").val();
        var txtOtraMarca = $("#txtOtraMarca").val();
        var cmbCategoria = $("#cmbCategoria").val();
        var txtTotal = $("#txtTotal").val();

        $.ajax({
            data: {'action': 5, 'cmbTipoDocumento': cmbTipoDocumento, 'txtNumeroDocumento': txtNumeroDocumento,
                'txtNombres': txtNombres, 'txtApellidos': txtApellidos, 'cmbGenero': cmbGenero,
                'cmbTipoSangre': cmbTipoSangre, 'cmbFactorRH': cmbFactorRH, 'txtFechaNacimiento': txtFechaNacimiento, 'txtEmail': txtEmail,
                'txtConfirmacionEmail': txtConfirmacionEmail, 'cmbCountry': cmbCountry, 'cmbDepartments': cmbDepartments,
                'cmbCities': cmbCities, 'txtDireccion': txtDireccion, 'txtTelefono': txtTelefono, 'txtCelular': txtCelular,
                'txtEmpresa': txtEmpresa, 'txtCargo': txtCargo, 'txtEps': txtEps, 'cmbLeague': cmbLeague, 'cmbClub': cmbClub, 'txtOtroClub': txtOtroClub,
                'cmbMarca': cmbMarca, 'txtOtraMarca': txtOtraMarca, 'cmbCategoria': cmbCategoria, 'txtTotal': txtTotal},
            url: "../controllers/inscriptionController.php",
            type: 'POST',
            success: function (data, textStatus, jqXHR) {
                console.log(data);
                if (data == "OK") {
                    swal(
                            'Excelente',
                            'Usuario inscrito correctamente',
                            'success'
                            )
                    location.reload();
                } else {
                    swal(
                            'Alerta',
                            'Ha ocurrido un error',
                            'warning'
                            )
                }

            }
        })



    });


    $("#cmbCountry").change(function () {

        var Country = $("#cmbCountry").val();
        $.ajax({
            data: {'action': 3, 'Country': Country},
            url: "../controllers/inscriptionController.php",
            type: 'POST',
            success: function (data) {
                $("#respDepartamento").html(data);
            }
        })
    });

    $("#cmbLeague").change(function () {
        var League = $("#cmbLeague").val();


        $.ajax({
            data: {'action': 1, 'League': League},
            url: "../controllers/inscriptionController.php",
            type: 'POST',
            success: function (data) {
                $("#respClub").html(data);
            }
        })
    });


    $("#cmbTransmition").change(function () {
        var Transmition = $("#cmbTransmition").val();


        $.ajax({
            data: {'action': 2, 'Transmition': Transmition},
            url: "../controllers/inscriptionController.php",
            type: 'POST',
            success: function (data) {
                $("#respReference").html(data);
            }
        })
    });

    $("#cmbCategoria").change(function () {
        var cmbCategoria = $("#cmbCategoria").val();

        $.ajax({
            data: {'action': 6, 'cmbCategoria': cmbCategoria},
            type: 'POST',
            url: "../controllers/inscriptionController.php",
            success: function (data) {
                $("#txtTotal").val(data);
            }
        });
    });
});




function validarEmail(email1) {

    var email = $("#" + email1).val();

    if (email1 == "txtConfirmacionEmail") {
        if ($("#txtEmail").val() != email) {
            swal(
                    'Alerta',
                    'La confirmacion no coincide con el email',
                    'warning'
                    )

            return;
        }
    }
    expr = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
    if (!expr.test(email)) {
        swal(
                'Alerta',
                'Debe ingresar un email correcto',
                'warning'
                )
        //return 0;
    } else {
        return 1;
    }
}


function getCities() {

    var Department = $("#cmbDepartments").val();



    $.ajax({
        data: {'action': 4, 'Department': Department},
        url: "../controllers/inscriptionController.php",
        type: 'POST',
        success: function (data) {
            $("#respCiudad").html(data);
        }
    })

}




function validarClub() {
    var cmbClub = $("#cmbClub").val();

    if (cmbClub == "Otro") {
        $("#divOtroClub").show();
    } else {
        $("#divOtroClub").hide();
    }
}


function validarMarca() {
    var cmbMarca = $("#cmbMarca").val();

    if (cmbMarca == "Otra") {
        $("#divOtraMarca").show();
    } else {
        $("#divOtraMarca").hide();
    }
}
