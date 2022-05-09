<?php
include 'header.php';
$classHome = 'class="active"'; // •
include 'navigation.php';


?>

<div class="pl-cmmn-cnt-section">
		 
    <!-- Anmelden Form Test -->
    <div class="pl-lg-frm">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="bs-title">ANMELDEN</h1>	
                    
                    <form id="login-form" class="pl-form" action="<?= WEB_URL ?>/Candidate/login" method="post">
                        <?php foreach ($data['error'] as $error) { ?>
                        <div class="alert alert-danger" role="alert">
                            <strong>Fehler: </strong> <?=$error?>
                        </div>
                        <?php } ?>
                        <div class="form-group">
                            <label for="email" class="text-info">E-Mail-Adresse*</label><br>
                            <input type="text" name="email" id="email" class="form-control" value="<?=isset($data['email']) && !empty($data['email']) ? $data['email'] : ''?>" />
                        </div>
                        <div class="form-group">
                            <label for="password" class="text-info">Passwort*</label> <a href="<?= WEB_URL ?>/Candidate/passwortvergessen" class="float-right pl-fgt-pwd">Passwort vergessen?</a><br>
                            <input type="password" name="password" id="password" class="form-control">
                        </div>
                        <div class="form-group">                     
                            <div class="custom-control custom-checkbox pl-cust-checkbox">
                                    <input type="checkbox" class="custom-control-input" id="customCheck1">
                                    <label class="custom-control-label" for="customCheck1">Angemeldet bleiben</label>
                            </div>
                        </div>     
                        <button type="submit" name="submit" class="btn pl-btn-cmmn" id="login">Anmelden</button>                   
                        <a href="/Candidate/registerWizard" class="btn pl-btn-cmmn">Registrieren</a>
                    </form>
                    <p>Indem Sie sich bei Ihrem Konto anmelden, stimmen Sie den Nutzungsbedingungen von planova zu und erklären sich mit den Richtlinien zur Verwendung von Cookies und der <a href="<?= WEB_URL ?>/Pages/Datenschutz" class="pl-link">Datenschutzerklärung</a> einverstanden.</p>                        
                </div>
            </div>
        </div>
    </div>
    <!-- Anmelden Form Ends -->

<?php include 'footer.php'; ?> 

