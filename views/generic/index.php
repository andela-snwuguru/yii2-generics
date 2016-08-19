<?php

use yii\helpers\Html;
use yii\grid\GridView;
use \digitech\yiigenerics\YedUtil;

$ctrl = $this->context;
/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */


if(isset($ctrl->label)){
    $this->title = $ctrl->label; 
}
$this->params['breadcrumbs'][] = $this->title;
$serials = ['class' => 'yii\grid\SerialColumn'];
$buttons = ['class' => 'yii\grid\ActionColumn'];
$params = [
    'dataProvider' => $dataProvider
];
if(isset($ctrl->listColumns)){
    $params['columns'] = $ctrl->listColumns;
}
if(isset($ctrl->serialize) && $ctrl->serialize){
    array_unshift($params['columns'], $serials);
}
if(isset($ctrl->actionButtons) && $ctrl->actionButtons){
    $params['columns'][] = $buttons;
}
?>

<div class="index">

    <h1><?= Html::encode($this->title) ?></h1>
<?php 
if(isset($ctrl->showOperations) && $ctrl->showOperations):
if((method_exists($ctrl, 'can') && $ctrl->can('create')) || !method_exists($ctrl, 'can')): ?>
    <p>
        <?= Html::a(isset($ctrl->createButtonLabel) ? $ctrl->createButtonLabel : 'Add New', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
<?php endif; endif; ?>
<?php if(isset($ctrl->prepend)){ echo $ctrl->renderPartial($ctrl->prepend); } ?>
    <?= GridView::widget($params); ?>
<?php if(isset($ctrl->append)){ echo $ctrl->renderPartial($ctrl->append); } ?>
    
</div>
