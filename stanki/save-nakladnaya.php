<?php
require_once 'autoload.php';
if (isset($_POST['nakladnaya_id'])) {
    $nakladnaya = new Nakladnaya();
    $nakladnaya->nakladnaya_id = Helper::clearInt($_POST['nakladnaya_id']);
    $nakladnaya->data_p = Helper::clearString($_POST['data_p']);
    $nakladnaya->sklad_id = Helper::clearInt($_POST['sklad_id']);
    $nakladnaya->detal_id = Helper::clearInt($_POST['detal_id']);
    $nakladnaya->user_id = Helper::clearInt($_POST['user_id']);
    
    if ((new NakladnayaMap())->save($nakladnaya)) {
        header('Location: view-nakladnaya.php?id='.$nakladnaya->nakladnaya_id);
    } else {
        if ($nakladnaya->nakladnaya_id) {
    header('Location: add-nakladnaya.php?id='.$nakladnaya->nakladnaya_id);
        } else {
            header('Location: add-nakladnaya.php');
        }
    }
}