<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN"
"http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="es">
	<?php
		// header("Content-Type: application/json; charset=utf-8"); 
		$data = array();

		if(isset($_GET['tope']))
		{
			$tope = $_GET['tope'];
		}
		else
		{
			die('Parámetro "tope" no detectado...');
		}

		if (!empty($tope))
		{
			/** SE CREA EL OBJETO DE CONEXION */
			@$link = new mysqli('localhost', 'root', 'ContrasenaSegura', 'marketzone');
			/** NOTA: con @ se suprime el Warning para gestionar el error por medio de código */

			/** comprobar la conexión */
			if ($link->connect_errno) 
			{
				die('Falló la conexión: '.$link->connect_error.'<br/>');
				//exit();
			}

			/** Crear una tabla que no devuelve un conjunto de resultados */
			if ( $result = $link->query("SELECT * FROM productos WHERE unidades <= $tope") ) 
			{
				/** Se extraen las tuplas obtenidas de la consulta */
				$row = $result->fetch_all(MYSQLI_ASSOC);

				/** Se crea un arreglo con la estructura deseada */
				foreach($row as $num => $registro) {            // Se recorren tuplas
					foreach($registro as $key => $value) {      // Se recorren campos
						$data[$num][$key] = $value;
					}
				}

				/** útil para liberar memoria asociada a un resultado con demasiada información */
				$result->free();
			}

			$link->close();

			/** Se devuelven los datos en formato JSON */
			// echo json_encode($data, JSON_PRETTY_PRINT);
		}
	?>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
		<title>Ejercicio 5</title>
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	</head>
	<body>
		<h3>PRODUCTOS</h3>

		<!-- debuger data print -->
		<!-- <?php
			print_r($data);
		?> -->

		<br/>

			<table class="table">
				<thead class="thead-dark">
					<tr>
					<th scope="col">#</th>
					<th scope="col">Nombre</th>
					<th scope="col">Marca</th>
					<th scope="col">Modelo</th>
					<th scope="col">Precio</th>
					<th scope="col">Detalles</th>
					<th scope="col">Unidades</th>
					<th scope="col">Imagen</th>
					<th scope="col">Eliminado</th>
					<th scope="col">Acciones</th>
					</tr>
				</thead>
				<tbody>
					<tr>
					<?php
						foreach($data as $clave => $valor) {
							echo "<tr>";
							foreach($valor as $clave2 => $valor2) {
								if($clave2 == 'imagen') {
									echo "<td><img src="."http://localhost/practicas/p07/".$valor2."></td>";
								} else {
									echo "<td>".$valor2."</td>";
								}
							}
							echo '<td>
									<form action="formulario_productos_v2.php" method="post">
										<input type="hidden" name="id" value="'.$valor['id'].'">
										<input type="hidden" name="nombre" value="'.$valor['nombre'].'">
										<input type="hidden" name="marca" value="'.$valor['marca'].'">
										<input type="hidden" name="modelo" value="'.$valor['modelo'].'">
										<input type="hidden" name="precio" value="'.$valor['precio'].'">
										<input type="hidden" name="detalles" value="'.$valor['detalles'].'">
										<input type="hidden" name="unidades" value="'.$valor['unidades'].'">
										<input type="hidden" name="imagen" value="'.$valor['imagen'].'">
										<input type="hidden" name="eliminado" value="'.$valor['eliminado'].'">
										<button type="submit" class="btn btn-primary">Editar</button>
									</form>
								</td>';
							echo "</tr>";
						}
					?>
					</tr>
				</tbody>
			</table>
	</body>
</html>