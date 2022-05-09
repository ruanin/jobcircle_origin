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

<?php  $cand_profile_id = $_SESSION['cand_profile_id'];  ?>

<?php 
                $ObjCandProfile = $this->model('cand_profile');
                $pointsMultiplier = 5;
                $countPoints = $pointsMultiplier * $ObjCandProfile->where('esrc', $_SESSION['cand_profile_id'])
                                              ->count(); ?>


<script> //Copy To Clipboard function
    
			 function copyToClipboard(element){

			  let copyText = document.querySelector(".copy-text");
					  
			  
			  let input = copyText.querySelector("input.text");
			  input.select("input.text");
			  document.execCommand("copy");
			  copyText.classList.add("active");
			  window.getSelection().removeAllRanges();
                          
			      

			    }
                            
                        function copyToClipboard2(element){

			  let copyText2 = document.querySelector(".copy-text2");
					  
			  
			  let input = copyText2.querySelector("input.text");
			  input.select("input.text");
			  document.execCommand("copy");
			  copyText2.classList.add("active");
			  window.getSelection().removeAllRanges();
                          
			       

			    }
</script>


<div class="pl-cmmn-cnt-section">
    <div class="pl-ueber">
        <h1 class="bs-title">WEITEREMPFEHLUNGEN</h1>
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
                                <h4 class="profile-title">Weiterempfehlungen</h4>
                                <hr></hr>
                                
                                    <input type="hidden" name="form" value="affiliate">
                                    <input type="hidden" name="task" value="edit">

                                    <div class="row">
                                        <div class="col-md-6">
                                           
                                            <div class="form-group row">
                                                
                                                <div class="col-sm-12">
                                                    <p class="" id="" name="firstname" type="text" required> 
                                                        Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum 
                                                        Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum 
                                                        Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum 
                                                        Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum 
                                                    </p>
                                                    
                                                    <!-- The text field -->
                                                    
                                                    
                                                </div>
                                            </div>
                                            
                                           

                                      
                                    </div>
                                   
                                
                            </div>
                           
                        </div>
                                                       
                    </div>
                        <div class="row">
                            <div class="col-md-6">
                                <h4 class="profile-title">Anwerben</h4>
                                <hr></hr>

                                    <input type="hidden" name="form" value="affiliate">
                                    <input type="hidden" name="task" value="edit">
                                    </div></div>
                                    <div class="row">
                                        <div class="col-md">

                                            <div class="form-group row">
                                                <div>
                                                    <label for="firstname"
                                                           class="col-sm-4 col-form-label">Startseite:</label>
                                                    <div class="col-sm-12">
                                                        <div class="copy-text">
                                                        <input class="affiliate-links input-large text" type="text" readonly value="https://www.planova.ch/?track=<?= $_SESSION['cand_profile_id'] ?>" style="height: 41px; width: 415px;">
                                                        <br>
                                                        <button onclick="copyToClipboard()" class="btn pl-btn-profile pull-right" type="button" style="margin-left: 20px;">
                                                            Kopieren
                                                        </button>                                                 
                                                        </div>
                                                    </div>
                                                </div></div>
                                           
                                        </div></div>
                         <div class="row">
                                        <div class="col-md">

                                            <div class="form-group row">
                                                <div>
                                                    <label for="firstname"
                                                           class="col-sm-4 col-form-label">Spontanbewerbungen:</label>
                                                    <div class="col-sm-12">
                                                        <div class="copy-text2">
                                                        <input  class="affiliate-links input-large text" type="text" readonly value="https://www.planova.ch/Pages/SpontanApply?track=<?= $_SESSION['cand_profile_id'] ?>" style="height: 41px; width: 415px;">
                                                        <br>
                                                        <button onclick="copyToClipboard2()" class="btn pl-btn-profile pull-right" type="button" style="margin-left: 20px;">
                                                            Kopieren
                                                        </button>                                                 
                                                        </div>
                                                    </div>
                                                </div></div>
                                                    
                                        </div></div>
                                        <div class="row">
                                             <div class="col-md">
                                            <div class="form-group row">
                                               <label for="affiliateid"
                                                           class="col-sm col-form-label">Werbe-ID:</label>
                                                <div class="col-sm-12">
                                                    <p class="form-control" id="" style="max-width: 410px" name="firstname" type="text"> 
                                                        <?= $_SESSION['cand_profile_id'] ?>
                                                    </p>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                               <label for="affiliatepoints"
                                                           class="col-sm col-form-label">Anzahl Punkte:</label>
                                                <div class="col-sm-12">
                                                    <p class="form-control" id="affil-number" style="max-width: 410px" name="firstname" type="text"> 
                                                        <?=  var_dump($data['profile_form']['invitation_link']); ?>
                                                    </p>
                                                </div>
                                            </div>
                                                 
                                             </div>
                                            
                                        </div>
                                        </div>
                                        
                                    </div>
                                    
                            <div class="row">
                            <div class="col-md-6">
                                <h4 class="profile-title">Formular</h4>
                                <hr></hr>
                               
                                    <input type="hidden" name="form" value="affiliate">
                                    <input type="hidden" name="task" value="edit">
                                        <div>
                                             <form class="form-horizontal pl-form-profile" name="register" method="POST"
                                                   action='<?= WEB_URL ?>/Candidate/affiliateForm/'>
                                                    <label for="firstname"
                                                           class="col-sm-4 col-form-label">Vorname:<span class="star">&nbsp;*</span></label>
                                                    <div class="col-sm-12">
                                                        <div class="copy-text2">
                                                        <input  class="affiliate-links input-large text" type="text" required="required" id="firstname" name="firstname">                                    
                                                        </div>
                                                    </div>
                                                    <label for="lastname"
                                                           class="col-sm-4 col-form-label">Nachname:<span class="star">&nbsp;*</span></label>
                                                    <div class="col-sm-12">
                                                        <div class="copy-text2">
                                                        <input  class="affiliate-links input-large text" type="text" required="required" id="lastname" name="lastname">                                    
                                                        </div>
                                                    </div>
                                                    <label for="address"
                                                           class="col-sm-4 col-form-label">Adresse:<span class="star">&nbsp;*</span></label>
                                                    <div class="col-sm-12">
                                                        <div class="copy-text2">
                                                        <input  class="affiliate-links input-large text" type="text" required="required" id="address" name="address">                                    
                                                        </div>
                                                    </div>
                                                    <label for="plz"
                                                           class="col-sm-4 col-form-label">PLZ:<span class="star">&nbsp;*</span></label>
                                                    <div class="col-sm-12">
                                                        <div class="copy-text2">
                                                        <input  class="affiliate-links input-large text" type="number" required="required" id="plz" name="plz">                                    
                                                        </div>
                                                    </div>
                                                    <label for="location"
                                                           class="col-sm-4 col-form-label">Ort:<span class="star">&nbsp;*</span></label>
                                                    <div class="col-sm-12">
                                                        <div class="copy-text2">
                                                        <input  class="affiliate-links input-large text" type="text" required="required" id="location" name="location">                                    
                                                        </div>
                                                    </div>
                                                    <label for="phone"
                                                           class="col-sm-4 col-form-label">Telefonnummer:<span class="star">&nbsp;*</span></label>
                                                    <div class="col-sm-12">
                                                        <div class="copy-text2">
                                                            <input  class="affiliate-links input-large text" type="text" required="required" id="phone" name="phone">                                    
                                                        </div>
                                                    </div>
                                                    
                                                    <label for="check1">
                                                        <div class="col-sm-12">
                                                            <div class="copy-text2">
                                                                <input type="checkbox" name="privacy" id="privacy" required="required" id="check1">Ich bestätige, dass die empfohlene Person von mir über eine Kontaktaufnahme durch Planova informiert wurde.        
                                                            </div>
                                                        </div>
                                                    </label>
                                                            
                            <div class="col-sm-12 col-md-3">
                                &nbsp;
                            </div>
                           
                                <button class="btn pl-btn-cmmn" type="submit">Jetzt bewerben</button>
                           
                        </form>
                                          </div>
                                    </div>
                            
                            </div>

                                </form>
                                
                          
                        
                        <?php if (isset($_SESSION['cand_profile_id']) && !empty($_SESSION['cand_profile_id'])) { ?>
                          



                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php include 'footer.php'; ?>