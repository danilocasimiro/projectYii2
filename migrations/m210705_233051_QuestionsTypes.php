<?php

use yii\db\Migration;

/**
 * Class m210705_233051_QuestionsTypes
 */
class m210705_233051_QuestionsTypes extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('questions_types', [
            'id'=>$this->char(32)->notNull(),
            'text'=>$this->string(60)->notNull(),
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
