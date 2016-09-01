<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "orden_trabajo".
 *
 * @property integer $id_orden_trabajo
 * @property string $orden_trabajo
 * @property integer $tipo
 * @property integer $id_estado
 * @property string $fecha_inicio
 * @property string $fecha_final
 * @property string $descripcion
 * @property integer $solicitud
 * @property integer $actividad
 * @property integer $actividad_planificacion
 * @property string $hora_inicio
 * @property string $hora_final
 * @property integer $id_equipo
 *
 * @property Entrega[] $entregas
 * @property OrdenActividad[] $ordenActividads
 * @property OrdenAutomotor[] $ordenAutomotors
 * @property OrdenEmpleado[] $ordenEmpleados
 * @property Empleado[] $empleados
 * @property OrdenHerramienta[] $ordenHerramientas
 * @property Equipo $equipo
 */
class OrdenTrabajo extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'orden_trabajo';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_orden_trabajo'], 'required'],
            [['id_orden_trabajo', 'tipo', 'id_estado', 'solicitud', 'actividad', 'actividad_planificacion', 'id_equipo'], 'integer'],
            [['fecha_inicio', 'fecha_final', 'hora_inicio', 'hora_final'], 'safe'],
            [['orden_trabajo', 'descripcion'], 'string', 'max' => 45],
            [['id_equipo'], 'exist', 'skipOnError' => true, 'targetClass' => Equipo::className(), 'targetAttribute' => ['id_equipo' => 'id_equipo']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_orden_trabajo' => 'Id Orden Trabajo',
            'orden_trabajo' => 'Orden Trabajo',
            'tipo' => 'Tipo',
            'id_estado' => 'Id Estado',
            'fecha_inicio' => 'Fecha Inicio',
            'fecha_final' => 'Fecha Final',
            'descripcion' => 'Descripcion',
            'solicitud' => 'Solicitud',
            'actividad' => 'Actividad',
            'actividad_planificacion' => 'Actividad Planificacion',
            'hora_inicio' => 'Hora Inicio',
            'hora_final' => 'Hora Final',
            'id_equipo' => 'Id Equipo',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEntregas()
    {
        return $this->hasMany(Entrega::className(), ['id_orden_trabajo' => 'id_orden_trabajo']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getOrdenActividads()
    {
        return $this->hasMany(OrdenActividad::className(), ['id_orden' => 'id_orden_trabajo']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getOrdenAutomotors()
    {
        return $this->hasMany(OrdenAutomotor::className(), ['id_orden' => 'id_orden_trabajo']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getOrdenEmpleados()
    {
        return $this->hasMany(OrdenEmpleado::className(), ['id_orden' => 'id_orden_trabajo']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEmpleados()
    {
        return $this->hasMany(Empleado::className(), ['id_empleado' => 'id_empleado'])->viaTable('orden_empleado', ['id_orden' => 'id_orden_trabajo']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getOrdenHerramientas()
    {
        return $this->hasMany(OrdenHerramienta::className(), ['id_orden' => 'id_orden_trabajo']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEquipo()
    {
        return $this->hasOne(Equipo::className(), ['id_equipo' => 'id_equipo']);
    }
}
