<?php


class NakladnayaMap extends BaseMap
{
 

    public function findById($id=null){
        if ($id) {
            $res = $this->db->query("SELECT nakladnaya_id, data_p, sklad_id, detal_id, user_id ". "FROM nakladnaya WHERE nakladnaya_id = $id");
            return $res->fetchObject("Nakladnaya");
        }
        return new Nakladnaya();
    }
    
    public function save(Nakladnaya $nakladnaya){
        if ($nakladnaya->validate()) {
            if ($nakladnaya->stanok_id == 0) {
                return $this->insert($nakladnaya);
            } 
            else {
                return $this->update($nakladnaya);
            }
        }
        return false;
    }

    private function insert(Nakladnaya $nakladnaya){
        $data_p = $this->db->quote($nakladnaya->data_p);
        if ($this->db->exec("INSERT INTO nakladnaya(nakladnaya_id, data_p, sklad_id, detal_id, user_id) VALUES($nakladnaya->nakladnaya_id, $data_p, $nakladnaya->sklad_id, $nakladnaya->detal_id, $nakladnaya->user_id)") == 1) {
            return true;
        }
    return false;
    }

    private function update(Nakladnaya $nakladnaya){
        $data_p = $this->db->quote($nakladnaya->data_p);
        if ( $this->db->exec("UPDATE nakladnaya SET data_p = $data_p,". " sklad_id=$nakladnaya->sklad_id, detal_id=$nakladnaya->detal_id, user_id=$nakladnaya->user_id WHERE nakladnaya_id = ".$nakladnaya->nakladnaya_id) == 1) {
            return true;
        }
        return false;
    }

    public function findAll($ofset=0, $limit=30){
        $res = $this->db->query("SELECT nakladnaya_id, data_p, sklad_id, detal_id, user_id". " FROM nakladnaya LIMIT $ofset,$limit");
        return $res->fetchAll(PDO::FETCH_OBJ);
    }

    public function count(){
        $res = $this->db->query("SELECT COUNT(*) AS cnt FROM nakladnaya");
        return $res->fetch(PDO::FETCH_OBJ)->cnt;
    }

    public function findViewById($id=null){
        if ($id) {
            $res = $this->db->query("SELECT nakladnaya_id, data_p, sklad_id, detal_id, user_id". " FROM nakladnaya WHERE nakladnaya_id =$id");
            return $res->fetch(PDO::FETCH_OBJ);
        }
    return false;
    }



}