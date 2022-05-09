<?php
include 'header.php';
include 'navigation.php';

if($data['profile']->gender == 'W'){
    $profilePic = 'icon_lady_pla.png';
}else{
    $profilePic = 'icon_men_pla.png';
}

?>
<section class="about-content-area mt-15">
    <div class="container">
        <div class="row">
            <?php include 'MyPlanovaNavigation.php'; ?>		 
            <div class="col-md-9">
                <div class="row">	
                    <div class="col-md-12">
                        <div class="box-wrapper page-content">
                            <div class="thumb">
                                <h3><span>Lebenslauf</span></h3>
                                <hr></hr>
                                <div class="row">
                                        <div class="col-md-3">
                                            <div class="thumb">
                                                <img src="<?= WEB_URL ?>/tmpl_planova/img/<?=$profilePic?>" class="img-responsive" style="width: 55%;margin-right: auto;margin-left: auto;">
                                            </div>
                                        </div>
                                        <div class="col-md-9">
                                            <div class="thumb">
                                                <h3><span><?=$data['profile']->l_name?> <?=$data['profile']->f_name?></span></h3>
                                                <h4><span><?=$data['profile']->profession?></span></h4>
                                                
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
                </div>
                <div class="row mt-15" >
                    <div class="col-md-12">
                        <div class="box-wrapper page-content">
                            <div class="thumb">
                                <h3><span>Meine Bewerbungen</span></h3>
                                <hr></hr>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="thumb">
                                            <?php if(count($data['application']) > 0){ ?>
                                            <table class="table table-bordered table-hover">
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
                                                <?php foreach ($data['application'] as $application) { ?>
                                                <tr class="active">
                                                    <td><a href="/Vacancyboard/Detail/<?=$application->vac_info_id?>"><strong><?=$application->title?></strong></a></td>
                                                    <td><?=$application->unique_key?></td>
                                                    <td>Festanstellung</td>
                                                    <td><?=$application->city?></td>
                                                    <td>Offen</td>
                                                    <td><?=$application->created_at?></td>
                                                </tr>
                                                <?php } ?>
                                            </tbody>
                                        </table>
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

            
        </div>
    </div>
</section>
<?php include 'footer.php'; ?>