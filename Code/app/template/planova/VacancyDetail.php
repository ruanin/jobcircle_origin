<?php 
$headerTitle = 'Stellenangebot als '.$data['vac_data']['jobtitle'] . ' Region '. $data['vac_data']->value_region->title .' - Ref. Nr.: ' .$data['vac_data']['unique_key'];
include 'header.php'; 
$classVacancy = 'class="active"';
$classSubPageVacancyBoard = 'class="active"';
$breadcrumb[] = array('title' => 'Stellenangebote',
                      'url' => '/VacancyBoard',
                    'active' => false);
$breadcrumb[] = array('title' => $data['vac_data']['jobtitle'],
                      'url' => '',
                    'active' => true);
include 'navigation.php'; ?>
<?php
$workingplace = urlencode($data['vac_data']['zip'].' '.$data['vac_data']['city']);
$jobtitle = urlencode($data['vac_data']['jobtitle']);
?>
<style type="text/css">
  .social-icon i.fa
  {
      display             : inline-block;      
      cursor              : pointer;
      margin              : 0px;
      text-align          : center;
      position            : relative;
      z-index             : 1;
      color               : #000000;
      overflow            : hidden;
      border-radius       : 1px;
      -webkit-transition  : all 0.5s;
      -moz-transition     : all 0.5s;
      transition          : all 0.5s;
	  -webkit-transform: translateZ(0);
    }

  .social-icon i.fa::before
  {
        border-radius            : 2px;
        speak                    : none;
        display                  : block;
        -webkit-font-smoothing   : antialiased;
      }

  .social-icon i.fa::after
  {
        pointer-events  : none;
        position        : absolute;
        width           : 100%;
        height          : 100%;
        content         : '';
        display         : none;
        box-sizing      : content-box;
      }


  .social-icon i.fa:hover
  {
        background : #F60A0D;
        color      : #ffffff !important;
      }

  .social-icon i.fa:hover::before
  {
        -webkit-animation: toRightFromLeft 0.3s forwards;
        -moz-animation: toRightFromLeft 0.3s forwards;
        animation: toRightFromLeft 0.3s forwards;
   } 
