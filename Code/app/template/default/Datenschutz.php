<?php include 'header.php';
$classAbout = 'active';
//$classSubPageSwissStaffing = 'class="active"';
$breadcrumb[] = array('title' => 'Über aha',
                      'url' => '/Pages/aboutaha',
                    'active' => false);
$breadcrumb[] = array('title' => 'Datenschutz',
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
                            <div class="col-md-12">
                                <h4>DATENSCHUTZRICHTLINIE</h4>
                                <p style="text-align: justify">
                                    Die Benutzer der Webseite werden darauf aufmerksam gemacht, dass durch die Nutzung der Webseite Daten der Benutzer über ein jedermann zugängliches Netz geleitet werden.
Durch den Besuch der Website des Anbieters können Informationen über den Zugriff (Datum, Uhrzeit,betrachtete Seite) gespeichert werden. Es kann nicht garantiert werden, dass die Daten bei einer Datenübertragung über das Internet oder die Webseite vor Angriffen geschützt sind. Die Kommunikation zwischen der aha personal ag und den Benutzern, der via E-Mail, SMS etc. erfolgt, wird nicht verschlüsselt. Es besteht die Gefahr von Viren- und Hackerangriffen. Wir ergreifen jedoch wirtschaftlich vertretbare physische, elektronische, sowie prozessuale Massnahmen, um Ihre personenbezogenen Daten gemäss den Anforderungen der Datenschutzgesetze zu schützen.

Wir können die Daten, die Sie uns zur Verfügung gestellt haben, zur Erbringung der von Ihnen angefragten Arbeitsvermittlungs- und/oder Temporärdienste nutzen. Dazu zählt u. a. auch die Überprüfung sowie die Bereitstellung dieser uns zur Verfügung gestellten Daten für potenzielle und tatsächliche Einsatzbetriebe bzw. Arbeitnehmer. Wir verarbeiten einige Ihrer vertraulichen personenbezogenen Daten, wie z.B. Angaben zu Ihrer Nationalität, körperlichen und geistigen Gesundheit sowie über von Ihnen begangene oder mutmasslich begangene Straftaten.

                                </p>
                            </div>

                            
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <h4>Statistiken</h4>

                                <p style="text-align: justify">
                                    aha personal ag erhebt zur ständigen Optimierung des Angebots statistische Daten. So werden beispielsweise Daten gesammelt über die Anzahl geleisteter Arbeitsstunden pro Beruf und Branche, über das Verhältnis der Anzahl geleisteter Arbeitsstunden im Verhältnis zur Anzahl der Arbeitnehmer sowie über die Anzahl nicht ausgeübter Einsätze infolge mangelnder Arbeitnehmer.
                                </p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <h4>Personenbezogene Daten</h4>
                                <p style="text-align: justify">
Wir erfassen und verarbeiten im Rahmen des Einstellungs-/ und Registrationsverfahrens Ihre biografischen Daten (darunter Name, Geburtstag, Geschlecht), Kontaktdaten einschliesslich Ihrer Post- und E-Mail-Adresse, Telefonnummer und Mobiltelefon-Seriennummer, Angaben zum Lebenslauf, Ihr Foto (sofern Sie eines oder mehrere hochgeladen haben), Ihre Ausweispapiere und Arbeitsbewilligung für die Schweiz, Ihre Sozialversicherungsnummer, Pass- und/oder Visadaten, Ihre Bewertungsdaten, Angaben zum Bewerbungsgespräch, Angaben zu Ihrer Mobilität, Angaben zur Führerausweiskategorie, Angaben über Tattoos und/oder Piercings, Empfehlungen früherer Arbeitgeber (sofern Sie sich entschieden haben, diese bereitzustellen), Angaben zu Ihren für den Einsatz benötigten oder von Ihnen freiwillig angegebenen Qualifikationen.
Wir können Ihre personenbezogenen Daten wie folgt nutzen: Für jede Nutzung geben wir die rechtlichen Gründe an, die vorliegen, um unsere Nutzung Ihrer personenbezogenen Daten zu rechtfertigen. Das heisst:
Zur Herstellung des Kontakts zwischen Ihnen und den Arbeitnehmern bzw. Einsatzbetrieben. Dies geschieht im Rahmen eines grösstenteils automatischen Prozesses, der durch einen Algorithmus auf der Webseite (nachfolgend «die Anwendung» genannt) ermöglicht wird. Die Anwendung weist Ihnen auf Grundlage der Daten, die Sie uns zur Verfügung gestellt haben, und der vom Arbeitnehmer bzw. dem Einsatzbetrieb angegebenen Kriterien, Arbeitnehmer bzw. Einsatzbetriebe zu. Dabei kann es sein, dass Entscheidungen automatisiert getroffen werden, z. B. welche Einsatzbetriebe im Rahmen einer Bewerbung Ihr Profil erhalten. Wir stellen sicher, dass Sicherheitsmassnahmen getroffen werden, um Ihre Rechte, Freiheiten und rechtmässigen Interessen zu schützen. Darüber hinaus haben Sie das Recht, ein korrigierendes Eingreifen einzufordern und Entscheidungen anzufechten, die von der Anwendung automatisch getroffen wurden.
Sofern Sie ein Arbeitnehmer sind und einem Einsatzbetrieb zugeordnet wurden, stellen wir diesem, um diesen Einsatz durchführen zu können, Ihre personenbezogenen Daten einschliesslich Ihrer Identität und Ihrer Eignung für die entsprechende Position zur Verfügung. Der Einsatzbetrieb ist eigenständig für den Schutz dieser Daten verantwortlich und hat sicherzustellen, dass er beim Umgang mit personenbezogenen Daten von Arbeitnehmern alle geltenden Datenschutzgesetze und -vorschriften einhält. Wir übernehmen keine Haftung für Handlungen oder Unterlassungen des Einsatzbetriebs im Zusammenhang mit dessen Verarbeitung solcher personenbezogenen Daten. Arbeitskräfte sollten sämtliche Datenschutzrichtlinien der Einsatzbetriebe durchlesen um zu erfahren, wie die Einsatzbetriebe diese personenbezogenen Daten verarbeiten.
                                </p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <h4>Auskunft-, Widerrufs- und Widerspruchsrecht</h4>
                               <p style="text-align: justify">
Gemäss dem schweizerischen Datenschutzgesetz sowie der Datenschutz - Grundverordnung (EU) 2017/679 haben Sie in Bezug auf Ihre personenbezogenen Daten die im folgende n beschriebenen Rechte. Sie können von all diesen Rechten Gebrauch machen, indem Sie uns unter legal@ahapersonal.ch kontaktieren. Wir ermutigen unsere Kunden, sich im Falle von Bedenken oder Reklamationen an uns zu wenden. Sie haben aber auch das Recht, bei einer Aufsichtsbehörde wie dem Eidgenössischen Datenschutzbeauftragten (siehe https://www.edoeb.admin.ch/edoeb/de/home.html ) Beschwerde einzulegen.                                </p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <h4>Marketing</h4>
                                <p style="text-align: justify">
                                    Sie haben das Recht uns aufzufordern, dass wir Ihre personenbezogenen Daten nicht zu Marketingzwecken verarbeiten. Wir informieren Sie, wenn wir beabsichtigen, Ihre Daten zu solchen Zwecken zu benutzen oder Dritten offenzulegen. Sie können von Ihrem Recht Gebrauch machen eine entsprechende Datennutzung abzulehnen, indem Sie die jeweiligen Kästchen in den Einstellungen bei Ihrem Benutzungsprofil anwählen. Sie können auch jederzeit von diesem Recht Gebrauch machen, indem Sie uns wie oben beschrieben kontaktieren oder die entsprechenden Häkchen aus den jeweiligen Kästchen in den Einstellungen in Ihrem Profil auf der Webseite entfernen.
                                </p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <h4>Zugriffsrecht</h4>
                                <p style="text-align: justify">
                                    Sie haben das Recht, dass wir Ihnen kostenlos eine Kopie Ihrer personenbezogenen Daten zur Verfügung stellen. Solange Ihr Konto aktiv ist, haben Sie Zugriff auf all Ihre Profildaten und können jederzeit auf diese zugreifen. Ihre erste angeforderte Kopie Ihrer verarbeiteten personenbezogenen Daten wird Ihnen kostenlos zur Verfügung gestellt. Für alle weiteren Kopien können wir Ihnen eine Verarbeitungsgebühr in Rechnung stellen. Für wiederholte, unverhältnismässige oder klar unbegründete Anfragen wird Ihnen eine angemessene Gebühr für den Verwaltungsaufwand in Rechnung gestellt. In diesen Fällen können wir entsprechende Anfragen auch ablehnen.
                                </p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <h4>Löschung des Accounts </h4>
                                <p style="text-align: justify">
Sie haben das Recht uns in bestimmten Situationen um die Löschung all Ihrer personenbezogenen Daten zu ersuchen, z. B. wenn die Verarbeitung allein auf Zustimmung basiert und kein sonstiger rechtlicher Grund, wie nachgehend beschrieben, für eine solche Datenverarbeitung unsererseits vorliegt. Nehmen Sie zur Kenntnis, dass sobald Sie einen Einsatz angenommen für aha personal ag durchgeführt haben, aha personal ag von Gesetzes wegen dazu verpflichtet ist, die Daten, welche mit der Ausführung dieses Einsatzes zu tun haben, inklusive Ihrer personenbezogenen Daten, zu speichern und für mindestens 5 Jahre aufzubewahren. Sie können Ihr Profil jederzeit entweder über die Anwendung oder über unseren Support-Dienst deaktivieren.                                </p>
                            </div>
                        </div>					
                </div>
            </div>
        </div>
    </div>
</div>
<?php include 'footer.php'; ?>