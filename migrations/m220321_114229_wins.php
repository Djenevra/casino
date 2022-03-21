<?php

use yii\db\Migration;

/**
 * Class m220321_114229_wins
 */
class m220321_114229_wins extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%wins}}', [
            'id' => $this->primaryKey(),
            'prize_id' => $this->integer(),
            'user_id' => $this->integer()->unique(),
            'status' => $this->string(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        if ($this->db->schema->getTableSchema('user', true) !== null) {
            $this->dropTable('{{%wins}}');
        }
    }
}
