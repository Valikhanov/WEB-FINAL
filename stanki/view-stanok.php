<?php
require_once 'autoload.php';

if (isset($_GET['id'])) {
    $id = Helper::clearInt($_GET['id']);
    $stanok = (new StanokMap())->findViewById($id);
    $header = 'Просмотр станка';
    require_once 'template/header.php';
?>
<div class="row">
    <div class="col-xs-12">
        <div class="box">
            <section class="content-header">
                <h1><?=$header;?></h1>
                <ol class="breadcrumb">
                    <li><a href="index.php"><i class="fa fa-dashboard"></i> Главная</a></li>
                    <li><a href="list-stanok.php">станки</a></li>
                    <li class="active"><?=$header;?></li>
                </ol>
            </section>
            <div class="box-body">
                <a class="btn btn-success" href="add-stanok.php?id=<?=$id;?>">Изменить</a>
            </div>
            <div class="box-body">
                <table class="table table-bordered table-hover">
                    <tr>
                        <th>Название станка</th>
                        <td><?=$stanok->name;?></td>
                    </tr>
                    <tr>
                        <th>Тип станка</th>
                        <td><?=$stanok->type_id;?></td>
                    </tr>
                    <tr>
                        <th>ДАта начала работы станка</th>
                        <td><?=$stanok->date_start;?></td>
                    </tr>
                    <tr>
                        <th>Срок эксплуатации</th>
                        <td><?=$stanok->srok_e;?></td>
                    </tr>
                    <tr>
                        <th>Дата снятия с эксплуатации</th>
                        <td><?=$stanok->date_close;?></td>
                    </tr>
                    <tr>
                        <th>Детали</th>
                        <td><?=$stanok->detal_id;?></td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
</div>
<?php
}
require_once 'template/footer.php';
?>