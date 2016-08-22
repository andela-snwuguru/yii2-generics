<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use \digitech\yiigenerics\YedUtil;

$ctrl = $this->context;
$createButtonLabel = isset($ctrl->createButtonLabel) ? $ctrl->createButtonLabel : 'Create';
$updateButtonLabel = isset($ctrl->updateButtonLabel) ? $ctrl->updateButtonLabel : 'Update';
$buttonClass = isset($ctrl->buttonClass) ? $ctrl->buttonClass : '';
/* @var $this yii\web\View */
/* @var $model app\models\Country */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="generic-form">

    <?php $form = ActiveForm::begin(); ?>
<?php if(!isset($ctrl->formFields)){
    YedUtil::exception('$formFields not defined in controller');
  } 

  if(isset($ctrl->formPrepend)){
    $ctrl->renderPartial($ctrl->formPrepend, ['model' => $model]);
  }
  
  foreach ($ctrl->formFields as $key => $value) {
    $column = $key;
    $params = isset($value['params']) ? $value['params'] : [];
    $fieldType = isset($value['type']) ? $value['type'] : 'textInput';
    echo $form->field($model, $column)->$fieldType($params);
  }

  if(isset($ctrl->formAppend)){
    $ctrl->renderPartial($ctrl->formAppend, ['model' => $model]);
  }
  ?>
    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? $createButtonLabel : $updateButtonLabel, ['class' => $model->isNewRecord ? 'btn btn-success ' . $buttonClass : 'btn btn-primary ' . $buttonClass]) ?>
    </div>
    <?php ActiveForm::end(); ?>

</div>
