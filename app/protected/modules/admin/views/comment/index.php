<?php
/* @var $this CommentController */
/* @var $model Comment */

$this->breadcrumbs=array(
	'Комментарии'=>array('index'),
	'Менеджер',
);

$this->menu=array(
	array('label'=>'Создание комментариев', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#comment-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Менеджер комментариев</h1>

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
	echo CHtml::submitButton('Публиковать', array('name' => 'comment_status_on'));
	echo CHtml::submitButton('Скрыть', array('name' => 'comment_status_off'));
?>

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'comment-grid',
	'dataProvider'=>$model->search(),
	'selectableRows'=>2,
	'filter'=>$model,
	'columns'=>array(
		'id' => array(
			'name' => 'id',
			'headerHtmlOptions' => array('width'=>30),
		),
		array(
			'class' => 'CCheckBoxColumn',
			'id' => 'comment_id',
		),
		'page_id' => array(
			'name' => 'page_id',
			'value' => '$data->page->title',
			'filter' => Page::allPages(),
		),
		'content',
		'created',
		'user_id' => array(
			'name' => 'user_id',
			'value' => '$data->user == NULL ? "Guest" : $data->user->username',
			'filter' => User::allUsers(),
		),
		'guest' => array(
			'name' => 'guest',
			'value' => '$data->guest == 1 ? "Да" : "Нет"',
			'filter' => array(''=>'', NULL=>'Нет', '/\w+/'=>'Да'),
		),
		'status' => array(
			'name' => 'status',
			'value' => '$data->status == 1 ? "V" : "X"',
			'filter' => array(''=>'', 0=>'Скрыт', 1=>'Опубликован'),
			'headerHtmlOptions' => array('width'=>30),
		),
		array(
			'class'=>'CButtonColumn',
			'updateButtonOptions' => array('style' => 'display:none'),
		),
	),
)); ?>

<?php echo CHtml::endform(); ?>
