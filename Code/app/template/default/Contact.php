<?php
include 'header.php';
$classContact = 'active';
$breadcrumb[] = array('title' => 'Kontakt',
    'url' => '',
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
<style>
#map_canvas {
    width: 100%;
    height: 350px;
}
.modal
    {
        position: fixed;
        z-index: 999;
        height: 100%;
        width: 100%;
        top: 0;
        left: 0;
        background-color: Black;
        filter: alpha(opacity=60);
        opacity: 0.6;
        -moz-opacity: 0.8;
    }
    .center
    {
        z-index: 1000;
        margin: 300px auto;
        padding: 10px;
        width: 130px;
        background-color: White;
        border-radius: 10px;
        filter: alpha(opacity=100);
        opacity: 1;
        -moz-opacity: 1;
    }
    .center img
    {
        height: 128px;
        width: 128px;
    }
    tab { padding-left: 4em; }
</style>

        <div class="header-page-title">
			<div class="container">
				<h1>Kontakt</h1>
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
                <div class=" col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="box-wrapper white-container">
                        <div id="map_canvas"></div>
                    </div>
                </div>				                         
            </div>
        </div>
    </div>
<div class="page-content pt10">
<div class="container">
    <div class="row">
        <div class=" col-lg-9 col-md-9 col-sm-12 col-xs-12"> 
            <div class="box-wrapper white-container">
                <div class="single-page-item typography">
                    <div class="contact">
                        <h3 class="p0 mt10">Kontaktformular</h3>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="custom-menu-widget" style="padding: 0px">
                                    <h5 class="widget-title ">Hauptsitz</h5>
                                    <div class="custom-widget">
                                        <p><strong>aha personal ag</strong><br>
                                            Dammstrasse 19<br>
                                            6301 Zug<br>
                                    </div> 
                                </div>
                            </div>
                            <div class="col-md-8">
                                <div class="custom-menu-widget" style="padding: 0px">
                                    <h5 class="widget-title ">Öffnungszeiten</h5>
                                    <div class="custom-widget">
                                        <table class="table borderless" colspan="0" colspacing="0" border="0" style="padding-left:0px !important; margin:0px !important; border:0px !important;">
                                            <tr>
                                                <td><strong>Montag-Freitag</strong>
                                                </td><td>08:00 - 12:00 Uhr | 13:30 - 18:00 Uhr</td>
                                            </tr>
                                            <tr>
                                                <td><strong>Samstag</strong>
                                                </td><td>Geschlossen</td>
                                            </tr>
                                            <tr>
                                                <td><strong>Sonntag</strong>
                                                </td><td>Geschlossen</td>
                                            </tr>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="contact-form">
                            <form id="contactForm" action="/Contact/Send" class="form-validate" method="post" onsubmit="$('#showWaiting').show();">
                                <input type="hidden" name="task" value="sendcontact">
                                <fieldset>   
                            <?php if(!empty($data['error'])){ ?>  
                                    <div class="alert alert-danger" id="contactError">
                                        <strong>Error!</strong> <?=$data['error']?>
                                    </div>                 
                            <?php } ?>  
                            <?php if(!empty($data['success'])){ ?>  
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

                                                    <input id="email" name="email" value="<?=$data['input']['email']?>" size="30" required="" type="email" />
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="control-group">
                                        <div class="contact-label">
                                            <label class="required">
                                                Betreff<span class="star">&nbsp;*</span>
                                            </label> 

                                            <input id="subject" size="60" name="subject" value="<?=$data['input']['subject']?>" required="" type="text">
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
                                <input type="hidden" name="recaptcha_response" id="recaptchaResponse" />
                            </form>
                        </div>
                    </div>
                </div>	
            </div>
        </div>	
        
        <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
            <div class="white-container">
                <h3 class="p0 mt10">Unsere Filialen</h3>
            <?php foreach ($data['departmentlist'] as $department) { ?>            
                <h4><?=$department['city']?></h4>
                <?=$department['street']?><br><?=$department['zip']?> <?=$department['city']?><br>
                T: <?=$department['phone']?><br>
                F: <?=$department['fax']?><br/>
                <a href="/Department/Detail/<?=$department['customer_department_id']?>" class="btn btn-default subbtn">MEHR DETAILS</a>     
            <?php } ?>
            </div>     
        </div>
    </div>
</div>
</div>
<?php include 'footer.php'; ?>