<hr>
<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
    'id'=>'comment-form',
    // Please note: When you enable ajax validation, make sure the corresponding
    // controller action is handling ajax validation correctly.
    // There is a call to performAjaxValidation() commented in generated controller code.
    // See class documentation of CActiveForm for details on this.
    'enableAjaxValidation'=>false,
)); ?>

    <?php echo $form->errorSummary($model); ?>

    <div class="row">
        <?php echo $form->labelEx($model,'content'); ?>
        <?php echo $form->textArea($model,'content',array('rows'=>6, 'cols'=>50, 'maxlength'=>255)); ?>
        <?php echo $form->error($model,'content'); ?>
    </div>

<!-- Если пользователь гость, то выводим дополнительные поля для заполнения -->
<?php if(Yii::app()->user->isGuest): ?>

    <div class="row">
        <?php echo $form->labelEx($model,'guest'); ?>
        <?php echo $form->textField($model,'guest',array('size'=>60,'maxlength'=>80)); ?>
        <?php echo $form->error($model,'guest'); ?>
    </div>

    <?php if(CCaptcha::checkRequirements()): ?>
    <div class="row">
        <?php echo $form->labelEx($model,''); ?>
        <div>
        <?php $this->widget('CCaptcha'); ?>
        <?php echo $form->textField($model,'verifyCode'); ?>
        </div>
        <div class="hint">Пожалуйста, введите код с картинки.
        <br/>Буквы регистроНЕзависимы.</div>
        <?php echo $form->error($model,'verifyCode'); ?>
    </div>
    <?php endif; ?> <!-- конец вывода капчи -->
<?php endif; ?> <!-- конец доп.полей -->
    <div class="row buttons">
        <?php echo CHtml::submitButton('Ок'); ?>
    </div>
<?php $this->endWidget(); ?>

</div><!-- form -->