<?php

use yii\db\Migration;

/**
 * Class m230814_145204_rtrn
 */
class m230814_145204_rtrn extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%rtrn}}', [
            'rtrn_id' => $this->primaryKey(),
            'apprv_id' => $this->integer()->unique()->notNull(),
            'brlst_id' => $this->integer()->notNull(),
            'enccode' => $this->integer()->notNull(),
            'patient' => $this->string()->notNull(),
            'dateadmitted' => $this->dateTime()->notNull(),
            'status' => $this->string()->notNull(),
            'linen' => $this->string()->notNull(),
            'daterequested' => $this->dateTime()->notNull(),
            'remarks' => $this->string()->notNull(),
            'dateapproved' => $this->dateTime()->notNull(),
        ]);
        
        // Add a foreign key constraint
        $this->addForeignKey(
            'fk-rtrn-apprv_id',
            '{{%rtrn}}',
            'apprv_id',
            '{{%apprv}}',
            'apprv_id',
            'CASCADE',
            'CASCADE'
            );
    
    
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m230814_145204_rtrn cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m230814_145204_rtrn cannot be reverted.\n";

        return false;
    }
    */
}
