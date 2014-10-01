<?php
/* @var $this PageController */

$this->breadcrumbs=array(
	'Категория: ' . $category->title,
);
if(Yii::app()->user->checkAccess('Admin')){
    echo "hello, I'm administrator";
}
foreach ($models as $model) {
	echo '<div class="post" style="margin-bottom:20px; box-shadow: 0 0 2px rgba(0,0,0,0.5); padding: 10px;">';
	echo CHtml::link('<h3>' . $model->title . '</h3>', array('view', 'id'=>$model->id));
	echo '<p>' . substr($model->content, 0, 300) . '</p>';
	echo CHtml::link('читать далее...', array('view', 'id'=>$model->id));
	echo '</div>';
}

if (empty($models)) {
	echo "<h3>В данной категории статей нет.</h3>";
}

?>
