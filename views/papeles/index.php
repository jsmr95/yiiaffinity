<?php

use yii\helpers\Html;
use yii\grid\GridView;

use yii\widgets\LinkPager;

/* @var $this yii\web\View */
/* @var $searchModel app\models\PapelesSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Papeles';
$this->params['breadcrumbs'][] = $this->title;
?>
<table class="table table-striped">
    <thead>
        <th>Papel</th>
    </thead>
    <tbody>
        <?php foreach ($filas as $fila): ?>
            <tr>
                <td><?= Html::encode($fila->papel) ?></td>
                <td>
                    <?= Html::a('Modificar', ['papeles/update', 'id' => $fila->id], ['class' => 'btn-xs btn-info']) ?>
                    <?= Html::a('Ver', ['papeles/ver', 'id' => $fila->id], ['class' => 'btn-xs btn-warning']) ?>
                    <?= Html::a(
                        'Borrar',
                        ['papeles/delete', 'id' => $fila->id],
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
        <?= Html::a('Insertar un nuevo papel', ['papeles/create'], ['class' => 'btn btn-info']) ?>
    </div>
</div>
