<?php 
include 'header.php';
include 'navigation.php';?>
<link rel="stylesheet" href="<?=WEB_URL?>/tmpl_planova/css/wizard.css">

<div class="container mt-20">
    <div class="row">	
        <div class="col-md-3 less-pad-right">
            <div class="box-wrapper">
                <div class="single-page-item">										
                    <h3><span>Login</span></h3>
                    <form role="form">
                        <div class="form-group">
                            <label for="inputEmail3" class="col-sm-4 control-label">Benutzername:</label>
                            <input type="text" class="form-control" id="inputEmail3" placeholder="Benutzername" required />
                        </div>
                        <div class="form-group">
                            <label for="inputPassword3" class="col-sm-4 control-label">Passwort:</label>
                            <input type="password" class="form-control" id="inputPassword3" placeholder="Passwort" required />
                        </div>
                        <div class="checkbox">
                            <label>
                              <input type="checkbox"> Angemeldet bleiben
                            </label>
                        </div>
                        <div class="css-submit-btn">
                            <button type="submit" class="btn btn-submit"> Anmelden</button>
                        </div>
                    </form>
                    <ul id="css_ul">
                        <li><a href="">Benutzername vergessen?</a></li>
                        <li><a href="">Passwort vergessen?</a></li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="col-md-9">
            <div class="box-wrapper">
                <div class="single-page-item">
                    <h1 style="margin-left:7px;margin-right:7px;padding-bottom: 10px;">Bewerbung als Maler/in (Ref-Nr. 62525378)</h1>
                    <div id="error" class="alert alert-danger" style="display:none;margin-left:7px;margin-right:7px;"><strong>Die eingegebene Mobile-Nummer scheint ungültig zu sein. Bitte geben Sie eine gültige Mobile-Nummer ein.</strong></div>
                    <form id="apply-wizard" action="#" class="form-horizontal" method="POST">
                        <input type="hidden" name="task" id="task" value="apply" />
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
                                                <option value="W" <?=$w?>>Frau</option> 
                                                <option value="M" <?=$m?>>Herr</option> 														
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
                                        <div class="col-sm-8">	
                                            <input class="form-control" id="birthday" name="birthday" pattern="^[0-9]{2}.[0-9]{2}.[0-9]{4}$" value="" placeholder="Geburtsdatum" type="input" required/>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="nationality" class="col-sm-4 control-label">
                                            Nationalität:<span class="star">&nbsp;*</span>
                                        </label>
                                        <div class="col-sm-8">	
                                            <select name="nationality" class="form-control" id="nationality"  required> 
                                                <option>Bitte wählen</option>
                                                <option value='1' >Schweiz</option>
                                            </select> 
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
                                                <option selected="selected">Bitte wählen</option>
                                                <option value='1'>Schweiz</option>
                                            </select> 
                                        </div>
                                    </div>   
                                     <div class="form-group">
                                        <label for="profession" class="col-sm-4 control-label">Beruf:<span class="star">&nbsp;*</span></label>
                                        <div class="col-sm-8">	
                                            <input class="form-control" id="profession" name="profession" value="<?=$data['profile_form']['profession']?>" placeholder="Beruf" type="text" required/>
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
                                                    <input type="file" name="cvfile" id="cvfile" accept="image/jpeg,image/jpg,image/png,application/pdf" required />  
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
                                                    <input type="file" name="userfile" id="userfile_1" accept=".jpeg,.jpg,.png,.pdf" />  
                                                </div>     	                                                                          
                                            </div>
                                            <div class="form-group">
                                                <label for="userfile_2" class="col-sm-2 control-label">
                                                    Anhang:
                                                </label>	
                                                <div class="col-sm-10">		
                                                    <input type="file" name="userfile" id="userfile_2" accept=".jpeg,.jpg,.png,.pdf" />  
                                                </div>     	                                                                          
                                            </div>
                                            <div class="form-group">
                                                <label for="userfile_3" class="col-sm-2 control-label">
                                                    Anhang:
                                                </label>	
                                                <div class="col-sm-10">		
                                                    <input type="file" name="userfile" id="userfile_3" accept=".jpeg,.jpg,.png,.pdf" />  
                                                </div>     	                                                                          
                                            </div>
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

<?php include 'footer.php'; ?>