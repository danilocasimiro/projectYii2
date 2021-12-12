<?php

use yii\db\Migration;

/**
 * Class m210705_233051_questions_types
 */
class m210705_233051_questions_types extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('questions_types', [
            'id'=>$this->char(32)->notNull(),
            'text'=>$this->string(60)->notNull(),
            'friendly_id' => $this->integer()->notNull(),
            'created_at' => $this->dateTime()->defaultValue(date('Y-m-d H:i:s'))->notNull(),
            'deleted_at' => $this->dateTime()
        ], 'ENGINE=InnoDB');

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('questions_types');
    }
}
