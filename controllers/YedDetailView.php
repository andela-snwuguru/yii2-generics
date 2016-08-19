<?php

namespace digitech\yiigenerics\controllers;


trait YedDetailView
{
    use \digitech\yiigenerics\controllers\YedController;

    /**
    * @var string $titleColumn the column name to use for the page title
    */
    # public $titleColumn = '';
    /**
    * @var string $primaryKey the primary key column name to use in operation buttons
    */
    # public $primaryKey = '';
    /**
    * @var string $label the breadcrumb link label for controller index
    */
    # public $label = '';
    /**
    * @var boolean $showOperations used to determine the visibility of buttons for operation such as update, delete
    */
    # public $showOperations = false;
    /**
    * @var string $homeAction the action name to use for controller index without the action prefix. default is index
    */
    # public $homeAction = 'index';
    /**
    * @var string $prepend view name to render partial at the top of the detail view
    * The loaded model is available in the view as $model
    */
    # public $prepend = '';
    /**
    * @var string $append view name to render partial at the bottom of the detail view
    * The loaded model is available in the view as $model
    */
    # public $append = '';
    /**
    * @var string $detailViewAlias view name to render
    */
    # public $detailViewAlias = '';
    /**
    * @var array $detailColumns detail view attributes definition
    */
    # public $detailColumns = [];

    /**
    * Displays a single model.
    * @param string $id
    * @return mixed
    */
    public function actionView($id)
    {
        $view = '@vendor/digitech/yii2-generics/views/generic/view';
        if(isset($this->detailViewAlias)){
            $view = $this->detailViewAlias;
        }
        $model =  $this->findModel($id);
        $this->beforeDetailRender($model);
        return $this->render($view, [
            'model' => $model,
        ]);
    }
}
