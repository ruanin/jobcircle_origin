<?php include 'header.php'; ?>
<?php include 'navigation.php'; ?>
<div class="document-title">
    <div class="container">
        <h1>Offene Stellen <small>(350)</small></h1>
    </div><!-- /.container -->
</div><!-- /.document-title -->

<div class="document-breadcrumb">
    <div class="container">
        <ul class="breadcrumb">
            <li><a href="/Home">Home</a></li>
			<li><a href="/Vacancyboard">Stellenangebote</a></li>
        </ul>
    </div><!-- /.container -->
</div><!-- /.document-title -->
<div class="container">
    <div class="page-header" style="margin-top:0px;">
        <h3 class="mt0" style="margin-top:0px;">Finden Sie Ihren Traumjob!</h3>
    </div>
    <div class="row">
        <div class="col-sm-4">
            <div class="filter-stacked"> 
                <form action="/Vacancyboard/" method="POST">
                    <h3 style="margin-top:0px;">Suche</h3>
                    <span>Ich suche nach ...</span>
                    <div class="form-group">
                        <input type="text" class="form-control mt15 mb15" value="<?=$data['filter']['occupation']?>" placeholder="Beruf" name="jobtitle">
                    </div>
                    <span>in</span>
                    <div class="form-group" style="margin-top: 0px !important;">
                        <select class="form-control" name="place" data-width="100%">
                            <option value="0">Alle Kantone</option>
                            <?php foreach ($data['region'] as $region) { 
                                $selected = ($region->region_id == $data['filter']['place']) ? 'selected' : ''; ?>
                                <option value="<?=$region->region_id;?>" <?=$selected?>><?=$region->title;?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <?php $data['showFilter']= false; if($data['showFilter'] === true){ ?>
                        <h3>Anstellungsart</h3>
                        <div class="checkbox"><label><input type="checkbox" value=""> Festanstellung</label></div>
                        <div class="checkbox"><label><input type="checkbox"> Try &amp; Hire</label></div>
                        <div class="checkbox"><label><input type="checkbox"> Temporäranstellung</label></div>
                        <h3>Arbeitsbeginn</h3>
                        <div class="checkbox"><label><input type="checkbox" value="1"> ab sofort</label></div>
                        <div class="checkbox"><label><input type="checkbox" value="2"> nach Vereinbarung</label></div>
                        <div class="checkbox"><label><input type="checkbox" value="3"> ab sofort oder nach Vereinbarung</label></div>

                    <?php } ?>
                    <button name="search" type="submit" class="btn btn-secondary btn-block">Suchen</button>
                </form>
            </div> <!-- end .page-sidebar -->
        </div>

        <div class="col-sm-8">
            <!--<div id="jobs-page-map" class="white-container"></div>-->
            <div class="positions-list">
            <?php foreach($data['vacancylist'] as $job) { ?>
            <div class="positions-list-item">                  
                <h2 class="title"><a href="/Vacancyboard/Detail/<?=$job->vac_info_id;?>"><?=$job->jobtitle;?></a></h2>
                <h3>Region <?=$job->value_region->title;?></span></h3>
                <div class="position-list-item-date"><?=date('d',strtotime($job->created_at));?> <?=Toolkit::getMonthName(date('n',strtotime($job->created_at)));?> <?=date('Y',strtotime($job->created_at));?><span></div>
                <div class="position-list-item-action"><a href="/Vacancyboard/Detail/<?=$job->vac_info_id;?>">Details anzeigen</a></div>
                <span></span>
            </div>
            <?php } ?>
            </div>
            <div class="center">
                <ul class="pagination" style="margin:0px !important;">
                    <?php
                        for($i=1;$i<$data['pages'];$i++){
                            if($i==$data['activepage']) {
                               $class = ' class="active"' ;
                            }else{
                                $class = '';
                            }
                        ?>
                    <li<?=$class?>><a href="/Vacancyboard/<?=$i?>?occupationGroup=<?=$data['filter']['occupationGroup']?>&jobtitle=<?=$data['filter']['occupation']?>&place=<?=$data['filter']['place']?>"><?=$i?></a></li>
                    <?php } ?>
                </ul>
            </div>
        </div> <!-- end .page-content -->
    </div>
</div> <!-- end .container -->

<?php include 'footer.php'; ?>

