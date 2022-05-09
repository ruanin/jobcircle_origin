<?php include 'header.php';
$data['title'] = $data['department']['name'] . '- Filiale ' . $data['department']['city'];
$classContact = 'active';
$breadcrumb[] = array('title' => 'Kontakt',
    'url' => '/Contact',
    'active' => false);
$breadcrumb[] = array('title' => $data['title'],
    'url' => '/Department/Detail/' . $data['department']['id'],
    'active' => true);

include 'navigation.php';
?>
    <script>
        grecaptcha.ready(function () {
            grecaptcha.execute('<?=RECAPTCHA_SITE_KEY?>', { action: 'contact' }).then(function (token) {
                var recaptchaResponse = document.getElementById('recaptchaResponse');
                recaptchaResponse.value = token;
            });
        });
    </script>
    <style type="text/css">
        .social-icon i.fa {
            display: inline-block;
            cursor: pointer;
            margin: 0px;
            text-align: center;
            position: relative;
            z-index: 1;
            color: #000000;
            overflow: hidden;
            border-radius: 1px;
            -webkit-transition: all 0.5s;
            -moz-transition: all 0.5s;
            transition: all 0.5s;
            -webkit-transform: translateZ(0);
        }

        .social-icon i.fa::before {
            border-radius: 2px;
            speak: none;
            display: block;
            -webkit-font-smoothing: antialiased;
        }

        .social-icon i.fa::after {
            pointer-events: none;
            position: absolute;
            width: 100%;
            height: 100%;
            content: '';
            display: none;
            box-sizing: content-box;
        }

        .social-icon i.fa:hover {
            background: #F60A0D;
            color: #ffffff !important;
        }

        .social-icon i.fa:hover::before {
            -webkit-animation: toRightFromLeft 0.3s forwards;
            -moz-animation: toRightFromLeft 0.3s forwards;
            animation: toRightFromLeft 0.3s forwards;
        }
    </style>
    <div class="pl-cmmn-cnt-section">

			<div class="pl-brdcrumb">
					<a href="<?= WEB_URL ?>/Pages/kontakt">Zurück zur Auswahl</a>
				</div>
		<!-- Kontakt -->
		<div class="pl-kontakt">
			<div class="container">
				<div class="col-lg-12">
					<div class="row">					
						<h1 class="bs-title">Filiale <?= $data['department']['city'] ?></h1>
										
					</div>
				</div>
			</div>
			
			<div class="pl-kont-sect">
				<div class="container">
					<div class="pl-pop">						
						<div class="pl-mit-details">
							<h1 class="modal-title pl-cmmn-heading"><?= $data['department']['city'] ?></h1>	
							<h3 class="pl-cmmn-subheading"><?= $data['department']['name'] ?></h3>
							<div class="pl-cnt-pop-rht">
								<span class="pl-mit-phone float-right"><i class="fa fa-phone" aria-hidden="true"></i> <?= $data['department']['phone'] ?></span>
								<div class="pl-scl-media-icons">
									<ul>
										<li><a href="<?= $data['department']['fb_url'] ?>"><i class="fa fa-facebook" aria-hidden="true"></i></a></li> 
										<li><a href="#"><i class="fa fa-envelope" aria-hidden="true"></i></a></li>
										<li><a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
										<li><a href="#"><i class="fa fa-linkedin" aria-hidden="true"></i></a></li>
									</ul>
								</div>
							</div>
						</div>
						<div class="pl-mit-address">
							<p><?= $data['department']['street'] ?> <br><?= $data['department']['zip'] ?> <?= $data['department']['city'] ?><br> <a href="mailto:<?= $data['department']['mail'] ?>" class="pl-link"><?= $data['department']['mail'] ?></a></p>
						</div>
					</div>
				</div>				
			</div>	
			
			<div class="pl-cnt-formular">
				<div class="container">
					<h1 class="bs-title">KONTAKTFORMULAR</h1>
                                        <?php if(!empty($data['error'])) { ?>
                                            <div class="alert alert-danger pl-contact-message-warning" id="contactError">
                                                <strong>Error!</strong> <?= $data['error'] ?>
                                            </div>
                                        <?php } ?>
                                        <?php if (!empty($data['success'])) { ?>
                                        <div class="alert alert-success pl-contact-message-success" id="contactSuccess">
                                            <p>Vielen Dank für Ihre Nachricht! <br />Wir melden uns so schnell wie möglich bei Ihnen.</p>
                                        </div>
                                        <?php }else{ ?>
					<form id="knt-form" class="pl-form pl-knt-form" action="/Department/Detail/<?= $data['department']['customer_department_id'] ?>" method="post">
                                            <input type="hidden" name="task" value="sendcontact">
                                            <div class="form-row">
                                                    <div class="form-group col-lg-6">
                                                            <label for="name" class="text-info">Name*</label><br>
                                                            <input type="text" name="name" id="name" value="<?= $data['input']['name'] ?>" class="form-control" placeholder="Name">
                                                    </div>
                                                    <div class="form-group col-lg-6">
                                                            <label for="email" class="text-info">E-Mail-Adresse*</label><br>
                                                            <input type="text" name="email" id="email" value="<?= $data['input']['email'] ?>" class="form-control" placeholder="E-Mail-Adresse">
                                                    </div>
                                            </div>
                                            <div class="form-row">
                                                    <div class="form-group col-lg-12">
                                                            <label for="betreff" class="text-info">Betreff*</label>
                                                            <input type="text" name="subject" id="subject" value="<?= $data['input']['subject'] ?>" class="form-control" placeholder="Betreff">
                                                    </div>
                                            </div>
                                            <div class="form-row">
                                                    <div class="form-group col-lg-12">
                                                            <label for="nachricht" class="text-info">Nachricht*</label>
                                                            <textarea name="message" id="message" value="<?= $data['input']['name'] ?>" class="form-control" placeholder="Nachricht"><?= $data['input']['message'] ?></textarea>
                                                    </div>
                                            </div>
                                            <div class="form-row">
                                                    <input type="submit" name="submit" class="btn pl-btn-cmmn pl-knt-submit" id="pl-knt-submit" value="E-Mail senden">                      
                                            </div>
                                            <input type="hidden" name="recaptcha_response" id="recaptchaResponse" />
					</form>
                                        <?php } ?>
				</div>
			</div>

		</div>
		<!-- Kontakt Ends -->
<?php include 'footer.php'; ?>