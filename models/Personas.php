<?php

namespace app\models;

/**
 * This is the model class for table "personas".
 *
 * @property int $id
 * @property string $nombre
 *
 * @property Participantes[] $participantes
 */
class Personas extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'personas';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nombre'], 'required'],
            [['nombre'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'nombre' => 'Nombre',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getParticipaciones()
    {
        return $this->hasMany(Participaciones::className(), ['persona_id' => 'id'])->inverseOf('persona');
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPeliculas()
    {
        return $this->hasMany(Peliculas::class, ['id' => 'pelicula_id'])->via('participaciones');
    }
}
