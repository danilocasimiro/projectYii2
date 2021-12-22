<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%system_messages}}`.
 */
class m211215_235727_create_system_messages_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('system_messages', [
            'id' => $this->char(32)->notNull(),
            'subject' => $this->string(255)->notNull(),
            'message' => $this->string(255)->notNull(),
            'type'=> "ENUM('email', 'log')",
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
        $this->dropTable('{{%system_messages}}');
    }
}
