<?php include 'header.php';
$classHome = 'class="active"'; // •
include 'navigation.php'; ?>
    <style type="text/css">
        .activityfeed {
            padding: 0px 4px;
            box-shadow: 0px 25px 25px -25px rgba(86, 86, 86, 0.2) inset;
            color: #FFF;
            transition: background 0.5s ease 0s;
            margin-right: 8px;
            border-radius: 8px;
            background: #2F2F2F none repeat scroll 0% 0%;
        }

        @keyframes in-top {
            from {
                transform: rotate3d(-1, 0, 0, 90deg);
            }
            to {
                transform: rotate3d(0, 0, 0, 0deg);
            }
        }

        @-webkit-keyframes in-top {
            from {
                -webkit-transform: rotate3d(-1, 0, 0, 90deg);
            }
            to {
                -webkit-transform: rotate3d(0, 0, 0, 0deg);
            }
        }

        @keyframes in-right {
            from {
                transform: rotate3d(0, -1, 0, 90deg);
            }
            to {
                transform: rotate3d(0, 0, 0, 0deg);
            }
        }

        @-webkit-keyframes in-right {
            from {
                -webkit-transform: rotate3d(0, -1, 0, 90deg);
            }
            to {
                -webkit-transform: rotate3d(0, 0, 0, 0deg);
            }
        }

        @keyframes in-bottom {
            from {
                transform: rotate3d(1, 0, 0, 90deg);
            }
            to {
                transform: rotate3d(0, 0, 0, 0deg);
            }
        }

        @-webkit-keyframes in-bottom {
            from {
                -webkit-transform: rotate3d(1, 0, 0, 90deg);
            }
            to {
                -webkit-transform: rotate3d(0, 0, 0, 0deg);
            }
        }

        @keyframes in-left {
            from {
                transform: rotate3d(0, 1, 0, 90deg);
            }
            to {
                transform: rotate3d(0, 0, 0, 0deg);
            }
        }

        @-webkit-keyframes in-left {
            from {
                -webkit-transform: rotate3d(0, 1, 0, 90deg);
            }
            to {
                -webkit-transform: rotate3d(0, 0, 0, 0deg);
            }
        }

        @keyframes out-top {
            from {
                transform: rotate3d(0, 0, 0, 0deg);
            }
            to {
                transform: rotate3d(-1, 0, 0, 110deg);
            }
        }

        @-webkit-keyframes out-top {
            from {
                -webkit-transform: rotate3d(0, 0, 0, 0deg);
            }
            to {
                -webkit-transform: rotate3d(-1, 0, 0, 110deg);
            }
        }

        @keyframes out-right {
            from {
                transform: rotate3d(0, 0, 0, 0deg);
            }
            to {
                transform: rotate3d(0, -1, 0, 110deg);
            }
        }

        @-webkit-keyframes out-right {
            from {
                -webkit-transform: rotate3d(0, 0, 0, 0deg);
            }
            to {
                -webkit-transform: rotate3d(0, -1, 0, 110deg);
            }
        }

        @keyframes out-bottom {
            from {
                transform: rotate3d(0, 0, 0, 0deg);
            }
            to {
                transform: rotate3d(1, 0, 0, 110deg);
            }
        }

        @-webkit-keyframes out-bottom {
            from {
                -webkit-transform: rotate3d(0, 0, 0, 0deg);
            }
            to {
                -webkit-transform: rotate3d(1, 0, 0, 110deg);
            }
        }

        @keyframes out-left {
            from {
                transform: rotate3d(0, 0, 0, 0deg);
            }
            to {
                transform: rotate3d(0, 1, 0, 110deg);
            }
        }

        @-webkit-keyframes out-left {
            from {
                -webkit-transform: rotate3d(0, 0, 0, 0deg);
            }
            to {
                -webkit-transform: rotate3d(0, 1, 0, 110deg);
            }
        }

        #p1, #p3, #p3 > div, #sp2, #sp3, .blocked, .form__input-wrapper, .header__nav--blue, .header__nav--mask, .s, .select__item, .team__photo-wrap, .team__wrap, .timeline-box__body, .timeline-box__body .img {
            overflow: hidden;
        }

        #page-flip, .no-touch #p1 > div, .no-touch #p2 > div, .no-touch #p3 > div, .no-touch #r3 {
            display: none
        }

        /* Styling Next and Prev buttons */
        .owl-theme .owl-controls .owl-buttons div {
            /*color: #0000; */
            display: inline-block;
            zoom: 1;
            *display: inline; /*IE7 life-saver */
            margin: 5px;
            padding: 3px 10px;
            font-size: 12px;
            background: #FFF;
            filter: Alpha(Opacity=50); /*IE7 fix*/
            opacity: 0.5;
        }

        /* Clickable class fix problem with hover on touch devices */
        /* Use it for non-touch hover action */
        .owl-theme .owl-controls.clickable .owl-buttons div:hover {
            filter: Alpha(Opacity=100); /*IE7 fix*/
            opacity: 1;
            text-decoration: none;
        }

        .owl-theme .owl-controls .owl-buttons div {
            position: absolute;
        }

        .owl-theme .owl-controls .owl-buttons .owl-prev {
            font-size: 32px;
            font-weight: bold;
            left: -5px;
            top: 70px;
        }

        .owl-theme .owl-controls .owl-buttons .owl-next {
            font-size: 32px;
            font-weight: bold;
            right: -5px;
            top: 70px;
        }
    </style>
    <!-- Slider Area -->
    <div class="container">
        <div class="box-shadow-area showcase mt-20">
            <div class="row">
                <div class="col-md-5">
                    <div class="showcase-left">
                        <div class="custom">
                            <div style="display: none" id="home-right-mobile">
                                <div class="col-1">
                                    <a href="Pages/candidate"><img alt="Stellenangebote Schweiz"
                                                                   src="<?= WEB_URL ?>/tmpl_planova/img/stellenangebote_schweiz_mobile.jpg"></a>
                                </div>
                                <div class="col-2">
                                    <h2>Bewerber</h2>
                                    <p style="text-align: center"><br>Hier erfahren Sie alles zu planova, Festanstellung
                                        und Temporärarbeit.</p>
                                    <a class="weiter" href="Pages/candidate">mehr erfahren</a>
                                </div>
                                <div style="clear: both;"></div>
                            </div>

                            <div style="display: none" id="home-right-mobile">
                                <div class="col-1">
                                    <h2>Unternehmen</h2>
                                    <p style="text-align: center"><br>Hier erfahren Sie,<br>wie planova Ihre
                                        Flexibilität erhöht.</p>
                                    <a class="weiter" href="Pages/company">mehr erfahren</a>
                                </div>
                                <div class="col-2">
                                    <a href="Pages/company"><img alt="Jobs Schweiz"
                                                                 src="<?= WEB_URL ?>/tmpl_planova/img/jobs_schweiz_mobile.jpg"></a>
                                </div>
                                <div style="clear: both;"></div>
                            </div>

                            <div style="display: none" id="home-right-mobile">
                                <div class="col-1">
                                    <a href="Pages/citizeninfo"><img alt="Stellenmarkt Schweiz"
                                                                     src="<?= WEB_URL ?>/tmpl_planova/img/stellenmarkt_schweiz_mobile.jpg"></a>
                                </div>
                                <div class="col-2">
                                    <h2>EU-Bürger</h2>
                                    <p style="text-align: center"><br>Serviceinformationen für den Start in der Schweiz
                                        als EU-Bürger</p>
                                    <a class="weiter" href="Pages/citizeninfo">mehr erfahren</a>
                                </div>
                                <div style="clear: both;"></div>
                            </div>

                            <div style="display: none" id="home-right-mobile">
                                <div class="col-1">
                                    <h2>Über planova</h2>
                                    <p style="text-align: center"><br>Alle Infos zu planova</p>
                                    <a class="weiter" href="Pages/aboutplanova">mehr erfahren</a>
                                </div>
                                <div class="col-2">
                                    <a href="Pages/aboutplanova"><img alt="Vermittungsbüro"
                                                                      src="<?= WEB_URL ?>/tmpl_planova/img/vermittlungsbuero_mobile.jpg"></a>
                                </div>
                                <div style="clear: both;"></div>
                            </div>
                        </div>

                        <div id="rev_slider_1_1_wrapper" class="rev_slider_wrapper fullwidthbanner-container"
                             style="margin:0px auto;background-color:#FFFFFF;padding:0px;margin-top:0px;margin-bottom:0px;max-height:470px;">
                            <div id="rev_slider_1_1" class="rev_slider fullwidthabanner"
                                 style="display:none;background-repeat:no-repeat;background-fit:cover;background-position:center top;max-height:470px;height:470px;">
                                <ul>
                                    <!-- SLIDE  -->
                                    <li data-transition="fade" data-slotamount="0" data-masterspeed="300"
                                        data-delay="9000" data-saveperformance="off">
                                        <!-- MAIN IMAGE -->
                                        <img src="<?= WEB_URL ?>/tmpl_planova/img/jobs_schweiz_temporaer.jpg"
                                             alt="Job Schweiz Temporär" data-bgfit="cover" data-bgposition="left top"
                                             data-bgrepeat="no-repeat">
                                        <!-- LAYERS -->
                                        <!-- LAYER NR. 1 -->
                                        <div class="tp-caption slider-caption skewfromrightshort fadeout"
                                             data-x="right" data-hoffset="0"
                                             data-y="10"
                                             data-speed="700"
                                             data-start="1000"
                                             data-easing="Power3.easeInOut"
                                             data-splitin="none"
                                             data-splitout="none"
                                             data-elementdelay="0.1"
                                             data-endelementdelay="0.1"
                                             data-endspeed="500">Temporär statt aussen vor
                                        </div>
                                    </li>
                                    <!-- SLIDE  -->
                                    <li data-transition="zoomout" data-slotamount="0" data-masterspeed="300"
                                        data-delay="9000" data-saveperformance="off">
                                        <!-- MAIN IMAGE -->
                                        <img src="<?= WEB_URL ?>/tmpl_planova/img/stellenangebote_schweiz_fest.jpg"
                                             alt="Stellenangebote Schweiz Fest" data-bgfit="cover"
                                             data-bgposition="left top"
                                             data-bgrepeat="no-repeat">
                                        <!-- LAYERS -->
                                        <!-- LAYER NR. 1 -->
                                        <div class="tp-caption slider-caption skewfromrightshort fadeout"
                                             data-x="right" data-hoffset="0"
                                             data-y="10"
                                             data-speed="700"
                                             data-start="1000"
                                             data-easing="Power3.easeInOut"
                                             data-splitin="none"
                                             data-splitout="none"
                                             data-elementdelay="0.1"
                                             data-endelementdelay="0.1"
                                             data-endspeed="500">Der schnelle Weg zur Festanstellung
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div id="finder-wrap">
                            <form class="navbar-form" method="POST" action="/Vacancyboard">
                                <div class="form-group">
                                    <input class="form-control" name="jobtitle" type="text"
                                           placeholder="z.B. Elektriker"/>
                                </div>
                                <button id="Jobfinder" class="btn btn-primary" type="submit"><i
                                            class="fa fa-search"></i>&nbsp; Jobs finden
                                </button>
                            </form>
                        </div>
                    </div> <!-- //showcase-left -->
                </div> <!-- //col-md-7 -->

                <div class="col-md-7">
                    <div class="showcase-right">
                        <div class="custom">
                            <ul class="top-service-box">
                                <li>
                                    <img class="showcase-img" alt="Stellenangebote Schweiz"
                                         src="<?= WEB_URL ?>/tmpl_planova/img/stellenangebote-schweiz.jpg"><br><br>
                                    <h2>Bewerber</h2>
                                    <p style="text-align: center"><br>Hier erfahren Sie alles zu planova, Festanstellung
                                        und Temporärarbeit.</p>
                                    <a class="weiter" href="Pages/candidate">mehr erfahren</a>
                                </li>
                                <li>
                                    <img class="showcase-img" alt="Jobs Schweiz"
                                         src="<?= WEB_URL ?>/tmpl_planova/img/jobs-schweiz.jpg"><br><br>
                                    <h2>Unternehmen</h2>
                                    <p style="text-align: center"><br>Hier erfahren Sie, wie planova Ihre Flexibilität
                                        erhöht.</p>
                                    <a class="weiter" href="Pages/company">mehr erfahren</a>
                                </li>
                                <li>
                                    <img class="showcase-img" alt="Stellenmarkt Schweiz"
                                         src="<?= WEB_URL ?>/tmpl_planova/img/stellenmarkt-schweiz.jpg"><br><br>
                                    <h2>EU-Bürger</h2>
                                    <p style="text-align: center"><br>Serviceinformationen für den Start in der Schweiz
                                        als EU-Bürger</p>
                                    <a class="weiter" href="Pages/citizeninfo">mehr erfahren</a>
                                </li>
                                <li>
                                    <img class="showcase-img" alt="Vermittlungsbüro"
                                         src="<?= WEB_URL ?>/tmpl_planova/img/vermittlungsbuero.jpg"><br><br>
                                    <h2>Über planova</h2>
                                    <p style="text-align: center"><br>Alle Infos zu planova</p>
                                    <a class="weiter" href="Pages/aboutplanova">mehr erfahren</a>
                                </li>
                            </ul>
                        </div>
                    </div> <!-- //showcase-right -->
                </div><!-- //col-md-5 -->
            </div> <!-- //row -->
        </div> <!-- //box-shadow-area -->
    </div> <!-- //container -->

    <div class="container">
        <div class="row row-eq-height">
            <div class="col-md-5">
                <div class="mt-15 box-wrapper">
                    <article>
                        <header>
                            <div class="slider-area" style="padding:0;">
                                <div class="about-us-carousel">
                                    <div id="about-us" class="about-us owl-theme">
                                        <div class="item">
                                            <img alt="Arbeitsvermittlung Backoffice" style="width:100%;"
                                                 src="<?= WEB_URL ?>/tmpl_planova/img/about-gallery/arbeitsvermittlung_backoffice.jpg"
                                                 class="img-responsive">
                                        </div>
                                        <div class="item">
                                            <img alt="Arbeitsvermittlung Filialleiter Zürich" style="width:100%;"
                                                 src="<?= WEB_URL ?>/tmpl_planova/img/about-gallery/arbeitsvermittlung_filialleiter_zuerich.jpg"
                                                 class="img-responsive">
                                        </div>
                                        <div class="item">
                                            <img alt="Arbeitsvermittlung Kandidat Luzern" style="width:100%;"
                                                 src="<?= WEB_URL ?>/tmpl_planova/img/about-gallery/arbeitsvermittlung_kandidat_luzern.jpg"
                                                 class="img-responsive">
                                        </div>
                                        <div class="item">
                                            <img alt="Jobs Personalberater Zürich" style="width:100%;"
                                                 src="<?= WEB_URL ?>/tmpl_planova/img/about-gallery/jobs_personalberater_zuerich.jpg"
                                                 class="img-responsive">
                                        </div>
                                        <div class="item">
                                            <img alt="Stellenangebote Kunde" style="width:100%;"
                                                 src="<?= WEB_URL ?>/tmpl_planova/img/about-gallery/stellenangebote_kunde.jpg"
                                                 class="img-responsive">
                                        </div>
                                        <div class="item">
                                            <img alt="Stellenangebote Personalberater Baden" style="width:100%;"
                                                 src="<?= WEB_URL ?>/tmpl_planova/img/about-gallery/stellenangebote_personalberater_baden.jpg"
                                                 class="img-responsive">
                                        </div>
                                        <div class="item">
                                            <img alt="Stellenmarkt Informatik Zürich" style="width:100%;"
                                                 src="<?= WEB_URL ?>/tmpl_planova/img/about-gallery/stellenmarkt_informatik_zuerich.jpg"
                                                 class="img-responsive">
                                        </div>
                                        <div class="item">
                                            <img alt="Stellenvermittlung Backoffice" style="width:100%;"
                                                 src="<?= WEB_URL ?>/tmpl_planova/img/about-gallery/stellenvermittlung_backoffice.jpg"
                                                 class="img-responsive">
                                        </div>
                                        <div class="item">
                                            <img alt="Stellenvermittlung Personalberaterin Zürich" style="width:100%;"
                                                 src="<?= WEB_URL ?>/tmpl_planova/img/about-gallery/stellenvermittlung_personalberaterin_zuerich.jpg"
                                                 class="img-responsive">
                                        </div>
                                        <div class="item">
                                            <img alt="Temporärbüro Baden" style="width:100%;"
                                                 src="<?= WEB_URL ?>/tmpl_planova/img/about-gallery/temporaerbuero_baden.jpg"
                                                 class="img-responsive">
                                        </div>
                                        <div class="item">
                                            <img alt="Temporärbüro Filialleiter Luzern" style="width:100%;"
                                                 src="<?= WEB_URL ?>/tmpl_planova/img/about-gallery/temporaerbuero_filialleiter_luzern.jpg"
                                                 class="img-responsive">
                                        </div>
                                        <div class="item">
                                            <img alt="Temporärbüro Geschäftsleitung" style="width:100%;"
                                                 src="<?= WEB_URL ?>/tmpl_planova/img/about-gallery/temporaerbuero_geschaeftsleitung.jpg"
                                                 class="img-responsive">
                                        </div>
                                        <div class="item">
                                            <img alt="Temporärbüro IT Zürich" style="width:100%;"
                                                 src="<?= WEB_URL ?>/tmpl_planova/img/about-gallery/temporaerbuero_it_zuerich.jpg"
                                                 class="img-responsive">
                                        </div>
                                        <div class="item">
                                            <img alt="Vermittlungsbüro Filialleiter Baden" style="width:100%;"
                                                 src="<?= WEB_URL ?>/tmpl_planova/img/about-gallery/vermittlungsbuero_filialleiter_baden.jpg"
                                                 class="img-responsive">
                                        </div>
                                        <div class="item">
                                            <img alt="Vermittlungsbüro Personalberater Zürich" style="width:100%;"
                                                 src="<?= WEB_URL ?>/tmpl_planova/img/about-gallery/vermittlungsbuero_personalberater_zuerich.jpg"
                                                 class="img-responsive">
                                        </div>
                                    </div> <!-- //about-us -->
                                </div> <!-- //about-us-caruosel -->
                            </div> <!-- //slider-area -->
                        </header>
                        <div class="welcome-text">
                            <h2>Bei uns finden Sie den/die Richtigen!</h2>
                            <p>Wenn Sie als Kunde oder Bewerber mit uns sprechen, wird Ihnen auffallen, dass wir EIN
                                TEAM sind und uns auf Ihrem Gebiet bestens auskennen. Hier liegt der wahre Vorteil der
                                planova human capital ag. Planova-Personalberater sind Spezialisten, die lokal im
                                Arbeitsmarkt verwurzelt sind, über einschlägige und fundierte Bau- oder Arbeitserfahrung
                                verfügen, und deshalb wissen, worauf es ankommt.</p>
                            <div class="readmore"><a href="/Pages/aboutplanova">weiter lesen</a></div>
                        </div> <!-- //welcome-text -->
                    </article>
                </div>
            </div> <!-- //col-md-5 -->
            <div class="col-md-7">
                <div class="mt-15 box-wrapper">
                    <div class="single-page-item">
                        <article>
                            <h2 class="lead-title"><span>Willkommen bei planova</span></h2>
                            <iframe width="560" height="365"
                                    src="https://www.youtube.com/embed/WAMpkPcWe44?rel=0&amp;controls=0&amp;showinfo=0"
                                    frameborder="0" allowfullscreen style="width:100%;"></iframe>
                        </article>
                    </div>
                </div>
            </div> <!-- //col-md-7 -->
        </div> <!-- //row -->
    </div> <!-- //container -->

    <div class="container mt-15">
        <div class="box-wrapper page-content">
            <div class="row">
                <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12">
                    <div class="box-wrapper mb-50">
                        <h2 class="lead-title">Neuste Aktivitäten</h2>
                        <ul>
                            <li><span class="activityfeed">11:03</span> M.P aus Winterhur schaut sich gerade folgende
                                Vakanz
                                an:</span> <a href="">Kältemoneur/in in Zürich Ref. Nr.: 306072</a></li>
                            <li><span class="activityfeed">11:03</span> (3) Neue Bewerber für folgendes
                                Stellenangebot:</span> <a href="">Schreiner/in in Obwalden (OW) Ref. Nr.: 306086</a>
                            </li>
                            <li><span class="activityfeed">11:04</span> A.S aus Zürich hat eine Bewerbung versendet</li>
                            <li><span class="activityfeed">10:55</span> F.T aus Schwyz hat folgendes Stellenangebot
                                erstellt:</span> <a href="">Polymechaniker/in EFZ in Schwyz (SZ) Ref. Nr.: 306085</a>
                            </li>
                            <li><span class="activityfeed">09:03</span> M.S aus Winterhur schaut sich gerade folgende
                                Vakanz
                                an:</span> <a href="">Kältemoneur/in in Zürich Ref. Nr.: 306072</a></li>
                            <li><span class="activityfeed">07:28</span> (3) Neue Bewerber für folgendes
                                Stellenangebot:</span> <a href="">Schreiner/in in Obwalden (OW) Ref. Nr.: 306086</a>
                            </li>
                            <li><span class="activityfeed">06:04</span> A.F aus Zürich hat eine Bewerbung versendet</li>
                            <li><span class="activityfeed">05:04</span> S.S aus Zürich hat eine Bewerbung versendet</li>
                        </ul>
                    </div> <!-- tab-area -->
                </div>
                <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                    <div class="box-wrapper">
                        <h2 class="lead-title">GAV-News</h2>
                        <div class="gav-news-caruosel">
                            <div id="gav-news" class="gav-news">
                                <?php foreach ($data['gavnews'] as $gavnews) {
                                    if (empty($gavnews->title)) {
                                        $gavnews->title = 'GAV-News';
                                    }
                                    ?>
                                    <div class="item">
                                        <div class="testimonial">
                                            <span><?= $gavnews->title ?></span>
                                            <p><?= $gavnews->text ?></p>
                                        </div>
                                    </div>
                                <?php } ?>
                            </div> <!-- //gav-news -->
                            <div class="customNavigation gav-news-navigation" style="top:0px;">
                                <a class="next"><i class="fa fa-angle-right"></i></a>
                                <a class="prev"><i class="fa fa-angle-left"></i></a>
                            </div> <!-- //gav-news-navigation -->
                        </div> <!-- //gav-news-caruosel -->
                    </div> <!-- //slider-area -->
                </div>
            </div>
        </div>
    </div> <!-- //container -->

<?php include 'footer.php'; ?>