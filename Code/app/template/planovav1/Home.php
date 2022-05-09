<?php
include 'header.php';
$classHome = 'active'; // •
include 'navigation.php';
?>
<!-- Top Section Ends -->
<div class="pl-cmmn-cnt-section">
    <!-- Banner Section -->
    <div class="pl-banner">
        <div class="col-lg-12">
            <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-6">
                    <a href="<?= WEB_URL ?>/Vacancyboard" class="img-suchen"><img src="<?= WEB_URL ?>/tmpl_planovav1/images/arbeit-finden.jpg" alt="Arbeit finden - Jobs Arbeit Stellenangebote Jobsuche Jobs Schweiz Temporärstellen Vollzeitstelle Mitarbeiter finden Personalvermittlung Rekrutierung" class="img-fluid img-arb-h" /><span>Arbeit finden</span></a>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-6">
                    <a href="<?= WEB_URL ?>/Pages/mitarbeiter_finden" class="img-vergeben"><img src="<?= WEB_URL ?>/tmpl_planovav1/images/mitarbeiter-finden.jpg" alt="Mitarbeiter finden - Jobs Arbeit Stellenangebote Jobsuche Jobs Schweiz Temporärstellen Vollzeitstelle Mitarbeiter finden Personalvermittlung Rekrutierung" class="img-fluid img-mit-h" /><span>Mitarbeiter finden</span></a>
                </div>
            </div>
        </div>
    </div>
    <!-- Banner Section Ends -->

    <!-- Content Section -->
    <div class="col-lg-12">
        <div class="row">
            <p class="pl-info-cnt">
                <img src="<?= WEB_URL ?>/tmpl_planovav1/images/Logo.png" alt="planova Jobs Arbeit Stellenangebote Jobsuche Jobs Schweiz Temporärstellen Vollzeitstelle Mitarbeiter finden Personalvermittlung Rekrutierung" class="img-fluid" /><br>
                <span class="pl-bold">Schnelligkeit durch Verfügbarkeit!</span> <br />
                (Temporär-) Arbeitsvermittlung <span class="pl-bold">speziell für</span> <br />
                <span class="pl-bold">das Bauhandwerk</span> in der Schweiz.
            </p>
        </div>
    </div>
    <!-- Content Section Ends -->

    <!-- Manner Section -->
    <div class="col-lg-12">
        <div class="row">
            <div class="pl-manner-img">
                <img src="<?= WEB_URL ?>/tmpl_planovav1/images/gesuchte-berufsbilder.jpg" alt="Gesuchte Berufsbilder Jobs Arbeit Stellenangebote Jobsuche Jobs Schweiz Temporärstellen Vollzeitstelle Mitarbeiter finden Personalvermittlung Rekrutierung" class="img-fluid" />
            </div>
        </div>
    </div>
    <!-- Manner Section Ends -->

    <!-- GESUCHTE BERUFSBILDER -->
    <div class="container">
        <div class="col-lg-12">
            <div class="row">
                <div class="pl-gesuchte">
                    <h1 class="bs-title">GESUCHTE BERUFSBILDER</h1>
                    <div class="col-lg-12">

                        <div id="accordion" role="tablist">
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="">										
                                        <div class="card">
                                            <div class="card-header" role="tab" id="headingOne">
                                                <h5 class="mb-0">
                                                    <a data-toggle="collapse" href="#collapseOne" aria-expanded="false" aria-controls="collapseOne">Schreiner <i class="fa fa-sort-desc" aria-hidden="true"></i></a>
                                                </h5>
                                            </div>
                                            <div id="collapseOne" class="collapse" role="tabpanel" aria-labelledby="headingOne" data-parent="#accordion">
                                                <div class="card-body">
                                                    <ul>
                                                        <li><a href="/Vacancyboard?jobtitle=Fensterschreiner">Bau- und Fensterschreiner</a></li>
                                                        <li><a href="/Vacancyboard?jobtitle=Möbelschreiner">Möbelschreiner</a></li>
                                                        <li><a href="/Vacancyboard?jobtitle=Monteur">Monteur</a></li>
                                                        <li><a href="/Vacancyboard?jobtitle=Schreiner">Schreiner</a></li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="card">
                                            <div class="card-header" role="tab" id="headingTwo">
                                                <h5 class="mb-0">
                                                    <a class="collapsed" data-toggle="collapse" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                                        Holzbau <i class="fa fa-sort-desc" aria-hidden="true"></i>
                                                    </a>
                                                </h5>
                                            </div>
                                            <div id="collapseTwo" class="collapse" role="tabpanel" aria-labelledby="headingTwo" data-parent="#accordion">
                                                <div class="card-body">
                                                    <ul>
                                                        <li><a href="/Vacancyboard?jobtitle=Holzbauarbeiter">Holzbauarbeiter</a></li>
                                                        <li><a href="/Vacancyboard?jobtitle=Zimmermann">Zimmermann</a></li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="card">
                                            <div class="card-header" role="tab" id="headingThree">
                                                <h5 class="mb-0">
                                                    <a class="collapsed" data-toggle="collapse" href="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                                        Maler/Gipser <i class="fa fa-sort-desc" aria-hidden="true"></i>
                                                    </a>
                                                </h5>
                                            </div>
                                            <div id="collapseThree" class="collapse" role="tabpanel" aria-labelledby="headingThree" data-parent="#accordion">
                                                <div class="card-body">
                                                    <ul>
                                                        <li><a href="/Vacancyboard?jobtitle=Fassadenisolierer">Fassadenisolierer</a></li>
                                                        <li><a href="/Vacancyboard?jobtitle=Gipser">Gipser</a></li>
                                                        <li><a href="/Vacancyboard?jobtitle=Maler">Maler</a></li>
                                                        <li><a href="/Vacancyboard?jobtitle=Stukateur">Stukateur</a></li>
                                                    </ul>
                                                </div> 
                                            </div>
                                        </div>


                                        <div class="card">
                                            <div class="card-header" role="tab" id="headingFour">
                                                <h5 class="mb-0">
                                                    <a class="collapsed" data-toggle="collapse" href="#collapseFour" aria-expanded="false" aria-controls="collapseThree">
                                                        Metallbau <i class="fa fa-sort-desc" aria-hidden="true"></i>
                                                    </a>
                                                </h5>
                                            </div>
                                            <div id="collapseFour" class="collapse" role="tabpanel" aria-labelledby="headingFour" data-parent="#accordion">
                                                <div class="card-body">
                                                    <ul>
                                                        <li><a href="/Vacancyboard?jobtitle=Metallbauer">Metallbauer</a></li>
                                                        <li><a href="/Vacancyboard?jobtitle=Schlosser">Schlosser</a></li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>


                                        <div class="card">
                                            <div class="card-header" role="tab" id="headingFive">
                                                <h5 class="mb-0">
                                                    <a class="collapsed" data-toggle="collapse" href="#collapseFive" aria-expanded="false" aria-controls="collapseThree">
                                                        Gartenbau <i class="fa fa-sort-desc" aria-hidden="true"></i>
                                                    </a>
                                                </h5>
                                            </div>
                                            <div id="collapseFive" class="collapse" role="tabpanel" aria-labelledby="headingFive" data-parent="#accordion">
                                                <div class="card-body">
                                                    <ul>
                                                        <li><a href="/Vacancyboard?jobtitle=Gärtner">Gärtner</a></li>
                                                        <li><a href="/Vacancyboard?jobtitle=Landschaftsbauer">Garten- und Landschaftsbauer</a></li>
                                                        <li><a href="/Vacancyboard?jobtitle=Landschaftsgestalter">Garten- und Landschaftsgestalter</a></li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-lg-6">
                                    <div class="">

                                        <div class="card">
                                            <div class="card-header" role="tab" id="headingSix">
                                                <h5 class="mb-0">
                                                    <a data-toggle="collapse" href="#collapseSix" aria-expanded="false" aria-controls="collapseOne">
                                                        Maschinenindustrie <i class="fa fa-sort-desc" aria-hidden="true"></i>
                                                    </a>
                                                </h5>
                                            </div>
                                            <div id="collapseSix" class="collapse" role="tabpanel" aria-labelledby="headingSix" data-parent="#accordion">
                                                <div class="card-body">
                                                    <ul>
                                                        <li><a href="/Vacancyboard?jobtitle=Apparatenbauer">Anlagen- und Apparatebauer</a></li>
                                                        <li><a href="/Vacancyboard?jobtitle=Automatiker">Automatiker</a></li>											
                                                        <li><a href="/Vacancyboard?jobtitle=Mechaniker">CNC-Mechaniker</a></li>
                                                        <li><a href="/Vacancyboard?jobtitle=Elektroniker">Elektroniker</a></li>
                                                        <li><a href="/Vacancyboard?jobtitle=Konstrukteur">Konstrukteur</a></li>
                                                        <li><a href="/Vacancyboard?jobtitle=Schweisser">Schweisser</a></li>
                                                        <li><a href="/Vacancyboard?jobtitle=Techniker">Techniker</a></li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="card">
                                            <div class="card-header" role="tab" id="headingSeven">
                                                <h5 class="mb-0">
                                                    <a class="collapsed" data-toggle="collapse" href="#collapseSeven" aria-expanded="false" aria-controls="collapseTwo">
                                                        Gebäudetechnik <i class="fa fa-sort-desc" aria-hidden="true"></i>
                                                    </a>
                                                </h5>
                                            </div>
                                            <div id="collapseSeven" class="collapse" role="tabpanel" aria-labelledby="headingTwo" data-parent="#accordion">
                                                <div class="card-body">
                                                    <ul>
                                                        <li><a href="/Vacancyboard?jobtitle=Gebäudetechnikplaner">Gebäudetechnikplaner</a></li>
                                                        <li><a href="/Vacancyboard?jobtitle=Klimatechniker">Klimatechniker</a></li>											
                                                        <li><a href="/Vacancyboard?jobtitle=Lüftungsmonteur">Lüftungsmonteur</a></li>
                                                        <li><a href="/Vacancyboard?jobtitle=Rohrleitungsbauer">Rohrleitungsbauer</a></li>
                                                        <li><a href="/Vacancyboard?jobtitle=Sanitärmonteur">Sanitärmonteur</a></li>
                                                        <li><a href="/Vacancyboard?jobtitle=Heizungsmonteur">Heizungsmonteur</a></li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="card">
                                            <div class="card-header" role="tab" id="headingEight">
                                                <h5 class="mb-0">
                                                    <a class="collapsed" data-toggle="collapse" href="#collapseEight" aria-expanded="false" aria-controls="collapseThree">
                                                        Elektroinstallation <i class="fa fa-sort-desc" aria-hidden="true"></i>
                                                    </a>
                                                </h5>
                                            </div>
                                            <div id="collapseEight" class="collapse" role="tabpanel" aria-labelledby="headingEight" data-parent="#accordion">
                                                <div class="card-body">
                                                    <ul>
                                                        <li><a href="/Vacancyboard?jobtitle=Elektriker">Elektriker</a></li>
                                                        <li><a href="/Vacancyboard?jobtitle=Elektroinstallateur">Elektroinstallateur</a></li>											
                                                        <li><a href="/Vacancyboard?jobtitle=Netzelektriker">Netzelektriker</a></li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>


                                        <div class="card">
                                            <div class="card-header" role="tab" id="headingNine">
                                                <h5 class="mb-0">
                                                    <a class="collapsed" data-toggle="collapse" href="#collapseNine" aria-expanded="false" aria-controls="collapseThree">
                                                        Hoch-/Tiefbau <i class="fa fa-sort-desc" aria-hidden="true"></i>
                                                    </a>
                                                </h5>
                                            </div>
                                            <div id="collapseNine" class="collapse" role="tabpanel" aria-labelledby="headingNine" data-parent="#accordion">
                                                <div class="card-body">
                                                    <ul>
                                                        <li><a href="/Vacancyboard?jobtitle=Bauführer">Bauführer</a></li>
                                                        <li><a href="/Vacancyboard?jobtitle=Baumaschinenmechaniker">Baumaschinenmechaniker</a></li>											
                                                        <li><a href="/Vacancyboard?jobtitle=Bauspengler">Bauspengler</a></li>
                                                        <li><a href="/Vacancyboard?jobtitle=Gerüstbauer">Gerüstbauer</a></li>
                                                        <li><a href="/Vacancyboard?jobtitle=Kranführer">Kranführer</a></li>											
                                                        <li><a href="/Vacancyboard?jobtitle=Maurer">Maurer</a></li>
                                                        <li><a href="/Vacancyboard?jobtitle=Schaler">Schaler</a></li>											
                                                        <li><a href="/Vacancyboard?jobtitle=Strassenbauer">Strassenbauer</a></li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>


                                        <div class="card">
                                            <div class="card-header" role="tab" id="headingTen">
                                                <h5 class="mb-0">
                                                    <a class="collapsed" data-toggle="collapse" href="#collapseTen" aria-expanded="false" aria-controls="collapseThree">
                                                        Weitere <i class="fa fa-sort-desc" aria-hidden="true"></i>
                                                    </a>
                                                </h5>
                                            </div>
                                            <div id="collapseTen" class="collapse" role="tabpanel" aria-labelledby="headingTen" data-parent="#accordion">
                                                <div class="card-body">
                                                    <ul>
                                                        <li><a href="/Vacancyboard?jobtitle=Architekt">Architekt</a></li>
                                                        <li><a href="/Vacancyboard?jobtitle=Automechaniker">Automechaniker</a></li>											
                                                        <li><a href="/Vacancyboard?jobtitle=Bodenleger">Bodenleger</a></li>
                                                        <li><a href="/Vacancyboard?jobtitle=Brunnenmacher">Brunnenmacher</a></li>
                                                        <li><a href="/Vacancyboard?jobtitle=Dachdecker">Dachdecker</a></li>											
                                                        <li><a href="/Vacancyboard?jobtitle=Deckenmonteur">Deckenmonteur</a></li>
                                                        <li><a href="/Vacancyboard?jobtitle=Gebäudereiniger">Gebäudereiniger</a></li>											
                                                        <li><a href="/Vacancyboard?jobtitle=Glasfassadenbau">Glaser - Fenster- und Glasfassadenbau</a></li>
                                                        <li><a href="/Vacancyboard?jobtitle=Lackierer">Lackierer</a></li>
                                                        <li><a href="/Vacancyboard?jobtitle=Logistiker">Logistiker</a></li>
                                                        <li><a href="/Vacancyboard?jobtitle=Pflästerer">Pflästerer</a></li>											
                                                        <li><a href="/Vacancyboard?jobtitle=Plattenleger">Plattenleger</a></li>
                                                        <li><a href="/Vacancyboard?jobtitle=Storenmonteur">Storen- und Rolladenmonteur</a></li>											
                                                        <li><a href="/Vacancyboard?jobtitle=Trockenbaumonteur">Trockenbaumonteur</a></li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
                <div class="pl-service">
                    <h4 class="pl-nrml-heading">PLANOVA IST MEHR ALS NUR EIN PERSONALDIENSTLEISTER.</h4>
                    <p>Wir machen nicht alles, aber das EINE machen wir richtig! Für unsere Partner sind wir die
                        erste Anlaufstelle, wenn Personalengpässe den Arbeitsablauf einschränken.</p>
                    <a href="<?= WEB_URL ?>/Pages/ueber_planova" class="pl-cmmn-btn float-right">erfahren Sie mehr</a>
                </div>
            </div>
        </div>
    </div>

    <!-- GESUCHTE BERUFSBILDER Ends -->

    <!-- Section2 -->
    <div class="pl-diff-list">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 pl-list-line">
                    <span class="pl-title">BEWERBER</span>
                    <ul>
                        <li>ABWECHSLUNG UND UNGEBUNDENHEIT</li>
                        <li>FÖRDERN VON QUALIFIKATIONEN</li>
                        <li>AUCH FÜR QUEREINSTEIGER</li>
                        <li>DAUERHAFTE KARRIEREN</li>
                        <li>SPRUNGBRETT IN DIE ARBEITSWELT</li>
                        <li>WEITERBILDUNGSMÖGLICHKEITEN</li>
                        <li>LEHR-, UND WANDERJAHRE</li>
                    </ul>
                </div>
                <div class="col-lg-6">
                    <span class="pl-title">UNTERNEHMEN</span>
                    <ul>
                        <li>FLEXIBILITÄT ERHÖHEN</li>
                        <li>AUFTRAGSSPITZEN PLANBAR MACHEN</li>
                        <li>INTENSIVE PARTNERARBEIT</li>
                        <li>LANGFRISTIGER, NACHHALTIGER ERFOLG</li>
                        <li>KEIN REKRUTIERUNGSAUFWAND</li>
                        <li>KEIN ARBEITGEBERRISIKO</li>
                        <li>KOSTENOPTIMIERUNG</li>
                    </ul>
                </div>
            </div> 
        </div>
    </div>
    <!-- Section2 Ends -->

    <!-- Section3 -->
    <div class="pl-process">
        <div class="container">
            <div class="row">
                <h1 class="bs-title">BEWERBUNGSPROZESS</h1>
                <p class="pl-subinfo">
                    <span class="pl-semibold">BEI UNS SIND SIE GUT AUFGEHOBEN &ndash;</span> WIR UNTERSTÜTZEN SIE VON
                    DER BEWERBUNG BIS ZUR VERTRAGSUNTERZEICHNUNG</p>
            </div>
            <div class="row">
                <div class="pl-flow">
                    <div class="pl-flowstp">
                        <img src="<?= WEB_URL ?>/tmpl_planovav1/images/dott1.png" class="pl-img-dott1" alt="Jobs Arbeit Stellenangebote Jobsuche Jobs Schweiz Temporärstellen Vollzeitstelle Mitarbeiter finden Personalvermittlung Rekrutierung" />
                        <p><img src="<?= WEB_URL ?>/tmpl_planovav1/images/canditature.png" alt="canditature" /><span>BEWERBUNG</span></p>
                    </div>
                    <div class="pl-flowstp">
                        <img src="<?= WEB_URL ?>/tmpl_planovav1/images/dott2.png" class="pl-img-dott2" alt="Jobs Arbeit Stellenangebote Jobsuche Jobs Schweiz Temporärstellen Vollzeitstelle Mitarbeiter finden Personalvermittlung Rekrutierung" />
                        <p><img src="<?= WEB_URL ?>/tmpl_planovav1/images/exam.png" alt="exam" /><span>PRÜFUNG</span></p>
                    </div>
                    <div class="pl-flowstp">
                        <img src="<?= WEB_URL ?>/tmpl_planovav1/images/dott3.png" class="pl-img-dott3" alt="Jobs Arbeit Stellenangebote Jobsuche Jobs Schweiz Temporärstellen Vollzeitstelle Mitarbeiter finden Personalvermittlung Rekrutierung" />
                        <p><img src="<?= WEB_URL ?>/tmpl_planovav1/images/interview.png" alt="interview" /><span>INTERVIEW</span></p>
                    </div>
                    <div class="pl-flowstp">
                        <img src="<?= WEB_URL ?>/tmpl_planovav1/images/dott4.png" class="pl-img-dott4" alt="Jobs Arbeit Stellenangebote Jobsuche Jobs Schweiz Temporärstellen Vollzeitstelle Mitarbeiter finden Personalvermittlung Rekrutierung" />
                        <p><img src="<?= WEB_URL ?>/tmpl_planovav1/images/kandidatur.png" alt="kandidatur" /><span>KANDIDATUR</span></p>
                    </div>
                    <div class="pl-flowstp">
                        <img src="<?= WEB_URL ?>/tmpl_planovav1/images/kundenkontakt.png" alt="Jobs Arbeit Stellenangebote Jobsuche Jobs Schweiz Temporärstellen Vollzeitstelle Mitarbeiter finden Personalvermittlung Rekrutierung" /><p class="pl-highlight-cnt"><span>KUNDENKONTAKT</span> <br />Für die Vorstellungsgespräche bei unseren Kunden beraten wir Sie transparent und proaktiv. Wir erhöhen Ihre Chancen durch eine gezielte Vorbereitung.</p>
                    </div>
                </div>
            </div>				
        </div>
        <div class="pl-jobrpt">
            <div class="container">
                <div class="row">
                    <h3 class="pl-semibold">Stellenmeldepflicht: Das müssen Sie wissen!</h3>
                    <p>Was ist die Stellenmeldepflicht und wie funktioniert sie? Auf dieser Seite finden Sie die wichtigsten Informationen zur Stellenmeldepflicht und was Arbeitgeber ab dem 1. Juli beachten müssen.</p>						
                </div>
                <a href="#" class="pl-cmmn-btn float-right">erfahren Sie mehr</a>
            </div>
        </div>
    </div>
    <!-- Section3 Ends -->


    <!-- Section4 -->
    <div class="pl-education">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="bs-title">WEITERBILDUNG</h1>
                    <img src="<?= WEB_URL ?>/tmpl_planovav1/images/weiterbildung.jpg" alt="Weiterbildung Jobs Arbeit Stellenangebote Jobsuche Jobs Schweiz Temporärstellen Vollzeitstelle Mitarbeiter finden Personalvermittlung Rekrutierung" class="img-fluid" />
                </div>
                <ul>
                    <li><a href="<?= WEB_URL ?>/Pages/arbeit_suchen">Wie finde ich den passenden Job?</a></li>
                    <li><a href="<?= WEB_URL ?>/Pages/jobs_bewerben">Wie bewerbe ich mich richtig?</a></li>
                    <li><a href="<?= WEB_URL ?>/Pages/jobs_interview">Das Interview (Vorstellung)</a></li>
                    <li><a href="<?= WEB_URL ?>/Pages/jobs_schweiz">Arbeiten in der Schweiz (Info für EU Bürger)</a>
                        <a href="<?= WEB_URL ?>/Pages/weiterbildung" class="pl-cmmn-btn float-right">erfahren Sie mehr</a></li>
                </ul>
            </div>
        </div>
    </div>
    <!-- Section4 Ends -->


    <!-- Section5 -->
    <div class="pl-calculator-cnt">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="bs-title">MINDESTLOHNRECHNER</h1>
                    <p class="pl-subinfo">Wie viel muss gezahlt werden?</p>
                    <img src="<?= WEB_URL ?>/tmpl_planovav1/images/hand_money.png" alt="Jobs Arbeit Stellenangebote Jobsuche Jobs Schweiz Temporärstellen Vollzeitstelle Mitarbeiter finden Personalvermittlung Rekrutierung" />
                    <a href="http://www.tempdata.ch/LohnrechnerStichwortSuchen.aspx?mode=Lohnrechner" class="pl-cmmn-btn">erfahren Sie mehr</a>						
                </div>
            </div>
        </div>
    </div>
    <!-- Section5 Ends -->


    <!-- Blog Section -->
    <div class="pl-index-blog blog">
        <div class="container">
            <div class="row">
                <h1 class="bs-title">BLOG</h1>
                <div id="blogCarousel" class="carousel slide container-blog" data-ride="carousel" data-interval="false">						
                    <div class="carousel-inner">
                        <div class="carousel-item active">

                            <div class="col-lg-12 pl-blog-info item">
                                <div class="row">
                                    <div class="col-lg-7">
                                        <a href="stellenmeldepflicht.html">
                                            <img src="<?= WEB_URL ?>/tmpl_planovav1/images/blog-stellenmeldepflicht-01.jpg" alt="Alles rund um die Stellenmeldepflicht Jobs Arbeit Stellenangebote Jobsuche Jobs Schweiz Temporärstellen Vollzeitstelle Mitarbeiter finden Personalvermittlung Rekrutierung" class="img-fluid">
                                        </a>
                                    </div>
                                    <div class="col-lg-5">
                                        <span class="pl-blog-title">Alles rund um die Stellenmeldepflicht </span>
                                        <p>Im Zuge der Masseneinwanderung hat das Parlament ein Gesetz zur Meldepflicht von Arbeitsstellen durchgesetzt, damit inländischen Fachkräften ein Wettbewerbsvorteil gegenüber anderen Bewerbern ermöglicht wird.</p>
                                        <a href="https://www.arbeit.swiss/secoalv/de/home/menue/unternehmen/stellenmeldepflicht.html" class="pl-link">[mehr erfahren]</a>
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-12 pl-blog-info item">
                                <div class="row">
                                    <div class="col-lg-7">
                                        <a href="praesentation-der-unternehmenskultur.html">
                                            <img src="<?= WEB_URL ?>/tmpl_planovav1/images/blog-unternehmenskultur-01.jpg" alt="Präsentation der Unternehmenskultur und Rekrutierung der besten Mitarbeitenden Jobs Arbeit Stellenangebote Jobsuche Jobs Schweiz Temporärstellen Vollzeitstelle Mitarbeiter finden Personalvermittlung Rekrutierung" class="img-fluid">
                                        </a>
                                    </div>
                                    <div class="col-lg-5">
                                        <span class="pl-blog-title">Präsentation der Unternehmenskultur</span>
                                        <p>Die Chance, hochqualifizierte und talentierte Mitarbeiter für das Unternehmen zu gewinnen, ist genau dann am besten, wenn es Ihrem Unternehmen gelingt, die eigene Art und Weise des Unternehmens hervorragend zu präsentieren.</p>
                                        <a href="#" class="pl-link">[mehr erfahren]</a>
                                    </div>
                                </div>
                            </div>


                            <div class="col-lg-12 pl-blog-info item">
                                <div class="row">
                                    <div class="col-lg-7">
                                        <a href="die-besten-kandidaten-abseits-des-lebenslaufs-finden.html">
                                            <img src="<?= WEB_URL ?>/tmpl_planovav1/images/blog-beste-kandidaten-01.jpg" alt="Die besten Kandidaten abseits des Lebenslaufs finden Jobs Arbeit Stellenangebote Jobsuche Jobs Schweiz Temporärstellen Vollzeitstelle Mitarbeiter finden Personalvermittlung Rekrutierung" class="img-fluid">
                                        </a>
                                    </div>
                                    <div class="col-lg-5">
                                        <span class="pl-blog-title">Die besten Kandidaten abseits des Lebenslaufs finden</span>
                                        <p>Der wichtigste Aspekt um einen Bewerber einzuschätzen, ist und bleibt der Lebenslauf. Ohne die wesentlichsten Fakten rundum den beruflichen Werdegang kann ein potentieller Mitarbeiter nicht eingeschätzt werden.</p>
                                        <a href="#" class="pl-link">[mehr erfahren]</a>
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-12 pl-blog-info item">
                                <div class="row">
                                    <div class="col-lg-7">
                                        <a href="was-macht-einen-attraktiven-arbeitgeber-aus.html">
                                            <img src="<?= WEB_URL ?>/tmpl_planovav1/images/blog-attraktiver-arbeitgeber-01.jpg" alt="Was macht einen attraktiven Arbeitgeber aus? Jobs Arbeit Stellenangebote Jobsuche Jobs Schweiz Temporärstellen Vollzeitstelle Mitarbeiter finden Personalvermittlung Rekrutierung" class="img-fluid">
                                        </a>
                                    </div>
                                    <div class="col-lg-5">
                                        <span class="pl-blog-title">Was macht einen attraktiven Arbeitgeber aus?</span>
                                        <p>Was können Sie tun, um als Arbeitgeber attraktiver wahrgenommen zu werden? Dabei gibt es viele Ansatzmöglichkeiten. Am besten ist es aber sicherlich, wir nähern uns dem Thema von einer anderen Seite.</p>
                                        <a href="#" class="pl-link">[mehr erfahren]</a>
                                    </div>
                                </div>
                            </div>

                        </div>

                        <div class="carousel-item">

                            <div class="col-lg-12 pl-blog-info item">
                                <div class="row">
                                    <div class="col-lg-7">
                                        <a href="der-fachkraeftemangel-in-der-schweiz-frasse-oder-fakt.html">
                                            <img src="<?= WEB_URL ?>/tmpl_planovav1/images/blog-fachkraeftemangel-01.jpg" alt="Der Fachkräftemangel in der Schweiz – Frasse oder Fakt? Jobs Arbeit Stellenangebote Jobsuche Jobs Schweiz Temporärstellen Vollzeitstelle Mitarbeiter finden Personalvermittlung Rekrutierung" class="img-fluid">
                                        </a>
                                    </div>
                                    <div class="col-lg-5">
                                        <span class="pl-blog-title">Der Fachkräftemangel in der Schweiz &ndash; Frasse oder Fakt?</span>
                                        <p>Fachkräftemangel? Überall hört man es. Niemandem ist es in den vielen Medienberichterstattungen nicht zu Ohren gekommen. Angeblich fehle es in zahlreichen Branchen an qualifizierten Arbeitskräften. Doch stimmt das? </p>
                                        <a href="#" class="pl-link">[mehr erfahren]</a>
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-12 pl-blog-info item">
                                <div class="row">
                                    <div class="col-lg-7">
                                        <a href="die-weiterbildung-als-tueroeffner-zum-traumjob.html">
                                            <img src="<?= WEB_URL ?>/tmpl_planovav1/images/blog-weiterbildung-01.jpg" alt="Die Weiterbildung als Türöffner zum Traumjob Jobs Arbeit Stellenangebote Jobsuche Jobs Schweiz Temporärstellen Vollzeitstelle Mitarbeiter finden Personalvermittlung Rekrutierung" class="img-fluid">
                                        </a>
                                    </div>
                                    <div class="col-lg-5">
                                        <span class="pl-blog-title">Die Weiterbildung als Türöffner zum Traumjob</span>
                                        <p>Was wollen Sie eigentlich erreichen? Wo liegt Ihre Traumbeschäftigung? Muss es dafür ein Jobwechsel sein? Reicht eine Weiterbildung, um der Monotonie des Arbeitsalltags zu entkommen? Oder fehlt es aktuell einfach an einer Herausforderung?</p>
                                        <a href="#" class="pl-link">[mehr erfahren]</a>
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-12 pl-blog-info item">
                                <div class="row">
                                    <div class="col-lg-7">
                                        <a href="der-mindest-lohn-in-der-schweiz.html">
                                            <img src="<?= WEB_URL ?>/tmpl_planovav1/images/blog-mindestlohn-01.jpg" alt="Der (Mindest-) Lohn in der Schweiz Jobs Arbeit Stellenangebote Jobsuche Jobs Schweiz Temporärstellen Vollzeitstelle Mitarbeiter finden Personalvermittlung Rekrutierung" class="img-fluid">
                                        </a>
                                    </div>
                                    <div class="col-lg-5">
                                        <span class="pl-blog-title">Der (Mindest-) Lohn in der Schweiz</span>
                                        <p>In der Schweiz gibt es keinen branchenübergreifenden allgemeinen Mindestlohn, der mit z.B. dem in Deutschland vergleichbar wäre. Einzelne Kantone haben jedoch bereits seit 2014 einen Mindestlohn eingeführt. </p>
                                        <a href="#" class="pl-link">[mehr erfahren]</a>
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-12 pl-blog-info item">
                                <div class="row">
                                    <div class="col-lg-7">
                                        <a href="flexibilitaet-als-zukunftsfaktor-der-arbeit.html">
                                            <img src="<?= WEB_URL ?>/tmpl_planovav1/images/blog-flexibilitaet-01.jpg" alt="Flexibilität als Zukunftsfaktor der Arbeit Jobs Arbeit Stellenangebote Jobsuche Jobs Schweiz Temporärstellen Vollzeitstelle Mitarbeiter finden Personalvermittlung Rekrutierung" class="img-fluid">
                                        </a>
                                    </div>
                                    <div class="col-lg-5">
                                        <span class="pl-blog-title">Flexibilität als Zukunftsfaktor der Arbeit</span>
                                        <p>Flexibilität. Wie kaum ein anderer Begriff ist die Flexibilität ein überstrapazierter und weit ausgedehnter Begriff. Überall hört man es. Arbeit muss flexibler werden.</p>
                                        <a href="#" class="pl-link">[mehr erfahren]</a>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
            <div class="carousel-indicators">			
                <a href="#" data-target="#blogCarousel" data-slide-to="0" class="pl-cmmn-btn float-right mt-0 pl-blg-prev">zurück</a>
                <a href="#" data-target="#blogCarousel" data-slide-to="1" class="pl-cmmn-btn float-right mt-0 pl-blg-weiter">weiter</a>
            </div>
        </div>
    </div>
    <!-- Blog Section Ends -->


<?php include 'footer.php'; ?>