<?php include 'header.php';
$classAbout = 'active';
$classSubPageDivisions = 'class="active"';
$breadcrumb[] = array('title' => 'Über aha',
                      'url' => '/Pages/aboutAHA',
                    'active' => false);
$breadcrumb[] = array('title' => 'Fachbereiche',
                      'url' => '/Pages/companydivisions',
                    'active' => true);
include 'navigation.php'; ?>
        <div class="header-page-title">
			<div class="container">
				<h1><?=$data['title']?></h1>

				<ul class="breadcrumbs">
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
    </header>
    <div class="page-content pt30 pb0">
        <div class="container">
            <div class="box-wrapper white-container">
                <div class="row">			
                    <div class="col-lg-5 col-md-5 col-sm-12 col-xs-12"  style="padding-left:0px;">
                        <div class="thumb">
                            <img class="img-responsive" alt="Stellenangebote Fachbereiche" src="<?=WEB_URL?>/tmpl_ahapersonal/img/stellenangebote-fachbereiche.png" />
                        </div>
                    </div> 
                    <div class="col-lg-7 col-md-7 col-sm-12 col-xs-12" style="padding-right:0px;">                                        
                        <h4 class="p0 mt10">Was wir anpacken, machen wir richtig!</h4>
                        <p style="text-align: justify;">
                        Niemand kann in alle Bereichen der Beste sein. Daher konzentrieren wir uns auf einige wenige Kernbereiche. Wir finden für Sie die richtigen Mitarbeiter in den Bereichen "Bau & Handwerk", "Elektro & Mechanik", "Industrie & Produktion" sowie "Maschinen & Metallbau". 
                        </p>

                        <p style="text-align: justify;">
                        Diese Philosophie macht uns auf dem Markt sehr erfolgreich. Ein Grund hierfür besteht darin, dass unsere Personalvermittler aus den jeweiligen Branchen stammen. Die Erfahrungen unserer Mitarbeiter bildet das Fundament unseres Erfolgs. Unsere Experten verstehen Ihre Anforderungen und wissen genau, was ein Unternehmen in der jeweiligen Branche braucht.
                        </p>

                        <p style="text-align: justify;">
                        Der Erfolg von AHA beruht zudem auf unserer Fähigkeit, regional zu denken und zu handeln. Daher verfügen die Niederlassungen unseres Netzwerks über individuelle Kompetenzen und Fachkenntnisse, die auf die regionalen Anforderungen abgestimmt sind.  
                        </p>                                  
                    </div>
                </div>				
            </div>
        </div>
    </div>

                    
    <div class="page-content pt30 pb0">
        <div class="container">
            <div class="box-wrapper white-container">
                <div class="row">	
                    <div class="responsive-tabs">
                        <ul class="nav nav-tabs">
                            <li class="active"><a href="#tab-bau-handwerk">Bau & Handwerk</a></li>
                            <li><a href="#tab-elektro-mechanik">Elektro & Mechanik</a></li>
                        </ul>

                        <div class="tab-content">
                            <div class="tab-pane active" id="tab-bau-handwerk">
                                <div class="row">
                                    <div class="col-lg-7 col-md-7 col-sm-12 col-xs-12">
                                        <p style="text-align: justify;">
                                        Diese Branche bildet das Rückgrat unseres Unternehmens. Hier kennen wir uns so gut aus wie kaum ein anderer Mitbewerber. Wie kommt dieser Vorsprung zustande? Für uns sind auch kleinere Unternehmen und Projekte eine wertvolle Aufgabe und Herausforderung. Wir bringen Sie nach vorne und stellen Ihnen Unternehmen vor, mit denen wir im Bereich Bau & Handwerk zum Teil seit Jahrzehnten zusammenarbeiten. Aus vielen kleineren und grösseren Projekten kennen wir Ansprechpartner vor Ort, die Ihre Sprache sprechen. Wir kennen die Anforderungen unserer Kunden genau und wissen, ob Sie für die betreffende Position die nötigen Qualifikationen mitbringen. 
                                        </p>
                                        <p style="text-align: justify;">
                                        Die Personalvermittler, die Sie betreuen, haben zum Teil selbst auf vielen Baustellen gearbeitet und wissen worum es geht. Die Arbeit in der Baubranche ist anstrengend und oft sehr anspruchsvoll. Umso wertvoller ist einen Arbeitgeber, der faire Bedingungen, ein gutes Team und optimale Arbeitsbedingungen bietet. Wir finden für Sie eine Stelle, die Ihnen gerecht wird und wo Ihr Können und Ihr Einsatz gewürdigt werden. Dabei unterstützt Sie AHA.
                                        </p>
                                        <a class="btn btn-default mt-15 mb-15" style="font-weight: bold;" href="/Vacancyboard?occupationGroup=1"> Stellenangebote</a>
                                    </div>
                                    <div class="col-md-5">
                                        <div class="thumb"> 
                                            <img class="img-responsive" alt="Bau Handwerk Stellenangebote" src="<?=WEB_URL?>/tmpl_ahapersonal/img/BauHandwerk_Stellenangebote.png" />
                                        </div>                                           
                                    </div>
                                </div>
                            </div>

                            <div class="tab-pane" id="tab-elektro-mechanik">
                                <div class="row">                                    
                                    <div class="col-lg-7 col-md-7 col-sm-12 col-xs-12">                                     
                                        <p style="text-align: justify">
                                        Flexibilität und besondere Fertigkeiten sind in diesem Bereich eine unverzichtbare Voraussetzung. Wenn Sie die erforderlichen Qualifikationen mitbringen, können Sie durch uns interessante Unternehmen in dieser Branche kennenlernen. Mit den entsprechenden Fähigkeiten und Qualifikationen wurden in diesem Bereich schon viele Engagements in eine Festanstellung in einem unserer Kundenunternehmen. Hier warten interessante Herausforderungen auf Sie. Das Elektrohandwerk hat in der Schweiz Zukunft und bietet vielfältige Möglichkeiten.
                                        </p>
                                        <a class="btn btn-default mt-15 mb-15" style="font-weight: bold;" href="/Vacancyboard?occupationGroup=19"> Stellenangebote</a>
                                    </div>
                                    <div class="col-md-5">
                                        <div class="thumb"> 
                                            <img class="img-responsive" alt="Elektro Mechanik Stellenangebote" src="<?=WEB_URL?>/tmpl_ahapersonal/img/ElektroMechanik_Stellenangebote.png" />
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