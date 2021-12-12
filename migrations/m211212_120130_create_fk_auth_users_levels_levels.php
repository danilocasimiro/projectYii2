<?php

use yii\db\Migration;

/**
 * Class m211212_120130_create_fk_auth_users_levels_levels
 */
class m211212_120130_create_fk_auth_users_levels_levels extends Migration
{
      /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addForeignKey('fk_auth_users_levels_levels', 'auth_users_levels', 'level_id', 'levels', 'id', 'CASCADE', 'CASCADE');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropForeignKey('fk_auth_users_levels_levels', 'auth_users_levels');
    }
}
