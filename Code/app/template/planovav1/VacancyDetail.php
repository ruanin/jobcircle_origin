<?php
$headerTitle = 'Stellenangebot als '.$data['vac_data']['jobtitle'] . ' Region '. $data['vac_data']->value_region->title .' - Ref. Nr.: ' .$data['vac_data']['unique_key'];
include 'header.php';
$classHome = 'class="active"'; // •
include 'navigation.php';
$jobtitle = $data['vac_data']['jobtitle'];

?>

<div class="pl-cmmn-cnt-section">
    <!-- MAURER -->
    <div class="pl-fwrk">
        <div class="pl-brdcrumb">
            <a href="<?= WEB_URL ?>/Vacancyboard">Zurück zur Auswahl</a>
        </div>
        <?php if ($data['expired'] == 1) { ?>
            <div class="offset-md-3 col-md-6">
                <div class="alert alert-warning pl-vacancy-expired" role="alert">
                    Dieses Angebot ist leider abgelaufen. Spannende aktuelle Jobs findest du <a href="<?= WEB_URL ?>/Vacancyboard">hier</a>.
                </div>
            </div>
        <?php } ?>
        <div class="pl-srh-wrk">
            <h1 class="bs-title"><?= $jobtitle ?></h1>
            <span class="pl-publish">Veröffentlicht <?= date('d.m.Y', strtotime($data['vac_data']['from_date'])); ?></span>
        </div> 
        <div class="pl-srch-details">
            <div class="pl-srch-lft-info">
                <span class="pl-md-heading"><?= $jobtitle ?></span>
                <span class="pl-star-icon pl-book"><i class="fa fa-star-o" aria-hidden="true"></i></span>
                <span class="pl-semibold">Ref. Nr. <?= $data['vac_data']['unique_key']; ?></span>
                <span class="pl-opsb"><?= $data['vac_data']->value_workload->name ?></span>
                <p><?= $data['vac_data']->value_sub_branch->name ?> <br />
                    <span class="pl-op-semi"><?= $data['vac_data']['zip']; ?> <?= $data['vac_data']['city']; ?> <br /></span>
                    <span class="pl-op-reg">Führerschein: <?php foreach ($data['vac_data']->value_driver_license as $license) { ?>
                            <?= $license->name ?>
                        <?php } ?></span><br />
                    <span class="p1-op-semi"></span>                        
                        
                    
                </p>
                
                <a href="/Vacancyboard/Apply/<?= $data['vac_data']['vac_info_id']; ?>/track=<?= $_GET['track']; ?>" class="pl-cmmn-btn mt-0">jetzt bewerben</a>
                <div class="pl-scl-media-icons">
                    <ul>
                        <li><a target="_blank" data-sharer="facebook" data-url="<?= WEB_URL ?>/Vacancyboard/Detail/<?= $data['vac_data']['vac_info_id'] ?><?=!empty($_GET['track']) ? '?track='.$_GET['track']: ''?>"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
                        <li><a target="_blank" data-to="" data-subject="<?= $jobtitle ?>" data-title="<?= $jobtitle ?>" data-sharer="email" data-url="<?= WEB_URL ?>/Vacancyboard/Detail/<?= $data['vac_data']['vac_info_id'] ?><?=!empty($_GET['track']) ? '?track='.$_GET['track']: ''?>"><i class="fa fa-envelope" aria-hidden="true"></i></a></li>
                        <li><a target="_blank" data-sharer="twitter" data-url="<?= WEB_URL ?>/Vacancyboard/Detail/<?= $data['vac_data']['vac_info_id'] ?><?=!empty($_GET['track']) ? '?track='.$_GET['track']: ''?>"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
                        <li><a target="_blank" data-sharer="linkedin" data-url="<?= WEB_URL ?>/Vacancyboard/Detail/<?= $data['vac_data']['vac_info_id'] ?><?=!empty($_GET['track']) ? '?track='.$_GET['track']: ''?>"><i class="fa fa-linkedin" aria-hidden="true"></i></a></li>
                        <li><a target="_blank" data-sharer="whatsapp" data-title="<?= $jobtitle ?>" data-url="<?= WEB_URL ?>/Vacancyboard/Detail/<?= $data['vac_data']['vac_info_id'] ?><?=!empty($_GET['track']) ? '?track='.$_GET['track']: ''?>"><i class="fa fa-whatsapp fa-2" aria-hidden="true"></i></a></li>
                    </ul>
                </div>
            </div>
            <div class="pl-srch-rht-info">
                <div class="pl-sect1">
                    <span class="pl-semibold">STELLENBESCHREIBUNG</span>
                    <p> <?= html_entity_decode($data['vac_data']->vac_content->header) ?></p>
                    <div id="pl-cnt-visible" class="pl-cnt-visible"><p><?= html_entity_decode($data['vac_data']->vac_content->description) ?></div>
                    <a href="#" class="pl-cmmn-btn float-right pl-vis"><span class="pl-vis-txt">mehr</span><span class="pl-vis-txt-none">weniger</span></a>
                </div>
                <div class="pl-sect1">
                    <span class="pl-semibold">VORAUSSETZUNGEN</span>
                    <?= html_entity_decode($data['vac_data']->vac_content->requirements) ?>
                </div>
                <div class="pl-sect1">
                    <span class="pl-semibold">UNTERNEHMEN</span>
                    <?= html_entity_decode($data['vac_data']->vac_content->footer) ?>
                </div>
            </div>
        </div>
        <div class="pl-srch-cnt-info">
            <a href="/Vacancyboard/Apply/<?= $data['vac_data']['vac_info_id']; ?>">JETZT BEWERBEN</a>
        </div>
        <div class="pl-location-map">
            <div id="map"></div>
            <script>
                function initMap() {
                    var map = new google.maps.Map(document.getElementById('map'), {
                        zoom: 5,
                        center: {lat: 44.797916, lng: -93.278046},
                        mapTypeControl: true,
                        zoomControl: true,
                        zoomControlOptions: {
                            position: google.maps.ControlPosition.LEFT_BOTTOM
                        },
                        fullscreenControl: true,
                        mapTypeId: google.maps.MapTypeId.ROADMAP
                    });

                    var contentString = '<div class="pl-map-base"><div class="pl-map-logo"><img src="<?= WEB_URL ?>/tmpl_planovav1/images/planova-symbol.png" /> <span class="pl-map-logo-slog">planova human capital ag</span></div>'
                            + '<div class="pl-map-address"><?= $data['vac_data']->value_customer_department->street ?><br /> <?= $data['vac_data']->value_customer_department->zip ?> <?= $data['vac_data']->value_customer_department->city ?> </div>'
                            + '<div class="pl-map-address"><img src="<?= WEB_URL ?>/tmpl_planovav1/images/17216.png" class="img-fluid"/> <?= $data['vac_data']->value_customer_department->phone ?> <br /></div></div>';

                    var infowindow = new google.maps.InfoWindow({
                        content: contentString
                    });
                    var icon = {
                        url: "https://static.thenounproject.com/png/2846-200.png",
                        scaledSize: new google.maps.Size(1, 1),
                        origin: new google.maps.Point(0, 0),
                        anchor: new google.maps.Point(0, 0)
                    };
                    var marker = new google.maps.Marker({
                        position: {lat: 44.797916, lng: -93.278046},
                        map: map,
                        title: "Marker",
                        icon: icon
                    });
                    google.maps.event.addListener(marker, 'click', function () {
                        infowindow.open(map, marker);
                    });
                    infowindow.open(map, marker);

                }
            </script>
            <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBNkmJkzj_EvgLw34FCPQKHS3DEVwFONv8&callback=initMap" async defer></script>
        </div>
        <div class="pl-angebote">
            <h1 class="bs-title">ÄHNLICHE ANGEBOTE</h1>
            <div class="pl-angebote-loct">
                <div class="container">
                    <div class="row">
                        <?php if (!empty($data['otherVacancy'])) { ?>
                            <?php
                            foreach ($data['otherVacancy'] as $vacancy) {
                                $arrEmployment = $vacancy->value_employment()->get();
                                ?>
                                <div class="pl-divison">
                                    <div class="pl-arb-name">
                                        <h2 class="pl-md-heading"><a href="/Vacancyboard/Detail/<?= $vacancy->vac_info_id; ?>"><?= $vacancy->jobtitle; ?></a></h2>
                                        <span class="pl-job-type"><?= $arrEmployment[0]->name ?></span>
                                    </div> 
                                    <div class="pl-arb-address">
                                        <p><span class="pl-job-desc"><?= $vacancy->zip; ?> <?= $vacancy->city; ?> <br />Ref. Nr. <?= $vacancy->unique_key; ?></span>
                                            <a href="/Vacancyboard/Detail/<?= $vacancy->vac_info_id; ?>" class="pl-cmmn-btn float-right">ansehen</a></p>
                                    </div>
                                </div>
                            <?php } ?>
                        <?php } else { ?>

                            <div class="pl-divison">
                                <span class="pl-md-heading">Maurer/in</span>
                                <p>Festanstellung <br />
                                    4414 Füllinsdorf</p>
                            </div>
                            <div class="pl-divison">
                                <span class="pl-md-heading">Maurer/in</span>
                                <p>Festanstellung<br />
                                    3000 Bern</p>
                            </div>
                            <div class="pl-divison">
                                <span class="pl-md-heading">Maurer/in Hochbau</span>
                                <p>Festanstellung<br />
                                    5422 Steinen</p>
                            </div>
                            <div class="pl-divison">
                                <span class="pl-md-heading">Maurer/in</span>
                                <p>Temporärarbeit<br />
                                    5312 Döttingen</p>
                            </div>
<?php } ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- MAURER Ends -->		

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