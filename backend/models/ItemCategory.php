<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "item_category".
 *
 * @property int $id
 * @property string $name
 * @property int|null $parent_category
 *
 * @property ItemCategory[] $itemCategories
 * @property Item[] $items
 * @property ItemCategory $parentCategory
 */
class ItemCategory extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'item_category';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name'], 'required'],
            [['parent_category'], 'integer'],
            [['name'], 'string', 'max' => 255],
            [['parent_category'], 'exist', 'skipOnError' => true, 'targetClass' => ItemCategory::class, 'targetAttribute' => ['parent_category' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'parent_category' => 'Parent Category',
        ];
    }

    /**
     * Gets query for [[ItemCategories]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getItemCategories()
    {
        return $this->hasMany(ItemCategory::class, ['parent_category' => 'id']);
    }

    /**
     * Gets query for [[Items]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getItems()
    {
        return $this->hasMany(Item::class, ['category_id' => 'id']);
    }

    /**
     * Gets query for [[ParentCategory]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getParentCategory()
    {
        return $this->hasOne(ItemCategory::class, ['id' => 'parent_category']);
    }
}
