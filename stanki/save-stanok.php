<?php
require_once 'autoload.php';
if (isset($_POST['stanok_id'])) {
    $stanok = new Stanok();
    $stanok->stanok_id = Helper::clearInt($_POST['stanok_id']);
    $stanok->name = Helper::clearString($_POST['name']);
    $stanok->type_id = Helper::clearInt($_POST['type_id']);
    $stanok->date_start = Helper::clearString($_POST['date_start']);
    $stanok->srok_e = Helper::clearInt($_POST['srok_e']);
    $stanok->date_close = Helper::clearString($_POST['date_close']);
    $stanok->detal_id = Helper::clearInt($_POST['detal_id']);
    if ((new StanokMap())->save($stanok)) {
        header('Location: view-stanok.php?id='.$stanok->stanok_id);
    } else {
        if ($stanok->stanok_id) {
    header('Location: add-stanok.php?id='.$stanok->stanok_id);
        } else {
            header('Location: add-stanok.php');
        }
    }
}