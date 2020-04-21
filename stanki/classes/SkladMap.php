<?php


class SkladMap extends BaseMap
{
    public function arrSklads(){
        $res = $this->db->query("SELECT sklad_id AS id, adres AS value FROM sklad");
        return $res->fetchAll(PDO::FETCH_ASSOC);
    }

}