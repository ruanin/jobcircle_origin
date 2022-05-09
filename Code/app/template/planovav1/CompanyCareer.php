<?php include 'header.php';
$classAbout = 'active'; 
include 'navigation.php'; ?>
<div class="pl-cmmn-cnt-section">
    <!-- Ueber Planova Content -->
    <div class="pl-ueber">
        <h1 class="bs-title">ÜBER PLANOVA</h1>				
        <div class="pl-ueber-tab-sect">
                <div class="container">
                        <div class="pl-ueber-sub-mnu">
                                <a class="mnu-nav-item" href="<?= WEB_URL ?>/Pages/fachbereiche">FACHBEREICHE</a>
                                <a class="mnu-nav-item" href="<?= WEB_URL ?>/Pages/qualitaet">QUALITÄTSANSPRUCH</a>
                                <a class="mnu-nav-item pl-ueber-active" href="#">KARRIERE BEI PLANOVA</a>
                        </div>
                </div>
        </div>

        <div class="pl-ueber-cnt-sect">
                <div class="container">
                        <h3 class="pl-semibold">KARRIERE BEI PLANOVA</h3>
                        <h5 class="pl-sm-txt">planova wächst!</h5>
                        <img src="<?= WEB_URL ?>/tmpl_planovav1/images/karriere-bei-planova.jpg" alt="Personalvermittlung Schweiz Personalvermittlung Personalberatung Personalverleih Personaldienstleister Rersonalrekrutierung Personal Management Mitarbeiter Rekrutierung Human Capital Management" class="img-fluid"/>
                        <div class="pl-para-cnt">
                                <p>planova ist mehr als ein Personaldienstleister - wir sind Menschen mit gleichen Zielen und ähnlichen Werten. Zugegeben: nicht jeder passt zu uns. Aber wenn es passt, dann sind Sie Teil eines Teams, das viel auf dem Schweizer Arbeitsmarkt bewegt. Wir wissen, dass Menschen unterschiedlich sind. Wir fordern Leistung und fördern Qualifikationen. Als Unternehmen, das sich ausschliesslich mit dem Rekrutieren von Mitarbeitern beschäftigt, haben wir ein Auge für „versteckte Talente“ und ebnen den Weg für dauerhafte Karrieren. Nutzen Sie die Chance und bewerben Sie sich auf die untenstehenden Vakanzen.</p>
                        </div>						
                </div>
        </div>
        <div class="pl-arb-finden-srch">
                <div class="container">
                <?php foreach ($data['internalVac'] as $internalJob) { ?>
                    <div class="pl-arb-finden-result">
                        <div class="pl-arb-name">
                            <p class="pl-md-heading"><a href="/Vacancyboard/Detail/<?= $internalJob->vac_info_id; ?>"><?= $internalJob->jobtitle; ?></a> <span class="pl-star-icon pl-book"><i class="fa fa-star-o" aria-hidden="true"></i></span></p>
                            <span class="pl-job-type">Festanstellung</span>
                        </div>
                        <div class="pl-arb-address">
                            <p><span class="pl-job-desc"><?= $internalJob->zip; ?> <?= $internalJob->city; ?> <br />Ref. Nr. <?= $internalJob->unique_key; ?></span>
                                <a href="/Vacancyboard/Detail/<?= $internalJob->vac_info_id; ?>" class="pl-cmmn-btn float-right">ansehen</a></p>
                        </div>
                    </div>
                <?php } ?>
                </div>
        </div>				
    </div>
<?php include 'footer.php'; ?>