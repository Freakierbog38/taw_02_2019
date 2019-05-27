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
					<h4 class="box-title">Listado de clientes</h4>
					<!-- /.box-title -->
					<table id="example" class="table table-striped table-bordered display" style="width:100%">
						<thead>
							<tr>
								<th>Cliente</th>
								<th>Habitación</th>
								<th>Noches</th>
								<th>Fecha inicio</th>
                                <th>Fecha terminación</th>
                                <th>Total</th>
							</tr>
						</thead>
						<tfoot>
							<tr>
                                <th>Cliente</th>
								<th>Habitación</th>
								<th>Noches</th>
								<th>Fecha inicio</th>
                                <th>Fecha terminación</th>
                                <th>Total</th>
							</tr>
						</tfoot>
						<tbody>
                        <?php

                        $vistaCliente = new MvcController();
                        $vistaCliente -> vistaReservacionController();
                        $vistaCliente -> borrarReservacionController();

                        ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>