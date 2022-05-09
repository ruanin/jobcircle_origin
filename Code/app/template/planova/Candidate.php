<?php include 'header.php';
$classCandidate = 'active';
$breadcrumb[] = array('title' => 'Für Bewerber',
    'url' => '',
    'active' => true);
include 'navigation.php'; ?>
    <div class="container mt-15">
        <div class="box-wrapper page-content">
            <div class="row">
                <div class=" col-lg-5 col-md-5 col-sm-12 col-xs-12">
                    <div class="thumb">
                        <h4 style="text-align: center;">FESTANSTELLUNG oder TEMPORÄRARBEIT<br>im Bereich Bau, Ausbau und
                            Industrie</h4>
                        <p style="text-align: justify">Eine gute Entscheidung - Sie suchen zusammen mit planova eine
                            neue Stelle!
                            Festanstellung oder Temporärarbeit im Bereich Bau, Ausbau und Industrie. Wenn Sie sich hier
                            auskennen und Arbeitserfahrung mitbringen, sind Sie hier genau richtig. Gemeinsam schaffen
                            wir es, Türen für Sie zu öffnen. Sie entscheiden sich bei uns, wie Sie arbeiten wollen. Auch
                            für Quereinsteiger ist planova die richtige Adresse. Entweder Sie lernen die Arbeitswelt und
                            die Orte in der Schweiz erst einmal kennen (da bietet sich die Temporärarbeit an) oder wir
                            vermitteln auch Festanstellungen in den so genannten ersten Arbeitsmarkt.
                            <strong><a href="#">Nehmen Sie mit unseren Beratern Kontakt auf</a></strong> - es lohnt
                            sich.</p>
                        <hr>
                        <div id="finder-candidate-wrap">
                        <form class="navbar-form" method="POST" action="/Vacancyboard">
                            <div class="form-group">
                                <input class="form-control" name="jobtitle" type="text" placeholder="z.B. Elektriker"/>
                            </div>
                            <button id="Jobfinder" class="btn btn-primary" type="submit"><i
                                        class="fa fa-search"></i>&nbsp; Jobs finden
                            </button>
                        </form>
                        </div>
                        <div id="cta-bewerben">
                            <hr>
                            <p id="trenner" style="text-align: center;"><strong>Die Anmeldung für unsere
                                    Vermittlungsleistungen ist für Sie kostenlos</strong></p>
                            <p style="text-align: center;"><a href="/Candidate/apply" class="btn btn-primary">JETZT
                                    BEWERBEN</a></p>
                        </div>
                    </div>
                </div>
                <div class=" col-lg-7 col-md-7 col-sm-12 col-xs-12">
                    <div class="thumb">
                        <div class="single-page-item">
                            <article>
                                <iframe width="560"  height="365"
                                        src="https://www.youtube.com/embed/WAMpkPcWe44?rel=0&amp;controls=0&amp;showinfo=0"
                                        frameborder="0" allowfullscreen style="width:100%;"></iframe>
                            </article>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container mt-15">
        <div class="box-wrapper page-content">
            <div class="row">
                <div class=" col-lg-5 col-md-5 col-sm-12 col-xs-12">
                    <div class="thumb">
                        <div class="single-page-item">
                            <h2>Temporärarbeit</h2>
                            <p style="padding-top: 5px;"><strong>Drei Akteure sind hier beteiligt:</strong></p>
                            <ol>
                                <li style="margin-left: -26px;">die temporär arbeitende Person</li>
                                <li style="margin-left: -26px;">planova als Leistungsanbieter und verleiht die arbeitende
                                    Person an:
                                </li>
                                <li style="margin-left: -26px;">den Einsatzbetrieb, der die arbeitende Person entleiht</li>
                            </ol>
                            <div style="padding-top:5.5%;">
                                <img class="img-responsive" style="" src="<?= WEB_URL ?>/tmpl_planova/img/bewerber-temp.jpg"/>
                            </div>
                        </div>
                    </div>
                </div>
                <div class=" col-lg-7 col-md-7 col-sm-12 col-xs-12">
                    <div class="thumb">
                        <div class="single-page-item">
                            <div style="border-bottom: 1px solid #dddddd;">
                                <p style="text-align: justify;">Temporärarbeit ist für 40% der Beschäftigten die beste
                                    Arbeitsform. Es gibt viele Gründe, warum gerade die Temporärarbeit bei vielen
                                    Mitarbeitern eine ideale Lösung bietet. Flexibilität ist ein Grund warum sich viele
                                    unserer Mitarbeiter bewusst für die Temporärarbeit entscheiden: Abwechslung und
                                    Ungebundeheit, zum Sammeln von Berufserfahrung und "reinschnuppern" in viele
                                    unterschiedliche Unternehmen - eine ideale Beschäftigungsform. Auch für ältere Semester,
                                    um wieder zurück in die Arbeit zu finden. Für über 70% der über 40-jährigen und über 60%
                                    der über 50-jährigen ist dies ein sehr wichtiges Motiv.<br><br>

                                    Temporärarbeit ist aber auch eine gute Übergangslösung für weit mehr als die Hälfte der
                                    bei uns Beschäftigten, denn diese waren innerhalb des ersten Jahres in "festen Händen",
                                    sprich unter Festeinstellung. In etwa die Hälfte aller in der Schweiz beschäftigten
                                    Temporärarbeiter sind Ausländer aus dem EU-Umfeld der Schweiz. Hierbei handelt es sich
                                    bei der Hälfte von ihnen um gut ausgebildete Fachkräfte, die vornehmlich in der Bau- und
                                    Industrie-Bereich eingesetzt werden. Durch das entsprechende Netzwerk ist eine
                                    Vollbeschäftigung durch Temporärarbeit in diesen Branchen möglich.
                                </p>
                            </div>
                            <div style="padding-top: 10px;">
                                <h4>TEMPORÄRARBEIT IST:</h4>
                                <div style="margin-left:25px;">
                                    <ul class="list-style">
                                        <li><i class="fa fa-angle-right"></i> Zeitpunkt und Dauer des Arbeitseinsatzes frei
                                            wählen zu können
                                        </li>
                                        <li><i class="fa fa-angle-right"></i> ein guter Weg in eine Festanstellung</li>
                                        <li><i class="fa fa-angle-right"></i> eine gute Möglichkeit Berufserfahrung über den
                                            "Tellerrand hinaus" zu sammeln
                                        </li>
                                        <li><i class="fa fa-angle-right"></i> ein gutes Mittel durch Abwechslung und längere
                                            Arbeitspausen einen "Burnout" vorzubeugen
                                        </li>
                                        <li><i class="fa fa-angle-right"></i> zwischen zwei Anstellungen überbrücken</li>
                                        <li><i class="fa fa-angle-right"></i> die Möglichkeit in der Baubranche vollzeit zu
                                            arbeiten
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container mt-15">
        <div class="box-wrapper page-content">
            <div class="row">
                <div class=" col-lg-7 col-md-7 col-sm-12 col-xs-12">
                    <div class="thumb">
                        <div style=" border-bottom: 1px solid #dddddd; padding-bottom: 15px;">
                            <h2 style="margin-top: 0px">Festanstellung</h2>
                            <p style="text-align: justify;">Nicht jeder ist ein Entertainer und nicht jedem fällt eine
                                Bewerbung leicht. Wir bewerten schon seit über 25 Jahren Bewerber und finden hier durch
                                System und Struktur stets die geeigneten Bewerber. Unsere Kunden sind Bau- und
                                Industrieunternehmen, die zu den größten ihrer Branche gehören. Unsere Berater kommen
                                ebenfalls aus diesem Sektor und kennen sowohl die Beweggründe unserer Kunden, als auch
                                Ihre Motivation. Als Bewerber haben Sie also eine gute Chance durch uns an Ihren
                                Traumjob zu kommen, obwohl Unternehmen ihre offenen Stellen direkt ausschreiben. </p>
                        </div>
                        <div style="padding-top:5px; margin-left:25px;">
                            <ul class="list-style">
                                <li><i class="fa fa-angle-right"></i> Schritt 1: Kompetenzanalyse</li>
                                <li><i class="fa fa-angle-right"></i> Schritt 2: Ausbildung/ Lebenslauf</li>
                                <li><i class="fa fa-angle-right"></i> Schritt 3: Lohnziele</li>
                                <li><i class="fa fa-angle-right"></i> Schritt 4: Zukunftsziele</li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class=" col-lg-5 col-md-5 col-sm-12 col-xs-12">
                    <div class="thumb">
                        <img style="width: 100%" class="img-responsive"
                             src="<?= WEB_URL ?>/tmpl_planova/img/bewerber-fest.jpg"/>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div class="container mt-15">
        <div class="row">
            <div class="col-md-12">
                <div class="box-wrapper">
                    <div class="single-page-item typography">
                        <div class="panel-group" id="accordion">
                            <div class="panel panel-default panel-faq">
                                <div class="panel-heading">
                                    <a data-toggle="collapse" data-parent="#accordion" href="#section1">
                                        <h4 class="panel-title">
                                            Wo möchte ich hin? <em>(Zielsetzung)</em> | Was sind meine Fähigkeiten? <em>(Selbsteinschätzung)</em>
                                        </h4>
                                    </a>
                                </div>

                                <div id="section1" class="panel-collapse collapse">
                                    <div class="panel-body">
                                        <p style="text-align: justify;">
                                            Bevor Sie an die Bewerbung denken, sollten Sie sich klar machen welche Art
                                            von Arbeit überhaupt zu Ihnen passt, was Sie möchten und was auf keinen
                                            Fall. Dem gegenüber sollten Sie Ihre persönlichen Stärken und Fähigkeiten
                                            stellen und dementsprechend Ihre Vorstellungen von dem Job, der zu Ihnen
                                            passt, definieren. Diese grundlegenden Gedanken werden Ihnen später auch
                                            helfen Ihr Anschreiben zu formulieren und Ihre persönlichen Stärken
                                            hervorzuheben. Oft kann es auch hilfreich sein gemeinnützige Institutionen,
                                            wie die Regionalen Arbeitsvermittlungszentren (RAV), zu besuchen und
                                            Dienstleistungen, wie z.B. kostenlose Beratungsgespräche, die oftmals
                                            angeboten werden, zu nutzen.
                                        </p>

                                        <p style="text-align: justify;"><br><strong>Wie stellen Sie sich Ihren
                                                zukünftigen Beruf optimalerweise vor?</strong><br>
                                            Bevor Sie anfangen nach einem Job zu suchen, sollten Sie sich überlegen
                                            welche Art von Job Sie am liebsten ausführen möchten. Am besten definieren
                                            Sie zu erst einen Überbegriff Ihres Traumjobs und machen sich dann Gedanken
                                            zu dem dazugehörigen Arbeitsalltag, sprich Ihren täglichen Aufgaben, Ihrem
                                            Arbeitsplatz und dessen Ausstattung und Ihrem Arbeitsumfeld. Des Weiteren
                                            sollten Sie sich überlegen, ob und welche Aufstiegsmöglichkeiten Sie in
                                            Ihrem Traumjob haben möchten und sich auch Gedanken über Ihre
                                            Lohnvorstellungen und Ihre Arbeitszeiten machen. Hierbei sollten Sie nicht
                                            gleich bestimmte Zahlen definieren, sondern sich einen gewissen Spielraum
                                            offen halten, sprich sich einen Mini- und Maximalwert vorstellen. Ebenfalls
                                            wichtig sich klar zu machen ist, wie weit weg vom eigenen Wohnort Ihr neuer
                                            Arbeitsplatz entfernt sein darf, ebenso wie das früheste, für Sie
                                            realisierbare Antrittsdatum.
                                        </p>

                                        <p style="text-align: justify;"><br><strong>Es ist nicht nur wichtig zu wissen
                                                was man gut kann, sondern auch wie man seine persönlichen Kompetenzen am
                                                besten verkauft:</strong><br>
                                            Selbstvermarktung spielt nicht nur eine wichtige Rolle in Ihrer Bewerbung,
                                            sondern - und vor allem - auch im Bewerbungsgespräch. Erstellen Sie sich am
                                            besten eine Liste, in der Sie Ihre Fähigkeiten aufschreiben und in drei
                                            Bereiche unterteilen:
                                        </p>
                                        <ol>
                                            <li>Es gibt zum einen die Fachkompetenz, die Ihre Fähigkeiten in einem
                                                bestimmten Beruf widerspiegeln und direkt mit diesem zu tun haben.
                                                Fachkompetenz entsteht hauptsächlich aus Routine bzw. aus Erfahrung und
                                                daher ist hier ein Nachweis eben als solcher angebracht und oftmals auch
                                                eine Anforderung der Arbeitgeber. Ein Nachweis für Fachkompetenz können
                                                z.B. Zeugnisse oder Weiterbildungsnachweise sein und sollten Ihrer
                                                Bewerbung beigefügt werden.
                                            </li>
                                            <li>Zum anderen gibt es die Schlüsselqualifikationen, sprich die
                                                überfachlichen Qualifikationen, die zum richtigen Umgang des fachlichen
                                                Wissens, also den Fachkompetenzen befähigen. Hierzu gehört z.B.
                                                Organisationsvermögen, Kommunikationsfähigkeit, Zeitmanagement,
                                                Selbstständigkeit, Umgang mit Stresssituationen, etc.
                                            </li>
                                            <li>Die Sozialkompetenz bildet den dritten Kompetenzbereich und definiert
                                                die Fähigkeit des Umgangs und der Zusammenarbeit mit anderen Menschen.
                                                Hierzu zählen z.B. Zuverlässig- und Pünktlichkeit, Loyalität,
                                                Integrität, Hilfs- und Kooperationsbereitschaft, etc.
                                            </li>
                                        </ol>
                                    </div>
                                </div>
                            </div>

                            <div class="panel panel-default panel-faq">
                                <div class="panel-heading">
                                    <a data-toggle="collapse" data-parent="#accordion" href="#section2">
                                        <h4 class="panel-title">
                                            Stellensuche
                                        </h4>
                                    </a>
                                </div>

                                <div id="section2" class="panel-collapse collapse">
                                    <div class="panel-body">
                                        <p style="text-align: justify;">
                                            Suchen Sie nach Anzeigen, die für Sie persönlich interessant klingen und
                                            über die Sie mehr erfahren möchten. Am besten suchen Sie diese auf
                                            Jobportalen im Internet, in Tageszeitungen oder direkt auf den jeweiligen
                                            Firmenwebsites. Sie können sich auch an Personalvermittlungen, die
                                            Regionalen Arbeitsvermittlungszentren (RAV) oder auch an Zeitarbeitsfirmen
                                            wenden.
                                        </p>
                                    </div>
                                </div>
                            </div>

                            <div class="panel panel-default panel-faq">
                                <div class="panel-heading">
                                    <a data-toggle="collapse" data-parent="#accordion" href="#section3">
                                        <h4 class="panel-title">
                                            Bewerbung
                                        </h4>
                                    </a>
                                </div>

                                <div id="section3" class="panel-collapse collapse">
                                    <div class="panel-body">
                                        <p style="text-align: justify;"><strong>Es gibt mehrere Arten von
                                                Bewerbungen:</strong><br>
                                            Die schriftliche Bewerbung unterscheidet sich von der Initiativbewerbung
                                            (oder auch Kurzbewerbung) in der Ausführlichkeit, sprich der Länge. Eine
                                            Initiativbewerbung geht allein vom Bewerber aus und folgt keiner
                                            Stellenanzeige. Eine solche Bewerbung besteht meist nur aus zwei bis drei
                                            Seiten und zwar einem Anschreiben und einem tabellarischen Lebenslauf. Hier
                                            fehlen sämtliche Anlagen und oft auch das Bewerbungsfoto. Solche
                                            Kurzbewerbungen sollen lediglich als Auftakt dienen und das Interesse eines
                                            potenziellen Arbeitgebers wecken.</p>
                                        <p style="text-align: justify;">
                                            Mit der telefonischen Bewerbung verhält es sich ähnlich. Sie dient meist nur
                                            dazu, um auf sich aufmerksam zu machen und ist oftmals der Türöffner zu
                                            einem persönlichen Bewerbungsgespräch. Eine solche Bewerbung kann auch
                                            hilfreich sein, um herauszufinden ob die entsprechende Firma momentan
                                            überhaupt offene Stellen anbietet und ob man sich die Mühe einer
                                            schriftlichen Bewerbung (die auf jede telefonische Bewerbung folgen sollte)
                                            nicht von vornherein sparen kann.
                                        </p>
                                        <p style="text-align: justify;">Eine Bewerbung über das Internet erfolgt meist
                                            über Jobportale und Websites von Personalvermittlungen. Hier wird ein
                                            Motivationsschreiben in das Bewerbungsformular eingefügt und der Lebenslauf
                                            als gängiges Datenformat (z.B. PDF) angehängt.
                                        </p>
                                    </div>
                                </div>
                            </div>

                            <div class="panel panel-default panel-faq">
                                <div class="panel-heading">
                                    <a data-toggle="collapse" data-parent="#accordion" href="#section4">
                                        <h4 class="panel-title">
                                            Bewerbungsmappe
                                        </h4>
                                    </a>
                                </div>

                                <div id="section4" class="panel-collapse collapse">
                                    <div class="panel-body">
                                        <p style="text-align: justify;"><strong>Wie der Name schon sagt, macht man mit
                                                einer Bewerbung „Werbung“ für sich selbst. Dazu gehören drei wichtige
                                                Dokumente:</strong></p>

                                        <div style=" margin-left:25px;">
                                            <ul class="list-style">
                                                <li><i class="fa fa-angle-right"></i> Anschreiben</li>
                                                <li><i class="fa fa-angle-right"></i> Lebenslauf</li>
                                                <li><i class="fa fa-angle-right"></i> Studienabschlüsse,
                                                    Arbeitszeugniskopien, etc.
                                                </li>
                                            </ul>
                                        </div>

                                        <p style="text-align: justify;"><br><strong>Anschreiben:</strong><br>
                                            Das Anschreiben sollte frei von Grammatik- und Rechtschreibfehlern,
                                            übersichtlich, aussagefähig und prägnant (maximal eine DIN A4-Seite) sein,
                                            da es von allen Bewerbungsunterlagen oben auf liegt und als erstes gesichtet
                                            wird. Verwenden Sie Computersystemschriftarten, wie z.B. Arial in einer gut
                                            lesbaren Schriftgröße (z.B. 11 oder 12 Pt). Formulieren Sie am besten kurze
                                            Sätze und achten sie darauf Wiederholungen auszulassen.
                                        </p>

                                        <p style="text-align: justify;">
                                            Das Anschreiben sollte das Interesse des Arbeitgebers, bzw. das des
                                            Personalers wecken, Ihre Motivation widerspiegeln und deutlich machen, warum
                                            Sie sich auf die Stelle bewerben und der/die Beste sind, den das Unternehmen
                                            dafür bekommen kann. Vermeiden Sie die Höhepunkte aus Ihrem Lebenslauf
                                            einfach nur zu wiederholen und fassen Sie diese lieber zu einem zum
                                            weiterlesen motivierenden, zusammenhängenden Text zusammen. Im Anschreiben
                                            steht die Sozialkompetenz an erster Stelle. Versuchen Sie hierbei nicht
                                            einfach nur klischeehafte Sätze wie <em>„Ich bin teamfähig und zeige eine
                                                hohe Leistungsbereitschaft...“</em> zu formulieren, sondern begründen
                                            Sie Ihre Aussagen am besten anhand Ihrer bisherigen Positionen und
                                            Erfahrungen. Wird in einer Stellenanzeige nach der Angabe des frühst
                                            möglichen Eintrittstermins und einer Gehaltsvorstellung gebeten, so nennen
                                            Sie diese auch. Ihre Gehaltsvorstellung geben Sie als Jahresgehalt an.
                                        </p>
                                        <p style="text-align: justify;">
                                            Was im Anschreiben auf keinen Fall fehlen darf ist ein Briefkopf, also Ihr
                                            Name, Adresse, Telefonnummer und E-Mail-Adresse in der Kopfzeile und
                                            darunter das aktuelle Datum. Linksbünding steht die Adresse des Empfängers
                                            (Name, Nachname - oder Firmenname, Anschrift). Was ebenfalls nicht fehlen
                                            darf ist eine konkrete Betreffzeile (z.B. „Bewerbung / Ihre Stellenanzeige
                                            vom 17. Februar 2015 in der Tageszeitung“). An das Ende des Anschreibens
                                            gehört Ihre originale, also nicht gedruckte Unterschrift und ein
                                            Anlagenverzeichnis in dem Sie alle Dokumente auflisten, die Sie der
                                            Bewerbung beifügen möchten, also z.B. Zeugnisunterlagen (i.d.R. nicht mehr
                                            als 5 Stück, also nur die für den Job relevantesten).
                                        </p>

                                        <p style="text-align: justify;"><br><strong>Lebenslauf:</strong><br>
                                            Der Lebenslauf muss wahrheitsgemäße Angaben zu Ihren aktuellen Personen-
                                            (Vor- und Nachname, Geburtsdatum und -ort) und Kontaktdaten (Adressdaten,
                                            Telefonnummer, E-Mail-Adresse), und Ihrer bisherigen schulischen,
                                            akademischen sowie beruflichen Laufbahn enthalten. Verwenden Sie in Ihrem
                                            Lebenslauf ein professionelles Bewerbungsfoto und kleben Sie dieses entweder
                                            oben rechts oder auf ein Deckblatt zur Bewerbung ein.
                                        </p>
                                        <p style="text-align: justify;">
                                            Die Aufzählung Ihres beruflichen, akademischen und schulischen Werdegangs
                                            gestalten Sie bestenfalls antichronologisch, also mit Ihrer letzten
                                            Tätigkeit beginnend. Denken Sie an sonstige Angaben die Ihnen Pluspunkte
                                            verschaffen könnten, wie z.B. Auslandsaufenthalte, Praktika, Zivildienst,
                                            Zusatzqualifikationen (Fremdsprachen, Führerschein, EDV-Kenntnisse),
                                            berufliche Weiterbildungen etc. Vermeiden Sie hierbei zu viele und vor allem
                                            irrelevante Informationen unterzubringen. Auch hier darf eine originale
                                            Unterschrift nicht fehlen.
                                        </p>

                                        <p style="text-align: justify;"><br><strong>Anlagen:</strong><br>
                                            Die Anlagen wie Zeugnisse, Studienabschlüsse, etc. legen sie am besten immer
                                            nur als Kopien bei. Achten Sie dabei darauf, nicht zu viele Nachweise zu
                                            verschicken und nur diejenigen auszuwählen, die aktuell und für den
                                            jeweiligen Job, für den Sie sich bewerben, am aussagefähigsten sind. Für
                                            Berufseinsteiger sind die jeweils letzten Zeugnisse des schulischen und
                                            akademischen Werdegangs ein Muss.
                                        </p>
                                    </div>
                                </div>
                            </div>

                            <div class="panel panel-default panel-faq">
                                <div class="panel-heading">
                                    <a data-toggle="collapse" data-parent="#accordion" href="#section5">
                                        <h4 class="panel-title">
                                            Gespräch (Interview)
                                        </h4>
                                    </a>
                                </div>

                                <div id="section5" class="panel-collapse collapse">
                                    <div class="panel-body">
                                        <p style="text-align: justify;">
                                            <strong>Vorbereitung und Auftreten sind das A und O bei einem
                                                Vorstellungsgespräch:</strong><br>
                                            Üben Sie sich kurz und auf den Punkt gebracht Ihrem Gegenüber zu
                                            präsentieren. Am besten funktioniert das mit einer zweiten Person als
                                            kleines Rollenspiel. Informieren Sie sich vorher über den Tätigkeitsbereich
                                            der Firma, die Firmenphilosophie, die Größe des Unternehmens etc. Seien Sie
                                            unbedingt pünktlich, lieber 5 Minuten zu früh (aber auch nicht früher);
                                            planen Sie Ihre Anfahrt also gut und informieren Sie sich vorher über
                                            eventuelle Verzögerungen auf Ihrer Route. Während des Gesprächs stellt sich
                                            heraus, ob Sie und das Unternehmen zusammenpassen. Zeigen Sie Interesse und
                                            haken Sie nach. Versuchen Sie Informationen zu sammeln zu denen Sie sich
                                            vorher eine Liste mit Fragen vorbereiten. Lernen Sie diese auswendig aber
                                            sprechen Sie frei und natürlich - Sie sollten nicht so klingen als hätten
                                            Sie Ihren Text einstudiert.
                                        </p>

                                        <p style="text-align: justify;"><br><strong>Was zählt ist der
                                                Gesamteindruck:</strong><br>
                                            Dazu gehört neben dem oben genannten sowohl die Kleidung, als auch Ihre
                                            Körpersprache. Vermeiden Sie wenn möglich gemusterte Kleidung und bevorzugen
                                            Sie unifarbene Kleidungsstücke. Angemessen sind eine ordentliche Frisur und
                                            gepflegte Schuhe. Schmuck und Parfum ist wenn überhaupt, dezent zu
                                            verwenden. Achten Sie auf bestimmte Kleidungscodes verschiedener Branchen
                                            und passen Sie sich diesen so gut wie möglich an. Wichtig ist, dass Sie sich
                                            wohlfühlen. Optimal ist es eine Balance zwischen dem Kleidungsstil der zu
                                            der Firma passt bei der Sie sich bewerben, und dem des eigenen Wohlbefindens
                                            herzustellen.</p>

                                        <p style="text-align: justify;">
                                            Vermeiden Sie verschränkte Arme und Beine, oder die Hände in die
                                            Hosentaschen zu stecken. Dies sind Zeichen von Verschlossenheit. Hören Sie
                                            aufmerksam zu, seien Sie professionell und fragen Sie nach wenn Sie etwas
                                            nicht verstanden haben. Wichtig ist es auch Diskretion zu wahren und niemals
                                            seinen ehemaligen Arbeitgeber schlecht zu reden, denn das macht einen
                                            negativen Eindruck. Zum Schluss erkundigen Sie sich am besten nach der
                                            weiteren Vorgehensweise und bedanken sich für das gezeigte Interesse und die
                                            für Sie aufgebrachte Zeit.
                                        </p>
                                        <p style="text-align: justify;">
                                            Wenn Sie wieder zu Hause sind nehmen Sie sich kurz Zeit sich nochmal per
                                            E-Mail für das interessante Gespräch zu bedanken. Da solche Dankesschreiben
                                            eher selten sind, erhöht dies eventuell Ihre Chancen auf einen Job,
                                            zumindest hebt es Sie von Ihren Mitbewerbern ab. Erwähnen Sie, dass Sie das
                                            Gespräch informativ und motivierend fanden und Sie nun noch mehr davon
                                            überzeugt sind, dass dieser Job der richtige für Sie ist und Sie mehr denn
                                            je den Wunsch pflegen für dieses Unternehmen zu arbeiten. Wiederholen Sie
                                            aber höchstens nur zwei Aspekte des Vorstellungsgesprächs und beantworten
                                            Sie Fragen die während des Gesprächs eventuell noch unbeantwortet geblieben
                                            sind. Schreiben Sie ruhig, dass Sie sich auf eine baldige Antwort, bzw.
                                            Entscheidung freuen würden. Insgesamt sollte dies nicht mehr als eine halbe
                                            Seite in Anspruch nehmen.
                                        </p>
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