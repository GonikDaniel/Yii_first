<?php
/* @var $this CommentController */
/* @var $data Comment */
?>

<div class="view">

<?php if($data->user_id): ?>
    <b><?php echo CHtml::encode($data->getAttributeLabel('user_id')); ?>:</b>
    <?php echo CHtml::encode($data->user->username); ?>
    <br />
<?php else: ?>
    <b><?php echo CHtml::encode($data->getAttributeLabel('guest')); ?>:</b>
    <?php echo CHtml::encode($data->guest); ?>
    <br />
<?php endif; ?>

    <b><?php echo CHtml::encode($data->getAttributeLabel('created')); ?>:</b>
    <?php echo CHtml::encode($data->created); ?>
    <br />

    <b><?php echo CHtml::encode($data->getAttributeLabel('content')); ?>:</b>
    <?php echo CHtml::encode($data->content); ?>

</div>
