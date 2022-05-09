<?php include 'header.php'; ?>
<?php include 'navigation.php'; ?>
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
<div class="header-page-title">
			<div class="container">
				<h1>Personalanfrage</h1>

				<ul class="breadcrumbs">
					<li><a href="#">Für Unternehmen</a></li>
					<li><a href="#">Personalanfrage</a></li>
				</ul>
			</div>
		</div>
	</header> <!-- end #header -->

	<div id="page-content">
		<div class="container">
			<div class="row">
				¨

					<div class="white-container sign-up-form">
						<div>

							<section>
								<h6 class="bottom-line">Angaben zum Stellenangebot</h6>
                                                                
								<h6 class="label">Stellenbezeichnung</h6>

								<div class="row">
									<div class="col-sm-4">
										<input type="text" class="form-control" placeholder="Stellenbezeichnung">
									</div>
								</div>
                                                                
                                                                <h6 class="label">Beruf</h6>

								<div class="row">
									<div class="col-sm-4">
										<input type="text" class="form-control" placeholder="Beruf">
									</div>
                                                                    
                                                                        <div class="col-sm-4">
										<select>
											<option value="">Ausbildung</option>
											<option value="">gelernter</option>
											<option value="">Arbeiter mit Fachkenntnissen</option>
											<option value="">Arbeiter ohne Fachkenntnisse</option>
										</select>
									</div>
                                                                    
                                                                        <div class="col-sm-4">
										<select>
											<option value="">Berufserfahrung</option>
											<option value="">weniger als 1 Jahr</option>
											<option value="">mehr als 1 Jahr</option>
											<option value="">mehr als 3 Jahre</option>
										</select>
									</div>
								</div>
                                                                
                                                                
                                                                <h6 class="label">Tätigkeit / Anforderungen:</h6>
                                                                <div class="row">
									<div class="col-sm-4">
										<textarea name="Text1" cols="40" rows="5"></textarea>
									</div>
								</div>
                                                                
                                                                <h6 class="label">Arbeitspensum:</h6>
                                                                <div class="row">
									<div class="col-sm-4">
										<fieldset>
                                                                                    <?php foreach ($data['workload'] as $workload) { ?>
                                                                                        <div class="col-sm-6"><input type="radio" id="mc" name="workload" value="<?=$workload->workload_id;?>"><label for="mc"> <?=$workload->name;?></label></div>
                                                                                    <?php } ?>
                                                                                  </fieldset>
									</div>
								</div>
                                                                
                                                                <h6 class="label">Stellenantritt:</h6>
                                                                <div class="row">
									<div class="col-sm-4">
										<select>
											<option value="">per Sofort</option>
											<option value="">nach Vereinbarung</option>
                                                                                        <option value="">gemäss Eintrittsdatum</option>
										</select>
									</div>
                                                                        
                                                                    <div class="col-sm-4">
										<input type="text" class="form-control" placeholder="Eintrittsdatum">
									</div>
								</div>
                                                                
                                                                <h6 class="label">Anstellungsart:</h6>
                                                                <div class="row">
									<div class="col-sm-4">
										 <fieldset> 
                                                                                     <?php foreach ($data['employment'] as $employement) { ?>
                                                                                    <div class="col-sm-7"><label for="check1">
                                                                                        <input type="checkbox" name="employment" value="<?=$employement->emplyment_id;?>" id="check1">
                                                                                        <?=$employement->name;?>
                                                                                      </label> </div>
                                                                                        <?php } ?>
                                                                                  </fieldset> 
									</div>
								</div>
                                                                
                                                                <h6 class="label">Führerausweis:</h6>
                                                                <div class="row">
									<div class="col-sm-4">
										 <fieldset> 
											
											<?php foreach ($data['license'] as $license) { ?>
                                                                                            <div class="col-sm-4"><label for="check1">
                                                                                        <input type="checkbox" name="license" value="<?=$license->driver_license_id;?>" id="check1">
                                                                                        <?=$license->name;?>
                                                                                      </label> </div>
                                                                                        <?php } ?>
										</fieldset> 
									</div>
								
                                                                
                                                                
                                                                
									<div class="col-sm-4">
										<select>
                                                                                        <option value="">Fahrzeug erforderlich</option>
											<option value="">JA</option>
											<option value="">Nein</option>
										</select>
									</div>
								</div>
                                                                
                                                                <h6 class="label">Einsatzort:</h6>

								<div class="row">
									<div class="col-sm-6">
										<input type="text" class="form-control" placeholder="Strasse / Nr">
									</div>

								</div>

								<div class="row">
									

									<div class="col-sm-3">
										<input type="text" class="form-control" placeholder="Ort">
									</div>

									<div class="col-sm-3">
										<input type="text" class="form-control" placeholder="PLZ">
									</div>
								</div>
							</section>

							<section>
								<h6 class="bottom-line">Unternehmen:</h6>

								<h6 class="label">Name</h6>

								<div class="row">
									<div class="col-sm-4">
										<input type="text" class="form-control" placeholder="Name">
									</div>
								</div>

								

								<h6 class="label">Phone</h6>

								<div class="row">
									<div class="col-sm-4">
										<input type="text" class="form-control" placeholder="Mobile">
									</div>

									<div class="col-sm-4">
										<input type="text" class="form-control" placeholder="Work">
									</div>

									<div class="col-sm-4">
										<input type="text" class="form-control" placeholder="Fax">
									</div>
								</div>
                                                                
                                                                

								<h6 class="label">Adresse</h6>

								<div class="row">
									<div class="col-sm-6">
										<input type="text" class="form-control" placeholder="Strasse / Nr">
									</div>

								</div>

								<div class="row">
									

									<div class="col-sm-3">
										<input type="text" class="form-control" placeholder="Ort">
									</div>

									<div class="col-sm-3">
										<input type="text" class="form-control" placeholder="PLZ">
									</div>
								</div>
                                                                
                                                                <h6 class="label">Wunschfiliale wählen:</h6>
                                                                <div class="row">
									<div class="col-sm-4">
										<select>
											 <?php foreach ($data['department'] as $workload) { ?>
                                                                                                <option value=""><?=$workload->name?></option>
											 <?php } ?>
										</select>
									</div>
								</div>
							</section>

							<section>
								<h6 class="bottom-line">Kontaktperson</h6>
                                                                    
                                                                <h6 class="label">Anrede:</h6>
                                                                <div class="row">
									<div class="col-sm-4">
										<select>
											<option value="">keine Auswahl</option>
											<option value="">Frau</option>
											<option value="">Herr</option>
										</select>
									</div>
								</div>
                                                                
                                                                <h6 class="label">Nachname, Vorname</h6>
                                                                <div class="row">
									

									<div class="col-sm-4">
										<input type="text" class="form-control" placeholder="Nachname">
									</div>

									<div class="col-sm-4">
										<input type="text" class="form-control" placeholder="Vorname">
									</div>
                                                                    
								</div>
                                                                
                                                                <h6 class="label">Telefon</h6>

								<div class="row">
									<div class="col-sm-4">
										<input type="text" class="form-control" placeholder="Mobile">
									</div>

									<div class="col-sm-4">
										<input type="text" class="form-control" placeholder="Work">
									</div>

									<div class="col-sm-4">
										<input type="text" class="form-control" placeholder="Fax">
									</div>
								</div>
                                                                
                                                                <h6 class="label">E-Mail</h6>

								<div class="row">
									<div class="col-sm-4">
										<input type="text" class="form-control" placeholder="Email">
									</div>

								</div>
								
							</section>

							
						</div>

						<hr class="mt60">

						<div class="clearfix">
							<a href="#" class="btn btn-default btn-large pull-right">Anfrage Versenden</a>
						</div>
					</div>
				</div> <!-- end .page-content -->
			</div>
		</div> <!-- end .container -->
	</div> <!-- end #page-content -->
<?php include 'footer.php'; ?>
