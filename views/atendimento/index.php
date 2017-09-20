<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\Url;
use app\models\Fisioterapeuta;


/* @var $this yii\web\View */
/* @var $searchModel app\models\AtentimentoSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Atendimentos';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="atendimento-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Atendimento', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'data',
            'obs:ntext',
            [
                'attribute'=>'crefito_Fisioterapeuta',				//nome do campo prorpiamente dito,
                'value'=>function($m){						//value e a função lambida, (para cada linha que vc ta processando para joga la na visualização, vc ta falando que para cada elemento chame de $m e retorne o valor (nome))
                    return $m->crefitoFisioterapeuta->nome;
                }
            ],
            //'crefito_Fisioterapeuta',
            'email_Cliente:email',
            // 'hora',
            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
