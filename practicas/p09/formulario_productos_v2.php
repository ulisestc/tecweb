<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario Productos</title>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const form = document.getElementById("formularioProductos");
            form.addEventListener("submit", function(event) {
                let valid = true;
                let errorMessage = "";

                const nombre = document.getElementById("form-nombre").value;
                const marca = document.getElementById("form-marca").value;
                const modelo = document.getElementById("form-modelo").value;
                const precio = parseFloat(document.getElementById("form-precio").value);
                const detalles = document.getElementById("form-detalles").value;
                const unidades = parseInt(document.getElementById("form-unidades").value);
                const imagen = document.getElementById("form-imagen");

                if (!nombre || nombre.length > 100) {
                    valid = false;
                    errorMessage += "El nombre es requerido y debe tener 100 caracteres o menos.\n";
                }

                if (!marca || !["Logitech", "Nvidia", "HyperX", "NZXT"].includes(marca)) {
                    valid = false;
                    errorMessage += "La marca es requerida y debe seleccionarse de la lista.\n";
                }

                if (!modelo || !/^[a-zA-Z0-9]*$/.test(modelo) || modelo.length > 25) {
                    valid = false;
                    errorMessage += "El modelo es requerido, debe ser alfanumérico y tener 25 caracteres o menos.\n";
                }

                if (isNaN(precio) || precio <= 99.99) {
                    valid = false;
                    errorMessage += "El precio es requerido y debe ser mayor a 99.99.\n";
                }

                if (detalles.length > 250) {
                    valid = false;
                    errorMessage += "Los detalles deben tener 250 caracteres o menos.\n";
                }

                if (isNaN(unidades) || unidades < 0) {
                    valid = false;
                    errorMessage += "Las unidades son requeridas y deben ser mayor o igual a 0.\n";
                }

                if (!imagen.value) {
                    imagen.value = "img/default.jpg";
                }

                if (!valid) {
                    alert(errorMessage);
                    event.preventDefault();
                }
            });
        });
    </script>
</head>
<body>
    <form id="formularioProductos" action="http://localhost/practicas/p08/set_producto_v2.php" method="post">
        
        <h2>Información de los productos</h2>
        <fieldset>
            <legend>Insertar productos</legend>

            <ul>
                <li><label for="form-nombre">Nombre:</label> <input type="text" name="nombre" id="form-nombre" value="<?= !empty($_POST['nombre']) ? $_POST['nombre'] : (!empty($_POST['nombre']) ? $_POST['nombre'] : '') ?>"></li>
                <li><label for="form-marca">Marca:</label>
                    <select name="marca" id="form-marca">
                        <option value="">Seleccione una marca</option>
                        <option value="Logitech" <?= (isset($_POST['marca']) && $_POST['marca'] == 'Logitech') ? 'selected' : '' ?>>Logitech</option>
                        <option value="Nvidia" <?= (isset($_POST['marca']) && $_POST['marca'] == 'Nvidia') ? 'selected' : '' ?>>Nvidia</option>
                        <option value="HyperX" <?= (isset($_POST['marca']) && $_POST['marca'] == 'HyperX') ? 'selected' : '' ?>>HyperX</option>
                        <option value="NZXT" <?= (isset($_POST['marca']) && $_POST['marca'] == 'NZXT') ? 'selected' : '' ?>>NZXT</option>
                        <!-- Add more options as needed -->
                    </select>
                </li>
                <li><label for="form-modelo">Modelo:</label> <input type="text" name="modelo" id="form-modelo" value="<?= htmlspecialchars($_POST['modelo'] ?? '') ?>"></li>
                <li><label for="form-precio">Precio:</label> <input type="number" name="precio" id="form-precio" value="<?= htmlspecialchars($_POST['precio'] ?? '') ?>"></li>
                <li> <label for="form-detalles">Detalles:</label><br> <textarea name="detalles" id="form-detalles" rows="4" cols="20"><?= htmlspecialchars($_POST['detalles'] ?? '') ?></textarea> </li>
                <li><label for="form-unidades">Unidades:</label> <input type="number" name="unidades" id="form-unidades" value="<?= htmlspecialchars($_POST['unidades'] ?? '') ?>"></li>
                <li><label for="form-imagen">Imagen:</label> <input type="text" name="imagen" id="form-imagen" value="<?= htmlspecialchars($_POST['imagen'] ?? 'img/') ?>"></li>
                <li><label for="form-eliminado">Eliminado:</label>
                    <select name="eliminado" id="form-eliminado">
                        <option value="">Seleccione una opción</option>
                        <option value="0" <?= (isset($_POST['eliminado']) && $_POST['eliminado'] == '0') ? 'selected' : '' ?>>0</option>
                        <option value="1" <?= (isset($_POST['eliminado']) && $_POST['eliminado'] == '1') ? 'selected' : '' ?>>1</option>
                    </select>
                </li>
            </ul>
        </fieldset>

        <input type="submit" value="Actualizar Producto">
        <input type="reset">

    </form>
</body>
</html>
