<?php
use yii\helpers\html;
use yii\widgets\ActiveForm;
/** @var yii\web\View $this */

$this->title = 'My Yii Application';
?>
<div class="site-index">

    <div class="jumbotron text-center bg-transparent">
        <h1 style="color: #337ab7" class="display-4">Create Post</h1>
        <div class="col-lg-2">
            <a class="btn btn-primary" href=" <?php  echo yii::$app->homeUrl; ?>">Home</a>
        </div>
        <div class="body-content">
            <?php $form = ActiveForm::begin(); ?>
            <div class="row">
                <div class="form-group">
                    <div class="col-lg-6">
                        <?= $form->field($posts,'title');?>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="form-group">
                    <div class="col-lg-6">
                        <?= $form->field($posts,'description')->textarea(['rows'=>'6']);?>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="form-group">
                    <div class="col-lg-6">
                        <?php $item = ['Language'=>'Language','CMS'=>'CMS','MVC'=>'MVC']; ?>
                        <?= $form->field($posts,'category')->dropDownList($item,['prompt'=>'Select Category']);?>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
                <div class="form-group">
                    <div class="col-lg-6">
                        <?= Html::submitButton('Create Post',['class'=>'btn btn-primary']);?>
                    </div>
                </div>
            </div>
        </div>
        <?php ActiveForm::end() ?>
</div>
    </div>
</div>
