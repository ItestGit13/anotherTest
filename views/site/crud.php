<?php
use yii\helpers\html;
use yii\widgets\LinkPager;
use yii\data\Pagination;
use yii\data\ActiveDataProvider;
use app\models\lists;
use yii\grid\GridView;  
use app\models\searchList;

$this->title = "Lorem gipsum geneva demo title"
?>
<!-- <?php  $dataProvider = new ActiveDataProvider([
  
  'query'=>lists::find(),
  'pagination'=> [
    'pageSize'=>3,
  ],
  // 'pagination'=>false,
  'sort'=>[
    'attributes'=>['title','description'],
    // 'defaultOrder'=>['title'=>SORT_ASC, 'description'=> SORT_DESC ]
    ]
    
  ]); ?> -->

<?php  print_r($dataProvider); die(); ?>
<h1>My List</h1>

<?=

GridView::widget([
'dataProvider'=>$dataProvider,
'filterModel'=>$searchModel,
'showFooter'=>true,
'showHeader'=>true,

'columns'=> [
  'id',
  'title',
  [
    'attribute'=>'description',
    'label'=>'Description'
  ],
  [
    'attribute'=>'category'
  ],
  [
    'class'=>'yii\grid\ActionColumn',
    'header'=>'Actions',
    'headerOptions'=>['width'=>'80'],
    'template'=>'{view} {update} {delete}',
    'visible'=>true,
    // 'header'=>'Actions',
    'footer'=>'Testing Status',

  ]
],
'layout'=>"\n{summary}\n{items}\n{pager} ",
'showOnEmpty'=>true,

]); 

?>






