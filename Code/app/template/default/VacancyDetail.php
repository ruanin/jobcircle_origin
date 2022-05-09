<?php include 'header.php'; ?>
<?php include 'navigation.php'; ?>

<div class="header-page-title">
			<div class="container">
				<h1><?=$data['vac_data']['jobtitle'];?> <small><?=$data['vac_data']['zip'];?> <?=$data['vac_data']['city'];?></small></h1>

				<ul class="breadcrumbs">
					<li><a href="/Home">Home</a></li>
					<li><a href="/Vacancyboard">Stellenangebote</a></li>
					<li><a href="/Vacancyboard/Detail/<?=$data['vac_data']['vac_info_id'];?>"><?=$data['vac_data']['jobtitle'];?></a></li>
				</ul>
			</div>
		</div>
	</header> <!-- end #header -->

	<div id="page-content pt30">
		<div class="container">
			<div class="row">
				<div class="col-sm-4 page-sidebar pt30 pb30" style="padding-left:0px;">
					<aside>
						<div class="widget sidebar-widget white-container candidates-single-widget">
							<div class="widget-content">
								<h3 class="bottom-line mt0">Job Details</h5>

								<table>
									<tbody>
										<tr>
											<td>Job-ID:</td>
											<td>#<?=$data['vac_data']['unique_key'];?></td>
										</tr>

										<tr>
											<td>Land</td>
											<td><?=$data['vac_data']->value_country->title?></td>
										</tr>
                                                                                
                                                                                <tr>
											<td>Region</td>
											<td><?=$data['vac_data']->value_region->title?></td>
										</tr>

										<tr>
											<td>Ort</td>
											<td><?=$data['vac_data']['zip'];?> <?=$data['vac_data']['city'];?></td>
										</tr>

										<tr>
											<td>Pensum</td>
											<td><?=$data['vac_data']->value_workload->name?></td>
										</tr>

										<tr>
											<td>Arbeitsbeginn</td>
											<td><?=$data['vac_data']->value_entering->name?></td>
										</tr>
                                                                                
                                                                                
                                                                                <tr>
											<td>Anstellungsart</td>
											<td>
                                                                                                <?php foreach ($data['vac_data']->value_employment as $employment) { ?>
                                                                                                    <?=$employment->name?>
                                                                                                <?php } ?>
                                                                                        </td>
										</tr>
                                        <?php if(isset($data['vac_data']['req_driver_licence'])){ ?>                                        
                                        <tr>
											<td>Führerschein</td>
											<td>
                                                <?php foreach ($data['vac_data']->value_driver_license as $license) { ?>
                                                    <?=$license->name?>
                                                <?php } ?>
                                            </td>
										</tr>
                                        <?php } ?>
                                                                                
                                        <?php if(isset($data['vac_data']['req_vehicle'])){ ?>
										<tr>
											<td>Fahrzeug erforderlich</td>
											<td><?=$data['vac_data']['req_vehicle']?></td>
										</tr>
                                                                                <?php } ?>
                                                                                
                                                                                <?php if(isset($data['vac_data']->value_sub_branch->name)){ ?>
										<tr>
											<td>Branche</td>
											<td><?=$data['vac_data']->value_sub_branch->name?></td>
										</tr>
                                                                                <?php } ?>
										
									</tbody>
								</table>
							</div>                      
						</div>                 
					</aside>
				</div> <!-- end .page-sidebar -->

				<div class="col-sm-8 page-content pt30" style="padding-right:0px;">
					<div class="jobs-item jobs-single-item">
						<div class="clearfix visible-xs"></div>
						<div class="date"><?=date('d',strtotime($data['vac_data']['created_at']));?> <span><?=Toolkit::getMonthName(date('n',strtotime($data['vac_data']['created_at'])));?></span></div>
						<h6 class="title"><a href="#"><?=$data['vac_data']['jobtitle'];?></a></h6>
                        <span class="meta"><?=$data['vac_data']['zip'];?> <?=$data['vac_data']['city'];?></span><br>

						<?=html_entity_decode($data['vac_data']->vac_content->header)?>
                        <?=html_entity_decode($data['vac_data']->vac_content->description)?>
						<?=html_entity_decode($data['vac_data']->vac_content->requirements)?>
                        <?=html_entity_decode($data['vac_data']->vac_content->footer)?>

						<div class="clearfix">
                            <a href="/Vacancyboard/Apply/<?=$data['vac_data']['vac_info_id'];?>" class="btn btn-default pull-left">Bewerben</a>
						</div>
					</div>

					<div class="title-lines">
						<h3 class="mt0">Kontakt</h3>
					</div>

					<div class="about-candidate-item">

						<h6 class="title"><a href="#"><?=$data['vac_data']->value_contact->f_name?> <?=$data['vac_data']->value_contact->l_name?></a></h6>
						<span class="meta"><?=$data['vac_data']->value_contact->value_worked_as->name?>, <?=$data['vac_data']->value_customer_department->city?></span>

						<ul class="social-icons clearfix">
                            <li><span>Kontakt Teilen</span></li>
							<li><a href="<?=$data['vac_data']->value_customer_department->fb_url?>" target="_blank" class="btn btn-gray fa fa-facebook"></a></li>
							<li><a href="#" class="btn btn-gray fa fa-twitter"></a></li>
							<li><a href="#" class="btn btn-gray fa fa-google-plus"></a></li>
							<li><a href="#" class="btn btn-gray fa fa-dribbble"></a></li>
							<li><a href="#" class="btn btn-gray fa fa-pinterest"></a></li>
							<li><a href="#" class="btn btn-gray fa fa-linkedin"></a></li>
						</ul>

						<ul class="list-unstyled">
							<li><strong>Tel:</strong> <a href="<?=$data['vac_data']->value_customer_department->phone?>"><?=$data['vac_data']->value_customer_department->phone?></a></li>
							<li><strong>Fax:</strong> <a href="#"><?=$data['vac_data']->value_customer_department->fax?></a></li>
						</ul>

						
					</div>
				</div> <!-- end .page-content -->
			</div>
		</div> <!-- end .container -->
	</div> <!-- end #page-content -->
