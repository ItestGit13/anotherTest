<?php
namespace app\models;

use yii\db\ActiveRecord;

class lists extends ActiveRecord{

    protected $title;
    protected $description;
    protected $category;

    public function rules()
    {
        return [
            [['title', 'description', 'category'], 'required']
        ];
    }


}