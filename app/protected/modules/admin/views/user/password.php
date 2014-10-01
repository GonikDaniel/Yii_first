<?php

$this->menu=array(
	array('label'=>'Список пользователей', 'url'=>array('index')),
	array('label'=>'Просмотр пользователя', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Изменить пользователя', 'url'=>array('update', 'id'=>$model->id)),
);

?>

<h1>Изменение пароля <?php echo $model->username; ?></h1>

<p>Введите свой новый пароль:</p>

<div class="form">
<?php $form=$this->beginWidget('CActiveForm'); ?>
 
    <?php echo $form->errorSummary($model); ?>
 
    <div class="row">
        <?php echo $form->label($model,'password'); ?>
        <?php echo $form->passwordField($model, 'password'); ?>
    </div>
 
    <div class="row submit">
        <?php echo CHtml::submitButton('Изменить'); ?>
    </div>
 
<?php $this->endWidget(); ?>
</div><!-- form -->