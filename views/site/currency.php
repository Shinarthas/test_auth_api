<h1>Пара <?php echo $model->symbol ?></h1>
<h3>текущий рейт - <b> <?php echo $current_rate['open']?></b> </h3>

<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;

$form = ActiveForm::begin([
    'id' => 'login-form',
    'options' => ['class' => 'form-horizontal'],
    ]) ?>
<?= $form->field($model, 'symbol') ?>
<?= $form->field($model, 'timeframe')->dropDownList([
        '5m'=>'5m',
        '1d'=>'1d',
])
?>
<?= $form->field($model, 'date_start')->widget(\kartik\date\DatePicker::className(),['options' => ['dateFormat' => 'yy-mm-dd']])  ?>
<?= $form->field($model, 'date_end')->widget(\kartik\date\DatePicker::className(),['options' => ['dateFormat' => 'yy-mm-dd']]) ?>
<div class="form-group">
    <div class="col-lg-11">
        <?= Html::submitButton('Request', ['class' => 'btn btn-primary']) ?>
    </div>
</div>
<?php ActiveForm::end() ?>

<p>График</p>
<pre>
    <?php print_r($rates); ?>
</pre>