<?php

namespace app\models;
use Yii;
use app\components\validators\Cpf;
/**
 * This is the model class for table "Fisioterapeuta".
 *
 * @property integer $crefito
 * @property string $cpf
 * @property string $nome
 * @property boolean $inativo
 *
 * @property Atendimento[] $atendimentos
 */
class Fisioterapeuta extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'Fisioterapeuta';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['crefito', 'cpf', 'nome'], 'required'],
            [['crefito', 'cpf'], 'integer'],
            [['inativo'], 'boolean'],
            [['nome'], 'string', 'max' => 150],
            [['cpf'], 'unique'],
            [['cpf'], Cpf::className()],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'crefito' => 'Crefito',
            'cpf' => 'Cpf',
            'nome' => 'Nome',
            'inativo' => 'Inativo',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAtendimentos()
    {
        return $this->hasMany(Atendimento::className(), ['crefito_Fisioterapeuta' => 'crefito']);
    }
}
