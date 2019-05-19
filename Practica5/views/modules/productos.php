<?php

session_start();

if(!$_SESSION["validar"]){

	header("location:index.php?action=ingresar");

	exit();

}

?>

<script language="JavaScript">
	function pregunta(){
        if (confirm('¿Está seguro de eliminar este registro?')){
            document.tuformulario.submit()
        }
    }
</script>

<h1>PRODUCTOS</h1>

	<a href="index.php?action=registroP"><button>Agregar Producto</button></a>
	<table border="1">
		
		<thead>
			
			<tr>
				<th>Nombre</th>
				<th>Precio</th>
				<th>Cantidad</th>
				<th></th>
				<th></th>
				<th></th>

			</tr>

		</thead>

		<tbody>
			
			<?php

			$vistaProducto = new MvcController();
			$vistaProducto -> vistaTablaController();
			$vistaProducto -> borrarProductoController();

			?>

		</tbody>

	</table>

<?php

if(isset($_GET["action"])){

	if($_GET["action"] == "cambio"){

		echo "Cambio Exitoso";
	
	}

}

?>