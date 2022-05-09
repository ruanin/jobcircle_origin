</div>
<div id="showWaiting" class="modal" style="display: none">
    <div class="modal-body" >
        <div class="center"> 
            <img alt="" src="<?= WEB_URL ?>/tmpl_brefis/img/spin.gif" />
        </div>
    </div>
</div> 
</div>
<div class="footer-wrapper">
    <div class="footer">
        <div class="footer-top">
            <div class="container">
                <div class="row">
                    <div class="col-sm-5">
                        <div class="footer-top-block">
                            <h2>Stellenangebote</h2>
                            <ul class="footer-links">
                                <li><a href="/Vacancyboard?place=996">Stellenangebote in Region Zürich</a></li>
                                <li><a href="/Vacancyboard?place=985">Stellenangebote in Region Aargau</a></li>
                                <li><a href="/Vacancyboard?place=997">Stellenangebote in Region Luzern</a></li>
                            </ul>
                        </div><!-- /.footer-top-block -->
                    </div><!-- /.col-* -->

                    <div class="col-sm-3 col-sm-offset-1">
                        <div class="footer-top-block">
                            <h2>Navigation</h2>

                            <div class="row">
                                <div class="col-xs-6 col-sm-12 col-md-6">
                                    <ul class="footer-links">
                                        <li><a href="/home">Home</a></li>
                                        <li><a href="/Pages/companydivisions">Unternehmen</a></li>
                                        <li><a href="/Vacancyboard">Stellenangebote</a></li>
                                    </ul>
                                </div>
                                <div class="col-xs-6 col-sm-12 col-md-6">
                                    <ul class="footer-links">
                                        <li><a href="/Pages/candidate">Bewerber</a></li>
                                        <li><a href="/Pages/aboutbrefis">Über brefis</a></li>
                                        <li><a href="/Contact">Kontakt</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div><!-- /.footer-top-block -->
                    </div><!-- /.col-* -->
                </div><!-- /.row -->
            </div><!-- /.container -->
        </div><!-- /.footer-top -->

        <div class="footer-bottom">
            <div class="container">
                <div class="footer-bottom-left">
                    &copy; Copyright 2016 brefis personal ag - 6300 Zug | <a href="#">Impressum</a> | <a href="/Pages/datenschutz">Datenschutz</a>
                </div><!-- /.footer-bottom-left -->

            </div><!-- /.container -->
        </div><!-- /.footer-bottom -->
    </div><!-- /.footer -->
</div><!-- /.footer-wrapper -->

</div> <!-- end #main-wrapper -->

