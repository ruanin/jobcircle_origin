<?php include 'header.php'; ?>
<?php include 'navigation.php'; ?>
<div class="header-page-title">
			<div class="container">
				<h1>Offene Stellen <small>(350)</small></h1>

				<ul class="breadcrumbs">
					<li><a href="/Home">Home</a></li>
					<li><a href="/Vacancyboard">Stellenangebote</a></li>
				</ul>
			</div>
		</div>
	</header> <!-- end #header -->

<div id="page-content">
		<div class="container">
			<div class="row">
				<div class="col-sm-4 page-sidebar">
					<aside>
						<div class="white-container mb0">
							<div class="widget sidebar-widget jobs-search-widget">
								<h5 class="widget-title">Suche</h5>

								<div class="widget-content">
									<span>Ich suche nach ...</span>
                                    <form action="/Vacancyboard/" method="POST">
                                        <input type="text" class="form-control mt15 mb15" value="<?=$data['filter']['occupation']?>" placeholder="Beruf" name="jobtitle">
                                        <span>in</span>

                                        <select class="form-control mt10 mb10" name="place" >
                                            <option value="0">Alle Kantone</option>
                                            <?php foreach ($data['region'] as $region) { 
                                                $selected = ($region->region_id == $data['filter']['place']) ? 'selected' : ''; ?>
                                                <option <?=$selected?> value="<?=$region->region_id;?>"><?=$region->title;?></option>
                                            <?php } ?>
                                        </select>
                                        <input name="search" type="submit" class="btn btn-default" value="Suchen">
                                    </form>
								</div>
							</div>
                                                    
                                                    <?php $data['showFilter'] = false; if($data['showFilter'] === true){ ?>
                                                    <div class="widget sidebar-widget jobs-filter-widget">
								<h5 class="widget-title">Filter</h5>

								<div class="widget-content">
									

									<h6>Anstellungsart</h6>

									<div class="checkbox"><label><input type="checkbox" value=""> Festanstellung</label></div>
									<div class="checkbox"><label><input type="checkbox"> Try &amp; Hire</label></div>
									<div class="checkbox"><label><input type="checkbox"> Temporäranstellung</label></div>
                                                                        
                                                                        <h6>Arbeitsbeginn</h6>
                                                                        <div class="checkbox"><label><input type="checkbox" value="1"> ab sofort</label></div>
									<div class="checkbox"><label><input type="checkbox" value="2"> nach Vereinbarung</label></div>
									<div class="checkbox"><label><input type="checkbox" value="3"> ab sofort oder nach Vereinbarung</label></div>
                                                                        
									<input type="submit" class="btn btn-default mt30" value="Filter">
								</div>
							</div>
                                                    <?php } ?>
						</div>
					</aside>
				</div> <!-- end .page-sidebar -->

				<div class="col-sm-8 page-content">
					<!--<div id="jobs-page-map" class="white-container"></div>-->

					<div class="title-lines">
						<h3 class="mt0">Finden Sie Ihren Traumjob!</h3>
					</div>

                    <?php foreach($data['vacancylist'] as $job) { ?>
					<div class="jobs-item">
						<div class="clearfix visible-xs"></div>
                        <div class="date"><?=date('d',strtotime($job->created_at));?> <span><?=Toolkit::getMonthName(date('n',strtotime($job->created_at)),true);?></span></div>
						<h6 class="title"><a href="/Vacancyboard/Detail/<?=$job->vac_info_id;?>"><?=$job->jobtitle;?></a></h6>
						<span class="meta">Region <?=$job->value_region->title;?></span>

                        <p class="description"><?=Toolkit::shortText(strip_tags(html_entity_decode($job->vac_content->header)), 200)?> <a href="/Vacancyboard/Detail/<?=$job->vac_info_id;?>">Weiterlesen</a></p>
					</div>
                    <?php } ?>
					<div class="clearfix">
						<ul class="pagination pull-right">
							
							<?php

                                                        for($i=1;$i<$data['pages'];$i++){
                                                            if($i==$data['activepage']) {
                                                               $current = '<span class="sr-only">(current)</span>';
                                                               $class = 'class="active"' ;
                                                            }else{
                                                                $current='';
                                                                $class = 'fa fa-angle-left';
                                                            }


                                                        ?>
                                                    <li <?=$class?>><a href="/Vacancyboard/<?=$i?>?occupationGroup=<?=$data['filter']['occupationGroup']?>&jobtitle=<?=$data['filter']['occupation']?>&place=<?=$data['filter']['place']?>"><?=$i?> <?=$current?></a></li>
                                                    <?php } ?>
							
						</ul>
					</div>
				</div> <!-- end .page-content -->
			</div>
		</div> <!-- end .container -->
	</div> <!-- end #page-content -->

<?php include 'footer.php'; ?>

