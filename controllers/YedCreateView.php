<?php

namespace digitech\yiigenerics\controllers;
use Yii;

trait YedCreateView
{
    /**
    * @var string $redirectAction the action name to redirect to after successful create or update.
    */
    # public $redirectAction = 'view'; 
    /**
    *@var string $modelName the full alias to the model name (app\models\ModelName)
    */
    # $modelName = 'ModelName';
    /**
    * @var string $label the breadcrumb link label for controller index
    */
    # public $label = '';
    /**
    * @var string $homeAction the action name to use for controller index without the action prefix. default is index
    */
    # public $homeAction = 'index';
    /**
    * @var string $primaryKey the primary key column name of the model
    */
    # public $primaryKey = 'id';
    /**
    * @var string $createViewAlias template name to render for create view
    * Generic template will be used if not defined
    */
    # public $createViewAlias = '@vendor/digitech/yii2-generics/views/generic/create';
    /**
    * @var string $createTitle title to display in create view
    */
    # public $createTitle = 'Add New';
    /**
    * @var string $formAlias template name to render form elements
    * Generic template will be used if not defined
    */
    # public $formAlias = '@vendor/digitech/yii2-generics/views/generic/_form';
    /**
    * @var string $prepend view name to render partial at the top of the view template
    * The loaded model is available in the view as $model
    */
    # public $prepend = '';
    /**
    * @var string $append view name to render partial at the bottom of the view template
    * The loaded model is available in the view as $model
    */
    # public $append = '';

    /**
     * Creates a new model.
     * If creation is successful, the browser will be redirected to the $redirectAction if defined or 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $view = '@vendor/digitech/yii2-generics/views/generic/create';
        if(isset($this->createViewAlias)){
            $view = $this->createViewAlias;
        }
        $this->validateModelName();
        $modelName = $this->modelName;
        $model = new $modelName();
        $primaryKey = isset($this->primaryKey) ? $this->primaryKey : 'id';
        if(method_exists($this, 'beforeFormRender'))
            $this->beforeFormRender($model);
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect([isset($this->redirectAction) ? $this->redirectAction : 'view', 'id' => $model->$primaryKey]);
        } else {
            return $this->render($view, [
                'model' => $model,
            ]);
        }
    }
}