<!-- Scripts -->
<script type="text/javascript" src="<?= WEB_URL ?>/tmpl_brefis/js/jquery-ui-1.10.4.custom.min.js"></script>
<script type="text/javascript" src="<?= WEB_URL ?>/tmpl_brefis/js/jquery.ezmark.js"></script>
<script type="text/javascript" src="<?= WEB_URL ?>/tmpl_brefis/js/jquery.validate.js"></script>
<script type="text/javascript" src="<?= WEB_URL ?>/tmpl_brefis/js/messages_de.js"></script>
<script type="text/javascript" src="<?= WEB_URL ?>/tmpl_brefis/js/additional-methods.js"></script>
<script type="text/javascript" src="<?= WEB_URL ?>/tmpl_brefis/js/jquery.steps.js"></script>
<script type="text/javascript" src="<?= WEB_URL ?>/tmpl_brefis/js/owl.carousel.min.js"></script>
<script type="text/javascript" src="<?= WEB_URL ?>/tmpl_brefis/js/jquery.scrollUp.js"></script>
<script type="text/javascript" src="<?= WEB_URL ?>/tmpl_brefis/libraries/bootstrap-sass/javascripts/bootstrap/dropdown.js"></script>
<script type="text/javascript" src="<?= WEB_URL ?>/tmpl_brefis/libraries/bootstrap-sass/javascripts/bootstrap/tab.js"></script>
<script type="text/javascript" src="<?= WEB_URL ?>/tmpl_brefis/libraries/bootstrap-fileinput/js/fileinput.js"></script>
<script type="text/javascript" src="<?= WEB_URL ?>/tmpl_brefis/libraries/bootstrap-fileinput/js/locales/de.js"></script>
<script type="text/javascript" src="<?= WEB_URL ?>/tmpl_brefis/libraries/bootstrap-wysiwyg/bootstrap-wysiwyg.min.js"></script>
<script type="text/javascript" src="<?= WEB_URL ?>/tmpl_brefis/libraries/cycle2/jquery.cycle2.min.js"></script>
<script type="text/javascript" src="<?= WEB_URL ?>/tmpl_brefis/libraries/cycle2/jquery.cycle2.carousel.min.js"></script>
<script type="text/javascript" src="<?= WEB_URL ?>/tmpl_brefis/libraries/countup/countup.min.js"></script>
<script type="text/javascript" src="<?= WEB_URL ?>/tmpl_brefis/js/profession.js"></script>
<script type="text/javascript" src="<?= WEB_URL ?>/tmpl_brefis/js/jquery.responsive-tabs.js"></script>
<script type="text/javascript" src="<?= WEB_URL ?>/tmpl_brefis/js/jquery.flexslider-min.js"></script>
<script type="text/javascript" src="<?= WEB_URL ?>/tmpl_brefis/js/jquery.fitvids.js"></script>
<script type="text/javascript" src="<?= WEB_URL ?>/tmpl_brefis/js/jquery.inview.min.js"></script>
<script type="text/javascript" src="<?= WEB_URL ?>/tmpl_brefis/js/script.js"></script>
<script type="text/javascript" src="<?= WEB_URL ?>/tmpl_brefis/js/easyResponsiveTabs.js"></script>
<script type="text/javascript">

    jQuery(document).ready(function ($) {
        $('#parentHorizontalTab').easyResponsiveTabs({
            type: 'default', //Types: default, vertical, accordion
            width: 'auto', //auto or any width like 600px
            fit: true, // 100% fit in a container
            tabidentify: 'hor_1' // The tab groups identifier
        });
        $('#Profile').easyResponsiveTabs({
            type: 'default', //Types: default, vertical, accordion
            width: 'auto', //auto or any width like 600px
            fit: true, // 100% fit in a container
            tabidentify: 'hor_1' // The tab groups identifier
        });
        $('#Info').easyResponsiveTabs({
            type: 'default', //Types: default, vertical, accordion
            width: 'auto', //auto or any width like 600px
            fit: true, // 100% fit in a container
            tabidentify: 'hor_1' // The tab groups identifier
        });
        // Child Tab 
        $('#Vor_der_Einreise').easyResponsiveTabs({
            type: 'accordion',
            width: 'auto',
            fit: true,
            tabidentify: 'ver_1', // The tab groups identifier
        });
        // Child Tab 
        $('#Bewilligungen').easyResponsiveTabs({
            type: 'accordion',
            width: 'auto',
            fit: true,
            tabidentify: 'ver_2', // The tab groups identifier
        });
        // Child Tab 
        $('#Aufenthaltsbewilligungen').easyResponsiveTabs({
            type: 'accordion',
            width: 'auto',
            fit: true,
            tabidentify: 'ver_3', // The tab groups identifier
        });
        // Child Tab 
        $('#Rechtliche_Bestimmungen').easyResponsiveTabs({
            type: 'accordion',
            width: 'auto',
            fit: true,
            tabidentify: 'ver_4', // The tab groups identifier
        });
        // Child Tab 
        $('#Kinder').easyResponsiveTabs({
            type: 'accordion',
            width: 'auto',
            fit: true,
            tabidentify: 'ver_5', // The tab groups identifier
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
                            },
                        });
//
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
        $("#cv-register").fileinput({
            language: "de",
            dropZoneTitle: '<i class="fa fa-photo"></i><span>Upload Photo</span>',
            uploadUrl: '/',
            maxFileCount: 1,
            showUpload: false,
            showPreview: false,
            showCancel: true,
            browseLabel: 'Durchsuchen',
            browseIcon: '',
            removeLabel: 'Löschen',
            removeIcon: '',
            uploadLabel: 'Hochladen',
            uploadIcon: ''
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

</script>
</body>
</html>