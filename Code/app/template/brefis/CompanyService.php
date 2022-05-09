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
    <div class="none-padding" id="temporaer">
        <div class="row">
            <div class="col-md-12">
                <h2 class="p0 mt0" style="margin-top: 0px;">Temporärstellen</h2>
            </div>
        </div>
        <div class="row">
            <div class=" col-lg-4 col-md-4 col-sm-12 col-xs-12 mb0 mt0">
                <div class="thumb">	
                    <img alt="Dienstleistungen Temporärstellen Stellenangebote" src="<?= WEB_URL ?>/tmpl_brefis/img/Dienstleistungen_Temporaerstellen_Stellenangebote.png" class="img-responsive" style="position: relative; width: 100%;">
                </div>
            </div>
            <div class=" col-lg-8 col-md-8 col-sm-12 col-xs-12 mb0">					                  
                    <p style="text-align: justify">Die Bau - und Ausbaubranche unterliegt starken saisonalen Schwankungen; Auftragsspitzen wechseln sich mit Auftragsflauten ab. Unter diesen schwierigen Bedingungen sind wir Ihr zuverlässiger Begleiter und Lotse. Eine perfekte Mischung aus erfahrenen Festangestellten und auf Abruf und kurzfristig einsetzbaren Temporärmitarbeitern wird in Zukunft eine immer wichtigere Rolle bei unternehmensrelevanten Entscheidungen spielen.</p>
                    <p style="text-align: justify">Unsere Berater (aus der Bau- und Ausbaubranche) bringen alle Anforderungen, Qualifikationen und sonstigen Faktoren miteinander in Einklang und fügen sie zu einem funktionierenden Ganzen zusammen. Machen Sie mit uns den nächsten logischen Schritt und flexibilisieren Sie Ihre Fähigkeiten mithilfe des Know-How von Brefis. Alle Temporärmitarbeiter werden bei von unseren HR-Experten eingehend auf ihre Qualifikationen geprüft. Dadurch erfahren wir, welche Fähigkeiten unsere Temporärmitarbeiter haben und ob sie in Ihr Unternehmen passen. Sie "erwerben" von uns Arbeitsleistungen, aber letzten Endes sind es Menschen, die wir vermitteln.</p>
                    <p style="text-align: justify">Unser Erfolg basiert auf einer minutiösen Beurteilung der Qualifikationen, basierend auf unserer Erfahrungen und dem Know-How unserer Personalvermittler, die mit der Branche bestens vertraut sind. Wir liegen mit unseren Temporärmitarbeitern auf einer Wellenlänge und bieten ein faires, vertrauensvolles Umfeld. Die Kooperation mit unseren Temporärmitarbeitern ist sehr eng und hat sich in vielen Einsätzen bewährt. Daher kann in keinem Fall ein Zweifel aufkommen, ob ein von uns vermittelter Temporärmitarbeiter zu Ihrem Unternehmen passt. Denn in aller Regel passt es perfekt! Sie konzentrieren sich auf Ihr Kerngeschäft, wir erledigen den Rest. Ihre Vorteile sind unser breites Serviceangebot und die kurzen Distanzen in der deutschsprachigen Schweiz.</p>
            </div>				
        </div>
    </div>
