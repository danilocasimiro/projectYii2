<?php

use yii\db\Migration;

/**
 * Class m220128_003139_create_fk_social_networks_auth_users
 */
class m220128_003139_create_fk_social_networks_auth_users extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addForeignKey('fk_social_networks_auth_users', 'social_networks', 'auth_user_id', 'auth_users', 'id', 'CASCADE', 'CASCADE');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropForeignKey('fk_social_networks_auth_users', 'social_networks');
    }
}
