<?php

namespace app\models;

use yii\db\ActiveRecord;

/**
 * This is the model class for table "task".
 *
 * @property int             $id
 * @property string          $title           Дата и время создания задачи
 */
class Ball extends ActiveRecord
{
    public function rules()
    {
        return [
            [
                ['title'],
                'required',
            ],
            [
                [
                    'title',
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
        return 'ball';
    }

    /**
     * Finds user by username
     *
     * @param int $id
     */
    public static function findById($id)
    {
        return $ball = Ball::findOne(['id' => $id]);
    }

    /**
     * @return int|string current user ID
     */
    public function getId()
    {
        return $this->id;
    }
}
