<?php
include_once('../views/enlace.php');


$action = $_POST['action'];


if ($action == "1") {

    $League = $_POST["League"];


    $consulta = "SELECT lc.id,c.id,c.Description
FROM leagueclub lc
INNER JOIN club c on c.id=lc.idClub
WHERE lc.idLeague='$League' AND c.type='0'";




    $result = mysqli_query($enlace, $consulta);
    ?>
    <select class="form-control" required="" id="cmbClub" onchange="validarClub()">
        <?php while ($resultado = mysqli_fetch_row($result)) { ?>
            <option value="<?php echo $resultado[1]; ?>"><?php echo $resultado[2]; ?></option>
        <?php }
        ?>
        <option value="Otro">Otro</option>

    </select>
    <?php
}

if ($action == "2") {
    $Transmition = $_POST["Transmition"];


    $consulta = "SELECT tc.id,g.id,g.Description
FROM transmitioncyclegroup tc
INNER JOIN groupreference g on g.id=tc.idGroup
WHERE tc.idTransmition='$Transmition'";




    $result = mysqli_query($enlace, $consulta);
    ?>
    <select class="form-control" required="" id="cmbTransimtion">
        <?php while ($resultado = mysqli_fetch_row($result)) { ?>
            <option value="<?php echo $resultado[1]; ?>"><?php echo $resultado[2]; ?></option>
        <?php }
        ?>


    </select>
    <?php
}

if ($action == "3") {
    $Country = $_POST["Country"];

    $consulta = "SELECT id,Descripcion,CapProv FROM departments WHERE Pais='$Country' ORDER BY Descripcion";


    $result = mysqli_query($enlace, $consulta);
    ?>
    <select class="form-control" required="" id="cmbDepartments" onchange="getCities()">
        <option></option>
        <?php while ($resultado = mysqli_fetch_row($result)) { ?>
            <option value="<?php echo $resultado[2]; ?>"><?php echo $resultado[1]; ?></option>
        <?php }
        ?>

    </select>
    <?php
}

if ($action == "4") {
    $Department = $_POST["Department"];

    $consulta = "SELECT id,Descripcion FROM cities WHERE Provincia='$Department' ORDER BY Descripcion";


    $result = mysqli_query($enlace, $consulta);
    ?>
    <select class="form-control" required="" id="cmbCities">
        <?php while ($resultado = mysqli_fetch_row($result)) { ?>
            <option value="<?php echo $resultado[0]; ?>"><?php echo $resultado[1]; ?></option>
        <?php }
        ?>

    </select>
    <?php
}

