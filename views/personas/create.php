<?php

use yii\helpers\Html;

use yii\widgets\ActiveForm;


/* @var $this yii\web\View */
/* @var $model app\models\Personas */

$this->title = 'Create Personas';
$this->params['breadcrumbs'][] = ['label' => 'Personas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<?php $form = ActiveForm::begin() ?>
    <?= $form->field($persona, 'nombre') ?>
    <div class="form-group">
        <?= Html::submitButton('Insertar', ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Cancelar', ['personas/index'], ['class' => 'btn btn-danger']) ?>
    </div>
<?php ActiveForm::end() ?>
