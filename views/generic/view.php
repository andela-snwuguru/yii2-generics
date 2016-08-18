<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use \digitech\yiigenerics\YedUtil;

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

<div class="view">

    <h1><?= Html::encode($this->title) ?></h1>
<?php if(isset($ctrl->showOperations) && $ctrl->showOperations):
        if(!isset($ctrl->primaryKey)){ YedUtil::exception('To show operation buttons you need to add $primaryKey to your controller'); }
        $primaryKey = $ctrl->primaryKey;
 ?>
    <p>
    <?php if((method_exists($ctrl, 'can') && $ctrl->can('update')) || !method_exists($ctrl, 'can')): ?>
        <?= Html::a('Update', ['update', 'id' => $model->$primaryKey], ['class' => 'btn btn-primary']) ?>
    <?php endif; ?>
    <?php if((method_exists($ctrl, 'can') && $ctrl->can('delete')) || !method_exists($ctrl, 'can')): ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->$primaryKey], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    <?php endif; ?>

    </p>
<?php endif; ?>
<?php if(isset($ctrl->prepend)){ echo $ctrl->renderPartial($ctrl->prepend, ['model'=>$model]); } ?>
    <?= DetailView::widget($params) ?>
<?php if(isset($ctrl->append)){ echo $ctrl->renderPartial($ctrl->append, ['model'=>$model]); } ?>

</div>
