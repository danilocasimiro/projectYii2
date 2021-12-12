<?php

use yii\db\Migration;

/**
 * Class m210705_233110_answers
 */
class m210705_233110_answers extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('answers', [
            'id'=>$this->char(32)->notNull(),
            'question_id'=>$this->char(32)->notNull(),
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
        $this->dropTable('answers');
    }
}
