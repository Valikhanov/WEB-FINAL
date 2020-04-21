<?php


class stanok extends Table
{
    public $stanok_id=0;
    public $name='';
    public $type_id=0;
    public $date_start='';
    public $srok_e=0;
    public $date_close='';
    public $detal_id=0;
    public function validate()
    {
        if(!empty($this->name)&&
        !empty($this->type_id)&&
        !empty($this->date_start)&&
        !empty($this->srok_e)&&
        !empty($this->date_close)&&
        !empty($this->detal_id)){
            return true;
        }
        return false;
    }

}