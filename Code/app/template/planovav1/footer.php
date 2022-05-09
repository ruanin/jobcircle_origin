<footer>
    <div class="pl-footer">

        <div class="pl-ft-lft">
            <span class="pl-ft-title">ÖFFNUNGSZEITEN</span>
            <p>Mo - Fr
                <span class="pl-hd-md-bold">08:00 - 12:00 h <br />
                    13.30 - 18:00 h</span>
                Sa - So
                <span class="pl-hd-md-bold">Geschlossen</span></p>
        </div>


        <div class="pl-ft-rht">
            <div class="col-lg-12">
                <div class="row">
                    <div class="col-lg-4 col-sm-4">
                        <span class="pl-ft-title">STANDORTE</span>
                        <ul>
                            <li><a href="<?= WEB_URL ?>/Department/Detail/71">Filiale Aarau</a></li>
                            <li><a href="<?= WEB_URL ?>/Department/Detail/68">Filiale Baden</a></li>   
                            <li><a href="<?= WEB_URL ?>/Department/Detail/74">Filiale Basel</a></li>
                            <li><a href="<?= WEB_URL ?>/Department/Detail/67">Filiale Bern</a></li>
                            <li><a href="<?= WEB_URL ?>/Department/Detail/66">Filiale Luzern</a></li>
                            <li><a href="<?= WEB_URL ?>/Department/Detail/69">Filiale Winterthur</a></li>
                            <li><a href="<?= WEB_URL ?>/Department/Detail/64">Filiale Zug</a></li>
                            <li><a href="<?= WEB_URL ?>/Department/Detail/63">Filiale Zürich</a></li>
                        </ul>								
                    </div>
                    <div class="col-lg-8 col-sm-8 ft-job-mnu">
                        <span class="pl-ft-title">TOP JOBS</span>
                        <ul>
                            <?php foreach ($arrFooterTopJobs as $ftopjob) { ?>
                                <li><a href="/Vacancyboard/Detail/<?= $ftopjob->vac_info_id; ?>"><?= $ftopjob->jobtitle; ?></a></li>
                            <?php } ?>

                        </ul>	
                        <ul>

                        </ul>									
                    </div>
                    <div class="pl-terms">
                        <ul>    
                            <li><a href="<?= WEB_URL ?>/Pages/Datenschutz">Datenschutz</a></li>

                            <li><a href="<?= WEB_URL ?>/Pages/kontakt">Kontakt</a></li>
                            <li><a href="#">FAQ</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>
<!-- Footer SectionEnds -->
</div>
<div id="stop" class="scrollTop">
    <span><a href="#"><i class="fa fa-arrow-up" aria-hidden="true"></i></a></span>
</div>
</div>

<!-- Wrapper Section Ends -->

<!-- Scripts -->
<script src="<?= WEB_URL ?>/tmpl_planovav1/js/jquery-3.4.0.min.js"></script>	      
<script src="<?= WEB_URL ?>/tmpl_planovav1/js/bootstrap.min.js"></script>
<!--script src="https://code.jquery.com/jquery-3.1.1.slim.min.js"></script-->
<script src="<?= WEB_URL ?>/tmpl_planovav1/js/popper.min.js"></script>	
<script src="<?= WEB_URL ?>/tmpl_planovav1/js/custom.js"></script>
<script src="<?= WEB_URL ?>/tmpl_planovav1/js/jquery.validate.js"></script>
<script src="<?= WEB_URL ?>/tmpl_planovav1/js/messages_de.js"></script>
<script src="<?= WEB_URL ?>/tmpl_planovav1/js/additional-methods.js"></script>
<script src="<?= WEB_URL ?>/tmpl_planovav1/js/jquery-birthday-picker.js"></script>
<script src="<?= WEB_URL ?>/tmpl_planovav1/js/jquery.matchHeight-min.js"></script>
<script src="<?= WEB_URL ?>/tmpl_planovav1/js/fileinput.min.js"></script>
<script src="<?= WEB_URL ?>/tmpl_planovav1/js/locales/de.js"></script>
<script src="<?= WEB_URL ?>/tmpl_planovav1/themes/explorer-fa/theme.js"></script>
<script src="<?= WEB_URL ?>/tmpl_planovav1/js/BsMultiSelect.js"></script> 
<script src="<?= WEB_URL ?>/tmpl_planovav1/js/jquery.amsify.suggestags.js"></script>
<script src="<?= WEB_URL ?>/tmpl_planovav1/js/jquery.steps.js"></script>
<script src="<?= WEB_URL ?>/tmpl_planovav1/js/featherlight.js"></script>
<script src="<?= WEB_URL ?>/tmpl_planovav1/js/sharer.js"></script>
<!-- Include js plugin -->
<!-- Facebook Pixel Code -->
<script>
    !function (f, b, e, v, n, t, s)
    {
        if (f.fbq)
            return;
        n = f.fbq = function () {
            n.callMethod ?
                    n.callMethod.apply(n, arguments) : n.queue.push(arguments)
        };
        if (!f._fbq)
            f._fbq = n;
        n.push = n;
        n.loaded = !0;
        n.version = '2.0';
        n.queue = [];
        t = b.createElement(e);
        t.async = !0;
        t.src = v;
        s = b.getElementsByTagName(e)[0];
        s.parentNode.insertBefore(t, s)
    }(window, document, 'script',
            'https://connect.facebook.net/en_US/fbevents.js');
    fbq('init', '262211111881686');
    fbq('track', 'PageView');
