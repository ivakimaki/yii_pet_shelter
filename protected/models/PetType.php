<?php

class PetType extends CActiveRecord
{
    public function tableName(){
        return 'pet_type';
    }

    public function primaryKey(){
        return 'id';
    }


}