<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\AlbumPhoto;

/**
 * AlbumPhotoSearch represents the model behind the search form about `app\models\AlbumPhoto`.
 */
class AlbumPhotoSearch extends AlbumPhoto
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['album_photo_id'], 'integer'],
            [['album_photo_name', 'album_photo_detail', 'ref'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = AlbumPhoto::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'album_photo_id' => $this->album_photo_id,
        ]);

        $query->andFilterWhere(['like', 'album_photo_name', $this->album_photo_name])
            ->andFilterWhere(['like', 'album_photo_detail', $this->album_photo_detail])
            ->andFilterWhere(['like', 'ref', $this->ref]);

        return $dataProvider;
    }
}
