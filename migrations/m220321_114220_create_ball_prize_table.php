<?php

use yii\db\Migration;

/**
 * Class m220321_114220_create_ball_prize_table
 */
class m220321_114220_create_ball_prize_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%ball_prize}}', [
            'id' => $this->primaryKey(),
            'title' => $this->text(),
            'type' => $this->text(),
            'amount' => $this->integer()->defaultValue(null),
        ]);

        $this->batchInsert('{{%ball_prize}}', ['title', 'type', 'amount'],
            [
                [ 'BALL', 'ball', null ]
            ]
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        if ($this->db->schema->getTableSchema('ball_prize', true) !== null) {
            $this->dropTable('{{%ball_prize}}');
        }
    }
}
