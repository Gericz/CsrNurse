<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%apprv}}`.
 */
class m230806_102140_create_apprv_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%apprv}}', [
            'apprv_id' => $this->primaryKey(),
            'brlst_id' => $this->integer()->unique()->notNull(),
            'enccode' => $this->integer()->notNull(),
            'patient' => $this->string()->notNull(),
            'dateadmitted' => $this->dateTime()->notNull(),
            'status' => $this->string()->notNull(),
            'linen' => $this->string()->notNull(),
            'daterequested' => $this->dateTime()->notNull(),
            'remarks' => $this->string()->notNull(),
        ]);
        
        // Add a foreign key constraint
        $this->addForeignKey(
            'fk-apprv-brlst_id',
            '{{%apprv}}',
            'brlst_id',
            '{{%brlst}}',
            'brlst_id',
            'CASCADE',
            'CASCADE'
            );
    
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%apprv}}');
    }
}
