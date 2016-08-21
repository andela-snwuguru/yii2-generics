<?php

namespace digitech\yiigenerics;

use yii\web\NotFoundHttpException;


class YedUtil
{

    /**
    * @param string $message the message to display to user
    * @throws not found exception
    */
   static function exception($message = 'The requested page does not exist.'){
        throw new NotFoundHttpException($message);
   }

   /**
    * A flash message to display after a page reloads
    * @param string $message the message to display to user
    */
   static function flash($message){
      Yii::$app->session->setFlash($message);
   }
}
