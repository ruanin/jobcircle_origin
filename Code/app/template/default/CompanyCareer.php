<?php include 'header.php';
$classAbout = 'active';
$classSubPageCareer = 'class="active"';
$breadcrumb[] = array('title' => 'Über aha personal',
                      'url' => '/Pages/aboutAHA',
                    'active' => false);
$breadcrumb[] = array('title' => 'Karriere',
                      'url' => '/Pages/career',
                    'active' => true);
$data['title']= "KARRIERE BEI aha personal";
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
<div class="page-content container">
    <div class="box-wrapper page-content white-container none-padding">
        <div class="row">
            <div class="col-lg-5 col-md-5 col-sm-12 col-xs-12">									
                <div class="thumb">
                    <img class="img-responsive" alt="Karriere Personalberater" src="<?=WEB_URL?>/tmpl_ahapersonal/img/karriere_personalberater.png" />
                </div>
            </div>				

            <div class="col-lg-7 col-md-7 col-sm-12 col-xs-12">
                <h3 class="p0 mt10">KARRIERE</h3>
                <h6>
                AHA expandiert!	
                </h6>

                <p style="text-align: justify; margin-bottom: 20px;">
                AHA ist mehr als ein Personaldienstleister - und verbinden die gleichen Zielen und ähnliche Werte. Auch wenn nicht jeder zu uns passt,  aber wenn es passt, dann sind Sie Teil eines Teams, das viel auf dem Schweizer Arbeitsmarkt bewegt. Wir wissen, dass jeder Mensch eigene Stärken und Fähigkeiten besitzt. Wir fordern Leistung und fördern die berufliche Entwicklung. Als Unternehmen, das sich auf das Rekrutieren von Mitarbeitern spezialisiert hat, erkennen wir "versteckte Talente" und ebnen den Weg für dauerhafte Karrieren. Ergreifen Sie die Chance und bewerben Sie sich auf die untenstehenden Stellen. 
                </p>
                <ul class="filter-list">
                    <?php foreach($data['internalVac'] as $internalJob) { ?>
                    <li><a href="/Vacancyboard/Detail/<?=$internalJob->vac_info_id;?>"><strong><?=$internalJob->jobtitle;?></strong> in <?=$internalJob->city;?></a></li>
                   <?php } ?>
                </ul>									
            </div>
        </div>
    </div>
    </div>
<?php include 'footer.php'; ?>