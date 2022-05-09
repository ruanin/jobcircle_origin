<?php
include 'header.php';
$classContact = 'active';
$breadcrumb[] = array('title' => 'Kontakt',
    'url' => '/Contact',
    'active' => true);
$data['title'] = 'Kontakt';
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
            height: 500px;
        }

        ul.static-plan.text-center.featured {
            width: 100%;
            z-index: 9999;
            position: relative;
            border: 0px none;
            margin-top: 0px;
            box-shadow: 0px 0px 0px 1px #AAA;
            margin-left: 0%;
        }

        ul.static-plan.text-center.featured li.plan-price {
            background: #F60A0D;
            color: #fff;
            margin-top: 10px;
            padding: 0;
            height: 45px;
        }

        ul.static-plan.text-center li.plan-price h2.plane-name {
            font-size: 23px;
            margin-top: 0px;
            padding-top: 5px;
            padding-bottom: 5px;
            margin-bottom: 0px;
        }

        ul.static-plan.text-center.featured a.btn {
            padding: 0px;
        }

        .modal {
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

        .center {
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

        .center img {
            height: 128px;
            width: 128px;
        }
    </style>
    <div class="container mt-15">
        <div class="row">
            <div class=" col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="mt-15 box-wrapper">
                    <div class="branches-slider">
                        <h2 class="lead-title"><span>Unsere Filialenstandorte</span></h2>
                        <div id="branches" class="branches">
                            <?php foreach ($data['departmentlist'] as $department) { ?>
                                <div class="branche-item">
                                    <ul class="static-plan text-center featured">
                                        <li class="plan-price">
                                            <h2 class="plane-name"><?= $department['city'] ?></h2>
                                        </li>
                                        <li class="row0 yes"><?= $department['street'] ?>
                                            <br><?= $department['zip'] ?> <?= $department['city'] ?>
                                            <br>T: <?= $department['phone'] ?><br>F: <?= $department['fax'] ?><br/><a
                                                    href="/Department/Detail/<?= $department['customer_department_id'] ?>"
                                                    class="btn">MEHR DETAILS</a></li>
                                    </ul>
                                </div>
                            <?php } ?>
                        </div>    <!-- //branches -->
                        <div class="customNavigation branches-navigation">
                            <a class="next"><i class="fa fa-angle-right"></i></a>
                            <a class="prev"><i class="fa fa-angle-left"></i></a>
                        </div> <!-- //branches-navigation -->
                    </div> <!-- //branches-slider -->
                </div>
            </div>
        </div>
    </div>

    <div class="container mt-15">
        <div class="row">
            <div class=" col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="box-wrapper">
                    <div id="map_canvas"></div>
                </div>
            </div>
        </div>
    </div>

    <div class="container mt-15">
        <div class="box-wrapper page-content">
            <div class="row">
                <div class="col-lg-9 col-md-9 col-sm-12 col-xs-12">
                    <div class="thumb">
                        <div class="contact">
                            <h2 class="widget-title">Kontaktformular</h2>
                            <div class="contact-form">
                                <form id="contactForm" action="/Contact/Send" class="form-validate" method="post"
                                      onsubmit="$('#showWaiting').show();">
                                    <input type="hidden" name="task" value="sendcontact">
                                    <fieldset>
                                        <?php if (!empty($data['error'])) {
                                            ?>
                                            <div class="alert alert-danger" id="contactError">
                                                <strong>Error!</strong> <?= $data['error'] ?>
                                            </div>
                                            <?php
                                        }
                                        ?>

                                        <?php if (!empty($data['success'])) { ?>

                                            <div class="alert alert-success" id="contactSuccess">
                                                <?= $data['success'] ?>
                                                <p>Wir werden uns so schnell wie möglich mit Ihnen in Verbindung setzen
                                                    und Ihre Anfrage beantworten.</p>
                                            </div>
                                            <?php
                                        } else {
                                            ?>


                                            <p class="required-field">Alle Felder werden benötigt.</p>
                                            <div class="control-group col-md-12">
                                                <div class="row">
                                                    <div class="control-contact col-md-6 col-xs-12">
                                                        <div class="contact-label">
                                                            <label class="required">
                                                                Name<span class="star">&nbsp;*</span>
                                                            </label>

                                                            <input id="name" name="name"
                                                                   value="<?= $data['input']['name'] ?>" required=""
                                                                   size="30" type="text" value=""/>
                                                        </div>
                                                    </div>

                                                    <div class="control-contact col-md-6 col-xs-12">
                                                        <div class="contact-label">
                                                            <label class="required">
                                                                E-Mail<span class="star">&nbsp;*</span>
                                                            </label>

                                                            <input id="email" name="email"
                                                                   value="<?= $data['input']['email'] ?>" size="30"
                                                                   required="" type="email"/>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="control-group">
                                                <div class="contact-label">
                                                    <label class="required">
                                                        Betreff<span class="star">&nbsp;*</span>
                                                    </label>

                                                    <input id="subject" size="60" name="subject"
                                                           value="<?= $data['input']['subject'] ?>" required=""
                                                           type="text">
                                                </div>
                                            </div>

                                            <div class="control-group">
                                                <div class="contact-message">
                                                    <label class="required">
                                                        Nachricht<span class="star">&nbsp;*</span>
                                                    </label>

                                                    <textarea id="message" cols="50" name="message" required=""
                                                              rows="10"><?= $data['input']['message'] ?></textarea>
                                                </div>
                                            </div>

                                            <div class="contact-form-submit">
                                                <button class="btn btn-primary validate subbtn" type="submit">E-Mail
                                                    senden
                                                </button>
                                            </div>
                                        <?php } ?>
                                    </fieldset>
                                    <input type="hidden" name="recaptcha_response" id="recaptchaResponse" /> 
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
                    <div class="thumb">
                        <div class="custom-menu-widget" style="padding: 0px">
                            <h2 class="widget-title ">Öffnungszeiten</h2>
                            <div class="custom-widget">
                                <p><strong>Montag-Freitag</strong><br>
                                    08:00 - 12:00 Uhr<br>
                                    13:30 - 18:00 Uhr<br>
                                    <strong>Samstag:</strong> Geschlossen<br>
                                    <strong>Sonntag:</strong> Geschlossen</p>
                            </div>
                        </div>
                        <hr></hr>
                        <div class="custom-menu-widget" style="padding: 0px">
                            <h2 class="widget-title "> Bewerbung per Post </h2>
                            <div class="custom-widget">
                                <p><strong>planova human capital ag</strong><br/>
                                    HR-Desk<br/>
                                    Josefstrasse 218<br/>
                                    8005 Zürich</p>
                                <p>
                                    Warum per Post? Bewerben Sie sich hier erfolgsversprechender und
                                    umweltfreundlicher:</p>
                                <div class="contact-form-submit">
                                    <form method="POST" action="/Vacancyboard">
                                        <button class="btn btn-submit" type="submit">Jetzt Bewerben</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php include 'footer.php'; ?>