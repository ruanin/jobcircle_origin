<header>
    <div class="container-fluid">
        <div class="row">
                <div class="col-lg-12">
                        <div class="pl-top-sect float-right">
                                <ul>
                                    <?php if (isset($_SESSION['logged']) && ($_SESSION['logged'] == true)) { ?>
                                        <li><a href="<?= WEB_URL ?>/Candidate/Dashboard">my Planova</a></li>
                                        <li><a href="/Candidate/loggout">Abmelden</a></li>
                                    <?php }else{ ?>
                                        <li><a href="<?= WEB_URL ?>/Candidate/login">Anmelden</a></li>
                                        <li><a href="/Candidate/registerWizard">Registrieren</a></li>
                                    <?php } ?>
                                </ul>
                        </div>
                </div>
        </div>
        <div class="row">
            <div class="col-lg-12 header" id="pl-searchicon">
                <nav id='cssmenu' class="navbar header-nav navigation">
                    <div class="col-lg-12 col-md-12">
                        <a href="<?= WEB_URL ?>" class="pl-logo-cnt"><img src="<?= WEB_URL ?>/tmpl_planovav1/images/Logo.png" alt="planova human capital ag: Schnelligkeit durch Verfügbarkeit!" class="img-fluid pl-logo" /></a>

                        <div class="pl-menu-rht">

                            <div class="mnu-button" id="mnu-btn">
                                <span class="navbar-toggle" id="js-navbar-toggle">
                                    <i class="fa fa-bars"></i>
                                </span>
                            </div>	

                            <ul class="main-nav" id="js-menu">
                                <li><a href="<?= WEB_URL ?>" class="nav-links <?= $classHome ?>">Home</a></li>
                                <li><a href="<?= WEB_URL ?>/Vacancyboard" class="nav-links">Jobs</a></li>
                                <li><a href="<?= WEB_URL ?>/Pages/SpontanApply" class="nav-links ">Spontanbewerbung</a></li>
                                <li class="has-sub"><a href="<?= WEB_URL ?>/Vacancyboard" class="nav-links <?= $classVacancy ?>">Arbeit finden</a>									
                                    <ul class="children sub-menu">
                                        <li> <a href="<?= WEB_URL ?>/Pages/SpontanApply" class="<?= $classSubPageSpontanApply ?>">Spontanbewerbung</a></li>
                                        <li class="has-sub">
                                            <a href="<?= WEB_URL ?>/Pages/weiterbildung" class="<?= $classSubPageFurtherEducation ?>">Weiterbildung</a>
                                            <ul class="children sub-menu">
                                                <li>
                                                    <a href="<?= WEB_URL ?>/Pages/arbeit_suchen" class="<?= $classSubPageHowToSearchJob ?>">Wie finde ich den passenden job?</a>
                                                </li>
                                                <li>
                                                    <a href="<?= WEB_URL ?>/Pages/jobs_bewerben" class="<?= $classSubPageHowToApply ?>">Wie bewerbe ich mich richtig?</a>
                                                </li>
                                                <li>
                                                    <a href="<?= WEB_URL ?>/Pages/jobs_interview" class="<?= $classSubPageInterview ?>">Das Interview (Vorstellung)</a>
                                                </li>
                                                <li>
                                                    <a href="<?= WEB_URL ?>/Pages/jobs_schweiz" class="<?= $classSubPageWorkingInSwitzerland ?>">Arbeiten In der Schweiz (Info fur EU Burger)</a>
                                                </li>												
                                            </ul>
                                        </li>											
                                    </ul>									
                                </li>
                                <li class="has-sub"><a href="<?= WEB_URL ?>/Pages/mitarbeiter_finden" class="nav-links <?= $classMitarbeiterFinden ?>">Mitarbeiter finden</a>
                                    <ul class="children sub-menu">
                                        <li><a href="<?= WEB_URL ?>/Client/MitarbeiterPool" class="<?= $classMitarbeiterPool ?>">Mitarbeiter-Pool</a></li>
                                        <li><a href="<?= WEB_URL ?>/Client/Stellenmeldepflicht" class="<?= $classStellenmeldepflicht ?>">Stellenmeldepflicht</a></li>
                                    </ul>
                                </li>									

                                <li><a href="<?= WEB_URL ?>/Pages/ueber_planova" class="nav-links <?= $classAbout ?>">Über Planova</a>
                                    <ul class="children sub-menu">
                                        <li>
                                            <a href="<?= WEB_URL ?>/Pages/fachbereiche" class="<?= $classSubPageDivisions ?>">Unsere Fachbereiche</a>
                                        </li>
                                        <li>
                                            <a href="<?= WEB_URL ?>/Pages/qualitaet" class="<?= $classSubPageSwissStaffing ?>">Qualitätsanspruch</a>
                                        </li>
                                        <li>
                                            <a href="<?= WEB_URL ?>/Pages/career" class="<?= $classSubPageCareer ?>">Karriere bei planova</a>
                                        </li>
                                    </ul>
                                </li>
                                <li>
                                    <a href="<?= WEB_URL ?>/Pages/kontakt" class="nav-links <?= $classContact ?>">Kontakt</a>	
                                </li>
                            </ul>	
                        </div>
                    </div>
                </nav>					
            </div>
        </div>
    </div>
</header>