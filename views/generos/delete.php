<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
$this->title = 'Eliminar un género';
$this->params['breadcrumbs'][] = ['label' => 'Géneros', 'url' => ['generos/index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<?php $form = ActiveForm::begin() ?>
    <h1>¿Desea borrar este género?</h1>
    <?= $form->field($generosForm, 'genero') ?>
    <div class="form-group">
        <?= Html::a('Eliminar', ['generos/delete', 'id' => $id,],
                                ['class' => 'btn btn-danger', 'data-method' => 'POST',]) ?>
        <?= Html::a('Cancelar', ['generos/index'], ['class' => 'btn btn-info']) ?>
    </div>
<?php ActiveForm::end() ?>
