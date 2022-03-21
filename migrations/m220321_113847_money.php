<?php

use yii\db\Migration;

/**
 * Class m220321_113847_money
 */
class m220321_113847_money extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%money}}', [
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
            $this->dropTable('{{%money}}');
        }
    }

}
