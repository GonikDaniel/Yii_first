<?php
/* @var $this UserController */
/* @var $model User */
/* @var $form CActiveForm */
?>
<?php if(Yii::app()->user->hasFlash('registration')): ?>

<div class="flash-success">
	<?php echo Yii::app()->user->getFlash('registration'); ?>
</div>

<?php else: ?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
    'id'=>'user-form',
    // Please note: When you enable ajax validation, make sure the corresponding
    // controller action is handling ajax validation correctly.
    // There is a call to performAjaxValidation() commented in generated controller code.
    // See class documentation of CActiveForm for details on this.
    'enableAjaxValidation'=>false,
)); ?>

    <p class="note">Поля с <span class="required">*</span> обязательны.</p>

    <?php echo $form->errorSummary($model); ?>

    <div class="row">
        <?php echo $form->labelEx($model,'username'); ?>
        <?php echo $form->textField($model,'username',array('size'=>60,'maxlength'=>80)); ?>
        <?php echo $form->error($model,'username'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model,'password'); ?>
        <?php echo $form->passwordField($model,'password',array('size'=>60,'maxlength'=>80)); ?>
        <?php echo $form->error($model,'password'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model,'email'); ?>
        <?php echo $form->textField($model,'email',array('size'=>60,'maxlength'=>80)); ?>
        <?php echo $form->error($model,'email'); ?>
    </div>

    <?php if(CCaptcha::checkRequirements()): ?>
    <div class="row">
    	<?php echo $form->labelEx($model,'verifyCode'); ?>
    	<div>
    	<?php $this->widget('CCaptcha'); ?>
    	<?php echo $form->textField($model,'verifyCode'); ?>
    	</div>
    	<div class="hint">Пожалуйста, введите код с картинки.
    	<br/>Буквы регистроНЕзависимы.</div>
    	<?php echo $form->error($model,'verifyCode'); ?>
    </div>
    <?php endif; ?>

    <div class="row buttons">
        <?php echo CHtml::submitButton('Регистрация!'); ?>
    </div>

<?php $this->endWidget(); ?>

</div><!-- form -->

<?php endif; ?>