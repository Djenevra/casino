<?php

use yii\db\Migration;

/**
 * Class m220321_113847_create_money_prize_table
 */
class m220321_113847_create_money_prize_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%money_prize}}', [
            'id' => $this->primaryKey(),
            'title' => $this->text(),
            'currency' => $this->text(),
            'type' => $this->text(),
            'amount' => $this->float()->defaultValue(null),
            'total' => $this->float()->defaultValue(null),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        if ($this->db->schema->getTableSchema('money_prize', true) !== null) {
            $this->dropTable('{{%money_prize}}');
        }
    }

}
