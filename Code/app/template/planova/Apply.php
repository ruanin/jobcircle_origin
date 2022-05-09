<?php include 'header.php';
$classCandidate = 'active';
$classSubPageAnonymApply = 'class="active"';
$breadcrumb[] = array('title' => 'Für Bewerber',
                      'url' => '/Pages/candidate',
                    'active' => false);
$breadcrumb[] = array('title' => 'Spontanbewerbung',
                      'url' => '',
                    'active' => true);
include 'navigation.php'; ?>
<section class="form-wrapper mt-15">
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <div class="left-about-sidebar box-wrapper">
                    <div class="sidebar-content">										
                        <h3><span>Login</span></h3>
                        <form role="form" method="POST">
                            <div class="form-group">
                                <label for="inputEmail3" class="col-sm-4 control-label">Benutzername:</label>
                                <input type="text" class="form-control" id="inputEmail3" placeholder="Benutzername">
                            </div>
                            <div class="form-group">
                                <label for="inputPassword3" class="col-sm-4 control-label">Passwort:</label>
                                <input type="password" class="form-control" id="inputPassword3" placeholder="Passwort">
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

            <div class="col-md-8">
                <div class="box-wrapper">
                    <div class="single-page-item">
                        <h1>SPONTANBEWERBUNG</h1>
                        <p><strong>Spontanbewerbungen sind bei planova durchaus willkommen.</strong><br>
                            Senden Sie Ihre vollständigen Bewerbungsunterlagen an uns - wir werden Antworten und Ihnen eine entsprechende Nachricht für weitere Schritte geben.</p>
                        <div class="contact-form">
                            <form class="form-horizontal" method="POST" action="/Candidate/apply">	
                                <div class="row">
                                    <div class="col-md-6">
                                        <h4>Persönliche Angaben</h4>
                                        <div class="form-group">
                                            <label class="col-sm-4 control-label">*Anrede:</label>	
                                            <div class="col-sm-8">			
                                                <select style="width: auto!important" class="form-control" required>
                                                    <option value="0">keine Auswahl</option> 
                                                    <option value="1">Frau</option> 
                                                    <option value="2">Herr</option> 														
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="firstname" class="col-sm-4 control-label">*Vorname:</label>
                                            <div class="col-sm-8">	
                                                <input class="form-control" id="firstname" name="firstname" value="" placeholder="Vorname"  type="text" required />
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="lastname" class="col-sm-4 control-label">*Nachname:</label>
                                            <div class="col-sm-8">	
                                                <input class="form-control" id="lastname" name="lastname" value="" placeholder="Nachname" type="text" required/>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="birthday" class="col-sm-4 control-label">*Geburtsdatum:</label>
                                            <div class="col-sm-8">	
                                                <input class="form-control" id="birthday" name="birthday" value="" placeholder="Geburtsdatum" type="date" required/>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <h4>Adressangaben</h4>
                                        <div class="form-group">
                                            <label for="street" class="col-sm-4 control-label">
                                                *Adresse:
                                            </label>	
                                            <div class="col-sm-8">		
                                                <input class="form-control" id="street" name="street" value="" size="30" placeholder="Adresse"  type="text" required />
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="zip" class="col-sm-4 control-label">
                                                *PLZ:
                                            </label>
                                            <div class="col-sm-8">		
                                                <input class="form-control" id="zip" name="zip" value="" size="30" placeholder="PLZ"  type="text" required/>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="city" class="col-sm-4 control-label">
                                                *Ort:
                                            </label>
                                            <div class="col-sm-8">	
                                                <input class="form-control" id="city" name="city" value="" size="30" placeholder="Ort" type="text" required/>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="country" class="col-sm-4 control-label">
                                                *Land:
                                            </label>
                                            <div class="col-sm-8">	
                                                <select class="form-control" name="country" required> 
                                                    <option selected="selected">Keine Auswahl</option>
                                                    <option>Schweiz</option>
                                                    <option>Deutschland</option>
                                                    <option>Österreich</option>
                                                    <option>Belgien</option>
                                                    <option>Frankreich</option>
                                                    <option>Italien</option>
                                                    <option>Luxemburg</option>
                                                    <option>Niederlande</option>
                                                    <option>Dänemark</option>
                                                    <option>Vereinigtes Königreich von Großbritannien und Nordirland</option>
                                                    <option>Irland, Republik</option>
                                                    <option>Griechenland</option>
                                                    <option>Portugal</option>
                                                    <option>Spanien</option>
                                                    <option>Finnland</option>
                                                    <option>Schweden</option>
                                                    <option>Estland</option>
                                                    <option>Lettland</option>
                                                    <option>Litauen</option>
                                                    <option>Malta</option>
                                                    <option>Slowakei</option>
                                                    <option>Slowenien</option>
                                                    <option>Tschechische Republik</option>
                                                    <option>Ungarn</option>
                                                    <option>Bulgarien</option>
                                                    <option>Rumänien</option>
                                                    <option>Kroatien</option>
                                                    <option>Mazedonien</option>
                                                    <option>Montenegro</option>
                                                    <option>Serbien</option>
                                                    <option>Türkei</option>
                                                    <option>Island</option>
                                                    <option>Zypern, Republik</option>
                                                    <option>Afghanistan</option>
                                                    <option>Albanien</option>
                                                    <option>Algerien</option>
                                                    <option>Amerikanisch-Samoa</option>
                                                    <option>Amerikanische Jungferninseln</option>
                                                    <option>Andorra</option>
                                                    <option>Angola</option>
                                                    <option>Anguilla</option>
                                                    <option>Antarktis</option>
                                                    <option>Antigua und Barbuda</option>
                                                    <option>Argentinien</option>
                                                    <option>Armenien</option>
                                                    <option>Aruba</option>
                                                    <option>Aserbaidschan</option>
                                                    <option>Australien</option>
                                                    <option>Bahamas</option>
                                                    <option>Bahrain</option>
                                                    <option>Bangladesch</option>
                                                    <option>Barbados</option>
                                                    <option>Belize</option>
                                                    <option>Benin</option>
                                                    <option>Bermuda</option>
                                                    <option>Bhutan</option>
                                                    <option>Bolivien</option>
                                                    <option>Bosnien und Herzegowina</option>
                                                    <option>Botswana</option>
                                                    <option>Bouvetinsel</option>
                                                    <option>Brasilien</option>
                                                    <option>Britische Jungferninseln</option>
                                                    <option>Britisches Territorium im Indischen Ozean</option>
                                                    <option>Brunei Darussalam</option>
                                                    <option>Burkina Faso</option>
                                                    <option>Burundi</option>
                                                    <option>Canary Islands</option>
                                                    <option>Chile</option>
                                                    <option>China, Volksrepublik</option>
                                                    <option>Cookinseln</option>
                                                    <option>Costa Rica</option>
                                                    <option>Cote d'Ivoire</option>
                                                    <option>Dominica</option>
                                                    <option>Dominikanische Republik</option>
                                                    <option>Dschibuti</option>
                                                    <option>East Timor</option>
                                                    <option>East Timor</option>
                                                    <option>Ecuador</option>
                                                    <option>El Salvador</option>
                                                    <option>Eritrea</option>
                                                    <option>Falklandinseln</option>
                                                    <option>Fidschi</option>
                                                    <option>Französisch-Guayana</option>
                                                    <option>Französisch-Polynesien</option>
                                                    <option>Französische Süd- und Antarktisgebiete</option>
                                                    <option>Färöer</option>
                                                    <option>Gabun</option>
                                                    <option>Gambia</option>
                                                    <option>Georgien</option>
                                                    <option>Ghana, Republik</option>
                                                    <option>Gibraltar</option>
                                                    <option>Grenada</option>
                                                    <option>Grönland</option>
                                                    <option>Guadeloupe</option>
                                                    <option>Guam</option>
                                                    <option>Guatemala</option>
                                                    <option>Guinea, Republik</option>
                                                    <option>Guinea-Bissau, Republik</option>
                                                    <option>Guyana</option>
                                                    <option>Haiti</option>
                                                    <option>Heard und McDonaldinseln</option>
                                                    <option>Honduras</option>
                                                    <option>Hongkong</option>
                                                    <option>Indien</option>
                                                    <option>Indonesien</option>
                                                    <option>Irak</option>
                                                    <option>Iran</option>
                                                    <option>Israel</option>
                                                    <option>Jamaika</option>
                                                    <option>Japan</option>
                                                    <option>Jemen</option>
                                                    <option>Jersey</option>
                                                    <option>Jordanien</option>
                                                    <option>Kaimaninseln</option>
                                                    <option>Kambodscha</option>
                                                    <option>Kamerun</option>
                                                    <option>Kanada</option>
                                                    <option>Kap Verde, Republik</option>
                                                    <option>Kasachstan</option>
                                                    <option>Katar</option>
                                                    <option>Kenia</option>
                                                    <option>Kirgisistan</option>
                                                    <option>Kiribati</option>
                                                    <option>Kokosinseln</option>
                                                    <option>Kolumbien</option>
                                                    <option>Komoren</option>
                                                    <option>Kongo, Republik</option>
                                                    <option>Korea, Demokratische Volkrepublik</option>
                                                    <option>Korea, Republik</option>
                                                    <option>Kuba</option>
                                                    <option>Kuwait</option>
                                                    <option>Laos</option>
                                                    <option>Lesotho</option>
                                                    <option>Libanon</option>
                                                    <option>Liberia, Republik</option>
                                                    <option>Libyen</option>
                                                    <option>Liechtenstein, Fürstentum</option>
                                                    <option>Macao</option>
                                                    <option>Madagaskar, Republik</option>
                                                    <option>Malawi, Republik</option>
                                                    <option>Malaysia</option>
                                                    <option>Malediven</option>
                                                    <option>Mali, Republik</option>
                                                    <option>Marokko</option>
                                                    <option>Marshallinseln</option>
                                                    <option>Martinique</option>
                                                    <option>Mauretanien</option>
                                                    <option>Mauritius, Republik</option>
                                                    <option>Mayotte</option>
                                                    <option>Mexiko</option>
                                                    <option>Mikronesien, Föderierte Staaten von</option>
                                                    <option>Moldawien</option>
                                                    <option>Monaco</option>
                                                    <option>Mongolei</option>
                                                    <option>Montserrat</option>
                                                    <option>Mosambik</option>
                                                    <option>Myanmar</option>
                                                    <option>Namibia, Republik</option>
                                                    <option>Nauru</option>
                                                    <option>Nepal</option>
                                                    <option>Netherlands Antilles</option>
                                                    <option>Neukaledonien</option>
                                                    <option>Neuseeland</option>
                                                    <option>Nicaragua</option>
                                                    <option>Niger</option>
                                                    <option>Nigeria</option>
                                                    <option>Niue</option>
                                                    <option>Norfolkinsel</option>
                                                    <option>Norwegen</option>
                                                    <option>Nördliche Marianen</option>
                                                    <option>Oman</option>
                                                    <option>Pakistan</option>
                                                    <option>Palau</option>
                                                    <option>Palästinensische Autonomiegebiete</option>
                                                    <option>Panama</option>
                                                    <option>Papua-Neuguinea</option>
                                                    <option>Paraguay</option>
                                                    <option>Peru</option>
                                                    <option>Philippinen</option>
                                                    <option>Pitcairninseln</option>
                                                    <option>Polen</option>
                                                    <option>Puerto Rico</option>
                                                    <option>Romania</option>
                                                    <option>Ruanda, Republik</option>
                                                    <option>Russische Föderation</option>
                                                    <option>Réunion</option>
                                                    <option>Salomonen</option>
                                                    <option>Sambia, Republik</option>
                                                    <option>Samoa</option>
                                                    <option>San Marino</option>
                                                    <option>Saudi-Arabien, Königreich</option>
                                                    <option>Senegal</option>
                                                    <option>Seychellen, Republik der</option>
                                                    <option>Sierra Leone, Republik</option>
                                                    <option>Simbabwe, Republik</option>
                                                    <option>Singapur</option>
                                                    <option>Somalia, Demokratische Republik</option>
                                                    <option>Sri Lanka</option>
                                                    <option>St. Barthelemy</option>
                                                    <option>St. Eustatius</option>
                                                    <option>St. Helena</option>
                                                    <option>St. Kitts und Nevis</option>
                                                    <option>St. Lucia</option>
                                                    <option>St. Martin (Französische Antillen)</option>
                                                    <option>St. Martin (Niederländische Antillen)</option>
                                                    <option>St. Pierre und Miquelon</option>
                                                    <option>St. Vincent und die Grenadinen (GB)</option>
                                                    <option>Sudan</option>
                                                    <option>Suriname</option>
                                                    <option>Svalbard und Jan Mayen</option>
                                                    <option>Swasiland</option>
                                                    <option>Syrien</option>
                                                    <option>São Tomé und Príncipe</option>
                                                    <option>Südafrika, Republik</option>
                                                    <option>Südgeorgien und die Südlichen Sandwichinseln</option>
                                                    <option>Tadschikistan</option>
                                                    <option>Taiwan</option>
                                                    <option>Tansania, Vereinigte Republik</option>
                                                    <option>Thailand</option>
                                                    <option>The Democratic Republic of Congo</option>
                                                    <option>Togo, Republik</option>
                                                    <option>Tokelau</option>
                                                    <option>Tonga</option>
                                                    <option>Trinidad und Tobago</option>
                                                    <option>Tschad, Republik</option>
                                                    <option>Tunesien</option>
                                                    <option>Turkmenistan</option>
                                                    <option>Turks- und Caicosinseln</option>
                                                    <option>Tuvalu</option>
                                                    <option>Uganda, Republik</option>
                                                    <option>Ukraine</option>
                                                    <option>Uruguay</option>
                                                    <option>Usbekistan</option>
                                                    <option>Vanuatu</option>
                                                    <option>Vatikanstadt</option>
                                                    <option>Venezuela</option>
                                                    <option>Vereinigte Arabische Emirate</option>
                                                    <option>Vereinigte Staaten von Amerika</option>
                                                    <option>Vereinigte Staaten von Amerika kleinere Überseeinseln</option>
                                                    <option>Vietnam</option>
                                                    <option>Wallis und Futuna</option>
                                                    <option>Weihnachtsinsel</option>
                                                    <option>Weißrussland</option>
                                                    <option>Westsahara</option>
                                                    <option>Zentralafrikanische Republik</option>
                                                    <option>Ägypten</option>
                                                    <option>Äquatorialguinea, Republik</option>
                                                    <option>Äthiopien</option>
                                                </select> 
                                            </div>
                                        </div>
                                    </div>

                                </div>
                                <hr></hr>
                                <div class="row">
                                    <div class="col-md-6">
                                        <h4>Kontaktangaben</h4>
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
                                        <h4>Zusätzliche Angaben</h4>
                                        <div class="form-group">
                                            <label for="profession" class="col-sm-4 control-label">Beruf:</label>
                                            <div class="col-sm-8">	
                                                <input class="form-control" id="profession" name="profession" value="" placeholder="Beruf" type="text" />
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="employment" class="col-sm-4 control-label">
                                                Anstellungsart:
                                            </label>
                                            <div class="col-sm-8">		
                                                <select name="employment" id="employment" class="form-control">
                                                    <option selected="selected">Keine Auswahl</option>
                                                    <option>Aus- / Weiterbildung</option>
                                                    <option>Nebenberuflich</option>
                                                    <option>Aushilfe</option>
                                                    <option>Temporäranstellung</option>																					
                                                    <option>Festanstellung (befristet)</option>																					
                                                    <option>Try & Hire</option>
                                                    <option>Festanstellung </option>	
                                                    <option>Praktikum </option>	
                                                    <option> Freiberuflich</option>	
                                                    <option>Auftragsverhältnis </option>	
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="available" class="col-sm-4 control-label">
                                                Verfügbar ab:
                                            </label>
                                            <div class="col-sm-8">	
                                                <select name="available" id="available" class="form-control">
                                                    <option selected="selected">Keine Auswahl</option>
                                                    <option>per sofort</option>
                                                    <option>1 Woche</option>
                                                    <option>2 Wochen</option>
                                                    <option>1 Monat</option>																					
                                                    <option>2 Monate</option>																					
                                                    <option>3 Monate</option>
                                                    <option>mehr als 3 Monate</option>	
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <hr></hr>
                                <div class="row">
                                    <div class="col-md-6">
                                        <h4>Lebenslauf und Anhänge hochladen:</h4>
                                        <div class="form-group">
                                            <label for="cv" class="col-sm-4 control-label">
                                                Lebenslauf:
                                            </label>	
                                            <div class="col-sm-8">		
                                                <input type="file" id="cv">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="file" class="col-sm-4 control-label">
                                                Anhänge:
                                            </label>
                                            <div class="col-sm-8">		
                                                <input type="file" id="file">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <hr></hr>
                                <div class="contact-form-submit">
                                    <button class="btn btn-primary validate subbtn" type="submit">Bewerbung abschicken</button>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="post">
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>											
                </div>
            </div>
        </div>
    </div>
</section>
<?php include 'footer.php'; ?>