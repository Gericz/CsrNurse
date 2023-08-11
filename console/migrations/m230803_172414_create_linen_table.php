<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%linen}}`.
 */
class m230803_172414_create_linen_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%linen}}', [
            'id' => $this->primaryKey(),
            'color' => $this->string(255)->notNull(),
        ]);
        $this->batchInsert('linen', ['color'], [
            ['Green01'],
            ['Green02'],
            ['Green03'],
            ['Green04'],
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%linen}}');
    }
}
