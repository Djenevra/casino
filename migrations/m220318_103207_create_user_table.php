<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%user}}`.
 */
class m220318_103207_create_user_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%user}}', [
            'id' => $this->primaryKey(),
            'username' => $this->string()->unique(),
            'password' => $this->string(),
            'address' => $this->string(),
        ]);

        $this->batchInsert('{{%user}}', ['username', 'password', 'address'],
            [
               [ 'admin', 'pass', 'admins address'],
               ['July', '123', 'Julies address'],
               ['Junie', '123', 'Junies address'],
               ['Feby', '1234', 'Febies address'],
               ['Jeisy J', '1231', 'Jeisy Js address'],
               ['Goldy', '12312', 'Goldies address'],
               ['Samanda', '12312', 'Samandas address'],
               ['Donna', '222', 'Donnas address']
            ]
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        if ($this->db->schema->getTableSchema('user', true) !== null) {
            $this->dropTable('{{%user}}');
        }
    }
}
