<?php

namespace app\controllers;

use app\models\Papeles;
use Yii;
use yii\data\Pagination;
use yii\filters\VerbFilter;
use yii\web\Controller;
use yii\web\NotFoundHttpException;

/**
 * PapelesController implements the CRUD actions for Papeles model.
 */
class PapelesController extends Controller
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
     * Lists all Papeles models.
     * @return mixed
     */
    public function actionIndex()
    {
        $pagination = new Pagination([
            'defaultPageSize' => 5,
            'totalCount' => Papeles::find()->count(),
        ]);

        $filas = Papeles::find()
            ->orderBy('papel')
            ->limit($pagination->limit)
            ->offset($pagination->offset)
            ->all();

        return $this->render('index', [
            'filas' => $filas,
            'pagination' => $pagination,
        ]);
    }

    /**
     * Displays a single Papeles model.
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
     * Creates a new Papeles model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $papel = new Papeles();

        if ($papel->load(Yii::$app->request->post()) && $papel->save()) {
            Yii::$app->session->setFlash('success', 'Fila insertada correctamente.');
            return $this->redirect(['papeles/index']);
        }

        return $this->render('create', [
            'papel' => $papel,
        ]);
    }

    /**
     * Updates an existing Papeles model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $papel = $this->buscarPapel($id);
        if ($papel->load(Yii::$app->request->post()) && $papel->save()) {
            Yii::$app->session->setFlash('success', 'Fila modificada correctamente.');
            return $this->redirect(['papeles/index']);
        }
        return $this->render('update', [
            'papel' => $papel,
        ]);
    }

    /**
     * Deletes an existing Papeles model.
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
     * Finds the Papeles model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $id
     * @return Papeles the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Papeles::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }

    private function buscarPapel($id)
    {
        $papel = Papeles::findOne($id);
        if ($papel === null) {
            throw new NotFoundHttpException('El género no existe.');
        }
        return $papel;
    }
}
