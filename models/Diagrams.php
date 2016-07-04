<?php

namespace app\models;

use Yii;
use \yii\web\UploadedFile;
/**
 * This is the model class for table "diagrams".
 *
 * @property integer $diagrams_id
 * @property string $name
 * @property string $photo
 * @property integer $id_ref
 */
class Diagrams extends \yii\db\ActiveRecord
{

  const UPLOAD_FOLDER  ='uploads_1';
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'diagrams';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name'], 'required'],
            [['id_ref'], 'string', 'max' => 10],
            [['name'], 'string', 'max' => 200],
            [['position'], 'string', 'max' => 100],
            
            [['photo'], 'file',
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
            'diagrams_id' => 'รหัส',
            'name' => 'ชื่อ',
            'position'=>'ตำแหน่ง',
            'photo' => 'รูปภาพ',
            'id_ref' => 'ภายใต้',
        ];
    }

    public function upload($model,$attribute)
    {
        $photo  = UploadedFile::getInstance($model, $attribute);
          $path = $this->getUploadPath();
        if ($this->validate() && $photo !== null) {

            $fileName = md5($photo->baseName.time()) . '.' . $photo->extension;
            //$fileName = $photo->baseName . '.' . $photo->extension;
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

        $sql = Diagrams::find()->where("diagrams_id='".$id."'")->all();
         if ($this->validate() && $photo !== null) {
                if($sql[0]['photo']!=''){
                    $photo1 = explode(".",$sql[0]['photo']);
                    $fileName = $photo1[0]. '.' . $photo->extension;
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
      return empty($this->photo) ? Yii::getAlias('@web').'/img/none.png' : $this->getUploadUrl().$this->photo;
    }
}
