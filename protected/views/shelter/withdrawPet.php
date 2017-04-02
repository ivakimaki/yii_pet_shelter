<h3>Забрать животное из приюта:</h3>

<?php $form = $this->beginWidget('CActiveForm', ['method' => 'post'] ); ?>
    <div class="row">
        <?php echo $form->label($model,'type_id'); ?>
        <?php echo $form->dropdownList($model,'type_id',  CHtml::listData(PetType::model('PetType')->findAll(), 'id', 'title'), ['empty' => 'Любой']) ?>

        <?php echo CHtml::submitButton('Забрать'); ?>
    </div>
    <div class="flash-error">
        <?php echo $form->errorSummary($model); ?>
    </div>

<?php $this->endWidget(); ?>

