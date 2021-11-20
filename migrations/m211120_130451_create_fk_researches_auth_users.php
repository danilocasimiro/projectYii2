<?php

use yii\db\Migration;

/**
 * Class m211120_130451_create_fk_researches_auth_users
 */
class m211120_130451_create_fk_researches_auth_users extends Migration
{
        /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addForeignKey('fk_researches_auth_users', 'researches', 'auth_user_id', 'auth_users', 'id', 'CASCADE', 'CASCADE');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropForeignKey('fk_researches_auth_users', 'researches');

    }
}
