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
<div class="page-content">    
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="page-content box-wrapper">
                    <div class="row">
                        <div class="col-sm-12">
                            <?php if(!empty($data['error'])) {
                                ?>
                            <div class="alert alert-danger" role="alert">
                                <strong>Fehler: </strong> <?=$data['error']?>
                            </div>
                            <?php }else{ ?>
                            <h1 style="margin-top: 0px; margin-bottom: 25px">Vielen Dank für Ihre Bewerbung</h1>

                            <div class="alert alert-success"><strong>Vielen Dank für die Übermittlung Ihrer Bewerbung als <?=$data['vac_data']['jobtitle']?>.</strong></div>
                            <?php } ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php include 'footer.php'; ?>