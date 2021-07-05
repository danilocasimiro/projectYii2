<?php

use yii\db\Migration;

/**
 * Class m210705_233051_Types
 */
class m210705_233051_Types extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('types', [
            'id'=>$this->primaryKey(),
            'text'=>$this->string(60)->notNull(),
        ]);

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m210705_233051_Types cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m210705_233051_Types cannot be reverted.\n";

        return false;
    }
    */
}
