<?php

namespace app\models;

use Yii;
use yii\helpers\Url;
/**
 * This is the model class for table "album_photo".
 *
 * @property integer $album_photo_id
 * @property string $album_photo_name
 * @property string $album_photo_detail
 * @property string $ref
 */
class AlbumPhoto extends \yii\db\ActiveRecord
{
    const UPLOAD_FOLDER='photolibrarys';
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'album_photo';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['album_photo_name', 'album_photo_detail', 'ref'], 'required'],
            [['album_photo_detail'], 'string'],
            [['album_photo_name', 'ref'], 'string', 'max' => 200],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'album_photo_id' => 'รหัส',
            'album_photo_name' => 'ชื่อ อัลบั้ม',
            'album_photo_detail' => 'รายเอียด อัลบั้ม ',
            'ref' => 'รูปภาพ',
        ];
    }

    public static function getUploadPath(){
        return Yii::getAlias('@webroot').'/'.self::UPLOAD_FOLDER.'/';
    }

    public static function getUploadUrl(){
        return Url::base(true).'/'.self::UPLOAD_FOLDER.'/';
    }

    public function getThumbnails($ref,$event_name){
         $uploadFiles   = Uploads::find()->where(['ref'=>$ref])->all();
         $preview = [];
        foreach ($uploadFiles as $file) {
            $preview[] = [
                'url'=>self::getUploadUrl(true).$ref.'/'.$file->real_filename,
                'src'=>self::getUploadUrl(true).$ref.'/thumbnail/'.$file->real_filename,
                'options' => ['title' => $event_name]
            ];
        }
        return $preview;
    }
}
