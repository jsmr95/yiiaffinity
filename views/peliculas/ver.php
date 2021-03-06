<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;

$this->title = 'Ver una película';
$this->params['breadcrumbs'][] = $this->title;
$inputOptions = [
    'inputOptions' => [
        'class' => 'form-control',
        'readonly' => true,
    ],
];
?>

<dl class="dl-horizontal">
    <dt>Título</dt>
    <dd><?= Html::encode($pelicula->titulo) ?></dd>
</dl>
<dl class="dl-horizontal">
    <dt>Año</dt>
    <dd><?= Html::encode($pelicula->anyo) ?></dd>
</dl>
<dl class="dl-horizontal">
    <dt>Duración</dt>
    <dd><?= Html::encode($pelicula->duracion) ?></dd>
</dl>
<dl class="dl-horizontal">
    <dt>Género</dt>
    <dd><?= Html::encode($pelicula->genero->genero) ?></dd>
</dl>

<?php foreach ($participantes as $papel => $personas): ?>
<dl class="dl-horizontal">
    <dt><?= Html::encode($papel) ?></dt>
           <?php foreach ($personas as $persona): ?>
               <dd><?= Html::encode($persona['nombre']) ?></dd>
           <?php endforeach ?>
       </dl>
<?php endforeach ?>
<div class="row">
    <div class="text-center">
        <?= Html::a('Modificar las Participaciones', ['participaciones/update', 'pelicula_id' => $pelicula->id], ['class' => 'btn btn-info']) ?>
        <?= Html::a('Volver', ['peliculas/index'], ['class' => 'btn btn-danger']) ?>
    </div>
</div>
