<?php
include 'header.php';
$classMyAha = 'active';
$breadcrumb[] = array('title' => 'my brefis',
    'url' => '/Candidate/Dashboard',
    'active' => true);
include 'navigation.php';
if($data['profile']->gender == 'W'){
    $profilePic = 'icon_lady_bre.png';
}else{
    $profilePic = 'icon_men_bre.png';
}
?>
<style>
.nav-tabs li a {
    padding: 15px 15px;
}
</style>
<div class="document-title">
    <div class="container">
        <h1>My Brefis</h1>
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
        <div class="row">
            <?php include 'MyBrefisNavigation.php'; ?>
        </div>
        <div class="row">
            <div class="col-md-12 page-content">
                <div class="row">
                    <div class="col-md-12">
                        <div class="box-wrapper white-container">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="col-md-3 none-padding">
                                        <div class="thumb">
                                            <img src="<?= WEB_URL ?>/tmpl_brefis/img/<?=$profilePic?>" class="img-responsive" style="position: relative; width: 50%; margin-left: auto; margin-right: auto;">
                                        </div>
                                    </div>
                                    <div class="col-md-9 none-padding">
                                        <h3><span><?=$data['profile']->l_name?> <?=$data['profile']->f_name?></span></h3>
                                        <h4><span><?=$data['profile']->profession?></span></h4>
                                        <div class="progress" style="margin-top:25px;">
                                            <div style="width: <?=$data['progress']?>%;" class="progress-bar progress-bar-danger" style="background-color:#F60A0D;"><span class="sr-only"><?=$data['progress']?>% Complete (success)</span>
                                            </div>
                                        </div>
                                        <?php if(count($data['cvfiles']) == 0){ ?>
                                        <p style="color:#F60A0D;"><span><i class="fa fa-exclamation-triangle"></i> Dein Lebenslauf ist noch nicht vollständig.</span></p>
                                        <a class="btn btn-default subbtn" style="margin-top:10px;" href="/Candidate/profile">Lebenslauf vervollständigen</a>
                                        <?php } ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row pt30">
                    <div class="col-md-12">
                        <div class="box-wrapper white-container">
                            <h3 class="mt10"><span>Meine Bewerbungen</span></h3>
                            <hr></hr>
                            <div class="row">
                                <div class="col-md-12">
                                    <?php if(count($data['application']) > 0){ ?>
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
                                            <?php foreach ($data['application'] as $application) { ?>
                                            <tr>
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
<?php include 'footer.php'; ?>
