<?php
include_once('libraries.php');
include_once('enlace.php');
?>
<html>
    <head>
        <script src="../libraries/js/incription.js" type="text/javascript"></script>
    </head>
    <body style="background-color: #222; width: 98%">


        <div class="row">

            <div class="col-sm-2"></div>
            <div class="col-sm-8">
                <div class="container">
                    <div class="col-md-6">
                        <div class="form-area">  
                            <form role="form" id="FrmIncripcion">
                                <br style="clear:both">
                                <h3 style="margin-bottom: 25px; text-align: center;">Formulario de Inscripci&oacute;n</h3>
                                <div class="form-group">
                                    <label>Tipo de Documento / Document Type *</label>
                                    <select class="form-control" required="" id="cmbTipoDocumento">
                                        <?php
                                        $consulta = "SELECT id,Description FROM documenttype";
                                        $result = mysqli_query($enlace, $consulta);


                                        while ($resultado = mysqli_fetch_row($result)) {
                                            ?>
                                            <option value="<?php echo $resultado[0]; ?>"><?php echo $resultado[1]; ?></option>
                                        <?php }
                                        ?>

                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>N&uacute;mero Documento / Id *</label>
                                    <input type="number" class="form-control" id="txtNumeroDocumento" required>
                                </div>
                                <div class="form-group">
                                    <label>Nombres / Name *</label>
                                    <input type="text" class="form-control" id="txtNombres"  required>
                                </div>
                                <div class="form-group">
                                    <label>Apellidos / Last Name *</label>
                                    <input type="text" class="form-control" id="txtApellidos" required>
                                </div>
                                <div class="form-group">
                                    <label>G&eacute;nero / Gender *</label>
                                    <select class="form-control" required="" id="cmbGenero">
                                        <?php
                                        $consulta = "SELECT id,Description FROM gender";
                                        $result = mysqli_query($enlace, $consulta);

                                        while ($resultado = mysqli_fetch_row($result)) {
                                            ?>
                                            <option value="<?php echo $resultado[0]; ?>"><?php echo $resultado[1]; ?></option>
                                        <?php }
                                        ?>

                                    </select>

                                </div>
                                <div class="form-group">
                                    <label>Tipo de Sangre / Blood Type *</label>
                                    <select class="form-control" required="" id="cmbTipoSangre">
                                        <?php
                                        $consulta = "SELECT id,Description FROM bloodtype";
                                        $result = mysqli_query($enlace, $consulta);

                                        while ($resultado = mysqli_fetch_row($result)) {
                                            ?>
                                            <option value="<?php echo $resultado[0]; ?>"><?php echo $resultado[1]; ?></option>
                                        <?php }
                                        ?>

                                    </select>

                                </div>
                                <div class="form-group">
                                    <label>Factor RH / RH Factor *</label>
                                    <select class="form-control" required="" id="cmbFactorRH">
                                        <?php
                                        $consulta = "SELECT id,Description FROM rhfactor";
                                        $result = mysqli_query($enlace, $consulta);

                                        while ($resultado = mysqli_fetch_row($result)) {
                                            ?>
                                            <option value="<?php echo $resultado[0]; ?>"><?php echo $resultado[1]; ?></option>
                                        <?php }
                                        ?>

                                    </select>

                                </div>
                                <div class="form-group">
                                    <label>Fecha de Nacimiento / Birthdate *</label>
                                    <input type="text" class="form-control" id="txtFechaNacimiento"   required readonly>
                                </div>

                                <div class="form-group">
                                    <label>E-mail *</label>
                                    <input type="text" class="form-control" id="txtEmail" onblur="validarEmail('txtEmail')">
                                </div>
                                <div class="form-group">
                                    <label>Confirmar E-mail / Confirm E-Mail *</label>
                                    <input type="text" class="form-control" id="txtConfirmacionEmail" onblur="validarEmail('txtConfirmacionEmail')" >
                                </div>
                                <div class="form-group">
                                    <label>Pa&iacute;s / Country *</label>
                                    <select class="form-control" id="cmbCountry">
                                        <option></option>
                                        <?php
                                        $consulta = "SELECT id,Descripcion,Codigo FROM countries order by Descripcion";
                                        $result = mysqli_query($enlace, $consulta);

                                        while ($resultado = mysqli_fetch_row($result)) {
                                            ?>
                                            <option value="<?php echo $resultado[2]; ?>"><?php echo $resultado[1]; ?></option>
                                        <?php }
                                        ?>

                                    </select>

                                </div>
                                <div class="form-group">
                                    <label>Departamento / Department *</label>
                                    <div id="respDepartamento"> 
                                        <select class="form-control" required="">
                                            <option></option>
                                        </select>
                                    </div>


                                </div>
                                <div class="form-group">
                                    <label>Ciudad / City *</label>
                                    <div id="respCiudad"> 
                                        <select class="form-control" required="">
                                            <option></option>
                                        </select>
                                    </div>

                                </div>

                                <div class="form-group">
                                    <label>Direcci&oacute;n / Address </label>
                                    <input type="text" class="form-control" id="txtDireccion"  >
                                </div>
                                <div class="form-group">
                                    <label>Telefono / Phone </label>
                                    <input type="number" class="form-control" id="txtTelefono"  >
                                </div>
                                <div class="form-group">
                                    <label>Celular / Cell Phone *</label>
                                    <input type="number" class="form-control" id="txtCelular" required>
                                </div>

                                <div class="form-group">
                                    <label>Empresa / Company *</label>
                                    <input type="text" class="form-control" id="txtEmpresa" required>
                                </div>
                                <div class="form-group">
                                    <label>Cargo / Position *</label>
                                    <input type="text" class="form-control" id="txtCargo"  required>
                                </div>
                                <div class="form-group">
                                    <label>Empresa prestadora de servicios de salud / EPS *</label>
                                    <input type="text" class="form-control" id="txtEps" required>
                                </div>
                                <div class="form-group">
                                    <label>Liga *</label>
                                    <select class="form-control" required="" id="cmbLeague">
                                        <option></option>
                                        <?php
                                        $consulta = "SELECT id,Description FROM league";
                                        $result = mysqli_query($enlace, $consulta);

                                        while ($resultado = mysqli_fetch_row($result)) {
                                            ?>
                                            <option value="<?php echo $resultado[0]; ?>"><?php echo $resultado[1]; ?></option>
                                        <?php }
                                        ?>

                                    </select>
                                </div>


                                <div class="form-group">
                                    <label>Club *</label>
                                    <div id="respClub">
                                        <select class="form-control" required="">
                                            <option></option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group" id="divOtroClub">
                                    <label>Cual *</label>
                                    <input type="text" class="form-control" id="txtOtroClub"  >
                                </div>

                                <div class="form-group">
                                    <label>Marca de bicicleta / Bicycle brand *</label>
                                    <select class="form-control" id="cmbMarca" onchange="validarMarca()">
                                        <?php
                                        $consulta = "SELECT id,Description FROM bicyclebrand WHERE type='0'";
                                        $result = mysqli_query($enlace, $consulta);

                                        while ($resultado = mysqli_fetch_row($result)) {
                                            ?>
                                            <option value="<?php echo $resultado[0]; ?>"><?php echo $resultado[1]; ?></option>
                                        <?php }
                                        ?>
                                        <option value="Otra">Otra</option>

                                    </select>
                                </div>
                                <div class="form-group" id="divOtraMarca">
                                    <label>Cual *</label>
                                    <input type="text" class="form-control" id="txtOtraMarca">
                                </div>
                                <div class="form-group">
                                    <label>Prueba / try-out *</label>
                                    <select class="form-control" id="cmbCategoria">
                                        <option></option>
                                        <?php
                                        $consulta = "SELECT id,Description FROM category ORDER BY Description ASC";
                                        $result = mysqli_query($enlace, $consulta);

                                        while ($resultado = mysqli_fetch_row($result)) {
                                            ?>
                                            <option value="<?php echo $resultado[0]; ?>"><?php echo $resultado[1]; ?></option>
                                        <?php }
                                        ?>

                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Total</label>
                                    <input type="text" class="form-control" id="txtTotal"  readonly>
                                </div>

                                <button type="button" id="btnContinuar" name="btnContinuar" class="btn btn-primary pull-right">Continuar</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-2"></div>







        </div>


