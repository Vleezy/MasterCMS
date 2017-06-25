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
                                    <a href="#tunOn" data-toggle="tab">
                                        <i class="material-icons">power_settings_new</i>
                                        Encender Emulador
                                    <div class="ripple-container"></div></a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                    <div class="card-content">
                        <div class="tab-content">
                            <div class="active tab-pane" id="tunOn">
                            <h4>Encender Emulador</h4>
                                <div id="forerror"></div>
                                <form action="" method="POST" id="turnOnFormulary">
                                    <p>Para poder acceder a esta parte de el Housekeeping primeramente debe de tener el emulador encendido, haga click en el siguiente boton para encenderlo:</p>
                                    <button class="btn btn-success btn-block" type="submit" id="turnOn"><i class="fa fa-paper-plane"></i> Encender emulador</button>
                                </form>
                            </div>
                            <!-- End -->
                        </div>
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
        turnOnForm();
    });
</script>