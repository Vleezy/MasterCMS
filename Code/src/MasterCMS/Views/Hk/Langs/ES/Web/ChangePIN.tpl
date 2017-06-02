<div class="content">
	<div class="container-fluid">
		<div class="row">
			<div class="col-lg-6 col-md-12">
				<div class="card card-nav-tabs">
                    <div class="card-header" data-background-color="purple">
                    <div class="nav-tabs-navigation">
                        <div class="nav-tabs-wrapper">
                            <span class="nav-tabs-title">Cambiar codigo de:</span>
                            <ul class="nav nav-tabs" data-tabs="tabs">
                                <li class="active">
                                    <a href="#housekeepingP" data-toggle="tab">
                                        <i class="material-icons">web</i>
                                        Housekeeping
                                    <div class="ripple-container"></div></a>
                                </li>
                                <li>
                                    <a href="#clientP" data-toggle="tab">
                                        <i class="material-icons">videogame_asset</i>
                                        Client
                                    <div class="ripple-container"></div></a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                    <div class="card-content">
                        <div class="tab-content">
                            <div class="active tab-pane" id="housekeepingP">
                            	<h4>Cambiar codigo de seguridad de Housekeeping</h4>
                            	<div id="forerror"></div>
		                        <form action="" method="POST" id="editPINFormulary">
									<div class="form-group label-floating">
					                    <label for="oldpin" class="control-label">C&oacute;digo de seguridad anterior</label>
					                    <input type="password" class="form-control" id="oldpin" name="oldpin" autocomplete="off" maxlength="30">
					                    <span class="help-block">Escriba su codigo de seguridad anterior, ejemplo: <strong>******</strong></span>
					                </div>
					                <div class="form-group label-floating">
					                    <label for="pin" class="control-label">Nuevo c&oacute;digo de seguridad</label>
					                    <input type="password" class="form-control" id="pin" name="pin" autocomplete="off" maxlength="30">
					                    <span class="help-block">Escriba su nuevo codigo de seguridad, ejemplo: <strong>******</strong></span>
					                </div>
					                <div class="form-group label-floating">
					                    <label for="rpin" class="control-label">Repetir c&oacute;digo de seguridad</label>
					                    <input type="password" class="form-control" id="rpin" name="rpin" autocomplete="off" maxlength="30">
					                    <span class="help-block">Repita su nuevo codigo de seguridad, ejemplo: <strong>******</strong></span>
					                </div>
					                <button class="btn btn-primary btn-block" type="submit" id="editPIN"><i class="fa fa-paper-plane"></i> Cambiar</button>
					            </form>	
                            </div>

                            <div class="tab-pane" id="clientP">
                            	<h4>Cambiar codigo de seguridad de Client</h4>
                            	<div id="forerror2"></div>
		                        <form action="" method="POST" id="editClientPINFormulary">
									<div class="form-group label-floating">
					                    <label for="oldpin" class="control-label">C&oacute;digo de seguridad anterior</label>
					                    <input type="password" class="form-control" id="oldpin" name="oldpin" autocomplete="off" maxlength="30">
					                    <span class="help-block">Escriba su codigo de seguridad anterior, ejemplo: <strong>******</strong></span>
					                </div>
					                <div class="form-group label-floating">
					                    <label for="pin" class="control-label">Nuevo c&oacute;digo de seguridad</label>
					                    <input type="password" class="form-control" id="pin" name="pin" autocomplete="off" maxlength="30">
					                    <span class="help-block">Escriba su nuevo codigo de seguridad, ejemplo: <strong>******</strong></span>
					                </div>
					                <div class="form-group label-floating">
					                    <label for="rpin" class="control-label">Repetir c&oacute;digo de seguridad</label>
					                    <input type="password" class="form-control" id="rpin" name="rpin" autocomplete="off" maxlength="30">
					                    <span class="help-block">Repita su nuevo codigo de seguridad, ejemplo: <strong>******</strong></span>
					                </div>
					                <button class="btn btn-primary btn-block" type="submit" id="editClientPIN"><i class="fa fa-paper-plane"></i> Cambiar</button>
					            </form>	
                            </div>
                        </div>
                    </div>
                </div>
			</div>
        </div>
	</div>
</div>
</div>
</div>
<script type="text/javascript" src="{@hk_cdn}/js/forms/dashboardPin.js"></script>
<script type="text/javascript">
    $(document).ready(function() {
        editPINForm();
        editClientPINForm();
    });
</script>