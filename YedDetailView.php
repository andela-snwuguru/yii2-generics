<?php

namespace digitech\yiigenerics;


trait YedDetailView
{
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
