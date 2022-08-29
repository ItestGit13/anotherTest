<?php
use yii\helpers\html;
/** @var yii\web\View $this */

$this->title = 'My Yii Application';
?>
<div class="site-index">

    <div class="jumbotron text-center bg-transparent">
        <h1 style="color: #337ab7" class="display-4">Yii Framework</h1>

        <?php if(yii::$app->session->hasFlash('message')): ?>
    <?php echo yii::$app->session->getFlash('message'); ?>
    <?php endif; ?>
    </div>
<div class="row">
<span style="margin-bottom: 20px"><?= Html::a('create',['create'],['class'=>'btn btn-primary'])?></span>
</div>
    <div class="row">
    <table class="table table-hover">
  <thead>
    <tr>
      <th scope="col">ID</th>
      <th scope="col">Title</th>
      <th scope="col">Description</th>
      <th scope="col">Category</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
  <?php
  if(count($posts) > 0):
   foreach($posts as $post): ?>
    <tr class="table">
      <th scope="row"><?php echo $post->id; ?></th>
      <td><?php echo $post->title; ?></td>
      <td><?php echo $post->description; ?></td>
      <td><?php echo $post->category; ?></td>
      <td>
      <span><?= Html::a ('view',['view','id'=>$post->id],['class'=>'btn btn-primary']) ?></span>
      <span><?= Html::a ('update',['update','id'=>$post->id],['class'=>'btn btn-success']) ?></span>
      <span><?= Html::a ('delete',['delete','id'=>$post->id],['class'=>'btn btn-danger']) ?></span>
    </td>
    </tr>
    <?php endforeach; ?>
    <?php else: ?>
      <tr>
        <td>No Records Found</td>
      </tr>

      <?php endif; ?>
  </tbody>
</table>
        </div>
    </div>
</div>