ul {
	margin-top: 0;
    margin-bottom: 10px; 
	padding: 0 0 0 40px; 
	display: block;
    list-style-type: disc;
    -webkit-margin-start: 0px;
    -webkit-margin-end: 0px;
    -webkit-padding-start: 40px;
}   
</style>
<div class="container mt-20">
    <div class="row">
        <div class="col-md-4">
            <div class="left-about-sidebar box-wrapper">
                <div class="sidebar-content">
                    <h1 class="sidebar-title"><span>Stellenangebot Übersicht</span></h1>
                    <div class="table-responsive">
                        <table class="table">
                            <tbody>
                                <tr>
                                  <td><strong>Ref. Nr.:</strong></td>
                                  <td><?=$data['vac_data']['unique_key'];?></td>
                                </tr>
                                <tr>
                                  <td><strong>Land:</strong></td>
                                  <td><?=$data['vac_data']->value_country->title?></td>
                                </tr>
                                <tr>
                                  <td><strong>Region:</strong></td>
                                  <td><?=$data['vac_data']->value_region->title?></td>
                                </tr>
                                <tr>
                                  <td><strong>Ort:</strong></td>
                                  <td><?=$data['vac_data']['zip'];?> <?=$data['vac_data']['city'];?></td>
                                </tr>
                                <tr>
                                  <td><strong>Pensum:</strong></td>
                                  <td><?=$data['vac_data']->value_workload->name?></td>
                                </tr>
                                <tr>
                                  <td><strong>Arbeitsbeginn:</strong></td>
                                  <td><?=$data['vac_data']->value_entering->name?></td>
                                </tr>
                                <tr>
                                  <td><strong>Anstellungsart:</strong></td>
                                  <td><?php foreach ($data['vac_data']->value_employment as $employment) { ?>
                                                                                                <?=$employment->name?>
                                                                                            <?php } ?></td>
                                </tr>

                                                                                        <?php
                                                                                        if(count($data['vac_data']->value_driver_license) > 0){
                                                                                        ?>
                                <tr>
                                  <td><strong>Führerschein:</strong></td>
                                  <td><?php foreach ($data['vac_data']->value_driver_license as $license) { ?>
                                                                                            <?=$license->name?>
                                                                                        <?php } ?></td>
                                </tr>
                                                                                        <?php
                                                                                        }
                                                                                        ?>
                                                                                        <?php if(isset($data['vac_data']['req_vehicle'])){ ?>
                                                                                        <tr>
                                                                                                <td><strong>Fahrzeug erforderlich</strong></td>
                                                                                                <td><?=$data['vac_data']['req_vehicle']?></td>
                                                                                        </tr>
                                                                                        <?php } ?>
                                <?php if(isset($data['vac_data']->value_sub_branch->name)){ ?>
                                                                                        <tr>
                                                                                                <td><strong>Branche</strong></td>
                                                                                                <td><?=$data['vac_data']->value_sub_branch->name?></td>
                                                                                        </tr>
                                                                                        <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
                                                    <div class="sidebar-content">
                    <div class="post">
                        <iframe id="map" width="335" height="330" src="https://www.google.com/maps/embed/v1/place?key=AIzaSyBNkmJkzj_EvgLw34FCPQKHS3DEVwFONv8" frameborder="0" style="border:0;width:100%;
                                " allowfullscreen></iframe>
                    </div>
                </div>
            </div>
        </div>				



        <div class="col-md-8">
            <div class="box-wrapper">
                <div class="single-page-item" style="min-height: 770px;">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="post">
                                <h1>
                                 <?=$data['vac_data']['jobtitle'];?><br><em><small>Ref. Nr.: <?=$data['vac_data']['unique_key'];?></small></em>  
                                </h1>
                                                                                        <?=html_entity_decode($data['vac_data']->vac_content->header)?>
                                                                                        <?=html_entity_decode($data['vac_data']->vac_content->description)?>
                                                                                        <?=html_entity_decode($data['vac_data']->vac_content->requirements)?>
                                                                                        <?=html_entity_decode($data['vac_data']->vac_content->footer)?>

                                                                                        <a class="btn btn-primary" href="/Vacancyboard/Apply/<?=$data['vac_data']['vac_info_id'];?>">Jetzt bewerben</a>
                            <div class="fb-like" data-href="<?=WEB_URL?>/Vacancyboard/Detail/<?=$data['vac_data']['vac_info_id'];?>" data-layout="button_count" data-action="recommend" data-show-faces="true" data-share="true"></div>
                                                                                </div>
                            <hr></hr>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <h2>Ansprechpartner</h2>
                            <section class="page-article-content clearfix">
                                <div style="padding-right: 95px" class="col-sm-2">
                                    <div style="border: 1px solid  #e2e4e5; padding: 3px; width: 104px">
                                        <img src="<?=WEB_URL?>/tmpl_planova/img/kontakt-planova.jpg">
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <p><strong><?=$data['vac_data']->value_customer_department->name?></strong><br>
                                    <span style="color: #999999"><?=$data['vac_data']->value_customer_department->street?>, <?=$data['vac_data']->value_customer_department->zip?> <?=$data['vac_data']->value_customer_department->city?></span><br><br>
                                    <strong>Tel.:</strong> <?=$data['vac_data']->value_customer_department->phone?><br>
                                    <strong>Fax:</strong> <?=$data['vac_data']->value_customer_department->fax?>
                                    </p>
                                </div>
                                <div class="col-md-4">
                                    <div class="social-icon pull-right">
                                        <ul class="list-unstyled">
                                            <li style="padding:0px;border-bottom:0px !important;"><a href="<?=$data['vac_data']->value_customer_department->fb_url?>" title="Facebook" target="_blank"><i class="fa fa-facebook" style="color:black;"></i></a></li>
                                            <li style="padding:0px;border-bottom:0px !important;"><a href="#" title="Google plus" target="_blank"><span><i class="fa fa-google-plus" style="color:black;"></i></a></li>
                                            <li style="padding:0px;border-bottom:0px !important;"><a href="#" title="Yelp" target="_blank"><i class="fa fa-yelp" style="color:black;"></i></a></li>                                              
                                        </ul>
                                    </div> <!-- //social-icon -->
                                </div>
                            </section>	
                        </div>
                    </div>
                </div>											
            </div>
        </div>
    </div>
</div>
<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/de_DE/sdk.js#xfbml=1&version=v2.5";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>

<script type="application/ld+json">
{
  "@context" : "https://schema.org/",
  "@type" : "JobPosting",
  "title" : "<?=$data['vac_data']['jobtitle'];?>",
  "description" : "<?=html_entity_decode(htmlspecialchars_decode($data['vac_data']->vac_content->header))?><?=html_entity_decode(htmlspecialchars_decode($data['vac_data']->vac_content->description))?> <?=html_entity_decode(htmlspecialchars_decode($data['vac_data']->vac_content->footer))?>",
  "datePosted" : "<?=date('Y-m-d',strtotime($data['vac_data']['from_date']));?>",
  "validThrough" : "<?=date("c",strtotime($data['vac_data']['to_date']));?>",
  "employmentType": <?php if(count($data['employment']) > 1){ 
       echo "[";
       echo '"'. implode('","',$data['employment']) . '"';
       echo "],";
   }else{
      echo '"'.$data['employment'][0].'",';
   } ?>
  "hiringOrganization" : {
    "@type" : "Organization",
    "name" : "<?=$data['vac_data']->value_customer_department->name?>",
    "sameAs" : "https://www.planova.ch",
    "logo": "https://www.planova.ch/tmpl_planova/img/logo.png"
  },
  "jobLocation": {
  "@type": "Place",
    "address": {
    "@type": "PostalAddress",
    "streetAddress": "<?=$data['vac_data']['street'];?>",
    "addressRegion": "<?=$data['vac_data']->value_region['code'];?>",
    "postalCode": "<?=$data['vac_data']['zip'];?>",
    "addressCountry": "<?=$data['vac_data']->value_country['code'];?>"
    }
  }
}
</script>
<?php include 'footer.php'; ?> 