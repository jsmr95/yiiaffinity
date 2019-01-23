<?php

namespace app\controllers;

use app\models\Personas;
use Yii;
use yii\data\Pagination;
use yii\filters\VerbFilter;
use yii\web\Controller;
use yii\web\NotFoundHttpException;

/**
 * PersonasController implements the CRUD actions for Personas model.
 */
class PersonasController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all Personas models.
     * @return mixed
     */
    public function actionIndex()
    {
        $pagination = new Pagination([
            'defaultPageSize' => 5,
            'totalCount' => Personas::find()->count(),
        ]);
        $filas = Personas::find()
        ->limit($pagination->limit)
        ->offset($pagination->offset)
        ->all();

        // var_dump($filas);
        return $this->render('index', [
            'filas' => $filas,
            'pagination' => $pagination,
        ]);
    }

    /**
     * Displays a single Personas model.
     * @param int $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Personas model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $persona = new Personas();

        if ($persona->load(Yii::$app->request->post()) && $persona->save()) {
            Yii::$app->session->setFlash('success', 'Fila insertada correctamente.');
            return $this->redirect(['personas/index']);
        }

        return $this->render('create', [
            'persona' => $persona,
        ]);
    }

    /**
     * Updates an existing Personas model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $persona = $this->buscarPersona($id);
        if ($persona->load(Yii::$app->request->post()) && $persona->save()) {
            Yii::$app->session->setFlash('success', 'Fila modificada correctamente.');
            return $this->redirect(['personas/index']);
        }
        return $this->render('update', [
            'persona' => $persona,
        ]);
    }

    public function actionVer($id)
    {
        return $this->render('ver', [
            'persona' => $this->buscarPersona($id),
            'personas' => Personas::findAll(['id' => $id]),
        ]);
    }

    /**
     * Deletes an existing Personas model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Personas model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $id
     * @return Personas the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Personas::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }

    private function buscarPersona($id)
    {
        $persona = Personas::findOne($id);
        if ($persona === null) {
            throw new NotFoundHttpException('La Persona no existe.');
        }
        return $persona;
    }
}
