<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\SlidePhoto;

/**
 * SlidePhotoSearch represents the model behind the search form about `app\models\SlidePhoto`.
 */
class SlidePhotoSearch extends SlidePhoto
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['slide_photo_id', 'slide_photo_order'], 'integer'],
            [['slide_photo_img'], 'safe'],
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
        $query = SlidePhoto::find();

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
            'slide_photo_id' => $this->slide_photo_id,
            'slide_photo_order' => $this->slide_photo_order,
        ]);

        $query->andFilterWhere(['like', 'slide_photo_img', $this->slide_photo_img]);

        return $dataProvider;
    }
}
