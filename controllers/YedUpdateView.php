<?php

namespace digitech\yiigenerics\controllers;
use Yii;

trait YedUpdateView
{
    /**
    * @var string $redirectAction the action name to redirect to after successful create or update.
    */
    # public $redirectAction = 'view'; 
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
    * @var string $updateViewAlias template name to render for update view
    * Generic template will be used if not defined
    */
    # public $updateViewAlias = '@vendor/digitech/yii2-generics/views/generic/update';
    /**
    * @var string $updateTitle title to display in create view
    */
    # public $updateTitle = 'Update Item';
    /**
    * @var string $updateButtonLabel label to display on update button in form template
    */
    # public $updateButtonLabel = 'Update';
    /**
    * @var string $buttonClass css class to apply to form submit button
    */
    # public $buttonClass = '';
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
     * Updates an existing Country model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param string $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $view = '@vendor/digitech/yii2-generics/views/generic/update';
        if(isset($this->updateViewAlias)){
            $view = $this->updateViewAlias;
        }
        $model = $this->findModel($id);
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
