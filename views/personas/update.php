<?php

use yii\helpers\Html;

use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Personas */

$this->title = 'Modificar un nuevo género';
$this->params['breadcrumbs'][] = ['label' => 'Personas', 'url' => ['personas/index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<?php $form = ActiveForm::begin() ?>
    <?= $form->field($persona, 'nombre') ?>
    <div class="form-group">
        <?= Html::submitButton('Modificar', ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Cancelar', ['personas/index'], ['class' => 'btn btn-danger']) ?>
    </div>
<?php ActiveForm::end() ?>