if ($action == "5") {
    $cmbTipoDocumento = $_POST["cmbTipoDocumento"];
    $txtNumeroDocumento = $_POST["txtNumeroDocumento"];
    $txtNombres = $_POST["txtNombres"];
    $txtApellidos = $_POST["txtApellidos"];
    $cmbGenero = $_POST["cmbGenero"];
    $cmbTipoSangre = $_POST["cmbTipoSangre"];
    $cmbFactorRH = $_POST["cmbFactorRH"];
    $txtFechaNacimiento = $_POST["txtFechaNacimiento"];
    $txtEmail = $_POST["txtEmail"];
    $txtConfirmacionEmail = $_POST["txtConfirmacionEmail"];
    $cmbCountry = $_POST["cmbCountry"];
    $cmbDepartments = $_POST["cmbDepartments"];
    $cmbCities = $_POST["cmbCities"];
    $txtDireccion = $_POST["txtDireccion"];
    $txtTelefono = $_POST["txtTelefono"];
    $txtCelular = $_POST["txtCelular"];
    $txtEmpresa = $_POST["txtEmpresa"];
    $txtCargo = $_POST["txtCargo"];
    $txtEps = $_POST["txtEps"];
    $cmbLeague = $_POST["cmbLeague"];
    $cmbClub = $_POST["cmbClub"];
    $txtOtroClub = $_POST["txtOtroClub"];
    $cmbMarca = $_POST["cmbMarca"];
    $txtOtraMarca = $_POST["txtOtraMarca"];
    $cmbCategoria = $_POST["cmbCategoria"];
    $txtTotal = $_POST["txtTotal"];


    $consulta = "SELECT id FROM countries WHERE Codigo='$cmbCountry'";
    $result = mysqli_query($enlace, $consulta);
    $resultado = mysqli_fetch_row($result);
    $cmbCountry = $resultado[0];

    $consulta = "SELECT id FROM departments WHERE CapProv='$cmbDepartments'";
    $result = mysqli_query($enlace, $consulta);
    $resultado = mysqli_fetch_row($result);
    $cmbDepartments = $resultado[0];

    if ($cmbClub == "Otro") {
        $consulta = "INSERT INTO club (Description,type)VALUES ('$txtOtroClub','1')";
        $result = mysqli_query($enlace, $consulta);

        $consulta = "SELECT id FROM club WHERE Description='$txtOtroClub'";
        $result = mysqli_query($enlace, $consulta);
        $resultado = mysqli_fetch_row($result);
        $cmbClub = $resultado[0];


        $consulta = "INSERT INTO leagueclub (idLeague,idClub) VALUES ('$cmbLeague','$cmbClub')";
        mysqli_query($enlace, $consulta);
    }


    if ($cmbMarca == "Otra") {
        $consulta = "INSERT INTO bicyclebrand (Description,type)VALUES ('$txtOtraMarca','1')";
        $result = mysqli_query($enlace, $consulta);



        $consulta = "SELECT id FROM bicyclebrand WHERE Description='$txtOtraMarca'";
        $result = mysqli_query($enlace, $consulta);
        $resultado = mysqli_fetch_row($result);
        $cmbMarca = $resultado[0];
    }
    
      $consulta = "SELECT r.Price,r.Value,c.Description
FROM categoryrange cr 
INNER JOIN category c on c.id=cr.idCategory
INNER JOIN ranges r on r.id=cr.idRange
WHERE cr.idCategory='$cmbCategoria' AND (SELECT COUNT(*) FROM categoryrange)<=r.Value
LIMIT 1";
      
   

    $result = mysqli_query($enlace, $consulta);
    $resultado = mysqli_fetch_row($result);
$txtTotal=$resultado[0];



    $consulta = "INSERT INTO inscription(idDocumentType,DocumentNumber,Name,LastName,idGender,idBloodType,idRHFactor,BirthDate,Email,idCountry,idDepartment,idCity"
            . ",Adress,Phone,CellPhone,Company,Position,Eps,idLeague,idClub,idCicleBrand,idCategory,Total) "
            . "VALUES ('$cmbTipoDocumento','$txtNumeroDocumento','$txtNombres','$txtApellidos','$cmbGenero','$cmbTipoSangre','$cmbFactorRH','$txtFechaNacimiento','$txtEmail',"
            . "'$cmbCountry','$cmbDepartments','$cmbCities','$txtDireccion','$txtTelefono','$txtCelular','$txtEmpresa','$txtCargo','$txtEps','$cmbLeague',"
            . "'$cmbClub','$cmbMarca','$cmbCategoria','$txtTotal')";

    mysqli_query($enlace, $consulta);

    echo "OK" ;
}

if ($action == "6") {
    $cmbCategoria = $_POST["cmbCategoria"];

    $consulta = "SELECT r.Price,r.Value,c.Description
FROM categoryrange cr 
INNER JOIN category c on c.id=cr.idCategory
INNER JOIN ranges r on r.id=cr.idRange
WHERE cr.idCategory='$cmbCategoria' AND (SELECT COUNT(*) FROM categoryrange)<=r.Value
LIMIT 1";

    $result = mysqli_query($enlace, $consulta);
    $resultado = mysqli_fetch_row($result);
    
    echo number_format($resultado[0]);
}
?>
