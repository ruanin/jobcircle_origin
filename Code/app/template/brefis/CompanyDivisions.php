<?php include 'header.php';
$classAbout = 'active';
$classSubPageDivisions = 'class="active"';
$breadcrumb[] = array('title' => 'Über brefis',
                      'url' => '/Pages/aboutbrefis',
                    'active' => false);
$breadcrumb[] = array('title' => 'Fachbereiche',
                      'url' => '/Pages/companydivisions',
                    'active' => true);
include 'navigation.php'; ?>
<div class="document-title">
    <div class="container">
        <h1><?=$data['title']?></h1>
    </div>
</div>
<div class="document-breadcrumb">
    <div class="container">
        <ul class="breadcrumb">
            <li><a href="#">Home</a></li>
                <?php for($i=0;$i<count($breadcrumb);$i++) {

                   if($breadcrumb[$i]['active'] == true){
                       $breadcrumbClass = 'class="active"';
                       $breadcrumbTitle = $breadcrumb[$i]['title'];
                   }else{
                       $breadcrumbClass = '';
                       $breadcrumbTitle = '<a href="'.$breadcrumb[$i]['url'].'">'.$breadcrumb[$i]['title'].'</a>';

                   }

                   ?>
                   <li <?=$breadcrumbClass?>><?=$breadcrumbTitle?></li>
               <?php } ?>
        </ul>
    </div>
</div>
        <div class="container">
          <div class="posts">
            <div class="row">
                <div class="col-lg-5 col-md-5 col-sm-12 col-xs-12">
                    <div class="thumb" style="vertical-align: middle;">
                        <img class="img-responsive" alt="Kunden Temposwiss" src="<?=WEB_URL?>/tmpl_brefis/img/wir-sind-kunden-temposwiss.jpg" />
                    </div>
                </div>
                <div class="col-lg-7 col-md-7 col-sm-12 col-xs-12">
                    <h3 class="p0" style="margin-top:0px;">Wir machen keine halben Sachen!</h3>
                    <p style="text-align: justify;">
                    Auf allen Gebieten der Beste sein ist praktisch unmöglich. Daher fokussieren wir uns auf bestimmte Kernbereiche. Wir identifizieren für Sie die geeigneten Mitarbeiter in den Bereichen "Bau & Handwerk", "Elektro & Mechanik", "Industrie & Produktion" sowie "Maschinen & Metallbau".
                    </p>

                    <p style="text-align: justify;">
                    Dieses Unternehmenskonzept Philosophie macht uns am Markt so erfolgreich. Ein Grund unseres Erfolgs besteht darin, dass unsere Personalvermittler aus den jeweiligen Branchen kommen. Die Erfahrungen unserer Mitarbeiter sind das Fundament unseres Erfolgs. Unsere Experten sind bestens vertraut mit den jeweiligen Anforderungen und wissen genau, worauf es in Ihrem Unternehmen ankommt.
                    </p>

                    <p style="text-align: justify;">
                    Der Erfolg von Brefis beruht auch auf unserer Fähigkeit, in regionalen Kategorien  zu denken und zu handeln. Daher verfügen die Niederlassungen unseres Netzwerks über die jeweils erforderlichen Kompetenzen und Fachkenntnisse für die regionalen Gegebenheiten.
                    </p>
                </div>
            </div>
          </div>

            <div class="posts">
                <div class="row">
                  <div class="col-md-12">
                    <div id="parentHorizontalTab">
                        <ul class="resp-tabs-list hor_1">
                            <li>Bau & Handwerk</li>
                            <li>Elektro & Mechanik</li>
                        </ul>

                        <div class="resp-tabs-container hor_1">
                            <div>
                                <div class="row">
                                    <div class="col-lg-7 col-md-7 col-sm-12 col-xs-12">
                                        <p style="text-align: justify;">
                                        Diese Branche ist für unsere Unternehmen die tragende Säule. Hier sind wir Zuhause und kennen wir uns so gut aus wie kaum ein anderer Mitbewerber. Wie erklärt sich dieser Vorsprung? Wir betrachten auch kleinere Unternehmen und Projekte als spannende Herausforderung. Wir bringen Sie voran und stellen Ihnen Unternehmen vor, mit denen wir im Bereich Bau & Handwerk mitunter seit Jahrzehnten zusammenarbeiten. Aus zahlreichen kleineren und grösseren Projekten kennen wir die massgeblichen Ansprechpartner vor Ort, die genau zu Ihnen passen. Wir kennen die Bedürfnisse unserer Kunden genau und wissen, welche Qualifikationen für die betreffende Position mitbringen müssen.
                                        </p>
                                        <p style="text-align: justify;">
                                        Die Personalvermittler, die Ihnen zur Seite stehen, haben zum Teil selbst auf vielen Baustellen gearbeitet und wissen was zählt. In der Baubranche zu arbeiten ist hart und oft sehr anspruchsvoll. Umso wichtiger ist einen Arbeitgeber, der faire Bedingungen, ein gutes Team und optimale Arbeitsbedingungen bietet. Wir finden für Sie eine Arbeitsstelle, die Ihrem Profil entspricht  und wo Ihre Qualifikation und Ihr Engagement gewürdigt werden. Dabei unterstützt Sie Brefis.
                                        </p>
                                        <a class="btn btn-secondary mt-15 mb-15" style="font-weight: bold;" href="/Vacancyboard?occupationGroup=1"> Stellenangebote</a>
                                    </div>
                                    <div class="col-md-5">
                                        <div class="thumb">
                                            <img class="img-responsive" alt="Feststellen Baustelle" src="<?=WEB_URL?>/tmpl_brefis/img/bau_personalvermittlung.jpg" />
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div>
                                <div class="row">
                                    <div class="col-lg-7 col-md-7 col-sm-12 col-xs-12">
                                        <p style="text-align: justify">
                                        Flexibilität und spezielle Begabungen sind in diesem Bereich unverzichtbar. Wenn Sie das erforderliche Know-How und Engagement mitbringen, können Sie über uns interessante Unternehmen in dieser Sparte kennen-lernen. Mit den entsprechenden Fähigkeiten und Qualifikationen wurde hier schon oft aus einzelnen Einsätzen eine Festanstellung in einem unserer Kundenunternehmen. Diese Branche bietet Ihnen interessante Herausforderungen. Das Elektrohandwerk hat in der Schweiz Zukunft und bietet vielfältige Möglichkeiten.
                                        </p>
                                        <a class="btn btn-secondary mt-15 mb-15" style="font-weight: bold;" href="/Vacancyboard?occupationGroup=19"> Stellenangebote</a>
                                    </div>
                                    <div class="col-md-5">
                                        <div class="thumb">
                                            <img class="img-responsive" alt="Elektro Mechanik Stellenangebote" src="<?=WEB_URL?>/tmpl_brefis/img/ElektroMechanik_Stellenangebote.png" />
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
              </div>
            </div>
        </div>


<?php include 'footer.php'; ?>