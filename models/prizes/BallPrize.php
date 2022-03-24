<?php

namespace app\models\prizes;

use yii\db\ActiveRecord;

/**
 * This is the model class for table "ball".
 *
 * @property int    $id    BallPrize ID
 * @property string $title BallPrize title
 * @property string $type Type
 * @property float $amount Amount
 */
class BallPrize extends ActiveRecord
{
    public function rules()
    {
        return [
            [
                ['title',
                 'type'
                ],
                'required',
            ],
            [
                ['amount'],
                'float',
            ],
            [
                [
                    'title',
                    'type'
                ],
                'string',
                'min' => 2,
                'max' => 255,
            ],
            ['id', 'integer'],
        ];
    }

    /**
     * @return string table name
     */
    public static function tableName()
    {
        return 'ball_prize';
    }

    /**
     * Finds user by username
     *
     * @param int $id
     */
    public static function findById($id)
    {
        return $ball = BallPrize::findOne(['id' => $id]);
    }

    /**
     * @return int|string current money ID
     */
    public function getId()
    {
        return MoneyPrize::find()->one()->id;
    }
}
