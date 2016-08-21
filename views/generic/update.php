<?php

use yii\helpers\Html;

$ctrl = $this->context;
/* @var $this yii\web\View */
/* @var $model app\models\Country */

$this->title = isset($ctrl->updateTitle) ? $ctrl->updateTitle : 'Update Item';

if(isset($ctrl->label)){
    $this->params['breadcrumbs'][] = [
        'label' => $ctrl->label, 
        'url' => [isset($ctrl->homeAction) ? $ctrl->homeAction : 'index']
    ];
}

if(isset($ctrl->titleColumn)){
    $column = $ctrl->titleColumn;
    $primaryKey = isset($ctrl->primaryKey) ? $ctrl->primaryKey : 'id';
    $this->params['breadcrumbs'][] = ['label' => $model->$column, 'url' => ['view', 'id' => $model->$primaryKey]];
}

$this->params['breadcrumbs'][] = $this->title;
?>
<div class="update">

    <h1><?= Html::encode($this->title) ?></h1>
<?php if(isset($ctrl->prepend)){ echo $ctrl->renderPartial($ctrl->prepend, ['model'=>$model]); } ?>
    <?= $ctrl->renderPartial(isset($ctrl->formAlias) ? $ctrl->formAlias : '@vendor/digitech/yii2-generics/views/generic/_form', [
        'model' => $model,
    ]) ?>
<?php if(isset($ctrl->append)){ echo $ctrl->renderPartial($ctrl->append, ['model'=>$model]); } ?>
</div>
