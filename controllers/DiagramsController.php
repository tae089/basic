<?php

namespace app\controllers;

use Yii;
use app\models\Diagrams;
use app\models\DiagramsSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;

/**
 * DiagramsController implements the CRUD actions for Diagrams model.
 */
class DiagramsController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
        //=================================
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    [
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
        //================================        
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['post'],
                ],
            ],
        ];
    }

    /**
     * Lists all Diagrams models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new DiagramsSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Diagrams model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Diagrams model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Diagrams();

        if($model->load(Yii::$app->request->post()) && $model->validate()) {
            $model->photo = $model->upload($model,'photo');
            $model->save();
             return $this->redirect(['index']);
        } else {
            return $this->renderAjax('create', [
                'model' => $model,
            ]);
        }
    }

    public function actionCreate1()
    {
        $model = new Diagrams();

        if($model->load(Yii::$app->request->post()) && $model->validate()) {
            $model->photo = $model->upload($model,'photo');
            $model->save();
            if($model->photo!=''){
                $this->create_resizes($model->photo);
            }
             return $this->redirect(['index']);
        } else {
            return $this->renderAjax('create1', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Diagrams model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            $model->photo = $model->upload_update($model,'photo',$model->diagrams_id);
            $model->save();
            if($model->photo!=''){
                $this->create_resizes($model->photo);
            } 
            return $this->redirect(['index']);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Diagrams model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {

        $model = $this->findModel($id);

        if($model->id_ref == ''){

            $data = Diagrams::find()->where("id_ref='".$model->diagrams_id."'")->all();
            foreach ($data as  $value) {
                if(file_exists(Yii::getAlias('@webroot').'/uploads_1/'.$value['photo'])){
                    @unlink(Yii::getAlias('@webroot').'/uploads_1/'.$value['photo']);
                } 
                $this->findModel($value['diagrams_id'])->delete();  
            }

                if(file_exists(Yii::getAlias('@webroot').'/uploads_1/'.$model->photo)){
                    @unlink(Yii::getAlias('@webroot').'/uploads_1/'.$model->photo);
                }
                $this->findModel($id)->delete();  
        }else{

           if(file_exists(Yii::getAlias('@webroot').'/uploads_1/'.$model->photo)){
             @unlink(Yii::getAlias('@webroot').'/uploads_1/'.$model->photo);
           }  

            $this->findModel($id)->delete();
        }
       
        return $this->redirect(['index']);
    }

    private function create_resizes($fileName){
          $width = 250;
          $uploadPath   = Diagrams::getUploadPath().'/';
          $file         = $uploadPath.$fileName;
          $image        = Yii::$app->image->load($file);
          $image->resize($width);
          $image->save($uploadPath.$fileName);
          return true;
    }

    /**
     * Finds the Diagrams model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Diagrams the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Diagrams::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
