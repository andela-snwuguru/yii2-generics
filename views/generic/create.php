<?php

use yii\helpers\Html;

$ctrl = $this->context;
/* @var $this yii\web\View */
/* @var $model app\models\Country */

$this->title = isset($ctrl->createTitle) ? $ctrl->createTitle : 'Add New';

if(isset($ctrl->label)){
    $this->params['breadcrumbs'][] = [
        'label' => $ctrl->label, 
        'url' => [isset($ctrl->homeAction) ? $ctrl->homeAction : 'index']
    ];
}
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render(isset($ctrl->formAlias) ? $ctrl->formAlias : '@vendor/digitech/yii2-generics/views/generic/_form', [
        'model' => $model,
    ]) ?>

</div>
