<?php

namespace app\controllers;

use Yii;
use app\models\SlidePhoto;
use app\models\SlidePhotoSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;

/**
 * SlidePhotoController implements the CRUD actions for SlidePhoto model.
 */
class SlidePhotoController extends Controller
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
     * Lists all SlidePhoto models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new SlidePhotoSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    public function actionIndex2()
    {
        $searchModel = new SlidePhotoSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index2', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single SlidePhoto model.
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
     * Creates a new SlidePhoto model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new SlidePhoto();

        if($model->load(Yii::$app->request->post()) && $model->validate()) {
            $model->slide_photo_img = $model->upload($model,'slide_photo_img');
            $model->save();
            if($model->slide_photo_img!=''){
                $this->create_resizes($model->slide_photo_img);
            }
            return $this->redirect(['index2']);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing SlidePhoto model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            $model->slide_photo_img = $model->upload_update($model,'slide_photo_img',$model->slide_photo_id);
            $model->save();
            if($model->slide_photo_img!=''){
                $this->create_resizes($model->slide_photo_img);
            }
             return $this->redirect(['index2']);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing SlidePhoto model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {

        $model = $this->findModel($id);
        if (file_exists(Yii::getAlias('@webroot').'/uploads_slidephoto/'.$model->slide_photo_img)){
             @unlink(Yii::getAlias('@webroot').'/uploads_slidephoto/'.$model->slide_photo_img);
        }

        $this->findModel($id)->delete();

        return $this->redirect(['index2']);
    }

    private function create_resizes($fileName){
          $width = 1024;
          $uploadPath   = SlidePhoto::getUploadPath().'/';
          $file         = $uploadPath.$fileName;
          $image        = Yii::$app->image->load($file);
          $image->resize($width);
          $image->save($uploadPath.$fileName);
          return true;
    }

    /**
     * Finds the SlidePhoto model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return SlidePhoto the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = SlidePhoto::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
