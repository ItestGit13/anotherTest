<?php
use yii\data\SqlDataProvider;
use yii\grid\GridView;
use app\grid\StatusDataColumn;

$this->title = "Lorem gipsum geneva demo title"
?>

<?
$count = \yii::$app->db->createCommand('select count(*) from lists')->queryScalar();
$query = new \yii\db\query();
$dataProvider = new SqlDataProvider([
    'sql'=>'SELECT * FROM lists',
    'totalCount'=>$count,

    'pagination' => [
        'pageSize' => 3,
    ],
// 'pagination'=>false,
    'sort' => [
        'attributes' => ['title', 'description'],
        // 'defaultOrder'=>['title'=>SORT_ASC, 'description'=> SORT_DESC ]
    ],

]);?>

<h1>My List</h1>

<?=

GridView::widget([
    'dataProvider' => $dataProvider,
    'showFooter' => true,
    'showHeader' => true,

    'columns' => [
        'id',
        'title',
        [
            'attribute' => 'description',
            'label' => 'Description',
        ],
        [
            'attribute' => 'category',
        ],
        [
            'class' => 'yii\grid\ActionColumn',
            'header' => 'Actions',
            'headerOptions' => ['width' => '80'],
            'template' => '{view} {update} {delete}',
            'visible' => true,
            // 'header'=>'Actions',
            'footer' => 'Testing Status',

        ],
    ],
    'layout' => "\n{summary}\n{items}\n{pager} ",
    'showOnEmpty' => true,

]);

?>






