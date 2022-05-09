<?php include 'header.php';
$classAbout = 'active';
$classSubPageSwissStaffing = 'class="active"';
$breadcrumb[] = array('title' => 'Über aha',
                      'url' => '/Pages/aboutaha',
                    'active' => false);
$breadcrumb[] = array('title' => 'Qualitätsanspruch',
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
    <div class="page-content pt30 pb30">
    <div class="container">
        <div class="row">
            <div class="col-md-12 none-padding">
                <div class="white-container">
                        <div class="row">
                            <div class="col-md-9">
                                <h4 class="mt10" style="line-height: 1.1;">aha ist Mitglied bei <a href="http://www.swissstaffing.ch/" target="_blank">swissstaffing</a>, dem führenden Verband für Personaldienstleister</h4>
                                <p style="text-align: justify">
                                    Wir haben das swisstaffing SQS-Label und stehen für ethisch korrektes Arbeiten sowie für hohe und professionelle Branchenstandards. Hier verpflichten sich alle Mitglieder zur Einhaltung der folgenden Statuten:
                                </p>
                            </div>

                            <div class="col-md-3">
                                <a href="http://www.swissstaffing.ch/" target="_blank"><img alt="Swissstaffing" src="<?= WEB_URL ?>/tmpl_ahapersonal/img/swissstaffing_sqs.png"></a>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <h4>Ausbildung</h4>

                                <p style="text-align: justify">
                                    aha verfügt über in der Personalarbeit qualifizierte und dem Dienstleistungsangebot entsprechend ausgebildete Mitarbeiter.<br>
                                    aha bietet regelmässig Fachschulungen an, um alle Mitarbeiter auf den neuesten Stand zu bringen. Die Geschäftsleitung sorgt für die Einhaltung dieser Standards.
                                </p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <h4>Suchmandate</h4>
                                <div style="margin-left:25px;">
                                    <ul class="filter-list">
                                        <li><a href="javascript:void(0);">Die Vakanz ist erfasst; das Anforderungsprofil ist bekannt, ebenso Firma, Produkte, Führungsstil und Besonderheiten.</a></li>
                                        <li><a href="javascript:void(0);">Der Kunde ist im Besitz einer Auftragsbestätigung mit Leistungsumfang und AGBs.</a></li>
                                        <li><a href="javascript:void(0);">Die Bewerber sind erfasst und haben entweder Empfangsbestätigung oder Absage.</a></li>
                                        <li><a href="javascript:void(0);">Der Inhalt der Gespräche mit den Bewerbern ist in den wesentlichen Punkten schriftlich festgehalten.</a></li>
                                        <li><a href="javascript:void(0);">Aussagekräftige Dossiers sind nach Zustimmung des Bewerbers an den Kunden übermittelt.</a></li>
                                        <li><a href="javascript:void(0);">Die Zustimmung des Bewerbers zum Einholen von Referenzen liegt vor.</a></li>
                                        <li><a href="javascript:void(0);">Kunde und Bewerber sind regelmässig über den Fortschritt der Suche informiert.</a></li>
                                        <li><a href="javascript:void(0);">Das Mandat ist administrativ korrekt und gemäss Auftragsbestätigung und AGBs abgewickelt.</a></li>
                                        <li><a href="javascript:void(0);">Die Unterlagen der nicht berücksichtigten Bewerber sind an diese zurückgegeben oder in Absprache mit diesen aufbewahrt.</a></li>
                                        <li><a href="javascript:void(0);">Die Anforderungen des Datenschutzgesetzes bezüglich der Aufbewahrung vertraulicher Dokumente werden vollumfänglich beachtet.</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <h4>Vermittlungen</h4>
                                <div style="margin-left:25px;">
                                    <ul class="filter-list">
                                        <li><a href="javascript:void(0);">Die Vakanz ist erfasst; das Anforderungsprofil und die Firma sind bekannt.</a></li>
                                        <li><a href="javascript:void(0);">Der Kunde ist im Besitz der AGBs.</a></li>
                                        <li><a href="javascript:void(0);">Ein Bewerbungsgespräch mit dem Kandidaten hat stattgefunden, die Stelle ist besprochen, der Inhalt des Gesprächs ist in den wesentlichen Punkten schriftlich festgehalten.</a></li>
                                        <li><a href="javascript:void(0);">Aussagekräftige Dossiers sind nach Zustimmung des Bewerbers an den Kunden übermittelt.</a></li>
                                        <li><a href="javascript:void(0);">Die Zustimmung des Bewerbers zum Einholen von Referenzen liegt vor.</a></li>
                                        <li><a href="javascript:void(0);">Die Unterlagen der nicht berücksichtigten Bewerber sind an diese zurückgegeben oder in Absprache mit diesen aufbewahrt. </a></li>
                                        <li><a href="javascript:void(0);">Die Anforderungen des Datenschutzgesetzes bezüglich der Aufbewahrung vertraulicher Dokumente werden vollumfänglich beachtet.</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <h4>Personalverleih</h4>
                                <div style="margin-left:25px;">
                                    <ul class="filter-list">
                                        <li><a href="javascript:void(0);">Die Vakanz ist erfasst; das Anforderungsprofil und die Firma sind bekannt.</a></li>
                                        <li><a href="javascript:void(0);">Der Kunde besitzt eine Auftragsbestätigung mit Leistungsumfang und AGBs.</a></li>
                                        <li><a href="javascript:void(0);">Ein Bewerbungsgespräch mit dem Kandidaten hat stattgefunden, die Stelle ist besprochen, der Inhalt des Gesprächs ist in den wesentlichen Punkten schriftlich festgehalten.</a></li>
                                        <li><a href="javascript:void(0);">Ein Rahmenarbeitsvertrag mit dem/der Mitarbeiter(in) besteht, ebenso wie ein individueller Einsatzvertrag.</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <h4>Art der zu leistenden Arbeit</h4>
                                <div style="margin-left:25px;">
                                    <ul class="filter-list">
                                        <li><a href="javascript:void(0);">Arbeitsort sowie Beginn und Ende des Einsatzes inkl. Kündigungsfrist</a></li>
                                        <li><a href="javascript:void(0);">Lohn, Nebenleistungen, Abzüge, Spesen inkl. Auszahlungstermine</a></li>
                                        <li><a href="javascript:void(0);">Versicherungen (Prämien und Leistungen), Leistungen bei besonderen Bedingungen wie Militärdienst, Mutterschaft etc., Arbeitszeiten, allfällige besondere Vereinbarungen</a></li>
                                        <li><a href="javascript:void(0);">Die Lohnabrechnung erfolgt korrekt und gesetzeskonform (SUVA-konformes Lohnprogramm).</a></li>
                                        <li><a href="javascript:void(0);">Die BVG-Vorschriften werden eingehalten.</a></li>
                                        <li><a href="javascript:void(0);">Die Lohn- und Sozialabgaben werden ebenfalls vorschriftsmässig eingehalten, abgerechnet und überwiesen.</a></li>
                                        <li><a href="javascript:void(0);">Aussagekräftige Dossiers sind nach Zustimmung des Bewerbers an den Kunden übermittelt.</a></li>
                                        <li><a href="javascript:void(0);">Die Zustimmung des Bewerbers zum Einholen von Referenzen liegt vor.</a></li>
                                        <li><a href="javascript:void(0);">Der Einsatz ist administrativ korrekt und gemäss Auftragsbestätigung und AGBs abgewickelt.</a></li>
                                        <li><a href="javascript:void(0);">Die Unterlagen der nicht berücksichtigten Bewerber sind an diese zurückgegeben oder in Absprache mit diesen aufbewahrt.</a></li>
                                        <li><a href="javascript:void(0);">Die Anforderungen des Datenschutzgesetzes bezüglich der Aufbewahrung vertraulicher Dokumente werden vollumfänglich beachtet.</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <h4>Outplacement-Mandate</h4>
                                <div style="margin-left:25px;">
                                    <ul class="filter-list">
                                        <li><a href="javascript:void(0);">Aufträge für Outplacements werden nur von Firmen entgegengenommen oder von Kandidaten, die in einem gekündigten Arbeitsverhältnis stehen.</a></li>
                                        <li><a href="javascript:void(0);">Ein Berater darf nicht gleichzeitig individuelle Outplacement-Mandate und Rekrutierungsmandate betreuen.</a></li>
                                        <li><a href="javascript:void(0);">Der Berater kennt die Sachlage (Kündigungsgrund).</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="row" style="margin-top:25px;">
                            <div class="col-md-12">
                                <h5>Downloads</h5>
                                <a href="<?= WEB_URL ?>/tmpl_ahapersonal/media/swissstaffing_Qualitaetsstandards.pdf" target="_blank"class="btn btn-default"><i class="fa fa-file"></i>&nbsp; swissstaffing Qualitätsstandards</a>
                            </div>
                        </div>						
                </div>
            </div>
        </div>
    </div>
</div>
<?php include 'footer.php'; ?>