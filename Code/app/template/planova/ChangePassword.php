<?php
include 'header.php';
$classMyPlanova = 'active';
$breadcrumb[] = array('title' => 'Für Bewerber',
    'url' => '/Pages/candidate',
    'active' => false);
$breadcrumb[] = array('title' => 'MyPlanova',
    'url' => '',
    'active' => true);
include 'navigation.php';
?>

<section class="form-wrapper mt-15">
    <div class="container">
        <div class="row">


            <?php include 'MyPlanovaNavigation.php'; ?>


            <div class="col-md-9">
                <div class="box-wrapper">
                    <div class="single-page-item">
                        <h1>Passwort ändern</h1>
                        <?php if(!empty($data['success'])){ ?>
                            <div class="alert alert-success ">
                                <strong><?=$data['success']?></strong>
                            </div>
                        <?php } ?>

                        <?php if(!empty($data['error'])){ ?>
                            <div class="alert alert-danger">
                                <strong><?=$data['error']?></strong>
                            </div>
                        <?php }?>
                        <div class="contact-form">
                            <div class="row" style="margin-top:25px;">
                                <div class="col-md-12">
                                    <form class="form-horizontal" name="register" method="POST" action='<?=WEB_URL?>/Candidate/ChangePassword'>
                                        <input type="hidden" name="form" value="profile">
                                        <input type="hidden" name="task" value="changePassword">
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <div class="form-group">
                                                    <label for="oldpassword" class="col-sm-4 control-label">Aktuelles Passwort:<span class="star">&nbsp;*</span></label>
                                                    <div class="col-sm-8">
                                                        <input class="form-control" id="oldpassword" name="oldpassword" value='' placeholder="Aktuelles Passwort" type="password" required/>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="newpassword" class="col-sm-4 control-label">Neues Passwort:<span class="star">&nbsp;*</span></label>
                                                    <div class="col-sm-8">
                                                        <input class="form-control" id="newpassword" name="newpassword" value="" placeholder="Neues Passwort" type="password" required/>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="newpassword2" class="col-sm-4 control-label">Neues Passwort bestätigen:<span class="star">&nbsp;*</span></label>
                                                    <div class="col-sm-8">
                                                        <input class="form-control" id="newpassword2" name="newpassword2" value="" placeholder="Neues Passwort bestätigen" type="password" required/>
                                                    </div>
                                                </div>
                                            </div>
                                        <div class="row">
                                            <div class="col-sm-offset-4 col-sm-8">
                                                <button class="btn btn-primary validate subbtn" type="submit">Speichern</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<?php include 'footer.php'; ?>
