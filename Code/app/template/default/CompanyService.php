<?php include 'header.php'; 
$classCompany = 'active';
$classSubPageCompanyService = 'class="active"';
$breadcrumb[] = array('title' => 'Für Unternehmen',
                      'url' => '/Pages/company',
                    'active' => false);
$breadcrumb[] = array('title' => 'Dienstleistungen',
                      'url' => '',
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
<div class="page-content pb0">    
    <div class="container">
        <div class="box-wrapper white-container none-padding" id="temporaer">
            <div class="row">
                <div class=" col-lg-4 col-md-4 col-sm-12 col-xs-12 mb0 mt0">
                    <div class="thumb">	
                        <img alt="Dienstleistungen Temporärstellen Stellenangebote" src="<?= WEB_URL ?>/tmpl_ahapersonal/img/Dienstleistungen_Temporaerstellen_Stellenangebote.png" class="img-responsive" style="position: relative; width: 100%;">
                    </div>
                </div>
                <div class=" col-lg-8 col-md-8 col-sm-12 col-xs-12 mb0 mt0">					
                        <h3 class="p0 mt10">Temporärstellen</h3>
                        <p style="text-align: justify">
                            Die Bau - und Ausbaubranche unterliegt starken konjunkturellen Schwankungen; Auftragsspitzen wechseln sich mit Auftragsflauten ab. In diesem schwierigen Umfeld unterstützen wir Sie als Mentor und Lotse. Eine individuelle Mischung aus erfahrenen festen Mitarbeitern und unmittelbar und kurzfristig einsetzbaren Temporärmitarbeitern wird in Zukunft eine immer grössere Rolle bei betriebswirtschaftlichen Entscheidungen spielen. 
                        </p>

                        <p style="text-align: justify">
                            Unsere Berater (aus der Bau- und Ausbaubranche) fügen alle Teile zu einem funktionierenden Ganzen zusammen. Machen Sie mit uns den nächsten logischen Schritt und flexibilisieren Sie Ihre Fähigkeiten mit AHA. Alle Temporärmitarbeiter werden bei AHA eingehend betreut und unterstützt. Auf diese Weise erfahren wir, welche Stärken und Fähigkeiten unsere Temporärmitarbeiter haben und ob sie in Ihr Unternehmen passen. Sie "erwerben" von uns Arbeitsleistungen, aber letzten Endes sind es Menschen, die wir vermitteln.  
                        </p>

                        <p style="text-align: justify">
                            Unser Erfolg basiert auf einer genauen Beurteilung der Qualifikationen, basierend auf unserer Erfahrungen und das Know-How unserer Personalvermittler, die in aller Regel einen Hintergrund in dieser Branche haben. Wir sprechen die Sprache unserer Temporärmitarbeiter und bieten ein faires, vertrauensvolles Umfeld. Die Zusammenarbeit mit unseren Temporärmitarbeitern ist sehr eng und hat sich in vielen Einsätzen bewährt. Insofern steht es ausser Frage, ob ein von uns vermittelter Temporärmitarbeiter zu Ihrem Unternehmen passt. In der Regel passt es perfekt! Kümmern Sie sich um Ihr Kerngeschäft, wir erledigen den Rest. Ihre Vorteile sind unser breites Serviceangebot und die kurzen Wege in der deutschsprachigen Schweiz.  
                        </p>
                </div>				
            </div>
        </div>
    </div>
</div>

<div class="page-content pb0">      
    <div class="container">
        <div class="box-wrapper white-container none-padding" id="tryandhire">
            <div class="row">
                <div class=" col-lg-8 col-md-8 col-sm-12 col-xs-12 mb0 mt0">					
                    <h3 class="p0 mt10">Try & Hire</h3>
                    <p style="text-align: justify;">
                        Die wichtigste Frage bei der Personalsuche lautet: "Passt ein Mitarbeiter in mein Unternehmen oder nicht?". Wenn Sie diese Frage nicht unmittelbar beantworten können, ist unsere Try & Hire - Service die richtige Lösung für Sie. Nach dem Grundsatz "...drum prüfe wer sich ewig bindet..." ermöglicht dieses Modell eine "Einstellung auf Probe". Gerade für kleinere Unternehmen, die nicht über professionelle Personalmanager für die Auswahl des idealen Kandidaten für das Unternehmen verfügen, bietet diese Form der Einstellung ein praktisches Instrument, um den/die richtigen Arbeitnehmer/in zu finden. 
                    </p>

                    <p style="text-align: justify;">
                        Für den/die Arbeitnehmer/in unterscheidet sich dieses Modell vom Temporäreinsatz nur durch die Option, nach frühestens drei Monaten fest angestellt zu werden. Dadurch hat Ihr Unternehmen die Möglichkeit, dem/der Arbeitnehmer/in innerhalb von fünf Tagen zu kündigen. Der Nachteil für den/die Arbeitnehmer/in, nämlich die mangelnde Arbeitsplatzsicherheit in den ersten drei Monaten, kann sich aber auch als Vorteil erweisen, denn nicht jeder/jede Bewerber/in passt automatisch in jedes Unternehmen. Zum Beispiel wenn sich die Anforderungen und die Unternehmenskultur mit dem Bewerber als unvereinbar erweisen.
                    </p>

                    <p style="text-align: justify;">
                        Viele feste Arbeitsverhältnisse sind durch unsere Vermittlung  bereits zustande gekommen.
                        Wir beraten Sie gerne und unterbreiten Ihnen konkrete Angebote. 
                    </p>
                </div>	
                <div class=" col-lg-4 col-md-4 col-sm-12 col-xs-12">
                    <div class="thumb mb10 mt10">	
                        <img class="img-responsive" alt="Dienstleistungen Try&Hire Stellenangebote" src="<?= WEB_URL ?>/tmpl_ahapersonal/img/Dienstleistungen_TryHire_Stellenangebote.png" />
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="page-content pt30 pb30">      
    <div class="container">
        <div class="box-wrapper white-container none-padding" id="fest">
            <div class="row">
                <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12 mb0 mt0">
                    <div class="thumb mb10 mt10">	
                         <img alt="Dienstleistungen Feststellen Stellenangebote" src="<?= WEB_URL ?>/tmpl_ahapersonal/img/Dienstleistungen_Feststellen_Stellenangebote.png" class="img-responsive" >
                    </div>
                </div>
                <div class=" col-lg-8 col-md-8 col-sm-12 col-xs-12 mb0 mt0">						
                    <h3 class="p0 mt10">Vermittlung von Festanstellungen</h3>
                    <p style="text-align: justify;">
                        Den geeigneten Kandidaten zu finden, dessen Profil auf Ihre  Stellenausschreibung passt, ist ein schwieriges und ressourcenintensives Unterfangen – und zudem sehr teuer! Es geht aber auch einfacher.  Sie legen die Anforderungen fest und wir übernehmen für Sie den gesamten Recruiting-Prozess und stellen Ihnen für Bau, Ausbau und Industrie innerhalb kürzester Zeit eine Vorauswahl an Bewerbern zusammen.
                    </p>

                    <p style="text-align: justify;">
                        Wir sind die Experten. Bereits bevor in Ihrem Unternehmen Personalbedarf entsteht, führen wir viele Bewerbungsgespräche und haben so eine klare Vorstellung, wer zu Ihnen passen könnte. Wir kennen die Fähigkeiten unserer Mitarbeiter und wissen, wer aus unserem Netzwerk zu Ihnen passen könnte. Wir handeln proaktiv und vermeiden so eine zeit- und kostenaufwändige Suche. Auf diese Weise können Sie sich auf das Wesentliche konzentrieren und sich um Ihr Kerngeschäft kümmern. 
                    </p>

                    <p style="text-align: justify;">
                        Überlassen Sie das Recruiting den Spezialisten und sparen Sie Ressourceneinsatz und Zeitaufwand in diesem Bereich. So profitieren beide Seiten, Arbeitgeber und Arbeitnehmer, von dieser wirtschaftlichen Form des Suchens und Findens. 
                    </p>
                </div>				
            </div>
        </div>
    </div>
</div>

<?php include 'footer.php'; ?>