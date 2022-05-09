<div id="showWaiting" class="modal" style="display: none">
    <div class="center">
        <img alt="" src="<?= WEB_URL ?>/tmpl_ahapersonal/img/spin.gif" />
    </div>
</div> 
<footer id="footer">
    <div class="container">
        <div class="row">
            <div class="col-sm-4 col-md-4">
                <div class="widget">
                    <h6 class="widget-title">Top Jobs</h6>

                    <div class="widget-content">
                        <ul class="footer-links">
                            <?php for ($i = 0; $i < 3; $i++) { ?>
                                <li><a href="/Vacancyboard/Detail/<?= $arrFooterTopJobs[$i]->vac_info_id; ?>" title=""><?= $arrFooterTopJobs[$i]->jobtitle; ?></a></li>        
                            <?php } ?>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-sm-4 col-md-4">
                <div class="widget">
                    <h6 class="widget-title">&nbsp;</h6>

                    <div class="widget-content">
                        <ul class="footer-links">
                            <?php for ($i = 3; $i < 6; $i++) { ?>
                                <li><a href="/Vacancyboard/Detail/<?= $arrFooterTopJobs[$i]->vac_info_id; ?>" title=""><?= $arrFooterTopJobs[$i]->jobtitle; ?></a></li>        
                            <?php } ?>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="col-sm-4 col-md-4">
                <div class="widget">
                    <h6 class="widget-title">Navigation</h6>

                    <div class="widget-content">
                        <div class="row">
                            <div class="col-xs-6 col-sm-6 col-md-6">
                                <ul class="footer-links">
                                    <li><a href="/home">Home</a></li>
                                    <li><a href="/Pages/companydivisions">Unternehmen</a></li>
                                    <li><a href="/Vacancyboard">Stellenangebote</a></li>
                                </ul>
                            </div>
                            <div class="col-xs-6 col-sm-6 col-md-6">
                                <ul class="footer-links">
                                    <li><a href="/Pages/candidate">Bewerber</a></li>
                                    <li><a href="/Pages/aboutAHA">Über aha</a></li>
                                    <li><a href="/Contact">Kontakt</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>

    <div class="copyright">
        <div class="container">
            <p>&copy; Copyright 2016 [aha] personal ag - 6301 Zug | <a href="#">Impressum</a> | <a href="/Pages/datenschutz">Datenschutz</a></p>

            <ul class="footer-social">
                <li><a href="#" class="fa fa-facebook"></a></li>
                <li><a href="https://twitter.com/ahapersonalag" class="fa fa-twitter"></a></li>
                <li><a href="#" class="fa fa-linkedin"></a></li>
                <li><a href="#" class="fa fa-google-plus"></a></li>
                <li><a href="#" class="fa fa-pinterest"></a></li>
                <li><a href="#" class="fa fa-dribbble"></a></li>
            </ul>
        </div>
    </div>
</footer> <!-- end #footer -->

</div> <!-- end #main-wrapper -->

