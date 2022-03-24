<?php

namespace app\models\prizes;

use yii\db\ActiveRecord;

/**
 * This is the model class for table "money".
 *
 * @property int    $id    MoneyPrize ID
 * @property string $title Title
 * @property string $type Type
 * @property string $currency Currency
 * @property float $total Total
 * @property float $amount Amount
 */
class MoneyPrize extends ActiveRecord
{
    public function rules()
    {
        return [
            ['id', 'integer'],
            [
                ['title',
                 'currency',
                 'type'
                ],
                'required',
            ],
            [
                [
                    'title',
                    'currency',
                    'type'
                ],
                'string',
                'min' => 2,
                'max' => 255,
            ],
            [['total', 'amount'], 'float'],
        ];
    }

    /**
     * @return string table name
     */
    public static function tableName()
    {
        return 'money_prize';
    }

    /**
     * Finds money prize by id
     *
     * @param int $id
     */
    public static function findById($id)
    {
        return $money = MoneyPrize::findOne(['id' => $id]);
    }

    /**
     * @return int|string current money ID
     */
    public function getId()
    {

        return MoneyPrize::find()->one()->id;
    }
}

