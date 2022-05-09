<?php include 'header.php';
$classAbout = 'active';
$classSubPageSwissStaffing = 'class="active"';
$breadcrumb[] = array('title' => 'Über brefis',
                      'url' => '/Pages/aboutbrefis',
                    'active' => false);
$breadcrumb[] = array('title' => 'Qualitätsanspruch',
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
        <div class="row">
            <div class="col-md-12">
                <div class="white-container">
                    <div class="row">
                        <div class="col-md-8">
                            <h4 class="mt10" style="line-height: 1.1;">brefis personal ag ist Mitglied bei <a href="http://www.swissstaffing.ch/" target="_blank" style="text-decoration: none;">swissstaffing</a>, dem führenden Verband für Personaldienstleister</h4>
                            <p style="text-align: justify">
                                Wir haben das swisstaffing SQS-Label und stehen für ethisch korrektes Arbeiten sowie für hohe und professionelle Branchenstandards. Hier verpflichten sich alle Mitglieder zur Einhaltung der folgenden Statuten:
                            </p>
                        </div>

                        <div class="col-md-4">
                            <a href="http://www.swissstaffing.ch/" target="_blank"><img src="<?= WEB_URL ?>/tmpl_brefis/img/swissstaffing_sqs.png" style="width:100%;height:100%;"></a>
                        </div>
                    </div>
                    <div class="row">
                        <div class=col-md-12>
                            <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true" style="margin-top:15px;">
                                <div class="panel panel-default">
                                  <div class="panel-heading" role="tab" id="headingSix">
                                    <h4 class="panel-title">
                                      <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#ausbildung" aria-expanded="false" aria-controls="ausbildung" style="text-decoration: none;">
                                        <h4>Ausbildung</h4>
                                      </a>
                                    </h4>
                                  </div>
                                  <div id="ausbildung" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingSix">
                                    <div class="panel-body">
                                        <p style="text-align: justify">
                                            brefis personal ag verfügt über in der Personalarbeit qualifizierte und dem Dienstleistungsangebot entsprechend ausgebildete Mitarbeiter.<br>
                                            brefis personal ag bietet regelmässig Fachschulungen an, um alle Mitarbeiter auf den neuesten Stand zu bringen. Die Geschäftsleitung sorgt für die Einhaltung dieser Standards.
                                        </p>
                                    </div>
                                  </div>
                                </div>
                                <div class="panel panel-default">
                                  <div class="panel-heading" role="tab" id="headingOne">
                                    <h4 class="panel-title">
                                      <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#suchmandate" aria-expanded="false" aria-controls="suchmandate" style="text-decoration: none;">
                                        <h4>Suchmandate</h4>
                                      </a>
                                    </h4>
                                  </div>
                                  <div id="suchmandate" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingOne">
                                    <div class="panel-body">
                                      <div style="margin-left:15px;">
                                            <ul style="list-style-type:none !important;">
                                                <li><i class="fa fa-chevron-right" aria-hidden="true"></i>Die Vakanz ist erfasst; das Anforderungsprofil ist bekannt, ebenso Firma, Produkte, Führungsstil und Besonderheiten.</li>
                                                <li><i class="fa fa-chevron-right" aria-hidden="true"></i>Der Kunde ist im Besitz einer Auftragsbestätigung mit Leistungsumfang und AGBs.</li>
                                                <li><i class="fa fa-chevron-right" aria-hidden="true"></i>Die Bewerber sind erfasst und haben entweder Empfangsbestätigung oder Absage.</li>
                                                <li><i class="fa fa-chevron-right" aria-hidden="true"></i>Der Inhalt der Gespräche mit den Bewerbern ist in den wesentlichen Punkten schriftlich festgehalten.</li>
                                                <li><i class="fa fa-chevron-right" aria-hidden="true"></i>Aussagekräftige Dossiers sind nach Zustimmung des Bewerbers an den Kunden übermittelt.</li>
                                                <li><i class="fa fa-chevron-right" aria-hidden="true"></i>Die Zustimmung des Bewerbers zum Einholen von Referenzen liegt vor.</li>
                                                <li><i class="fa fa-chevron-right" aria-hidden="true"></i>Kunde und Bewerber sind regelmässig über den Fortschritt der Suche informiert.</li>
                                                <li><i class="fa fa-chevron-right" aria-hidden="true"></i>Das Mandat ist administrativ korrekt und gemäss Auftragsbestätigung und AGBs abgewickelt.</li>
                                                <li><i class="fa fa-chevron-right" aria-hidden="true"></i>Die Unterlagen der nicht berücksichtigten Bewerber sind an diese zurückgegeben oder in Absprache mit diesen aufbewahrt.</li>
                                                <li><i class="fa fa-chevron-right" aria-hidden="true"></i>Die Anforderungen des Datenschutzgesetzes bezüglich der Aufbewahrung vertraulicher Dokumente werden vollumfänglich beachtet.</li>
                                            </ul>
                                        </div>
                                    </div>
                                  </div>
                                </div>
                                <div class="panel panel-default">
                                  <div class="panel-heading" role="tab" id="headingTwo">
                                    <h4 class="panel-title">
                                      <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#vermittlungen" aria-expanded="false" aria-controls="vermittlungen" style="text-decoration: none;">
                                          <h4>Vermittlungen</h4>
                                      </a>
                                    </h4>
                                  </div>
                                  <div id="vermittlungen" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
                                    <div class="panel-body">
                                        <div style="margin-left:15px;">
                                            <ul style="list-style-type:none !important;">
                                                <li><i class="fa fa-chevron-right" aria-hidden="true"></i>Die Vakanz ist erfasst; das Anforderungsprofil und die Firma sind bekannt.</li>
                                                <li><i class="fa fa-chevron-right" aria-hidden="true"></i>Der Kunde ist im Besitz der AGBs.</li>
                                                <li><i class="fa fa-chevron-right" aria-hidden="true"></i>Ein Bewerbungsgespräch mit dem Kandidaten hat stattgefunden, die Stelle ist besprochen, der Inhalt des Gesprächs ist in den wesentlichen Punkten schriftlich festgehalten.</li>
                                                <li><i class="fa fa-chevron-right" aria-hidden="true"></i>Aussagekräftige Dossiers sind nach Zustimmung des Bewerbers an den Kunden übermittelt.</li>
                                                <li><i class="fa fa-chevron-right" aria-hidden="true"></i>Die Zustimmung des Bewerbers zum Einholen von Referenzen liegt vor.</li>
                                                <li><i class="fa fa-chevron-right" aria-hidden="true"></i>Die Unterlagen der nicht berücksichtigten Bewerber sind an diese zurückgegeben oder in Absprache mit diesen aufbewahrt. </li>
                                                <li><i class="fa fa-chevron-right" aria-hidden="true"></i>Die Anforderungen des Datenschutzgesetzes bezüglich der Aufbewahrung vertraulicher Dokumente werden vollumfänglich beachtet.</li>
                                            </ul>
                                        </div>
                                    </div>
                                  </div>
                                </div>
                                <div class="panel panel-default">
                                  <div class="panel-heading" role="tab" id="headingThree">
                                    <h4 class="panel-title">
                                      <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#personalverleih" aria-expanded="false" aria-controls="personalverleih" style="text-decoration: none;">
                                        <h4>Personalverleih</h4>
                                      </a>
                                    </h4>
                                  </div>
                                  <div id="personalverleih" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingThree">
                                    <div class="panel-body">
                                        <div style="margin-left:15px;">
                                            <ul style="list-style-type:none !important;">
                                                <li><i class="fa fa-chevron-right" aria-hidden="true"></i>Die Vakanz ist erfasst; das Anforderungsprofil und die Firma sind bekannt.</li>
                                                <li><i class="fa fa-chevron-right" aria-hidden="true"></i>Der Kunde besitzt eine Auftragsbestätigung mit Leistungsumfang und AGBs.</li>
                                                <li><i class="fa fa-chevron-right" aria-hidden="true"></i>Ein Bewerbungsgespräch mit dem Kandidaten hat stattgefunden, die Stelle ist besprochen, der Inhalt des Gesprächs ist in den wesentlichen Punkten schriftlich festgehalten.</li>
                                                <li><i class="fa fa-chevron-right" aria-hidden="true"></i>Ein Rahmenarbeitsvertrag mit dem/der Mitarbeiter(in) besteht, ebenso wie ein individueller Einsatzvertrag.</li>
                                            </ul>
                                        </div>
                                    </div>
                                  </div>
                                </div>
                                <div class="panel panel-default">
                                  <div class="panel-heading" role="tab" id="headingFour">
                                    <h4 class="panel-title">
                                      <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#artzuleistendearbeit" aria-expanded="false" aria-controls="artzuleistendearbeit" style="text-decoration: none;">
                                        <h4>Art der zu leistenden Arbeit</h4>
                                      </a>
                                    </h4>
                                  </div>
                                  <div id="artzuleistendearbeit" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingFour">
                                    <div class="panel-body">
                                        <div style="margin-left:15px;">
                                            <ul style="list-style-type:none !important;">
                                                <li><i class="fa fa-chevron-right" aria-hidden="true"></i>Arbeitsort sowie Beginn und Ende des Einsatzes inkl. Kündigungsfrist</li>
                                                <li><i class="fa fa-chevron-right" aria-hidden="true"></i>Lohn, Nebenleistungen, Abzüge, Spesen inkl. Auszahlungstermine</li>
                                                <li><i class="fa fa-chevron-right" aria-hidden="true"></i>Versicherungen (Prämien und Leistungen), Leistungen bei besonderen Bedingungen wie Militärdienst, Mutterschaft etc., Arbeitszeiten, allfällige besondere Vereinbarungen</li>
                                                <li><i class="fa fa-chevron-right" aria-hidden="true"></i>Die Lohnabrechnung erfolgt korrekt und gesetzeskonform (SUVA-konformes Lohnprogramm).</li>
                                                <li><i class="fa fa-chevron-right" aria-hidden="true"></i>Die BVG-Vorschriften werden eingehalten.</li>
                                                <li><i class="fa fa-chevron-right" aria-hidden="true"></i>Die Lohn- und Sozialabgaben werden ebenfalls vorschriftsmässig eingehalten, abgerechnet und überwiesen.</li>
                                                <li><i class="fa fa-chevron-right" aria-hidden="true"></i>Aussagekräftige Dossiers sind nach Zustimmung des Bewerbers an den Kunden übermittelt.</li>
                                                <li><i class="fa fa-chevron-right" aria-hidden="true"></i>Die Zustimmung des Bewerbers zum Einholen von Referenzen liegt vor.</li>
                                                <li><i class="fa fa-chevron-right" aria-hidden="true"></i>Der Einsatz ist administrativ korrekt und gemäss Auftragsbestätigung und AGBs abgewickelt.</li>
                                                <li><i class="fa fa-chevron-right" aria-hidden="true"></i>Die Unterlagen der nicht berücksichtigten Bewerber sind an diese zurückgegeben oder in Absprache mit diesen aufbewahrt.</li>
                                                <li><i class="fa fa-chevron-right" aria-hidden="true"></i>Die Anforderungen des Datenschutzgesetzes bezüglich der Aufbewahrung vertraulicher Dokumente werden vollumfänglich beachtet.</li>
                                            </ul>
                                        </div>
                                    </div>
                                  </div>
                                </div>
                                <div class="panel panel-default">
                                  <div class="panel-heading" role="tab" id="headingFive">
                                    <h4 class="panel-title">
                                      <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#outplacement" aria-expanded="false" aria-controls="outplacement" style="text-decoration: none;">
                                        <h4>Outplacement-Mandate</h4>
                                      </a>
                                    </h4>
                                  </div>
                                  <div id="outplacement" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingFive">
                                    <div class="panel-body">
                                        <div style="margin-left:15px;">
                                            <ul style="list-style-type:none !important;">
                                                <li><i class="fa fa-chevron-right" aria-hidden="true"></i>Aufträge für Outplacements werden nur von Firmen entgegengenommen oder von Kandidaten, die in einem gekündigten Arbeitsverhältnis stehen.</li>
                                                <li><i class="fa fa-chevron-right" aria-hidden="true"></i>Ein Berater darf nicht gleichzeitig individuelle Outplacement-Mandate und Rekrutierungsmandate betreuen.</li>
                                                <li><i class="fa fa-chevron-right" aria-hidden="true"></i>Der Berater kennt die Sachlage (Kündigungsgrund).</li>
                                            </ul>
                                        </div>
                                    </div>
                                  </div>
                                </div>
                              </div>
                        </div> 
                    </div>
                    <div class="row" style="margin-top:25px;">
                        <div class="col-md-12"> 
                            <h5>Downloads</h5>
                            <a href="<?= WEB_URL ?>/tmpl_brefis/media/swissstaffing_Qualitaetsstandards.pdf" target="_blank" class="btn btn-secondary"><i class="fa fa-file"></i>&nbsp; swissstaffing Qualitätsstandards</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php include 'footer.php'; ?>