<!-- Scripts -->
<script src="<?= WEB_URL ?>/tmpl_ahapersonal/js/jquery-1.11.0.min.js"></script>
<script src="<?= WEB_URL ?>/tmpl_ahapersonal/js/bootstrap.min.js"></script>
<script src="<?= WEB_URL ?>/tmpl_ahapersonal/js/jquery.validate.js"></script>
<script src="<?= WEB_URL ?>/tmpl_ahapersonal/js/messages_de.js"></script>
<script src="<?= WEB_URL ?>/tmpl_ahapersonal/js/additional-methods.js"></script>
<script src="<?= WEB_URL ?>/tmpl_ahapersonal/js/jquery.steps.js"></script>
<script src="<?= WEB_URL ?>/tmpl_ahapersonal/js/owl.carousel.min.js"></script> 
<script src="https://maps.google.com/maps/api/js?libraries=geometry&v=3&key=AIzaSyAxDcX_i7klYWcuTDr0Oma4nSMGaieMofs"></script>
<script src="<?= WEB_URL ?>/tmpl_ahapersonal/js/maplace.min.js"></script>
<script src="<?= WEB_URL ?>/tmpl_ahapersonal/js/jquery.ba-outside-events.min.js"></script>
<script src="<?= WEB_URL ?>/tmpl_ahapersonal/js/jquery.responsive-tabs.js"></script>
<script src="<?= WEB_URL ?>/tmpl_ahapersonal/js/jquery.flexslider-min.js"></script>
<script src="<?= WEB_URL ?>/tmpl_ahapersonal/js/jquery.fitvids.js"></script>
<script src="<?= WEB_URL ?>/tmpl_ahapersonal/js/jquery-ui-1.10.4.custom.min.js"></script>
<script src="<?= WEB_URL ?>/tmpl_ahapersonal/js/jquery.inview.min.js"></script>
<script src="<?= WEB_URL ?>/tmpl_ahapersonal/js/script.js"></script>
<script src="<?= WEB_URL ?>/tmpl_ahapersonal/js/jquery-birthday-picker.js"></script>
<script src="<?= WEB_URL ?>/tmpl_ahapersonal/js/jquery.fancybox.min.js"></script>
<script type="text/javascript">
    jQuery(document).ready(function ($) {
        $('[data-fancybox]').fancybox({
            lang: "de",
            toolbar: true,
            infobar: true,
            buttons: [
                "close"
            ],
            iframe: {
                preload: false,
                css: {
                    width: '100%',
                    height: '100%'
                }
            },
            animationEffect: "zoom"
        });

        function addHidden(key, value) {
            // Create a hidden input element, and append it to the form:
            var input = document.createElement('input');
            input.type = 'hidden';
            input.name = key;
            input.value = value;
            $('#register-wizard').append(input);
        }

        var form = $("#register-wizard").show();
        var movetonextstep;
        var registerWizard = form.steps({
            headerTag: "h3",
            bodyTag: "fieldset",
            transitionEffect: "slideLeft",
            labels: {
                cancel: "Abbrechen",
                current: "",
                pagination: "Pagination",
                finish: "Fertig",
                next: "Weiter",
                previous: "Zurück",
                loading: "Laden ..."
            },
            forceMoveForward: false,
            onInit: function (event, currentIndex) {
                $('#login_telefon').val('');
                $('#login_telefon').attr('disabled', true);
                $('#login_telefon').removeAttr('required');
                $('#login_email').removeAttr('disabled');
                $('#login_email').attr('required', true);
            },
            onStepChanging: function (event, currentIndex, newIndex)
            {
                if (currentIndex == 0) {
                    if ($("#login_telefon").val() != '') {

                        $.ajax({
                            type: "POST",
                            url: "<?= WEB_URL ?>/Candidate/activateMobile",
                            // The key needs to match your method's input parameter (case-sensitive).
                            data: {
                                tel: $("#login_telefon").val()
                            },
                            dataType: 'json',
                            beforeSend: function (xhr) {
                                $("#error").hide();
                                $('#showWaiting').show();
                            },
                            complete: function () {
                                $('#showWaiting').hide();
                            },
                            success: function (data) {
                                $('#showWaiting').hide();
                                if (data.error == '') {
                                    movetonextstep = true;
                                } else {
                                    $("#error").html("<strong>" + data.error + "</strong>");
                                    $("#error").show();
                                    movetonextstep = false;
                                }
                            }
                        });
                        return true;
                    } else {
                        return form.valid();
                    }
                } else {

                    if (currentIndex > newIndex)
                    {
                        return true;
                    }
                    // Needed in some cases if the user went back (clean up)
                    if (currentIndex < newIndex)
                    {
                        // To remove error styles
                        form.find(".body:eq(" + newIndex + ") label.error").remove();
                        form.find(".body:eq(" + newIndex + ") .error").removeClass("error");

                    }
                    return form.valid();
                }
            },
            onStepChanged: function (event, currentIndex, priorIndex)
            {
                if (priorIndex == 0) {
                    if (movetonextstep === false) {
                        form.steps("previous");
                    } else {
                        if ($("#login_telefon").val() != '') {
                            $('#mobile').val($("#login_telefon").val());
                        } else if ($("#login_email").val() != '') {
                            $('#email').val($("#login_email").val());
                        }
                    }
                }
            },
            onFinishing: function (event, currentIndex)
            {
                return form.valid();
            },
            onFinished: function (event, currentIndex) {
                addHidden('secretInput', '<?= SECRET_KEY ?>');
                form.submit();
            }
        }).validate({
            errorPlacement: function errorPlacement(error, element) {
                element.before(error);
            },
            rules: {
                firstname: {
                    required: true,
                    cleanNames: '[0-9_.*!?+%@():,#{}=|;<>/]'
                },
                lastname: {
                    required: true,
                    cleanNames: '[0-9_.*!?+%@():,#{}=|;<>/]'
                },
                login_password_confirm: {
                    equalTo: "#login_password_1"
                },
                login_email: {
                    email: true
                },
                login_telefon: {
                    phoneInternational: true
                },
                phone: {
                    required: false,
                    phoneInternational: true
                },
                mobile: {
                    required: false,
                    phoneInternational: true
                }
            },
            messages: {
                firstname: {
                    cleanNames: 'Vorname enthält nicht erlaubte Zeichen.'
                },
                lastname: {
                    cleanNames: 'Nachname enthält nicht erlaubte Zeichen.'
                },
                login_telefon: {
                    phoneInternational: 'Bitte eine gültige Telefonnummer eingeben.'
                },
                phone: {
                    phoneInternational: 'Bitte eine gültige Telefonnummer eingeben.'
                },
                mobile: {
                    phoneInternational: 'Bitte eine gültige Telefonnummer eingeben.'
                }
            }
        });

        var applyForm = $("#apply-wizard").show();
        applyForm.validate({
            ignore: ":disabled,:hidden"
        });
        var applyWizard = applyForm.steps({
            headerTag: "h3",
            bodyTag: "fieldset",
            transitionEffect: "slideLeft",
            labels: {
                cancel: "Abbrechen",
                current: "",
                pagination: "Pagination",
                finish: "Fertig",
                next: "Weiter",
                previous: "Zurück",
                loading: "Laden ..."
            },
            forceMoveForward: false,
            onStepChanging: function (event, currentIndex, newIndex) {
                if (currentIndex > newIndex) {
                    return true;
                }
                $("#error").hide();
                if (currentIndex == 0) {
                    if ($("#phone").val() == '' && $("#mobile").val() == '') {
                        $("#error").html("<strong>Bitte tragen Sie mindestens 1 Telefonnummer ein!</strong>");
                        $("#error").show();
                        return false;
                    }
                }
                // Needed in some cases if the user went back (clean up)
                if (currentIndex < newIndex) {
                    // To remove error styles
                    applyForm.find(".body:eq(" + newIndex + ") label.error").remove();
                    applyForm.find(".body:eq(" + newIndex + ") .error").removeClass("error");

                }
                return applyForm.valid();
            },
            onStepChanged: function (event, currentIndex, priorIndex) {

            },
            onFinishing: function (event, currentIndex) {
                return applyForm.valid();
            },
            onFinished: function (event, currentIndex) {
                applyForm.submit();
            }
        }).validate({
            errorPlacement: function errorPlacement(error, element) {
                element.before(error);
            },
        });

        if ($("#registerAfterApplication")) {
            $("#registerAfterApplication").validate({
                errorPlacement: function errorPlacement(error, element) {
                    element.before(error);
                },
                rules: {
                    login_email_password_confirm: {
                        equalTo: "#login_email_password_1"
                    },
                    login_tel_password_confirm: {
                        equalTo: "#login_tel_password_1"
                    }
                }
            });
        }
        $("#birthdayPicker").birthdayPicker({
            "maxAge": 90,
            "minAge": 16,
            "dateFormat": "littleEndian",
            "sizeClass": "span2",
            "monthFormat": "long"
        });
    });

    function getDirection(ev, $el, test, coordinates) {

        var w = $el.width(),
                h = $el.height(),
                x = (coordinates.x - $el.offset().left - (w / 2)) * (w > h ? (h / w) : 1),
                y = (coordinates.y - $el.offset().top - (h / 2)) * (h > w ? (w / h) : 1),
                direction = Math.round((((Math.atan2(y, x) * (180 / Math.PI)) + 180) / 90) + 3) % 4;
        $el.removeClass('in-top in-right in-bottom in-left out-top out-right out-bottom out-left')
        switch (direction) {
            case 0 :
                class_suffix = '-top';
                break;
            case 1 :
                class_suffix = '-right';
                break;
            case 2 :
                class_suffix = '-bottom';
                break;
            case 3 :
                class_suffix = '-left';
                break;
        }
        return test + class_suffix;
    }
    ;

    function getClass(ev, $el, state, coordinates) {
        var direction = getDirection($el, coordinates),
                class_suffix = "";

        //remove all in- and -out classes
        $el.removeClass('in-top in-right in-bottom in-left out-top out-right out-bottom out-left')
        //$el.removeClass()

        switch (direction) {
            case 0 :
                class_suffix = '-top';
                break;
            case 1 :
                class_suffix = '-right';
                break;
            case 2 :
                class_suffix = '-bottom';
                break;
            case 3 :
                class_suffix = '-left';
                break;
        }


    }
    ;

</script>
</body>
</html>