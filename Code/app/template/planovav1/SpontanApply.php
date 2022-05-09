<?php 
$headerTitle = "Temporärbüro Spontanbewerbung - Jetzt spontan auf Traumjob online bewerben! ";
include 'header.php';
$classVacancy = $classSubPageSpontanApply = 'active';  
include 'navigation.php';


?>
<style type="text/css">
    .glyphicon {
        display:initial;
        padding-right: 5px;
    }
    div.btn-file i, div.btn-file span {
        padding-top: 15% !important;
    }
    div.file-caption i, div.file-caption span {
        padding-top: 2% !important;
    }
</style>
<div class="pl-cmmn-cnt-section">
    <!-- Ueber Planova Content -->
    <div class="pl-ueber">
            <h1 class="bs-title">SPONTANBEWERBUNG</h1>				
    </div>
    <div class="pl-cnt-formular">
        <div class="container">
            <?php
            
            if (isset($data['error'])) {
                foreach ($data['error'] as $key => $error) {
                    ?>
                    <div id="error" class="alert alert-danger" style="margin-left:7px;margin-right:7px;"><?= $error ?></div>
                    <?php
                }
            }
            ?>
            <?php if(!empty($data['success'])){ ?>
            <div id="success" class="alert alert-success" style="margin-left:7px;margin-right:7px;"><?=$data['success']?></div>
            <?php }elseif(empty($_SESSION['cand_profile_id'])){ ?>
            <div class="row">
                <div class="col-md-12">
                    <form class="form-horizontal pl-form pl-spnt-form" id="spontantApplyForm" role="form" enctype="multipart/form-data" method="post" action="<?= WEB_URL ?>/Pages/SpontanApply">
                        <input type="hidden" name="task" id="task" value="dosave" />
                        <div class="form-group row">
                            <label for="firstname" class="col-xs-12 col-sm-12 col-md-3 control-label text-info">Vorname:<span class="star">&nbsp;*</span></label>
                            <div class="col-xs-12 col-sm-12 col-md-9">
                                <input class="form-control" id="firstname" name="firstname" placeholder="Vorname" value="" type="text" required="required"/>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="lastname" class="col-xs-12 col-sm-12 col-md-3 control-label text-info">Nachname:<span class="star">&nbsp;*</span></label>
                            <div class="col-xs-12 col-sm-12 col-md-9">
                                <input class="form-control" id="lastname" name="lastname" value="" placeholder="Nachname" type="text" required="required"/>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="birthday" class="col-xs-12 col-sm-12 col-md-3 control-label text-info">Geburtsdatum:<span class="star">&nbsp;*</span></label>
                            <div class="col-xs-12 col-sm-12 col-md-9" id="birthdayPicker">

                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="profession" class="col-xs-12 col-sm-12 col-md-3 control-label text-info">Beruf:<span class="star">&nbsp;*</span></label>
                            <div class="col-xs-12 col-sm-12 col-md-9">
                                <input class="form-control" id="profession" name="profession" value="" placeholder="Beruf" type="text" required="required" />
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="phone" class="col-xs-12 col-sm-12 col-md-3 control-label text-info">
                                Telefon:<span class="star">&nbsp;*</span>
                            </label>
                            <div class="col-xs-12 col-sm-12 col-md-9">
                                <input class="form-control" id="phone" name="phone" value="" size="30" placeholder="Bsp. +41791234567" type="text" required="required" />
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="email" class="col-xs-12 col-sm-12 col-md-3 control-label text-info">
                                E-Mail:<span class="star">&nbsp;*</span>
                            </label>
                            <div class="col-xs-12 col-sm-12 col-md-9">
                                <input class="form-control" id="email" name="email" value="" size="30" placeholder="E-Mail" type="text" required="required" />
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="email" class="col-xs-12 col-sm-12 col-md-3 control-label text-info">
                                Dokumente:<span class="star">&nbsp;*</span>
                            </label>
                            <div class="col-xs-12 col-sm-12 col-md-9">
                                <div class="file-loading">
                                    <input id="cvFiles" name="cvFiles[]" type="file" multiple />
                                </div>
                            </div>
                        </div>
                         <?php if(empty($_GET['track'])) : ?>
                        <div class="form-group row">
                            <label for="affiliate-spontan" class="col-xs-12 col-sm-12 col-md-3 control-label text-info">
                                Werbe-ID:
                            </label>
                            <div class="col-xs-12 col-sm-12 col-md-9"> 
                                <input class="form-control" id="affiliate-spontan" name="affiliate-spontan" value="" 
                             
                             size="30" type="number" />
                            </div>
                        </div>
                         <?php else : ?>
                        <div class="form-group row">
                            <label for="affiliate-spontan" class="col-xs-12 col-sm-12 col-md-3 control-label text-info">
                                Werbe-ID:
                            </label>
                            <div class="col-xs-12 col-sm-12 col-md-9"> 
                                 <p class="form-control" id="affiliate-spontan" name="affiliate-spontan" value="<?php echo $_GET['track']; ?>" 
                             
                                    size="30" type="number"> <?php echo $_GET['track']; ?> </p>
                            </div>
                        </div>
                        <?php endif; ?>
                        <div class="form-group row">
                            <div class="col-sm-12 col-md-3">
                                &nbsp;
                            </div>
                            <div class="col-sm-12 col-md-9">
                                <button class="btn pl-btn-cmmn" type="submit">Jetzt bewerben</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <?php } ?>
        </div>
    </div>
</div>
<?php include 'footer.php'; 

?>