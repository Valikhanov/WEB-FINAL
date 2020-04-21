<?php


class DetalMap extends BaseMap
{
    public function arrDetals(){
        $res = $this->db->query("SELECT detal_id AS id, name AS value FROM detal");
        return $res->fetchAll(PDO::FETCH_ASSOC);
    }

}