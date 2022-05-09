<?php include 'header.php';
include 'navigation.php';?>
<style type="text/css">
            .nav-tabs>li>a, .nav-tabs>li>a:hover, .nav-tabs>li>a:focus {
              color: #F60A0D;
              cursor: default;
              background-color: #fff;
              border:0px;
            }
            .nav-tabs>li>a, .nav-tabs>li>a:hover, .nav-tabs>li>a:focus {
              color: #F60A0D;
              cursor: default;
              background-color: #fff;
              border:0px;
            }

            #tabs.home-tab ul li.active a {
              border-radius     : 0;
              color             : #fff;
              background-color  : #F60A0D;
            }
            .nav-tabs > li {
                margin-bottom: 0px;
            }
            .tab-pane {
                padding-top:15px;
            }

        </style>
<div class="container mt-20">
                        <div class="row center-block">
                            <div class="col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">
                                <div class="tab-area box-wrapper">
                                    <div id="tabs" class="home-tab">
                                        <!-- Nav tabs -->
                                        <ul class="nav nav-tabs">
                                           <li class="<?=isset($data['loginClass']) ? $data['loginClass'] : ''?>"><a href="#login" data-toggle="tab">&nbsp; <strong>Login</strong></a></li>
                                           <li class="<?=isset($data['registerClass']) ? $data['registerClass'] : ''?>"><a href="#register" data-toggle="tab">&nbsp; <strong>Registrieren</strong></a></li>
                                           <li class="<?=isset($data['lostpwClass']) ? $data['lostpwClass'] : ''?>"><a href="#lostpassword" data-toggle="tab">&nbsp; <strong>Passwort vergessen?</strong></a></li>
                                        </ul>

                                        <!-- Tab panes -->
                                        <div class="tab_container">
                                            <div class="tab-content">
                                                <div class="tab-pane <?=isset($data['loginClass']) ? $data['loginClass'] : ''?>" id="login">
                                                    <?php foreach ($data['error'] as $error) { ?>
                                                    <div class="alert alert-danger" role="alert">
                                                        <strong>Fehler: </strong> <?=$error?>
                                                    </div>
                                                    <?php } ?>
                                                    <form name="register" method="POST" action='<?=WEB_URL?>/Candidate/login/'>
                                                        <div class="form-group">
                                                            <label for="inputEmailLogin" class="col-sm-4 control-label"><strong>Benutzername:</strong></label>
                                                            <input type="text" name="username" value="<?=isset($data['email']) && !empty($data['email']) ? $data['email'] : ''?>" class="form-control" id="inputEmailLogin" required placeholder="Benutzername">
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="password_login" class="col-sm-4 control-label"><strong>Passwort:</strong></label>
                                                            <input type="password"   name="pw" class="form-control" id="password_login" required placeholder="Passwort">
                                                        </div>
                                                        <div class="checkbox">
                                                            <label>
                                                              <input type="checkbox"> Angemeldet bleiben
                                                            </label>
                                                        </div>
                                                        <div class="css-submit-btn" style="padding-top:49px;">
                                                            <button type="submit" class="btn medium-btn btn-submit pull-right"> Anmelden</button>
                                                        </div>

                                                    </form>
                                                </div> <!-- //portfolio-tab -->

                                                <div class="tab-pane <?=isset($data['registerClass']) ? $data['registerClass'] : ''?>" id="register">
                                                    <?php foreach ($data['error'] as $error) { ?>
                                                    <div class="alert alert-danger" role="alert">
                                                        <strong>Fehler: </strong> <?=$error?>
                                                    </div>
                                                    <?php } ?>
                                                    <form name="register" method="POST" action='<?=WEB_URL?>/Candidate/register/'>
                                                        <input type="hidden" name="akey" value="<?=isset($data['akey']) && !empty($data['akey']) ? $data['akey'] : ''?>">
                                                        <div class="form-group">
                                                            <label for="inputEmailRegister" class="col-sm-4 control-label"><strong>Benutzername:</strong></label>
                                                            <input name="mail" value='<?=isset($data['email']) && !empty($data['email']) ? $data['email'] : ''?>' class="form-control" id="inputEmailRegister" type="text" required placeholder="E-Mail-Adresse">
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="password_reg" class="col-sm-4 control-label"><strong>Passwort:</strong></label>
                                                            <input name="password" type="password" min="5" class="form-control" id="password_reg"  required placeholder="Passwort erstellen">
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="password_reg_w" class="col-sm-4 control-label"><strong>Passwort wiederholen:</strong></label>
                                                            <input name="password2" type="password" class="form-control" id="password_reg_w" min="5" required placeholder="Passwort bestätigen">
                                                        </div>

                                                        <div class="css-submit-btn">
                                                            <button type="submit" class="btn btn-submit pull-right"> Registrieren</button>
                                                        </div>
                                                    </form>
                                                </div>

                                                <div class="tab-pane <?=isset($data['lostpwClass']) ? $data['lostpwClass'] : ''?>" id="lostpassword">
                                                    <h3>Passwort vergessen?</h3>
                                                    <p>Geben Sie Ihre E-Mail Adresse, um Ihr Passwort zurückzusetzen.</p>
                                                    <form role="form">
                                                        <div class="form-group" style="padding-top:10px;">
                                                            <label for="inputEmailLost" class="col-sm-4 control-label"><strong>E-Mail Adresse</strong></label>
                                                            <input type="text" class="form-control" id="inputEmailLost" placeholder="E-Mail Adresse">
                                                        </div>
                                                        <div class="css-submit-btn" style="padding-top:77px;">
                                                            <button type="submit" class="btn btn-submit pull-right"> Mein Passwort zurücksetzen</button>
                                                        </div>
                                                    </form>
                                                </div> <!-- //magazin-tab -->

                                            </div> <!-- //tab-content -->
                                        </div> <!-- //tab_container -->
                                    </div> <!-- //home-tab -->
                                </div>

                            </div>
                        </div>
</div>
<?php include 'footer.php'; ?>