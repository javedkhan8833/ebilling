<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "bill".
 *
 * @property int $id
 * @property int $cust_id
 * @property string $type
 * @property string $description
 *
 * @property Customer $cust
 * @property Receipt[] $receipts
 */
class Bill extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'bill';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['cust_id', 'type', 'description'], 'required'],
            [['cust_id'], 'integer'],
            [['description'], 'string'],
            [['type'], 'string', 'max' => 11],
            [['cust_id'], 'exist', 'skipOnError' => true, 'targetClass' => Customer::className(), 'targetAttribute' => ['cust_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'cust_id' => 'Customer Name',
            'type' => 'Bill Type',
            'description' => 'Description',
        ];
    }

    /**
     * Gets query for [[Cust]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCust()
    {
        return $this->hasOne(Customer::className(), ['id' => 'cust_id']);
    }

    /**
     * Gets query for [[Receipts]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getReceipts()
    {
        return $this->hasMany(Receipt::className(), ['bill_id' => 'id']);
    }
}
