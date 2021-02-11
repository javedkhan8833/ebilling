<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "receipt".
 *
 * @property int $id
 * @property string $type
 * @property string $description
 * @property int $payment_id
 * @property int $cust_id
 * @property int $user_id
 * @property int $bill_id
 *
 * @property Bill $bill
 * @property Customer $cust
 * @property Permissions $payment
 * @property User $user
 */
class Receipt extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'receipt';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['type', 'description', 'payment_id', 'cust_id', 'user_id', 'bill_id'], 'required'],
            [['description'], 'string'],
            [['payment_id', 'cust_id', 'user_id', 'bill_id'], 'integer'],
            [['type'], 'string', 'max' => 20],
            [['bill_id'], 'exist', 'skipOnError' => true, 'targetClass' => Bill::className(), 'targetAttribute' => ['bill_id' => 'id']],
            [['cust_id'], 'exist', 'skipOnError' => true, 'targetClass' => Customer::className(), 'targetAttribute' => ['cust_id' => 'id']],
            [['payment_id'], 'exist', 'skipOnError' => true, 'targetClass' => Permissions::className(), 'targetAttribute' => ['payment_id' => 'id']],
            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['user_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'type' => 'Type',
            'description' => 'Description',
            'payment_id' => 'Payment ID',
            'cust_id' => 'Customer Name',
            'user_id' => 'User Name',
            'bill_id' => 'Bill ID',
        ];
    }

    /**
     * Gets query for [[Bill]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getBill()
    {
        return $this->hasOne(Bill::className(), ['id' => 'bill_id']);
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
     * Gets query for [[Payment]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getPayment()
    {
        return $this->hasOne(Permissions::className(), ['id' => 'payment_id']);
    }

    /**
     * Gets query for [[User]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'user_id']);
    }
}
