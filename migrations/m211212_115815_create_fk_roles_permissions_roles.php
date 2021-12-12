<?php

use yii\db\Migration;

/**
 * Class m211212_115815_create_fk_roles_permissions_roles
 */
class m211212_115815_create_fk_roles_permissions_roles extends Migration
{
      /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addForeignKey('fk_roles_permissions_roles', 'roles_permissions', 'role_id', 'roles', 'id', 'CASCADE', 'CASCADE');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropForeignKey('fk_roles_permissions_roles', 'roles_permissions');
    }
}
