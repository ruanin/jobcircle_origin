<?php include 'header.php'; ?>
<?php include 'navigation.php'; ?>

    <!-- Main jumbotron for a primary marketing message or call to action -->
    <div class="hero-content">
        <div class="container">
            <div class="row">
                <div class="col-sm-6 col-md-6">
                    <div class="hero-content-carousel">
                        <div class="slider-area box-wrapper white-container">
                            <h2 class="lead-title">GAV-News</h2>
                            <div class="gav-news-caruosel">
                                <div id="gav-news" class="gav-news">
                                    <?php foreach ($data['gavnews'] as $gavnews) {
                                        $desc = preg_replace("/[^ ]*$/", '', substr($gavnews->text, 0, 100));
                                        if (empty($gavnews->title)) {
                                            $gavnews->title = 'GAV-News';
                                        }
                                        ?>
                                        <div class="item">
                                            <div class="testimonial">
                                                <span><?= $gavnews->title ?></span>
                                                <p><?= $desc ?></p>
                                            </div>
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
                </div><!-- /.col-* -->
                <div class="col-sm-6 col-md-6">
                    <div class="hero-content-carousel">
                        <h2>NEUSTE STELLENANGEBOTE</h2>
                        <ul class="cycle-slideshow vertical"
                            data-cycle-fx="carousel"
                            data-cycle-slides="li"
                            data-cycle-carousel-visible="2"
                            data-cycle-carousel-vertical="true">
                            <?php
                            foreach ($arrNewJobs as $feedJobs) {
                                ?>
                                <li>
                                    <a href="/Vacancyboard/Detail/<?= $feedJobs['vac_info_id'] ?>"><?= $feedJobs['jobtitle'] ?></a>
                                    (<?= $feedJobs['city'] ?>), <?= $feedJobs->value_workload->name ?>
                                    , <?= $feedJobs->value_entering->name ?>
                                </li>
                                <?php
                            } ?>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="panels-highlighted">
            <div id="myCarousel" class="carousel slide" data-ride="carousel">
                <!-- Wrapper for slides -->
                <div class="carousel-inner" role="listbox">
                    <div class="item active">
                        <div class="row row-eq-height">
                        <div class="col-sm-6">
                            <div class="panel-highlighted-inner panel-highlighted-secondary">
                                <div>
                                    <img class="img-responsive" alt="Personaldienstleistungen Brefis"
                                         src="<?= WEB_URL ?>/tmpl_brefis/img/personaldienstleistungen_brefis.jpg"/>
                                    <h4>Umfassende Personaldienstleistungen</h4>
                                    <p style="text-align: justify;">Brefis bietet eine breit gefächerte Palette an
                                        Dienstleistungen rund um Personalvermittlung und Human Resources
                                        Unser Portfolio umfasst die Besetzung von Temporär- und Dauerstellen bis hin
                                        zur Vermittlung von Kader- und Experten. Ihre individuellen Anforderungen
                                        als Arbeitgeber und Unternehmer stehen für uns dabei immer im
                                        Mittelpunkt.</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="panel-highlighted-inner panel-highlighted-primary">
                                <div>
                                    <img class="img-responsive" alt="Personalplanung Temporär"
                                         src="<?= WEB_URL ?>/tmpl_brefis/img/personal_planung_temporaer.jpg"/>
                                    <h4>Sie benötigen Mitarbeiter?</h4>
                                    <p style="text-align: justify;">Ganz egal, ob Sie qualifizierte Mitarbeiter für
                                        eine dauerhafte Anstellung oder kurzfristig benötigte temporäre Mitarbeiter
                                        zur Unterstützung bei Auftragsspitzen brauchen oder ob Sie Fachkräfte oder
                                        Mitarbeiter für Führungspositionen zur Stärkung Ihres Kaders suchen, Brefis
                                        unterstützt Sie mit Know-How und fundierter Beratung und bietet Ihnen eine
                                        Vielzahl potenzieller Mitarbeiter und Lösungen, die auf Ihre individuellen
                                        Bedürfnisse abgestimmt sind.</p>
                                </div>
                            </div>
                        </div>
                        </div>
                    </div>
                    <div class="item">
                        <div class="row row-eq-height">
                        <div class="col-sm-6">
                            <div class="panel-highlighted-inner panel-highlighted-primary">
                                <div>
                                    <img class="img-responsive" alt="Personalberater Brefis Personal"
                                         src="<?= WEB_URL ?>/tmpl_brefis/img/personalberater_brefis_personal.jpg"/>
                                    <h4>Finden Sie interessante Jobangebote bei Brefis</h4>
                                    <p style="text-align: justify;">Brefis bietet Ihnen viele aktuelle
                                        Stellenangebote. Wir unterstützen Sie bei der Gestaltung Ihrer beruflichen.
                                        Wir sind Ihre kompetenten Ansprechpartner für die Vermittlung von Temporär-
                                        und Dauerstellen aller Ebenen. Wir kennen uns auf dem lokalen Arbeitsmarkt
                                        aus und pflegen exzellente Kontakte zu Arbeitgebern in praktisch allen
                                        Wirtschaftszweigen.</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="panel-highlighted-inner panel-highlighted-secondary">
                                <div>
                                    <img class="img-responsive" alt="Temporär Feststellen Jobangebote"
                                         src="<?= WEB_URL ?>/tmpl_brefis/img/temp-feststellen-jobangebote.jpg"/>
                                    <h4>Wir vermitteln Fachleute und Kaderleute für Festanstellungen und
                                        Temporärstellen</h4>
                                    <p style="text-align: justify;">Wir bieten eine optimale Betreuung für Bewerber
                                        auf Temporärstellen und Dauerstellen. Die Fachleute von Brefis sind die
                                        kompetenten Ansprechpartner für Ihre Karriereplanung. Wir von Brefis kennen
                                        uns aus mit dem lokalen Arbeitsmarkt und haben weitreichende Kontakte zu
                                        Arbeitgebern in vielen Bereichen der Wirtschaft.</p>
                                </div>
                            </div>
                        </div>
                        </div>
                    </div>
                </div>

                <!-- Left and right controls -->
                <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
                    <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
                </a>
                <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
                    <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
                </a>
            </div>
        </div>
        <!--        </div>-->
    </div>


<?php include 'footer.php'; ?>