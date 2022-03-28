<?php

use yii\db\Migration;

/**
 * Class m220321_114207_create_prize_table
 */
class m220321_114207_create_prize_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%prize}}', [
            'id' => $this->primaryKey(),
            'title' => $this->text(),
            'type' => $this->text(),
            'total' => $this->integer()->defaultValue(null),
            'amount' => $this->integer()->defaultValue(null),
        ]);

        $this->batchInsert('{{%prize}}', ['title', 'type', 'amount', 'total'],
            [
                [ 'EARRINGS', 'prize', null, 100],
                [ 'RING', 'prize', null, 100]
            ]
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        if ($this->db->schema->getTableSchema('prize', true) !== null) {
            $this->dropTable('{{%prize}}');
        }
    }

}
