<?php include 'header.php'; 
$classCandidate = 'active';
$classSubPageSpontanApply = 'class="active"';
$breadcrumb[] = array('title' => 'Für Bewerber',
                      'url' => '/Pages/candidate',
                      'active' => false);
$breadcrumb[] = array('title' => 'Spontanbewerbung',
                      'url' => '',
                      'active' => true);

include 'navigation.php'; ?>
<style type="text/css">
    .glyphicon {
        display:initial;
        padding-right: 5px;
    }
    .btn-file{
        height:34px;
    }
</style>
<script>
    grecaptcha.ready(function () {
        grecaptcha.execute('<?=RECAPTCHA_SITE_KEY?>', { action: 'apply' }).then(function (token) {
            var recaptchaResponse = document.getElementById('recaptchaResponse');
            recaptchaResponse.value = token;
        });
    });
</script>
<div class="container mt-20">
    <div class="row">
        <div class="col-md-12">
            <div class="box-wrapper">
                <div class="single-page-item">
                    <?php if(isset($data['error']['0'])){?>
                        <div id="error" class="alert alert-danger" style="margin-left:7px;margin-right:7px;"><span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span><span class="sr-only">Error:</span><?=$data['error']['0']?></div>
                    <?php } ?>
                    <div class="row">
                        <div class="col-md-12">
                            <form class="form-horizontal" role="form" enctype="multipart/form-data" method="post" action="<?= WEB_URL ?>/Pages/SpontanApply">
                                <input type="hidden" name="task" id="task" value="dosave" />
                                <div class="form-group">
                                    <label for="firstname" class="col-sm-2 col-md-2 control-label">Vorname:<span class="star">&nbsp;*</span></label>
                                    <div class="col-sm-10">
                                        <input class="form-control" id="firstname" name="firstname" placeholder="Vorname" value="" type="text" required/>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="lastname" class="col-sm-2 col-md-2 control-label">Nachname:<span class="star">&nbsp;*</span></label>
                                    <div class="col-sm-10">
                                        <input class="form-control" id="lastname" name="lastname" value="" placeholder="Nachname" type="text" required/>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="birthday" class="col-sm-2 col-md-2 control-label">Geburtsdatum:<span class="star">&nbsp;*</span></label>
                                    <div class="col-sm-6" id="birthdayPicker" style="height:10px">

                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="phone" class="col-sm-2 col-md-2 control-label">
                                        Telefon:<span class="star">&nbsp;*</span>
                                    </label>
                                    <div class="col-sm-10">
                                        <input class="form-control" id="phone" name="phone" value="" size="30" placeholder="Telefon" type="text" />
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="email" class="col-sm-2 col-md-2 control-label">
                                        E-Mail:<span class="star">&nbsp;*</span>
                                    </label>
                                    <div class="col-sm-10">
                                        <input class="form-control" id="email" name="email" value="" size="30" placeholder="E-Mail" type="text" />
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="email" class="col-sm-2 col-md-2 control-label">
                                        Dokumente:<span class="star">&nbsp;*</span>
                                    </label>
                                    <div class="col-sm-10">
                                        <div class="file-loading">
                                            <input id="cvFiles" name="cvFiles[]" type="file" multiple />
                                        </div>
                                    </div>
                                </div>
                                <?php if($_GET['esrc'] == "asdf") : ?>
                                <div class="form-group">
                                    <label for="affiliateid" class="col-sm-2 col-md-2 control-label">
                                        Werbe-ID:<span class="star">&nbsp;*</span>
                                    </label>
                                    <div class="col-sm-10">
                                        <input class="form-control" id="affiliate-spontan" name="affiliate-spontan" value="<?php if(isset($_GET['track'])) {
                                        
                                        echo $_GET['track'];
                                        //  var_dump($affiliate);
                                        } ?>"  size="30" placeholder="" type="number" />
                                    </div>
                                </div>
                                <?php else : ?>
                                 <div class="form-group">
                                    <label for="affiliateid" class="col-sm-2 col-md-2 control-label">
                                        Werbe-Identifikation:<span class="star">&nbsp;*</span>
                                    </label>
                                    <div class="col-sm-10">
                                        <input class="form-control" id="affiliate-spontan" name="affiliate-spontan" value="<?php if(isset($_GET['track'])) {
                                        
                                        echo $_GET['track'];
                                        //  var_dump($affiliate);
                                        } ?>"  size="30" placeholder="" type="number" />
                                    </div>
                                </div>
                                <?php endif; ?>
                                <div class="form-group">
                                    <div class="col-sm-offset-2 col-sm-8"><button class="btn btn-primary" type="submit">Jetzt bewerben</button></div>
                                </div>
                                <input type="hidden" name="recaptcha_response" id="recaptchaResponse" />
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php include 'footer.php'; ?>