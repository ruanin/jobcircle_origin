<?php include 'header.php';
include 'navigation.php';?>

<div class="header-page-title">
			<div class="container">
				<h1><?=$data['title']?></h1>

				<ul class="breadcrumbs">
					<li><a href="#">Home</a></li>
                        <?php for($i=0;$i<count($breadcrumb);$i++) { 

                           if($breadcrumb[$i]['active'] == true){
                               $breadcrumbClass = 'class="active"';
                               $breadcrumbTitle = $breadcrumb[$i]['title'];
                           }else{
                               $breadcrumbClass = '';
                               $breadcrumbTitle = '<a href="'.$breadcrumb[$i]['url'].'">'.$breadcrumb[$i]['title'].'</a>';

                           }

                           ?>
                           <li <?=$breadcrumbClass?>><?=$breadcrumbTitle?></li>
                       <?php } ?>
				</ul>
			</div>
		</div>
    </header>        
<div class="page-content pb0">
    <div class="container">
        <div class="row center-block">
            <div class="col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2 white-container pt30">
                <?php foreach ($data['error'] as $error) { ?>
                    <div class="alert alert-danger" role="alert">
                        <strong>Fehler: </strong> <?=$error?>
                    </div>
                <?php } ?>
            </div> 
        </div>
        <div class="row center-block">			
            <div class="col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2 white-container pt30">    
                <div class="responsive-tabs">
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
                                    <div class="row">
                                        <div class="col-md-12 pt30">
                                            <form name="register" method="POST" action='<?=WEB_URL?>/Candidate/login/'>
                                        <div class="form-group">
                                            <label for="inputEmailLogin" class="col-sm-4 control-label"><strong>Benutzername:</strong></label>
                                            <input type="text" name="email" value="<?=isset($data['email']) && !empty($data['email']) ? $data['email'] : ''?>" class="form-control" id="inputEmailLogin" required placeholder="Benutzername">
                                        </div>
                                        <div class="form-group">
                                            <label for="password_login" class="col-sm-4 control-label"><strong>Passwort:</strong></label>
                                            <input type="password" name="password" class="form-control" id="password_login" required placeholder="Passwort">
                                        </div>
                                        <div class="checkbox">
                                            <label>
                                              <input type="checkbox"> Angemeldet bleiben
                                            </label>
                                        </div>
                                        <div class="css-submit-btn" style="padding-top:40px;">
                                            <button type="submit" class="btn subbtn btn-default pull-right"> Anmelden</button>
                                        </div>

                                    </form>
                                        </div>
                                    
                                    </div>
                                </div> <!-- //portfolio-tab -->

                                <div class="tab-pane <?=isset($data['registerClass']) ? $data['registerClass'] : ''?>" id="register">
                                    <div class="row">
                                        <div class="col-md-12 pt30">
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
                                            <button type="submit" class="btn subbtn btn-default pull-right"> Registrieren</button>
                                        </div>
                                    </form>
                                        </div>
                                    </div>
                                </div> 

                                <div class="tab-pane <?=isset($data['lostpwClass']) ? $data['lostpwClass'] : ''?>" id="lostpassword">
                                    <div class="row">
                                        <div class="col-md-12 pt30">
                                            <h5 class="mt5">Passwort vergessen?</h5>
                                            <p>Geben Sie Ihre E-Mail Adresse, um Ihr Passwort zurückzusetzen.</p>
                                            <form role="form">
                                                <div class="form-group" style="padding-top:10px;">
                                                    <label for="inputEmailLost" class="col-sm-4 control-label"><strong>E-Mail Adresse</strong></label>
                                                    <input type="text" class="form-control" id="inputEmailLost" placeholder="E-Mail Adresse">
                                                </div>
                                                <div class="css-submit-btn" style="padding-top:59px;">
                                                    <button type="submit" class="btn subbtn btn-default pull-right"> Mein Passwort zurücksetzen</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div> <!-- //magazin-tab -->
                            </div> <!-- //tab-content -->
                        </div> <!-- //tab_container -->
                    </div> <!-- //home-tab -->
                </div>
            </div>                                   
        </div>
    </div>
</div>
<?php include 'footer.php'; ?>