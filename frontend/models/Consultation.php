<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "consultation".
 *
 * @property int $id
 * @property int|null $doctor_id
 * @property string|null $pasien_nama
 * @property string|null $tanggal_konsultasi
 * @property string|null $diagnosa
 *
 * @property Doctors $doctor
 */
class Consultation extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'consultation';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['doctor_id'], 'integer'],
            [['tanggal_konsultasi'], 'safe'],
            [['diagnosa'], 'string'],
            [['pasien_nama'], 'string', 'max' => 100],
            [['doctor_id'], 'exist', 'skipOnError' => true, 'targetClass' => Doctors::class, 'targetAttribute' => ['doctor_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'doctor_id' => 'Doctor ID',
            'pasien_nama' => 'Pasien Nama',
            'tanggal_konsultasi' => 'Tanggal Konsultasi',
            'diagnosa' => 'Diagnosa',
        ];
    }

    /**
     * Gets query for [[Doctor]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getDoctor()
    {
        return $this->hasOne(Doctors::class, ['id' => 'doctor_id']);
    }
}
