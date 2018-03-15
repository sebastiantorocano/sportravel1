<?php
include_once('libraries.php');
include_once('enlace.php');



$consulta="SELECT dt.Description,i.DocumentNumber,i.Name,i.LastName,g.Description,bt.Description,rh.Description,i.BirthDate,i.Email,i.Adress,i.Phone,i.CellPhone,i.Company,i.Position,i.Eps,l.Description,cl.Description,bc.Description,ct.Description,i.total
FROM inscription i
INNER JOIN documenttype dt on dt.id=i.idDocumentType
INNER JOIN gender g on g.id=i.idGender
INNER JOIN bloodtype bt on bt.id=i.idBloodType
INNER JOIN rhfactor rh on rh.id=i.idRHFactor
INNER JOIN league l on l.id=i.idLeague
INNER JOIN club cl on cl.id=i.idClub
INNER JOIN bicyclebrand bc on bc.id=i.idCicleBrand
INNER JOIN category ct on ct.id=i.idCategory";

 $result = mysqli_query($enlace, $consulta);
?>
<html>
    <head>
        <script src="../libraries/js/results.js" type="text/javascript"></script>
        <meta http-equiv="content-type" content="text/html; charset=utf-8"></meta>
    </head>
    <bod style="background-color: #222; width: 98%">
        
   
    <div class="row">

        <div class="col-sm-1"></div>
        <div class="col-sm-8">
            
            <form action="../controllers/resultsController.php"  method="post" target="_blank" id="FormularioExportacion">
                <p> Exportar a Excel<img src="../images/Excel-icon.png" onclick="exportarExcel()" style="cursor: pointer"></p>
                  <input type="hidden" id="datos_a_enviar" name="datos_a_enviar" />
                    <input type="hidden" name="action" id="action" value="1">
          </form>
            
            <table class="table table-hover table-bordered" id="tblResults">
                <thead>
                    <tr>
                        <th>Tipo Documento</th>
                        <th>N&uacute;mero Documento</th>
                        <th>Nombre</th>
                        <th>Apellidos</th>
                        <th>Genero</th>
                        <th>Tipo Sangre</th>
                        <th>Fecha Nacimiento</th>
                        <th>Email</th>
                        <th>Direccion</th>
                        <th>Telefono</th>
                        <th>Celular</th>
                        <th>Empresa</th>
                        <th>Cargo</th>
                        <th>EPS</th>
                        <th>Liga</th>
                        <th>Club</th>
                        <th>Tipo Bicicleta</th>
                        <th>Categoria</th>
                        <th>Total</th>
                        
                    </tr>
                </thead>
                <tbody>
                    <?php
                       while ($resultado = mysqli_fetch_row($result)) {
                    ?>
                    <tr>
                        <td><?php echo $resultado[0];?></td>
                        <td><?php echo $resultado[1];?></td>
                        <td><?php echo $resultado[2];?></td>
                        <td><?php echo $resultado[3];?></td>
                        <td><?php echo $resultado[4];?></td>
                        <td><?php echo $resultado[6]." ".$resultado[5];?></td>
                        <td><?php echo $resultado[7];?></td>
                        <td><?php echo $resultado[8];?></td>
                        <td><?php echo $resultado[9];?></td>
                        <td><?php echo $resultado[10];?></td>
                        <td><?php echo $resultado[11];?></td>
                        <td><?php echo $resultado[12];?></td>
                        <td><?php echo $resultado[13];?></td>
                        <td><?php echo $resultado[14];?></td>
                        <td><?php echo $resultado[15];?></td>
                        <td><?php echo $resultado[16];?></td>
                        <td><?php echo $resultado[17];?></td>
                        <td><?php echo $resultado[18];?></td>
                        <td><?php echo number_format($resultado[19]);?></td>
                        
                        
                    </tr>
                       <?php }?>
                </tbody>
            </table>
                  
        </div>
        <div class="col-sm-1"></div>







    </div>



 </bod>

</html>
