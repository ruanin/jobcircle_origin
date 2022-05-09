<?php
include 'header.php';
$classContact = 'active'; // •
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
<div class="pl-cmmn-cnt-section">
    <!-- Kontakt -->
    <div class="pl-kontakt">
        <div class="container">
            <div class="col-lg-12">
                <div class="row">					
                    <h1 class="bs-title">KONTAKT</h1>
                    <h2 class="pl-subinfo-bold">DIREKTKONTAKT ZU UNSEREN FILIALIEN</h2>						
                </div>
            </div>
        </div>

        <div class="pl-kont-sect">
            <div class="container">
                <div class="pl-mit-division">
                    <div class="pl-mit-cnt-info">
                        <div class="pl-mit-details">
                            <span class="pl-mit-semibold"><a href="<?= WEB_URL ?>/Department/Detail/71">AARAU</a></span>
                            <span class="pl-mit-phone float-right"><i class="fa fa-phone" aria-hidden="true"></i> +41 62 552 20 20</span>
                        </div>
                        <div class="pl-mit-address">
                            <p>Igelweid 18 <br />5000 Aarau<br /> <a href="mailto:aarau@planova.ch" class="pl-link">aarau@planova.ch</a></p>
                        </div>
                    </div>
                    <div class="pl-mit-cnt-info">
                        <div class="pl-mit-details">
                            <span class="pl-mit-semibold"><a href="<?= WEB_URL ?>/Department/Detail/66">LUZERN</a></span>
                            <span class="pl-mit-phone float-right"><i class="fa fa-phone" aria-hidden="true"></i> +41 41 227 30 50</span>
                        </div>
                        <div class="pl-mit-address">
                            <p>Hallwilerweg 5 <br />6003 Luzern<br /> <a href="mailto:luzern@planova.ch" class="pl-link">luzern@planova.ch</a></p>
                        </div>
                    </div>
                    <div class="pl-mit-cnt-info">
                        <div class="pl-mit-details">
                            <span class="pl-mit-semibold"><a href="<?= WEB_URL ?>/Department/Detail/68">BADEN</a></span>
                            <span class="pl-mit-phone float-right"><i class="fa fa-phone" aria-hidden="true"></i> +41 56 204 00 10</span>
                        </div>
                        <div class="pl-mit-address">
                            <p>Langhaus 4 <br />5400 Baden<br /> <a href="mailto:baden@planova.ch" class="pl-link">baden@planova.ch</a></p>
                        </div>
                    </div>
                    <div class="pl-mit-cnt-info">
                        <div class="pl-mit-details">
                            <span class="pl-mit-semibold"><a href="<?= WEB_URL ?>/Department/Detail/69">WINTERTHUR</a></span>
                            <span class="pl-mit-phone float-right"><i class="fa fa-phone" aria-hidden="true"></i> +41 52 555 05 55</span>
                        </div>
                        <div class="pl-mit-address">
                            <p>Bahnhofplatz 17 <br />8400 Winterthur<br /> <a href="mailto:winterthur@planova.ch" class="pl-link">winterthur@planova.ch</a></p>
                        </div>
                    </div>
                    <div class="pl-mit-cnt-info">
                        <div class="pl-mit-details">
                            <span class="pl-mit-semibold"><a href="<?= WEB_URL ?>/Department/Detail/74">BASEL</a></span>
                            <span class="pl-mit-phone float-right"><i class="fa fa-phone" aria-hidden="true"></i> +41 61 551 17 17</span>
                        </div>
                        <div class="pl-mit-address">
                            <p>Gerbergasse 14 <br />4001 Basel<br /> <a href="mailto:basel@planova.ch" class="pl-link">basel@planova.ch</a></p>
                        </div>
                    </div>
                    <div class="pl-mit-cnt-info">
                        <div class="pl-mit-details">
                            <span class="pl-mit-semibold"><a href="<?= WEB_URL ?>/Department/Detail/64">ZUG</a></span>
                            <span class="pl-mit-phone float-right"><i class="fa fa-phone" aria-hidden="true"></i> +41 41 726 32 20</span>
                        </div>
                        <div class="pl-mit-address">
                            <p>Alpenstrasse 11 <br />6300 Zug<br /> <a href="mailto:zug@planova.ch" class="pl-link">zug@planova.ch</a></p>
                        </div>
                    </div>
                    <div class="pl-mit-cnt-info">
                        <div class="pl-mit-details">
                            <span class="pl-mit-semibold"><a href="<?= WEB_URL ?>/Department/Detail/67">BERN</a></span>
                            <span class="pl-mit-phone float-right"><i class="fa fa-phone" aria-hidden="true"></i> +41 31 561 61 61</span>
                        </div>
                        <div class="pl-mit-address">
                            <p>Marktgasse 32 <br />3011 Bern<br /> <a href="mailto:bern@planova.ch" class="pl-link">bern@planova.ch</a></p>
                        </div>
                    </div>
                    <div class="pl-mit-cnt-info">
                        <div class="pl-mit-details">
                            <span class="pl-mit-semibold"><a href="<?= WEB_URL ?>/Department/Detail/63">ZÜRICH</a></span>
                            <span class="pl-mit-phone float-right"><i class="fa fa-phone" aria-hidden="true"></i> +41 44 447 22 22</span>
                        </div>
                        <div class="pl-mit-address">
                            <p>Heinrichstrasse 223 <br />8005 Zürich<br /> <a href="mailto:zuerich@planova.ch" class="pl-link">zuerich@planova.ch</a></p>
                        </div>
                    </div>
                </div>
            </div>				
        </div>
        
        <div class="pl-cnt-formular">
            <div class="container">
                <h1 class="bs-title">KONTAKTFORMULAR</h1>
                <?php if(!empty($data['error'])) {
                    ?>
                    <div class="alert alert-danger pl-contact-message-warning" id="contactError">
                        <strong>Error!</strong> <?= $data['error'] ?>
                    </div>
                    <?php
                }
                ?>

                <?php if (!empty($data['success'])) { ?>
                    <div class="alert alert-success pl-contact-message-success" id="contactSuccess">
                        <p>Vielen Dank für Ihre Nachricht! <br />Wir melden uns so schnell wie möglich bei Ihnen.</p>
                    </div>
                    <?php
                } else {
                    ?>
                <form id="knt-form" class="pl-form pl-knt-form" action="<?= WEB_URL ?>/Pages/kontakt" method="post">
                    <input type="hidden" name="task" value="sendcontact">
                    <div class="form-row">
                        <div class="form-group col-lg-6">
                            <label for="name" class="text-info">Name*</label><br>
                            <input type="text" name="name" id="name" class="form-control" placeholder="Name" value="<?= $data['input']['name'] ?>" required />
                        </div>
                        <div class="form-group col-lg-6">
                            <label for="email" class="text-info">E-Mail Adresse*</label><br>
                            <input type="text" name="email" id="email" class="form-control" placeholder="E-Mail-Adresse" value="<?= $data['input']['email'] ?>" required />
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-lg-12">
                            <label for="subject" class="text-info">Betreff*</label>
                            <input type="text" name="subject" id="subject" class="form-control" placeholder="Betreff" value="<?= $data['input']['subject'] ?>" required />
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-lg-12">
                            <label for="message" class="text-info">Nachricht*</label>
                            <textarea name="message" id="message" class="form-control" placeholder="Nachricht" required><?= $data['input']['message'] ?></textarea>
                        </div>
                    </div>
                    <div class="form-row">
                        <button type="submit" name="submit" class="btn pl-btn-cmmn pl-knt-submit" id="pl-knt-submit">E-Mail senden</button>                     
                    </div>
                    <input type="hidden" name="recaptcha_response" id="recaptchaResponse" /> 
                </form>
                <?php } ?>
            </div>
        </div>


    </div>
    <!-- Kontakt Ends -->

<?php include 'footer.php'; ?>