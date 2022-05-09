<?php include 'header.php'; ?>
<?php include 'navigation.php'; ?>
<?php $workingplace = urlencode($data['vac_data']['zip'].' '.$data['vac_data']['city']);
$jobtitle = urlencode($data['vac_data']['jobtitle']);
?>
<style type="text/css">

.social-links {
    padding-left:0px !important;
    padding-right:0px !important;
    font-size: 20px !important;
    list-style: none !important;
}

.social-links li {
    float: left !important;
    margin-right: 5px !important;
}

.social-links li:last-child {
    margin-right: 0px !important;
}

.social-links li a {
    padding-left:0px !important;
    padding-right:0px !important;
    border: 1px solid #e9e9e9 !important;
    border-radius: 50% !important;
    color: #999 !important;
    display: block !important;
    font-size: 15px !important;
    height: 30px !important;
    position: relative !important;
    transition: background-color 0.15s linear !important;
    text-align: center !important;
    width: 30px !important;
}

.social-links li a i {
    left: 65% !important;
    position: absolute !important;
    top: 50% !important;
    transform: translateX(-50%) translateY(-50%) !important;
    -webkit-transform: translateX(-50%) translateY(-50%) !important;
}

.social-links li a:hover {
    background-color: #e9e9e9 !important;
}
.jobs-single-item > ul {
	padding: 5px 0 5px 20px !important; 
	display: block !important;
    list-style-type: disc !important;
    -webkit-margin-start: 0px !important;
    -webkit-margin-end: 0px !important;
}
</style>
<div class="document-title">
    <div class="container">
        <h1><?=$data['vac_data']['jobtitle'];?> <small><?=$data['vac_data']['zip'];?> <?=$data['vac_data']['city'];?></small></h1>
    </div><!-- /.container -->
</div><!-- /.document-title -->

<div class="document-breadcrumb">
    <div class="container">
        <ul class="breadcrumb">
            <li><a href="/Home">Home</a></li>
			<li><a href="/Vacancyboard">Stellenangebote</a></li>
            <li><a href="/Vacancyboard/Detail/<?=$data['vac_data']['vac_info_id'];?>"><?=$data['vac_data']['jobtitle'];?></a></li>
        </ul>
    </div><!-- /.container -->
</div><!-- /.document-title -->


