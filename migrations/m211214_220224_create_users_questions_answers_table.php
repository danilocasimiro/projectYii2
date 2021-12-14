<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%users_questions_answers}}`.
 */
class m211214_220224_create_users_questions_answers_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('users_questions_answers', [
            'id'=>$this->char(32)->notNull(),
            'auth_user_id'=>$this->char(32)->notNull(),
            'question_id'=>$this->char(32)->notNull(),
            'answer_id'=>$this->char(32)->notNull(),
            'description'=>$this->string(255),
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
        $this->dropTable('{{%users_questions_answers}}');
    }
}
