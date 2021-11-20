<?php

use yii\db\Migration;

/**
 * Class m211120_124710_create_fk_people_auth_users
 */
class m211120_124710_create_fk_people_auth_users extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addForeignKey('fk_people_auth_users', 'people', 'auth_user_id', 'auth_users', 'id', 'CASCADE', 'CASCADE');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropForeignKey('fk_people_auth_users', 'people');

    }
}
