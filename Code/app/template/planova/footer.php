<div id="showWaiting" class="modal" style="display: none">
    <div class="center">
        <img alt="" src="<?= WEB_URL ?>/tmpl_planova/img/spin.gif"/>
    </div>
</div>
<div class="container mt-15">
    <div class="footer-widget box-wrapper ">
        <div class="row">
            <div class="col-lg-3 col-md-2 col-sm-12 col-xs-12">
                <div class="custom-menu-widget">
                    <h2 class="widget-title "><span><i class="fa fa-bullhorn " style="vertical-align: top"></i> Top Jobs</span>
                    </h2>
                    <div class="custom-widget">
                        <ul class="list-unstyled">
                            <?php foreach ($arrFooterTopJobs as $ftopjob) { ?>
                                <li><a href="/Vacancyboard/Detail/<?= $ftopjob->vac_info_id; ?>"
                                       title=""><?= $ftopjob->jobtitle; ?></a></li>
                            <?php } ?>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-lg-2 col-md-2 col-sm-12 col-xs-12">
                <div class="custom-menu-widget">
                    <h2 class="widget-title "><i class="fa fa-briefcase" style="vertical-align: top"></i> Kunden</h2>
                    <div class="custom-widget">
                        <ul class="list-unstyled">
                            <li><a href="/Pages/company" title="">Für Unternehmen</a></li>
                            <li><a href="/Pages/companydivisions" title="">Fachbereiche</a></li>
                            <li><a href="/Pages/companyService" title="">Dienstleistungen</a></li>
                            <li><a href="/Contact" title="">Ansprechpartner</a></li>
                            <li><a href="/Contact" title="">Personalanfrage</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-lg-2 col-md-2 col-sm-12 col-xs-12">
                <div class="custom-menu-widget">
                    <h2 class="widget-title "><span><i class="fa fa-group" style="vertical-align: top"></i> Bewerber</span></h2>
                    <div class="custom-widget">
                        <ul class="list-unstyled">
                            <li><a href="/Pages/candidate" title="">Für Bewerber</a></li>
                            <li><a href="/Pages/companydivisions" title="">Fachbereiche</a></li>
                            <li><a href="/Pages/citizeninfo" title="">EU-Bürger Info</a></li>
                            <li><a href="/Vacancyboard" title="">Stellenangebote</a></li>
                            <li><a href="/Candidate/registerWizard" title="">Spontanbewerbung</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
                <div class="custom-menu-widget">
                    <h2 class="widget-title "><span><i class="fa fa-clock-o" style="vertical-align: top"></i></span>
                        Öffnungszeiten</h2>
                    <div class="custom-widget">

                        <p><strong>Montag-Freitag</strong><br>
                            08:00 - 12:00 Uhr<br>
                            13:30 - 18:00 Uhr<br>
                            <strong>Samstag:</strong> Geschlossen<br>
                            <strong>Sonntag:</strong> Geschlossen</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-2 col-md-3 col-sm-12 col-xs-12">
                <div class="custom-menu-widget">
                    <h2 class="widget-title "><span><i class="fa fa-map-marker" style="vertical-align: top"></i> Standorte</span>
                    </h2>
                    <div class="custom-widget">
                        <ul class="list-unstyled">
                            <li><a href="/Department/Detail/71" title="">Filiale Aarau</a></li>
                            <li><a href="/Department/Detail/68" title="">Filiale Baden</a></li>
                            <li><a href="/Department/Detail/74" title="">Filiale Basel</a></li>
                            <li><a href="/Department/Detail/67" title="">Filiale Bern</a></li>
                            <li><a href="/Department/Detail/66" title="">Filiale Luzern</a></li>
                            <li><a href="/Department/Detail/69" title="">Filiale Winterthur</a></li>
                            <li><a href="/Department/Detail/64" title="">Filiale Zug</a></li>
                            <li><a href="/Department/Detail/63" title="">Filiale Zürich</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div> <!-- //row -->
    </div>  <!-- //footer-widget -->
    <div class="copyright-text box-wrapper">
        <div class="row">
            <div class="col-md-6 col-sm-6">
                <div class="left-copy-text">
                    <p style="margin-bottom: 0px;">Copyright © 2016 planova human capital ag. All Rights
                        Reserved. <br/><a href="/Pages/datenschutz">Datenschutz</a></p>
                </div> <!-- //left-copy-text -->
            </div> <!-- //col-md-6 -->
            <div class="col-md-6 col-sm-6 hidden-xs">
                <div class="footer-right" style="float:right;">
                    <div class="social-icon pull-right social-fix">
                        <ul class="list-unstyled">
                            <li><a href="#" title="RSS" target="_blank"><i class="fa fa-rss"></i></a></li>
                            <li><a href="https://www.facebook.com/planovazug/" title="Facebook" target="_blank"><i
                                            class="fab fa-facebook-f"> </i></a></li>
                            <li><a href="#" title="Twitter" target="_blank"><i class="fab fa-twitter"></i></a></li>
                            <li><a href="#" title="Google plus" target="_blank"><i class="fab fa-google-plus-g"></i></a>
                            </li>
                        </ul>
                    </div> <!-- //social-icon -->
                </div> <!-- //footer-right -->
            </div> <!-- //col-md-6 -->
        </div> <!-- //row -->
    </div> <!-- //copyright-text -->
