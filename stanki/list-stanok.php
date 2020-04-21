<?php
require_once 'autoload.php';
$size = 5;
if (isset($_GET['page'])) {
    $page = Helper::clearInt($_GET['page']);
} else {
    $page = 1;
}
$stanokMap = new StanokMap();
$count = $stanokMap->count();
$stanoks = $stanokMap->findAll($page*$size-$size, $size);
$header = 'Список cтанков';
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

            <a class="btn btn-success" href="add-stanok.php">Добавить станок</a>

            </div>
            <div class="box-body">
            <?php
            if ($stanoks) {
            ?>
            <table id="example2" class="table table-bordered table-hover">
            <thead>
            <tr>
                <th>Название станка</th>
                <th>Тип станка</th>
                <th>Дата начала работы</th>
                <th>Срок эксплуатации</th>
                <th>Дата снятия с эксплуатации</th>
                <th>Название детали</th>
            </tr>
            </thead>    
            <tbody>
            <?php
            foreach ($stanoks as $stanok) {
            echo '<tr>';
            echo '<td><a href="view-stanok.php?id='.$stanok->stanok_id.'">'.$stanok->name.'</a> '. '<a href="add-stanok.php?id='.$stanok->stanok_id.'"><i class="fa fa-pencil"></i></a></td>';
            echo '<td>'.($stanok->type_id).'</td>';
            echo '<td>'.($stanok->date_start).'</td>';
            echo '<td>'.($stanok->srok_e).'</td>';
            echo '<td>'.($stanok->date_close).'</td>';
            echo '<td>'.($stanok->detal_id).'</td>';
            echo '</tr>';
            }
            ?>
            </tbody>
            </table>
            <?php } else {
            echo 'Ни одного отделения не найдено';
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