<?php

namespace app\models;

use yii\db\ActiveRecord;
use yii\web\IdentityInterface;

/**
 * This is the model class for table "task".
 *
 * @property int             $id
 * @property string          $username           Дата и время создания задачи
 * @property string          $password           Дата и время до исполнения задачи
 */
class User extends ActiveRecord implements IdentityInterface
{
    private static $users = [
        '100' => [
            'id' => '100',
            'username' => 'admin',
            'password' => 'admin',
            'authKey' => 'test100key',
            'accessToken' => '100-token',
        ],
        '101' => [
            'id' => '101',
            'username' => 'demo',
            'password' => 'demo',
            'authKey' => 'test101key',
            'accessToken' => '101-token',
        ],
    ];

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
    public function validatePassword($password)
    {

//        var_dump('password', $this->password, 'pass from form', $password, 'bool', $this->password === $password);
//        var_dump('username', $this->username); die;
        return $this->password === $password;
    }
}
