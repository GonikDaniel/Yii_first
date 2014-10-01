<?php
/* @var $this CommentController */
/* @var $model Comment */

$this->breadcrumbs=array(
	'Комментарии'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'Список комментариев', 'url'=>array('index')),
	array('label'=>'Удалить комментарий', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Вы уверены, что хотите удалить эти комментарии?')),
);
?>

<h1>Просмотр комментария #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'page.title',
		'content',
		'created',
		'user.username',
		'guest',
		'status',
	),
)); ?>