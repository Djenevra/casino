<?php

use yii\db\Migration;

/**
 * Class m220321_114220_ball
 */
class m220321_114220_ball extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%ball}}', [
            'id' => $this->primaryKey(),
            'title' => $this->text(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        if ($this->db->schema->getTableSchema('user', true) !== null) {
            $this->dropTable('{{%ball}}');
        }
    }
}
