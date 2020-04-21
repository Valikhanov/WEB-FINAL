<?php
require_once 'autoload.php';
$id = 0;
if (isset($_GET['id'])) {
    $id = Helper::clearInt($_GET['id']);
}
$stanok = (new StanokMap())->findById($id);
$header = (($id)?'Редактировать':'Добавить').' Станок';
require_once 'template/header.php';
?>
<section class="content-header">
    <h1><?=$header;?></h1>
    <ol class="breadcrumb">

        <li><a href="/index.php"><i class="fa fa-dashboard"></i> Главная</a></li>

        <li><a href="list-stanok.php">Станки</a></li>
        <li class="active"><?=$header;?></li>
    </ol>
</section>
<div class="box-body">
<form action="save-stanok.php" method="POST">
    <div class="form-group">
            <label>Название станка</label>
            <input type="text" class="form-control" name="name" required="required" value="<?=$stanok->name;?>">
    </div>

    <div class="form-group">
        <label>Тип станка</label>
            <select class="form-control" name="type_id">
            <?=Helper::printSelectOptions($stanok->type_id, (new Type_stanokMap())->arrType_stanoks());?>
        </select>
    </div>

    <div class="form-group">
            <label>Дата начала эксплуатации</label>
            <input type="date" class="form-control" name="date_start" required="required" value="<?=$stanok->date_start;?>">
    </div>

    <div class="form-group">
            <label>Срок эксплуатации(Кол-во дней)</label>
            <input type="text" class="form-control" name="srok_e" required="required" value="<?=$stanok->srok_e;?>">
    </div>

    <div class="form-group">
            <label>Дата завершения эксплуатации</label>
            <input type="date" class="form-control" name="date_close" required="required" value="<?=$stanok->date_close;?>">
    </div>

    <div class="form-group">
        <label>ИД детали для ремонта</label>
            <select class="form-control" name="detal_id">
            <?= Helper::printSelectOptions($stanok->detal_id, (new DetalMap())->arrDetals());?>
        </select>
    </div>

    <!--Кнопка сохранения -->  
    <div class="form-group">
        <button type="submit" name="saveStanok" class="btn btn-primary">Сохранить</button>
    </div>
    <input type="hidden" name="stanok_id" value="<?=$id;?>"/>
</form>
</div>
<?php
require_once 'template/footer.php';
?>