</div> <!-- //container -->
</div> <!-- //inner-wrapper -->

<div class="offcanvas-wrapper col-sm-3 col-xs-3 hidden-lg hidden-md hidden-sm sidebar-offcanvas">
    <div class="sidebar-nav">
        <h2>Menü</h2>
        <button type="button" class="close" aria-hidden="true" data-toggle="offcanvas">&times;</button>
        <ul>
            <li class="active"><a href="/">Home</a></li>
            <li><a href="/Pages/company">Für Unternehmen</a></li>
            <li><a href="/Pages/companyService">Dienstleistungen</a></li>
            <li><a href="/Vacancyboard">Stellenangebote</a></li>
            <li><a href="/Pages/citizeninfo">EU-Bürger Info</a></li>
            <li><a href="/Pages/candidate">Für Bewerber</a></li>
            <li><a href="/Pages/aboutplanova">Über planova</a>
                <ul>
                    <li><a href="/Pages/companydivisions">Fachbereiche</a></li>
                    <li><a href="/Pages/swissstaffing">Qualitätsanspruch</a></li>
                    <li><a href="/Pages/career">Karriere bei Planova</a></li>
                </ul>
            </li>
            <li><a href="/Contact">Kontakt</a></li>
            <?php if (isset($_SESSION['logged']) && ($_SESSION['logged'] == true)) { ?>
                <!-- Registration button -->
                <li><a href='/Candidate/Dashboard'>My Planova</a></li>
                <li><a href='/Candidate/loggout'>Abmelden</a></li>
            <?php } else { ?>
                <li><a href="/Candidate/login">Anmelden</a></li>
                <li><a href="/Candidate/registerWizard">Registrieren</a></li>
            <?php } ?>
        </ul>
    </div> <!-- //sidebar-nav -->
</div> <!-- //offcanvas-wrapper -->
</div> <!-- //row-offcanvas -->
</div> <!-- //wrapper -->
<!--Start script-->
<script src="<?= WEB_URL ?>/tmpl_planova/js/jquery.min.js"></script>
<script src="<?= WEB_URL ?>/tmpl_planova/js/modernizr-2.6.2.min.js"></script>
<!-- jQuery REVOLUTION Slider  -->
<script type="text/javascript" src="<?= WEB_URL ?>/tmpl_planova/rs-plugin/js/jquery.themepunch.plugins.min.js"></script>
<script type="text/javascript"
        src="<?= WEB_URL ?>/tmpl_planova/rs-plugin/js/jquery.themepunch.revolution.min.js"></script>
<script src="<?= WEB_URL ?>/tmpl_planova/js/bootstrap.min.js"></script>
<script src="<?= WEB_URL ?>/tmpl_planova/js/owl.carousel.min.js"></script>
<script src="<?= WEB_URL ?>/tmpl_planova/js/jquery.scrollUp.js"></script>
<script src="<?= WEB_URL ?>/tmpl_planova/js/offcanvas.js"></script>
<script src="<?= WEB_URL ?>/tmpl_planova/js/jquery.prettyPhoto.js"></script>
<script type="text/javascript"
        src="https://maps.googleapis.com/maps/api/js?v=3&key=AIzaSyAsK-DV1VWBAh_UpIk0BVSOSEiLc0iFkSA"></script>
