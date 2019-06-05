<script language="JavaScript">
	function pregunta(e){
        if (!confirm('¿Está seguro de eliminar este registro?')){
            e.preventDefault();
        }
    }
</script>
<div id="wrapper">
	<div class="main-content">
		<div class="row small-spacing">
			<div class="col-xs-12">
				<div class="box-content">
					<h4 class="box-title">Listado de Alumnos</h4>
					<!-- /.box-title -->
					<table id="example" class="table table-striped table-bordered display" style="width:100%">
						<thead>
							<tr>
								<th>Matricula</th>
								<th>Nombre</th>
								<th>Apellido</th>
								<th>Carrera</th>
								<th>Tutor</th>
								<th>Editar</th>
								<th>Borrar</th>
							</tr>
						</thead>
						<tfoot>
							<tr>
								<th>Matricula</th>
								<th>Nombre</th>
								<th>Apellido</th>
								<th>Carrera</th>
								<th>Tutor</th>
								<th>Editar</th>
								<th>Borrar</th>
							</tr>
						</tfoot>
						<tbody>
                        <?php

                        $vistaAlumno = new MvcController();
                        $vistaAlumno -> vistaAlumnoController();
                        $vistaAlumno -> borrarAlumnoController();

                        ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>