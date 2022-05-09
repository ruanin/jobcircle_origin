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
<div class="wrapper">
    <div class="row row-offcanvas row-offcanvas-left">
        <!--[if lt IE 7]>
        <p class="browsehappy">You are using an <strong>outdated</strong> browser. Please <a
                href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->
        <div class="inner-wrapper">
            <div class="header-top">
                <div class="container">
                    <div class="row">
                        <div class="col-md-3 col-sm-4 col-xs-12" style="padding-right:0px;">
                            <div class="logo">
                                <a title="planova human capital ag" href="/">
                                    <img alt="planova human capital ag" src="<?= WEB_URL ?>/tmpl_planova/img/logo.png"
                                         class="logo-img">
                                </a>
                            </div> <!-- //logo -->
                        </div> <!-- //col-md-3 -->
                        <div class="col-md-9 col-sm-8 hidden-xs" style="padding-left:0px;">
                            <!-- HEAD LOGIN -->
                            <div class="login pull-right">
                                <div id="css-modal-area">
                                    <!-- Panel top -->
                                    <div class="css-panel">
                                        <!-- Login button -->
                                        <!-- Login button -->
                                        <?php
                                        if (isset($_SESSION['logged']) && ($_SESSION['logged'] == true)){
                                            ?>
                                            <a class="btn btn-primary" style="margin-top:10px;"
                                               href='/Candidate/loggout'><i class="fa fa-sign-out"></i> Abmelden</a>
                                            <!-- Registration button -->
                                            <a class="btn btn-primary" style="margin-top:10px;"
                                               href='/Candidate/Dashboard'><i class="fa fa-user"></i> My Planova</a>

                                        <?php } else{ ?>
                                        <a class="btn btn-primary" style="margin-top:10px;" href='/Candidate/login'><i
                                                    class="fa fa-sign-in"></i> Anmelden</a>
                                        <!-- Registration button -->
                                        <a class="btn btn-primary" style="margin-top:10px;"
                                           href='/Candidate/registerWizard'><i class="fa fa-lock"></i> Registrieren</a>
                                        <?php } ?><!-- Login Modal -->
                                        
                                    </div> <!-- //css-panel -->
                                </div> <!-- //css-modal-area -->
                            </div><!-- //HEAD LOGIN -->
                            <!-- HEAD SOCIAL ICON -->
                            <div class="col-md-9 breaking-news" id="headerSlider"
                                 style='padding:0; padding-top: 10px !important;margin-top:5px;'>
                                <div class="breaking-title" style='width:30%;float:left;margin-right:0px;'>
                                    <p>Neuste Stellenangebote</p>
                                </div>

                                <div id="news-carousel" class="carousel slide" style='width:61.5%;'
                                     data-ride="carousel">
                                    <!-- Wrapper For News Slides -->
                                    <ul class="carousel-inner list-unstyled">

                                        <?php
                                        $newsFeedClass = 'active';
                                        foreach ($arrNewJobs as $feedJobs) { ?>
                                            <li class="item <?= $newsFeedClass ?>">
                                                <a href="/Vacancyboard/Detail/<?= $feedJobs['vac_info_id'] ?>"><?= $feedJobs['jobtitle'] ?>
                                                    in <?= $feedJobs['city'] ?></a>
                                            </li>
                                            <?php
                                            $newsFeedClass = '';
                                        } ?>
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
                            </div><!-- //HEAD SOCIAL ICON -->
                        </div> <!-- //col-md-9 -->
                    </div> <!-- //row -->
                </div> <!-- //container -->
            </div> <!-- //header-top -->

            <!-- Navigation Area -->
            <div class="mainnav-wrapper">
                <div class="container">
                    <div class="navbar navbar-default mainnav">
                        <!-- NAVBAR HEADER -->
                        <div class="navbar-header">
                            <button type="button" class="navbar-toggle" data-toggle="offcanvas" data-target="#myNavmenu"
                                    data-canvas="#myNavmenuCanvas" data-placement="left">
                                <i class="fa fa-bars"></i>
                            </button>
                            <!-- HEAD SEARCH -->
                            <div class="head-search">
                                <form method="post" action="search" class="form-search">
                                    <div class="search">
                                        <i class="fas fa-search"></i><input type="text" size="20" class="form-control "
                                                                           maxlength="20" name="searchword">
                                    </div>
                                </form>
                            </div><!-- //HEAD SEARCH -->
                        </div><!-- //NAVBAR HEADER -->
                        <!-- NAVBAR MAIN -->
                        <nav class="navbar-collapse collapse">
                            <ul class="nav navbar-nav">
                                <li <?= $classHome ?>><a href="/">Home</a></li>
                                <li class="dropdown <?= $classCompany ?>">
                                    <a href="/Pages/company">Für Unternehmen<b class="caret"></b></a>
                                    <!-- submenu-wrapper -->
                                    <div class="submenu-wrapper submenu-wrapper-topbottom">
                                        <!-- submenu-inner -->
                                        <div class="submenu-inner  submenu-inner-topbottom">
                                            <ul class="dropdown-menu">
                                                <li><a href="/Pages/companydivisions">Fachbereiche</a></li>
                                                <li <?= $classSubPageCompanyService ?>><a href="/Pages/companyService">Dienstleistungen</a>
                                                </li>

                                            </ul>
                                        </div> <!-- /submenu-inner -->
                                    </div> <!-- /submenu-wrapper -->
                                </li>
                                <li <?= $classVacancy ?> ><a href="/Vacancyboard">Stellenangebote</a></li>
                                <li class="dropdown <?= $classCandidate ?>">
                                    <a href="/Pages/candidate">Für Bewerber<b class="caret"></b></a>
                                    <!-- submenu-wrapper -->
                                    <div class="submenu-wrapper submenu-wrapper-topbottom">
                                        <!-- submenu-inner -->
                                        <div class="submenu-inner  submenu-inner-topbottom">
                                            <ul class="dropdown-menu">
                                                <li><a href="/Pages/companydivisions">Fachbereiche</a></li>
                                                <li <?= $classSubPageCitizen ?>><a href="/Pages/citizeninfo">EU-Bürger
                                                        Info</a></li>
                                                <li <?= $classSubPageVacancyboard ?>><a href="/Vacancyboard">Stellenangebote</a>
                                                </li>
                                                <li <?= $classSubPageSpontanApply ?>><a href="/Pages/SpontanApply">Spontanbewerbung</a>
                                                </li>
                                                <?php $classSubPageAnonymApply?>
                                            </ul>
                                        </div> <!-- /submenu-inner -->
                                    </div> <!-- /submenu-wrapper -->
                                </li>
                                <li class="dropdown <?= $classAbout ?>">
                                    <a href="/Pages/aboutplanova">Über Planova<b class="caret"></b></a>
                                    <!-- submenu-wrapper -->
                                    <div class="submenu-wrapper submenu-wrapper-topbottom">
                                        <!-- submenu-inner -->
                                        <div class="submenu-inner  submenu-inner-topbottom">
                                            <ul class="dropdown-menu">
                                                <li <?= $classSubPageDivisions ?>><a href="/Pages/companydivisions">Fachbereiche</a>
                                                </li>
                                                <li <?= $classSubPageSwissStaffing ?>><a href="/Pages/swissstaffing">Qualitätsanspruch</a>
                                                </li>
                                                <li <?= $classSubPageCareer ?>><a href="/Pages/career">Karriere bei
                                                        Planova</a></li>
                                            </ul>
                                        </div> <!-- /submenu-inner -->
                                    </div> <!-- /submenu-wrapper -->
                                </li>
                                <li class="dropdown <?= $classContact ?>">
                                    <a href="/Contact">Kontakt <b class="caret"></b></a>
                                    <div class="submenu-wrapper submenu-wrapper-topbottom">
                                        <!-- submenu-inner -->
                                        <div class="submenu-inner  submenu-inner-topbottom">
                                            <ul class="dropdown-menu">
                                                <li><a href="/Department/Detail/71">Filiale Aarau</a></li>
                                                <li><a href="/Department/Detail/68">Filiale Baden</a></li>
                                                <li><a href="/Department/Detail/74">Filiale Basel</a></li>
                                                <li><a href="/Department/Detail/67">Filiale Bern</a></li>
                                                <li><a href="/Department/Detail/66">Filiale Luzern</a></li>
                                                <li><a href="/Department/Detail/69">Filiale Winterthur</a></li>
                                                <li><a href="/Department/Detail/64">Filiale Zug</a></li>
                                                <li><a href="/Department/Detail/63">Filiale Zürich</a></li>
                                            </ul>
                                        </div> <!-- /submenu-inner -->
                                    </div> <!-- /submenu-wrapper -->
                                </li>
                                <?php
                                if (isset($_SESSION['logged']) && ($_SESSION['logged'] == true)) {
                                    ?>
                                    <li class="dropdown <?= $classMyPlanova ?>">
                                        <a href="/Candidate/Dashboard">my Planova<b class="caret"></b></a>
                                        <!-- submenu-wrapper -->
                                        <div class="submenu-wrapper submenu-wrapper-topbottom">
                                            <!-- submenu-inner -->
                                            <div class="submenu-inner  submenu-inner-topbottom">
                                                <ul class="dropdown-menu">
                                                    <li><a href="/Candidate/Profile">Mein Profil</a></li>
                                                    <li><a href="/Candidate/Profile">Bewerbungsverlauf</a></li>

                                                </ul>
                                            </div> <!-- /submenu-inner -->
                                        </div> <!-- /submenu-wrapper -->
                                    </li>
                                    <?php
                                }
                                ?>
                            </ul>
                        </nav> <!-- //navbar-collapse -->
                    </div> <!-- //navbar -->
                </div> <!-- //container -->
            </div> <!-- //mainnav-wrapper -->
            <?php if (empty($classHome)){ ?>
            <div class="container">
                <div class="row">
                    <div class="col-md-12 ">
                        <!-- CUSTOM PAGE HEADER -->
                        <div class="box-wrapper">
                            <?php if (isset($data['title'])) { ?>
                                <div class="page-title">
                                    <h1><?= $data['title'] ?></h1>
                                </div>
                            <?php } ?>
                            <ul class="breadcrumb box-wrapper">
                                <li><a href="/">Home</a><span class="divider"></span></li>
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
                        <!-- //CUSTOM PAGE HEADER -->
                    </div>
                </div>
            </div>

<?php } ?>