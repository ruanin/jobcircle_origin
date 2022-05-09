<?php 
$currentUrl = implode('/',\App::parseUrl());
?>
<style>
    .grecaptcha-badge { visibility: hidden; }
</style>
<div class="header-wrapper">
    <div class="header">
        <div class="header-top">
            <div class="container">
                <div class="header-brand">
                    <div class="header-logo">
                        <img src="<?=WEB_URL?>/tmpl_brefis/img/logo.jpg" />
                    </div><!-- /.header-logo-->
                </div><!-- /.header-brand -->
                <div>
                <div class="breaking-news" style="width:100%;">
                    <div class="breaking-title" style="width:12%;">
                        <p>Job-Ticker</p>
                    </div>
                    <div id="news-carousel" class="carousel slide" style="width:77%;padding-left:0px !important; padding-right:0px !important;" data-ride="carousel">
                        <!-- Wrapper For News Slides -->
                        <ul class="carousel-inner" style="padding-left:0px !important;">
                            <?php 
                            $newsFeedClass = 'active';
                            foreach ($arrNewJobs as $feedJobs) { ?>
                                <li class="item <?= $newsFeedClass ?>">
                                    <a href="/Vacancyboard/Detail/<?= $feedJobs['vac_info_id'] ?>"><?= $feedJobs['jobtitle'] ?> in <?= $feedJobs['city'] ?></a>
                                </li>
                                <?php
                                $newsFeedClass = '';
                            }
                            ?>
                        </ul>

                        <!-- News Carousel Controls -->
                        <div class="customHeaderNavigation news-control">
                            <a class="next" href="#news-carousel" data-slide="next">
                                <i class="fa fa-angle-right"></i>
                            </a>
                            <a class="prev" href="#news-carousel" data-slide="prev">
                                <i class="fa fa-angle-left"></i>
                            </a>
                        </div>
                    </div>
                </div>
                <div style="clear:both;"></div>
                <div id="actionButtons" style="white-space: nowrap;float:right;margin: -30px 0px 0px 0px;padding: 0px 10px;">
                    <?php  if (isset($_SESSION['logged']) && ($_SESSION['logged'] == true)){ ?>
                        <a class="btn btn-secondary" href='/Candidate/loggout'><i class="fa fa-sign-out"></i> Abmelden</a>
                        <!-- Registration button -->
                        <a class="btn btn-secondary" href='/Candidate/register'><i class="fa fa-user"></i> my brefis</a>
                    <?php } else{?>
                        <a class="btn btn-secondary" href='/Candidate/login'><i class="fa fa-sign-in"></i> Anmelden</a>
                        <!-- Registration button -->
                        <a class="btn btn-secondary" href='/Candidate/registerWizard'><i class="fa fa-lock"></i> Registrieren</a>
                    <?php } ?><!-- Login Modal -->
                </div>
                <button class="navbar-toggle collapsed" type="button" data-toggle="collapse" data-target=".header-nav">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                </div>
            </div><!-- /.container -->
        </div><!-- /.header-top -->

        <div class="header-bottom">
            <div class="container">
                <ul class="header-nav nav nav-pills collapse">
                    <li <?='home' == $currentUrl || empty($currentUrl) ? 'class="active"' : ''?>><a href="/home">Home</a></li>
                    <li class="<?=in_array($currentUrl,array('Pages/companydivisions','Pages/companyService')) ? ' active' : ''?>">
                        <a href="/Pages/companydivisions">Unternehmen <i class="fa fa-chevron-down"></i></a>
                        <ul class="sub-menu">
                            <li<?=$currentUrl == 'Pages/companydivisions' ? ' class="active"' : ''?>><a href="/Pages/companydivisions">Fachbereiche</a></li>
                            <li<?=$currentUrl == 'Pages/companyService' ? ' class="active"' : ''?>><a href="/Pages/companyService#tryandhire">Try & Hire</a></li>
                            <li<?=$currentUrl == 'Pages/companyService' ? ' class="active"' : ''?>><a href="/Pages/companyService#temporaer">Temporärstellen</a></li>
                            <li<?=$currentUrl == 'Pages/companyService' ? ' class="active"' : ''?>><a href="/Pages/companyService#fest">Festvermittlung</a></li>
                        </ul>
                    </li>
                    <li <?='Vacancyboard' == $currentUrl ? ' class="active"' : ''?>><a href="/Vacancyboard">Stellenangebote</a></li>
                    <li class="<?=in_array($currentUrl,array('Pages/candidate','Pages/citizeninfo')) ? ' active' : ''?>">
                        <a href="/Pages/candidate">Bewerber <i class="fa fa-chevron-down"></i></a>
                        <ul class="sub-menu">
                            <li><a href="/Vacancyboard">Stellenangebote</a></li>
                            <li<?='Candidate/registerWizard' == $currentUrl ? ' class="active"' : ''?>><a href="/Candidate/registerWizard">Spontanbewerbung</a></li>
                            <li><a href="/Pages/companydivisions">Fachgebiete</a></li>
                            <li<?=$currentUrl == 'Pages/citizeninfo' ? ' class="active"' : ''?>><a href="/Pages/citizeninfo">EU-Bürger Info</a></li>
                            <?php if (isset($_SESSION['logged']) && ($_SESSION['logged'] == true)) { ?>
                                <li><a href="/Candidate/loggout">Abmelden</a></li>
                            <?php } else{?>
                                <li<?=$currentUrl == 'Candidate/login' ? ' class="active"' : ''?>><a href="/Candidate/login">Login</a></li>
                            <?php }?>
                        </ul>
                    </li>
                    <li class="<?=in_array($currentUrl,array('Pages/aboutbrefis','Pages/swissstaffing','Pages/career')) ? ' active' : ''?>">
                        <a href="/Pages/aboutbrefis">Über brefis <i class="fa fa-chevron-down"></i></a>
                        <ul class="sub-menu">
                            <li><a href="/Pages/companydivisions">Fachbereiche</a></li>
                            <li<?=$currentUrl == 'Pages/swissstaffing' ? ' class="active"' : ''?>><a href="/Pages/swissstaffing">Qualitätsanspruch</a></li>
                            <li<?=$currentUrl == 'Pages/career' ? ' class="active"' : ''?>><a href="/Pages/career">Karriere</a></li>
                        </ul>
                    </li>
                    <li <?='Contact' == $currentUrl ? ' class="active"' : ''?>><a href="/Contact">Kontakt</a></li>
                    <?php  if(isset($_SESSION['logged']) && ($_SESSION['logged'] == true)){ ?>
                        <li class="<?=in_array($currentUrl,array('Candidate/Dashboard','Candidate/Profile')) ? ' active' : ''?>" >
                            <a href="/Candidate/Dashboard">my brefis<b class="caret"></b></a>
                                    <ul class="sub-menu">
                                        <li><a href="/Candidate/Profile">Mein Profil</a></li>
                                        <li><a href="/Candidate/Dashboard">Bewerbungsverlauf</a></li>

                                    </ul>
                        </li>
                     <?php   } ?>
                </ul>
            </div><!-- /.container -->
        </div><!-- /.header-bottom -->
    </div><!-- /.header -->
</div><!-- /.header-wrapper-->
    <div class="main-wrapper">
        <div class="main">
