<?php
/* @var $this UserController */
/* @var $model User */

$this->breadcrumbs=array(
	'Пользователи'=>array('index'),
	$model->username=>array('view','id'=>$model->id),
	'Обновление',
);

$this->menu=array(
	array('label'=>'Список пользователей',  'url'=>array('index')),
	array('label'=>'Просмотр пользователя', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Изменить пароль', 		'url'=>array('password', 'id'=>$model->id)),
);
?>

<h1>Обновление пользователя <?php echo $model->username; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>