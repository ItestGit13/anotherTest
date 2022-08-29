<?php 
use yii\helpers\html;

use yii\widgets\ActiveForm;

$this->title = "Create Random List";
?>
<?php $form = ActiveForm::begin();  ?>
  <div class="form-group">
    <?= $form->field($lists,'title');?>
  </div>
  <div class="form-group">
  <?= $form->field($lists,'description');?>
  </div>
  <div class="form-group">
  <?= $form->field($lists,'category');?>
  </div> 
  <!-- Button -->
  <?= html::SubmitButton('Add',['class'=>'btn btn-primary']);?>
  <?php ActiveForm::end(); ?>