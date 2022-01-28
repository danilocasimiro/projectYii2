<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%social_networks}}`.
 */
class m220128_003117_create_social_networks_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('social_networks', [
            'id' => $this->char(32)->notNull(),
            'auth_user_id' => $this->char(32)->notNull(),
            'website' => $this->string(),
            'github' => $this->string(),
            'twitter' => $this->string(),
            'instagram' => $this->string(),
            'facebook' => $this->string(),
            'created_at' => $this->dateTime()->defaultValue(date('Y-m-d H:i:s'))->notNull(),
            'deleted_at' => $this->dateTime()
        ], 'ENGINE=InnoDB');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%social_networks}}');
    }
}