<script src="<?= WEB_URL ?>/tmpl_planova/js/maplace.min.js"></script>
<script src="<?= WEB_URL ?>/tmpl_planova/js/script.js"></script>
<script src="<?= WEB_URL ?>/tmpl_planova/js/isInViewport.min.js"></script>
<script src="<?= WEB_URL ?>/tmpl_planova/js/jquery.validate.js"></script>
<script src="<?= WEB_URL ?>/tmpl_planova/js/messages_de.js"></script>
<script src="<?= WEB_URL ?>/tmpl_planova/js/additional-methods.js"></script>
<script src="<?= WEB_URL ?>/tmpl_planova/js/jquery.steps.js"></script>
<script src="<?= WEB_URL ?>/tmpl_planova/js/jquery-birthday-picker.js"></script>
<script src="<?= WEB_URL ?>/tmpl_planova/js/jquery.matchHeight-min.js"></script>
<script src="<?= WEB_URL ?>/tmpl_planova/js/fileinput.min.js"></script>
<script src="<?= WEB_URL ?>/tmpl_planova/js/locales/de.js"></script>
<script src="<?= WEB_URL ?>/tmpl_planova/themes/explorer/theme.js"></script>
<script type="text/javascript">
    jQuery(document).ready(function ($) {
        $("#cvFiles").fileinput({
            theme: "explorer",
            language:'de', 
            autoReplace: false,
            showUpload:false, 
            maxFileSize: 10240,
            allowedFileExtensions:["jpeg","jpg","png","pdf","doc","docx","odt","rtf"],
            overwriteInitial: false,
            initialPreviewAsData: false, // defaults markup  
            previewFileIcon: '<i class="fas fa-file"></i>',
            preferIconicPreview: true, // this will force thumbnails to display icons for following file extensions
            previewFileIconSettings: { // configure your icon file extensions
                'doc': '<i class="fas fa-file-word text-primary"></i>',
                'xls': '<i class="fas fa-file-excel text-success"></i>',
                'ppt': '<i class="fas fa-file-powerpoint text-danger"></i>',
                'pdf': '<i class="fas fa-file-pdf text-danger"></i>',
                'zip': '<i class="fas fa-file-archive text-muted"></i>',
                'htm': '<i class="fas fa-file-code text-info"></i>',
                'txt': '<i class="fas fa-file-text text-info"></i>',
                'mov': '<i class="fas fa-file-video text-warning"></i>',
                'mp3': '<i class="fas fa-file-audio text-warning"></i>',
                // note for these file types below no extension determination logic 
                // has been configured (the keys itself will be used as extensions)
                'jpg': '<i class="fas fa-file-image text-danger"></i>', 
                'gif': '<i class="fas fa-file-image text-muted"></i>', 
                'png': '<i class="fas fa-file-image text-primary"></i>'    
            },
            previewFileExtSettings: { // configure the logic for determining icon file extensions
                'doc': function(ext) {
                    return ext.match(/(doc|docx)$/i);
                },
                'xls': function(ext) {
                    return ext.match(/(xls|xlsx)$/i);
                },
                'ppt': function(ext) {
                    return ext.match(/(ppt|pptx)$/i);
                },
                'zip': function(ext) {
                    return ext.match(/(zip|rar|tar|gzip|gz|7z)$/i);
                },
                'htm': function(ext) {
                    return ext.match(/(htm|html)$/i);
                },
                'txt': function(ext) {
                    return ext.match(/(txt|ini|csv|java|php|js|css)$/i);
                },
                'mov': function(ext) {
                    return ext.match(/(avi|mpg|mkv|mov|mp4|3gp|webm|wmv)$/i);
                },
                'mp3': function(ext) {
                    return ext.match(/(mp3|wav)$/i);
                }
            }
        });
        var $elements = $('[data-type="hover-effect"]');

        $elements.each(function () {

            $(this)
                .on('mouseover', function (ev) {

                    $(this).addClass(getDirection(ev, $(this), 'in', {x: ev.pageX, y: ev.pageY}));
                })
                .on('mouseout', function (ev) {
                    $(this).addClass(getDirection(ev, $(this), 'out', {x: ev.pageX, y: ev.pageY}));
                });
        });
        var matchOptions = {byRow: true,
            property: 'min-height',
            target: null,
            remove: true};
        $('.equalh').matchHeight(matchOptions);

        var form = $("#register-wizard").show();
        form.validate({
            ignore: ":disabled,:hidden"
        });
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
            onStepChanging: function (event, currentIndex, newIndex) {
                ;
                if (currentIndex == 0) {
                    if ($("#login_telefon").val() != '') {

                        $.ajax({
                            type: "POST",
                            url: "<?=WEB_URL?>/Candidate/activateMobile",
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

                    if (currentIndex > newIndex) {
                        return true;
                    }
                    // Needed in some cases if the user went back (clean up)
                    if (currentIndex < newIndex) {
                        // To remove error styles
                        form.find(".body:eq(" + newIndex + ") label.error").remove();
                        form.find(".body:eq(" + newIndex + ") .error").removeClass("error");

                    }
                    return form.valid();
                }
            },
            onStepChanged: function (event, currentIndex, priorIndex) {
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
            onFinishing: function (event, currentIndex) {
                return form.valid();
            },
            onFinished: function (event, currentIndex) {
                form.submit();
            }
        }).validate({
            errorPlacement: function errorPlacement(error, element) {
                element.before(error);
            },
            rules: {
                login_password_confirm: {
                    equalTo: "#login_password_1"
                },
                login_email: {
                    email: true
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
    $("#birthdayPicker").birthdayPicker({
        "maxAge": 90,
        "minAge": 12,
        "dateFormat": "littleEndian",
        "sizeClass": "span2",
        "monthFormat": "long"
    });

    /******************************************
                    -   PREPARE PLACEHOLDER FOR SLIDER  -
                ******************************************/
                                
                 
                        var setREVStartSize = function() {
                            var tpopt = new Object(); 
                                tpopt.startwidth = 665;
                                tpopt.startheight = 470;
                                tpopt.container = $('#rev_slider_1_1');
                                tpopt.fullScreen = "off";
                                tpopt.forceFullWidth="off";

                            tpopt.container.closest(".rev_slider_wrapper").css({height:tpopt.container.height()});tpopt.width=parseInt(tpopt.container.width(),0);tpopt.height=parseInt(tpopt.container.height(),0);tpopt.bw=tpopt.width/tpopt.startwidth;tpopt.bh=tpopt.height/tpopt.startheight;if(tpopt.bh>tpopt.bw)tpopt.bh=tpopt.bw;if(tpopt.bh<tpopt.bw)tpopt.bw=tpopt.bh;if(tpopt.bw<tpopt.bh)tpopt.bh=tpopt.bw;if(tpopt.bh>1){tpopt.bw=1;tpopt.bh=1}if(tpopt.bw>1){tpopt.bw=1;tpopt.bh=1}tpopt.height=Math.round(tpopt.startheight*(tpopt.width/tpopt.startwidth));if(tpopt.height>tpopt.startheight&&tpopt.autoHeight!="on")tpopt.height=tpopt.startheight;if(tpopt.fullScreen=="on"){tpopt.height=tpopt.bw*tpopt.startheight;var cow=tpopt.container.parent().width();var coh=jQuery(window).height();if(tpopt.fullScreenOffsetContainer!=undefined){try{var offcontainers=tpopt.fullScreenOffsetContainer.split(",");jQuery.each(offcontainers,function(e,t){coh=coh-jQuery(t).outerHeight(true);if(coh<tpopt.minFullScreenHeight)coh=tpopt.minFullScreenHeight})}catch(e){}}tpopt.container.parent().height(coh);tpopt.container.height(coh);tpopt.container.closest(".rev_slider_wrapper").height(coh);tpopt.container.closest(".forcefullwidth_wrapper_tp_banner").find(".tp-fullwidth-forcer").height(coh);tpopt.container.css({height:"100%"});tpopt.height=coh;}else{tpopt.container.height(tpopt.height);tpopt.container.closest(".rev_slider_wrapper").height(tpopt.height);tpopt.container.closest(".forcefullwidth_wrapper_tp_banner").find(".tp-fullwidth-forcer").height(tpopt.height);}
                        };
                        
                        /* CALL PLACEHOLDER */
                        setREVStartSize();
              
                var revapi1;
                
                
                
                jQuery(document).ready(function ($) {
                
                    
                                
                if($('#rev_slider_1_1').revolution == undefined)
                    revslider_showDoubleJqueryError('#rev_slider_1_1');
                else
                   revapi1 = $('#rev_slider_1_1').show().revolution(
                    {
                        dottedOverlay:"none",
                        delay:9000,
                        startwidth:665,
                        startheight:470,
                        hideThumbs:200,
                        
                        thumbWidth:100,
                        thumbHeight:50,
                        thumbAmount:5,
                                                    
                        simplifyAll:"on",                       
                        navigationType:"none",
                        navigationArrows:"solo",
                        navigationStyle:"round",                        
                        touchenabled:"on",
                        onHoverStop:"off",                      
                        nextSlideOnWindowFocus:"off",
                        
                        swipe_threshold: 0.7,
                        swipe_min_touches: 1,
                        drag_block_vertical: false,
                                                                        
                                                                            panZoomDisableOnMobile:"on",
                                                    
                        keyboardNavigation:"on",
                        
                        navigationHAlign:"center",
                        navigationVAlign:"bottom",
                        navigationHOffset:0,
                        navigationVOffset:20,

                        soloArrowLeftHalign:"left",
                        soloArrowLeftValign:"center",
                        soloArrowLeftHOffset:20,
                        soloArrowLeftVOffset:0,

                        soloArrowRightHalign:"right",
                        soloArrowRightValign:"center",
                        soloArrowRightHOffset:20,
                        soloArrowRightVOffset:0,
                                
                        shadow:0,
                        fullWidth:"on",
                        fullScreen:"off",

                        spinner:"spinner1",
                        
                        stopLoop:"off",
                        stopAfterLoops:-1,
                        stopAtSlide:-1,

                        shuffle:"off",
                        
                        autoHeight:"off",                       
                        forceFullWidth:"off",                       
                                                
                                                
                        hideTimerBar:"on",                      
                        hideThumbsOnMobile:"off",
                        hideNavDelayOnMobile:1500,
                        hideBulletsOnMobile:"off",
                        hideArrowsOnMobile:"off",
                        hideThumbsUnderResolution:0,
                        
                                                hideSliderAtLimit:0,
                        hideCaptionAtLimit:0,
                        hideAllCaptionAtLilmit:0,
                        startWithSlide:0,
                        isJoomla: true
                    });
                    
                    
                    
                                    
                });
</script>
<script>
    (function (i, s, o, g, r, a, m) {
        i['GoogleAnalyticsObject'] = r;
        i[r] = i[r] || function () {
            (i[r].q = i[r].q || []).push(arguments)
        }, i[r].l = 1 * new Date();
        a = s.createElement(o),
            m = s.getElementsByTagName(o)[0];
        a.async = 1;
        a.src = g;
        m.parentNode.insertBefore(a, m)
    })(window, document, 'script', '//www.google-analytics.com/analytics.js', 'ga');

    ga('create', 'UA-72906713-1', 'auto');
    ga('send', 'pageview');

</script>
<!--End script    -->
<script type="application/ld+json">
{
    "@context": "http://schema.org",
    "@type": "Organization",
    "url": "http://planova.ch",
    "logo": "http://planova.ch/tmpl_planova/img/logo.png",
    "contactPoint" : [{
    "@type" : "ContactPoint",
    "telephone" : "+41 41 726 32 20",
    "contactType" : "customer service"
  },{
    "@type" : "ContactPoint",
    "telephone" : "+41 44 447 22 22",
    "contactType" : "customer service"
  },{
    "@type" : "ContactPoint",
    "telephone" : "+41 52 555 05 55",
    "contactType" : "customer service"
  },{
    "@type" : "ContactPoint",
    "telephone" : "+41 41 227 30 50",
    "contactType" : "customer service"
  },{
    "@type" : "ContactPoint",
    "telephone" : "+41 31 561 61 61",
    "contactType" : "customer service"
  },{
    "@type" : "ContactPoint",
    "telephone" : "+41 56 204 00 10",
    "contactType" : "customer service"
  }]
}


</script>
<script type="application/ld+json">
{
  "@context": "http://schema.org",
  "@type": "WebSite",
  "url": "https://planova.ch",
  "potentialAction": {
    "@type": "SearchAction",
    "target": "https://planova.ch/Vacancyboard/?jobtitle={search_term_string}",
    "query-input": "required name=search_term_string"
  }
}


</script>
</body>
</html>