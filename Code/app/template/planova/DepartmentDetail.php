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
    <div class="container mt-15">
        <div class="row is-table-row">

            <div class="col-md-4">
                <div class="left-about-sidebar box-wrapper">
                    <h1 class="sidebar-title"><span>Kontaktdetails</span></h1>
                    <div>
                        <p><strong><?= $data['department']['name'] ?></strong> <br/>
                            <?= $data['department']['street'] ?> <br/>
                            <?= $data['department']['zip'] ?> <?= $data['department']['city'] ?></p>
                        <p>Tel.:
                            <a href="callto:<?= $data['department']['phone'] ?>"><?= $data['department']['phone'] ?></a><br/>
                            Fax: <?= $data['department']['fax'] ?><br/>
                            <a href="mailto:<?= $data['department']['mail'] ?>"><?= $data['department']['mail'] ?></a></p>
                        <div class="social-icon pull-left">
                            <ul>
                                <li style="padding:0px;border-bottom:0px !important;"><a
                                            href="<?= $data['department']['fb_url'] ?>" title="Facebook"
                                            target="_blank"><i
                                                class="fa fa-facebook" style="color:black;"></i></a></li>
                                <li style="padding:0px;border-bottom:0px !important;"><a href="#"
                                                                                         title="Google plus"
                                                                                         target="_blank"><span><i
                                                    class="fa fa-google-plus" style="color:black;"></i></a></li>
                                <li style="padding:0px;border-bottom:0px !important;"><a href="#" title="Yelp"
                                                                                         target="_blank"><i
                                                class="fa fa-yelp" style="color:black;"></i></a></li>
                            </ul>
                        </div> <!-- //social-icon -->
                        <br/>
                        <br/>
                        <p style="padding-top:15px;">
                        <h4>Branchen</h4>
                        <ul class="list-style" style="padding-left:20px;">
                            <li><i style="color:#f60a0d;" class="fa fa-angle-right"></i>Baugewerbe/Handwerk</li>
                            <li><i style="color:#f60a0d;" class="fa fa-angle-right"></i>Energie/Entsorgung/Versorgung
                            </li>
                            <li><i style="color:#f60a0d;" class="fa fa-angle-right"></i>Industrie/Produktion/Technik
                            </li>
                            <li><i style="color:#f60a0d;" class="fa fa-angle-right"></i>Landwirtschaft/Natur/Umwelt
                            </li>
                            <li><i style="color:#f60a0d;" class="fa fa-angle-right"></i>Stahl-/Metallbauindustrie
                            </li>
                        </ul>
                        </p>
                        <div class="post">
                            <iframe width="340" height="300"
                                    src="https://maps.google.de/maps?hl=de&q=<?= $data['department']['street'] ?>,<?= $data['department']['zip'] ?> <?= $data['department']['city'] ?>+(<?= $data['department']['name'] ?>)&ie=UTF8&t=&z=17&iwloc=B&output=embed"
                                    width="600" height="450" frameborder="0" style="border:0;width:100%;"
                                    allowfullscreen></iframe>
                        </div>
                    </div>

                </div>
            </div>


            <div class="col-md-8">
                <div class="left-about-sidebar box-wrapper" style="padding-bottom:25px;">
                <span>Als einer der führenden Personaldienstleister haben wir uns bei <?= $data['department']['name'] ?>
                    darauf spezialisiert, Kandidaten die perfekt zu ihnen passende Arbeitsstelle zu vermitteln.</span>
                    <div class="contact-form">
                        <div class="row" style="margin-top:25px;">
                            <div class="col-md-12">
                                <div style="margin-top:25px;">
                                    <h4>Jobs in dieser Filiale</h4>
                                    <div class="table-responsive">
                                        <table class="table table-bordered table-hover table-striped" style="width:100%">
                                            <thead>
                                            <tr>
                                                <th>Ref-Nr</th>
                                                <th>Tätigkeit</th>
                                                <th>Art der Anstellung</th>
                                                <th>Ort</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            <?php foreach ($data['vacancy'] as $job) { ?>
                                                <tr>
                                                    <td><?= $job->unique_key; ?></td>
                                                    <td>
                                                        <a href="/Vacancyboard/Detail/<?= $job->vac_info_id; ?>"><strong><?= $job->jobtitle; ?></strong></a>
                                                    </td>
                                                    <td>Temporäranstellung</td>
                                                    <td><?= $job->zip; ?> <?= $job->city; ?></td>
                                                </tr>
                                            <?php } ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <a href="/Vacancyboard" class="btn">Alle offenen Stellen anzeigen</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <div class="row">
            <div class="col-md-12">
                <div class="contact-input-form box-wrapper mt-15 sm-mrgright-15 xs-mrgright-15">
                    <div class="contact">
                        <h2>Kontaktformular</h2>
                        <div class="contact-form">
                            <form id="contactForm"
                                  action="/Department/Detail/<?= $data['department']['customer_department_id'] ?>"
                                  class="form-validate" method="post">
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

                                    <?php if (!empty($data['success'])) {
                                        ?>

                                        <div class="alert alert-success" id="contactSuccess">
                                            <?= $data['success'] ?>
                                            <p>Wir werden uns so schnell wie möglich mit Ihnen in Verbindung setzen und
                                                Ihre Anfrage beantworten.</p>
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
                                                               required="Email" type="email"/>
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
                                                       value="<?= $data['input']['subject'] ?>" required="Subject"
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
                                        <?php
                                    }
                                    ?>
                                </fieldset>
                                <input type="hidden" name="recaptcha_response" id="recaptchaResponse" />
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php include 'footer.php'; ?>