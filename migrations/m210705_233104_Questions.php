<?php

use yii\db\Migration;

/**
 * Class m210705_233104_Questions
 */
class m210705_233104_Questions extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('questions', [
            'id'=>$this->primaryKey(),
            'researche_id'=>$this->integer()->notNull(),
            'type_id'=>$this->integer()->notNull(),
            'text'=>$this->string(60)->notNull(),
        ]);

        $this->addForeignKey('fk_questions_researche_id', 'questions', 'researche_id', 'researches', 'id', 'CASCADE', 'RESTRICT');
        $this->addForeignKey('fk_questions_type_id', 'questions', 'type_id', 'types', 'id', 'CASCADE', 'RESTRICT');

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropForeignKey('fk_questions_researche_id', 'questions');
        $this->dropForeignKey('fk_questions_type_id', 'questions');
        $this->dropTable('questions');

    }
}
