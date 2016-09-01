<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "actividad_planificada".
 *
 * @property integer $id_actividad_planificacion
 * @property string $tipo
 * @property string $fecha_inicio
 * @property string $fecha_final
 * @property string $periodicidad
 * @property string $dias
 * @property integer $id_plan
 * @property integer $id_ruta
 * @property integer $actividad
 *
 * @property Ruta $idRuta
 * @property Actividad $actividad0
 * @property Plan $idPlan
 */
class ActividadPlanificada extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'actividad_planificada';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_actividad_planificacion'], 'required'],
            [['id_actividad_planificacion', 'id_plan', 'id_ruta', 'actividad'], 'integer'],
            [['tipo'], 'string'],
            [['fecha_inicio', 'fecha_final', 'periodicidad'], 'string', 'max' => 45],
            [['dias'], 'string', 'max' => 15],
            [['id_ruta'], 'exist', 'skipOnError' => true, 'targetClass' => Ruta::className(), 'targetAttribute' => ['id_ruta' => 'id_ruta']],
            [['actividad'], 'exist', 'skipOnError' => true, 'targetClass' => Actividad::className(), 'targetAttribute' => ['actividad' => 'id_actividad']],
            [['id_plan'], 'exist', 'skipOnError' => true, 'targetClass' => Plan::className(), 'targetAttribute' => ['id_plan' => 'id_plan']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_actividad_planificacion' => 'Id Actividad Planificacion',
            'tipo' => 'Tipo',
            'fecha_inicio' => 'Fecha Inicio',
            'fecha_final' => 'Fecha Final',
            'periodicidad' => 'Periodicidad',
            'dias' => 'Dias',
            'id_plan' => 'Id Plan',
            'id_ruta' => 'Id Ruta',
            'actividad' => 'Actividad',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdRuta()
    {
        return $this->hasOne(Ruta::className(), ['id_ruta' => 'id_ruta']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getActividad0()
    {
        return $this->hasOne(Actividad::className(), ['id_actividad' => 'actividad']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdPlan()
    {
        return $this->hasOne(Plan::className(), ['id_plan' => 'id_plan']);
    }
}
