<?php
include 'header.php';
$classMyPlanova = 'active';
$breadcrumb[] = array('title' => 'Für Bewerber',
    'url' => '/Pages/candidate',
    'active' => false);
$breadcrumb[] = array('title' => 'MyPlanova',
    'url' => '',
    'active' => true);
include 'navigation.php';

if($data['profile']->gender == 'W'){
    $profilePic = 'icon_lady_pla.png';
}else{
    $profilePic = 'icon_men_pla.png';
}

?>
<div class="pl-cmmn-cnt-section">
    <div class="pl-ueber">
        <h1 class="bs-title">DASHBOARD</h1>
        <?php include 'MyPlanovaNavigation.php'; ?>
    </div>
    <div class="pl-ueber-cnt-sect">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="row">	
                        <div class="col-md-12">
                                <div class="thumb">
                                    <h3 class="profile-title">Lebenslauf</h3>
                                    <hr></hr>
                                    <div class="row">
                                        <div class="col-md-3">
                                            <img src="<?= WEB_URL ?>/tmpl_planova/img/<?=$profilePic?>" class="img-responsive" style="width: 55%;margin-right: auto;margin-left: auto;">
                                        </div>
                                        <div class="col-md-9">
                                            <div class="content-text">
                                                <h3><?=$data['profile']->l_name?> <?=$data['profile']->f_name?></h3>
                                                <h4><?=$data['profile']->profession?></h4>

                                                <div class="progress" style="margin-top:25px;">
                                                    <div style="width: <?=$data['progress']?>%;" class="progress-bar progress-bar-danger" style="background-color:#F60A0D;"><span class="sr-only"><?=$data['progress']?>% Complete (success)</span>
                                                    </div>
                                                </div>
                                                <?php if(count($data['cvfiles']) == 0){ ?>
                                                <p style="color:#F60A0D;"><span><i class="fa fa-exclamation-triangle"></i> Dein Lebenslauf ist noch nicht vollständig.</span></p>
                                                <a class="btn btn-primary" style="margin-top:10px;" href="/Candidate/profile">Lebenslauf vervollständigen</a>
                                                <?php } ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            
                        </div>
                    </div>
                    <div class="row mt-5">
                        <div class="col-md-12">
                            <h3 class="profile-title">Meine Bewerbungen</h3>
                            <hr></hr>
                            <div class="row">
                                <div class="col-md-12">
                                    <?php if(count($data['application']) > 0){ ?>
                                    <div style="overflow-x:auto;">
                                        <table class="table table-bordered table-striped table-hover">
                                            <thead>
                                                <tr>
                                                    <th>Tätigkeit</th>
                                                    <th>Referenz-Nummer</th>
                                                    <th>Art der Anstellung</th>
                                                    <th>Ort</th>
                                                    <th>Status</th>
                                                    <th>gesendet am</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php foreach ($data['application'] as $application) {
                                                    $arrEmployment = $application->value_employment()->get();
                                                    ?>
                                                <tr>
                                                    <td><a href="/Vacancyboard/Detail/<?=$application->vac_info_id?>"><strong><?=$application->title?></strong></a></td>
                                                    <td><?=$application->unique_key?></td>
                                                    <td><?=$arrEmployment[0]->name?></td>
                                                    <td><?=$application->city?></td>
                                                    <td><?=$application->status == 1 ? "Offen" : "Geschlossen" ?></td>
                                                    <td><?=$application->created_at?></td>
                                                </tr>
                                                <?php } ?>
                                            </tbody>
                                        </table>
                                    </div>
                                    <?php }else{ ?>
                                    <div class="alert alert-info">
                                        Es sind keine Bewerbungen vorhanden.
                                    </div>    
                                    <?php } ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

<?php include 'footer.php'; ?>