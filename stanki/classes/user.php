<?php


class user extends Table
{
    public $user_id=0;
    public $FIO='';
    public function validate()
    {
        if(!empty($this->FIO)){
            return true;
        }
        return false;
    }

}