<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Fisioterapeuta */

$this->title = 'modificar dentista: ' . $model->crefito;
$this->params['breadcrumbs'][] = ['label' => 'Fisioterapeutas', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->crefito, 'url' => ['view', 'id' => $model->crefito]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="fisioterapeuta-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
