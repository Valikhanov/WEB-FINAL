<?php


class nakladnaya extends Table
{
    public $nakladnaya_id=0;
    public $data_p='';
    public $sklad_id=0;
    public $detal_id=0;
    public $user_id=0;
    public function validate()
    {
        if(!empty($this->data_p)&&
        !empty($this->sklad_id)&&
        !empty($this->detal_id)&&
        !empty($this->user_id)){
            return true;
        }
        return false;
    }

}