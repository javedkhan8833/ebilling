<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "customer".
 *
 * @property int $id
 * @property string $name
 * @property float $mobile
 * @property string $email
 * @property int $user_id
 * @property int $role_id
 * @property int $per_id
 *
 * @property Bill[] $bills
 * @property Permissions $per
 * @property Role $role
 * @property User $user
 * @property Payment[] $payments
 * @property Receipt[] $receipts
 */
class Customer extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'customer';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'mobile', 'email'], 'required'],
            [['mobile'], 'number'],
            // [['user_id', 'role_id', 'per_id'], 'integer'],
            [['name'], 'string', 'max' => 20],
            [['email'], 'string', 'max' => 50],
            // [['per_id'], 'exist', 'skipOnError' => true, 'targetClass' => Permissions::className(), 'targetAttribute' => ['per_id' => 'id']],
            // [['role_id'], 'exist', 'skipOnError' => true, 'targetClass' => Role::className(), 'targetAttribute' => ['role_id' => 'id']],
            // [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['user_id' => 'id']],
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
            'mobile' => 'Mobile',
            'email' => 'Email',
            // 'user_id' => 'User ID',
            // 'role_id' => 'Role ID',
            // 'per_id' => 'Per ID',
        ];
    }

    /**
     * Gets query for [[Bills]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getBills()
    {
        return $this->hasMany(Bill::className(), ['cust_id' => 'id']);
    }

    /**
     * Gets query for [[Per]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getPer()
    {
        return $this->hasOne(Permissions::className(), ['id' => 'per_id']);
    }

    /**
     * Gets query for [[Role]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getRole()
    {
        return $this->hasOne(Role::className(), ['id' => 'role_id']);
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

    /**
     * Gets query for [[Payments]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getPayments()
    {
        return $this->hasMany(Payment::className(), ['cust_id' => 'id']);
    }

    /**
     * Gets query for [[Receipts]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getReceipts()
    {
        return $this->hasMany(Receipt::className(), ['cust_id' => 'id']);
    }
}
