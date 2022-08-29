<?php
namespace app\models;

use yii\db\ActiveRecord;

class lists extends ActiveRecord{

    private $title;
    private $description;
    private $category;

    public function rules()
    {
        return [
            [['title', 'description', 'category'], 'required']
        ];
    }


}