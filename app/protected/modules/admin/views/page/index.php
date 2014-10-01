<?php
/* @var $this PageController */
/* @var $model Page */

$this->breadcrumbs=array(
	'Страницы'=>array('index'),
	'Менеджер',
);

$this->menu=array(
	array('label'=>'Создание страниц', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#page-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Менеджер страниц</h1>

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

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'page-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'id' => array(
			'name' => 'id',
			'headerHtmlOptions' => array('width'=>30),
		),
		'title',
		'created',
		'status' => array(
			'name' => 'status',
			'value' => '$data->status == 1 ? "Опубликовано" : "Скрыто"',
			'filter' => array(0=>'Скрыто', 1=>'Опубликовано'),
		),
		'category_id' => array(
			'name' => 'category_id',
			'value' => '$data->category->title',
			'filter' => Category::allCategories(),
		),
		array(
			'class'=>'CButtonColumn',
			'viewButtonUrl'=>'CHtml::normalizeUrl(array("/page/view", "id"=>$data->id))',
		),
	),
)); ?>
