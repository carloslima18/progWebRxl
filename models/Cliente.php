<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "Cliente".
 *
 * @property string $email
 * @property string $nome
 * @property string $sexo
 * @property string $dtnascimento
 * @property string $profissao
 * @property string $telefone
 * @property string $endereco
 *
 * @property Atendimento[] $atendimentos
 */
class Cliente extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'Cliente';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['email', 'nome', 'sexo', 'dtnascimento', 'profissao', 'telefone', 'endereco'], 'required'],
            [['dtnascimento'], 'safe'],
            [['telefone'], 'integer'],
            [['endereco'], 'string'],
            [['email'], 'email'],
            [['email'], 'string', 'max' => 100],
            [['nome'], 'string', 'max' => 125],
            [['sexo'], 'string', 'max' => 1],
            [['profissao'], 'string', 'max' => 75],
            [['nome', 'telefone'], 'unique', 'targetAttribute' => ['nome', 'telefone'], 'message' => 'The combination of Nome and Telefone has already been taken.'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'email' => 'Email',
            'nome' => 'Nome',
            'sexo' => 'Sexo',
            'dtnascimento' => 'Dtnascimento',
            'profissao' => 'Profissao',
            'telefone' => 'Telefone',
            'endereco' => 'Endereco',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAtendimentos()
    {
        return $this->hasMany(Atendimento::className(), ['email_Cliente' => 'email']);
    }
}
