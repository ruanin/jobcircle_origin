<?php include 'header.php';
$classCandidate = 'active';
$classSubPageCitizen = 'class="active"';

$breadcrumb[] = array('title' => 'Für Bewerber',
                      'url' => '/Pages/candidate',
                    'active' => false);
$breadcrumb[] = array('title' => 'EU-Bürger Info',
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
            <div class="white-container none-padding">
                <div class="row">
                    <div class=" col-lg-5 col-md-5 col-sm-12 col-xs-12">
                        <div class="thumb">
                            <img class="img-responsive" alt="Arbeiten Schweiz" src="<?=WEB_URL?>/tmpl_brefis/img/arbeiten_in_der_schweiz.png" />
                        </div>
                    </div>
                    <div class=" col-lg-7 col-md-7 col-sm-12 col-xs-12">
                        <h4 class="mt10" style="margin-top:0px;">Werden Sie Teil unseres Netzwerkes, Teil eines starken Teams</h4>
                        <div style="border-bottom: 1px solid #dddddd; padding-bottom: 5px;">
                            <p style="text-align: justify;">
                            Die Schweiz bietet vielen Menschen eine Perspektive. Wir können Ihnen viele Wege ebnen und zeigen, wie Sie in einem der schönsten Länder dieser Erde beruflich Fuss fassen können. Brefis sucht gezielt EU-Bürger mit Erfahrungen in den Kompetenzbereichen, auf die sich das Unternehmen fokussiert (Bau/Ausbau und Industrie). Wenn Sie neue berufliche Herausforderungen suchen, finden wir eine Stelle, die zu Ihrem Profil passt. 
                            </p>
                        </div>

                        <p style="margin-top: 10px; text-align: justify;">Benötigen Sie weitere Informationen über Arbeitsmöglichkeiten in der Schweiz? Zum Beispiel über Aufenthalts- und Arbeitsbewilligungen, Quellensteuer oder Krankenversicherung? Unserer Experten kennen sich mit solchen Dingen aus und unterstützen unsere ausländischen Temporärmitarbeiter bei allen damit verbundenen Fragen und Belangen. Ob Behördengänge, Anmeldungen, Unterbringung oder Wohnung: wir helfen Ihnen gerne.
                        </p>

                        <h5 style="text-align: center;">Hier können Sie Ihre Fragen stellen oder um einen Rückruf bitten:</h5>
                        <p style="text-align: center" style="margin-top: 11px;">
                            <a href="/Contact" class="btn btn-secondary"">FRAGEN SIE UNS!</a>
                        </p>
                    </div>
                </div>
            </div>
        </div>
<br/>
        <div class="container">
            <div id="Info">
                <ul class="resp-tabs-list hor_1">
                    <li>Vor der Einreise</li>
                    <li>Bewilligungen</li>
                    <li>Aufenthaltsbewilligungen</li>
                    <li>Rechtliche Bestimmungen</li>
                    <li>Kinder</a></li>
                </ul>

                <div class="resp-tabs-container hor_1">
                    <div><p>
                        <div id="Vor_der_Einreise">
                            <ul class="resp-tabs-list ver_1">
                                <li>Der bevorstehende Umzug</li>
                                <li>Fehlt Ihnen noch eine Unterkunft?</li>
                                <li>Suchen Sie eine Mietwohnung?</li>
                                <li>Fahrzeugimport</li>
                            </ul>
                            <div class="resp-tabs-container ver_1">
                                <div>
                                    <p style="text-align: justify;">
                                        Erfassen Sie Ihren Hausrat/Inventar auf einer Liste (grobe Angaben). Diese muss dem Zoll übergeben werden. Eine Besonderheit bei einem grenzüberschreitendem Umzug ist der Zoll. Zollformalitäten können nur während der Büroöffnungszeiten stattfinden. Bitte klären Sie diese vor Ihrem Umzug mit der zuständigen Zollstelle an dem von Ihnen gewählten Grenzübergang. Zudem bestehen ein Sonntags- und Feiertagsfahrverbot sowie ein Nachtfahrverbot für LKW. In der Schweiz gilt ein Kraftfahrzeug mit einem zulässigen Gesamtgewicht von über 3,5 Tonnen als LKW. Auf der Website des Schweizer Zolls finden Sie u.a. Informationen über abgabenfreie Güter, die eingeführt werden können, Einfuhrbestimmungen (für Alkohol, private Dinge, Pflanzen, Fleisch, Autoimport etc.), Zölle, Ausweisvorschriften. <strong><a href="http://www.ezv.admin.ch/" target="_blank">www.ezv.admin.ch</a></strong>.
                                    </p>
                                </div>

                                <div>
                                    <p style="text-align: justify;">
                                    Die brefis personal ag kümmert sich auf Wunsch vor Ihrem Arbeitsbeginn um eine angemessene Unterkunft in einem Hotel oder einer Pension.
                                    Die Kosten hierfür gehen zu Ihren Lasten.<br>
                                    Sie haften auch persönlich für Schäden, die an den von Ihnen angemieteten Räumlichkeiten durch Sie entstehen. Für solche Schäden können wir keine Haftung übernehmen.
                                    </p>
                                </div>

                                <div>
                                    <p style="text-align: justify;">
                                    Die Wohnungssuche in der Schweiz gestaltet sich nicht anders als in Deutschland. Sie können über die hiesigen Zeitungen, Gemeindeverwaltungen oder das Internet Informationen erhalten.<span id="trenner"><br></span>
                                     Hilfreiche Internetseiten zur Wohnungssuche sind zum Beispiel:<br><br>
                                    <strong><a href="http://www.immobilienscout24.ch/" target="_blank">www.immobilienscout24.ch</a></strong><br>
                                    <strong><a href="http://www.homegate.ch/" target="_blank">www.homegate.ch</a></strong></p>
                                    <br>
                                    <p style="text-align: justify;">
                                    Die Mietkaution beträgt in der Regel zwischen einer und drei Monatsmieten. Sie benötigen jedoch einen Betreibungsregisterauszug (ähnlich Schufa-Auskunft) und nach Möglichkeit einen gültigen Arbeitsvertrag. Erst nach Hinterlegung des Mietdepots (Kaution) und der ersten Monatsmiete können Sie Ihr neues Heim beziehen.
                                    <br><br>
                                    <strong>Faustregel:</strong> Die Miete sollte 1/3 Ihres monatlichen Gehalts nicht übersteigen.
                                    </p>
                                </div>

                                <div>
                                    <p style="text-align: justify;">
                                    Beim Umzug in die Schweiz ist das Auto bei Grenzübertritt ebenso wie der restliche Haushalt als Umzugsgut zu deklarieren. Es ist empfehlenswert, das Kraftfahrzeug auf einem separaten Vordruck des Abfertigungsantrages für Übersiedlungsgut durch den Zoll zu bringen. Bei der Einfuhr als Übersiedlungsgut sind folgende Bedingungen zu erfüllen:</p>
                                    <ul style="border:none;margin-left:15px;margin-top:20px; list-style-type:none;">
                                        <li><i class="fa fa-chevron-right" aria-hidden="true"></i>Derjenige, der das Kraftfahrzeug einführen will, muss mindestens sechs Monate der Halter des Fahrzeuges gewesen sein.</li>
                                        <li><i class="fa fa-chevron-right" aria-hidden="true"></i>Derjenige, der das Kraftfahrzeug einführen will, darf in den kommenden zwölf Monaten das Auto nicht an Dritte verleihen oder verkaufen.</li>
                                        <li><i class="fa fa-chevron-right" aria-hidden="true"></i>Wird eine dieser Bedingungen nicht erfüllt, sind auf das Fahrzeug Abgaben zu entrichten, auch nachträglich.</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </p>
                    </div>

                    <div>
                        <p>
                        <div id="Bewilligungen">
                            <ul class="resp-tabs-list ver_2">
                                <li>Über Bewilligung und Pflichten</li>
                                <li>Meldepflicht</li>
                                <li>Meldeverfahren für eine max. 90-tägige Erwerbstätigkeit</li>
                                <li>Führerschein</li>
                            </ul>
                            <div class="resp-tabs-container ver_2">
                                <div>
                                    <p style="text-align: justify;">
                                    Mit der Personenfreizügigkeit gelten für EU-Bürger und Schweizer nach Übergangsfristen die gleichen Lebens-, Beschäftigungs- und Arbeitsbedingungen – sowohl in der Schweiz als auch in der EU. Konkret haben Sie in der Schweiz das Recht auf:
                                    </p>

                                    <div class="mt20" style='margin-left:15px; margin-top:20px;'>   
                                        <ul style="border:none;list-style-type:none;">
                                            <li><i class="fa fa-chevron-right" aria-hidden="true"></i>geografische und berufliche Mobilität (d.h. Sie können jederzeit den Wohnort und die Arbeitsstätte wechseln)</li>
                                            <li><i class="fa fa-chevron-right" aria-hidden="true"></i>gleiche Arbeitsbedingungen</li>
                                            <li><i class="fa fa-chevron-right" aria-hidden="true"></i>Sozialversicherungsschutz</li>
                                            <li><i class="fa fa-chevron-right" aria-hidden="true"></i>gleiche soziale Unterstützung</li>
                                            <li><i class="fa fa-chevron-right" aria-hidden="true"></i>gleiche steuerliche Pflichten und Vergünstigungen</li>
                                            <li><i class="fa fa-chevron-right" aria-hidden="true"></i>gegenseitige Anerkennung von Abschlüssen im Hinblick auf die Zulassung zu einer reglementierten Erwerbstätigkeit.</li>
                                        </ul>
                                    </div>

                                    <p style="text-align: justify;">
                                    Das Personenfreizügigkeitsabkommen zwischen der Schweiz und der EU sieht die Erteilung von langfristigen Aufenthaltsbewilligungen (für fünf Jahre) und kurzfristigen Aufenthaltsbewilligungen (bis zu einem Jahr) vor. Die Bewilligung wird erneuert, wenn die betreffende Person weiterhin eine Beschäftigung hat.
                                    </p>
                                </div>

                                <div>
                                    <p style="text-align: justify;">
                                    Während der ersten acht Tage, nachdem Sie in die Schweiz eingereist sind, müssen Sie sich bei Ihrer Wohngemeinde anmelden. Die Erfüllung dieser Meldepflicht ist eine Voraussetzung dafür, dass eine Erwerbstätigkeit ausgeübt werden darf. Eine Verletzung der Meldepflicht stellt eine Zuwiderhandlung gegen fremdenpolizeiliche Vorschriften dar und kann mit einer Busse bis zu 2000 Franken bestraft werden.
                                    </p>
                                </div>

                                <div>
                                    <p style="text-align: justify;">
                                    Seit einigen Jahren benötigen unter anderem deutsche Bundesbürger und Arbeitnehmer/innen, die von Unternehmen mit Sitz in einem Mitgliedstaat der EU-27/EFTA in die Schweiz entsandt werden, für einen Aufenthalt von sehr kurzer Dauer (maximal 90 Tage) keine Aufenthaltsbewilligung mehr. Eine Anmeldung ist jedoch erforderlich. Angehörige der EU-2-Staaten (Rumänien und Bulgarien) kommen unter bestimmten Umständen ebenfalls in den Genuss dieser Regelung.
                                    </p>
                                </div>

                                <div>
                                    <p style="text-align: justify;">
                                    Der ausländische Führerschein der Klasse B muss innerhalb von einem Jahr gegen den Schweizer Führerschein getauscht werden. Erforderlich dazu ist ein Sehtest.<br>
                                    Sollten Sie höhere Kategorien besitzen (C1, C, D1, D oder BPT), müssen Sie bei einem Vertrauensarzt eine medizinische Untersuchung absolvieren.
                                    </p>
                                </div>
                            </div>
                        </div>
                        </p>
                    </div>

                    <div>
                        <p>
                        <div id="Aufenthaltsbewilligungen">
                            <ul class="resp-tabs-list ver_3">
                                <li>Aufenthaltsbewilligung für eine mehr als 90-tägige Erwerbstätigkeit</li>
                                <li>Aufenthalts- und Arbeitsbewilligung</li>
                            </ul>
                            <div class="resp-tabs-container ver_3">
                                <div>
                                    <p style="text-align: justify;">
                                    Schweizer/innen dürfen sich an jedem Ort der Schweiz niederlassen. Ausländer/innen hingegen haben keinen Rechtsanspruch auf Niederlassung oder Aufenthalt, sondern sie benötigen eine entsprechende Bewilligung. Seit dem Inkrafttreten des bilateralen Abkommens (bilaterales Abkommen zur Personenfreizügigkeit und revidierte EFTA-Konvention) gelten für Bürger/innen der EU/EFTA bezüglich Niederlassung und Aufenthalt andere Bestimmungen als für Personen aus Drittstaaten.
                                    </p>
                                </div>
                                <div>
                                    <p style="text-align: justify;">
                                    Einen Schritt, den Sie keinesfalls vergessen dürfen, ist der Gang zur Gemeindeverwaltung, um sich in der neuen Heimat anzumelden. Um eine Arbeitsstelle antreten zu können, müssen verschiedene Auflagen erfüllt werden, die an die Aufenthaltsbewilligung gebunden sind. Sie müssen sich jedoch zusätzlich bei den kantonalen Arbeitsmarktbehörden und der Gemeinde anmelden. Beachten Sie, dass jegliche Form von Arbeitsaufnahme ohne gültige Arbeitsbewilligung oder ohne Meldung an die staatlichen Behörden streng geahndet wird und rechtliche Folgen nach sich zieht. Auf der folgenden Seite wird der genaue Unterschied zwischen den einzelnen Verfahren und Pässen erläutert:
                                    <br><br>
                                    </p>
                                    <div class="table-responsive">
                                        <table class="table-bordered">
                                            <tbody>
                                                <tr>
                                                    <td width="15%"><img alt="Ausweis Grenzgängerbewilligung" src="<?=WEB_URL?>/tmpl_brefis/img/ausweis_grenzgaenger_temporaer.png"style="width:100%;"></td>
                                                    <td width="85%" style="vertical-align: middle; padding: 20px;">
                                                        <p style="text-align: justify;"><strong>Grenzgängerbewilligung <em>(G - EG/EFTA)</em></strong><br>
                                                        Grenzgänger sind Ausländer/innen, die ihren Wohnsitz nicht in der Schweiz haben, aber in der Schweiz erwerbstätig sind. Die tägliche Heimkehrpflicht wurde für Grenzgänger zu einer wöchentlichen gewandelt. Dies bedeutet, dass Sie wöchentlich einmal an Ihren ausländischen Hauptwohnsitz zurückkehren müssen.
                                                        </p>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td width="15%"><img alt="Ausweis Kurzaufenthaltsbewilligung" src="<?=WEB_URL?>/tmpl_brefis/img/ausweis_kurzaufenthalt_temporaer.png" style="width:100%;"></td>
                                                    <td width="85%" style="vertical-align: middle; padding: 20px;">
                                                        <p style="text-align: justify;"><strong>Kurzaufenthaltsbewilligung <em>(L – EG)</em></strong><br>
                                                        Kurzaufenthalter sind Ausländer/innen, die sich befristet, in der Regel für weniger als ein Jahr, für einen bestimmten Aufenthaltszweck mit oder ohne Erwerbstätigkeit in der Schweiz aufhalten. Voraussetzung für die Erteilung der Bewilligung ist, dass Sie über einen gültigen Arbeitsvertrag verfügen, selbstständig erwerbend sind oder – bei Nichterwerbstätigen – ausreichende finanzielle Mittel nachweisen können und krankenversichert sind.
                                                        </p>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td width="15%"><img alt="Ausweis Jahresaufenthaltsbewilligung" src="<?=WEB_URL?>/tmpl_brefis/img/ausweis_jahresaufenthalt_mitarbeiter.png" style="width:100%;"></td>
                                                    <td width="85%" style="vertical-align: middle; padding: 20px;">
                                                        <p style="text-align: justify;"><strong>Jahresaufenthaltsbewilligung <em>(B – EG/EFTA)</em></strong><br>
                                                        Aufenthalter sind Ausländer/innen, die sich für einen bestimmten Zweck längerfristig mit oder ohne Erwerbstätigkeit in der Schweiz aufhalten.
                                                        Die Aufenthaltsbewilligung hat eine Gültigkeitsdauer von fünf Jahren, wenn der EG/EFA Bürger den Nachweis einer unbefristeten oder auf mindestens 365 Tage befristeten Anstellung erbringt. Personen ohne Erwerbstätigkeit (EG/EFTA) haben Anspruch auf die Bewilligung B, vorausgesetzt dass genügend finanzielle Mittel und eine Krankenversicherung nachgewiesen werden können.
                                                        </p>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td width="15%"><img alt="Ausweis Niederlassungsbewilligung" src="<?=WEB_URL?>/tmpl_brefis/img/ausweis_niederlassung_mitarbeiter.png" style="width:100%;"></td>
                                                    <td width="85%" style="vertical-align: middle; padding: 20px;">
                                                        <p style="text-align: justify;"><strong>Niederlassungsbewilligung <em>(C – EG/EFTA)</em></strong><br>
                                                            Niedergelassene sind Ausländer/innen, denen nach einem Aufenthalt von fünf oder zehn Jahren in der Schweiz die Niederlassungsbewilligung erteilt worden ist. Das Aufenthaltsrecht ist unbeschränkt und darf nicht an Bedingungen geknüpft werden. Das Bundesamt für Zuwanderung, Integration und Auswanderung legt das Datum fest, ab welchem die zuständigen kantonalen Behörden die Niederlassungsbewilligung frühestens erteilen dürfen.
                                                        </p>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                        </p>
                    </div>

                    <div>
                        <p>
                        <div id="Rechtliche_Bestimmungen">
                            <ul class="resp-tabs-list ver_4">
                                <li>Sozialabgaben</li>
                                <li>Sozialversicherung 3-Säulen System</li>
                                <li>Krankenkasse</li>
                                <li>ALV</li>
                                <li>Unfallversicherung</li>
                                <li>Rentner, Touristen und Studierende</li>
                                <li>Quellensteuer vgl. Einkommensteuer</li>
                                <li>Arbeits- und Vertragsrecht</li>
                                <li>Anerkennung von Abschlüssen</li>
                                <li>Familiennachzug</li>
                                <li>Sprachkenntnisse</li>
                            </ul>
                            <div class="resp-tabs-container ver_4">

                                <div>
                                   <p style="text-align: justify;">
                                    Der Arbeitnehmeranteil der Sozialabgaben beträgt je nach Altersstufe zwischen 13% und 24% vom Bruttogehalt.<br>
                                    Mit dem Sozialversicherungsbeitrag sind alle wesentlichen Versicherungsbereiche abgedeckt:</p>

                                    <ul style="border:none;margin-left:15px;margin-top:20px;list-style-type:none;">
                                        <li><i class="fa fa-chevron-right" aria-hidden="true"></i>Invalidität</li>
                                        <li><i class="fa fa-chevron-right" aria-hidden="true"></i>Alter einschliesslich Leistungen für Hinterbliebene und Arbeitslosigkeit</li>
                                        <li><i class="fa fa-chevron-right" aria-hidden="true"></i>Unfall und Pensionskasse</li>
                                    </ul>
                                </div>

                                <div>
                                   <p style="text-align: justify;">
                                    <strong>Säule 1: AHV/IV/EO</strong><br>
                                    Alle Personen, die in der Schweiz ihren Wohnsitz haben oder dort eine Erwerbstätigkeit ausüben, sind in der AHV (Alters- und Hinterlassenenversicherung) sowie in der IV (Invalidenversicherung) pflichtversichert und müssen Versicherungsbeiträge bezahlen
                                    </p>

                                    <p style="text-align: justify;">
                                    <strong><br>Säule 2: BVG/KTG/UVG</strong><br>
                                    Die berufliche Vorsorge versichert Arbeitnehmer, die das 17. Lebensjahr (für die Risiken Tod und Invalidität) bzw. das 24. Lebensjahr (Altersvorsorge) vollendet haben und ein gesetzlich definiertes Mindesteinkommen erzielen. Löhne, die unter dem Mindestjahreslohn liegen, müssen nicht versichert werden.
                                    </p>

                                    <p style="text-align: justify;">
                                    <strong><br>Säule 3a: Gebundene Vorsorge</strong><br>
                                    Die angesparten Mittel aus dieser Versicherung dienen ausschliesslich und unwiderruflich der Vorsorge – daher: «gebundene» Vorsorge. Dieser Teil der privaten Vorsorge wird vom Staat gefördert und bringt die grössten steuerlichen Vorteile. Gleichzeitig unterliegt sie klaren gesetzlichen Bedingungen bezüglich Laufzeit, Einzahlungen und Begünstigung. Im Gegensatz zur freien Vorsorge wird in der gebundenen Vorsorge bei der Auszahlung des Kapitals eine einmalige Steuer erhoben.
                                    </p>

                                    <p style="text-align: justify;">
                                    <strong><br>Säule 3b: Freie Vorsorge</strong><br>
                                    Diese Säule ist im Vergleich zur Säule 3a flexibler. Im weitesten Sinne umfasst sie neben Versicherungspolicen auch das restliche Privatvermögen, welches im Bedarfsfall liquidiert werden kann. Die Erträge sind bei der Auszahlung steuerfrei. Hier gibt es verschiedene Anlagemöglichkeiten.
                                    </p>
                                </div>

                                <div>
                                    <p style="text-align: justify;">
                                    Hinzu kommt ein individuell, je nach Alter, Wohnort und Versicherungsgesellschaft angesetzter monatlicher Fixbeitrag für die Krankenversicherung (Krankheit und Mutterschaft). Dieser wird jedoch nicht – wie aus anderen europäischen Ländern gewohnt – teils vom Arbeitgeber übernommen, sondern muss nach Erhalt des Nettolohns in Eigenregie selbst beglichen werden.
                                    </p>

                                    <p style="text-align: justify;">
                                    Der Durchschnittsbeitrag für Erwachsene beträgt rund 165 Euro – circa 230 Franken –, der aber von der Jahresfranchise (Selbstbehalt Krankenkasse) abhängig ist.
                                    </p>

                                    <p style="text-align: justify;">
                                    <strong>Der Abschluss einer Krankenversicherung ist nach spätestens 90 Tagen Pflicht!</strong><br>
                                    Während dieser drei Monate können Sie nach Absprache mit der Krankenkasse diese behalten, sofern Sie über einen gültigen Auslandsschutz verfügen.
                                    </p>
                                </div>

                                <div>
                                    <p style="text-align: justify;">
                                    Wer in der Schweiz eine unselbständige Erwerbstätigkeit ausübt, ist gegen Arbeitslosigkeit versichert. Beitragspflichtig zur Arbeitslosenversicherung sind alle in der Schweiz erwerbstätigen Arbeitnehmer sowie Personen, die für schweizerische Firmen im Ausland tätig sind und von der Schweiz aus entlohnt werden. Der Beitragssatz beträgt bis zu einem Bruttojahreseinkommen von 126‘000 Franken 1 bis maximal 2 Prozent.
                                    </p>
                                </div>

                                <div>
                                    <p style="text-align: justify;">
                                    In der Schweiz erwerbstätige Personen sind in der obligatorischen Unfallversicherung für Berufsunfälle sowie Berufskrankheiten und häufig auch für Nichtbetriebsunfälle versichert.<span id="trenner"><br></span>
                                     Die Nichtberufsunfallversicherung gilt aber nur bei einer wöchentlichen Arbeitszeit von acht Stunden.
                                    </p>
                                </div>

                                <div>
                                    <p style="text-align: justify;">
                                    Für einen Aufenthalt als Nichterwerbstätiger von weniger als drei Monaten ist keine Aufenthaltsbewilligung notwendig.<br>
                                    Haben Sie vor, für länger als 90 Tage im Land zu bleiben, gilt für Sie ebenso die Meldepflicht auf der Gemeinde des Wohnortes.
                                    </p>
                                </div>

                                <div>
                                    <p style="text-align: justify;">
                                    Auf das Bruttogehalt wird nach einem progressiven Tarif die Quellensteuer erhoben. Der Quellensteuer unterliegen ausländische Arbeitnehmer ohne Niederlassungsbewilligung (C) und im Ausland wohnhafte Künstler, Sportler sowie Empfänger von Verwaltungsratsentschädigungen und Vorsorgeleistungen. Mit Erhalt der Niederlassungsbewilligung bzw. Einbürgerung muss man am Ende jedes Jahres die Steuer selbst erklären. Unter <a href="http://www.steueramt.zh.ch/quellensteuer" target="_blank"><strong>www.steueramt.zh.ch/quellensteuer</strong></a> finden Sie zum Beispiel Ihre Steuersumme für den Kanton Zürich.
                                    </p>
                                </div>

                                <div>
                                    <p style="text-align: justify;">
                                    In vielen Branchen (hauptsächlich im Bereich Bau und Industrie) und einigen Firmen regeln Gesamtarbeitsverträge (GAV) die Arbeitsbedingungen. Ansonsten wird frei mit dem Arbeitgeber verhandelt. Arbeitsverträge können mündlich oder schriftlich geschlossen werden. Um spätere Missverständnisse zu vermeiden, sollten Sie aber auf einen schriftlichen Vertrag bestehen. Gemäss Art. 335b des Obligationenrechts gilt als Probezeit der erste Monat eines Arbeitsverhältnisses. Durch schriftliche Abrede, Normalarbeitsvertrag oder Gesamtarbeitsvertrag können abweichende Vereinbarungen getroffen werden; die Probezeit darf jedoch auf höchstens drei Monate verlängert werden.
                                    </p>

                                    <p style="text-align: justify;">
                                    Während dieser Zeit können beide Parteien mit einer Frist von sieben Tagen zum Ende der Woche kündigen, falls im Vertrag nichts anderes vereinbart wurde. Beschäftigte in industriellen Betrieben, Büropersonal und Angestellte in Grossbetrieben des Einzelhandels dürfen maximal 45 Stunden pro Woche arbeiten. Für alle anderen Arbeitnehmer gilt eine reguläre Höchstarbeitszeit von 50 Stunden pro Woche. Für Nachtarbeit gibt es besondere Regelungen. Für Arbeitnehmer mit einer Höchstarbeitszeit von 45 Stunden ist Mehrarbeit von maximal zwei Stunden pro Tag und maximal 170 Stunden pro Kalenderjahr zulässig, allen anderen dürfen höchstens 140 Überstunden pro Jahr abverlangt werden.
                                    </p>

                                    <p style="text-align: justify;">
                                    Der Arbeitgeber hat der Arbeitnehmerin bzw. dem Arbeitnehmer jedes Jahr wenigstens vier Wochen, der Arbeitnehmerin bzw. dem Arbeitnehmer bis zum vollendeten 20. Lebensjahr wenigstens fünf Wochen Urlaub zu gewähren (Art. 329a Abs. 1 OR). Ausserdem gibt es, je nach Kanton, bis zu 14 Feiertage.
                                    </p>
                                </div>

                                <div>
                                    <p style="text-align: justify;">
                                    Für die meisten Tätigkeiten ist es unerheblich, ob Ihr Ausbildungs- oder Studienabschluss bei den europäischen Nachbarn anerkannt ist. Nur bei Berufen, die eine staatliche Anerkennung voraussetzen (wie beispielsweise Ärzte oder Lehrer), sollte die Anerkennung definitiv geklärt sein, bevor Sie sich bewerben.
                                    </p>

                                    <p style="text-align: justify;">
                                    Die Europäische Union hat für diese Berufe Richtlinien entwickelt, mit deren Hilfe die gegenseitige Anerkennung von Abschlüssen geregelt wird. In den meisten Fällen entscheidet der Arbeitgeber jedoch auf der Basis Ihrer Bewerbungsunterlagen, ob Ihre Ausbildung und Qualifikation seinen Anforderungen entsprechen. Sie sollten allerdings davon ausgehen, dass der Arbeitgeber, bei dem Sie sich bewerben, in der Regel nicht weiss, was sich hinter Ihrer Berufsausbildung und -bezeichnung genau verbirgt. Zeugniserklärungen, aber auch die Anerkennung von Abschlüssen können unter diesem Gesichtspunkt sinnvoll sein.
                                    </p>
                                </div>

                                <div>
                                    <p style="text-align: justify;">
                                    Ihr Ehepartner und Ihre Kinder unter 21 Jahren haben das Recht, Ihnen in die Schweiz zu folgen.<br>
                                    Ebenso gilt dies für die Eltern und Schwiegereltern, wobei Sie für deren Unterhalt aufkommen müssen.
                                    </p>
                                </div>

                                <div>
                                    <p style="text-align: justify;">
                                    In der Schweiz wird neben den vier Landessprachen (Deutsch, Französisch, Italienisch und Rätoromanisch) auch Englisch gesprochen.<br>
                                    Wer in der Schweiz arbeiten möchte, muss die jeweilige Sprache (Deutsch, Französisch oder Italienisch) des Kantons bzw. des Ortes beherrschen. Wie gut, hängt von der Art der Tätigkeit ab.
                                    </p>
                                </div>
                            </div>
                        </div>
                        </p>
                    </div>

                    <div>
                        <p>
                        <div id="Kinder">
                            <ul class="resp-tabs-list ver_5">
                                <li>Mutterschaftsentschädigung</li>
                                <li>Kinderzulagen</li>
                                <li>Kinderbetreuung</li>
                                <li>Schweizer Schulsystem</li>
                            </ul>
                            <div class="resp-tabs-container ver_5">
                                <div>
                                    <p style="text-align: justify;">
                                    Mütter erhalten eine Mutterschaftsentschädigung in Höhe von 80 Prozent ihres durchschnittlichen Bruttoeinkommens, wenn sie während den neun Monaten unmittelbar vor der Geburt des Kindes im Sinne des AHV-Gesetzes obligatorisch versichert und in dieser Zeit mindestens fünf Monate lang erwerbstätig waren. Die Entschädigung ist auf maximal 196 Franken pro Tag begrenzt und wird für die Dauer von 14 Wochen nach der Geburt gezahlt (maximale Dauer des Mutterschaftsurlaubs). Zehn Kantone zahlen eine Geburtszulage zwischen 600 und 1500 Franken.
                                    </p>
                                </div>

                                <div>
                                    <p style="text-align: justify;">
                                    Die Familienzulagen sind – mit wenigen Ausnahmen - in den Gesetzen der einzelnen Kantone geregelt. Als berufstätige Eltern haben Sie Anspruch auf Kinderzulagen. Für jedes Kind wird nur eine Zulage entrichtet, auch wenn beide Eltern die Voraussetzungen erfüllen. Der Arbeitgeber bezahlt für Kinder bis zum Alter von 16 Jahren Kindergeld, für Studenten und Azubis zusätzlich bis zum Alter von 25 Jahren. Es gelten schweizweit einheitliche Mindestzulagen. Diese betragen pro Kind und Monat mindestens 200 – 250 Franken.
                                    </p>
                                </div>

                                <div>
                                    <p style="text-align: justify;"><strong>Kinderkrippe ab 3 Monaten</em></strong><br>
                                    Bevor die Kleinen in den Kindergarten gehen, besuchen sie häufig die Kinderkrippe, in der sie sich bereits eine gewisse Zeit ohne Mama und Papa mit anderen Kindern beschäftigen können, um sich an den Kindergarten zu gewöhnen.
                                    </p>
                                    <br>
                                    <p style="text-align: justify;"><strong>Kindergarten bzw. Vorschule</em></strong><br>
                                    Je nach Kanton gehen Kinder für drei bis fünf Jahre in den Kindergarten. Die Betreuungszeiten sind in der Regel morgens und nachmittags jeweils zwei bis drei Stunden.
                                    </p>
                                </div>

                                <div>
                                    <p style="text-align: justify;">
                                    Auch das Schulsystem ist von Kanton zu Kanton unterschiedlich geregelt. Hier am Kanton Zürich erklärt:
                                    </p>
                                    <br/>
                                    <p style="text-align: justify;"><strong>Primarschule vgl. Volksschule/Grundschule <em>(ab 6/7 Jahren)</em></strong><br>
                                    Nach dem Kindergarten gehen die Kinder für maximal sechs Jahre in die Grundschule. Diese Schulstufe umfasst Altersstufen von etwa 6 bis 13 Jahren.
                                    </p>
                                    <br/>    
                                    <p style="text-align: justify;"><strong>Sekundarstufe I – Oberschule bzw. Gymnasium <em>(ab dem 6. Schuljahr)</em></strong><br>
                                    Mit Abschluss der Oberschule ist die Schulpflicht von neun Jahren getan. Häufig werden danach handwerklich produzierende Berufe erlernt.
                                    </p>
                                    <br/>
                                    <p style="text-align: justify;"><strong>Sekundarstufe II – berufsbildende und allgemeinbildende Ausbildung</strong><br>
                                    Die Sekundarstufe II dauert je nach berufsbildende und allgemeinbildende Ausbildung zwischen 2 bis 4 Jahre und wird jeweils mit verschiedenen Ausbildungsgängen angeboten.
                                    </p>
                                    <p style="text-align: justify;"><br><strong>Berufsbildende Ausbildungsgänge</strong></p>
                                    <ul style="border:none;margin-top:20px;margin-left:15px;list-style-type:none;">
                                        <li><i class="fa fa-chevron-right" aria-hidden="true"></i><strong>Zweijährige Grundbildung:</strong> Die zweijährige Grundbildung ersetzt die bisherige Anlehre (siehe <strong><a href="http://de.wikipedia.org/wiki/Anlehre">http://de.wikipedia.org/wiki/Anlehre</a></strong>) und wird mit einem eidgenössischen Berufsattest abgeschlossen.</li>
                                        <li><i class="fa fa-chevron-right" aria-hidden="true"></i><strong>Drei- oder vierjährige Grundbildung:</strong> Die drei- oder vierjährige Grundbildung dient der Vorbereitung auf die Ausübung eines Berufs und schliesst mit einem eidgenössischen Fähigkeitszeugnis ab. Hierfür stehen über 200 Lehrberufe zur Auswahl.</li>
                                        <li><i class="fa fa-chevron-right" aria-hidden="true"></i><strong>Berufsmaturität:</strong> Zur Ergänzung der drei- oder vierjährigen beruflichen Grundbildung steht die Berufsmaturität. Sie kann sowohl parallel zur beruflichen Grundbildung oder nach einer abgeschlossenen beruflichen Grundbildung erlangt werden.</li>
                                    </ul>
                                    <p style="text-align: justify;"><br><strong>Allgemeinbildende Ausbildungsgänge</strong></p>
                                    <ul style="border:none;margin-top:20px;margin-left:15px;list-style-type:none;">
                                        <li><i class="fa fa-chevron-right" aria-hidden="true"></i><strong>Maturitätsschulen (Gymnasien)</strong> Um die Matura (Reifeprüfung/Abitur) zu erlangen ist der Besuch einer Maturitätsschule erforderlich. Diese dauert in der Regel 3-4 Jahre. Nach erfolgreicher Absolvierung hat der Maturand die prüfungsfreie Zugangs- und Studienberechtigung für ein Studium an einer Hochschule seiner Wahl.</li>
                                        <li><i class="fa fa-chevron-right" aria-hidden="true"></i><strong>Fachmittelschulen (FMS):</strong> Die Dauer der Ausbildung der Fachmittelschule beträgt 3 Jahre und wird mit der Fachmaturität oder dem Fachmittelschulabschluss (Erstabschluss) abgeschlossen.</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        </p>
                    </div>
                </div>
            </div>
        </div>
<?php include 'footer.php'; ?>
