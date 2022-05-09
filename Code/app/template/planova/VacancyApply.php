<?php include 'header.php'; 
$classVacancy = 'class="active"';
$classSubPageVacancyBoard = 'class="active"';
$breadcrumb[] = array('title' => 'Stellenangebote',
                      'url' => '/VacancyBoard',
                    'active' => false);
$breadcrumb[] = array('title' => $data['vac_data']['jobtitle'],
                      'url' => '',
                    'active' => true);
include 'navigation.php'; ?>
<div class="about-content-area mt-20">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="page-content box-wrapper">
                    <section class="page-article-content clearfix">
                        <div class="row">
                            <div class="col-sm-8">
                                <?php if(!empty($data['error'])) {
                                    ?>
                                <div class="alert alert-danger" role="alert">
                                                        <strong>Fehler: </strong> <?=$data['error']?>
                                                    </div>
                                <?php
                                }else{
                                ?>
                                <h1 style="margin-top: 0px; margin-bottom: 25px">Vielen Dank für Ihre Bewerbung</h1>

                                <p>Vielen Dank für die Übermittlung Ihrer Bewerbung als <?=$data['vac_data']['jobtitle']?>.</p>
                                <?php } ?>
                            </div>

                 					
                </div>
            </div>


        </div>
    </div>
</div>
<?php include 'footer.php'; ?>