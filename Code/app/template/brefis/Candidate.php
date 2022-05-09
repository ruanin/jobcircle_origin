<?php include 'header.php'; 
$classCandidate = 'active';
$breadcrumb[] = array('title' => 'Für Bewerber',
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
    <div class="box-wrapper white-container none-padding">
        <div class="row">
            <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                <div class="thumb">
                    <img class="img-responsive" alt="Stellenangebote Temporär Feststellen" src="<?=WEB_URL?>/tmpl_brefis/img/stellenangebote_temp_feststellen.png" />
                </div>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                <div class="single-page-item">
                    <h4 class="mt10" style="margin-top:0px;">Finden Sie interessante Jobangebote bei Brefis</h3>
                    <p style="text-align: justify;">Brefis bietet Ihnen viele aktuelle Stellenangebote. Wir unterstützen Sie bei der Gestaltung Ihrer beruflichen. Wir sind Ihre kompetenten Ansprechpartner für die Vermittlung von Temporär- und Dauerstellen aller Ebenen. Wir kennen uns auf dem lokalen Arbeitsmarkt aus und pflegen exzellente Kontakte zu Arbeitgebern in praktisch allen Wirtschaftszweigen.</p>
                    <p>
                        <ul style="border:none;margin-left:15px;margin-top:20px; list-style-type:none;">
                            <li><i class="fa fa-chevron-right" aria-hidden="true"></i><a href="/Vacancyboard?place=996"><strong>Stellenangebote in Region Zürich</strong></a></li>
                            <li><i class="fa fa-chevron-right" aria-hidden="true"></i><a href="/Vacancyboard?place=985"><strong>Stellenangebote in Region Aargau</strong></a></li>
                            <li><i class="fa fa-chevron-right" aria-hidden="true"></i><a href="/Vacancyboard?place=997"><strong>Stellenangebote in Region Luzern</strong></a></li>
                        </ul>
                    </p>
                    <p>
                        <span class="mt-15"><a class="btn btn-secondary" style="font-weight: bold;" href="/Vacancyboard">Alle Stellenangebote nach Region</a></span>
                    </p>
                </div>                                  
            </div>
        </div>				
    </div>
</div>
<br/><br/>
<div class="container">
    <div class="box-wrapper white-container none-padding">
        <div class="row">			
            <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                <div class="single-page-item">
                    <h4 style="margin-top: 0px;">Wir vermitteln Fachleute und Kaderleute für Festanstellungen und Temporärstellen</h4>
                    <p style="text-align: justify;">Wir bieten eine optimale Betreuung für Bewerber auf Temporärstellen und Dauerstellen. Die Fachleute von Brefis sind die kompetenten Ansprechpartner für Ihre Karriereplanung. Wir von Brefis kennen uns aus mit dem lokalen Arbeitsmarkt und haben weitreichende Kontakte zu Arbeitgebern in vielen Bereichen der Wirtschaft.</p>
                </div>
            </div> 
            <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">                                        
                <div class="thumb">
                    <img class="img-responsive" alt="Vermitteln Festanstellung befristet Einsatz" src="<?=WEB_URL?>/tmpl_brefis/img/Vermitteln_Festanstellung_BefristeteEinsaetze.png" />  
                </div>                              
            </div>
        </div>				
    </div>
</div>
                
                    

<?php include 'footer.php'; ?>