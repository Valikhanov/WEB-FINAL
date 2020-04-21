<?php


class Type_stanokMap extends BaseMap
{
    public function arrType_stanoks(){
        $res = $this->db->query("SELECT type_id AS id, name AS value FROM type_stanok");
        return $res->fetchAll(PDO::FETCH_ASSOC);
    }
}