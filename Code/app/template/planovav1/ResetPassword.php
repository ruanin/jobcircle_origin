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
                    <h1 class="bs-title">PASSWORT ZURÜCKSETZEN</h1>	
                    <?php if(!empty($data['success'])){ ?>
                        <div class="alert alert-success pl-form">
                            <strong><?=$data['success']?></strong>
                        </div>
                    <?php } ?>
                    <?php if(!empty($data['error'])){ ?>
                        <div class="alert alert-danger pl-form" role="alert">
                            <strong>Fehler: </strong> <?=$data['error']?>
                        </div>
                    <?php } ?>
                    <?php if(!empty($data['token']) && $data['tokenerror'] === false && empty($data['success'])){ ?>
                    <form id="login-form" class="pl-form" action="<?= WEB_URL ?>/Candidate/passwortzuruecksetzen" method="post">
                        <input type="hidden" name="task" id="task" value="changePassword" />
                        <input type="hidden" name="token" id="token" value="<?=$data['token']?>" />
                        <div class="form-group">
                            <label for="email" class="text-info">Passwort</label><br>
                            <input type="password" name="newPassword" id="newPassword" class="form-control" value="" placeholder="Passwort"/>
                        </div>
                        <div class="form-group">
                            <label for="email" class="text-info">Passwort bestätigen</label><br>
                            <input type="password" name="newPasswordConfirm" id="newPasswordConfirm" class="form-control" value="" placeholder="Passwort bestätigen" />
                        </div>
                        <button type="submit" name="submit" class="btn pl-btn-cmmn" id="login">Zurücksetzen</button>                   
                    </form> 
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>
    <!-- Anmelden Form Ends -->

<?php include 'footer.php'; ?> 