</script>
<noscript>
<img height="1" width="1" 
     src="https://www.facebook.com/tr?id=262211111881686&ev=PageView
     &noscript=1"/>
</noscript>
<!-- End Facebook Pixel Code -->
<script>
    $('.pl-vis').click(function (event) {
        event.preventDefault();
        $('.pl-cnt-visible').toggle();
        $('span', this).toggleClass('pl-vis-txt-none');
    });

    $('.pl-blg-weiter').click(function () {

        $('.pl-blg-prev').css('display', 'block');
        $('.pl-blg-weiter').css('display', 'none');
    });

    $('.pl-blg-prev').click(function () {

        $('.pl-blg-prev').css('display', 'none');
        $('.pl-blg-weiter').css('display', 'block');
    });

    function showPhoneNumber() {
        $('#contactText').hide();
        $('#contactPhoneNumber').show();
    }

    function addHidden(key, value) {
        // Create a hidden input element, and append it to the form:
        var input = document.createElement('input');
        input.type = 'hidden';
        input.name = key;
        input.value = value;
        $('#register-wizard').append(input);
    }

    /**** Search Bar ****/

    $(document).ready(function () {
        $('div.pl-sect1').each(function () {
            var $dropdown = $(this);
            //debugger 
            $("span.pl-inner-cnt", $dropdown).click(function (e) {
                e.preventDefault();
                //debugger
                $div = $("ul.show-list", $dropdown);
                $div.toggle();
                $("i", this).toggleClass("fa-angle-down fa-angle-up");
                //alert($("i").not($("i", this)).hasClass("fa-angle-up"));
                if ($("i").not($("i", this)).hasClass("fa-angle-up")) {
                    $("i.fa-angle-up").not($('i', this)).toggleClass("fa-angle-up fa-angle-down");
                }
                $("ul.show-list").not($div).hide();
                return false;
            });
        });

        // Add the following code if you want the name of the file appear on select
//        $(".custom-file-input").on("change", function () {
//            var fileName = $(this).val().split("\\").pop();
//            $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
//        });
        
        $(".custom-file-input").each( function(){
            $(this).on("change", function () {
                var fileName = $(this).val().split("\\").pop();
                console.log(fileName);
                $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
            });  
        });

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
            onStepChanging: function (event, currentIndex, newIndex) {

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

        if ($('#spontantApplyForm')) {
            $('#spontantApplyForm').validate({
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
                    email: {
                        email: true
                    },
                    phone: {
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
                    email: {
                        phoneInternational: 'Bitte eine gültige Telefonnummer eingeben.'
                    },
                    phone: {
                        phoneInternational: 'Bitte eine gültige Telefonnummer eingeben.'
                    }
                }
            });
        }

        $('.collapse').on('show.bs.collapse', function () {
            var id = $(this).attr('id');
            $('a[href="#' + id + '"]').closest('.panel-heading').addClass('active-faq');
            $('a[href="#' + id + '"] .panel-title span').html('<i class="fa fa-minus-square"></i>');
        });
        $('.collapse').on('hide.bs.collapse', function () {
            var id = $(this).attr('id');
            $('a[href="#' + id + '"]').closest('.panel-heading').removeClass('active-faq');
            $('a[href="#' + id + '"] .panel-title span').html('<i class="fa fa-plus-square"></i>');
        });

        $("#birthdayPicker").birthdayPicker({
            "maxAge": 90,
            "minAge": 16, 
            "dateFormat": "littleEndian",
            "sizeClass": "span2",
            "monthFormat": "long"
        });

        $("#cvFiles").fileinput({
            theme: "explorer-fa",
            language: 'de',
            required: true,
            autoReplace: false,
            showUpload: false,
            maxFileSize: 10240,
            allowedFileExtensions: ["jpeg", "jpg", "png", "pdf", "doc", "docx", "odt", "rtf"],
            overwriteInitial: false,
            initialPreviewAsData: false, // defaults markup  
            previewFileIcon: '<i class="fas fa-file"></i>',
            preferIconicPreview: true, // this will force thumbnails to display icons for following file extensions
            previewFileIconSettings: {// configure your icon file extensions
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
            previewFileExtSettings: {// configure the logic for determining icon file extensions
                'doc': function (ext) {
                    return ext.match(/(doc|docx)$/i);
                },
                'xls': function (ext) {
                    return ext.match(/(xls|xlsx)$/i);
                },
                'ppt': function (ext) {
                    return ext.match(/(ppt|pptx)$/i);
                },
                'zip': function (ext) {
                    return ext.match(/(zip|rar|tar|gzip|gz|7z)$/i);
                },
                'htm': function (ext) {
                    return ext.match(/(htm|html)$/i);
                },
                'txt': function (ext) {
                    return ext.match(/(txt|ini|csv|java|php|js|css)$/i);
                },
                'mov': function (ext) {
                    return ext.match(/(avi|mpg|mkv|mov|mp4|3gp|webm|wmv)$/i);
                },
                'mp3': function (ext) {
                    return ext.match(/(mp3|wav)$/i);
                }
            }
        });

        var submitIcon = $('.searchbox-icon');
        var inputBox = $('.searchbox-input');
        var searchBox = $('.searchbox');
        var isOpen = false;
        submitIcon.click(function () {
            if (isOpen == false) {
                searchBox.addClass('searchbox-open');
                inputBox.focus();
                isOpen = true;
            } else {
                searchBox.removeClass('searchbox-open');
                inputBox.focusout();
                isOpen = false;
            }
        });
        submitIcon.mouseup(function () {
            return false;
        });
        searchBox.mouseup(function () {
            return false;
        });
        $(document).mouseup(function () {
            if (isOpen == true) {
                $('.searchbox-icon').css('display', 'block');
                submitIcon.click();
            }
        });
    });

    function buttonUp() {
        var inputVal = $('.searchbox-input').val();
        inputVal = $.trim(inputVal).length;
        if (inputVal !== 0) {
            $('.searchbox-icon').css('display', 'none');
        } else {
            $('.searchbox-input').val('');
            $('.searchbox-icon').css('display', 'block');
        }
    }

    /* the Responsive menu script */
    $('body').addClass('js');
    var $menu = $('#menu'),
            $menulink = $('.menu-link'),
            $menuTrigger = $('.has-subnav > a');

    $menulink.click(function (e) {
        e.preventDefault();
        $menulink.toggleClass('active');
        $menu.toggleClass('active');
    });

    var add_toggle_links = function () {
        if ($('.menu-link').is(":visible")) {
            if ($(".toggle-link").length > 0) {
            } else {
                $('.has-subnav > a').before('<span class="toggle-link"> Open submenu </span>');
                $('.toggle-link').click(function (e) {
                    var $this = $(this);
                    $this.toggleClass('active').siblings('ul').toggleClass('active');
                });
            }
        } else {
            $('.toggle-link').empty();
        }
    }
    add_toggle_links();
    $(window).bind("resize", add_toggle_links);

    (function ($) {
        $.fn.menumaker = function (options) {
            var cssmenu = $(this), settings = $.extend({
                format: "dropdown",
                sticky: false
            }, options);
            return this.each(function () {
                $(this).find(".mnu-button").on('click', function () {
                    $(this).toggleClass('menu-opened');
                    var mainmenu = $(this).next('ul');
                    if (mainmenu.hasClass('open')) {
                        mainmenu.slideToggle().removeClass('open');
                    } else {
                        mainmenu.slideToggle().addClass('open');
                        if (settings.format === "dropdown") {
                            mainmenu.find('ul').show();
                        }
                    }
                });
                cssmenu.find('li ul').parent().addClass('has-sub');
                multiTg = function () {
                    cssmenu.find(".has-sub").prepend('<span class="submenu-button"></span>');
                    cssmenu.find('.submenu-button').on('click', function () {
                        $(this).toggleClass('submenu-opened');
                        if ($(this).siblings('ul').hasClass('open')) {
                            $(this).siblings('ul').removeClass('open').slideToggle();
                        } else {
                            $(this).siblings('ul').addClass('open').slideToggle();
                        }
                    });
                };
                if (settings.format === 'multitoggle')
                    multiTg();
                else
                    cssmenu.addClass('dropdown');
                if (settings.sticky === true)
                    cssmenu.css('position', 'fixed');
                resizeFix = function () {
                    var mediasize = 1023;
                    if ($(window).width() > mediasize) {
                        cssmenu.find('ul').show();
                    }
                    if ($(window).width() <= mediasize) {
                        cssmenu.find('ul').hide().removeClass('open');
                    }
                };
                resizeFix();
                return $(window).on('resize', resizeFix);
            });
        };
    })(jQuery);

    (function ($) {
        $(document).ready(function () {
            $("#cssmenu").menumaker({
                format: "multitoggle"
            });
        });
    })(jQuery);


    $('#mnu-btn').click(function ()
    {
        //alert('testing menu');
        $('#js-menu').toggleClass('mnu-active');
    });


</script>


<!-- Dropdown Select -->
<script>
    function cancel(url) {
        window.location = url;
    }
    $(function () {
        $('#planova-bsmultiselect-generated-filter-id-option-droup-demo').keyup(function (e) {
            if (e.keyCode == 13 && $('#planova-bsmultiselect-generated-filter-id-option-droup-demo').val() != '') {
                // if
                var data = $('#planova-bsmultiselect-generated-filter-id-option-droup-demo').val();
                var length = $('.planova-bsmultiselect:eq(0) > ul > li').first().before('<li id="custom" class="badge" style="padding-left: 0px; line-height: 1.5em;"><span>' + data + '</span><button aria-label="Close" tabindex="1" type="button" class="close custom" style="white-space: nowrap; font-size: 1.5em; line-height: 0.9em;"><span aria-hidden="true">×</span></button></li>');

                $('#planova-bsmultiselect-generated-filter-id-option-droup-demo').val('');

                var li_length = $('.planova-bsmultiselect:eq(0) > ul > li').length;
                $('.planova-bsmultiselect:eq(0) > ul:eq(1)').attr('style', 'display:block;');
                for (var i = 0; i < li_length; i++) {

                    $('.planova-bsmultiselect:eq(0) > ul > li:eq(' + i + ')').attr('style', 'display:block;');
                }

            }
            $('.close').click(function () {
                //alert('');
                $(this).parent('li').remove();

            });
        });

        $('.planova-bsmultiselect:eq(1) ul:eq(1)').click(function () {
            $('#planova-bsmultiselect-generated-filter-id-Kanton').val('');
        });


        $('#planova-bsmultiselect-generated-filter-id-option-droup-demo').focusin(function () {
            var li_length = $('.planova-bsmultiselect:eq(0) > ul > li').length;
            $('.planova-bsmultiselect:eq(0) > ul:eq(1)').attr('style', 'display:block;');
            for (var i = 0; i < li_length; i++) {

                $('.planova-bsmultiselect:eq(0) > ul > li:eq(' + i + ')').attr('style', 'display:block;');
            }
        });

    });

    $("#option-droup-demo").change(function () {
        $('#planova-bsmultiselect-generated-filter-id-option-droup-demo').val('');
    });
    $(".multiSelect").bsMultiSelect({
        selectedPanelDefMinHeight: 'calc(2.25rem + 2px)',
        selectedPanelLgMinHeight: 'calc(2.875rem + 2px)',
        selectedPanelSmMinHeight: 'calc(1.8125rem + 2px)',
        selectedPanelDisabledBackgroundColor: '#e9ecef',
        selectedPanelFocusBorderColor: '#80bdff',
        selectedPanelFocusBoxShadow: '0 0 0 0.2rem rgba(0, 123, 255, 0.25)',
        selectedPanelFocusValidBoxShadow: '0 0 0 0.2rem rgba(40, 167, 69, 0.25)',
        selectedPanelFocusInvalidBoxShadow: '0 0 0 0.2rem rgba(220, 53, 69, 0.25)',
        filterInputColor: '#495057',
        selectedItemContentDisabledOpacity: '.65',
        dropdDownLabelDisabledColor: '#6c757d',
        containerClass: 'planova-bsmultiselect',
        dropDownClass: 'planova-dropdown-menu',
        dropDownItemClass: 'px-2',
        dropDownItemHoverClass: 'bg-light',
        selectedPanelClass: 'form-control',
        selectedItemClass: 'badge',
        removeSelectedItemButtonClass: 'close',
        filterInputItemClass: '',
        filterInputClass: ''
    });
    /*$(".autocomplete").autocomplete({
     source: bsMultiSelect
     });*/

</script>
</body>
</html>
