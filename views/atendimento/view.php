<?php

use yii\helpers\Html;
use yii\widgets\DetailView;


use yii\helpers\Url;


/* @var $this yii\web\View */
/* @var $model app\models\Atendimento */

$this->title = $model->emailCliente->nome;
$this->params['breadcrumbs'][] = ['label' => 'Atendimentos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="atendimento-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'data',
            'obs:ntext',
            ['label'=>'Fisioterapeuta',
                'format'=>'raw',      								                    	//para nao fazer uma checagem, forma cru
             	'value'=>Html::a($model->crefitoFisioterapeuta->nome,			     		//OBS:: crefitoFisioterapeuta -> app/models(propriedade usando como se fosse um metodo, metodos get e set's)------  crefito_Fisioterapeuta -> propriedade do banco de dados  ----- e quando nao tem essa forma adiciona um 0 no final. (tira o 0, e coloca s, e troca tbm no comentario inicial da propriedade)	//'value'=> $model=>idEdital!=null? Html::a($model=>idEdital->identificacao,
                Url::to(['fisioterapeuta/view','id'=>$model->crefito_Fisioterapeuta]))		//link para redirecionar ao clik, para usar a Url, coloca:: USE yii\helpers\Url; e caso n ter coloque use yii\helpers\Html;
	        ],
            //'crefito_Fisioterapeuta',
            'email_Cliente:email',
            ['label'=>'Hora',
                'format'=>'raw',      								                    	//para nao fazer uma checagem, forma cru
                'value'=>Html::a($model->hora.":00 horas")		//link para redirecionar ao clik, para usar a Url, coloca:: USE yii\helpers\Url; e caso n ter coloque use yii\helpers\Html;
            ],
            //'hora',
        ],
    ]) ?>

</div>
