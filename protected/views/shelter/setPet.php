<h3>Поместить животное в приют:</h3>

<?php $form = $this->beginWidget('CActiveForm', ['method' => 'post'] ); ?>
    <div class="row">
        <?php echo $form->label($model,'type_id'); ?>
        <?php echo $form->dropdownList($model,'type_id',  CHtml::listData(PetType::model('PetType')->findAll(), 'id', 'title')) ?>

        <?php echo $form->label($model,'nickname'); ?>
        <?php echo $form->textField($model,'nickname') ?>

        <?php echo $form->label($model,'age'); ?>
        <?php echo $form->numberField($model,'age') ?>

        <?php echo CHtml::submitButton('Отправить'); ?>
    </div>
    <div class="flash-error">
        <?php echo $form->errorSummary($model); ?>
    </div>

<?php $this->endWidget(); ?>

