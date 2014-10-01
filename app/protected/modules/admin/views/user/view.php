<?php
/* @var $this UserController */
/* @var $model User */

$this->breadcrumbs=array(
	'Пользователи'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'Список пользователей', 'url'=>array('index')),
	array('label'=>'Добавление пользователя', 'url'=>array('create')),
	array('label'=>'Обновление пользователя', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Удаление пользователя', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Вы уверены, что хотите удалить данного пользователя?')),
);
?>

<h1>Просмотр пользователя #<?php echo $model->username; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'username',
		'password',
		'email',
		'created',
		'role',
		'ban' => array(
			'name'  => 'ban',
			'value' => ($model->ban == 0) ? 'Нет' : 'Забанен',
		),
	),
)); ?>
