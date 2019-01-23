<?php

use yii\helpers\Html;

use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Papeles */

$this->title = 'Update Papeles';
$this->params['breadcrumbs'][] = ['label' => 'Papeles', 'url' => ['index']];
$this->params['breadcrumbs'][] = 'Update';
?>
<?php $form = ActiveForm::begin() ?>
    <?= $form->field($papel, 'papel') ?>
    <div class="form-group">
        <?= Html::submitButton('Modificar', ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Cancelar', ['papeles/index'], ['class' => 'btn btn-danger']) ?>
    </div>
<?php ActiveForm::end() ?>
