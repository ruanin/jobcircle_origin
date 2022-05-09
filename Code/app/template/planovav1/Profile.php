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

<div class="pl-cmmn-cnt-section">
    <div class="pl-ueber">
        <h1 class="bs-title">PROFIL</h1>
        <?php include 'MyPlanovaNavigation.php'; ?>
    </div>
    <div class="pl-ueber-cnt-sect">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
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
                    <div class="contact-form">
                        <div class="row">
                            <div class="col-md-12">
                                <h4 class="profile-title">Persönliche Angaben</h4>
                                <hr></hr>
                                <form class="form-horizontal pl-form-profile" name="register" method="POST"
                                      action='<?= WEB_URL ?>/Candidate/profile/'>
                                    <input type="hidden" name="form" value="profile">
                                    <input type="hidden" name="task" value="edit">

                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group row">
                                                <label class="col-sm-4  col-form-label">Anrede:<span class="star">&nbsp;*</span></label>
                                                <div class="col-sm-8">
                                                    <select name="salutation" <?= !empty($data['profile_form']['hrc_cand_accounting_number']) && !empty($data['profile_form']['hrc_cand_id']) ? 'disabled' : '' ?>
                                                            style="width: auto!important" class="form-control"
                                                            required>
                                                        <?php
                                                        $m = $w = '';
                                                        if ($data['profile_form']['salutation'] == 'W') {
                                                            $w = 'selected';
                                                        }

                                                        if ($data['profile_form']['salutation'] == 'M') {
                                                            $m = 'selected';
                                                        }
                                                        ?>
                                                        <option value="">Bitte wählen</option>
                                                        <option value="W" <?= $w ?>>Frau</option>
                                                        <option value="M" <?= $m ?>>Herr</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="firstname"
                                                       class="col-sm-4 col-form-label">Vorname:<span
                                                            class="star">&nbsp;*</span></label>
                                                <div class="col-sm-8">
                                                    <input class="form-control" id="firstname" name="firstname"
                                                           placeholder="Vorname"
                                                           value='<?= $data['profile_form']['f_name'] ?>' <?= !empty($data['profile_form']['hrc_cand_accounting_number']) && !empty($data['profile_form']['hrc_cand_id']) ? 'disabled' : '' ?>
                                                           type="text" required/>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="lastname"
                                                       class="col-sm-4 col-form-label">Nachname:<span
                                                            class="star">&nbsp;*</span></label>
                                                <div class="col-sm-8">
                                                    <input class="form-control" id="lastname" name="lastname"
                                                           value='<?= $data['profile_form']['l_name'] ?>'
                                                           placeholder="Nachname"
                                                           type="text" <?= !empty($data['profile_form']['hrc_cand_accounting_number']) && !empty($data['profile_form']['hrc_cand_id']) ? 'disabled' : '' ?>
                                                           required/>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="birthday" class="col-sm-4 col-form-label">Geburtsdatum:<span
                                                            class="star">&nbsp;*</span></label>
                                                <div class="col-sm-8">
                                                    <input class="form-control" id="birthday" name="birthday"
                                                           value="<?= $data['profile_form']['birthday'] ?>"
                                                           placeholder="Geburtsdatum"
                                                           type="date" <?= !empty($data['profile_form']['hrc_cand_accounting_number']) && !empty($data['profile_form']['hrc_cand_id']) ? 'disabled' : '' ?>
                                                           required/>
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label for="ahv-number" class="col-sm-4 col-form-label">AHV
                                                    Nummer:</label>
                                                <div class="col-sm-8">
                                                    <input class="form-control" id="ahv-number"
                                                           name="ahv-number"
                                                           value="<?= $data['profile_form']['ahv-number'] ?>" <?= !empty($data['profile_form']['hrc_cand_accounting_number']) && !empty($data['profile_form']['hrc_cand_id']) && !empty($data['profile_form']['ahv-number']) ? 'disabled' : '' ?>
                                                           placeholder="AHV Nummer" type="text"/>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-group row">
                                                <label for="street" class="col-sm-4 col-form-label">
                                                    Strasse / Nr.:<span class="star">&nbsp;*</span>
                                                </label>
                                                <div class="col-sm-8">
                                                    <input class="form-control" id="street" name="street"
                                                           value="<?= $data['profile_form']['street'] ?>"
                                                           size="30" placeholder="Strasse / Nr." type="text"
                                                           required/>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="zip" class="col-sm-4 col-form-label">
                                                    PLZ:<span class="star">&nbsp;*</span>
                                                </label>
                                                <div class="col-sm-8">
                                                    <input class="form-control" id="zip" name="zip"
                                                           value="<?= $data['profile_form']['zip'] ?>" size="30"
                                                           placeholder="PLZ" type="text" required/>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="city" class="col-sm-4 col-form-label">
                                                    Ort:<span class="star">&nbsp;*</span>
                                                </label>
                                                <div class="col-sm-8">
                                                    <input class="form-control" id="city" name="city"
                                                           value="<?= $data['profile_form']['city'] ?>"
                                                           size="30" placeholder="Ort" type="text" required/>
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label for="country" class="col-sm-4 col-form-label">
                                                    Land:<span class="star">&nbsp;*</span>
                                                </label>
                                                <div class="col-sm-8">
                                                    <select name="country" class="form-control" id="country"
                                                            required>
                                                        <option selected="selected">Bitte wählen</option>
                                                        <?php foreach ($data['value_country'] as $country) {
                                                            $cselected = '';
                                                            if ($data['profile_form']['country'] == $country['country_id']) {
                                                                $cselected = 'selected';
                                                            }
                                                            ?>
                                                            <option value='<?= $country['country_id'] ?>' <?= $cselected ?>><?= $country['title'] ?></option>
                                                        <?php } ?>
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label for="nationality" class="col-sm-4 col-form-label">
                                                    Nationalität:<span class="star">&nbsp;*</span>
                                                </label>
                                                <div class="col-sm-8">
                                                    <select name="nationality" class="form-control"
                                                            id="nationality" required>
                                                        <option>Bitte wählen</option>
                                                        <?php foreach ($data['value_country'] as $country) {
                                                            $nselected = '';
                                                            if ($data['profile_form']['nationality'] == $country['country_id']) {
                                                                $nselected = 'selected';
                                                            }
                                                            ?>
                                                            <option value='<?= $country['country_id'] ?>' <?= $nselected ?>><?= $country['title'] ?></option>
                                                        <?php } ?>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-8">
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group pull-right">
                                                <button class="btn pl-btn-profile pull-left mr-1" type="submit">
                                                    Speichern
                                                </button>
                                                <button class="btn pl-btn-profile pull-right" type="button" onclick="cancel('<?= WEB_URL ?>/Candidate/profile/');">
                                                    Abbrechen
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <?php if (isset($_SESSION['cand_profile_id']) && !empty($_SESSION['cand_profile_id'])) { ?>
                            <div class="row">
                                <div class="col-md-12">
                                    <h4 class="profile-title">Kontaktangaben</h4>
                                    <hr></hr>
                                    <form class="form-horizontal pl-form-profile" name="register" method="POST"
                                          action='<?= WEB_URL ?>/Candidate/profile/'>
                                        <input type="hidden" name="form" value="contact">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group row">
                                                    <label for="phone" class="col-sm-2  col-form-label">
                                                        Festnetz:
                                                    </label>
                                                    <div class="col-sm-8">
                                                        <input class="form-control" id="phone" name="phone"
                                                               value="<?= $data['profile_form']['phone'] ?>"
                                                               size="30" placeholder="Festnetz" type="text"/>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="mobile" class="col-sm-2  col-form-label">
                                                        Mobile:
                                                    </label>
                                                    <div class="col-sm-8">
                                                        <input class="form-control" id="mobile" name="mobile"
                                                               value="<?= $data['profile_form']['mobile'] ?>"
                                                               size="30" placeholder="Mobile" type="text"/>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="email" class="col-sm-2  col-form-label">
                                                        E-Mail:
                                                    </label>
                                                    <div class="col-sm-8">
                                                        <input class="form-control" id="email" name="mail"
                                                               value="<?= $data['profile_form']['mail'] ?>"
                                                               size="30" placeholder="E-Mail" type="text"/>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-8">
                                            </div>
                                            <div class="col-sm-4">
                                                <div class="form-group pull-right">
                                                    <button class="btn pl-btn-profile pull-left mr-1"
                                                            type="submit">Speichern
                                                    </button>
                                                    <button class="btn pl-btn-profile pull-right"
                                                            type="button" onclick="cancel('<?= WEB_URL ?>/Candidate/profile/');">Abbrechen
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-12">
                                    <h4 id="additionalinfo" class="profile-title">Zusätzliche Angaben</h4>
                                    <hr></hr>
                                    <form class="form-horizontal pl-form-profile" name="register" method="POST"
                                          action='<?= WEB_URL ?>/Candidate/profile/'>
                                        <input type="hidden" name="form" value="extra">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group row">
                                                    <label for="profession" class="col-sm-2  col-form-label">Beruf:</label>
                                                    <div class="col-sm-8">
                                                        <input class="form-control" id="profession"
                                                               name="profession"
                                                               value="<?= $data['profile_form']['profession'] ?>"
                                                               placeholder="Beruf" type="text"/>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="employment" class="col-sm-2  col-form-label">
                                                        Anstellungsart:
                                                    </label>
                                                    <div class="col-sm-8">
                                                        <select name="employment" id="employment"
                                                                class="form-control">
                                                            <option selected="selected">Bitte wählen</option>
                                                            <?php foreach ($data['value_employment'] as $employment) {
                                                                $cselected = '';
                                                                if ($data['profile_form']['employment'] == $employment['employment_id']) {
                                                                    $cselected = 'selected';
                                                                }
                                                                ?>
                                                                <option value='<?= $employment['employment_id'] ?>' <?= $cselected ?>><?= $employment['name'] ?></option>
                                                            <?php } ?>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="available" class="col-sm-2  col-form-label">
                                                        Verfügbar ab:
                                                    </label>
                                                    <div class="col-sm-8">
                                                        <select name="available" id="available"
                                                                class="form-control">
                                                            <option selected="selected">Bitte wählen</option>
                                                            <?php foreach ($data['value_available'] as $available) {
                                                                $cselected = '';
                                                                if ($data['profile_form']['available'] == $available['available_from_id']) {
                                                                    $cselected = 'selected';
                                                                }
                                                                ?>
                                                                <option value='<?= $available['available_from_id'] ?>' <?= $cselected ?>><?= $available['name'] ?></option>
                                                            <?php } ?>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-8">
                                            </div>
                                            <div class="col-sm-4">
                                                <div class="form-group pull-right"
                                                     style="margin-right:0px;">
                                                    <button class="btn pl-btn-profile validate pull-left mr-1"
                                                            type="submit">Speichern
                                                    </button>
                                                    <button class="btn pl-btn-profile validate pull-right"
                                                            type="button" onclick="cancel('<?= WEB_URL ?>/Candidate/profile/');">Abbrechen
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-12">
                                    <h4 id="cv" class="profile-title">Mein Lebenslauf</h4>
                                    <hr></hr>
                                    <form class="form-horizontal pl-form-profile" role="form" enctype="multipart/form-data"
                                          method="post" action="<?= WEB_URL ?>/Candidate/profile/">
                                        <input type="hidden" name="form" value="cvupload">
                                        <div class="row">
                                            <div class="col-md-9">
                                                <div class="form-group row">
                                                    <label for="cv" class="col-sm-3 col-form-label">
                                                        Lebenslauf:
                                                    </label>
                                                    <div class="col-sm-9">
                                                        <div class="custom-file">
                                                            <input type="file" name="userfile" class="custom-file-input" id="cv" lang="de" />
                                                            <label class="custom-file-label" for="customFile" data-label="Datei auswählen">Datei auswählen</label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group pull-right">
                                                    <button class="btn pl-btn-profile" type="submit">
                                                        Speichern
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                        <hr></hr>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <?php if (!empty($data['cvfiles'])) { ?>
                                                    <div style="overflow-x:auto;">
                                                        <table class="table table-md table-bordered table-striped">
                                                            <thead>
                                                            <tr>
                                                                <th width="60%">Dateiname</th>
                                                                <th width="20%">Hochgeladen am</th>
                                                                <th width="20%"></th>
                                                            </tr>
                                                            </thead>
                                                            <tbody>
                                                            <?php for ($i = 0; $i < count($data['cvfiles']); $i++) { ?>
                                                                <tr>
                                                                    <td width="60%"
                                                                        style="word-wrap:break-word !important;"><?= $data['cvfiles'][$i]['basename'] ?></td>
                                                                    <td width="20%"
                                                                        style="word-wrap:break-word !important;"><?= date('d.m.Y H:i', $data['cvfiles'][$i]['uploadTime']) ?></td>
                                                                    <td width="20%"
                                                                        style="text-align:center;vertical-align: middle;"><?php if (preg_match('~MSIE|Internet Explorer~i', $_SERVER['HTTP_USER_AGENT']) || (strpos($_SERVER['HTTP_USER_AGENT'], 'Trident/7.0; rv:11.0') !== false)) { ?>
                                                                            <a
                                                                                    href="<?= WEB_URL ?>/Candidate/viewCandidateFiles?fileName=<?= $data['cvfiles'][$i]['basename'] ?>&t=1"
                                                                                    target="_blank"
                                                                                    style="target-new: tab;"
                                                                                    title="Lebenslauf <?= $data['cvfiles'][$i]['basename'] ?>">
                                                                                <i class="fa fa-search fa-2x"></i></a> <?php } else { ?>
                                                                            <a
                                                                            href="<?= WEB_URL ?>/Candidate/viewCandidateFiles?fileName=<?= $data['cvfiles'][$i]['basename'] ?>&t=1"
                                                                            title="Lebenslauf <?= $data['cvfiles'][$i]['basename'] ?>"
                                                                            data-featherlight="iframe" data-featherlight-close-icon="" data-featherlight-iframe-allowfullscreen="true" data-featherlight-iframe-width="950" data-featherlight-iframe-height="800">
                                                                                <i class="fa fa-search fa-2x"></i>
                                                                            </a> <?php } ?> <a
                                                                                href="<?= WEB_URL ?>/Candidate/viewCandidateFiles?fileName=<?= $data['cvfiles'][$i]['basename'] ?>&t=1&fileDownload=1"
                                                                                style="padding-left:5px;"
                                                                                title="Lebenslauf <?= $data['cvfiles'][$i]['basename'] ?>"><i
                                                                                    class="fa fa-download fa-2x"></i></a>
                                                                    </td>
                                                                </tr>
                                                                <?php
                                                            } ?>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                <?php }
                                                ?>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-12">
                                    <h4 id="attachments" class="profile-title">Meine Anhänge</h4>
                                    <hr></hr>
                                    <form class="form-horizontal pl-form-profile" role="form" enctype="multipart/form-data"
                                          method="post" action="<?= WEB_URL ?>/Candidate/profile/">
                                        <input type="hidden" name="form" value="attachementupload">
                                        <div class="row">
                                            <div class="col-md-9">
                                                <div class="form-group row">
                                                    <label for="file" class="col-sm-3 col-form-label">
                                                        Anhang:
                                                    </label>
                                                    <div class="col-sm-9">
                                                        <div class="custom-file">
                                                            <input type="file" id="file" name="userfile" class="custom-file-input" lang="de" />
                                                            <label class="custom-file-label" for="file" data-label="Datei auswählen">Datei auswählen</label>
                                                        </div> 
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group pull-right">
                                                    <button class="btn pl-btn-profile" type="submit">
                                                        Speichern
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                        <hr></hr>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <?php if (!empty($data['attachements'])) { ?>
                                                <div style="overflow-x:auto;">
                                                    <table class="table table-bordered table-striped">
                                                        <thead>
                                                        <tr>
                                                            <th width="70%">Dateiname</th>
                                                            <th width="15%">Hochgeladen am</th>
                                                            <th width="15%"></th>
                                                        </tr>
                                                        </thead>
                                                        <tbody>
                                                        <?php for ($i = 0; $i < count($data['attachements']); $i++) { ?>
                                                            <tr>
                                                                <td width="70%"
                                                                    style="word-wrap:break-word !important;"><?= $data['attachements'][$i]['basename'] ?></td>
                                                                <td width="15%"
                                                                    style="word-wrap:break-word !important;"><?= date('d.m.Y H:i', $data['attachements'][$i]['uploadTime']) ?></td>
                                                                <td width="15%"
                                                                    style="text-align:center;vertical-align: middle;">
                                                                    <?php if (preg_match('~MSIE|Internet Explorer~i', $_SERVER['HTTP_USER_AGENT']) || (strpos($_SERVER['HTTP_USER_AGENT'], 'Trident/7.0; rv:11.0') !== false)) { ?>
                                                                        <a
                                                                                href="<?= WEB_URL ?>/Candidate/viewCandidateFiles?fileName=<?= $data['attachements'][$i]['basename'] ?>&t=2"
                                                                                target="_blank"
                                                                                style="target-new: tab;"
                                                                                title="Anhang <?= $data['attachements'][$i]['basename'] ?>">
                                                                            <i class="fa fa-search fa-2x"></i></a> <?php } else { ?>
                                                                        <a
                                                                        href="<?= WEB_URL ?>/Candidate/viewCandidateFiles?fileName=<?= $data['attachements'][$i]['basename'] ?>&t=2"
                                                                        title="Anhang <?= $data['attachements'][$i]['basename'] ?>"
                                                                        data-featherlight="iframe" data-featherlight-close-icon="" data-featherlight-iframe-allowfullscreen="true" data-featherlight-iframe-width="950" data-featherlight-iframe-height="800"><i
                                                                                    class="fa fa-search fa-2x"></i>
                                                                        </a> <?php } ?> <a
                                                                            href="<?= WEB_URL ?>/Candidate/viewCandidateFiles?fileName=<?= $data['attachements'][$i]['basename'] ?>&t=2&fileDownload=1"
                                                                            style="padding-left:5px;"
                                                                            title="Anhang <?= $data['attachements'][$i]['basename'] ?>"><i
                                                                                class="fa fa-download fa-2x"></i></a>
                                                                </td>
                                                            </tr>
                                                            <?php
                                                        } ?>
                                                        </tbody>
                                                    </table> 
                                                </div>
                                                <?php }
                                                ?>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php include 'footer.php'; ?>