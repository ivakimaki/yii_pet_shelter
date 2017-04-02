<h3>Поздравляем, вы забрали животное:</h3>

<?php $form = $this->widget('zii.widgets.CDetailView',[
    'data' => $model,
    'attributes' =>
    [
        'type' => [
            'name' => 'type',
            'value' => $model->type->title,
        ],
        'nickname',
        'age'
    ],
]); ?>
    <div class="row">

    </div>


