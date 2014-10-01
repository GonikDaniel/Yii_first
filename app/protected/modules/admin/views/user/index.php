<?php
/* @var $this UserController */
/* @var $model User */

$this->breadcrumbs=array(
	'Пользователи'=>array('index'),
	'Менеджер',
);

$this->menu=array(
	array('label'=>'Список пользователей', 'url'=>array('index')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#user-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Менеджер Пользователей.</h1>

<p>
Вы можете использовать операторы сравнения (<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b>&lt;&gt;</b>
or <b>=</b>) в начале каждого из Ваших полей поиска, чтобы производить поиск более эффективно.
</p>

<?php echo CHtml::link('Расширенный поиск','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php 
	echo CHtml::form(); 
	echo CHtml::submitButton('Назначить администратором', array('name' => 'admin'));
	echo CHtml::submitButton('Снять с администраторов', array('name' => 'no_admin'));
	echo '<br>';
	echo CHtml::submitButton('Бан', array('name' => 'ban'));
	echo CHtml::submitButton('Снять бан', array('name' => 'no_ban'));
?>
<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'user-grid',
	'selectableRows'=>2,
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'id',
		array(
			'class' => 'CCheckBoxColumn',
			'id' => 'user_id'
		),
		'username',
		'password',
		'email',
		'created',
		'role'=>array(
			'name' => 'role',
			'value' => '($data->role==User::ROLE_ADMIN) ? "Admin" : "User"',
			'filter' => array('', User::ROLE_USER=>'User', User::ROLE_ADMIN=>'Admin'),
		),
		'ban'=>array(
			'name' => 'ban',
			'value' => '($data->ban==1) ? "Забанен" : "Нет"',
			'filter' => array('', 0=>'Нет', 1=>'Да')
		),
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
<?php echo CHtml::endform(); ?>