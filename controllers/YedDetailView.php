<?php

/*
*@property string $titleColumn the column name to use for the page title
*@property string $primaryKey the primary key column name to use in operation buttons
*@property string $label the breadcrumb link label for controller index
*@property boolean $showOperations used to determine the visibility of buttons for operation such as update, delete
*@property string $homeAction the action name to use for controller index without the action prefix. default is index
*@property string $prepend view name to render partial at the top of the detail view
*@property string $append view name to render partial at the bottom of the detail view
*@property array $detailColumns detail view attributes definition
*@method boolean can($view) a method to validate access control for operation buttons 
*/

namespace digitech\yiigenerics\controllers;


trait YedDetailView
{
    use \digitech\yiigenerics\controllers\YedController;
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

        return $this->render($view, [
            'model' => $this->findModel($id),
        ]);
    }
}
