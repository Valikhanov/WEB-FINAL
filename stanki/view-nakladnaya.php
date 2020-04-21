<?php
require_once 'autoload.php';

if (isset($_GET['id'])) {
    $id = Helper::clearInt($_GET['id']);
    $nakladnaya = (new NakladnayaMap())->findViewById($id);
    $header = 'Просмотр накладной ';
    require_once 'template/header.php';
?>
<div class="row">
    <div class="col-xs-12">
        <div class="box">
            <section class="content-header">
                <h1><?=$header;?></h1>
                <ol class="breadcrumb">
                    <li><a href="index.php"><i class="fa fa-dashboard"></i> Главная</a></li>
                    <li><a href="list-nakladnaya.php">Накладные</a></li>
                    <li class="active"><?=$header;?></li>
                </ol>
            </section>
            <div class="box-body">
                <a class="btn btn-success" href="add-nakladnaya.php?id=<?=$id;?>">Изменить</a>
            </div>
            <div class="box-body">
                <table class="table table-bordered table-hover">
                    <tr>
                        <th>Дата</th>
                        <td><?=$nakladnaya->data_p;?></td>
                    </tr>
                    <tr>
                        <th>Склад</th>
                        <td><?=$nakladnaya->sklad_id;?></td>
                    </tr>
                    <tr>
                        <th>Деталь</th>
                        <td><?=$nakladnaya->detal_id;?></td>
                    </tr>
                    <tr>
                        <th>ФИО</th>
                        <td><?=$nakladnaya->user_id;?></td>
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