<?php
/* @var $this CategoryController */
/* @var $model Category */

$this->breadcrumbs=array(
	'Категории'=>array('index'),
	'Создание',
);

$this->menu=array(
	array('label'=>'Список категорий', 'url'=>array('index')),
);
?>

<h1>Создание категории.</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>