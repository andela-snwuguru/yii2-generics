<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
$ctrl = $this->context;
/* @var $this yii\web\View */
/* @var $model app\models\Country */
if(isset($ctrl->titleColumn)){
    $column = $ctrl->titleColumn;
    $this->title = $model->$column;
}

if(isset($ctrl->label)){
    $this->params['breadcrumbs'][] = [
        'label' => $ctrl->label, 
        'url' => [isset($ctrl->homeAction) ? $ctrl->homeAction : 'index']
    ];
}

$this->params['breadcrumbs'][] = $this->title;
$params = ['model' => $model];
if(isset($ctrl->detailColumns)){
    $params['attributes'] = $ctrl->detailColumns;
}
?>

<div class="country-view">

    <h1><?= Html::encode($this->title) ?></h1>
<?php if(isset($ctrl->showOperations) && $ctrl->showOperations): ?>
    <p>
    <?php if((method_exists($ctrl, 'can') && $ctrl->can('update')) || !method_exists($ctrl, 'can')): ?>
        <?= Html::a('Update', ['update', 'id' => $model->code], ['class' => 'btn btn-primary']) ?>
    <?php endif; ?>
    <?php if((method_exists($ctrl, 'can') && $ctrl->can('delete')) || !method_exists($ctrl, 'can')): ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->code], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    <?php endif; ?>

    </p>
<?php endif; ?>
    <?= DetailView::widget($params) ?>

</div>