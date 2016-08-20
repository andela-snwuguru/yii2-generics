<?php

namespace digitech\yiigenerics;

use yii\web\NotFoundHttpException;


class YedUtil
{

   static function exception($message = 'The requested page does not exist.'){
        throw new NotFoundHttpException($message);
   }

   static function flash($message){
      Yii::$app->session->setFlash($message);
   }
}
