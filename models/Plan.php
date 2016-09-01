<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "Plan".
 *
 * @property integer $id_plan
 * @property string $fecha_inicia
 * @property string $fecha_final
 * @property string $descripcion
 * @property string $estado
 */
class Plan extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'Plan';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_plan', 'fecha_inicia', 'fecha_final'], 'required'],
            [['id_plan'], 'integer'],
            [['fecha_inicia', 'fecha_final'], 'safe'],
            [['estado'], 'string'],
            [['descripcion'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_plan' => 'Código',
            'fecha_inicia' => 'Fecha Inicial',
            'fecha_final' => 'Fecha Final',
            'descripcion' => 'Nombre',
            'estado' => 'Estado',
        ];
    }
}
