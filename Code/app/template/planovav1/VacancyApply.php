<?php include 'header.php'; 
$classVacancy = 'active';
$classSubPageVacancyBoard = 'active';
include 'navigation.php'; ?>
<div class="pl-cmmn-cnt-section">
    <div class="pl-arb-finden">
        <h1 class="bs-title">BEWERBUNG</h1>	
        <div class="pl-stepper-data">
            <div class="row setup-content step-reg-step1 pl-step-final">
                <div class="container">
                    <?php if(!empty($data['error'])) { ?>
                    <div class="alert alert-danger" role="alert">
                        <strong>Fehler: </strong> <?=$data['error']?>
                    </div>
                    <?php }else{ ?>
                    <h1>Vielen Dank für Ihre Bewerbung!</h1>
                    <a href="<?= WEB_URL ?>/Vacancyboard" class="pl-btn-cmmn pl-cust-btn-step mt-5">weiter suchen</a>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>
<?php include 'footer.php'; ?>