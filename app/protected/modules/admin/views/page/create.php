<?php
/* @var $this PageController */
/* @var $model Page */

$this->breadcrumbs=array(
	'Страницы'=>array('index'),
	'Создание',
);

$this->menu=array(
	array('label'=>'Список страниц', 'url'=>array('index')),
);
?>

<h1>Создание страниц</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>