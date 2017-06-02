<main id="lg">
    <div class="container-fluid">
        <div class="row gutter-10">
            <div class="col-lg-12">
                <div id="warBanner">
                    <i class="fa fa-exclamation-triangle fa-5x float-left" aria-hidden="true"></i>
                    <p><b>Do not share your private information with anyone!</b><br/>You never know who is plotting the one behind your computer screen.<br>If something strange happens to your account, immediately inform a user of the staff, we do everything possible so that you can enjoy a safe stay at the hotel.</p>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="Box">
                    <ul id="leftMenu_C">
                        <li class="navButton lf_Selected" data-target="#contGeneral">
                            <i class="fa fa-cog fa-2x float-left" aria-hidden="true"></i>
                            <h3>General Settings</h3>
                            <span>Basic information of your user...</span>
                        </li>
                        <?php if (!$this->users->get('facebook_account')) { ?>
                            <li class="navButton" data-target="#contMail">
                                <i class="fa fa-envelope fa-2x float-left" aria-hidden="true"></i>
                                <h3>Email</h3>
                                <span>Change your Email...</span>
                            </li>
                            <li class="navButton" data-target="#contPassword">
                                <i class="fa fa-unlock-alt fa-2x float-left" aria-hidden="true"></i>
                                <h3>Password</h3>
                                <span>Change your password...</span>
                            </li>
                        <?php } ?>
                        <li class="navButton" data-target="#contAccount">
                            <i class="fa fa-times fa-2x float-left" aria-hidden="true"></i>
                            <h3>Delete account</h3>
                            <span>Delete your account...</span>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-8">
                <div class="Box boxCont" id="contGeneral">
                    <div class="boxTitle">General Settings <i class="fa fa-cog fa-2x float-right" style="font-size:1.5rem" aria-hidden="true"></i></div>
                    <div class="boxContent">
                        <form method="POST" action="" id="generalFormulary">
                            <!-- <label for="mottoUpdate">Misión:</label>
                            <p>Mensaje representado en el hotel abajo de su avatar.</p>
                            <input type="text" name="motto">
                            <br /><br /> -->
                            <label for="letters">Font color:</label>
                            <p>Choose the color of the letters in your chat.</p>
                            <select name="chat_color" id="letters">
                                <option value="0"<?php if ($this->users->get('chat_color') == 0) { echo ' selected'; } ?>>Any</option>
                                <option value="blue"<?php if ($this->users->get('chat_color') == '@blue@') { echo ' selected'; } ?>>Blue</option>
                                <option value="green"<?php if ($this->users->get('chat_color') == '@green@') { echo ' selected'; } ?>>Green</option>
                                <option value="red"<?php if ($this->users->get('chat_color') == '@red@') { echo ' selected'; } ?>>Pink</option>
                                <option value="cyan"<?php if ($this->users->get('chat_color') == '@cyan@') { echo ' selected'; } ?>>Cyan</option>
                                <option value="purple"<?php if ($this->users->get('chat_color') == '@purple@') { echo ' selected'; } ?>>Purple</option>
                            </select>
                            <hr>
                            <label>Friend requests</label>
                            <p>Can other {@name} s send you friend requests?</p>
                            <div id="radioFR" class="buttonSet">
                                <input type="radio" id="radioFR1" name="allowfr" value="0"<?php if (!$this->users->get('block_newfriends')) { echo ' checked'; } ?>><label for="radioFR1">Yes</label>
                                <input type="radio" id="radioFR3" name="allowfr" value="1"<?php if ($this->users->get('block_newfriends')) { echo ' checked'; } ?>><label for="radioFR3">No</label>
                            </div>
                            <hr>
                            <label>Tradear</label>
                            <p>¿Other {@name} s can trade with you?</p>
                            <div id="radioTR" class="buttonSet">
                                <input type="radio" id="radioTR1" name="allowtr" value="0"<?php if (!$this->users->get('block_trade')) { echo ' checked'; } ?>><label for="radioTR1">Yes</label>
                                <input type="radio" id="radioTR3" name="allowtr" value="1"<?php if ($this->users->get('block_trade')) { echo ' checked'; } ?>><label for="radioTR3">No</label>
                            </div>
                            <hr>
                            <label>Private Profiles</label>
                            <p>Can other {@name} s view your profile?</p>
                            <div id="radioPR" class="buttonSet">
                                <input type="radio" id="radioPR1" name="allowpr" value="0"<?php if (!$this->users->get('block_view_profile')) { echo ' checked'; } ?>><label for="radioPR1">Yes</label>
                                <input type="radio" id="radioPR3" name="allowpr" value="1"<?php if ($this->users->get('block_view_profile')) { echo ' checked'; } ?>><label for="radioPR3">No</label>
                            </div>
                            <hr>
                            <label>Old Chat</label>
                            <p>Do you like the old {@name} chat?</p>
                            <div id="radioVE" class="buttonSet">
                                <input type="radio" id="radioVE1" name="oldchat" value="1"<?php if ($this->users->get('prefer_old_chat')) { echo ' checked'; } ?>><label for="radioVE1">Yes</label>
                                <input type="radio" id="radioVE3" name="oldchat" value="0"<?php if (!$this->users->get('prefer_old_chat')) { echo ' checked'; } ?>><label for="radioVE3">No</label>
                            </div>
                            <hr>
                            <label>Ignore invitations per console</label>
                            <p>Do you want to receive invitations per console?</p>
                            <div id="radioOS" class="buttonSet">
                                <input type="radio" id="radioOS1" name="invitations" value="1"<?php if ($this->users->get('ignoreRoomInvitations')) { echo ' checked'; } ?>><label for="radioOS1">Yes</label>
                                <input type="radio" id="radioOS3" name="invitations" value="0"<?php if (!$this->users->get('ignoreRoomInvitations')) { echo ' checked'; } ?>><label for="radioOS3">No</label>
                            </div>
                            <hr>
                            <label>Focus user</label>
                            <p>Do you want to focus users inside the hotel?</p>
                            <div id="radioEN" class="buttonSet">
                                <input type="radio" id="radioEN1" name="focus" value="0"<?php if (!$this->users->get('dontfocususers')) { echo ' checked'; } ?>><label for="radioEN1">Yes</label>
                                <input type="radio" id="radioEN3" name="focus" value="1"<?php if ($this->users->get('dontfocususers')) { echo ' checked'; } ?>><label for="radioEN3">No</label>
                            </div>
                            <hr>
                            <input type="submit" class="btn btn-success btn-radius" value="Save" name="general" id="generalButton">
                        </form>
                    </div>
                </div>
                <?php if (!$this->users->get('facebook_account')) { ?>
                <div class="Box boxCont" id="contMail" style="display:none;">
                    <div class="boxTitle">Email <i class="fa fa-envelope fa-2x float-right" style="font-size:1.5rem" aria-hidden="true"></i></div>
                    <div class="boxContent">
                        <form method="POST" action="" id="mailFormulary">
                            <label for="oldMail">old Email:</label>
                            <p>Please enter your old email address to verify your account.</p>
                            <input type="mail" id="oldMail" name="oldmail">
                            <hr>
                            <label for="newMail">New e-mail adress:</label>
                            <p>Enter your new email address.</p>
                            <input type="mail" id="newMail" name="newmail">
                            <hr>
                            <label for="newMailRepeat">Repeat email:</label>
                            <p>Enter your new email address again to avoid typing errors.</p>
                            <input type="mail" id="newMailRepeat" name="rnewmail">
                            <hr>
                            <input type="submit" class="btn btn-success btn-radius" value="Save" name="mail" id="mailButton">
                        </form>
                    </div>
                </div>
                <div class="Box boxCont" id="contPassword" style="display:none;">
                    <div class="boxTitle">Password <i class="fa fa-unlock-alt fa-2x float-right" style="font-size:1.5rem" aria-hidden="true"></i></div>
                    <div class="boxContent">
                        <form method="POST" action="" id="passwordFormulary">
                            <label for="oldPassword">Old password:</label>
                            <p>This is necessary to verify that you are the owner of the account.</p>
                            <input type="password" id="oldPassword" name="oldpassword">
                            <hr>
                            <label for="newPassword">New password:</label>
                            <p>Your new password must contain at least - characters.</p>
                            <input type="password" id="newPassword" name="newpassword">
                            <label for="newPasswordRepeat">Repeat your new password:</label>
                            <p>To avoid typing errors.</p>
                            <input type="password" id="newPasswordRepeat" name="rnewpassword">
                            <hr>
                            <input type="submit" class="btn btn-success btn-radius" value="Save" name="password" id="passwordButton">
                        </form>
                    </div>
                </div>
                <?php } ?>
                <div class="Box boxCont" id="contAccount" style="display:none;">
                    <div class="boxTitle">Delete account <i class="fa fa-times fa-2x float-right" style="font-size:1.5rem" aria-hidden="true"></i></div>
                    <div class="boxContent">
                        <form method="POST" action="" id="deleteFormulary">
                            <h3>Are you sure you want to delete your account?<br></h3>
                            <p><i>If you delete it you will lose everything inside the hotel.</i></p>
                            <div class="togglebutton">
                                <label class="agb">
                                <input type="checkbox" name="accept" value="1"><span class="toggle"></span>I Accept the consequences of deleting my account
                                </label>
                            </div>
                            <hr>
                            <input type="submit" class="btn btn-danger btn-radius" value="Delete account" name="delete" id="deleteButton">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>