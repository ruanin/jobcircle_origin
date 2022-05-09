<?php
include 'header.php';
$classHome = 'class="active"'; // 
include 'navigation.php';
?>
<div class="pl-cmmn-cnt-section">
    <div class="pl-fwrk">
        <div class="pl-brdcrumb">
            <a href="/Client/MitarbeiterPool">Zurück zur Auswahl</a>
        </div>
        <div class="pl-srh-wrk">
            <h1 class="bs-title"><?=$data['profile_data']['cand_firstname'][0]."."?> aus <?=$data['profile_data']['cand_city']?></h1>
            <span class="pl-publish">&nbsp;</span>
        </div>
        <div class="pl-srch-details mt-4">
            <div class="pl-srch-lft-info">
                <span class="pl-md-heading"><?=$data['profile_data']['cand_profession']?></span>					
                <span class="pl-star-icon pl-book"><i class="fa fa-star-o" aria-hidden="true"></i></span>					
                <p>
                    <span class="pl-op-semi">Referenz-Nr. <?=$data['profile_data']['hrc_cand_id']?></span>
                </p>
<!--                <a href="#" class="pl-cmmn-btn mt-0">jetzt kontaktieren</a>
                <div class="pl-scl-media-icons">
                    <ul>
                        <li><a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
                        <li><a href="#"><i class="fa fa-envelope" aria-hidden="true"></i></a></li>
                        <li><a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
                        <li><a href="#"><i class="fa fa-linkedin" aria-hidden="true"></i></a></li>
                    </ul>
                </div>-->
            </div>
            <div class="pl-srch-rht-info">
                <div class="pl-sect1">
                    <span class="pl-semibold pl-inner-cnt">BERUFLICHE ERFAHRUNGEN <i class="fa fa-angle-down" aria-hidden="true"></i></span>
                    <ul class="show-list" style="display:block;">
                        <?php if(!empty($data['professionSkills'])){ 
                            foreach($data['professionSkills'] as $skillKey => $skillData){ ?>
                        <li><p><span class="pl-txt-regular"><?=$skillData['profession']?> <?=!empty($skillData['duration']) ? '('.$skillData['duration'].')' : ''?></span> <?=implode(", ",$skillData['skills'])?></p></li>
                        <?php }
                        }?>
                    </ul>
                </div>
                <div class="pl-sect1">
                    <span class="pl-semibold pl-inner-cnt">PERSÖNLICHE FÄHIGKEITEN <i class="fa fa-angle-down" aria-hidden="true"></i></span>
                    <ul class="show-list">
                        <?php if(!empty($data['personalSkills'])){ 
                            foreach($data['personalSkills'] as $persSkillKey => $persSkillData){ ?>
                                <li><p><span class="pl-txt-regular"><?=$persSkillData?></span></p></li>
                            <?php }
                        }?>
                    </ul>
                </div>
                <div class="pl-sect1">
                    <span class="pl-semibold pl-inner-cnt">ERGÄNZENDE ANGABEN <i class="fa fa-angle-down" aria-hidden="true"></i></span>
                    <ul class="show-list">
                        <?php if(!empty($data['profile_data']['cand_work_regions'])) { ?><li><p><span class="pl-txt-regular">Arbeitsregion </span> <?=$data['profile_data']['cand_work_regions']?></p></li><?php } ?>
                        <?php if(!empty($data['profile_data']['cand_req_employment_id'])) { ?><li><p><span class="pl-txt-regular">Anstellungsart </span> <?=implode(', ', $data['profile_data']['cand_req_employment_id'])?></p></li><?php } ?>
                        <li><p><span class="pl-txt-regular">Geschlecht</span> <?=$data['profile_data']['cand_salutation']?></p></li>
                        <li><p><span class="pl-txt-regular">Verfügbar ab</span> <?=$data['profile_data']['cand_req_available_from_date']?></p></li>
                        <?php if(!empty($data['profile_data']['cand_driver_license'])) { ?><li><p><span class="pl-txt-regular">Führerausweise</span> <?=implode(', ', $data['profile_data']['cand_driver_license'])?></p></li><?php } ?>
                    </ul>
                </div>
            </div>
        </div>
        <div class="pl-srch-cnt-info mb-5">
            <a href="tel:0848752668" id="contactText" onclick="showPhoneNumber();">JETZT KONTAKTIEREN</a>
            <a href="tel:0848752668" id="contactPhoneNumber" class="hide">0848 752 668</a>
        </div>
    <!-- Mitarbeiter-Pool Content Ends -->
    </div>
<?php include 'footer.php'; ?>