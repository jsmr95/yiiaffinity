<?php
use yii\helpers\Html;
$this->title = 'Ver una persona';
$this->params['breadcrumbs'][] = ['label' => 'Personas', 'url' => ['personas/index']];
$this->params['breadcrumbs'][] = $this->title;
?>
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
<div class="row">
  <div class="text-center">
    <?= Html::a('Volver',['personas/index'],['class' => 'btn btn-danger']); ?>
  </div>
</div>
