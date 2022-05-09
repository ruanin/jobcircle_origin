<?php 
include 'header.php';
include 'navigation.php';?>
<link rel="stylesheet" href="<?=WEB_URL?>/tmpl_planovav1/css/wizard.css">
<div class="pl-cmmn-cnt-section">
    <div class="pl-lg-frm">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <?php if (isset($data['error'])) {
                        foreach ($data['error'] as $key => $error) {
                            ?>
                            <div id="error" class="alert alert-danger" style="margin-left:7px;margin-right:7px;"><?= $error ?></div>
                            <?php
                        }
                    }
                    ?>
                    <form id="register-wizard" action="#" class="form-horizontal pl-form" method="POST" enctype="multipart/form-data">
                        <input type="hidden" name="task" id="task" value="saveForm" /> 
                        <h3>Registrierungsform</h3>
                        <fieldset>
                            <legend>Registrierungsform</legend>
                             <div id="registerType">
                              <div class="card">
                                <div class="card-header" id="mobileType">
                                    <a class="btn btn-link" onclick="$('#login_email').val('');  $('#login_email').attr('disabled', true); $('#login_email').removeAttr('required'); $('#login_telefon').removeAttr('disabled'); $('#login_telefon').attr('required', true);" data-toggle="collapse" data-target="#mobileTypeCollapse" aria-expanded="false" aria-controls="mobileTypeCollapse">
                                      <h4 class="panel-title mb-0">Via Mobile</h4>
                                    </a>
                                </div>

                                <div id="mobileTypeCollapse" class="collapse" aria-labelledby="mobileType" data-parent="#registerType">
                                  <div class="card-body">
                                    <p>Bitte geben Sie Ihre Handynummer ein und klicken Sie auf Weiter. Sie dient als Benutzername für Ihr neues my planova Konto. Anschliessend erhalten Sie einen Code per SMS.</p>
                                    <div class="form-group row" style="margin-top:0px;margin-bottom: 0px;">
                                        <label for="login_telefon" class="col-sm-2 col-form-label">
                                            Mobile:
                                        </label>
                                        <div class="col-sm-6">
                                            <input class="form-control" id="login_telefon" name="login_telefon" value="" size="30" placeholder="Mobile" type="tel" required/>
                                        </div>
                                    </div>
                                  </div>
                                </div>
                              </div>
                                 <div class="card">
                                <div class="card-header" id="emailType">                     
                                    <a class="btn btn-link" onclick="$('#login_telefon').val(''); $('#login_telefon').attr('disabled', true); $('#login_telefon').removeAttr('required'); $('#login_email').removeAttr('disabled'); $('#login_email').attr('required', true);" data-toggle="collapse" data-target="#emailTypeCollapse" aria-expanded="true" aria-controls="emailTypeCollapse">
                                      <h4 class="panel-title mb-0">Via E-Mail</h4>
                                    </a>
                                </div>

                                <div id="emailTypeCollapse" class="collapse show" aria-labelledby="emailType" data-parent="#registerType">
                                  <div class="card-body">
                                    <p>
                                        Bitte geben Sie Ihre E-Mail-Adresse ein und klicken Sie auf Weiter. Sie dient als Benutzername für Ihr neues my planova Konto.
                                    </p>
                                    <div class="form-group row" style="margin-top:0px; margin-bottom: 0px;">
                                        <label for="login_email" class="col-sm-2 col-form-label">
                                            E-Mail:
                                        </label>
                                        <div class="col-sm-6">
                                            <input class="form-control" id="login_email" name="login_email" value="" placeholder="E-Mail" type="email" required/>
                                        </div>
                                    </div>
                                  </div>
                                </div>
                              </div>
                            </div>

                        </fieldset>

                        <h3>Persönliche Angaben</h3>
                        <fieldset>
                            <legend>Persönliche Angaben</legend>

                            <div class="row">
                                <div class="col-xl-6 col-lg-12 col-md-12 col-sm-12">
                                    <div class="form-group row mt-0">
                                        <label class="col-sm-4 col-form-label">Anrede:<span class="star">&nbsp;*</span></label>
                                        <div class="col-sm-8">
                                            <select name="salutation" style="width: auto !important" class="form-control" required>
                                                <option value="">Bitte wählen</option>
                                                <option value="W">Frau</option>
                                                <option value="M">Herr</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="firstname" class="col-sm-4 col-form-label">Vorname:<span class="star">&nbsp;*</span></label>
                                        <div class="col-sm-8">
                                            <input class="form-control" id="firstname" name="firstname" placeholder="Vorname" value=''  type="text"  required/>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="lastname" class="col-sm-4 col-form-label">Nachname:<span class="star">&nbsp;*</span></label>
                                        <div class="col-sm-8">
                                            <input class="form-control" id="lastname" name="lastname" value='' placeholder="Nachname" type="text"  required/>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="birthday" class="col-sm-4 col-form-label">Geburtsdatum:<span class="star">&nbsp;*</span></label>
                                        <div class="col-sm-8" id="birthdayPicker">

                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="street" class="col-sm-4 col-form-label">
                                            Strasse / Nr.:<span class="star">&nbsp;*</span>
                                        </label>
                                        <div class="col-sm-8">
                                            <input class="form-control" id="street" name="street" value="" size="30" placeholder="Strasse / Nr."  type="text"  required/>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="zip" class="col-sm-4 col-form-label">
                                            PLZ:<span class="star">&nbsp;*</span>
                                        </label>
                                        <div class="col-sm-8">
                                            <input class="form-control" id="zip" name="zip" value="" size="30" placeholder="PLZ" type="text" required />
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="city" class="col-sm-4 col-form-label">
                                            Ort:<span class="star">&nbsp;*</span>
                                        </label>
                                        <div class="col-sm-8">
                                            <input class="form-control" id="city" name="city" value="" size="30" placeholder="Ort" type="text" required />
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="country" class="col-sm-4 col-form-label">
                                            Land:<span class="star">&nbsp;*</span>
                                        </label>
                                        <div class="col-sm-8">
                                            <select name="country" class="form-control" id="country" required >
                                                <option selected="selected">Bitte wählen</option>
                                                <?php foreach ($data['value_country'] as $country) { ?>
                                                    <option value='<?=$country['country_id']?>'><?=$country['title']?></option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                    </div>

                                </div>

                                <div class="col-xl-6 col-lg-12 col-md-12 col-sm-12">

                                    <div class="form-group row mt-0">
                                        <label for="nationality" class="col-sm-4 col-form-label">
                                            Nationalität:<span class="star">&nbsp;*</span>
                                        </label>
                                        <div class="col-sm-8">
                                            <select name="nationality" class="form-control" id="nationality" required>
                                                <option>Bitte wählen</option>
                                                <?php foreach ($data['value_country'] as $country) { ?>
                                                    <option value='<?=$country['country_id']?>'><?=$country['title']?></option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="ahv-number" class="col-sm-4 col-form-label">AHV Nummer:</label>
                                        <div class="col-sm-8">
                                            <input class="form-control" id="ahv-number" name="ahv-number" value="" placeholder="AHV Nummer" type="text" />
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="phone" class="col-sm-4 col-form-label">
                                            Festnetz:
                                        </label>
                                        <div class="col-sm-8">
                                            <input class="optional form-control" id="phone" name="phone" value="" size="30" placeholder="Bsp. +41441234567"  type="text" />
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="mobile" class="col-sm-4 col-form-label">
                                            Mobile:
                                        </label>
                                        <div class="col-sm-8">
                                            <input class="optional form-control" id="mobile" name="mobile" value="" size="30" placeholder="Bsp. +41791234567"  type="text" />
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="email" class="col-sm-4 col-form-label">
                                            E-Mail:
                                        </label>
                                        <div class="col-sm-8">
                                            <input class="optional form-control" id="email" name="email" value="" size="30" placeholder="E-Mail" type="text" />
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="profession" class="col-sm-4 col-form-label">Beruf:<span class="star">&nbsp;*</span></label>
                                        <div class="col-sm-8">
                                            <input class="form-control" id="profession" name="profession" value="" placeholder="Beruf" type="text" required/>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="employment" class="col-sm-4 col-form-label">
                                            Anstellungsart:
                                        </label>
                                        <div class="col-sm-8">
                                            <select name="employment" id="employment" class="form-control">
                                                <option value="" selected="selected">Bitte wählen</option>
                                                <?php foreach ($data['value_employment'] as $employment) { ?>
                                                    <option value='<?=$employment['employment_id']?>'><?=$employment['name']?></option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="available" class="col-sm-4 col-form-label">
                                            Verfügbar ab:<span class="star">&nbsp;*</span>
                                        </label>
                                        <div class="col-sm-8">
                                            <select name="available" id="available" class="form-control" required>
                                                <option value="0" selected="selected">Bitte wählen</option>
                                                <?php foreach ($data['value_available'] as $available) { ?>
                                                    <option value='<?=$available['available_from_id']?>'><?=$available['name']?></option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </fieldset>

                        <h3>Anhänge hochladen</h3>
                        <fieldset>
                            <legend>Anhänge</legend>

                            <div class="row" >
                                <div class="col-md-12">
                                    <h5>Lebenslauf</h5>
                                    <div class="row">
                                        <div class="col-md-9">
                                            <div class="form-group row">
                                                <label for="cv" class="col-sm-3 col-form-label">
                                                    Lebenslauf:
                                                </label>
                                                <div class="col-sm-9">
                                                    <div class="custom-file">
                                                        <input type="file" name="cvfile" class="custom-file-input" id="cv" lang="de" />
                                                        <label class="custom-file-label" for="customFile" data-label="Datei auswählen">Datei auswählen</label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <h5>Anhänge</h5>
                                    <div class="row">
                                        <div class="col-md-9">
                                            <div class="form-group row">
                                                <label for="userfile_1" class="col-sm-3 col-form-label">
                                                    Anhang:
                                                </label>
                                                <div class="col-sm-9">
                                                    <div class="custom-file">
                                                        <input type="file" name="userfile1" class="custom-file-input" id="userfile_1" lang="de" />
                                                        <label class="custom-file-label" for="userfile_1" data-label="Datei auswählen">Datei auswählen</label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="userfile_2" class="col-sm-3 col-form-label">
                                                    Anhang:
                                                </label>
                                                <div class="col-sm-9">
                                                    <div class="custom-file">
                                                        <input type="file" name="userfile2" class="custom-file-input" id="userfile_2" lang="de" />
                                                        <label class="custom-file-label" for="userfile_2" data-label="Datei auswählen">Datei auswählen</label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="userfile_3" class="col-sm-3 col-form-label">
                                                    Anhang:
                                                </label>
                                                <div class="col-sm-9">
                                                    <div class="custom-file">
                                                        <input type="file" name="userfile3" class="custom-file-input" id="userfile_3" lang="de" />
                                                        <label class="custom-file-label" for="userfile_3" data-label="Datei auswählen">Datei auswählen</label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </fieldset>

                        <h3>Abschluss</h3>
                        <fieldset>
                            <legend>Passwort setzen</legend>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <label class="col-sm-4 col-form-label" for="login_password_1">Passwort:<span class="star">&nbsp;*</span></label>
                                        <div class="col-sm-8">
                                            <input class="form-control" id="login_password_1" name="login_password" value="" placeholder="Passwort" type="password" />
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-4 col-form-label" for="login_password_confirm_1">Passwort bestätigen:<span class="star">&nbsp;*</span></label>
                                        <div class="col-sm-8">
                                            <input class="form-control" id="login_password_confirm_1" name="login_password_confirm" value="" placeholder="Passwort bestätigen" type="password"  />
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </fieldset>
                    </form>
                </div>
            </div>
        </div>
    </div>
<?php include 'footer.php'; ?>