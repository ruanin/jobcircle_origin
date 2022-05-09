<?php
include 'header.php';
$classContact = 'active';
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
.company-card-image {
    padding: 0px;
    height:350px;
}
#map_canvas {
    width: 100%;
    height: 350px;
    padding:0;
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
        border-radius: 10px;
        background-color: Black;
        filter: alpha(opacity=60);
        opacity: 0.6;
        -moz-opacity: 0.8;
    }
    .center img
    {
        height: 128px;
        width: 128px;
    }
</style>
<div class="document-title">
    <div class="container">
        <h1>Kontakt</h1>
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
        <div class="col-lg-5 col-md-5 col-sm-12 col-xs-12">
            <div class="company-card">
                <div class="company-card-image">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2701.750391390874!2d8.509069915904758!3d47.37779001174875!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x47900a24c31bd891%3A0x8460dff7a72ba037!2sbrefis+personal+ag!5e0!3m2!1sde!2sch!4v1478535848542" height="350" frameborder="0" style="border:0;width:100%;padding-left:0px !important;padding-right:0px !important;" allowfullscreen></iframe>
                </div>
                <div class="company-card-data">
                    <dl>
                        <dt>Adresse</dt>
                        <dd><strong>brefis personal ag</strong><br/>
                            Badenerstrasse 333<br/>
                            8003 Zürich</dd>
                        <dt>Telefon</dt>
                        <dd><a href="callto:+41 44 200 79 79">+41 44 200 79 79</a></dd>
                        <dt>Fax</dt>
                        <dd>+41 44 200 79 70</dd>
                        <dt>E-Mail</dt>
                        <dd><a href="mailto:zuerich@brefis.ch">zuerich@brefis.ch</a></dd>
                    </dl>
                </div>
            </div>
        </div>
        <div class="col-lg-7 col-md-7 col-sm-12 col-xs-12">
            <div class="contact">
                <h3 class="p0" style="margin-top: 0px;">Kontaktformular</h3>
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
                                <div class="row">
                                    <div class="form-group col-md-6 col-xs-12">
                                        <div class="contact-label">
                                            <label class="required">
                                                Name<span class="star">&nbsp;*</span>
                                            </label>

                                            <input id="name" name="name" class="form-control" value="<?=$data['input']['name']?>" required="" size="30" type="text" value="" />
                                        </div>
                                    </div>

                                    <div class="form-group col-md-6 col-xs-12">
                                        <div class="contact-label">
                                            <label class="required" >
                                                E-Mail<span class="star">&nbsp;*</span>
                                            </label>

                                            <input id="email" name="email" class="form-control" value="<?=$data['input']['email']?>" size="30" required="" type="email" />
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="required">
                                        Betreff<span class="star">&nbsp;*</span>
                                    </label>

                                    <input id="subject" size="60" name="subject" class="form-control" value="<?=$data['input']['subject']?>" required="" type="text">
                                </div>

                                <div class="form-group">
                                    <label class="required">
                                        Nachricht<span class="star">&nbsp;*</span>
                                    </label>

                                    <textarea id="message" cols="50" name="message" class="form-control" required="" rows="10"><?=$data['input']['message']?></textarea>
                                </div>

                            <div class="contact-form-submit">
                                <button class="btn btn-secondary" type="submit">E-Mail senden</button>
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

<?php include 'footer.php'; ?>
