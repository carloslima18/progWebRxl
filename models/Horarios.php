<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "Horarios".
 *
 * @property integer $id
 * @property string $hora
 *
 * @property Atendimento[] $atendimentos
 */
class Horarios extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'Horarios';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            ['hora', 'date', 'format'=>'H:i'],
            [['hora'], 'required'],
            [['hora'], 'safe'],
            //[['hora'], 'time'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'hora' => 'Hora',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAtendimentos()
    {
        return $this->hasMany(Atendimento::className(), ['hora' => 'id']);
    }
}
