<?php
use yii\helpers\Html;
$this->title = 'Ver un género';
$this->params['breadcrumbs'][] = ['label' => 'Papeles', 'url' => ['papeles/index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<h2><?= $papel->papel ?></h2>
<table class="table">
    <thead>
        <th>Papel</th>
    </thead>
    <tbody>
        <?php foreach ($papeles as $papel): ?>
            <tr>
                <td><?= Html::encode($papel->papel) ?></td>
            </tr>
        <?php endforeach ?>
    </tbody>
</table>
