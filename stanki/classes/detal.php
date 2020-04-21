<?php


class detal extends Table
{
    public $detal_id=0;
    public $name= '';
    public $cena=0;
    public function validate()
    {
        if(!empty($this->name)&&
        !empty($this->cena)){
            return true;
        }
        return false;
    }

}