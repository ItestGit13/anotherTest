<?php
use yii\helpers\html;
use yii\widgets\LinkPager;
use yii\data\Pagination;

$this->title = "Lorem gipsum geneva demo title"
?>

<h1>My List</h1>
<?= html::a('Create List',['create_list'],['class'=>'btn btn-primary','style'=>'margin-bottom : 20px']); ?>

<table class="table">
  <thead>
    <tr>
      <th scope="col">ID</th>
      <th scope="col">Title</th>
      <th scope="col">Description</th>
      <th scope="col">Cateory</th>
      <th scope="col">Actions</th>
    </tr>
  </thead>
  <tbody>
    <?php if(count($list) > 0): ?>
    <?php foreach($list as $lists): ?>
    <tr>
      <th scope="row"><?php echo $lists->id; ?></th>
      <td><?php echo $lists->title; ?></td>
      <td><?php echo $lists->description; ?></td>
      <td><?php echo $lists->category; ?></td>
      <td>
        <span><?= html::a('View',['view','id'=> $lists->id],['class'=>'btn btn-primary']);?></span>
        <span><?= html::a('Update',['update','id'=> $lists->id],['class'=>'btn btn-success']);?></span>
        <span><?= html::a('Delete',['delete','id'=> $lists->id],['class'=>'btn btn-danger']);?></span>
      </td>
    </tr>
    <?php endforeach; ?>
    <?php else: ?>
      <div>
        No Record Found
      </div>
      <?php endif; ?>
  </tbody>
</table>
<div>
<?php
   // display pagination
   echo LinkPager::widget([
      'pagination' => $pagination,
   ]);
?>
</div>
