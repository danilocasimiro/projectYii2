<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%users_refresh_tokens}}`.
 */
class m211106_161120_create_users_refresh_tokens_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%users_refresh_tokens}}', [
            'id' => $this->char(32)->notNull(),
            'user_id' => $this->char(32)->notNull(),
            'token' => $this->string(100)->notNull(),
            'ip' => $this->string(50)->notNull(),
            'user_agent' => $this->string(100),
            'created_at' => $this->dateTime()->defaultValue(date('Y-m-d H:i:s'))->notNull(),
            'deleted_at' => $this->dateTime()
        ], 'ENGINE=InnoDB');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%users_refresh_tokens}}');
    }
}
