<?php
namespace app\controllers;

use Yii;
use app\models\Participaciones;
use app\models\Peliculas;
use app\models\Personas;
use app\models\Papeles;

class ParticipacionesController extends \yii\web\Controller
{
    public function actionUpdate($pelicula_id)
    {
        $pelicula = Peliculas::findOne($pelicula_id);
        $participaciones = Participaciones::find()
            ->where(['pelicula_id' => $pelicula_id])
            ->all();
        $personas = Personas::find()
            ->select('nombre')
            ->indexBy('id')
            ->column();
        $papeles = Papeles::find()->select('papel')
        ->indexBy('id')
        ->column();
        return $this->render('update', [
            'pelicula' => $pelicula,
            'participaciones' => $participaciones,
            'personas' => $personas,
            'papeles' => $papeles,
        ]);
    }
    public function actionDelete($pelicula_id, $persona_id, $papel_id)
    {
        $participacion = Participaciones::findOne([
            'pelicula_id' => $pelicula_id,
            'persona_id' => $persona_id,
            'papel_id' => $papel_id,
        ]);
        $participacion->delete();
        return $this->redirect([
            'participaciones/update',
            'pelicula_id' => $pelicula_id,
        ]);
    }
    public function actionCreate()
    {
        $participacion = new Participaciones();

        if ($participacion->load(Yii::$app->request->get())) {
            // return $this->redirect(['peliculas/index']);
        }
        return $this->render('create', [
            'participacion' => $participacion,
        ]);
    }
}
