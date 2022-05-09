<?php include 'header.php'; ?>
<?php include 'navigation.php'; ?>
<style type="text/css">

</style>
<header id="header">
<div class="header-search-bar">
			<div class="container">
                <form action="/Vacancyboard/" method="POST">
					<div class="basic-form clearfix">
						<div class="hsb-input-1">
							<input type="text" class="form-control" name="jobtitle" placeholder="Ich suche nach ...">
						</div>

						<div class="hsb-text-1">in</div>

						<div class="hsb-container">
							<div class="hsb-select">
								<select class="form-control" name="place" >
                                    <option value="0">Arbeitsregion</option>
                                    <?php foreach ($data['region'] as $region) { ?>
                                        <option value="<?=$region->region_id;?>"><?=$region->title;?></option>
                                    <?php } ?>
                                </select>
							</div>
                            
                            <div class="hsb-select">
                                <select name="occupationGroup" class="form-control">
                                    <option>Branche</option>
                                    <?php foreach ($data['professiongroup'] as $professiongroup) { 
                                    $selected = ($professiongroup->profession_id == $data['filter']['occupationGroup']) ? 'selected' : '';     
                                        ?>
                                    <option  <?=$selected?> value="<?=$professiongroup->profession_id?>"><?=$professiongroup->name?></option>
                                    <?php } ?>
                                </select>
                            </div>
						</div>

						<div class="hsb-submit">
							<input type="submit" class="btn btn-default btn-block" value="Suchen">
						</div>
					</div>

				</form>
			</div>
		</div> <!-- end .header-search-bar -->

		<div class="header-banner">
			<div class="container">
				<div class="row">
					<div class="col-sm-6">
						<div class="header-banner-box register">
                            <div class="flexslider header-slider">
                                <ul class="slides">
                                    <li>
                                        <img src="img/transparent.png" alt="" style="width:555px;height:260px;">
                                        <div data-image="/tmpl_ahapersonal/img/register-bg.png"></div>    
                                        <a href="/Candidate/registerWizard" class="btn btn-default">Registrieren</a>
                                    </li>
                                    <li>
                                        <img src="img/transparent.png" alt="" style="width:555px;height:260px;">
                                        <div data-image="/tmpl_ahapersonal/img/bewerber_stellenangebote.png"></div>
                                        <a href="/Candidate/registerWizard" class="btn btn-default">Registrieren</a>
                                    </li>
                                    <li>
                                        <img src="img/transparent.png" alt="" style="width:555px;height:260px;">
                                        <div data-image="/tmpl_ahapersonal/img/stellenangebote_banner.png"></div>
                                        <a href="/Candidate/registerWizard" class="btn btn-default">Registrieren</a>
                                    </li>
                                </ul> 
                            </div>
							
						</div>
					</div>

					<div class="col-sm-6">
						<div class="header-banner-box post-job">
                            <div class="flexslider header-slider">
                                <ul class="slides">
                                    <li>
                                        <img src="img/transparent.png" alt="" style="width:555px;height:260px;">
                                        <div data-image="/tmpl_ahapersonal/img/stellenangebote_luzern.png"></div>    
                                        <a href="/Contact" class="btn btn-default">Personalanfrage</a>
                                    </li>
                                    <li>
                                        <img src="img/transparent.png" alt="" style="width:555px;height:260px;">
                                        <div data-image="/tmpl_ahapersonal/img/personalanfrage_stellenvermittlung.png"></div>
                                        <a href="/Contact" class="btn btn-default">Personalanfrage</a>
                                    </li>
                                    <li>
                                        <img src="img/transparent.png" alt="" style="width:555px;height:260px;">
                                        <div data-image="/tmpl_ahapersonal/img/stellenangebote_temp_try.png"></div>
                                        <a href="/Contact" class="btn btn-default">Personalanfrage</a>
                                    </li>
                                </ul>
                            </div>
						</div>
					</div>
				</div>
			</div>
		</div> <!-- end .header-banner -->
	</header> <!-- end #header -->
	</header> <!-- end #header -->
    <!-- Main jumbotron for a primary marketing message or call to action -->
    <div class="page-content pt30 pb30">
        <div class="container p0">
            <div class="row pb0">
                <div class="col-lg-6">
                    <div class="slider-area box-wrapper white-container">
                        <h2 class="lead-title">Neuste Stellenangebote</h2>
                        <div class="latest-jobs-caruosel">
                            <div id="latest-jobs" class="latest-jobs">
                                <?php foreach ($arrNewJobs as $feedJobs) {  ?>
                                <div class="item p0">
                                    <div class="testimonial mt0">
                                        <h6 class='mt5 mb0'><?= $feedJobs['jobtitle'] ?></h6>
                                        <span class="location"><?= $feedJobs['city'] ?></span>
                                        <p class='none-padding'>Pensum: <?=$feedJobs->value_workload->name?></p>
                                        <p class='none-padding'>Arbeitsbeginn: <?=$feedJobs->value_entering->name?></p>
                                    </div>

                                    <div class="readmore">
                                        <a target="_blank" href="/Vacancyboard/Detail/<?= $feedJobs['vac_info_id'] ?>">weiter lesen</a>
                                    </div>
                                </div>
                                <?php } ?>
                            </div> <!-- //gav-news -->
                            <div class="customNavigation latest-jobs-navigation">
                                <a class="next"><i class="fa fa-angle-right"></i></a>
                                <a class="prev"><i class="fa fa-angle-left"></i></a>
                            </div> <!-- //gav-news-navigation -->
                        </div> <!-- //gav-news-caruosel -->
                    </div> <!-- //slider-area -->
                </div>
                <div class="col-lg-6">
                    <div class="slider-area box-wrapper white-container">
                        <h2 class="lead-title">GAV-News</h2>
                        <div class="gav-news-caruosel">
                            <div id="gav-news" class="gav-news">
                                <?php foreach ($data['gavnews'] as $gavnews) { 
                                    $desc = preg_replace("/[^ ]*$/", '', substr($gavnews->text, 0, 100));
                                    if(empty($gavnews->title)){
                                        $gavnews->title = 'GAV-News';
                                    }
                                    ?>
                                    <div class="item">
                                    <h6 class='mt5 mb0'><?=$gavnews->title?></h6>
                                    <p><?=$desc?></p>
                                </div>

                                <?php } ?>
                            </div> <!-- //gav-news -->
                            <div class="customNavigation gav-news-navigation">
                                <a class="next"><i class="fa fa-angle-right"></i></a>
                                <a class="prev"><i class="fa fa-angle-left"></i></a>
                            </div> <!-- //gav-news-navigation -->
                        </div> <!-- //gav-news-caruosel -->
                    </div> <!-- //slider-area -->
                </div>
            </div>     
        </div>
    </div>
    <div class="page-content p0">
        <div class="container white-container pt0 pb10">
            <div class="col-md-12">
                <div class="row">
                    <div class="col-xs-12 col-sm-6 col-lg-3 col-md-3 none-padding">
                        <div class="services-block-img text-center">
                            <img src="<?=WEB_URL?>/tmpl_ahapersonal/img/service-1.png" alt="Kunde">
                            <div class="block-services">
                                <i class="icon icon-Podium"></i>
                                <h4><a href="/Pages/companydivisions">Kunde</a></h4>
                                <p>AHA bietet ein breites Spektrum an Dienstleistungen rund um Personalvermittlung und Human Resources.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-6 col-lg-3 col-md-3 none-padding">
                        <div class="services-block-img text-center">
                            <img src="<?=WEB_URL?>/tmpl_ahapersonal/img/service-2.png" alt="Über AHA">
                            <div class="block-services">
                                <i class="icon icon-Drop"></i>
                                <h4><a href="/Pages/aboutAHA">Über AHA</a></h4>
                                <p>Unsere innovative Rekrutierungssoftware ermöglicht es uns, die besten Unternehmen mit den besten Mitarbeitern im entscheidenden Moment zusammen zu bringen. </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-6 col-lg-3 col-md-3 none-padding">
                        <div class="services-block-img text-center">
                            <img src="<?=WEB_URL?>/tmpl_ahapersonal/img/service-3.png" alt="Kandidat">
                            <div class="block-services">
                                <i class="icon icon-House"></i>
                                <h4><a href="/Vacancyboard">Kandidat</a></h4>
                                <p>ENTDECKEN SIE DIE JOBANGEBOTE VON AHA</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-6 col-lg-3 col-md-3 none-padding">
                        <div class="services-block-img text-center">
                            <img src="<?=WEB_URL?>/tmpl_ahapersonal/img/service-4.png" alt="EU-Bürger Info">
                            <div class="block-services">
                                <i class="icon icon-ClipboardText"></i>
                                <h4><a href="/Pages/citizeninfo">EU-Bürger INFO</a></h4>
                                <p>WERDEN SIE TEIL UNSERES NETZWERKES, TEIL EINES STARKEN TEAMS</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="page-content p0">
        <div class="container p0">
          <!-- Example row of columns -->
          <div class="row pb0">
            <div class="col-sm-6">
                <div class="white-container pt35">
                <div> 
                    <img class="img-responsive" alt="Personaldienstleistungen AHA Personal" src="<?=WEB_URL?>/tmpl_ahapersonal/img/Personaldienstleistungen_ahapersonal.png" />
                </div>
                <div class="single-page-item">
                    <h4>Umfassende Personaldienstleistungen</h4>
                    <p style="text-align: justify;">AHA bietet ein breites Spektrum an Dienstleistungen rund um Personalvermittlung und Human Resources.
                    Unser Leistungsspektrum reicht von der Besetzung von Temporär- und Dauerstellen bis hin zur Vermittlung von Kader- und Experten. Ihre spezifischen Anforderungen als Arbeitgeber und Unternehmer stehen dabei stets im Mittelpunkt.</p>
                </div>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="white-container pt35">
                    <div>
                        <img class="img-responsive" alt="Personalanfrage Mitarbeiter" src="<?=WEB_URL?>/tmpl_ahapersonal/img/Personalanfrage_Mitarbeiter.png" />
                    </div>
                    <div class="single-page-item">
                        <h4>Sie suchen Mitarbeiter?</h4>
                        <p style="text-align: justify;">Ob qualifizierte Mitarbeiter für eine Festanstellung oder kurzfristig benötigte temporäre Mitarbeiter zur Unterstützung bei Auftragsspitzen, ob Spezialisten oder Führungspersönlichkeiten zur Stärkung Ihres Kaders: AHA unterstützt Sie mit kompetenter Beratung, einer Vielzahl potenzieller Mitarbeiter und Lösungen, die ganz auf Ihre Bedürfnisse zugeschnitten sind.</p>
                    </div>
                </div>
            </div>
          </div>
        </div>
    </div>
    <div class="page-content p0">
        <div class="container p0">
            <div class="row">
                <div class="col-sm-6">
                    <div class="white-container pt20 pb20">
                        <div>
                            <img class="img-responsive" alt="Offene Stellenangebote Stellenvermittlung" src="<?=WEB_URL?>/tmpl_ahapersonal/img/offene_stellenangebote_stellenvermittlung.png" />
                        </div>
                        <div class="single-page-item">
                            <h4>Entdecken Sie die Jobangebote von AHA</h4>
                            <p style="text-align: justify;">Hier finden Sie unsere aktuellen Stellenangebote. Ihre berufliche Zukunft ist bei AHA in den besten Händen. Wir sind die Fachleute für die Vermittlung von Temporär- und Dauerstellen aller Ebenen. Wir sind mit dem lokalen Arbeitsmarkt bestens vertraut und verfügen über exzellente Kontakte zu Arbeitgebern in den praktisch allen Branchen.</p>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="white-container pt20 pb20">
                        <div>
                             <img class="img-responsive" alt="Vermitteln Festanstellung Befristete Einsätze" src="<?=WEB_URL?>/tmpl_ahapersonal/img/Vermitteln_Festanstellung_BefristeteEinsaetze.png" />
                        </div>
                        <div class="single-page-item">
                            <h4>Wir vermitteln Experten und Kaderleute</h4>
                            <p style="text-align: justify;">Sowohl Bewerber für Temporärstellen als auch diejenigen, die eine Dauerstelle suchen, sind bei uns in besten Händen. Die Profis von AHA sind die richtigen Ansprechpartner für die Planung Ihrer beruflichen Zukunft. Wir sind bestens vertraut mit dem lokalen Arbeitsmarkt und pflegen intensive Kontakte zu Arbeitgebern in praktisch allen Branchen. Bei der Stellenvermittlung haben wir uns auf die folgenden Bereiche spezialisiert</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php include 'footer.php'; ?>