<?php


class sklad extends Table
{
    public $sklad_id=0;
    public $numder=0;
    public $adres='';
    public $S=0;
    public function validate()
    {
        if(!empty($this->number)&&
        !empty($this->adres)&&
        !empty($this->S)){
            return true;
        }
        return false;
    }

}