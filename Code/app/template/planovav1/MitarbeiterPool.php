<?php
include 'header.php';
$classMitarbeiterFinden = 'active'; // •
include 'navigation.php';
?>
<div class="pl-cmmn-cnt-section">

    <!-- Mitarbeiter-Pool Content -->
    <div class="pl-arb-finden">
        <div class="container">
            <div class="row">	
                <div class="pl-arb-finden-srch">
                    <h1 class="bs-title">MITARBEITER-POOL</h1>
                    <form id="srch-wrk" class="pl-form" method="post" action="<?= WEB_URL ?>/Client/MitarbeiterPool">							
                        <div class="form-row">
                            <div class="form-group col-lg-5">
                                    <label for="occupation" class="text-info">BERUF</label><br>
                                    <input type="text" class="form-control" id="occupation" name="occupation" value="<?=$data['filter']['occupation']?>"/>
                            </div> 
                            <div class="form-group col-lg-5 wo-select">
                                <label for="Kanton" class="text-info">REGION</label><br>
                                <select name="regions[]" id="Kanton" class="form-control pl-kanton multiSelect" multiple="multiple" style="display: none;">
                                    <?php foreach ($data['region'] as $region) { ?>                                                                                                                                       
                                    <option value="<?=$region->region_id?>" <?=(!empty($data['filter']['regions']) && in_array($region->region_id,$data['filter']['regions'])) ? 'selected' : '' ?>><?=$region->title?></option>
                                    <?php } ?>																
                                </select>
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
                        </div>
                    </form>
                <?php foreach ($data['candidateList'] as $candidate) {

                        ?>
                    <div class="pl-arb-finden-result">
                        <div class="pl-arb-name">
                            <h2 class="pl-md-heading"><a href="/Client/MitarbeiterProfil/<?=$candidate->hrc_cand_id;?>"><?=$candidate->cand_profession;?></a> <span class="pl-star-icon pl-book"><i class="fa fa-star-o" aria-hidden="true"></i></span></h2>
                            <p class="pl-job-info"><span><strong>Ort:</strong> <?=$candidate->cand_city;?></span> <span><strong>Verfügbar:</strong> Ab sofort</span></p>
                        </div>
                        <div class="pl-arb-address">
                            <p><span class="pl-job-desc"><?=$candidate->city;?> <br />Ref. Nr. <?=$candidate->hrc_cand_id;?></span>
                            <a href="/Client/MitarbeiterProfil/<?=$candidate->hrc_cand_id;?>" class="pl-cmmn-btn float-right">ansehen</a></p>
                        </div>
                    </div>
                   <?php } ?>
                    <div class="pl-pagination">
                        <ul class="pagination pg-blue justify-content-center">

                                <?php

                            for($i=1;$i<$data['pages'];$i++){
                                if($i==$data['activepage']) {
                                   $current = '';
                                   $class = 'active' ;
                                }else{
                                    $current='';
                                    $class = '';
                                }


                            ?>
                        <li class="page-item"><a class="page-link <?=$class?>" href="/Client/MitarbeiterPool/<?=$i?>?occupationGroups=<?=!empty($data['filter']['occupationGroups']) ? $data['filter']['occupationGroups']:''?>&jobtitle=<?=$data['filter']['occupation']?>&regions=<?=!empty($data['filter']['regions']) ? $data['filter']['regions'] : ''?>&employmentType=<?=!empty($data['filter']['employmentType']) ? $data['filter']['employmentType'] : ''?>"><?=$i?></a></li>
                        <?php } ?>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Mitarbeiter-Pool Content Ends -->
                        
<?php include 'footer.php'; ?>