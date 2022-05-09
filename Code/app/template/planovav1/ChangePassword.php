<?php
include 'header.php';

include 'navigation.php';
?>

<div class="pl-cmmn-cnt-section">
    <div class="pl-ueber">
        <h1 class="bs-title">PASSWORT ÄNDERN</h1>
        <?php include 'MyPlanovaNavigation.php'; ?>
    </div>
    <div class="pl-ueber-cnt-sect">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
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
                        <div class="row">
                            <div class="col-md-12">
                                <form class="form-horizontal pl-form-profile" name="register" method="POST" action='<?=WEB_URL?>/Candidate/ChangePassword'>
                                    <input type="hidden" name="form" value="profile">
                                    <input type="hidden" name="task" value="changePassword">
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <div class="form-group row">
                                                <label for="oldpassword" class="col-sm-4 col-form-label">Aktuelles Passwort:<span class="star">&nbsp;*</span></label>
                                                <div class="col-sm-8">
                                                    <input class="form-control" id="oldpassword" name="oldpassword" value='' placeholder="Aktuelles Passwort" type="password" required/>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="newpassword" class="col-sm-4 col-form-label">Neues Passwort:<span class="star">&nbsp;*</span></label>
                                                <div class="col-sm-8">
                                                    <input class="form-control" id="newpassword" name="newpassword" value="" placeholder="Neues Passwort" type="password" required/>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="newpassword2" class="col-sm-4 col-form-label">Neues Passwort bestätigen:<span class="star">&nbsp;*</span></label>
                                                <div class="col-sm-8">
                                                    <input class="form-control" id="newpassword2" name="newpassword2" value="" placeholder="Neues Passwort bestätigen" type="password" required/>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="offset-sm-4 col-sm-8"> 
                                            <button class="btn pl-btn-profile validate" type="submit">Speichern</button>
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

<?php include 'footer.php'; ?>
