<?php
use yii\data\ArrayDataProvider;
use yii\grid\GridView;
use app\grid\StatusDataColumn;

$this->title = "Lorem gipsum geneva demo title"
?>

<?php
$query = new \yii\db\query();
$dataProvider = new ArrayDataProvider([
    'allModels' => $query->from('lists')->all(),
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
    'filterModel'=> $searchModel,

    'columns' => [
        ['class'=>'yii\grid\SerialColumn'],
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






