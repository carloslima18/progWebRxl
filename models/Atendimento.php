<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "Atendimento".
 *
 * @property integer $id
 * @property string $data
 * @property string $obs
 * @property integer $crefito_Fisioterapeuta
 * @property string $email_Cliente
 * @property integer $hora
 *
 * @property Cliente $emailCliente
 * @property Fisioterapeuta $crefitoFisioterapeuta
 * @property Horarios $hora0
 */
class Atendimento extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'Atendimento';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['data', 'crefito_Fisioterapeuta', 'email_Cliente', 'hora'], 'required'],
            [['data'], 'safe'],
            [['obs'], 'string'],
            [['crefito_Fisioterapeuta', 'hora'], 'integer'],
            [['email_Cliente'], 'string', 'max' => 100],
            [['email_Cliente'], 'exist', 'skipOnError' => true, 'targetClass' => Cliente::className(), 'targetAttribute' => ['email_Cliente' => 'email']],
            [['crefito_Fisioterapeuta'], 'exist', 'skipOnError' => true, 'targetClass' => Fisioterapeuta::className(), 'targetAttribute' => ['crefito_Fisioterapeuta' => 'crefito']],
            [['hora'], 'exist', 'skipOnError' => true, 'targetClass' => Horarios::className(), 'targetAttribute' => ['hora' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'data' => 'Data',
            'obs' => 'Obs',
            'crefito_Fisioterapeuta' => 'fisioterapeuta',
            'email_Cliente' => 'Email  Cliente',
            'hora' => 'Hora',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEmailCliente()
    {
        return $this->hasOne(Cliente::className(), ['email' => 'email_Cliente']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCrefitoFisioterapeuta()
    {
        return $this->hasOne(Fisioterapeuta::className(), ['crefito' => 'crefito_Fisioterapeuta']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getHora0()
    {
        return $this->hasOne(Horarios::className(), ['id' => 'hora']);
    }
}
