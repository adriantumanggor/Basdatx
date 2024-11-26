<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "doctors".
 *
 * @property int $id
 * @property string $nama
 * @property string|null $spesialisasi
 * @property string|null $nomor_telepon
 */
class Doctors extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'doctors';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nama'], 'required'],
            [['nama', 'spesialisasi'], 'string', 'max' => 100],
            [['nomor_telepon'], 'string', 'max' => 15],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'nama' => 'Nama',
            'spesialisasi' => 'Spesialisasi',
            'nomor_telepon' => 'Nomor Telepon',
        ];
    }
}
