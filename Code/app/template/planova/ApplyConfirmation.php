<?php 
include 'header.php';
include 'navigation.php';?>
<link rel="stylesheet" href="<?=WEB_URL?>/tmpl_planova/css/wizard.css">
<div class="container mt-20">
    <div class="row">
        <div class="col-md-3 less-pad-right">
            <div class="box-wrapper">
                <div class="single-page-item">										
                    <h3><span>Login</span></h3>
                    <form role="form">
                        <div class="form-group">
                            <label for="inputEmail3" class="col-sm-4 control-label">Benutzername:</label>
                            <input type="text" class="form-control" id="inputEmail3" placeholder="Benutzername" required />
                        </div>
                        <div class="form-group">
                            <label for="inputPassword3" class="col-sm-4 control-label">Passwort:</label>
                            <input type="password" class="form-control" id="inputPassword3" placeholder="Passwort" required />
                        </div>
                        <div class="checkbox">
                            <label>
                              <input type="checkbox"> Angemeldet bleiben
                            </label>
                        </div>
                        <div class="css-submit-btn">
                            <button type="submit" class="btn btn-submit"> Anmelden</button>
                        </div>
                    </form>
                    <ul id="css_ul">
                        <li><a href="">Benutzername vergessen?</a></li>
                        <li><a href="">Passwort vergessen?</a></li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="col-md-9">
            <div class="box-wrapper">
                <div class="single-page-item">
                    <h1>Vielen Dank!</h1>
                    <p>
                        Ihr Bewerbung wurde erfolgreich versendet. Sie können den Status der Bewerbung verfolgen, indem Sie sich registrieren lassen.
                    </p>
                    <div style="margin-top: 20px; margin-bottom: 40px;" id="registerForm">
                        <form id="registerAfterApplication" action="#" class="form-horizontal" method="POST">
                            <input type="hidden" name="task" id="task" value="createAccount" />
                            <div class="panel-group" id="1">
                                <div class="panel panel-default panel-faq">
                                    <div class="panel-heading">
                                        <a data-toggle="collapse" data-parent="#1" href="#section1" onclick="$('#login_email').attr('disabled', true); $('#login_email').removeAttr('required'); $('#login_telefon').removeAttr('disabled'); $('#login_telefon').attr('required', true);">
                                            <h4 class="panel-title">
                                                Via Mobile
                                            </h4>
                                        </a>
                                    </div>

                                    <div id="section1" class="panel-collapse <?=empty($data['email']) && (!empty($data['phone']) || !empty($data['mobile'])) ? 'in': 'collapse'?>">
                                        <div class="panel-body">	
                                            <p>Bitte geben Sie Ihre Handynummer ein und klicken Sie auf Weiter. Sie dient als Benutzername für Ihr neues my planova Konto.Anschliessend erhalten Sie einen Code per SMS.</p>
                                            <div class="form-group">
                                                <label for="login_telefon" class="col-sm-3 control-label">
                                                    Mobile:
                                                </label>
                                                <div class="col-sm-4">	
                                                    <input class="form-control" id="login_telefon" name="login_telefon" value="<?=!empty($data['phone']) ? $data['phone']: !empty($data['mobile']) ? $data['mobile'] : ''?>" size="30" placeholder="Mobile" type="tel" required/>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-sm-3 control-label" for="login_tel_password_1">Passwort:<span class="star">&nbsp;*</span></label>	
                                                <div class="col-sm-4">			
                                                    <input class="form-control" id="login_tel_password_1" name="login_tel_password" value="" placeholder="Passwort" type="password" required/>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-sm-3 control-label" for="login_tel_password_confirm_1">Passwort bestätigen:<span class="star">&nbsp;*</span></label>	
                                                <div class="col-sm-4">			
                                                    <input class="form-control" id="login_tel_password_confirm_1" name="login_tel_password_confirm" value="" placeholder="Passwort bestätigen" type="password"  required/>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="col-sm-4 col-sm-offset-3">
                                                    <button type="submit" class="btn btn-submit pull-left"> Registrieren</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="panel panel-default panel-faq">
                                    <div class="panel-heading">
                                        <a data-toggle="collapse" data-parent="#1" href="#section2" onclick="$('#login_telefon').attr('disabled', true); $('#login_telefon').removeAttr('required'); $('#login_email').removeAttr('disabled'); $('#login_email').attr('required', true);">
                                            <h4 class="panel-title">
                                                Via E-Mail
                                            </h4>
                                        </a>
                                    </div>

                                    <div id="section2" class="panel-collapse <?=!empty($data['email']) || (empty($data['phone']) || empty($data['mobile'])) ? 'in': 'collapse'?>">
                                        <div class="panel-body">
                                            <p>
                                                Bitte geben Sie Ihre E-Mail-Adresse ein und klicken Sie auf Weiter. Sie dient als Benutzername für Ihr neues my planova Konto.
                                            </p>
                                            <div class="form-group">
                                                <label for="login_email" class="col-sm-3 control-label">
                                                    E-Mail:
                                                </label>
                                                <div class="col-sm-4">	
                                                    <input class="form-control" id="login_email" name="login_email" value="<?=!empty($data['email']) ? $data['email']: ''?>" placeholder="E-Mail" type="email" required/>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-sm-3 control-label" for="login_email_password_1">Passwort:<span class="star">&nbsp;*</span></label>	
                                                <div class="col-sm-4">			
                                                    <input class="form-control" id="login_email_password_1" name="login_email_password" value="" placeholder="Passwort" type="password" required/>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-sm-3 control-label" for="login_email_password_confirm_1">Passwort bestätigen:<span class="star">&nbsp;*</span></label>	
                                                <div class="col-sm-4">			
                                                    <input class="form-control" id="login_email_password_confirm_1" name="login_email_password_confirm" value="" placeholder="Passwort bestätigen" type="password"  required/>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="col-sm-4 col-sm-offset-3">
                                                    <button type="submit" class="btn btn-submit pull-left"> Registrieren</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div> 
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include 'footer.php'; ?>