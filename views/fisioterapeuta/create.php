<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Fisioterapeuta */

$this->title = 'adicionar Dentista';
$this->params['breadcrumbs'][] = ['label' => 'Fisioterapeutas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="fisioterapeuta-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
