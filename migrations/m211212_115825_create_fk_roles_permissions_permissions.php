<?php

use yii\db\Migration;

/**
 * Class m211212_115825_create_fk_roles_permissions_permissions
 */
class m211212_115825_create_fk_roles_permissions_permissions extends Migration
{
     /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addForeignKey('fk_roles_permissions_permissions', 'roles_permissions', 'permission_id', 'permissions', 'id', 'CASCADE', 'CASCADE');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropForeignKey('fk_roles_permissions_permissions', 'roles_permissions');
    }
}
