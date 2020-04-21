<?php
require_once 'autoload.php';
$size = 5;
if (isset($_GET['page'])) {
    $page = Helper::clearInt($_GET['page']);
} else {
    $page = 1;
}
$nakladnayaMap = new NakladnayaMap();
$count = $nakladnayaMap->count();
$nakladnayas = $nakladnayaMap->findAll($page*$size-$size, $size);
$header = 'Список накладных';
require_once 'template/header.php';
?>
<div class="row">
    <div class="col-xs-12">
        <div class="box">
            <section class="content-header">
                <h1><?=$header;?></h1>
                <ol class="breadcrumb">
                <li><a href="/index.php"><i class="fa fa-dashboard"></i> Главная</a></li>
                <li class="active"><?=$header;?></li>
                </ol>
            </section>
            <div class="box-body">

            <a class="btn btn-success" href="add-nakladnaya.php">Добавить накладную</a>

            </div>
            <div class="box-body">
            <?php
            if ($nakladnayas) {
            ?>
            <table id="example2" class="table table-bordered table-hover">
            <thead>
            <tr>
                <th>Дата</th>
                <th>Склад</th>
                <th>ДЕталь</th>
                <th>ФИО</th>

            </tr>
            </thead>    
            <tbody>
            <?php
            foreach ($nakladnayas as $nakladnaya) {
            echo '<tr>';
            echo '<td><a href="view-nakladnaya.php?id='.$nakladnaya->nakladnaya_id.'">'.$nakladnaya->data_p.'</a> '. '<a href="add-nakladnaya.php?id='.$nakladnaya->nakladnaya_id.'"><i class="fa fa-pencil"></i></a></td>';
            echo '<td>'.($nakladnaya->sklad_id).'</td>';
            echo '<td>'.($nakladnaya->detal_id).'</td>';
            echo '<td>'.($nakladnaya->user_id).'</td>';
            echo '</tr>';
            }
            ?>
            </tbody>
            </table>
            <?php } else {
            echo 'Ни одного не найдено';
            } ?>
            </div>
            <div class="box-body">
                <?php Helper::paginator($count, $page,$size); ?>
            </div>
        </div>
    </div>
</div>
<?php
require_once 'template/footer.php';
?>