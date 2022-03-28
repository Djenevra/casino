<?php

namespace app\models;

use yii\db\ActiveRecord;

class Delivery extends ActiveRecord {

    public function rules()
    {
        return [
            [
                ['status',
                 'user_id',
                 'win_id'
                ],
                'required',
            ],
            [
                ['status'],
                'string',
                'min' => 2,
                'max' => 255,
            ],
            [['id', 'user_id', 'win_id'], 'integer'],
        ];
    }

    /**
     * @return string table name
     */
    public static function tableName()
    {
        return 'delivery';
    }
}
