<?php

namespace digitech\yiigenerics\controllers;

use yii\web\NotFoundHttpException;
use \digitech\yiigenerics\YedUtil;
use yii\filters\VerbFilter;


trait YedController
{

    /**
    *@var string $modelName the full alias to the model name (app\models\ModelName)
    */
    # $modelName = 'ModelName';

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
    * A method to validate access control for operation buttons
    * Override this method to implement your access control 
    *@param string $view the action name without the action prefix
    *@return boolean 
    */
    public function can($view){
        return true;
    }

    /**
    * A method to manipluate or validate loaded model before it is sent to detail view
    * You can also use this method to set $prepend and $append attribute for detail view
    * This function is called immediately after model is loaded
    *@param string $model reference of the loaded model, any change to this model will affect the model passed to the detail view
    */
    public function beforeDetailRender(&$model){
        
    }

    /**
    * You can use this method to set $prepend and $append attribute for list view
    * This function is called before the controller render
    */
    public function beforeListRender(){
        
    }

    /**
    * Check is $modelName is defined in the controller
    * @throws NotFoundHttpException if the modelName is not defined
    */
    public function validateModelName(){
        if(!isset($this->modelName)){
            YedUtil::exception('You need to set $modelName in the controller');
        }
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
        $this->validateModelName();
        $modelName = $this->modelName;
        if (($model = $modelName::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
