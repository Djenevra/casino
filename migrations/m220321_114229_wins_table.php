<?php

use yii\db\Migration;

/**
 * Class m220321_114229_wins_table
 */
class m220321_114229_wins_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%win}}', [
            'id' => $this->primaryKey(),
            'prize_id' => $this->integer(),
            'user_id' => $this->integer(),
            'amount' => $this->integer(),
            'type' => $this->string(),
            'title' => $this->string(),
            'status' => $this->string(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        if ($this->db->schema->getTableSchema('win', true) !== null) {
            $this->dropTable('{{%win}}');
        }
    }
}
