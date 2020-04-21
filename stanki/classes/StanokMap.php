<?php


class StanokMap extends BaseMap
{


    public function findById($id=null){
        if ($id) {
            $res = $this->db->query("SELECT stanok_id, name, type_id, date_start, srok_e, date_close, detal_id ". "FROM stanok WHERE stanok_id = $id");
            return $res->fetchObject("Stanok");
        }
        return new Stanok();
    }
    
    public function save(Stanok $stanok){
        if ($stanok->validate()) {
            if ($stanok->stanok_id == 0) {
                return $this->insert($stanok);
            } 
            else {
                return $this->update($stanok);
            }
        }
        return false;
    }

    private function insert(Stanok $stanok){
        $name = $this->db->quote($stanok->name);
        $date_start = $this->db->quote($stanok->date_start);
        $date_close = $this->db->quote($stanok->date_close);
        if ($this->db->exec("INSERT INTO stanok(stanok_id, name, type_id, date_start, srok_e, date_close, detal_id) VALUES($stanok->stanok_id, $name, $stanok->type_id, $date_start, $stanok->srok_e, $date_close, $stanok->detal_id )") == 1) {
            return true;
        }
    return false;
    }

    private function update(Stanok $stanok){
        $name = $this->db->quote($stanok->name);
        if ( $this->db->exec("UPDATE stanok SET name = $name,". " type_id=$stanok->type_id, date_start=$stanok->date_start, srok_e=$stanok->srok_e, date_close=$stanok->date_close, detal_id=$stanok->detal_id WHERE stanok_id = ".$stanok->stanok_id) == 1) {
            return true;
        }
        return false;
    }

    public function findAll($ofset=0, $limit=30){
        $res = $this->db->query("SELECT stanok_id, name, type_id, date_start, srok_e, date_close, detal_id". " FROM stanok LIMIT $ofset,$limit");
        return $res->fetchAll(PDO::FETCH_OBJ);
    }

    public function count(){
        $res = $this->db->query("SELECT COUNT(*) AS cnt FROM stanok");
        return $res->fetch(PDO::FETCH_OBJ)->cnt;
    }

    public function findViewById($id=null){
        if ($id) {
            $res = $this->db->query("SELECT stanok_id, name, type_id, date_start, srok_e, date_close, detal_id". " FROM stanok WHERE stanok_id =$id");
            return $res->fetch(PDO::FETCH_OBJ);
        }
    return false;
    }



}