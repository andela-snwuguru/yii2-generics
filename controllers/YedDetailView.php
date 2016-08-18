<?php

/*
*@property string $titleColumn the column name to use for the page title
*@property string $label the breadcrumb link label for controller index
*@property boolean $showOperations used to determine the visibility of buttons for operation such as update, delete
*@property string $homeAction the action name to use for controller index without the action prefix. default is index
*@property array $detailColumns detail view attributes definition 
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
