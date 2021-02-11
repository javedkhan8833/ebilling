<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "payment".
 *
 * @property int $id
 * @property int $cust_id
 * @property string $description
 * @property string $date
 * @property int $amount
 *
 * @property Customer $cust
 */
class Payment extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'payment';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['cust_id', 'description', 'date', 'amount'], 'required'],
            [['cust_id', 'amount'], 'integer'],
            [['description'], 'string'],
            [['date'], 'safe'],
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
            'description' => 'Description',
            'date' => 'Date',
            'amount' => 'Amount',
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
}
