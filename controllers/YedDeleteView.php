<?php

namespace digitech\yiigenerics\controllers;

trait YedDeleteView
{
    /**
    * @var string $homeAction the action name to use for controller index without the action prefix. default is index
    */
    # public $homeAction = 'index';

    /**
     * Deletes an existing model.
     * If deletion is successful, the browser will be redirected to the $homeAction if defined or 'index' page.
     * @param string $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $model = $this->findModel($id);
        $this->beforeDelete($model);
        $model->delete();
        return $this->redirect([isset($this->homeAction) ? $this->homeAction : 'index']);
    }

}
