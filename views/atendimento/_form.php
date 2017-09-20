<?php

use yii\helpers\Html;
//use yii\widgets\ActiveForm;
use kartik\field\FieldRange;
use yii\helpers\ArrayHelper;
use kartik\widgets\ActiveForm;
use dosamigos\datepicker\DatePicker;
use app\models\Horarios;
use kartik\select2\Select2;
use app\models\Fisioterapeuta;

/* @var $this yii\web\View */
/* @var $model app\models\Atendimento */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="atendimento-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'data')->widget(
        DatePicker::className(), [
        // inline too, not bad
        'inline' => false,
        // modify template for custom rendering
        //'template' => '<div class="well well-sm" style="background-color: #fff; width:250px">{input}</div>',
        'clientOptions' => [
            'autoclose' => true,
            'format' => 'yyyy-m-d'
        ]
    ]);?>


    <?= $form->field($model, 'obs')->textarea(['rows' => 6]) ?>

    <!-- $form->field($model, 'crefito_Fisioterapeuta')->textInput() -->
    <?php								  		 	//usa se o conjunto de classe que auxilia o controle do arrya, colocando o ""USE yii\helpers\ArrayHelper;"" e como vc vai precisa do models, "USE app\models\Fisioterapeuta"
       $fisioterapeuta = ArrayHelper::map(			           			// utiliza em map para criar um vetor de fisioterapeuta, como 1° parametro a classe estatica que retorna o conjunto de objetos do tipo fisioterapeuta, em 2° parametro o valor html que vai ser exibido e o html armazenado (quando vc faz um dropDown vc tem o valor armazenado e o valor exibido), vc precisa dizer quais campos eu vou inserir, (id -> valor armazenado e nome-> valor exibido)
        Fisioterapeuta::find()->all(), 'crefito', 'nome');	 	// em find vc pode dizer que "quer alguns" com o metodo find()->where("nome"=>"carlos") e para TODOS, find()->all();..
         echo $form->field($model, 'crefito_Fisioterapeuta')->widget(Select2::classname(),								//para os parametros aqui vc tem os mesmo na pagina do kartik "demos.krajee.com/widget-details/selec2
        [
            'data'=> $fisioterapeuta,							//coloca o vetor criado aqui dentro, que sao os dados
            'options' => ['placeholder' => 'selecione um fisioterapeuta'], 			//e a informação que vai esta no inputBox antes de vc seleciona qualquer elemento //parametro que vc coloca coisas que deixa o controller mais organizado
            'pluginOptions'=>[
                'allowClear' => true,						        // para aparecer o x do lado para desmarcar a seleçaõ
            ]
        ])
    ?>

    <?= $form->field($model, 'email_Cliente')->textInput(['maxlength' => true]) ?>

    <!-- $form->field($model, 'hora')->textInput() ?>-->

    <?php								  		 	//usa se o conjunto de classe que auxilia o controle do arrya, colocando o ""USE yii\helpers\ArrayHelper;"" e como vc vai precisa do models, "USE app\models\Fisioterapeuta"
    $hora = ArrayHelper::map(			           			// utiliza em map para criar um vetor de fisioterapeuta, como 1° parametro a classe estatica que retorna o conjunto de objetos do tipo fisioterapeuta, em 2° parametro o valor html que vai ser exibido e o html armazenado (quando vc faz um dropDown vc tem o valor armazenado e o valor exibido), vc precisa dizer quais campos eu vou inserir, (id -> valor armazenado e nome-> valor exibido)
        Horarios::find()->all(), 'id', 'hora');	 	// em find vc pode dizer que "quer alguns" com o metodo find()->where("nome"=>"carlos") e para TODOS, find()->all();..
        echo $form->field($model, 'hora')->widget(Select2::classname(),								//para os parametros aqui vc tem os mesmo na pagina do kartik "demos.krajee.com/widget-details/selec2
        [
            'data'=> $hora,							//coloca o vetor criado aqui dentro, que sao os dados
            'options' => ['placeholder' => 'selecione um horario'], 			//e a informação que vai esta no inputBox antes de vc seleciona qualquer elemento //parametro que vc coloca coisas que deixa o controller mais organizado
            'pluginOptions'=>[
                'allowClear' => true,						        // para aparecer o x do lado para desmarcar a seleçaõ
            ]
        ])
    ?>


    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
