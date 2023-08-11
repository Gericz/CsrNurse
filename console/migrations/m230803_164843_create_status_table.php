<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%status}}`.
 */
class m230803_164843_create_status_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%status}}', [
            'id' => $this->primaryKey(),
            'name' => $this->string(255)->notNull(),
        ]);

        $this->batchInsert('status', ['name'], [
            ['request'],
            ['approved'],
            ['denied'],
            ['returned'],
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%status}}');
    }
}
