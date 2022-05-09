<?php 
$currentUrl = implode('/',\App::parseUrl());
?>
<style>
    @media (max-width: 991px) {
        #headerSlider {
            display: none !important;
        }
    }

    @media (min-width: 767px) and (max-width: 991px) {
        .head-search {
            display: none !important;
        }
    }
    .grecaptcha-badge { visibility: hidden; }
</style>
<header id="header" class="header-style-1">
    <div class="header-top-bar">
        <div class="container">
            <div class="row row-no-padding">
                <div class="col-md-9" style="padding-left:5px;padding-right:0px;">
                    <!-- Header Language -->
                    <div class="breaking-news">   
                        <div class="breaking-title" style="width:15%;">
                            <p>Job-Ticker</p>
                        </div>

                        <div id="news-carousel" class="carousel slide" style="width:85%;" data-ride="carousel">
                            <!-- Wrapper For News Slides -->
                            <ul class="carousel-inner" style="padding-left:0px;">

                                <?php
                                $newsFeedClass = 'active';
                                foreach ($arrNewJobs as $feedJobs) {
                                    ?>
                                    <li class="item <?= $newsFeedClass ?>">
                                        <a href="/Vacancyboard/Detail/<?= $feedJobs['vac_info_id'] ?>"><?= $feedJobs['jobtitle'] ?> in <?= $feedJobs['city'] ?></a>
                                    </li>
                                    <?php
                                    $newsFeedClass = '';
                                }
                                ?>
                            </ul>


                            <!-- News Carousel Controls -->
                            <div class="customNavigation news-control">
                                <a class="next" href="#news-carousel" data-slide="next">
                                    <i class="fa fa-angle-right"></i>
                                </a>
                                <a class="prev" href="#news-carousel" data-slide="prev">
                                    <i class="fa fa-angle-left"></i>
                                </a>
                            </div>

                        </div>
                    </div>
                </div>

                <!-- Header Register -->
                <div class="col-md-3">
                    <?php
                    if (isset($_SESSION['logged']) && ($_SESSION['logged'] == true)) {
                        ?>
                        <div class="header-register">
                            <a href="/Candidate/Dashboard" class="btn btn-link">my [aha]</a>
                        </div> <!-- end .header-register -->

                        <!-- Header Login -->
                        <div class="header-login">
                            <a href="/Candidate/loggout" class="btn btn-link">Abmelden</a>
                        </div> <!-- end .header-login -->
                        
                        <?php } else{?>
                        <div class="header-register">
                            <a href="/Candidate/registerWizard" class="btn btn-link">Registrieren</a>
                        </div> <!-- end .header-register -->

                        <!-- Header Login -->
                        <div class="header-login">
                            <a href="/Candidate/login" class="btn btn-link">Login</a>
                        </div> <!-- end .header-login -->
                        <?php } ?>
                    </div>
                </div>
            </div> <!-- end .container -->
        </div> <!-- end .header-top-bar -->

        <div class="header-nav-bar">
            <div class="container">

                <!-- Logo -->
                <div class="css-table logo">
                    <div class="css-table-cell">
                        <a href="/">
                            <img width="150px" height="100px" src="<?= WEB_URL ?>/tmpl_ahapersonal/aha.jpg" alt="">
                        </a> <!-- end .logo -->
                    </div>
                </div>

                <!-- Mobile Menu Toggle --> 
                <a href="#" id="mobile-menu-toggle"><span></span></a>

                <!-- Primary Nav --> 
                <nav>
                    <ul class="primary-nav">
                        <li <?='home' == $currentUrl || empty($currentUrl) ? 'class="active"' : ''?>><a href="/home">Home</a></li>
                        <li class="has-submenu<?=in_array($currentUrl,array('Pages/companydivisions','Pages/companyService')) ? ' active' : ''?>">
                            <a href="/Pages/companydivisions">Unternehmen</a>
                            <ul>
                                <li<?=$currentUrl == 'Pages/companydivisions' ? ' class="active"' : ''?>><a href="/Pages/companydivisions">Fachbereiche</a></li>
                                <li<?=$currentUrl == 'Pages/companyService' ? ' class="active"' : ''?>><a href="/Pages/companyService#tryandhire">Try & Hire</a></li>
                                <li<?=$currentUrl == 'Pages/companyService' ? ' class="active"' : ''?>><a href="/Pages/companyService#temporaer">Temporärstellen</a></li>
                                <li<?=$currentUrl == 'Pages/companyService' ? ' class="active"' : ''?>><a href="/Pages/companyService#fest">Festvermittlung</a></li>
                            </ul>
                        </li>
                        <li <?='Vacancyboard' == $currentUrl ? ' class="active"' : ''?>><a href="/Vacancyboard">Stellenangebote</a></li>
                        <li class="has-submenu<?=in_array($currentUrl,array('Pages/candidate','Pages/citizeninfo','Candidate/registerWizard','Candidate/login')) ? ' active' : ''?>">
                            <a href="/Pages/candidate">Bewerber</a>
                            <ul>
                                <li><a href="/Vacancyboard">Stellenangebote</a></li>
                                <li<?='Candidate/registerWizard' == $currentUrl ? ' class="active"' : ''?>><a href="/Candidate/registerWizard">Spontanbewerbung</a></li>
                                <li><a href="/Pages/companydivisions">Fachgebiete</a></li>
                                <li<?=$currentUrl == 'Pages/citizeninfo' ? ' class="active"' : ''?>><a href="/Pages/citizeninfo">EU-Bürger Info</a></li> 
                            <?php
                                if (isset($_SESSION['logged']) && ($_SESSION['logged'] == true)) {
                        ?>
                                <li><a href="/Candidate/loggout">Abmelden</a></li>
                                 <?php } else{?>
                                    <li<?=$currentUrl == 'Candidate/login' ? ' class="active"' : ''?>><a href="/Candidate/login">Login</a></li>
                                 <?php }?>
                            </ul> 
                        </li>
                        <li class="has-submenu<?=in_array($currentUrl,array('Pages/aboutAHA','Pages/swissstaffing','Pages/career')) ? ' active' : ''?>">
                            <a href="/Pages/aboutAHA">Über aha</a>
                            <ul>
                                <li><a href="/Pages/companydivisions">Fachbereiche</a></li>
                                <li<?=$currentUrl == 'Pages/swissstaffing' ? ' class="active"' : ''?>><a href="/Pages/swissstaffing">Qualitätsanspruch</a></li>
                                <li><a href="/Contact">Standorte</a></li>
                                <li<?=$currentUrl == 'Pages/career' ? ' class="active"' : ''?>><a href="/Pages/career">Interne Stellen</a></li>
                            </ul>
                        </li>
                        <li <?='Contact' == $currentUrl ? ' class="active"' : ''?>><a href="/Contact">Kontakt</a></li>
                        <?php if (isset($_SESSION['logged']) && ($_SESSION['logged'] == true)) { ?>
                            <li class="has-submenu<?=in_array($currentUrl,array('Candidate/Dashboard','Candidate/Profile')) ? ' active' : ''?>">
                                <a href="/Candidate/Dashboard">my [aha]</a>
                                <ul>
                                    <li><a href="/Candidate/Profile">Mein Profil</a></li>
                                    <li><a href="/Candidate/Dashboard">Bewerbungsverlauf</a></li>
                                </ul>
                            </li>
                        <?php } ?>
                </ul>
            </nav>
        </div> <!-- end .container -->

        <div id="mobile-menu-container" class="container">
            <div class="login-register"></div>
            <div class="menu"></div>
        </div>         
    </div> <!-- end .header-nav-bar -->