<?php

use yii\db\Migration;

/**
 * Class m210705_233110_Answers
 */
class m210705_233110_Answers extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('answers', [
            'id'=>$this->primaryKey(),
            'question_id'=>$this->integer()->notNull(),
            'text'=>$this->string(60)->notNull(),
        ]);

        $this->addForeignKey('fk_answers_question_id', 'answers', 'question_id', 'questions', 'id', 'CASCADE', 'RESTRICT');

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropForeignKey('fk_answers_researche_id', 'answers');
        $this->dropTable('answers');
    }
}
