                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                            <?php
include 'header.php';
include 'navigation.php';
?>
<div class="pl-cmmn-cnt-section">
    <div class="pl-ueber">
        <h1 class="bs-title">LOHNABRECHNUNGEN</h1>
        <?php include 'MyPlanovaNavigation.php'; ?>
    </div>
    <div class="pl-ueber-cnt-sect">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                <?php if (!empty($data['payrollFiles'])) { ?>
                    <div style="overflow-x:auto;">
                        <table class="table table-bordered table-striped table-hover">
                            <thead>
                            <tr>
                                <th>Vertragsnummer</th>
                                <th>Definitiv/Provisorisch</th>
                                <th>Jahr</th>
                                <th>Monat</th>
                                <th>Datei</th>
                                <th></th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php foreach ($data['payrollFiles'] as $year => $yearData) {
                                foreach ($yearData as $month => $monthData) {
                                    foreach ($monthData as $monthKey => $fileData) {
                                        $arrFileName = explode('_', $fileData['filename']); ?>
                                        <tr>
                                            <td><?= $arrFileName[4] ?></td>
                                            <td><?= $arrFileName[1] ?></td>
                                            <td><?= $arrFileName[6] ?></td>
                                            <td><?= $arrFileName[5] ?></td>
                                            <td>Lohnabrechnung</td>
                                            <td style="text-align:center;vertical-align: middle;"><?php if (preg_match('~MSIE|Internet Explorer~i', $_SERVER['HTTP_USER_AGENT']) || (strpos($_SERVER['HTTP_USER_AGENT'], 'Trident/7.0; rv:11.0') !== false)) { ?>
                                                    <a
                                                    href="<?= WEB_URL ?>/Candidate/viewPayRollFile?fileName=<?= $fileData['filename'] ?>.<?= $fileData['extension'] ?>"
                                                    target="_blank"
                                                    style="target-new: tab;"
                                                    title="Vertrag <?= $arrFileName[4] ?>: Lohnabrechnung <?= $arrFileName[5] ?> <?= $arrFileName[6] ?>">
                                                        <i class="fa fa-search fa-2x"></i></a> <?php } else { ?><a
                                                    href="<?= WEB_URL ?>/Candidate/viewPayRollFile?fileName=<?= $fileData['filename'] ?>.<?= $fileData['extension'] ?>"
                                                    title="Vertrag <?= $arrFileName[4] ?>: Lohnabrechnung <?= $arrFileName[5] ?> <?= $arrFileName[6] ?>"
                                                    data-featherlight="iframe" data-featherlight-close-icon="" data-featherlight-iframe-allowfullscreen="true" data-featherlight-iframe-width="950" data-featherlight-iframe-height="800">
                                                        <i class="fa fa-search fa-2x"></i></a> <?php } ?> <a style="padding-left:5px;"
                                                        href="<?= WEB_URL ?>/Candidate/viewPayRollFile?fileName=<?= $fileData['filename'] ?>.<?= $fileData['extension'] ?>&fileDownload=1"
                                                        title="Vertrag <?= $arrFileName[4] ?>: Lohnabrechnung <?= $arrFileName[5] ?> <?= $arrFileName[6] ?>"><i
                                                                                    class="fa fa-download fa-2x"></i></a>
                                            </td>
                                        </tr>
                                    <?php }
                                }
                            }
                            ?>
                            </tbody>
                        </table>
                    </div>
                <?php } else { ?>
                    <div class="alert alert-info">Es sind keine Lohnabrechnungen
                        vorhanden.
                    </div>
                <?php } ?>
                </div>
            </div>
        </div>
    </div>

<?php include 'footer.php'; ?>