<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%brlst}}`.
 */
class m230806_101844_create_brlst_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%brlst}}', [
            'brlst_id' => $this->primaryKey(),
            'enccode' => $this->integer()->notNull(),
            'patient' => $this->string()->notNull(),
            'dateadmitted' => $this->dateTime()->notNull(),
            'status' => $this->string()->notNull(),
            'linen' => $this->string()->notNull(),
            'daterequested' => $this->dateTime()->notNull(),
            'remarks' => $this->string()->notNull(),
        ]);
        // Create an index on enccode for faster foreign key lookup
        $this->createIndex('idx-brlst-enccode', '{{%brlst}}', 'enccode');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%brlst}}');
    }
}
