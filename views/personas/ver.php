<?php
use yii\helpers\Html;
$this->title = 'Ver una persona';
$this->params['breadcrumbs'][] = ['label' => 'Personas', 'url' => ['personas/index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<h2><?= $persona['nombre'] ?></h2>
<table class="table">
    <thead>
        <th>Nombre</th>
    </thead>
    <tbody>
        <?php foreach ($personas as $persona): ?>
            <tr>
                <td><?= Html::encode($persona->nombre) ?></td>
            </tr> <!-- HAY QUE MODIFICAR -->
        <?php endforeach ?>
    </tbody>
</table>
