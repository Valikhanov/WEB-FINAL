<?php
require_once 'autoload.php';
$id = 0;
if (isset($_GET['id'])) {
    $id = Helper::clearInt($_GET['id']);
}
$nakladnaya = (new NakladnayaMap())->findById($id);
$header = (($id)?'Редактировать':'Добавить').' Накладную';
require_once 'template/header.php';
?>
<section class="content-header">
    <h1><?=$header;?></h1>
    <ol class="breadcrumb">

        <li><a href="/index.php"><i class="fa fa-dashboard"></i> Главная</a></li>

        <li><a href="list-nakladnaya.php">Накладные</a></li>
        <li class="active"><?=$header;?></li>
    </ol>
</section>
<div class="box-body">
<form action="save-nakladnaya.php" method="POST">
    <div class="form-group">
            <label>Дата</label>
            <input type="date" class="form-control" name="data_p" required="required" value="<?=$nakladnaya->data_p;?>">
    </div>

    <div class="form-group"> 
        <label>Склад</label>
            <select class="form-control" name="sklad_id">
            <?=Helper::printSelectOptions($nakladnaya->sklad_id, (new SkladMap())->arrSklads());?>
        </select>
    </div>

    <div class="form-group">
        <label>ИД детали для ремонта</label>
            <select class="form-control" name="detal_id">
            <?= Helper::printSelectOptions($nakladnaya->detal_id, (new DetalMap())->arrDetals());?>
        </select>
    </div>

    <div class="form-group">
        <label>FIO</label>
            <select class="form-control" name="user_id">
            <?= Helper::printSelectOptions($nakladnaya->user_id, (new UserMap())->arrUsers());?>
        </select>
    </div>

    <!--Кнопка сохранения -->  
    <div class="form-group">
        <button type="submit" name="saveNakladnaya" class="btn btn-primary">Сохранить</button>
    </div>
    <input type="hidden" name="nakladnaya_id" value="<?=$id;?>"/>
</form>
</div>
<?php
require_once 'template/footer.php';
?>