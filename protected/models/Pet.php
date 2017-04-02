<?php

class Pet extends CActiveRecord
{
    public function rules(){
        return [
            ['type_id', 'safe', 'on' => 'search'],
            ['type_id, nickname, age', 'required', 'on' => 'insert'],
            ['type_id', 'in', 'range' => CHtml::listData(PetType::model('PetType')->findAll(), 'id', 'id'), 'on' => 'insert'],
            ['age', 'numerical', 'integerOnly' => true, 'min' => 0, 'max' => 99, 'on' => 'insert'],
        ];
    }

    public function relations(){
        return [
            'type' => [self::BELONGS_TO, 'PetType', 'type_id']
        ];
    }

    public function attributeLabels(){
        return [
            'type' => 'Вид',
            'type_id' => 'Вид',
            'age' => 'Возраст',
            'created_at' => 'Дата прибытия',
            'nickname' => 'Кличка'
        ];
    }

    public function search(){

        $criteria = new CDbCriteria();

        if (!is_null($this->type_id)) {
            $criteria->compare(
                'type_id', $this->type_id
            );
        }

        $criteria->compare('is_taken', 0);

        return  new CActiveDataProvider('Pet', [
                    'criteria'=>$criteria,
                    'sort'       => [
                        'defaultOrder' => 'nickname ASC',
                    ],
                ]
            );
    }

    public function giveAway(){
        $this->is_taken = true;
        return $this->save();
    }

    public function beforeSave(){
        if($this->scenario == 'insert')
            $this->created_at = null;
        return true;
    }
}