</div>

    <br/> <br/> 
    <div class="container">
        <div class="none-padding" id="tryandhire">
            <div class="row">
                <div class="col-md-12">
                    <h2 class="p0 mt10" style="margin-top: 0px;">Try & Hire</h2>
                </div>
            </div>
            <div class="row">
                <div class=" col-lg-8 col-md-8 col-sm-12 col-xs-12 mb0 mt0">					                   
                    <p style="text-align: justify;">Die wichtigste Frage bei der Personalgewinnung lautet: "Passt dieser Mitarbeiter zu meinem Unternehmen oder nicht?". Wenn Sie diese Frage nicht sofort beantworten können, ist unsere Try & Hire - Service die ideale Option für Sie. Nach dem Grundsatz "...drum prüfe wer sich ewig bindet..." ermöglicht diese Option eine "Einstellung auf Probe". Gerade für kleinere Unternehmen, die nicht über eine grosse Personalabteilung für die Auswahl des perfekten Kandidaten für das Unternehmen verfügen, bietet diese Form der Einstellung ein praktisches Instrument, um den/die richtigen Arbeitnehmer/in zu finden.</p>
                    <p style="text-align: justify;">Der Unterschied dieses Modells gegenüber dem Temporäreinsatz besteht für den/die Arbeitnehmer/in lediglich darin, dass er/sie nach frühestens nach drei Monaten fest angestellt werden kann. Dies bietet Ihrem Unternehmen die Möglichkeit, dem/der Arbeitnehmer/in innerhalb von fünf Tagen kündigen zu können. Der Nachteil für den/die Arbeitnehmer/in, nämlich die vereinfachte Kündbarkeit in den ersten drei Monaten, kann sich aber als Vorteil herausstellen, denn nicht jeder/jede Bewerber/in fühlt sich in jedem Unternehmen heimisch, zum Beispiel wenn sich die Anforderungen und die Unternehmenskultur mit dem Bewerber als unvereinbar erweisen.</p>
                    <p style="text-align: justify;">Viele feste Arbeitsverhältnisse sind unter unserer „Ägide“ bereits zustande gekommen. Wir freuen uns auf ein Beratungsgespräch und unterbreiten Ihnen gerne konkrete Angebote.</p>
                </div>	
                <div class=" col-lg-4 col-md-4 col-sm-12 col-xs-12">
                    <div class="thumb mb10 mt10">	
                        <img alt="Dienstleistungen Try&Hire Stellenangebote" class="img-responsive" src="<?= WEB_URL ?>/tmpl_brefis/img/Dienstleistungen_TryHire_Stellenangebote.png" />
                    </div>
                </div>
            </div>
        </div>
    </div>

    <br/> <br/> 
    <div class="container">
        <div class="none-padding" id="fest">
            <div class="row">
                <div class="col-md-12">
                    <h2 class="p0 mt10" style="margin-top: 0px;">Vermittlung von Festanstellungen</h2>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12 mb0 mt0">
                    <div class="thumb mb10 mt10">	
                         <img alt="Dienstleistungen Feststellen Stellenangebote" src="<?= WEB_URL ?>/tmpl_brefis/img/Dienstleistungen_Feststellen_Stellenangebote.png" class="img-responsive" >
                    </div>
                </div>
                <div class=" col-lg-8 col-md-8 col-sm-12 col-xs-12 mb0 mt0">						
                    <p style="text-align: justify;">Den geeigneten Bewerber für eine Stelle zu finden, dessen Profil Ihren Anforderungen entspricht, ist ein schwieriges und ressourcenintensives Unterfangen – und zudem sehr teuer! Es geht aber auch einfacher: Sie legen die Anforderungen fest und wir übernehmen für Sie den gesamten Recruiting-Prozess und stellen Ihnen für Bau, Ausbau und Industrie im Handumdrehen eine Vorauswahl an Bewerbern zusammen.</p>
                    <p style="text-align: justify;">Profitieren Sie von unserem Know-How. Bereits bevor in Ihrem Unternehmen Personalbedarf entsteht, führen wir viele Bewerbungsgespräche. Auf diese Weise wissen wir bereits im Vorfeld, wer zu Ihnen passen könnte. Wir kennen die Qualifikationen unserer Mitarbeiter und wissen, wer aus unserem Netzwerk zu Ihnen passen könnte. Wir werden proaktiv tätig und vermeiden so eine zeitaufwändige Suche. Auf diese Weise bleibt Ihnen mehr Zeit für das Wesentliche und Sie können sich auf Ihr Kerngeschäft konzentrieren.</p>
                    <p style="text-align: justify;">Überlassen Sie das Recruiting den Fachleuten und sparen Sie Ressourcen und Zeit bei der Mitarbeitersuche. So profitieren beide Seiten, Arbeitgeber und Arbeitnehmer, von dieser effizienten und wirtschaftlichen Form des Suchens und Findens.</p>
                </div>				
            </div>
        </div>
    </div>

<?php include 'footer.php'; ?>