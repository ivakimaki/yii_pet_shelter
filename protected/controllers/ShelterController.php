<?php
class ShelterController  extends CController{

	public function actionIndex(){
		$model = new Pet();
		$model->setAttributes($_GET);

		$this->render('index', compact('model'));
	}

	public function actionSetPet(){
		$model = new Pet();

		if (Yii::app()->request->isPostRequest) {
			$model->setAttributes(Yii::app()->request->getPost('Pet'));

			if ($model->save()) {
				$this->redirect('/');
			}
		}

		$this->render('setPet', compact('model'));
	}

	public function actionWithdrawPet(){
		$model = Pet::model('Pet');

		if (Yii::app()->request->isPostRequest) {
			$_post = Yii::app()->request->getPost('Pet');
			$attrs = [
				'is_taken' => false
			];

			if ($_post['type_id']) {
				$attrs['type_id'] = $_post['type_id'];
			}

			$model = $model->findByAttributes($attrs, ['order' => 'created_at ASC']);

			if ($model && $model->giveAway()) {
				$this->redirect(['/shelter/withdrawResult','id' => $model->id]);
			} else {
				$this->redirect(['/shelter/noPets']);
			}
		}

		$this->render('withdrawPet', compact('model'));
	}

	public function actionWithdrawResult($id){
		$model = Pet::model('Pet')->findByPk($id);

		$this->render('withdrawResult', compact('model'));
	}

	public function actionNoPets(){
		$this->render('noPets');
	}

}