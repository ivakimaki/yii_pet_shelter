<?php
echo CHtml::form('/shelter/index', 'get');
?>
Вид животного:
<?php
echo CHtml::dropDownList('type_id', $model->type_id, CHtml::listData(PetType::model('PetType')->findAll(),'id', 'title'),['empty' => 'Все', 'style' => 'margin: 0 2px;']) ;
echo CHtml::submitButton('Показать');
echo CHtml::endForm();

?>
<br>

<?php
        $form = $this->widget('zii.widgets.grid.CGridView', array(
            'dataProvider'=>$model->with('type')->search(),
            'columns' => [
                'type' => [
//                    'header' =>'Вид',
                    'name' => 'type',
                    'value' => function($data){ return $data->type->title; }
                ],
                'nickname',
                'created_at:datetime'
            ],
            'htmlOptions' => [
                'style' => 'width: 800px; margin:0 auto;'
            ]
        ));

?>
