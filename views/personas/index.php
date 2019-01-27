<?php

use yii\helpers\Html;
use yii\grid\GridView;

use yii\web\Link;

use yii\widgets\LinkPager;

/* @var $this yii\web\View */
/* @var $searchModel app\models\PersonasSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Personas';
$this->params['breadcrumbs'][] = $this->title;
?>
<table class="table table-striped">
    <thead>
        <th>Nombre</th>
    </thead>
    <tbody>
        <?php foreach ($filas as $fila): ?>
            <tr>
                <td><?= Html::a(Html::encode($fila->nombre),['personas/ver', 'id' => $fila->id]) ?></td>
                <td>
                    <?= Html::a('Modificar', ['personas/update', 'id' => $fila->id], ['class' => 'btn-xs btn-info']) ?>
                    <?= Html::a(
                        'Borrar',
                        ['personas/delete', 'id' => $fila->id],
                        [
                            'class' => 'btn-xs btn-danger',
                            'data-confirm' => '¿Seguro que desea borrar el género?',
                            'data-method' => 'POST',
                        ]) ?>
                </td>
            </tr>
        <?php endforeach ?>
    </tbody>
</table>

<div class="row">
    <div class="text-center">
        <?= LinkPager::widget(['pagination' => $pagination]) ?>
    </div>
</div>

<div class="row">
    <div class="text-center">
        <?= Html::a('Insertar una nueva persona', ['personas/create'], ['class' => 'btn btn-info']) ?>
    </div>
</div>
