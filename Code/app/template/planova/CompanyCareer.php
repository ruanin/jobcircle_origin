<?php include 'header.php';
$classAbout = 'active';
$classSubPageCareer = 'class="active"';
$breadcrumb[] = array('title' => 'Über Planova',
    'url' => '/Pages/aboutplanova',
    'active' => false);
$breadcrumb[] = array('title' => 'Karriere',
    'url' => '/Pages/career',
    'active' => true);
include 'navigation.php'; ?>

    <div class="container mt-15">
        <div class="box-wrapper page-content">
            <div class="row">
                <div class="col-lg-5 col-md-5 col-sm-12 col-xs-12">
                    <div class="thumb">
                        <img alt="Karriere Personalberater" src="<?= WEB_URL ?>/tmpl_planova/img/karriere_personalberater.jpg"/>
                    </div>
                </div>

                <div class="col-lg-7 col-md-7 col-sm-12 col-xs-12">
                    <div class="thumb">
                        <div class="row">
                            <div class="col-md-12">
                                <h2 style="margin-top: 0px;">KARRIERE</h2>
                                <h4>
                                    planova wächst!
                                </h4>

                                <p style="text-align: justify; margin-bottom: 20px;">
                                    planova ist mehr als ein Personaldienstleister - wir sind Menschen mit gleichen
                                    Zielen und ähnlichen Werten. Zugegeben: nicht jeder passt zu uns. Aber wenn es
                                    passt, dann sind Sie Teil eines Teams, das viel auf dem Schweizer Arbeitsmarkt
                                    bewegt. Wir wissen, dass Menschen unterschiedlich sind. Wir fordern Leistung und
                                    fördern Qualifikationen. Als Unternehmen, das sich ausschliesslich mit dem
                                    Rekrutieren von Mitarbeitern beschäftigt, haben wir ein Auge für "versteckte
                                    Talente" und ebnen den Weg für dauerhafte Karrieren. Nutzen Sie die Chance und
                                    bewerben Sie sich auf die untenstehenden Vakanzen.
                                </p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="table-responsive">
                                    <table class="table table-bordered table-hover table-striped">
                                        <thead>
                                        <tr>
                                            <th>Ref-Nr</th>
                                            <th>Tätigkeit</th>
                                            <th>Art der Anstellung</th>
                                            <th>Ort</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <?php foreach ($data['internalVac'] as $internalJob) { ?>
                                            <tr>
                                                <td><?= $internalJob->unique_key; ?></td>
                                                <td>
                                                    <a href="/Vacancyboard/Detail/<?= $internalJob->vac_info_id; ?>"><strong><?= $internalJob->jobtitle; ?></strong></a>
                                                </td>
                                                <td>Festanstellung</td>
                                                <td><?= $internalJob->zip; ?> <?= $internalJob->city; ?></td>
                                            </tr>
                                        <?php } ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php include 'footer.php'; ?>