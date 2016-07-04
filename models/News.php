<?php

namespace app\models;

use Yii;
use \yii\web\UploadedFile;

/**
 * This is the model class for table "news".
 *
 * @property integer $news_id
 * @property string $news_title
 * @property string $news_detail
 * @property string $news_date
 * @property string $news_photo
 */
class News extends \yii\db\ActiveRecord
{

    //public $upload_foler ='uploads';
    const UPLOAD_FOLDER ='uploads'; 
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'news';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['news_title', 'news_detail', 'news_date'], 'required'],
            [['news_detail'], 'string'],
            [['news_title'], 'string', 'max' => 200],
            [['news_photo'], 'file',
                  'skipOnEmpty' => true,
                  'extensions' => 'png,jpg'
            ],
            [['news_date','user_add'], 'string', 'max' => 100],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'news_id' => 'News ID',
            'news_title' => 'หัวข้อ',
            'news_detail' => 'รายละเอียด',
            'news_date' => 'วันที่',
            'news_photo' => 'รูปภาพ',
            'user_add' =>'ผู้บันทึก',
        ];
    }

    public function upload($model,$attribute)
    {
        $photo  = UploadedFile::getInstance($model, $attribute);
        $path = $this->getUploadPath();
        if ($this->validate() && $photo !== null) {
            $fileName = md5($photo->baseName.time()) . '.' . $photo->extension;

            if($photo->saveAs($path.$fileName)){
                return $fileName;
            }
            
        }
        return $model->isNewRecord ? false : $model->getOldAttribute($attribute);
    }

    public function upload_update($model,$attribute,$id)
    {
        $photo  = UploadedFile::getInstance($model, $attribute);
        $path = $this->getUploadPath();

        $sql = News::find()->where("news_id='".$id."'")->all();
         if ($this->validate() && $photo !== null) {
                if($sql[0]['news_photo']!=''){
                    $news_photo = explode(".",$sql[0]['news_photo']);
                    $fileName = $news_photo[0]. '.' . $photo->extension;
                    if($photo->saveAs($path.$fileName)){
                        return $fileName;
                    }
                }else{

                    $fileName = md5($photo->baseName.time()) . '.' . $photo->extension;
                    if($photo->saveAs($path.$fileName)){
                        return $fileName;
                    }

                }

         }
            
        return $model->isNewRecord ? false : $model->getOldAttribute($attribute);
    }

    public function getUploadPath(){
      return Yii::getAlias('@webroot').'/'.self::UPLOAD_FOLDER.'/';
    }

    public function getUploadUrl(){
      return Yii::getAlias('@web').'/'.self::UPLOAD_FOLDER.'/';
    }

    public function getPhotoViewer(){
      return empty($this->news_photo) ? Yii::getAlias('@web').'/img/none.png' : $this->getUploadUrl().$this->news_photo;
    }
    // ...
    }
