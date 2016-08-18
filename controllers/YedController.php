<?php

/*
*@property string $modelName the full alias to the model name (app\models\ModelName)
*/

namespace digitech\yiigenerics\controllers;

use yii\web\NotFoundHttpException;
use \digitech\yiigenerics\YedUtil;
use yii\filters\VerbFilter;


trait YedController
{

    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Finds the model based on its primary key value.
     * If the modelName is not defined, a 404 HTTP exception will be thrown.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param string $id
     * @return Model the loaded model
     * @throws NotFoundHttpException if the modelName is not defined
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function findModel($id)
    {
        if(!isset($this->modelName)){
            YedUtil::exception('You need to set $modelName in the controller');
        }

        $modelName = $this->modelName;
        if (($model = $modelName::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
