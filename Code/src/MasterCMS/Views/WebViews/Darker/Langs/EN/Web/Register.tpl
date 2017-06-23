<main>
    <div class="boxContent">
        <form method="post" id="registerFormulary">
            <section id="registerBox">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-6">
                            <label for="username">Username</label>
                            <input type="text" name="username" id="username">
                            <p>Be creative, you will not be able to change your name later!</p>
                            <label for="password">Password</label>
                            <input type="password" name="password" id="password">
                            <p>Remember not to share your password with anyone!</p>
                            <label for="rpassword">Repeat your password</label>
                            <input type="password" name="rpassword" id="rpassword">
                            <p>Repeat your password to make sure you have spelled it correctly</p>
                            <div class="clear"></div>
                            <label for="mail">Email</label>
                            <input type="email" name="mail" id="mail">
                            <p>Your email address is very important in case you forget your password</p>
                        </div>
                        <div class="col-lg-6">
                            <label for="rmail">Repeat your email</label>
                            <input type="email" name="rmail" id="rmail">
                            <p>Repeat your email to avoid errors</p>
                            <label for="gender">Your gender</label>
                            <select name="gender" id="gender">
                                <option value="0" disabled="" selected>Gender</option>
                                <option value="M">Male</option>
                                <option value="F">Female</option>
                            </select>
                            <p>Select your gender</p>                            
                            <label for="agb" class="agb">
                                <input type="checkbox" name="terms" value="1" id="agb"> I accept the <a href="{@url}/web/terms" target="_blank">Terms and Conditions</a>
                            </label>
                            <button type="submit" class="btn btn-success btn-lg" id="register">Register</button>
                            <button class="btn btn-primary btn-lg"><a href="{@fbLoginUrl}">Register with Facebook</a></button>                            
                            <button class="btn btn-danger btn-lg"><a href="/">Cancel</a></button>
                        </div>
                    </div>
                </div>
            </section>
        </form>
    </div>
</main>