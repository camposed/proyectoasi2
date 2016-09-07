<?php

namespace app\controllers;

use Yii;
use app\models\Plan;
use app\models\ActividadPlanificada;
use app\models\Equipo;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\widgets\ActiveForm;
use yii\web\Response;


/**
 * PlanController implements the CRUD actions for Plan model.
 */
class PlanController extends Controller
{
    /**
     * @inheritdoc
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
     * Lists all Plan models.
     * @return mixed
     */
    public function actionIndex()
    {
        $dataProvider = new ActiveDataProvider([
            'query' => Plan::find(),
        ]);

        return $this->render('index', [
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Plan model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
    	 
    	$plan =  $this->findModel($id);
        return $this->render('view', [
            'model' => $plan,
        	'actividades'=>
        		new ActiveDataProvider([
        			'query'=>ActividadPlanificada::find()->where(['id_plan'=>$id])
        		]),
        	'equipo' =>
        		new ActiveDataProvider([
        				'query'=>Equipo::find()->where(['id_plan'=>$id])
        		])
        ]);
    }
    
    
    /**
     * Creates a new Plan model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Plan();
        $model->estado = 'R';
        
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id_plan]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Plan model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id_plan]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Plan model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Plan model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Plan the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Plan::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
    
    
    
    public function actionValidate(){
    	$model = new Plan();
	    $request = \Yii::$app->getRequest();
	    if ($request->isPost && $model->load($request->post())) {	    	
	    	Yii::$app->response->format = Response::FORMAT_JSON;
	        return ActiveForm::validate($model);
	    }
    }
    
    
    public function actionLoad($id){
    	\Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
    	return $this->findModel($id);
    }
    
    public function actionRenderForm($id){
    	$model = $this->findModel($id);
    	return $this->renderAjax('_form', [
    			'model' => $model,
    			'action'=> 'update?id='.$id
    	]);
    }
    
}
