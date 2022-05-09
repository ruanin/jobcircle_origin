<?php
$classVacancy = '';
$classSubPageVacancyboard = '';
$classHome = '';
$breadcrumb = array();
$classAbout = $classSubPageSwissStaffing = '';
$classCandidate = $classSubPageCitizen = $classSubPageAnonymApply = '';
$classCompany = $classSubPageCompanyService = $classSubPageDivisions = '';
$classMyPlanova = $classSubPageCareer = '';
$classContact = '';
if (isset($_SERVER["HTTPS"])) {
    $http = 'https://';
} else {
    $http = 'http://';
}

if (!isset($headerTitle) || empty($headerTitle)) {
    $headerTitle = 'planova human capital ag - vermittelt Temporär- und Feststellen';
}
?>
<!DOCTYPE html>
<!--[if lt IE 7]>
<html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>
<html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>
<html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!-->
<html class="no-js"> <!--<![endif]-->
<head>
    <meta charset="utf-8"/>
    <title><?= $headerTitle ?></title>
    <meta name="description"
          content="planova vermittelt Temporär- und Feststellen aus den Fachbereichen Bau, Technik und Industrie."/>
    <meta name="language" content="de"/>
    <!-- This styles only adds some repairs on idevices  -->
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1"/>
    <!-- Favicon -->
    <link rel="shortcut icon" href="<?= WEB_URL ?>/tmpl_planova/img/favicon.ico"/>
    <!-- Roboto Condensed Webfont -->
    <link href='<?= $http ?>fonts.googleapis.com/css?family=Roboto+Condensed:300italic,400italic,400,300,700'
          rel='stylesheet' type='text/css'>
    <!-- Font Awesome CSS -->
    <link rel="stylesheet" href="/tmpl_planova/css/fontawesome.css"/>
    <link rel="stylesheet" href="/tmpl_planova/css/brands.css"/>
    <link rel="stylesheet" href="/tmpl_planova/css/solid.css"/>
    <link rel="stylesheet" href="/tmpl_planova/css/regular.css"/>
    <!-- Normalize CSS -->
    <link rel="stylesheet" href="<?= WEB_URL ?>/tmpl_planova/css/normalize.css"/>
    <!-- Owl Carousel CSS -->
    <link href="<?= WEB_URL ?>/tmpl_planova/css/owl.carousel.css" rel="stylesheet" media="screen">
    <!-- REVOLUTION BANNER CSS SETTINGS -->
    <link rel="stylesheet" type="text/css" href="<?= WEB_URL ?>/tmpl_planova/rs-plugin/css/settings.css"
          media="screen"/>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="<?= WEB_URL ?>/tmpl_planova/css/cookieconsent.css"/>
    <link rel="stylesheet" href="<?= WEB_URL ?>/tmpl_planova/css/bootstrap.min.css"/>
    <link rel="stylesheet" href="<?= WEB_URL ?>/tmpl_planova/css/offcanvas.css"/>
    <!-- Main CSS -->
    <link rel="stylesheet" href="<?= WEB_URL ?>/tmpl_planova/css/style.css"/>
    <link rel="stylesheet" href="<?= WEB_URL ?>/tmpl_planova/css/magazine.css">
    <!-- Responsive Framework -->
    <!--		<link href="<?= WEB_URL ?>/tmpl_planova/css/responsive.css" rel="stylesheet" media="screen" /> -->
    <link href="<?= WEB_URL ?>/tmpl_planova/css/mediaelementplayer.css" rel="stylesheet">
    <link rel="stylesheet" href="<?= WEB_URL ?>/tmpl_planova/css/wizard.css"> 
    <link rel="stylesheet" href="<?= WEB_URL ?>/tmpl_planova/css/fileinput.min.css" media="all" type="text/css" />
    <link rel="stylesheet" href="<?= WEB_URL ?>/tmpl_planova/themes/explorer/theme.css" >
    <script src="https://www.google.com/recaptcha/api.js?render=<?=RECAPTCHA_SITE_KEY?>"></script>
    <!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
    <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <script src="<?=WEB_URL?>/tmpl_planova/js/respond.min.js"></script>

    <![endif]-->
</head>
<!-- Begin Cookie Consent plugin by Silktide - http://silktide.com/cookieconsent -->
<script type="text/javascript">
    // window.cookieconsent_options = {"message":"Diese Website verwendet Cookies. Mit der Nutzung der Website akzeptieren Sie die Verwendung von Cookies.","dismiss":"Akzeptieren","learnMore":"weitere Informationen","link":"/Pages/datenschutz","theme":"dark-bottom"};
    window.addEventListener("load", function () {
        window.cookieconsent.initialise({
            "palette": {
                "popup": {
                    "background": "#363636"
                },
                "button": {
                    "background": "#F60A0D"
                }
            },
            "theme": "classic",
            "content": {
                "message": "Diese Website verwendet Cookies. Mit der Nutzung der Website akzeptieren Sie die Verwendung von Cookies.",
                "dismiss": "Akzeptieren",
                "link": "Weitere Informationen",
                "href": "/Pages/datenschutz"
            }
        })
    });
</script>

<script type="text/javascript"
        src="//cdnjs.cloudflare.com/ajax/libs/cookieconsent2/3.1.0/cookieconsent.min.js"></script>
<!-- End Cookie Consent plugin -->

<body>