<div class="row">

            <div class="col-sm-2"></div>
            <div class="col-sm-8">
                <div class="container">
                    <div class="col-md-6">
                        <div class="form-area">  
                            <form role="form" id="FrmIncripcion">
                                <br style="clear:both">
                                <h3 style="margin-bottom: 25px; text-align: center;">Formulario de Federaci&oacute;n</h3>

                                <div class="form-group">
                                    <label>N&uacute;mero Documento / Id *</label>
                                    <input type="number" class="form-control" id="txtNumeroDocumento" required>
                                </div>
                                <div class="form-group">
                                    <label>Nombres / Name *</label>
                                    <input type="text" class="form-control" id="txtNombres"  required>
                                </div>
                                <div class="form-group">
                                    <label>Apellidos / Last Name *</label>
                                    <input type="text" class="form-control" id="txtApellidos" required>
                                </div>
                                <div class="form-group">
                                    <label>Total</label>
                                    <input type="text" class="form-control" id="txtTotal"  readonly>
                                </div>

                                <button type="button" id="btnContinuar" name="btnContinuar" class="btn btn-primary pull-right">Continuar</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-2"></div>







        </div>
    </body>



    <style>

        .red{
            color:red;
        }
        .form-area
        {
            background-color: #FAFAFA;
            padding: 10px 40px 60px;
            margin: 10px 0px 60px;
            border: 1px solid GREY;
        }

        .card {
            margin-top: 20px;
            padding: 30px;
            background-color: rgba(214, 224, 226, 0.2);
            -webkit-border-top-left-radius:5px;
            -moz-border-top-left-radius:5px;
            border-top-left-radius:5px;
            -webkit-border-top-right-radius:5px;
            -moz-border-top-right-radius:5px;
            border-top-right-radius:5px;
            -webkit-box-sizing: border-box;
            -moz-box-sizing: border-box;
            box-sizing: border-box;
        }
        .card.hovercard {
            position: relative;
            padding-top: 0;
            overflow: hidden;
            text-align: center;
            background-color: #fff;
            background-color: rgba(255, 255, 255, 1);
        }
        .card.hovercard .card-background {
            height: 130px;
        }
        .card-background img {
            -webkit-filter: blur(25px);
            -moz-filter: blur(25px);
            -o-filter: blur(25px);
            -ms-filter: blur(25px);
            filter: blur(25px);
            margin-left: -100px;
            margin-top: -200px;
            min-width: 130%;
        }
        .card.hovercard .useravatar {
            position: absolute;
            top: 15px;
            left: 0;
            right: 0;
        }
        .card.hovercard .useravatar img {
            width: 100px;
            height: 100px;
            max-width: 100px;
            max-height: 100px;
            -webkit-border-radius: 50%;
            -moz-border-radius: 50%;
            border-radius: 50%;
            border: 5px solid rgba(255, 255, 255, 0.5);
        }
        .card.hovercard .card-info {
            position: absolute;
            bottom: 14px;
            left: 0;
            right: 0;
        }
        .card.hovercard .card-info .card-title {
            padding:0 5px;
            font-size: 20px;
            line-height: 1;
            color: #262626;
            background-color: rgba(255, 255, 255, 0.1);
            -webkit-border-radius: 4px;
            -moz-border-radius: 4px;
            border-radius: 4px;
        }
        .card.hovercard .card-info {
            overflow: hidden;
            font-size: 12px;
            line-height: 20px;
            color: #737373;
            text-overflow: ellipsis;
        }
        .card.hovercard .bottom {
            padding: 0 20px;
            margin-bottom: 17px;
        }
        .btn-pref .btn {
            -webkit-border-radius:0 !important;
        }
    </style>


    <script>
        $(document).ready(function () {
            $('#characterLeft').text('140 characters left');
            $('#message').keydown(function () {
                var max = 140;
                var len = $(this).val().length;
                if (len >= max) {
                    $('#characterLeft').text('You have reached the limit');
                    $('#characterLeft').addClass('red');
                    $('#btnSubmit').addClass('disabled');
                } else {
                    var ch = max - len;
                    $('#characterLeft').text(ch + ' characters left');
                    $('#btnSubmit').removeClass('disabled');
                    $('#characterLeft').removeClass('red');
                }
            });

            $(".btn-pref .btn").click(function () {
                $(".btn-pref .btn").removeClass("btn-primary").addClass("btn-default");
                // $(".tab").addClass("active"); // instead of this do the below 
                $(this).removeClass("btn-default").addClass("btn-primary");
            });
        });

    </script>
</html>
