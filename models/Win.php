<?php

namespace app\models;

use yii\db\ActiveRecord;

class Win extends ActiveRecord {

    /**
     * This is the model class for table "Win".
     *
     * @property int    $id       Win ID
     * @property int    $user_id  Password
     * @property int    $prize_id Prize ID
     * @property string $status   Status
     * @property string $type     Type
     * @property string $title    Title
     * @property int  $amount     Amount
     */

    public function rules(): array
    {
        return [
            [
                [   'status',
                    'user_id',
                    'prize_id',
                    'type',
                    'amount'
                ],
                'required',
            ],
            [['id', 'user_id', 'prize_id', 'amount'], 'integer'],
            [['status', 'type', 'title'], 'string'],
        ];
    }

    /**
     * @return string table name
     */
    public static function tableName()
    {
        return 'win';
    }
}
