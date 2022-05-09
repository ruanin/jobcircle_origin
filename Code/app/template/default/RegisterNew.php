<?php 
include 'header.php';
include 'navigation.php';?>
<link rel="stylesheet" href="<?=WEB_URL?>/css/wizard.css">
        <div class="header-page-title">
            <div class="container">
                <h1><?=$data['title']?></h1>

                <ul class="breadcrumbs">
                    <li><a href="#">Home</a></li>
                    <?php for($i=0;$i<count($breadcrumb);$i++) { 

                       if($breadcrumb[$i]['active'] == true){
                           $breadcrumbClass = 'class="active"';
                           $breadcrumbTitle = $breadcrumb[$i]['title'];
                       }else{
                           $breadcrumbClass = '';
                           $breadcrumbTitle = '<a href="'.$breadcrumb[$i]['url'].'">'.$breadcrumb[$i]['title'].'</a>';

                       }

                       ?>
                    <li <?=$breadcrumbClass?>><?=$breadcrumbTitle?></li>
                    <?php } ?>
                </ul>
            </div>
	</div>
    </header>
<style>
    .modal
    {
        position: fixed;
        z-index: 999;
        height: 100%;
        width: 100%;
        top: 0;
        left: 0;
        background-color: Black;
        filter: alpha(opacity=60);
        opacity: 0.6;
        -moz-opacity: 0.8;
    }
    .center
    {
        z-index: 1000;
        margin: 300px auto;
        padding: 10px;
        width: 130px;
        background-color: White;
        border-radius: 10px;
        filter: alpha(opacity=100);
        opacity: 1;
        -moz-opacity: 1;
    }
    .center img
    {
        height: 128px;
        width: 128px;
    }
