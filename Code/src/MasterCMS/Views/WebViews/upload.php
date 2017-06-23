<?php 
	require_once 'header.php'; 
	if ($_POST['enviar']) {
		$file = $_FILES['file'];
		$name = $_POST['nombre'];
		$title = $_POST['titulo'];
		$description = $_POST['descripcion'];
		$fileName = str_replace('.gif', '', $name);
		$rute = 'C:\xampp\htdocs\Code';
		$flash = 'C:\xampp\htdocs\Code\SWF\tuputamadre.txt';

		$allowed_files = ['image/gif'];

		if (empty($fileName)) {
			$error = "Selecciona un archivo o ponle un nombre valido";
		} elseif (empty($name) || empty($title) || empty($description)) {
			$error = "No dejes espacios en blanco";
		} elseif (!in_array($file['type'], $allowed_files)) {
			$error = "El formato de imagen es invalido";
		} elseif ($file['error']) {
			$error = "El archivo contiene Virus/Errores";
		} elseif (!is_writable($rute)) {
			$error = "Debes darle permisos de escritura a la ruta de placas";
		} else {
			$upload = move_uploaded_file($file['tmp_name'], $rute . '/' . $name . '.gif');
			if ($upload) {
				$open = fopen($flash, 'w');
				if ($open) {
					$write = fwrite($open, "\nbadge_name_{$name}={$title}");
					$write .= fwrite($open, "\nbadge_desc_{$name}={$description}");
					if ($write) {
						$error = "Se subio la placa correctamente";
					} else {
						$write = "La placa se subio pero valio verga al escribir la descipcion y el titulo";
					}
				} else {
					$error = "Se subio la placa pero no se pudo abrir el external flash, revisa los permisos de escritura";
				}
				fclose($open);
			} else {
				$error = "Hubo un error al subir la placa";
			}
		}
	}
	
?>
				<div id="right">
					<div id="options"><div id="icon" class="return"><a href="/housekeeping/?s=admin&a=tienda_raros"></a></div>
					</div>
					<div id="message" class="red">RECUERDA: Está prohibido que el código de la placa comience por las letras "UP".</div>
					<div id="box">
						<?php echo $error; ?>
						<form method="post" enctype="multipart/form-data"><input type='hidden' name='__csrf_anti' value="sid:a9355fec5f614ecf4631fe15faf6043f45276d50,1493317819" />
							<input name="file" type="file"><br/>
							<b>Nombre</b> <input type="text" name="nombre"/><br/>
							<b>Titulo</b> <input type="text" name="titulo"/><br/>
							<b>Descripción</b> <input type="text" name="descripcion"/><br/>
							<input type="submit" value="Enviar" name="enviar"><br/>
						</form>
					</div>
				</div><br style="clear:both;"/>

					    <br/><br/><br/>
<script type="text/javascript">CsrfMagic.end();</script></body>