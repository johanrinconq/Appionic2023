
<h2>Resultado de la Búsqueda</h2>

<?php
if (isset($_GET['idBuscar'])) {
    $idBuscar = $_GET['idBuscar'];
    require_once("../model/UsuarioBD.php");
    $atributos = new UsuarioBD();
    $resultado = $atributos->getSolicitudPorID($idBuscar);

    if ($resultado) {
        ?>
        <table id="data-table-autofill" class="table  table-bordered table-td-valign-middle" style="color:white">

        <tbody>
            <?php
            foreach ($resultado as $mostrar) {

            ?>

                <tr class="odd gradeX">

                    <td class="f-s-600 text-inverse"><?php echo $mostrar['id'] ?></td>
                    <form id="form_<?php echo $mostrar['id']; ?>" style="display:none">
                        <td>
                            <p>ID: <input type="text" name="id" value="<?php echo $mostrar['id']; ?>" readonly>
                                documento: <input type="text" name="documento" value="<?php echo $mostrar['documento']; ?>">
                                Nombre: <input type="text" name="nombre" value="<?php echo $mostrar['nombre']; ?>"></p>
                            <p>Telefono: <input type="text" name="telefono" value="<?php echo $mostrar['telefono']; ?>">
                                Comercio: <input type="text" name="comercio" value="<?php echo $mostrar['comercio']; ?>">
                                Correo: <input type="text" name="correo" value="<?php echo $mostrar['correo']; ?>"></p>
                            <p>Tipo: <input type="text" name="tipo_id" value="<?php echo $mostrar['tipo_id']; ?>">
                                Estado: <input type="text" name="estado" value="<?php echo $mostrar['estado']; ?>">
                                Latitud: <input type="text" name="latitud" value="<?php echo $mostrar['latitud']; ?>"></p>
                            <p>Longitud: <input type="text" name="longitud" value="<?php echo $mostrar['longitud']; ?>">
                                Plan: <input type="text" name="plan_id" value="<?php echo $mostrar['plan_id']; ?>"></p>
                            <!-- Agrega otros campos de edición aquí -->
                        </td>
                    </form>

                </tr>
            <?php
            }
            ?>
        </tbody>
    </table>
    <?php
    } else {
        echo "No se encontraron resultados para la ID proporcionada.";
    }
}
?>


