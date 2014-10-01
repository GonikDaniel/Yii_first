<?php
/* @var $this PageController */
/* @var $model Page */

$this->breadcrumbs=array(
	'Pages'=>array('index'),
	$model->title,
);

$this->menu=array(
	array('label'=>'Список страниц', 'url'=>array('index')),
	array('label'=>'Создание страницы', 'url'=>array('create')),
	array('label'=>'Обновление страницы', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Удаление страницы', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Менеджер страниц', 'url'=>array('admin')),
);
?>

<h1>Просмотр страниц #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'title',
		'content',
		'created',
		'status',
		'category_id',
	),
)); ?>
