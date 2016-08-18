<?php

namespace digitech\yiigenerics\controllers;


trait YedDetailView
{
    use \digitech\yiigenerics\controllers\YedController;
    /**
    * Displays a single Country model.
    * @param string $id
    * @return mixed
    */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }
}
