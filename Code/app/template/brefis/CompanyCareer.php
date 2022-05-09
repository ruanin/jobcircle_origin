<?php include 'header.php';
$classAbout = 'active';
$classSubPageCareer = 'class="active"';
$breadcrumb[] = array('title' => 'Über brefis',
                      'url' => '/Pages/aboutbrefis',
                    'active' => false);
$breadcrumb[] = array('title' => 'Karriere',
                      'url' => '/Pages/career',
                    'active' => true);
$data['title']= "Karriere bei brefis personal ag";
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
    <div class="box-wrapper page-content white-container none-padding">
        <div class="row">
            <div class="col-lg-5 col-md-5 col-sm-12 col-xs-12">
                <div class="thumb">
                    <img class="img-responsive" alt="Firma Brefis" src="<?=WEB_URL?>/tmpl_brefis/img/firma-brefis.jpg" />
                </div>
            </div>

            <div class="col-lg-7 col-md-7 col-sm-12 col-xs-12">
                <h1 style="margin-top:0px;padding-top:0px;vertical-align: top;">Brefis auf Expansionskurs</h1>
                <p style="text-align: justify;">
                Brefis ist mehr als ein Personaldienstleister - wir haben die gleichen Ziele und ähnliche Werte. Nicht alle mögen zu uns passen, aber wenn es passt, dann sind Sie Teil eines starken Teams, das viel auf dem Schweizer Arbeitsmarkt bewegt. Uns ist bewusst, dass jeder Mensch über bestimmte Stärken und Fähigkeiten verfügt. Wir fordern Leistung und fördern das berufliche Fortkommen. Wir haben uns auf das Rekrutieren von Mitarbeitern spezialisiert hat und  erkennen "heimliche Talente" und bereiten den Weg für dynamische Karrieren. Ergreifen Sie die Gelegenheit und bewerben Sie sich auf die offenen Stellen. 
                </p>
                <ul style="border:none;margin-left:15px;margin-top:20px; list-style-type:none;">
                    <?php foreach($data['internalVac'] as $internalJob) { ?>
                    <li><i class="fa fa-chevron-right" aria-hidden="true"></i><a href="/Vacancyboard/Detail/<?=$internalJob->vac_info_id;?>"><strong><?=$internalJob->jobtitle;?></strong> in <?=$internalJob->city;?></a></li>
                   <?php } ?>
                </ul>
            </div>
        </div>
    </div>
</div>
<?php include 'footer.php'; ?>