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
					<h4 class="box-title">Listado de Materias</h4>
					<!-- /.box-title -->
					<table id="example" class="table table-striped table-bordered display" style="width:100%">
						<thead>
							<tr>
                                <th>Materia</th>
                                <th>Maestro</th>
                                <th>Grupo</th>
                                <th>Ver</th>
                                <th>Editar</th>
                                <th>Borrar</th>
							</tr>
						</thead>
						<tbody>
                        <?php

                        $vistaMateria = new MvcController();
                        $vistaMateria -> vistaMateriaController();
                        $vistaMateria -> borrarMateriaController();

                        ?>
                        </tbody>
						<tfoot>
							<tr>
                                <th>Materia</th>
                                <th>Maestro</th>
                                <th>Grupo</th>
                                <th>Ver</th>
                                <th>Editar</th>
                                <th>Borrar</th>
							</tr>
						</tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>