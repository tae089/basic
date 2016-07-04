<?php

namespace app\models;

use Yii;
use \yii\web\UploadedFile;
/**
 * This is the model class for table "slide_photo".
 *
 * @property integer $slide_photo_id
 * @property string $slide_photo_img
 * @property integer $slide_photo_order
 */
class SlidePhoto extends \yii\db\ActiveRecord
{
  const UPLOAD_FOLDER ='uploads_slidephoto';
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'slide_photo';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['slide_photo_order'], 'required'],
            [['slide_photo_order'], 'integer'],
            //[['slide_photo_img'], 'string', 'max' => 200],
            [['slide_photo_img'], 'file',
                  'skipOnEmpty' => true,
                  'extensions' => 'png,jpg'
            ],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'slide_photo_id' => 'รหัส',
            'slide_photo_img' => 'รูปภาพ',
            'slide_photo_order' => 'ลำดับ',
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

        $sql = SlidePhoto::find()->where("slide_photo_id='".$id."'")->all();
         if ($this->validate() && $photo !== null) {
                if($sql[0]['slide_photo_img']!=''){
                    $slide_photo_img = explode(".",$sql[0]['slide_photo_img']);
                    $fileName = $slide_photo_img[0]. '.' . $photo->extension;
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
      return empty($this->slide_photo_img) ? Yii::getAlias('@web').'/img/none.png' : $this->getUploadUrl().$this->slide_photo_img;
    }
    // ...
    
}
