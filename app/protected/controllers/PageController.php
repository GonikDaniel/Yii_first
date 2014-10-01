<?php

class PageController extends Controller
{
	public function actions()
	{
		return array(
			// captcha action renders the CAPTCHA image displayed on the contact page
			'captcha'=>array(
				'class'=>'CCaptchaAction',
				'backColor'=>0xFAB656,
			),
		);
	}

	public function actionIndex($id)
	{
		$models = Page::model()->findAllByAttributes(array('category_id'=>$id), array('condition'=>'status!=0'));
		$category = Category::model()->findByPk($id);

		$this->render('index', array('models'=>$models, 'category'=>$category));
	}

	public function actionView($id)
	{
		$model = Page::model()->findByPk($id);
		$new_comment = new Comment;

		if (isset($_POST['Comment'])) {
			$setting = Setting::model()->findByPk(1);
			$new_comment->attributes = $_POST['Comment'];
			$new_comment->page_id = $model->id;
			$new_comment->status = ($setting->defaultStatusComment == 0) ? 0 : 1;

			if ($new_comment->save()) {
				$setting = Setting::model()->findByPk(1);
				if ($setting->defaultStatusComment == 0) {
					Yii::app()->user->setFlash('comment', 'Ваш комментарий будет опубликован после модерации.');
				} elseif ($setting->defaultStatusComment == 1) {
					Yii::app()->user->setFlash('comment', 'Ваш комментарий опубликован.');
				}
				$this->refresh();
			}
		}
		if (Yii::app()->user->isGuest) {
			$new_comment->scenario = 'Guest';	
		}

		$this->render('view', array('model'=>$model, 'new_comment'=>$new_comment));
	}

}