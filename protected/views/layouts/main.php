<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="language" content="ru" />
    <?php Yii::app()->clientScript->registerCssFile(
        Yii::app()->assetManager->publish(
        Yii::getPathOfAlias('application.assets.css').'/main.css'
        )
    ); ?>

    <title>Pet Shelter</title>
</head>
<body>
<div>
    <?php
        echo CHtml::link('Home', '/', ['style' => 'margin:20px;']);
        echo CHtml::link('Set Pet', ['/shelter/setPet'], ['style' => 'margin:20px;']);
        echo CHtml::link('Withdraw Pet', ['/shelter/withdrawPet'], ['style' => 'margin:20px;']);
    ?>
</div>
<hr>
<div id = "wrapper">
    <?php echo $content; ?>
</div>
</body>
</html>
