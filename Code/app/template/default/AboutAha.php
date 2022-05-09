<?php include 'header.php'; ?>
<?php include 'navigation.php'; ?>
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
<div id="page-content">
    <div class="container">
        <div class="row">
            <div class="col-md-12 none-padding">
                <div class="white-container pt20 pb30">                 
                    <h3 class="p0 mt10"><i>Bei uns finden Sie die Mitarbeitenden, die Sie brauchen!</i></h3>
                    <p>Unsere innovative Rekrutierungssoftware ermöglicht es uns, die besten Unternehmen mit den besten Mitarbeitern im entscheidenden Moment zusammen zu bringen. Wir sind mit den Anforderungen und Qualifikationen bestens vertraut. Aus diesem Grund sind wir bei vielen unserer Kunden "Preffered Supplier" und in einigen Unternehmen sogar als A-Lieferant eingestuft. Durch unsere langjährige Erfahrung sind wir in der Lage, die täglichen Herausforderungen zu meistern. </p>
                    <p>Aber wir geben uns auch mit unserer 30-jährigen Erfahrung nicht zufrieden. Denn die Zeit bleibt nicht stehen und vielleicht schon morgen stehen wir, Sie und auch unsere Temporärmitarbeiter vor neuen Herausforderungen. Daher ist eine kontinuierliche Fortbildung für uns selbstverständlich.</p>
                    <p>Wir machen keine halben Sachen. Unser Horizont endet nicht mit Quartalen sondern erstreckt sich über Jahre und Dekaden, und unsere schnelle Reaktionsfähigkeit beruht auf unserem guten Verhältnis zu unseren Mitarbeitern und den intensiven Beziehungen zu unseren Kunden. Unsere übliche Reaktionszeit beträgt lediglich 24 Stunden. Dies ist nur möglich, weil wir über ein umfassendes Netzwerk verfügen, das wir ständig verbessern und ausbauen. </p>
                    <p>Als Kunde oder Bewerber werden Sie feststellen, dass wir als TEAM an einem Strang ziehen und uns in Ihrer Branche bestens auskennen. Das ist ein Grund für den Vorsprung, den die AHA personal ag bietet. AHA-Personalberater sind Spezialisten sind im lokalen Arbeitsmarkt verwurzelt. Sie verfügen über fundierte Bau- und Arbeitserfahrung und sprechen Ihre Sprache. Dieses Know-How ermöglicht es uns, alle Positionen mit den geeigneten Mitarbeitern zu besetzen und somit deren Motivation zu stärken.</p>
                    <p>Bei AHA sind Menschen keine Nummern sondern Mitarbeitende mit wertvollen, individuellen Fähigkeiten. Unsere Temporärmitarbeiter wissen, dass ihrer Arbeit geschätzt und ihnen Verständnis entgegengebracht wird. Jeder an unsere Kunden vermittelte Temporärmitarbeiter wird dem betreffenden Unternehmen und dem betreuenden Personalberater in einem Vorgespräch ausführlich vorgestellt. Auf diese Weise entsteht ein Vertrauensverhältnis, das die Zuverlässigkeit und Motivation aller Beteiligten deutlich erhöht. Gute Arbeit und leistungsgerechte Bezahlung! So entsteht eine überdurchschnittlich hohe Kundenzufriedenheit, um die es letztlich geht. AHA liefert die gewünschten Ergebnisse.</p>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include 'footer.php'; ?>