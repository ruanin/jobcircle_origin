<?php
include 'header.php';
$classMitarbeiterFinden = $classStellenmeldepflicht = 'active';  
include 'navigation.php';

?>
<div class="pl-cmmn-cnt-section">

    <!-- STELLENMELDEPFLICHT -->
    <div class="pl-stellenmeldepflicht">
        <div class="container">
            <h1 class="bs-title">STELLENMELDEPFLICHT</h1>				
            <form id="srch-wrk" class="pl-form stell-frm" action="<?= WEB_URL ?>/Client/Stellenmeldepflicht" method="post">							
                <div class="form-row">
                    <div class="form-group col-lg-6">
                        <label class="text-info">Berufsbezeichnung</label>
                        <input type="text" class="form-control" name="fullSearch" value="<?=!empty($data['search']) ? $data['search']: ''?>" />
                    </div>
                    <div class="form-group col-lg-5">
                        <label class="text-info">Kanton</label>
                        <select class="form-control" name="kanton">
                            <option value="">Alle</option>
                            <?php foreach ($data['region'] as $region) { 
                                $selected = ($region->region_id == $data['kanton']) ? 'selected' : ''; ?>
                                <option <?=$selected?> value="<?=$region->region_id;?>"><?=$region->title;?></option>
                            <?php } ?>

                        </select>						
                    </div>
                    <div class="form-group col-lg-1">
                        <button type="submit" class="btn pl-find-btn"><i class="fa fa-search" aria-hidden="true"></i></button>					
                    </div>
                </div>
            </form>
            <div class="pl-alphabets">
                <span class="pl-alphabet-heading">Berufsbezeichnung A-Z</span>
                <ul>
                    <li><a href="<?= WEB_URL ?>/Client/Stellenmeldepflicht">A-Z</a></li>
                    <li><a href="<?= WEB_URL ?>/Client/Stellenmeldepflicht?letter=A">A</a></li>
                    <li><a href="<?= WEB_URL ?>/Client/Stellenmeldepflicht?letter=B">B</a></li>
                    <li><a href="<?= WEB_URL ?>/Client/Stellenmeldepflicht?letter=C">C</a></li>
                    <li><a href="<?= WEB_URL ?>/Client/Stellenmeldepflicht?letter=D">D</a></li>
                    <li><a href="<?= WEB_URL ?>/Client/Stellenmeldepflicht?letter=E">E</a></li>
                    <li><a href="<?= WEB_URL ?>/Client/Stellenmeldepflicht?letter=F">F</a></li>
                    <li><a href="<?= WEB_URL ?>/Client/Stellenmeldepflicht?letter=G">G</a></li>
                    <li><a href="<?= WEB_URL ?>/Client/Stellenmeldepflicht?letter=H">H</a></li>
                    <li><a href="<?= WEB_URL ?>/Client/Stellenmeldepflicht?letter=I">I</a></li>
                    <li><a href="<?= WEB_URL ?>/Client/Stellenmeldepflicht?letter=J">J</a></li>
                    <li><a href="<?= WEB_URL ?>/Client/Stellenmeldepflicht?letter=K">K</a></li>
                    <li><a href="<?= WEB_URL ?>/Client/Stellenmeldepflicht?letter=L">L</a></li>
                    <li><a href="<?= WEB_URL ?>/Client/Stellenmeldepflicht?letter=M">M</a></li>
                    <li><a href="<?= WEB_URL ?>/Client/Stellenmeldepflicht?letter=N">N</a></li>
                    <li><a href="<?= WEB_URL ?>/Client/Stellenmeldepflicht?letter=O">O</a></li>
                    <li><a href="<?= WEB_URL ?>/Client/Stellenmeldepflicht?letter=P">P</a></li>
                    <li><a href="<?= WEB_URL ?>/Client/Stellenmeldepflicht?letter=Q">Q</a></li>
                    <li><a href="<?= WEB_URL ?>/Client/Stellenmeldepflicht?letter=R">R</a></li>
                    <li><a href="<?= WEB_URL ?>/Client/Stellenmeldepflicht?letter=S">S</a></li>
                    <li><a href="<?= WEB_URL ?>/Client/Stellenmeldepflicht?letter=T">T</a></li>
                    <li><a href="<?= WEB_URL ?>/Client/Stellenmeldepflicht?letter=U">U</a></li>
                    <li><a href="<?= WEB_URL ?>/Client/Stellenmeldepflicht?letter=V">V</a></li>
                    <li><a href="<?= WEB_URL ?>/Client/Stellenmeldepflicht?letter=W">W</a></li>
                    <li><a href="<?= WEB_URL ?>/Client/Stellenmeldepflicht?letter=X">X</a></li>
                    <li><a href="<?= WEB_URL ?>/Client/Stellenmeldepflicht?letter=Y">Y</a></li>
                    <li><a href="<?= WEB_URL ?>/Client/Stellenmeldepflicht?letter=Z">Z</a></li>
                </ul> 
                <div class="pl-alphadata">
                    <?php foreach ($data['professionList'] as $key => $professionData) { ?>
                        <div class="pl-alpha-cnt">
                            <div class="pl-alpha-md-txt"><?= $professionData['seco_bezeichnung_male_de'] ?>/<?= $professionData['seco_bezeichnung_female_de'] ?></div>
                            <div class="pl-alpha-rht-txt <?= $professionData['seco_profession_meldepflichtig'] == 1 ? 'pl-txt-bg' : '' ?> float-right"><?= $professionData['seco_profession_meldepflichtig'] == 1 ? 'meldepflichtig' : 'nicht meldepflichtig' ?></div>
                            <div class="pl-alpha-clear">&nbsp;</div>
                        </div>
                    <?php } ?>     
                </div>
            </div>
        </div>
        
        <div class="pl-stell-cnt">
				<div class="container">
					
					<div class="pl-stell-block">
						<span class="pl-md-txt">Unterstützung benötigt?</span>
						<p>Brauchen Sie Unterstützung bei der Umsetzung der Stellenmeldepflicht in Ihrem Unternehmen? Kontaktieren Sie uns für ein unverbindliches Gespräch. Gerne zeigen wir Ihnen, welche unserer Lösungen am besten zu Ihrer Firma passt.</p>
						<a href="/Pages/kontakt" class="pl-cmmn-btn btn-reverse float-right">Kontakt</a>
					</div>
				</div>
			</div>
			
			<div class="pl-download">
				<div class="container">
					<p class="pl-subinfo">Downloads</p>
					<p>Hier finden Sie laufend aktuelle Informationen zur Stellenmeldepflicht, die auf den 1. Juli 2018 eingeführt wird.</p>
					<p>Flyer:</p>
						<ul>
							<li><a href="/tmpl_planovav1/pdf/1047_Stellenmeldepflicht_planova" download><i class="fa fa-file-pdf-o" aria-hidden="true"></i> Stellenmeldepflicht: Das Wichtigste auf einen Blick!</a> (PDF, 1 MB, 03.05.2018)</li>
							<li><a href="/tmpl_planovav1/pdf/1047_011805_Flyer_Stellensuchende_d_RZ_low.pdf" download><i class="fa fa-file-pdf-o" aria-hidden="true"></i> Stellenmeldepflicht: Informationsvorsprung für Stellensuchende</a> (PDF, 148 kB, 05.11.2018)</li>
							<li>Erklärvideo: <a href="https://youtu.be/wdC40mDLjtQ" target="_blank">Was bedeutet die Stellenmeldepflicht für Arbeitgeber und Stellensuchende? <i class="fa fa-external-link" aria-hidden="true"></i></a></li>
							
						</ul>
					
				</div>
			</div>
    </div>
                        
<?php include 'footer.php'; ?>