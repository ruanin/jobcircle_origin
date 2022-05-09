<?php
$headerTitle = "Temporärbüro Jobsuche - Jobsuche in allen Branchen und auf allen Stufen";
include 'header.php';
$classVacancy = ' active '; // •
include 'navigation.php';

?>
<div class="pl-cmmn-cnt-section">

        <!-- Arbeit Finden Content -->
                <div class="pl-arb-finden">
                    <div class="container">
                        <div class="row">	
                            <div class="pl-arb-finden-srch">
                                <h1 class="bs-title">ARBEIT FINDEN</h1>
				<form id="srch-wrk" class="pl-form" method="post" action="<?= WEB_URL ?>/Vacancyboard">							
	                            <div class="form-row">
	                            	<div class="form-group col-lg-5">
		                                <label for="jobtitle" class="text-info">WAS?</label><br>
						<input type="text" class="form-control" id="jobtitle" name="jobtitle" value="<?=$data['filter']['occupation']?>"/>
					</div> 
                                        <div class="form-group col-lg-5 wo-select">
                                            <label for="city" class="text-info">WO?</label><br>
                                            <input type="text" class="form-control" id="city" name="city" value="<?=$data['filter']['city']?>"/>
                                        </div>
                                        <div class="form-group col-lg-2">
                                            <button type="submit" class="btn pl-find-btn"><i class="fa fa-search" aria-hidden="true"></i></button>
                                        </div>
		                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-lg-3">
                                            <div class="custom-control custom-checkbox pl-cust-checkbox">
                                                <input type="checkbox" class="custom-control-input" id="customCheck1" value="5" name="employmentType[]" <?=(!empty($data['filter']['employmentType']) && in_array(5,$data['filter']['employmentType'])) ? 'checked' : '' ?>>
                                                <label class="custom-control-label" for="customCheck1">Festanstellung</label>
                                            </div>
                                        </div>
                                        <div class="form-group col-lg-3">
                                            <div class="custom-control custom-checkbox pl-cust-checkbox">
                                                <input type="checkbox" class="custom-control-input" id="customCheck2" value="8" name="employmentType[]" <?=(!empty($data['filter']['employmentType']) && in_array(8,$data['filter']['employmentType'])) ? 'checked' : '' ?>>
                                                <label class="custom-control-label" for="customCheck2">Temporärarbeit</label>
                                            </div>
                                        </div>
                                        <div class="form-group col-lg-6">		                              
                                           <div class="panel panel-info pl-filter">
                                                <div class="panel-heading collapsed" data-toggle="collapse" id="hide-filter"  data-target="#bar">
                                                    <span class="pl-drop-downfrm">weitere Filter</span> 
                                                    <i class="fa fa-caret-down" aria-hidden="true"></i>
                                                    <i class="fa fa-caret-right" aria-hidden="true"></i>
                                                </div>
                                                <div class="panel-body">												
                                                    <div class="collapse pl-filter-form" id="bar">
                                                        <div class="form-group">
                                                            <label for="Fachbereich" class="text-info">Fachbereich</label>
                                                            <select name="occupationGroups[]" id="Fachbereich" class="form-control multiSelect" multiple="multiple" style="display: none;">
                                                                <?php foreach ($data['professiongroup'] as $professiongroup) { ?>
                                                                <option value="<?=$professiongroup->profession_id?>" <?=(!empty($data['filter']['occupationGroups']) && in_array($professiongroup->profession_id,$data['filter']['occupationGroups'])) ? 'selected' : '' ?>><?=$professiongroup->name?></option>
                                                                <?php } ?>
                                                            </select> 
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="Kanton" class="text-info">Kanton</label>
                                                            <select name="regions[]" id="Kanton" class="form-control pl-kanton multiSelect" multiple="multiple" style="display: none;">
                                                                <?php foreach ($data['region'] as $region) { ?>                                                                                                                                       
                                                                <option value="<?=$region->region_id?>" <?=(!empty($data['filter']['regions']) && in_array($region->region_id,$data['filter']['regions'])) ? 'selected' : '' ?>><?=$region->title?></option>
                                                                <?php } ?>																
                                                            </select>
                                                        </div> 
                                                        <div class="form-group">
                                                            <label for="Referenznummer" class="text-info">Referenznummer</label>
                                                            <input type="text" name="refkey" id="Referenznummer" class="form-control">
                                                        </div> 
                                                    </div>
                                                </div>	
                                                <a class="pl-meine-merkliste" href="#" onclick="pl-whish()">
                                                        <span class="pl-star-icon"><i class="fa fa-star-o" aria-hidden="true"></i></span>
                                                        <span>Meine Merkliste (2)</span>
                                                </a>
                                                <div class="pl-whishlist-sect">
                                                    <div class="pl-ws-hover-data">
                                                            <div class="pl-ws-lft">
                                                                    <p><a href="#"><span class="pl-ws-title">Montage-Elektriker/in EFZ</span></a> 3100 Bern</p>
                                                            </div>
                                                            <div class="pl-ws-rht">
                                                                    <span>Festanstellung</span>
                                                            </div>
                                                    </div>

                                                    <div class="pl-ws-hover-data">
                                                        <div class="pl-ws-lft">
                                                            <p><a href="#"><span class="pl-ws-title">Montage-Elektriker/in EFZ</span></a> 3100 Bern</p>
                                                        </div>
                                                        <div class="pl-ws-rht">
                                                            <span>Festanstellung</span>
                                                        </div>
                                                    </div>
                                                </div>	
                                            </div>	
                                        </div>
                                    </div>
                                </form>
                            <?php foreach ($data['vacancylist'] as $job) {
                                    $arrEmployment = $job->value_employment()->get();
                                    ?>
	                        <div class="pl-arb-finden-result">
                                    <div class="pl-arb-name">
                                        <h2 class="pl-md-heading"><a href="/Vacancyboard/Detail/<?=$job->vac_info_id;?>"><?=$job->jobtitle;?></a> <span class="pl-star-icon pl-book"><i class="fa fa-star-o" aria-hidden="true"></i></span></h2>
                                        <span class="pl-job-type"><?=$arrEmployment[0]->name?></span>
                                    </div>
                                    <div class="pl-arb-address">
                                        <p><span class="pl-job-desc"><?=$job->zip;?> <?=$job->city;?> <br />Ref. Nr. <?=$job->unique_key;?></span>
                                        <a href="/Vacancyboard/Detail/<?=$job->vac_info_id;?>" class="pl-cmmn-btn float-right">ansehen</a></p>
                                    </div>
	                        </div>
	                       <?php } ?>
                                
                                <?php if(count($data['vacancylist']) == 0){ ?> 
                                <div class="pl-arb-finden-srch">
                                    <h4 class="pl-semibold">Keine "<?=$data['filter']['occupation']?>" Jobs.</h4>
                                    <h5 class="pl-semibold">Auch Initiativbewerbungen sind erwünscht: Nenne uns die Tätigkeitsfelder, für die du dich interessierst und in denen du unser Team sinnvoll ergänzen würdest. Wir werden dann die Einsatzmöglichkeiten individuell prüfen und dir in jedem Fall ein Feedback geben.</h5>
                                    <a href="<?= WEB_URL ?>/Pages/SpontanApply" class="pl-btn-cmmn pl-cust-btn-step mt-5">Spontanbewerbung</a>
                                </div>
                                <?php } ?>
	                        <div class="pl-pagination">
                                    <ul class="pagination pg-blue justify-content-center">

                                            <?php

                                        for($i=1;$i<$data['pages'];$i++){
                                            if($i==$data['activepage']) {
                                               $current = '<span class="sr-only">(current)</span>';
                                               $class = "active" ;
                                            }else{
                                                $current='';
                                                $class = '';
                                            }


                                        ?>
                                    <li class="page-item"><a class="page-link <?=$class?>" href="/Vacancyboard/<?=$i?>?occupationGroups=<?=!empty($data['filter']['occupationGroups']) ? $data['filter']['occupationGroups']:''?>&jobtitle=<?=$data['filter']['occupation']?>&regions=<?=!empty($data['filter']['regions']) ? $data['filter']['regions'] : ''?>&employmentType=<?=!empty($data['filter']['employmentType']) ? $data['filter']['employmentType'] : ''?>"><?=$i?> <?=$current?></a></li>
                                    <?php } ?>
                                    </ul>
	                        </div>
                            </div>
			</div>
                    </div>
		</div>
		<!-- Arbeit Finden Content Ends -->
                        
<?php include 'footer.php'; ?>