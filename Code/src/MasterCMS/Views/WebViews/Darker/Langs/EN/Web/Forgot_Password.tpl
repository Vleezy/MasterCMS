<main>
    <div class="Box">
    	<div class="boxTitle">Change your password</div>
        <div class="boxContent">    	
            <div class="container">
			    <h3>Change your password</h3>
				<p>To end the procedure for recovering your password type a new one</p>
				<hr>
				<div id="forerror"></div>
				<form action="" method="POST" id="forgotFormulary">
	                <div class="form-group label-floating">
	                    <label for="password" class="control-label">New Password</label>
	                    <input type="password" class="form-control" id="password" name="password" autocomplete="off" maxlength="15">
	                    <span class="help-block">Enter a new password, example: <strong>******</strong></span>
	                </div>
	                <div class="form-group label-floating">
	                    <label for="rpassword" class="control-label">Repeat password</label>
	                    <input type="password" class="form-control" id="rpassword" name="rpassword" autocomplete="off" maxlength="15">
	                    <span class="help-block">Repeat your new password, example: <strong>******</strong></span>
	                </div>
	                <hr>
	                <button class="btn btn-lg btn-raised btn-success btn-block btn-radius" type="submit" id="forgot"><i class="fa fa-paper-plane"></i> Update Password</button>
	            </form>	
            </div>
        </div>
    </div>
</main>