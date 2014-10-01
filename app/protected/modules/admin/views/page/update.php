<?php
/* @var $this PageController */
/* @var $model Page */

$this->breadcrumbs=array(
	'Pages'=>array('index'),
	$model->title=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'Список страниц', 'url'=>array('index')),
	array('label'=>'Создать страницу', 'url'=>array('create')),
	array('label'=>'Просмотр страницы', 'url'=>array('/page/view', 'id'=>$model->id)),
	array('label'=>'Менеджер страниц', 'url'=>array('admin')),
);
?>

<h1>Обновление страниц <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>