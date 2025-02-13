

<?php require_once RUTA_APP . '/views/inc/header-admin.php'; ?>

<div class="controls">
    <div class="control-group">
        <button class="add-btn" id="nuevo_registro">➕ Agregar Nuevo Registro</button>
        <form action="<?php echo RUTA_URL; ?>/AdminController/admin" method="POST">
    <select name="select_id" class="filter-select" onchange="this.form.submit()">
        <option value="">Filtrar por Tipo</option>
        <option value="1" <?php echo isset($datos['filter']) && $datos['filter'] == 1 ? 'selected' : ''; ?>>Administrador</option>
        <option value="2" <?php echo isset($datos['filter']) && $datos['filter'] == 2 ? 'selected' : ''; ?>>Guardia</option>
        <option value="3" <?php echo isset($datos['filter']) && $datos['filter'] == 3 ? 'selected' : ''; ?>>Residente</option>
    </select>
</form>

    </div>
    <div class="control-group">
    <form class="search-container" action="<?php echo RUTA_URL; ?>/UserController/BuscarUsuario" method="POST">
                    <input id="id" type="text" name="id_usuario" placeholder="Buscar...">
                    <button type="submit" name="buscar"><img style="width:20px; height:20px;" src="<?php echo RUTA_URL; ?>/img/lupa.png" alt="Icono Editar"></button>
            </form>
    </div>
</div>

<div class="table-container">
    <div class="table-wrapper">
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Contraseña</th>
                    <th>Telefono</th>
                    <th>Correo</th>
                    <th>Departamento</th>
                    <th>Tipo de usuario</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
            <?php
                // Verificar si la variable 'usuarios' tiene registros
                if (!empty($datos['usuarios'])) {
                    // Si 'usuarios' es un array de un solo elemento
                    foreach ($datos['usuarios'] as $registro) {
                        if (is_array($registro) || is_object($registro)) {
                            echo "<tr>";
                            echo "<td>" . htmlspecialchars($registro['Cedula'] ?? '') . "</td>";
                            echo "<td>" . htmlspecialchars($registro['Pe_nombre'] ?? '') . " " . htmlspecialchars($registro['Pe_apellidos'] ?? '') . "</td>";
                            echo "<td>*****</td>"; // Campo oculto para la contraseña
                            echo "<td>" . htmlspecialchars($registro['Pe_telefono'] ?? '') . "</td>";
                            echo "<td>" . htmlspecialchars($registro['Us_correo'] ?? '') . "</td>";
                            echo "<td>" . htmlspecialchars($registro['Ap_id'] ?? '') . "</td>";
                            echo "<td>" . htmlspecialchars($registro['Ro_id'] ?? '') . "</td>";
                            echo "<td>
                                    <button class='edit-btn' id='nuevo_registro'>✏️</button>
                                    <form action='" . RUTA_URL . "/UserController/DeleteUser' method='POST' style='display:inline;'>
                                        <input type='hidden' name='delete_id' value='" . htmlspecialchars($registro['Cedula'] ?? '') . "'>
                                        <button type='submit' name='deletebtn' class='delete-btn'>🗑️</button>
                                    </form>
                                    </td>";
                            echo "</tr>";
                        } else {
                            echo "<tr><td colspan='8'>Datos incorrectos para este usuario</td></tr>";
                        }
                    }
                } else {
                    echo "<tr><td colspan='8'>No hay registros disponibles</td></tr>";
                }
            ?>
            </tbody>
        </table>
    </div>
    <div class="action-buttons">
        <button class="action-btn">Botón 1</button>
        <button class="action-btn">Botón 2</button>
        <button class="action-btn">Botón 3</button>
    </div>
</div>
<div id="myModal" class="modal">
    <div class="modal-content">
        <div class="cerrado">
            <h3 class="titulo-form">Nuevo registro</h3>
            <span class="close" id="close">&times;</span>
        </div>
        <form id="myForm" action="<?php echo RUTA_URL; ?>/PorterController/createGuest" method="post">
            <h4>Cedula: <input type="text" id="u_id" name="u_id" /></h4>
            <h4>Nombre: <input type="text" id="U_Nombre" name="U_Nombre" /></h4>
            <h4>Apellido: <input type="text" id="U_Apellido" name="U_Apellido" /></h4>
            <h4>Telefono: <input type="text" id="U_Telefono" name="U_Telefono" /></h4>
            <h4>Motivo de visita: <input type="text" id="U_Motivo" name="U_Motivo" /></h4>
            <h4>Numero de apartameto: <input type="text" id="U_Departamento" name="U_Departamento" /></h4>
            <center>
                <input type="submit" value="Enviar" class="Enviar" name="Visitantes" />
            </center>
        </form>
    </div>
</div>

<?php require_once RUTA_APP . '/views/inc/footer-admin.php'; ?>