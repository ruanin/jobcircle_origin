<?php include 'header.php'; 
$classVacancy = 'class="active"';
$classSubPageVacancyboard = 'class="active"';
$breadcrumb[] = array('title' => 'Stellenangebote',
                      'url' => '/Vacancyboard',
                    'active' => true);
$data['title'] = 'Stellenangebote';

include 'navigation.php'; ?>
<section class="form-wrapper mt-15">
    <div class="container">
        <div class="box-wrapper form-shortcode">
            <div class="row">
                <div class="col-md-4 col-sm-12">
                    <form class="form-horizontal" role="form" method="POST">
                        <div class="form-group">
                            <label for="inputFachbereich" class="col-sm-3 control-label">Fachbereich:</label>
                            <div class="col-sm-8">
                                <select name="occupationGroup" class="form-control">
                                    <option>Alle</option>
                                    <?php foreach ($data['professiongroup'] as $professiongroup) { 
                                    $selected = ($professiongroup->profession_id == $data['filter']['occupationGroup']) ? 'selected' : '';     
                                        ?>
                                    <option  <?=$selected?> value="<?=$professiongroup->profession_id?>"><?=$professiongroup->name?></option>
                                    <?php } ?>														
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputTitle" class="col-sm-3 control-label">Suchbegriff:</label>
                            <div class="col-sm-8">
                                <input name="jobtitle" value="<?=$data['filter']['occupation']?>" type="text" class="form-control" id="inputTitle" placeholder="Suchbegriff">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputRegion" class="col-sm-3 control-label">Kanton:</label>
                            <div class="col-sm-8">
                                <select name="place" class="form-control">
                                    <option>Alle</option>
                                    <?php foreach ($data['region'] as $region) { 
                                    $selected = ($region->region_id == $data['filter']['place']) ? 'selected' : '';    
                                    ?>                                                                                                                                       
                                    <option <?=$selected?> value="<?=$region->region_id?>"><?=$region->title?></option>
                                     <?php } ?>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputRefKey" class="col-sm-3 control-label">Ref-Nr.:</label>
                            <div class="col-sm-8">
                                <input name="refkey" value="<?=$data['filter']['refkey']?>" type="text" class="form-control" id="inputRefKey" placeholder="Referenznummer">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-offset-3 col-sm-10">
                                <div class="btn-wrapper">
                                    <button class="btn btn-submit" type="submit" >Suchen</button>
                                </div>
                            </div>
                        </div>


                            <div class="col-sm-12 mb-50" style="padding-left:0px;padding-right:0px;">
                                <small>Sie können Ihre Suchkriterien als Jobmail speichern, um Stellenangebote per E-Mail zu erhalten. Geben Sie bitte dem JobMail einen Namen.</small>
                                <div class="checkbox">
                                    <label>
                                      <input type="checkbox"> Suche als JobMail anmelden
                                    </label>
                                </div>
                            </div>

                    </form>													
                </div>

                <div class="col-md-8 col-sm-8">
                    <div class="table-responsive">
                        <table class="table table-bordered table-hover table-striped">
                            <thead>
                                <tr>
                                    <th>Ref-Nr</th>
                                    <th>Tätigkeit</th>
                                    <th>Ort</th>
                                    <th>Art der Anstellung</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($data['vacancylist'] as $job) {
                                    $arrEmployment = $job->value_employment()->get();
                                  
                                    ?>
                                <tr>
                                    <td><?=$job->unique_key;?></td>
                                    <td><a href="/Vacancyboard/Detail/<?=$job->vac_info_id;?>"><strong><?=$job->jobtitle;?></strong></a></td>
                                    <td><?=$job->zip;?> <?=$job->city;?></td>
                                    <td><?=$arrEmployment[0]->name?></td>
                                </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                    <ul class="pagination pull-left">
                        <?php

                            for($i=1;$i<$data['pages'];$i++){
                                if($i==$data['activepage']) {
                                   $current = '<span class="sr-only">(current)</span>';
                                   $class = 'class="active"' ;
                                }else{
                                    $current='';
                                    $class = '';
                                }
                              
                                
                            ?>
                        <li <?=$class?>><a href="/Vacancyboard/<?=$i?>?occupationGroup=<?=$data['filter']['occupationGroup']?>&jobtitle=<?=$data['filter']['occupation']?>&place=<?=$data['filter']['place']?>"><?=$i?> <?=$current?></a></li>
                        <?php } ?>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>											
<?php include 'footer.php'; ?>