<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use frontend\models\Doctors;

/** @var yii\web\View $this */
/** @var frontend\models\Consultation $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="consultation-form">

    <?php $form = ActiveForm::begin([
        'options' => ['class' => 'p-4 bg-light rounded shadow-sm'],
    ]); ?>

    <h2 class="text-center mb-4">Formulir Konsultasi</h2>

    <?= $form->field($model, 'doctor_id')->dropDownList(
        ArrayHelper::map(Doctors::find()->all(), 'id', 'nama'),
        ['prompt' => 'Pilih Dokter', 'class' => 'form-select']
    )->label('Dokter') ?>

    <?= $form->field($model, 'pasien_nama')->textInput([
        'maxlength' => true, 
        'placeholder' => 'Masukkan nama pasien', 
        'class' => 'form-control'
    ])->label('Nama Pasien') ?>

    <?= $form->field($model, 'tanggal_konsultasi')->input('date', [
        'class' => 'form-control',
        'min' => date('Y-m-d'), // Memastikan hanya tanggal sekarang atau masa depan
    ])->label('Tanggal Konsultasi') ?>

    <?= $form->field($model, 'diagnosa')->textarea([
        'rows' => 6, 
        'placeholder' => 'Masukkan catatan diagnosa', 
        'class' => 'form-control'
    ])->label('Diagnosa') ?>

    <div class="form-group text-center mt-4">
        <?= Html::submitButton('Simpan', ['class' => 'btn btn-success btn-lg']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
