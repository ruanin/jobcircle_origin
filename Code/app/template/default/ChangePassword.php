<?php
include 'header.php';
$classMyAha = 'active';
$breadcrumb[] = array('title' => 'my [aha]',
    'url' => '/Candidate/Dashboard',
    'active' => false);
$breadcrumb[] = array('title' => 'Passwort ändern',
    'url' => '/Candidate/ChangePassword',
    'active' => true);
include 'navigation.php';
?>

    <div class="header-page-title">
        <div class="container">
            <h1>Passwort ändern</h1>

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
                <div class="col-md-12 page-content none-padding">
                    <?php include 'MyAhaNavigation.php'; ?>
                    <div class="single-page-item">
                        <?php if (!empty($data['success'])) { ?>
                            <div class="alert alert-success ">
                                <strong><?= $data['success'] ?></strong>
                            </div>
                        <?php } ?>
                        <?php if (!empty($data['error'])) { ?>
                            <div class="alert alert-danger">
                                <strong><?= $data['error'] ?></strong>
                            </div>
                        <?php } ?>
                        <form class="form-horizontal" name="register" method="POST"
                              action='<?= WEB_URL ?>/Candidate/ChangePassword'>
                            <input type="hidden" name="form" value="profile">
                            <input type="hidden" name="task" value="changePassword">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="oldpassword" class="col-sm-3 control-label">Aktuelles Passwort:<span
                                                    class="star">&nbsp;*</span></label>
                                        <div class="col-sm-5">
                                            <input class="form-control" id="oldpassword" name="oldpassword" value=''
                                                   placeholder="Aktuelles Passwort" type="password" required/>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="newpassword" class="col-sm-3 control-label">Neues Passwort:<span
                                                    class="star">&nbsp;*</span></label>
                                        <div class="col-sm-5">
                                            <input class="form-control" id="newpassword" name="newpassword" value=""
                                                   placeholder="Neues Passwort" type="password" required/>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="newpassword2" class="col-sm-3 control-label">Neues Passwort
                                            bestätigen:<span class="star">&nbsp;*</span></label>
                                        <div class="col-sm-5">
                                            <input class="form-control" id="newpassword2" name="newpassword2" value=""
                                                   placeholder="Neues Passwort bestätigen" type="password" required/>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-offset-5 col-md-3">
                                    <div class="form-group">
                                        <button class="btn btn-default validate subbtn" type="submit">Speichern</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php include 'footer.php'; ?>