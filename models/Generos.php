<?php

namespace app\models;

/**
 * This is the model class for table "generos".
 *
 * @property int $id
 * @property string $genero
 *
 * @property Peliculas[] $peliculas
 */
class Generos extends \yii\db\ActiveRecord
{
    public $cuantas; //atributo virtual el cual cargo con el findEspecial

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'generos';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['genero'], 'required'],
            [['genero'], 'trim'],
            [['genero'], 'string', 'max' => 255],
            [['genero'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'genero' => 'Genero',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPeliculas()
    {
        return $this->hasMany(Peliculas::className(), ['genero_id' => 'id'])->inverseOf('genero');
    }

    public static function findEspecial()
    {
        //Se usa siempre static menos cuando accedemos a constantes o variables privades que usamos self, ya que al heredar, estas no cambian.
        return static::find()
                    ->select('generos.*, COUNT(p.id) AS cuantas')
                    ->joinWith('peliculas p', false) //esto es lo mismo de abajo, pero no uso tablas, uso las relaciones de modelos(Arriba ya la tengo creada), False para que no haga precarga.
                    // ->leftJoin('peliculas p', 'generos.id = p.genero_id')
                    ->groupBy('generos.id');
    }
}
