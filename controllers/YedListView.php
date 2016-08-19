<?php

namespace digitech\yiigenerics\controllers;
use yii\data\ActiveDataProvider;

trait YedListView
{

    /**
    * @var string $label the breadcrumb link label for controller index
    */
    # public $label = '';
    /**
    * @var boolean $showOperations used to determine the visibility of buttons for operation such as update, delete
    */
    # public $showOperations = false;
    /**
    * @var boolean $serialize used to determine the visibility of serial number in list column
    */
    # public $serialize = false;
    /**
    * @var boolean $actionButtons used to determine the visibility of action buttons in list column
    */
    # public $actionButtons = false;
    /**
    * @var string $createButtonLabel the create button label
    */
    # public $createButtonLabel = 'Add New';
    /**
    * @var string $prepend view name to render partial at the top of the detail view
    */
    # public $prepend = '';
    /**
    * @var string $append view name to render partial at the bottom of the detail view
    */
    # public $append = '';
    /**
    * @var string $listViewAlias view name to render
    */
    # public $listViewAlias = '';
    /**
    * @var array $listColumns list view attributes definition
    */
    # public $listColumns = [];

    /**
    * List all models.
    * @return mixed
    */
    public function actionIndex()
    {
        $view = '@vendor/digitech/yii2-generics/views/generic/index';
        if(isset($this->listViewAlias)){
            $view = $this->listViewAlias;
        }
        $this->validateModelName();
        $modelName = $this->modelName;
        $dataProvider = new ActiveDataProvider([
            'query' => $modelName::find(),
        ]);
        $this->beforeListRender();
        return $this->render($view, [
            'dataProvider' => $dataProvider,
        ]);
    }
}
