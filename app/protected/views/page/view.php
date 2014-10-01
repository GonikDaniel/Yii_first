<?php
/* @var $this PageController */

$this->breadcrumbs=array(
	'Категория: ' . $model->category->title => array('index', 'id' => $model->category_id),
	$model->title,
);

echo '<div class="post" style="margin-bottom:20px; box-shadow: 0 0 2px rgba(0,0,0,0.5); padding: 10px;">';
echo '<h2>' . $model->title . '</h2>';
echo '<p>' . $model->content . '</p>';
echo '<p>' . $model->created . '</p>';
echo '</div>';
?>

<hr>
<!-- Выводим комментарии -->
<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider' => Comment::allComments($model->id),
	'itemView' => '_viewComment',
)); ?>

<!-- Проверяем отправку комментария -->
<?php if(Yii::app()->user->hasFlash('comment')): ?>

<div class="flash-success">
    <?php echo Yii::app()->user->getFlash('comment'); ?>
</div>

<?php else: ?>
<!-- Рендерим форму с полями для комментария -->
<?php echo $this->renderPartial('new_comment', array('model'=>$new_comment)); ?>
<?php endif; ?>