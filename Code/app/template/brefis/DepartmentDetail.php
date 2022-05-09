<?php include 'header.php';
$data['title'] = $data['department']['name']. ' - Filiale ' . $data['department']['city'];
$classContact = 'active';
$breadcrumb[] = array('title' => 'Kontakt',
                      'url' => '/Contact',
                    'active' => false);
$breadcrumb[] = array('title' => $data['title'],
                      'url' => '/Department/Detail/'.$data['department']['id'],
                    'active' => true);
$departmentName = strtolower(str_replace('ü','ue',$data['department']['city']));
include 'navigation.php';
?>

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
                    <div class=" white-container">
                        <div class="flexslider contact-gallery-slider">
                            <ul class="slides">
                                <li>
                                    <img src="img/transparent.png" alt="">
                                    <div data-image="/tmpl_ahapersonal/img/<?=$departmentName?>/01.png"></div>    
                                </li>

                                <li>
                                    <img src="img/transparent.png" alt="">
                                    <div data-image="/tmpl_ahapersonal/img/<?=$departmentName?>/02.png"></div>
                                </li>

                                <li>
                                    <img src="img/transparent.png" alt="">
                                    <div data-image="/tmpl_ahapersonal/img/<?=$departmentName?>/03.png"></div>
                                </li>
                                <li>
                                    <img src="img/transparent.png" alt="">
                                    <div data-image="/tmpl_ahapersonal/img/<?=$departmentName?>/04.png"></div>
                                </li>
                                <li>
                                    <img src="img/transparent.png" alt="">
                                    <div data-image="/tmpl_ahapersonal/img/<?=$departmentName?>/05.png"></div>
                                </li>
                                <li>
                                    <img src="img/transparent.png" alt="">
                                    <div data-image="/tmpl_ahapersonal/img/<?=$departmentName?>/06.png"></div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>  
        </div>
    </div>
<div class="page-content pt0">
    <div class="container">
        <div class="row">
            <div class="col-sm-8">
                <div class="contact-input-form box-wrapper white-container">
                    <div class="contact">
                        <h3 class="p0 mt10">Kontaktformular</h3>
                        <div class="row">
                            <div class="col-md-4">
                                <h4>Adresse</h4>
                                <p><strong><?=$data['department']['name']?></strong> <br/>
                                <?=$data['department']['street']?> <br/>
                                <?=$data['department']['zip']?> <?=$data['department']['city']?></p>
                            </div>
                            <div class="col-md-4">
                                <h4>Telefon & E-Mail</h4>
                                <p>Tel.: <a href="callto:<?=$data['department']['phone']?>"><?=$data['department']['phone']?></a><br/>                                              
                            Fax: <?=$data['department']['fax']?><br/>
                            <a href="<?=$data['department']['mail']?>"><?=$data['department']['mail']?></a></p>
                            </div>
                            <div class="col-md-4">
                                <div class="custom-menu-widget" style="padding: 0px">
                                    <h5 class="widget-title ">Öffnungszeiten</h5>
                                    <div class="custom-widget">
                                        <p><strong>Montag-Freitag</strong><br/>08:00 - 12:00 Uhr<br/>13:30 - 18:00 Uhr<br/>
                                            <strong>Samstag:</strong>Geschlossen<br>
                                            <strong>Sonntag:</strong>Geschlossen</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="contact-form">
                            <form id="contactForm" action="/Department/Detail/<?=$data['department']['customer_department_id']?>" class="form-validate" method="post">
                                <input type="hidden" name="task" value="sendcontact">
                                <fieldset>
                                    <?php if(!empty($data['error'])){ ?>  
                                    <div class="alert alert-danger" id="contactError">
                                        <strong>Error!</strong> <?=$data['error']?>
                                    </div>                 
                                    <?php } ?>  

                                    <?php if(!empty($data['success'])){?>                                                     
                                    <div class="alert alert-success" id="contactSuccess">
                                        <?=$data['success']?>
                                        <p>Wir werden uns so schnell wie möglich mit Ihnen in Verbindung setzen und Ihre Anfrage beantworten.</p>
                                    </div>                
                                    <?php }else{ ?>  
                                    <p class="required-field">Alle Felder werden benötigt.</p>

                                    <div class="control-group col-md-12">
                                        <div class="row">
                                            <div class="control-contact col-md-6 col-xs-12">
                                                <div class="contact-label">
                                                    <label class="required">
                                                        Name<span class="star">&nbsp;*</span>
                                                    </label>

                                                    <input id="name" name="name" value="<?=$data['input']['name']?>" required="" size="30" type="text" value="" />
                                                </div>
                                            </div>

                                            <div class="control-contact col-md-6 col-xs-12">
                                                <div class="contact-label">
                                                    <label class="required" >
                                                        E-Mail<span class="star">&nbsp;*</span>
                                                    </label>

                                                    <input id="email" name="email" value="<?=$data['input']['email']?>" size="30" required="Email" type="email" />
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="control-group">
                                        <div class="contact-label">
                                            <label class="required">
                                                Betreff<span class="star">&nbsp;*</span>
                                            </label> 

                                            <input id="subject" size="60" name="subject" value="<?=$data['input']['subject']?>" required="Subject" type="text">
                                        </div>
                                    </div>

                                    <div class="control-group">
                                        <div class="contact-message">
                                            <label class="required">
                                                Nachricht<span class="star">&nbsp;*</span>
                                            </label> 

                                            <textarea id="message" cols="50" name="message" required="" rows="10"><?=$data['input']['message']?></textarea>
                                        </div>
                                    </div>

                                    <div class="contact-form-submit">
                                        <button class="btn btn-default validate subbtn" type="submit">E-Mail senden</button>
                                    </div>
                                    <?php } ?>  
                                </fieldset>
                            </form>
                        </div>
                    </div>
                </div>
            </div>				

            <div class="col-sm-4">
                <div class="row">
                <div class="white-container">
                    <div class="single-page-item">       
                        <h3 class="mt30">Unsere Stellenangebote</h3>
                            <ul class="filter-list">
                                <?php foreach($data['vacancy'] as $job) { ?>
                                <li><a href="/Vacancyboard/Detail/<?=$job->vac_info_id;?>"><strong><?=$job->jobtitle;?></strong> in <?=$job->city;?></a></li>
                               <?php } ?>
                            </ul>
                        <a href="/Vacancyboard" class="btn btn-default subbtn">Alle offenen Stellen anzeigen</a>                            
                    </div>
                </div>
                </div>
                <div class="row">
                    <div class="white-container pt30">
                        <div class="widget-content">
                            <h3 class="mt30">Folge uns</h3>
                            <ul class="social-icons pt10 mb10 mt10">
                                <li><a href="<?=$data['department']['fb_url']?>" class="btn btn-gray fa fa-facebook" title="Facebook" target="_blank"></a></li>
                                <li><a href="#" class="btn btn-gray fa fa-google-plus" title="Google plus" target="_blank"></a></li>
                                <li><a href="#" class="btn btn-gray fa fa-yelp" title="Yelp" target="_blank"></a></li>
                            </ul>
                            <br/>
                            <br/>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
                    
<?php include 'footer.php'; ?>