</style>
<div class="page-content">
    <div class="container">
        <div class="row">	
            <div class="col-md-12 none-padding">
                <div class="box-wrapper">
                    <div class=" white-container">
                        <?php
                        if (isset($data['error'])) {
                            foreach ($data['error'] as $key => $error) {
                                ?>
                                <div id="error" class="alert alert-danger" style="margin-left:7px;margin-right:7px;"><?= $error ?></div>
                                <?php
                            }
                        }
                        ?>
                        <form id="register-wizard" action="/Candidate/registerWizard" class="form-horizontal" method="POST" enctype="multipart/form-data">
                            <input type="hidden" name="task" id="task" value="saveForm" /> 
                            <h3>Registrierungsform auswählen</h3>
                            <fieldset>
                                <legend>Registrierungsform</legend>
                                <div style="margin-top: 20px; margin-bottom: 40px;">
                                    <div class="panel-group" id="1">
                                        <div class="panel panel-default panel-faq">
                                            <div class="panel-heading">
                                                <a data-toggle="collapse" data-parent="#1" href="#section1" onclick="$('#login_email').val('');  $('#login_email').attr('disabled', true); $('#login_email').removeAttr('required'); $('#login_telefon').removeAttr('disabled'); $('#login_telefon').attr('required', true);">
                                                    <h4 class="panel-title">
                                                        Via Mobile
                                                    </h4>
                                                </a>
                                            </div>

                                            <div id="section1" class="panel-collapse collapse">
                                                <div class="panel-body">	
                                                    <p>Bitte geben Sie Ihre Handynummer ein und klicken Sie auf Weiter. Sie dient als Benutzername für Ihr neues my [aha] Konto.Anschliessend erhalten Sie einen Code per SMS.</p>
                                                    <div class="form-group">
                                                        <label for="login_telefon" class="col-sm-2 control-label">
                                                            Mobile:
                                                        </label>
                                                        <div class="col-sm-6">	
                                                            <input class="form-control" id="login_telefon" name="login_telefon" value="" size="30" placeholder="Mobile" type="tel" required/>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="panel panel-default panel-faq">
                                            <div class="panel-heading">
                                                <a data-toggle="collapse" data-parent="#1" href="#section2" onclick="$('#login_telefon').val(''); $('#login_telefon').attr('disabled', true); $('#login_telefon').removeAttr('required'); $('#login_email').removeAttr('disabled'); $('#login_email').attr('required', true);">
                                                    <h4 class="panel-title">
                                                        Via E-Mail
                                                    </h4>
                                                </a>
                                            </div>

                                            <div id="section2" class="panel-collapse in">
                                                <div class="panel-body">
                                                    <p>
                                                        Bitte geben Sie Ihre E-Mail-Adresse ein und klicken Sie auf Weiter. Sie dient als Benutzername für Ihr neues my [aha] Konto.
                                                    </p>
                                                    <div class="form-group">
                                                        <label for="login_email" class="col-sm-2 control-label">
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
                                </div>
                            </fieldset>

                            <h3>Persönliche Angaben</h3>
                            <fieldset>
                                <legend>Persönliche Angaben</legend>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="col-sm-4 control-label">Anrede:<span class="star">&nbsp;*</span></label>	
                                            <div class="col-sm-8">			
                                                <select name="salutation" style="width: auto!important" class="form-control" required>
                                                    <option value="">Bitte wählen</option> 
                                                    <option value="W">Frau</option>
                                                    <option value="M">Herr</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="firstname" class="col-sm-4 control-label">Vorname:<span class="star">&nbsp;*</span></label>
                                            <div class="col-sm-8">	
                                                <input class="form-control" id="firstname" name="firstname" placeholder="Vorname" value=''  type="text"  required/>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="lastname" class="col-sm-4 control-label">Nachname:<span class="star">&nbsp;*</span></label>
                                            <div class="col-sm-8">	
                                                <input class="form-control" id="lastname" name="lastname" value='' placeholder="Nachname" type="text"  required/>
                                            </div>
                                        </div>																
                                        <div class="form-group">
                                            <label for="birthday" class="col-sm-4 control-label">Geburtsdatum:<span class="star">&nbsp;*</span></label>
                                            <div class="col-sm-8" id="birthdayPicker" style="height:10px">	
                                            
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="nationality" class="col-sm-4 control-label">
                                                Nationalität:<span class="star">&nbsp;*</span>
                                            </label>
                                            <div class="col-sm-8">	
                                                <select name="nationality" class="form-control" id="nationality"  required> 
                                                    <option value="">Bitte wählen</option>
                                                    <?php foreach ($data['value_country'] as $country) {  ?>
                                                    <option value='<?=$country['country_id']?>'><?=$country['title']?></option>
                                                     <?php } ?>
                                                </select> 
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="ahv-number" class="col-sm-4 control-label">AHV Nummer:</label>
                                            <div class="col-sm-8">	
                                                <input class="form-control" id="ahv-number" name="ahv-number" value="" placeholder="AHV Nummer" type="text" />
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="street" class="col-sm-4 control-label">
                                                Strasse / Nr.:<span class="star">&nbsp;*</span>
                                            </label>	
                                            <div class="col-sm-8">		
                                                <input class="form-control" id="street" name="street" value="" size="30" placeholder="Strasse / Nr."  type="text"  required/>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="zip" class="col-sm-4 control-label">
                                                PLZ:<span class="star">&nbsp;*</span>
                                            </label>
                                            <div class="col-sm-8">		
                                                <input class="form-control" id="zip" name="zip" value="" size="30" placeholder="PLZ"  type="text"  required/>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="city" class="col-sm-4 control-label">
                                                Ort:<span class="star">&nbsp;*</span>
                                            </label>
                                            <div class="col-sm-8">	
                                                <input class="form-control" id="city" name="city" value="" size="30" placeholder="Ort" type="text"  required/>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label for="country" class="col-sm-4 control-label">
                                                Land:<span class="star">&nbsp;*</span>
                                            </label>
                                            <div class="col-sm-8">	
                                                <select name="country" class="form-control" id="country"  required> 
                                                    <option value="" selected="selected">Bitte wählen</option>
                                                    <?php foreach ($data['value_country'] as $country) { ?>
                                                    <option value='<?=$country['country_id']?>'><?=$country['title']?></option>
                                                     <?php } ?>
                                                </select> 
                                            </div>
                                        </div>                                                             
                                    </div>                                                                
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="phone" class="col-sm-4 control-label">
                                                Festnetz:
                                            </label>	
                                            <div class="col-sm-8">		
                                                <input class="form-control" id="phone" name="phone" value="" size="30" placeholder="Festnetz"  type="text" />
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="mobile" class="col-sm-4 control-label">
                                                Mobile:
                                            </label>
                                            <div class="col-sm-8">		
                                                <input class="form-control" id="mobile" name="mobile" value="" size="30" placeholder="Mobile"  type="text" />
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="email" class="col-sm-4 control-label">
                                                E-Mail:
                                            </label>
                                            <div class="col-sm-8">	
                                                <input class="form-control" id="email" name="email" value="" size="30" placeholder="E-Mail" type="text" />
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="profession" class="col-sm-4 control-label">Beruf:<span class="star">&nbsp;*</span></label>
                                            <div class="col-sm-8">	
                                                <input class="form-control" id="profession" name="profession" value="" placeholder="Beruf" type="text" required/>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="employment" class="col-sm-4 control-label">
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
                                        <div class="form-group">
                                            <label for="available" class="col-sm-4 control-label">
                                                Verfügbar ab:<span class="star">&nbsp;*</span>
                                            </label>
                                            <div class="col-sm-8">	
                                                <select name="available" id="available" class="form-control" required>
                                                    <option value="" selected="selected">Bitte wählen</option>
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
                                        <h4>Lebenslauf</h4>    
                                        <div class="row">
                                            <div class="col-md-9">
                                                <div class="form-group">
                                                    <label for="cv" class="col-sm-2 control-label">
                                                        Lebenslauf:
                                                    </label>	
                                                    <div class="col-sm-10">		
                                                        <input type="file" name="cvfile" id="cvfile" required />  
                                                    </div>     	                                                                          
                                                </div>
                                            </div>
                                        </div>
                                        <h4>Anhänge</h4>    
                                        <div class="row">
                                            <div class="col-md-9">
                                                <div class="form-group">
                                                    <label for="userfile_1" class="col-sm-2 control-label">
                                                        Anhang:
                                                    </label>	
                                                    <div class="col-sm-10">		
                                                        <input type="file" name="userfile1" id="userfile_1" />  
                                                    </div>     	                                                                          
                                                </div>
                                                <div class="form-group">
                                                    <label for="userfile_2" class="col-sm-2 control-label">
                                                        Anhang:
                                                    </label>	
                                                    <div class="col-sm-10">		
                                                        <input type="file" name="userfile2" id="userfile_2" />  
                                                    </div>     	                                                                          
                                                </div>
                                                <div class="form-group">
                                                    <label for="userfile_3" class="col-sm-2 control-label">
                                                        Anhang:
                                                    </label>	
                                                    <div class="col-sm-10">		
                                                        <input type="file" name="userfile3" id="userfile_3" />  
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
                                        <div class="form-group">
                                            <label class="col-sm-4 control-label" for="login_password_1">Passwort:<span class="star">&nbsp;*</span></label>	
                                            <div class="col-sm-8">			
                                                <input class="form-control" id="login_password_1" name="login_password" value="" placeholder="Passwort" type="password" />
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-sm-4 control-label" for="login_password_confirm_1">Passwort bestätigen:<span class="star">&nbsp;*</span></label>	
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
    </div>
</div>

<?php include 'footer.php'; ?>