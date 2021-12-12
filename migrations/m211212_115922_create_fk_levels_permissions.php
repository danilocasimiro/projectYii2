<?php

use yii\db\Migration;

/**
 * Class m211212_115922_create_fk_levels_permissions
 */
class m211212_115922_create_fk_levels_permissions extends Migration
{
     /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addForeignKey('fk_levels_permissions', 'levels', 'permission_id', 'permissions', 'id', 'CASCADE', 'CASCADE');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropForeignKey('fk_levels_permissions', 'levels');
    }
}