<div class="container">
    <div class="row">
        <div class="col-sm-4 page-sidebar">
            <div class="row">
                <div class="company-card">
                    <div class="company-card-data">
                        <h3 style="padding: 8px 0px 8px 20px;margin-top:0px;">Kontaktdaten</h3>
                        <p style="padding: 8px 0px 8px 20px;">
                            <strong><?=$data['vac_data']->value_customer_department->name?></strong><br>
                            <span><?=$data['vac_data']->value_customer_department->street?></span><br>
                            <span><?=$data['vac_data']->value_customer_department->zip?> <?=$data['vac_data']->value_customer_department->city?></span><br><br>
                            <strong>Tel.:</strong> <?=$data['vac_data']->value_customer_department->phone?><br>
                            <strong>Fax:</strong> <?=$data['vac_data']->value_customer_department->fax?>
                        </p>

                        <p style="padding: 8px 0px 8px 20px;">
                            <span><strong>Kontakt Teilen</strong></span>
                            <ul class="social-links"  style="font-size:15px;vertical-align: middle !important;padding-left:20px !important; ">
                                <li><a href="<?=$data['vac_data']->value_customer_department->fb_url?>" target="_blank"><i class="fa fa-facebook"></i></a></li>
                                <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                                <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                            </ul>
                        </p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="company-card">
                    <div class="company-card-data">
                        <dt style="width:120px;">Job-ID</dt>
                        <dd>#<?=$data['vac_data']['unique_key'];?></dd>
                        <dt style="width:120px;">Land</dt>
                        <dd><?=$data['vac_data']->value_country->title?></dd>
                        <dt style="width:120px;">Region</dt>
                        <dd><?=$data['vac_data']->value_region->title?></dd>
                        <dt style="width:120px;">Ort</dt>
                        <dd><?=$data['vac_data']['zip'];?> <?=$data['vac_data']['city'];?></dd>
                        <dt style="width:120px;">Pensum</dt>
                        <dd><?=$data['vac_data']->value_workload->name?></dd>
                        <dt style="width:120px;">Arbeitsbeginn</dt>
                        <dd><?=$data['vac_data']->value_entering->name?></dd>
                        <?php foreach ($data['vac_data']->value_employment as $employment) { ?>
                            <dt style="width:120px;">Anstellungsart</dt>
                            <dd><?=$employment->name?></dd>
                        <?php } ?>
                        <?php if(count($data['vac_data']->value_driver_license) > 0){ ?>
                        <dt style="width:120px;">Führerschein</dt>
                        <dd><?php foreach ($data['vac_data']->value_driver_license as $license) { ?> 
                                <?=$license->name?>
                            <?php } ?>
                        </dd>
                        <?php } ?>
                        <?php if(isset($data['vac_data']['req_vehicle'])){ ?>
                        <dt style="width:120px;">Fahrzeug erforderlich</dt>
                        <dd><?=$data['vac_data']['req_vehicle']?></dd>
                        <?php } ?>
                        <?php if(isset($data['vac_data']->value_sub_branch->name)){ ?>
                        <dt style="width:120px;">Branche</dt> 
                        <dd><?=$data['vac_data']->value_sub_branch->name?></dd>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div> <!-- end .page-sidebar -->

        <div class="col-sm-8 pt30" style='padding-left:40px;'>
            <div class="jobs-item jobs-single-item">
                <div class="position-header">
                    <h1><?=$data['vac_data']['jobtitle'];?></h1>
                    <h2 style="padding-top:5px;"><span><?=$data['vac_data']['zip'];?> <?=$data['vac_data']['city'];?></span></h2>
                </div>
                <?=html_entity_decode($data['vac_data']->vac_content->header)?><br/>
                <?=html_entity_decode($data['vac_data']->vac_content->description)?><br/>
                <?=html_entity_decode($data['vac_data']->vac_content->requirements)?><br/>
                <?=html_entity_decode($data['vac_data']->vac_content->footer)?>

                <div class="clearfix" style='margin-top:20px;'>
                    <a href="/Vacancyboard/Apply/<?=$data['vac_data']['vac_info_id'];?>" class="btn btn-secondary">Bewerben</a>
                    <ul class="social-links pull-right" style="font-size:15px;vertical-align: middle !important;padding-top:5px;padding-bottom: 5px;">
                        <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                        <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                        <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                    </ul>
                    <span style="padding-right:10px; padding-top:10px; padding-bottom: 10px;font-size:13px;vertical-align: middle !important;" class="pull-right"><strong>Teilen</strong></span>
                </div>
            </div>
        </div> <!-- end .page-content -->
    </div>
</div> <!-- end .container -->
<script type="application/ld+json">
{
  "@context" : "https://schema.org/",
  "@type" : "JobPosting",
  "title" : "<?=$data['vac_data']['jobtitle'];?>",
  "description" : "<?=html_entity_decode(htmlspecialchars_decode($data['vac_data']->vac_content->header))?><?=html_entity_decode(htmlspecialchars_decode($data['vac_data']->vac_content->description))?> <?=html_entity_decode(htmlspecialchars_decode($data['vac_data']->vac_content->footer))?>",
  "identifier": {
    "@type": "PropertyValue",
    "name": "<?=$data['vac_data']->value_customer_department->name?>",
    "value": "1234567"
  },
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
    "sameAs" : "https://www.brefis.ch",
    "logo": "http://www.brefis.ch/tmpl_brefis/img/logo.jpg"
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