<script type="application/ld+json">
{
  "@context" : "https://schema.org/",
  "@type" : "JobPosting",
  "title" : "<?=$data['vac_data']['jobtitle'];?>",
  "description" : "<?=html_entity_decode(htmlspecialchars_decode($data['vac_data']->vac_content->header))?><?=html_entity_decode(htmlspecialchars_decode($data['vac_data']->vac_content->description))?> <?=html_entity_decode(htmlspecialchars_decode($data['vac_data']->vac_content->footer))?>",
  "identifier": {
    "@type": "PropertyValue",
    "name": "<?=$data['vac_data']->value_customer_department->name?>",
    "value": "1234567"
  },
  "datePosted" : "<?=date('Y-m-d',strtotime($data['vac_data']['from_date']));?>",
  "validThrough" : "<?=date("c",strtotime($data['vac_data']['to_date']));?>",
  "employmentType": <?php if(count($data['employment']) > 1){ 
       echo "[";
       echo '"'. implode('","',$data['employment']) . '"';
       echo "],";
   }else{
      echo '"'.$data['employment'][0].'",';
   } ?>
  "hiringOrganization" : {
    "@type" : "Organization",
    "name" : "<?=$data['vac_data']->value_customer_department->name?>",
    "sameAs" : "https://www.ahapersonal.ch",
    "logo": "https://www.ahapersonal.ch/tmpl_ahapersonal/aha.jpg"
  },
  "jobLocation": {
  "@type": "Place",
    "address": {
    "@type": "PostalAddress",
    "streetAddress": "<?=$data['vac_data']['street'];?>",
    "addressRegion": "<?=$data['vac_data']->value_region['code'];?>",
    "postalCode": "<?=$data['vac_data']['zip'];?>",
    "addressCountry": "<?=$data['vac_data']->value_country['code'];?>"
    }
  }
}
</script>        
<?php include 'footer.php'; ?>