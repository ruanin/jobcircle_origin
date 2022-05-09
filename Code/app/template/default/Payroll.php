<?php
include 'header.php';
$classMyAha = 'active';
$breadcrumb[] = array('title' => 'my [aha]',
    'url' => '/Candidate/Dashboard',
    'active' => false);
$breadcrumb[] = array('title' => 'Lohnabrechnungen',
    'url' => '/Candidate/Payroll',
    'active' => true);
include 'navigation.php';
?>
    <style>
        /* ----------------------------------------------------------------------------------------------------------------*/
        /* ---------->>> global settings needed for thickbox <<<-----------------------------------------------------------*/
        /* ----------------------------------------------------------------------------------------------------------------*/
        * {
            padding: 0;
            margin: 0;
        }

        /* ----------------------------------------------------------------------------------------------------------------*/
        /* ---------->>> thickbox specific link and font settings <<<------------------------------------------------------*/
        /* ----------------------------------------------------------------------------------------------------------------*/
        #TB_window {
            font: 12px Arial, Helvetica, sans-serif;
            color: #333333;
        }

        #TB_secondLine {
            font: 10px Arial, Helvetica, sans-serif;
            color: #666666;
        }

        #TB_window a:link {
            color: #666666;
        }

        #TB_window a:visited {
            color: #666666;
        }

        #TB_window a:hover {
            color: #000;
        }

        #TB_window a:active {
            color: #666666;
        }

        #TB_window a:focus {
            color: #666666;
        }

        /* ----------------------------------------------------------------------------------------------------------------*/
        /* ---------->>> thickbox settings <<<-----------------------------------------------------------------------------*/
        /* ----------------------------------------------------------------------------------------------------------------*/
        #TB_overlay {
            position: fixed;
            z-index: 100;
            top: 0px;
            left: 0px;
            height: 100%;
            width: 100%;
        }

        .TB_overlayMacFFBGHack {
            background: url(macFFBgHack.png) repeat;
        }

        .TB_overlayBG {
            background-color: #000;
            filter: alpha(opacity=75);
            -moz-opacity: 0.75;
            opacity: 0.75;
        }

        * html #TB_overlay { /* ie6 hack */
            position: absolute;
            height: expression(document.body.scrollHeight > document.body.offsetHeight ? document.body.scrollHeight : document.body.offsetHeight + 'px');
        }

        #TB_window {
            position: fixed;
            background: #ffffff;
            z-index: 102;
            color: #000000;
            display: none;
            border: 4px solid #525252;
            text-align: left;
            top: 0%;
            left: 50%;
        }

        * html #TB_window { /* ie6 hack */
            position: absolute;
            margin-top: expression(0 - parseInt(this.offsetHeight / 2) + (TBWindowMargin = document.documentElement && document.documentElement.scrollTop || document.body.scrollTop) + 'px');
        }

        #TB_window img#TB_Image {
            display: block;
            margin: 15px 0 0 15px;
            border-right: 1px solid #ccc;
            border-bottom: 1px solid #ccc;
            border-top: 1px solid #666;
            border-left: 1px solid #666;
        }

        #TB_caption {
            height: 25px;
            padding: 7px 30px 10px 25px;
            float: left;
        }

        #TB_closeWindow {
            height: 25px;
            padding: 11px 25px 10px 0;
            float: right;
        }

        #TB_closeAjaxWindow {
            padding: 7px 10px 5px 0;
            margin-bottom: 1px;
            text-align: right;
            float: right;
        }

        #TB_ajaxWindowTitle {
            float: left;
            padding: 7px 0 5px 10px;
            margin-bottom: 1px;
        }

        #TB_title {
            background-color: #e8e8e8;
            height: 27px;
        }

        #TB_ajaxContent {
            clear: both;
            padding: 2px 15px 15px 15px;
            overflow: auto;
            text-align: left;
            line-height: 1.4em;
        }

        #TB_ajaxContent.TB_modal {
            padding: 15px;
        }

        #TB_ajaxContent p {
            padding: 5px 0px 5px 0px;
        }

        #TB_load {
            position: fixed;
            display: none;
            height: 13px;
            width: 208px;
            z-index: 103;
            top: 50%;
            left: 50%;
            margin: -6px 0 0 -104px; /* -height/2 0 0 -width/2 */
        }

        * html #TB_load { /* ie6 hack */
            position: absolute;
            margin-top: expression(0 - parseInt(this.offsetHeight / 2) + (TBWindowMargin = document.documentElement && document.documentElement.scrollTop || document.body.scrollTop) + 'px');
        }

        #TB_HideSelect {
            z-index: 99;
            position: fixed;
            top: 0;
            left: 0;
            background-color: #fff;
            border: none;
            filter: alpha(opacity=0);
            -moz-opacity: 0;
            opacity: 0;
            height: 100%;
            width: 100%;
        }

        * html #TB_HideSelect { /* ie6 hack */
            position: absolute;
            height: expression(document.body.scrollHeight > document.body.offsetHeight ? document.body.scrollHeight : document.body.offsetHeight + 'px');
        }

        #TB_iframeContent {
            clear: both;
            border: none;
            margin-bottom: -1px;
            margin-top: 1px;
            _margin-bottom: 1px;
        }
    </style>
    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.js"></script>
    <script type="text/javascript">/*
 * Thickbox 3.1 - One Box To Rule Them All.
 * By Cody Lindley (http://www.codylindley.com)
 * Copyright (c) 2007 cody lindley
 * Licensed under the MIT License: http://www.opensource.org/licenses/mit-license.php
*/

        var tb_pathToImage = "images/loadingAnimation.gif";

        /*!!!!!!!!!!!!!!!!! edit below this line at your own risk !!!!!!!!!!!!!!!!!!!!!!!*/

        //on page load call tb_init
        $(document).ready(function () {
            tb_init('a.thickbox, area.thickbox, input.thickbox');//pass where to apply thickbox
            imgLoader = new Image();// preload image
            imgLoader.src = tb_pathToImage;
        });

        //add thickbox to href & area elements that have a class of .thickbox
        function tb_init(domChunk) {
            $(domChunk).click(function () {
                var t = this.title || this.name || null;
                var a = this.href || this.alt;
                var g = this.rel || false;
                tb_show(t, a, g);
                this.blur();
                return false;
            });
        }

        function tb_show(caption, url, imageGroup) {//function called when the user clicks on a thickbox link

            try {
                if (typeof document.body.style.maxHeight === "undefined") {//if IE 6
                    $("body", "html").css({height: "100%", width: "100%"});
                    $("html").css("overflow", "hidden");
                    if (document.getElementById("TB_HideSelect") === null) {//iframe to hide select elements in ie6
                        $("body").append("<iframe id='TB_HideSelect'></iframe><div id='TB_overlay'></div><div id='TB_window'></div>");
                        $("#TB_overlay").click(tb_remove);
                    }
                } else {//all others
                    if (document.getElementById("TB_overlay") === null) {
                        $("body").append("<div id='TB_overlay'></div><div id='TB_window'></div>");
                        $("#TB_overlay").click(tb_remove);
                    }
                }

                if (tb_detectMacXFF()) {
                    $("#TB_overlay").addClass("TB_overlayMacFFBGHack");//use png overlay so hide flash
                } else {
                    $("#TB_overlay").addClass("TB_overlayBG");//use background and opacity
                }

                if (caption === null) {
                    caption = "";
                }
                $("body").append("<div id='TB_load'><img src='" + imgLoader.src + "' /></div>");//add loader to the page
                $('#TB_load').show();//show loader

                var baseURL;
                if (url.indexOf("?") !== -1) { //ff there is a query string involved
                    baseURL = url.substr(0, url.indexOf("?"));
                } else {
                    baseURL = url;
                }

                var urlString = /\.jpg$|\.jpeg$|\.png$|\.gif$|\.bmp$/;
                var urlType = baseURL.toLowerCase().match(urlString);

                if (urlType == '.jpg' || urlType == '.jpeg' || urlType == '.png' || urlType == '.gif' || urlType == '.bmp') {//code to show images

                    TB_PrevCaption = "";
                    TB_PrevURL = "";
                    TB_PrevHTML = "";
                    TB_NextCaption = "";
                    TB_NextURL = "";
                    TB_NextHTML = "";
                    TB_imageCount = "";
                    TB_FoundURL = false;
                    if (imageGroup) {
                        TB_TempArray = $("a[@rel=" + imageGroup + "]").get();
                        for (TB_Counter = 0; ((TB_Counter < TB_TempArray.length) && (TB_NextHTML === "")); TB_Counter++) {
                            var urlTypeTemp = TB_TempArray[TB_Counter].href.toLowerCase().match(urlString);
                            if (!(TB_TempArray[TB_Counter].href == url)) {
                                if (TB_FoundURL) {
                                    TB_NextCaption = TB_TempArray[TB_Counter].title;
                                    TB_NextURL = TB_TempArray[TB_Counter].href;
                                    TB_NextHTML = "<span id='TB_next'>&nbsp;&nbsp;<a href='#'>Next &gt;</a></span>";
                                } else {
                                    TB_PrevCaption = TB_TempArray[TB_Counter].title;
                                    TB_PrevURL = TB_TempArray[TB_Counter].href;
                                    TB_PrevHTML = "<span id='TB_prev'>&nbsp;&nbsp;<a href='#'>&lt; Prev</a></span>";
                                }
                            } else {
                                TB_FoundURL = true;
                                TB_imageCount = "Image " + (TB_Counter + 1) + " of " + (TB_TempArray.length);
                            }
                        }
                    }

                    imgPreloader = new Image();
                    imgPreloader.onload = function () {
                        imgPreloader.onload = null;

                        // Resizing large images - orginal by Christian Montoya edited by me.
                        var pagesize = tb_getPageSize();
                        var x = pagesize[0] - 150;
                        var y = pagesize[1] - 150;
                        var imageWidth = imgPreloader.width;
                        var imageHeight = imgPreloader.height;
                        if (imageWidth > x) {
                            imageHeight = imageHeight * (x / imageWidth);
                            imageWidth = x;
                            if (imageHeight > y) {
                                imageWidth = imageWidth * (y / imageHeight);
                                imageHeight = y;
                            }
                        } else if (imageHeight > y) {
                            imageWidth = imageWidth * (y / imageHeight);
                            imageHeight = y;
                            if (imageWidth > x) {
                                imageHeight = imageHeight * (x / imageWidth);
                                imageWidth = x;
                            }
                        }
                        // End Resizing

                        TB_WIDTH = imageWidth + 30;
                        TB_HEIGHT = imageHeight + 60;
                        $("#TB_window").append("<a href='' id='TB_ImageOff' title='Close'><img id='TB_Image' src='" + url + "' width='" + imageWidth + "' height='" + imageHeight + "' alt='" + caption + "'/></a>" + "<div id='TB_caption'>" + caption + "<div id='TB_secondLine'>" + TB_imageCount + TB_PrevHTML + TB_NextHTML + "</div></div><div id='TB_closeWindow'><a href='#' id='TB_closeWindowButton' title='Close'>close</a> or Esc Key</div>");

                        $("#TB_closeWindowButton").click(tb_remove);

                        if (!(TB_PrevHTML === "")) {
                            function goPrev() {
                                if ($(document).unbind("click", goPrev)) {
                                    $(document).unbind("click", goPrev);
                                }
                                $("#TB_window").remove();
                                $("body").append("<div id='TB_window'></div>");
                                tb_show(TB_PrevCaption, TB_PrevURL, imageGroup);
                                return false;
                            }

                            $("#TB_prev").click(goPrev);
                        }

                        if (!(TB_NextHTML === "")) {
                            function goNext() {
                                $("#TB_window").remove();
                                $("body").append("<div id='TB_window'></div>");
                                tb_show(TB_NextCaption, TB_NextURL, imageGroup);
                                return false;
                            }

                            $("#TB_next").click(goNext);

                        }

                        document.onkeydown = function (e) {
                            if (e == null) { // ie
                                keycode = event.keyCode;
                            } else { // mozilla
                                keycode = e.which;
                            }
                            if (keycode == 27) { // close
                                tb_remove();
                            } else if (keycode == 190) { // display previous image
                                if (!(TB_NextHTML == "")) {
                                    document.onkeydown = "";
                                    goNext();
                                }
                            } else if (keycode == 188) { // display next image
                                if (!(TB_PrevHTML == "")) {
                                    document.onkeydown = "";
                                    goPrev();
                                }
                            }
                        };

                        tb_position();
                        $("#TB_load").remove();
                        $("#TB_ImageOff").click(tb_remove);
                        $("#TB_window").css({display: "block"}); //for safari using css instead of show
                    };

                    imgPreloader.src = url;
                } else {//code to show html

                    var queryString = url.replace(/^[^\?]+\??/, '');
                    var params = tb_parseQuery(queryString);

                    TB_WIDTH = (params['width'] * 1) + 30 || 630; //defaults to 630 if no paramaters were added to URL
                    TB_HEIGHT = (params['height'] * 1) + 40 || 440; //defaults to 440 if no paramaters were added to URL
                    ajaxContentW = TB_WIDTH - 30;
                    ajaxContentH = TB_HEIGHT - 45;

                    if (url.indexOf('TB_iframe') != -1) {// either iframe or ajax window
                        urlNoQuery = url.split('TB_');
                        $("#TB_iframeContent").remove();
                        if (params['modal'] != "true") {//iframe no modal
                            $("#TB_window").append("<div id='TB_title'><div id='TB_ajaxWindowTitle'>" + caption + "</div><div id='TB_closeAjaxWindow'><a href='#' id='TB_closeWindowButton' title='Close'>Schliessen</a></div></div><iframe frameborder='0' hspace='0' src='" + urlNoQuery[0] + "' id='TB_iframeContent' name='TB_iframeContent" + Math.round(Math.random() * 1000) + "' onload='tb_showIframe()' style='width:" + (ajaxContentW + 29) + "px;height:" + (ajaxContentH + 17) + "px;' > </iframe>");
                        } else {//iframe modal
                            $("#TB_overlay").unbind();
                            $("#TB_window").append("<iframe frameborder='0' hspace='0' src='" + urlNoQuery[0] + "' id='TB_iframeContent' name='TB_iframeContent" + Math.round(Math.random() * 1000) + "' onload='tb_showIframe()' style='width:" + (ajaxContentW + 29) + "px;height:" + (ajaxContentH + 17) + "px;'> </iframe>");
                        }
                    } else {// not an iframe, ajax
                        if ($("#TB_window").css("display") != "block") {
                            if (params['modal'] != "true") {//ajax no modal
                                $("#TB_window").append("<div id='TB_title'><div id='TB_ajaxWindowTitle'>" + caption + "</div><div id='TB_closeAjaxWindow'><a href='#' id='TB_closeWindowButton'>Schliessen</a>/div></div><div id='TB_ajaxContent' style='width:" + ajaxContentW + "px;height:" + ajaxContentH + "px'></div>");
                            } else {//ajax modal
                                $("#TB_overlay").unbind();
                                $("#TB_window").append("<div id='TB_ajaxContent' class='TB_modal' style='width:" + ajaxContentW + "px;height:" + ajaxContentH + "px;'></div>");
                            }
                        } else {//this means the window is already up, we are just loading new content via ajax
                            $("#TB_ajaxContent")[0].style.width = ajaxContentW + "px";
                            $("#TB_ajaxContent")[0].style.height = ajaxContentH + "px";
                            $("#TB_ajaxContent")[0].scrollTop = 0;
                            $("#TB_ajaxWindowTitle").html(caption);
                        }
                    }

                    $("#TB_closeWindowButton").click(tb_remove);

                    if (url.indexOf('TB_inline') != -1) {
                        $("#TB_ajaxContent").append($('#' + params['inlineId']).children());
                        $("#TB_window").unload(function () {
                            $('#' + params['inlineId']).append($("#TB_ajaxContent").children()); // move elements back when you're finished
                        });
                        tb_position();
                        $("#TB_load").remove();
                        $("#TB_window").css({display: "block"});
                    } else if (url.indexOf('TB_iframe') != -1) {
                        tb_position();
                        if ($.browser.safari) {//safari needs help because it will not fire iframe onload
                            $("#TB_load").remove();
                            $("#TB_window").css({display: "block"});
                        }
                    } else {
                        $("#TB_ajaxContent").load(url += "&random=" + (new Date().getTime()), function () {//to do a post change this load method
                            tb_position();
                            $("#TB_load").remove();
                            tb_init("#TB_ajaxContent a.thickbox");
                            $("#TB_window").css({display: "block"});
                        });
                    }

                }

                if (!params['modal']) {
                    document.onkeyup = function (e) {
                        if (e == null) { // ie
                            keycode = event.keyCode;
                        } else { // mozilla
                            keycode = e.which;
                        }
                        if (keycode == 27) { // close
                            tb_remove();
                        }
                    };
                }

            } catch (e) {
                //nothing here
            }
        }

        //helper functions below
        function tb_showIframe() {
            $("#TB_load").remove();
            $("#TB_window").css({display: "block"});
        }

        function tb_remove() {
            $("#TB_imageOff").unbind("click");
            $("#TB_closeWindowButton").unbind("click");
            $("#TB_window").fadeOut("fast", function () {
                $('#TB_window,#TB_overlay,#TB_HideSelect').trigger("unload").unbind().remove();
            });
            $("#TB_load").remove();
            if (typeof document.body.style.maxHeight == "undefined") {//if IE 6
                $("body", "html").css({height: "auto", width: "auto"});
                $("html").css("overflow", "");
            }
            document.onkeydown = "";
            document.onkeyup = "";
            return false;
        }

        function tb_position() {
            $("#TB_window").css({marginLeft: '-' + parseInt((TB_WIDTH / 2), 10) + 'px', width: TB_WIDTH + 'px'});
            if (!(jQuery.browser.msie && jQuery.browser.version < 7)) { // take away IE6
                $("#TB_window").css({marginTop: '-' + parseInt((TB_HEIGHT / 2), 10) + 'px'});
            }
        }

        function tb_parseQuery(query) {
            var Params = {};
            if (!query) {
                return Params;
            }// return empty object
            var Pairs = query.split(/[;&]/);
            for (var i = 0; i < Pairs.length; i++) {
                var KeyVal = Pairs[i].split('=');
                if (!KeyVal || KeyVal.length != 2) {
                    continue;
                }
                var key = unescape(KeyVal[0]);
                var val = unescape(KeyVal[1]);
                val = val.replace(/\+/g, ' ');
                Params[key] = val;
            }
            return Params;
        }

        function tb_getPageSize() {
            var de = document.documentElement;
            var w = window.innerWidth || self.innerWidth || (de && de.clientWidth) || document.body.clientWidth;
            var h = window.innerHeight || self.innerHeight || (de && de.clientHeight) || document.body.clientHeight;
            arrayPageSize = [w, h];
            return arrayPageSize;
        }

        function tb_detectMacXFF() {
            var userAgent = navigator.userAgent.toLowerCase();
            if (userAgent.indexOf('mac') != -1 && userAgent.indexOf('firefox') != -1) {
                return true;
            }
        }


    </script>
    <div class="header-page-title">
        <div class="container">
            <h1>Lohnabrechnungen</h1>

            <ul class="breadcrumbs">
                <li><a href="#">Home</a></li>
                <?php for ($i = 0; $i < count($breadcrumb); $i++) {

                    if ($breadcrumb[$i]['active'] == true) {
                        $breadcrumbClass = 'class="active"';
                        $breadcrumbTitle = $breadcrumb[$i]['title'];
                    } else {
                        $breadcrumbClass = '';
                        $breadcrumbTitle = '<a href="' . $breadcrumb[$i]['url'] . '">' . $breadcrumb[$i]['title'] . '</a>';

                    }

                    ?>
                    <li <?= $breadcrumbClass ?>><?= $breadcrumbTitle ?></li>
                <?php } ?>
            </ul>
        </div>
    </div>
    </header>
    <div class="page-content">
        <div class="container">
            <div class="row">
                <?php include 'MyAhaNavigation.php'; ?>
                <div class="col-md-12 page-content none-padding">
                    <div class="row">
                        <div class="col-md-12">
                            <?php if (!empty($data['payrollFiles'])) { ?>
                                <div class="table-responsive">
                                    <table class="table table-bordered table-striped">
                                        <thead>
                                        <tr>
                                            <th>Vertragsnummer</th>
                                            <th>Definitiv/Provisorisch</th>
                                            <th>Jahr</th>
                                            <th>Monat</th>
                                            <th></th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <?php foreach ($data['payrollFiles'] as $year => $yearData) {
                                            foreach ($yearData as $month => $monthData) {
                                                foreach ($monthData as $monthKey => $fileData) {
                                                    $arrFileName = explode('_', $fileData['filename']); ?>

                                                    <tr>
                                                        <td><?= $arrFileName[4] ?></td>
                                                        <td><?= $arrFileName[1] ?></td>
                                                        <td><?= $arrFileName[6] ?></td>
                                                        <td><?= $arrFileName[5] ?></td>
                                                        <td style="text-align:center;">
                                                            <a class="btn btn-default" data-fancybox data-type="iframe" data-caption="<?= $fileData['filename'] ?>.<?= $fileData['extension'] ?>"
                                                               data-src="<?= WEB_URL ?>/Candidate/viewPayRollFile?fileName=<?= $fileData['filename'] ?>.<?= $fileData['extension'] ?>"
                                                               href="javascript:;"
                                                               style="target-new: tab;"
                                                               title="Vertrag <?= $arrFileName[5] ?>: Lohnabrechnung <?= $arrFileName[6] ?> <?= $arrFileName[7] ?>">
                                                                <i class="fa fa-eye" style="margin-right:0px;"></i></a>
                                                            <a class="btn btn-default"
                                                               style="margin-left:5px;"
                                                               href="<?= WEB_URL ?>/Candidate/viewPayRollFile?fileName=<?= $fileData['filename'] ?>.<?= $fileData['extension'] ?>&fileDownload=1"
                                                               title="Vertrag <?= $arrFileName[5] ?>: Lohnabrechnung <?= $arrFileName[6] ?> <?= $arrFileName[7] ?>"><i
                                                                        class="fa fa-download"
                                                                        style="margin-right:0px;"></i></a>
                                                        </td>
                                                    </tr>

                                                <?php }
                                            }
                                        }
                                        ?>
                                        </tbody>
                                    </table>
                                </div>
                            <?php } else { ?>
                                <div class="alert alert-info">Es sind keine Lohnabrechnungen vorhanden.</div>
                            <?php } ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php include 'footer.php'; ?>