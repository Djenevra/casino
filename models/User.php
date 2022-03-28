<?php

namespace app\models;

use app\models\prizes\BallPrize;
use yii\db\ActiveRecord;
use yii\web\IdentityInterface;

/**
 * This is the model class for table "task".
 *
 * @property int    $id       User ID
 * @property string $username Username
 * @property string $password password
 * @property float  $ball     ball
 */
class User extends ActiveRecord implements IdentityInterface
{

    public function rules()
    {
        return [
            [['username'], 'filter', 'filter' => 'trim'],
            [
                [
                    'username',
                    'password',
                ],
                'required',
            ],
            [
                [
                    'username',
                    'password',
                ],
                'string',
                'min' => 3,
                'max' => 255,
            ],
            ['id', 'integer'],
            ['username', 'unique'],
        ];
    }

    /**
     * @return string table name
     */
    public static function tableName()
    {
        return 'user';
    }

    /**
     * Finds a user identity by the given ID.
     *
     * @param string|int $id the ID to be looked for
     * @return IdentityInterface|null the identity object that matches the given ID.
     */
    public static function findIdentity($id)
    {
        return static::findOne($id);
    }

    /**
     * {@inheritdoc}
     */
    public static function findIdentityByAccessToken($token, $type = null)
    {
        foreach (self::$users as $user) {
            if ($user['accessToken'] === $token) {
                return new static($user);
            }
        }

        return null;
    }

    /**
     * Finds user by username
     *
     * @param string $username
     * @return IdentityInterface|null the identity object that matches the given ID
     */
    public static function findByUsername($username)
    {
       return $identity = User::findOne(['username' => $username]);
    }

    /**
     * @return int|string current user ID
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * {@inheritdoc}
     */
    public function getAuthKey()
    {
        return $this->authKey;
    }

    /**
     * {@inheritdoc}
     */
    public function validateAuthKey($authKey)
    {
        return $this->authKey === $authKey;
    }

    /**
     * Validates password
     *
     * @param string $password password to validate
     * @return bool if password provided is valid for current user
     */
    public function validatePassword(string $password): bool
    {
        return $this->password === $password;
    }

    /**
     * Validates password
     *
     * @param int $userId float $amount
     * @return bool if ball of current user is updated
     */
    public function updateBall (int $userId, float $amount ): bool
    {
        $user = $this->findOne(['id'=>$userId]);
        $user->ball = $user->ball + $amount;
       return $user->save();
    }
}
