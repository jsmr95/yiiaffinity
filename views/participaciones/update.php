<?php
use app\models\Peliculas;
use yii\helpers\Html;
use web\helpers\CHtml;
use yii\widgets\ActiveForm;

$this->title = 'Gestión de participaciones en una película';
$this->params['breadcrumbs'][] = $this->title;
?>
<h1>Participantes en la película <?= Html::encode($pelicula->titulo) ?></h1>
<table class="table table-striped">
    <thead>
        <th>Persona</th>
        <th>Papel</th>
        <th>Quitar</th>
    </thead>
    <tbody>
        <?php foreach ($participaciones as $participacion): ?>
            <tr>
                <td><?= Html::encode($participacion->persona->nombre) ?></td>
                <td><?= Html::encode($participacion->papel->papel) ?></td>
                <td><?= Html::a(
                    'Quitar',
                    [
                        'participaciones/delete',
                        'pelicula_id' => $participacion->pelicula_id,
                        'persona_id' => $participacion->persona_id,
                        'papel_id' => $participacion->papel_id,
                    ],
                    ['class' => 'btn-xs btn-danger']
                ) ?></td>
            </tr>
        <?php endforeach ?>
    </tbody>
</table>
<?php $form = ActiveForm::begin(['action' => ['participaciones/create'], 'method' => 'post']);
      Html::hiddenInput('pelicula_id' , $pelicula->id);?>
<div class="row">
  <div class="col-sm-4">
    <h3>Actor/Actriz</h3>
    <?= Html::dropDownList($personas, 'persona_id', $personas) ?>
  </div>
  <div class="col-sm-4">
    <h3>Papel</h3>
    <?= Html::dropDownList($papeles, 'papel_id', $papeles) ?>
  </div>
</div>
<br>
<div class="row">
  <div class="text-center">
    <?= Html::submitButton('Añadir Participacion', ['class' => 'btn btn-primary']) ?>
    <?= Html::a('Volver', ['peliculas/ver', 'id'=>$participacion->pelicula_id], ['class' => 'btn btn-danger']) ?>
  </div>
</div>
<?php ActiveForm::end() ?>
