<?php
use yii\helpers\html;

use yii\widgets\ActiveForm;

$this->title = "Edit form title";
?>
<?php $form = ActiveForm::begin(); ?>
  <div class="mb-3">
    <?= $form->field($lists, 'title'); ?>
  </div>
  <div class="mb-3">
    <?= $form->field($lists, 'description'); ?>
  </div>
  <div class="mb-3">
    <?= $form->field($lists, 'category'); ?>
  </div>

<!-- button -->
<?= html::SubmitButton('Update',['class'=>'btn btn-primary']); ?>

<?php ActiveForm::end(); ?>