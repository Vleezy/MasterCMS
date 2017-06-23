<?php

    if ($this->hotel->getConfig('maintenance')) {
        if (!$this->hotel->getConfig('maintenance_description')) {
            $this->hotel->setConfig('maintenance_description', '<p>Hello! Do not worry <b>{@name}</b> Will return very soon. We are polishing some things to improve your experience. Be patient, we will soon be available again.</p>');
            $this->setParam('maintenance_description', '<p>' . $this->hotel->getConfig('maintenance_description') . '</p>');
        } else {
            $this->setParam('maintenance_description', '<p>' . $this->hotel->getConfig('maintenance_description') . '</p>');
        }
    }

?>
<main>
   <div class="boxContent">
		<div class="container">
			<div class="row no-gutters">
				<div class="col-lg-5">
					<section id="loginBox">
						<form method="POST" id="loginFormulary">
							<h1 class="display-4">Login</h1>
							<label for="username">Username</label>
							<input type="text" id="username" name="username">
							<label for="password">Password</label>
							<input type="password" id="password" name="password">
							<label class="float-left"><input type="checkbox" name="remember" value="remember"><span class="toggle"></span> Save Changes</label>
							<a href="#" id="forgotText" class="float-right"  data-toggle="modal" data-target="#forgotModal">¿Did you forget your password?</a>							
							<button type="submit" class="btn btn-success btn-lg" id="login">Log in</button>
							<button class="btn btn-primary btn-lg"><a href="{@fbLoginUrl}">Login with Facebook</a></button>
                        </form>
                    </section>
                </div>
                <div class="col-lg-7">
                    <aside id="asideBox">
                        <div id="WelcomeText">
                        <h4>Maintenance</h4>
                        <p><?php echo $maintenance_description; ?></p>
                        </div>
                        <div id="WelcomeAvatar">
                            <div id="wavAvatar" class="hidden-sm-down" style="background-image:url(http://www.habbo.es/habbo-imaging/avatarimage?figure=figure=hr-893-1036.hd-209-1.ch-3030-82.lg-275-92.sh-295-110.ha-1012&amp;gesture=sml&amp;size=l&amp;direction=4&amp;head_direction=3&amp;action=wav)"> </div>
                        </div>
                    </aside>
                </div>
            </div>
        </div>
    </div>
    <section id="infoBoxes">
		<div class="infoBox">
			<div class="infoImage" style="background:url({@cdn}/Images/Credits.png) center"></div>
			<p>The credits are completely free !, you can get them for your activity in the hotel.</p>
		</div>
		<div class="infoBox">
			<div class="infoImage" style="background:url({@cdn}/Images/Create.png) center"></div>
			<p>Create your own rooms and let your imagination fly to the limit.</p>
		</div>
		<div class="infoBox">
			<div class="infoImage" style="background:url({@cdn}/Images/Community.png) center"></div>
			<p>You can win great prizes at our fun staff events!</p>
		</div>
	</section>
</main>

<div class="modal fade" id="forgotModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Recover password</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close" style="color:white;"><span aria-hidden="true">&times;</span></button>
			</div>
			<div class="modal-body">
				<form action="" id="forgotFormulary"> 
					<label for="fmail">Please enter your <strong>email</strong></label><bR>
					<input type="mail" id="fmail" name="mail" minlength="4" autocomplete="off">
					<button type="submit" class="btn btn-success btn-radius" id="forgot">Recover account</button>
				</form>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-danger btn-radius" data-dismiss="modal">Close</button>
			</div>
		</div>
	</div>
</div>