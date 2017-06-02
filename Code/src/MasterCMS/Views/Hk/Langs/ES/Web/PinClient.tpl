<div class="content">
	<div class="container-fluid">
		<div class="row">
			<div class="col-lg-6 col-md-12">
				<div class="card">
                    <div class="card-header" data-background-color="purple">
                        <h4 class="title">C&oacute;digo de seguridad</h4>
                        <p class="category">Para acceder a esta zona exclusiva para administraci&oacute;n de <b>{@name}</b>, debe ingresar su c&oacute;digo de seguridad:</p>
                    </div>
                    <div class="card-content table-responsive">
	                    <div id="forerror"></div>
						<form action="" method="POST" id="pinFormulary">
			                <div class="form-group label-floating">
			                    <label for="pin" class="control-label">C&oacute;digo de seguridad</label>
			                    <input type="password" class="form-control" id="pin" name="pin" autocomplete="off" maxlength="30">
			                    <span class="help-block">Escribe un nuevo c&oacute;digo de seguridad, ejemplo: <strong>******</strong></span>
			                </div>
			                <button class="btn btn-raised btn-primary btn-block" type="submit" id="submitpin"><i class="fa fa-paper-plane"></i> Acceder</button>
			            </form>	
                    </div>
                </div>
			</div>
		</div>
	</div>
</div>
</div>
</div>
<script type="text/javascript" src="{@hk_cdn}/js/forms/submitPinClient.js"></script>