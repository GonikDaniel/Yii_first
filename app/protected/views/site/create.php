<?php
/* @var $this SiteController */
/* @var $model User */

$this->breadcrumbs=array(
	'Users'=>array('index'),
	'Create',
);
?>

<h1>Регистрация</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>