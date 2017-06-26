<div class="content">
	<div class="container-fluid">
		<div class="row">
			<div class="col-lg-6 col-md-12">
				<div class="card card-nav-tabs">
                    <div class="card-header" data-background-color="purple">
                    <div class="nav-tabs-navigation">
                        <div class="nav-tabs-wrapper">
                            <span class="nav-tabs-title">Acciones:</span>
                            <ul class="nav nav-tabs" data-tabs="tabs">
                                <li class="active">
                                    <a href="#senCom" data-toggle="tab">
                                        <i class="material-icons">settings_ethernet</i>
                                        Consola
                                    <div class="ripple-container"></div></a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                    <div class="card-content">
                        <div class="tab-content">
                            <div class="active tab-pane" id="senCom">
                            <h4>Consola</h4>
                                <form action="" method="POST" id="sendCommandFormulary">
                                	<div id="consoleResponse">
                                		
                                	</div>
                                    <div class="form-group label-floating" id="commandF">
					                    <label for="command" class="control-label">Comando</label>
					                    <input type="text" class="form-control typeahead" id="command" name="command" autocomplete="off">
					                    <span class="help-block">Escriba un comando para ejecutar en el emulador, ejemplo: <strong>update_catalog</strong></span>
					                </div>
                                    <button class="btn btn-success btn-block" type="submit" id="sendCommand"><i class="fa fa-paper-plane"></i> Enviar</button>
                                </form>
                            </div>
                            <!-- End -->
                        </div>
                    </div>
                </div>
			</div>
            <div class="col-md-12 col-lg-6">
                <div class="card">
                    <div class="card-header" data-background-color="red">
                        <h4 class="title">Advertencias / Consejos</h4>
                        <p class="category">A continuaci&oacute;n le dejamos una lista de advertencias/consejos que deberas tomar en cuenta antes de modificar esta secci&oacute;n:</p>
                    </div>
                    <div class="card-content">
                    	<div id="forerror"></div>
                        <ul>
                            <li>Si no sabe lo que hace, no mueva nada de lo que hay aqui dentro.</li>
                            <li>Recuerda que el sistema de encender emulador esta en face beta, si no te enciende el emuladdor intentelo desde su servidor interno.</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
	</div>
</div>
</div>
</div>
<script type="text/javascript" src="{@hk_cdn}/js/forms/dashboardEmulator.js"></script>
<script type="text/javascript">
    $(document).ready(function() {
        sendCommandForm();
    });
</script>