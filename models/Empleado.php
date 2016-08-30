<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "empleado".
 *
 * @property integer $id_empleado
 * @property string $nombres
 * @property string $apellidos
 * @property string $direccion
 * @property string $telefono
 * @property string $celular
 * @property string $fnacimiento
 * @property integer $cargo
 *
 * @property Cargo $cargo0
 * @property OrdenEmpleado[] $ordenEmpleados
 * @property OrdenTrabajo[] $ordens
 * @property Personal[] $personals
 * @property Equipo[] $equipos
 * @property Usuario[] $usuarios
 */
class Empleado extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'empleado';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_empleado', 'nombres', 'apellidos', 'fnacimiento', 'cargo'], 'required'],
            [['id_empleado', 'cargo'], 'integer'],
            [['fnacimiento'], 'safe'],
            [['nombres', 'apellidos'], 'string', 'max' => 100],
            [['direccion'], 'string', 'max' => 500],
            [['telefono', 'celular'], 'string', 'max' => 10],
            [['cargo'], 'exist', 'skipOnError' => true, 'targetClass' => Cargo::className(), 'targetAttribute' => ['cargo' => 'id_cargo']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_empleado' => 'Id Empleado',
            'nombres' => 'Nombres',
            'apellidos' => 'Apellidos',
            'direccion' => 'Direccion',
            'telefono' => 'Telefono',
            'celular' => 'Celular',
            'fnacimiento' => 'Fnacimiento',
            'cargo' => 'Cargo',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCargo0()
    {
        return $this->hasOne(Cargo::className(), ['id_cargo' => 'cargo']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getOrdenEmpleados()
    {
        return $this->hasMany(OrdenEmpleado::className(), ['id_empleado' => 'id_empleado']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getOrdens()
    {
        return $this->hasMany(OrdenTrabajo::className(), ['id_orden_trabajo' => 'id_orden'])->viaTable('orden_empleado', ['id_empleado' => 'id_empleado']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPersonals()
    {
        return $this->hasMany(Personal::className(), ['id_empleado' => 'id_empleado']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEquipos()
    {
        return $this->hasMany(Equipo::className(), ['id_equipo' => 'id_equipo'])->viaTable('personal', ['id_empleado' => 'id_empleado']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUsuarios()
    {
        return $this->hasMany(Usuario::className(), ['id_empleado' => 'id_empleado']);
    }
}
