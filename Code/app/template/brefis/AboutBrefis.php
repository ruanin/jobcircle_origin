<?php include 'header.php'; ?>
<?php include 'navigation.php'; ?>
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
            <div class="white-container pt20 pb30">                 
                <h2 class="p0 mt10" style="margin-top:0px;">Wir finden die Mitarbeitenden, die Sie brauchen!</h2>
                <p>Unsere leistungsfähige Rekrutierungssoftware ermöglicht es uns, die besten Unternehmen mit den besten Mitarbeitern zum richtigen Zeitpunkt zusammen zu bringen. Wir kennen uns mit den jeweiligen Anforderungen und den benötigten Qualifikationen aus. Daher sind wir bei vielen unserer Kunden "Preffered Supplier" und werden in einigen Unternehmen sogar als A-Lieferant geführt. Unsere umfassenden Erfahrungen ermöglichen es uns, Lösungen für die täglichen Herausforderungen zu entwickeln. </p>
                <p>Aber wir ruhen uns auf den Lorbeeren unserer 30-jährigen Erfahrung nicht aus. Denn die Entwicklung schreitet voran und vielleicht schon morgen müssen wir, Sie oder unsere Temporärmitarbeiter neue Herausforderungen meistern. Aus diesem Grund setzen wir auf eine kontinuierliche Fortbildung. </p>
                <p>Bei uns hat Gründlichkeit Tradition. Wir denken und handeln nicht in Quartalen sondern unser Horizont erstreckt sich über Jahre und Dekaden. Unsere Schnelligkeit verdanken wir unserem guten Verhältnis zu unseren Mitarbeitern und den bewährten Beziehungen zu unseren Kunden. Unsere übliche Reaktionszeit beträgt lediglich 24 Stunden. Möglich macht dies unser grosses Netzwerk, das wir ständig weiter entwickeln und ausbauen. </p>
                <p>Als Kunde oder Bewerber merken Sie sofort, dass wir ein TEAM mit gemeinsamen Zielen sind, das sich in Ihrer Branche bestens auskennt. Unsere Kompetenz ist Ihr Gewinn. Die Personalberater von brefis sind ausgewiesene Fachleute und besitzen Erfahrungen auf dem lokalen Arbeitsmarkt. Sie verfügen über fundierte Erfahrungen in der Baubranche und im Personalbereich und wissen, worauf es ankommt. Dank dieser Kompetenzen können wir alle Positionen mit den geeigneten Mitarbeitern besetzen und stärken dadurch deren Motivation. </p>
                <p>Bei brefis behandeln wir Menschen nicht wie Nummern sondern als wertvolle Mitarbeitende mit individuellen Fähigkeiten. Unsere Temporärmitarbeiter erkennen, dass ihre Arbeit geschätzt wird und dass wir ihre Belange und Anliegen verstehen. Alle Temporärmitarbeiter, die wir an unsere Kunden vermitteln, werden dem betreffenden Unternehmen und dem zuständigen Personalberater in einem Vorstellungsgespräch ausführlich vorgestellt. So wird ein Vertrauensverhältnis begründet, das die Zuverlässigkeit und Motivation von Arbeitgeber und Arbeitnehmer deutlich erhöht. Gutes Geld für gute Arbeit! Dies schafft eine besonders hohe Kundenzufriedenheit, die wir letztlich anstreben. brefis schafft die Basis für Ihren Erfolg.</p>
            </div>
        </div>
    </div>
</div>

<?php include 'footer.php'; ?>