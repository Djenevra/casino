<?php

use yii\db\Migration;

/**
 * Class m220321_114207_items
 */
class m220321_114207_items extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%items}}', [
            'id' => $this->primaryKey(),
            'title' => $this->text(),
            'total' => $this->float(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        if ($this->db->schema->getTableSchema('user', true) !== null) {
            $this->dropTable('{{%items}}');
        }
    }

}
