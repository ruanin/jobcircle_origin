<?php include 'header.php'; 
$classCandidate = 'active';
$breadcrumb[] = array('title' => 'Für Bewerber',
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
<div class="page-content pt30 pb0">
    <div class="container">
        <div class="box-wrapper white-container none-padding">
            <div class="row">			
                <div class="col-lg-5 col-md-5 col-sm-12 col-xs-12">
                    <div class="thumb">
                        <img class="img-responsive" src="<?=WEB_URL?>/tmpl_ahapersonal/img/offene_stellenangebote_stellenvermittlung.png" />
                    </div>
                </div> 
                <div class="col-lg-7 col-md-7 col-sm-12 col-xs-12">                                        
                    <div class="single-page-item">
                        <h3 class="mt10">Entdecken Sie die Jobangebote von AHA</h3>
                        <p style="text-align: justify;">Hier finden Sie unsere aktuellen Stellenangebote. Ihre berufliche Zukunft ist bei AHA in den besten Händen. Wir sind die Fachleute für die Vermittlung von Temporär- und Dauerstellen aller Ebenen. Wir sind mit dem lokalen Arbeitsmarkt bestens vertraut und verfügen über exzellente Kontakte zu Arbeitgebern in den praktisch allen Branchen.</p>
                        <p>
                            <ul class="filter-list">
                                <li><a href="/Vacancyboard?place=985">offene Stellenangebote in Aarau</a></li>
                                <li><a href="/Vacancyboard?place=997">offene Stellenangebote in Luzern</a></li>
                                <li><a href="/Vacancyboard?place=996">offene Stellenangebote in Zürich</a></li>
                            </ul>
                        </p>
                        <p>
                            <span class="mt-15"><a class="btn btn-default" style="font-weight: bold;" href="/Vacancyboard">Alle Stellenangebote nach Region</a></span>
                        </p>
                    </div>                                  
                </div>
            </div>				
        </div>
    </div>
</div>
                  
<div class="page-content pt30 pb30">
    <div class="container">
        <div class="box-wrapper white-container none-padding">
            <div class="row">			
                <div class="col-lg-5 col-md-5 col-sm-12 col-xs-12">
                    <div class="single-page-item">
                        <h4>Wir vermitteln Experten und Kaderleute</h4>
                        <p style="text-align: justify;">Sowohl Bewerber für Temporärstellen als auch diejenigen, die eine Dauerstelle suchen, sind bei uns in besten Händen. Die Profis von AHA sind die richtigen Ansprechpartner für die Planung Ihrer beruflichen Zukunft. Wir sind bestens vertraut mit dem lokalen Arbeitsmarkt und pflegen intensive Kontakte zu Arbeitgebern in praktisch allen Branchen. Bei der Stellenvermittlung haben wir uns auf die folgenden Bereiche spezialisiert</p>
                    </div>
                </div> 
                <div class="col-lg-7 col-md-7 col-sm-12 col-xs-12">                                        
                    <div class="thumb">
                        <img class="img-responsive" src="<?=WEB_URL?>/tmpl_ahapersonal/img/Vermitteln_Festanstellung_BefristeteEinsaetze.png" />  
                    </div>                              
                </div>
            </div>				
        </div>
    </div>
</div>                    
                    

<?php include 'footer.php'; ?>