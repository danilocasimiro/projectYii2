<?php

use yii\db\Migration;

/**
 * Class m210705_233104_questions
 */
class m210705_233104_questions extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('questions', [
            'id'=>$this->char(32)->notNull(),
            'research_id'=>$this->char(32)->notNull(),
            'question_type_id'=>$this->char(32)->notNull(),
            'text'=>$this->string(255)->notNull(),
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
        $this->dropTable('questions');

    }
}
