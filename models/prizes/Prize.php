<?php

namespace app\models\prizes;

use yii\db\ActiveRecord;

/**
 * This is the model class for table "prize".
 *
 * @property int $id    Prize ID
 * @property string $title Prize title
 * @property string $total Prize total
 * @property float $amount Amount
 * @property string $type Type
 */
class Prize extends ActiveRecord
{
    public function rules()
    {
        return [
            [['id', 'amount', 'total'], 'integer'],
            [
                ['title',
                 'type'],
                'required',
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
        ];
    }

    /**
     * @return string table name
     */
    public static function tableName()
    {
        return 'prize';
    }

    /**
     * Finds prize by id
     *
     * @param int $id
     */
    public static function findById($id)
    {
        return $prize = Prize::findOne(['id' => $id]);
    }

    /**
     * @return int|string Prize ID
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * returns random prize
     * @return Prize|string Prize
     */
    public function getRandomPrize()
    {

        $smallestId = Prize::find()->select('id')->orderBy(['id' => SORT_ASC])->one()->id;
        $biggestId = Prize::find()->select('id')->orderBy(['id' => SORT_DESC])->one()->id;
        $randomId = mt_rand($smallestId, $biggestId);

        return Prize::findById($randomId);
    }
}

