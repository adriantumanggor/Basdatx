<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var frontend\models\Consultation $model */

$this->title = 'Create Consultation';
$this->params['breadcrumbs'][] = ['label' => 'Consultations', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="consultation-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
