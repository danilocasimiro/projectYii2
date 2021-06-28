<?php

use yii\db\Migration;

/**
 * Class m210628_110918_UserTypes
 */
class m210628_110918_UserTypes extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('user_types', [
            'id'=>$this->primaryKey(),
            'type'=>$this->string(60)->notNull(), 
        ]);

        $this->addColumn('auth_users', 'user_type_id', $this->integer()->notNull());

        $this->addForeignKey('fk_auth_users_user_type_id', 'auth_users', 'user_type_id', 'user_types', 'id', 'CASCADE', 'RESTRICT');

        $types = [
            ['type'=> 'admin'],
            ['type'=> 'own_company'],
            ['type'=> 'staff_company'], 
            ['type'=> 'normal'],
        ];
        
        \Yii::$app->db
        ->createCommand()
        ->batchInsert('user_types', ['type'], $types)
        ->execute();
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropForeignKey('fk_auth_users_user_type_id', 'auth_users');
        $this->dropTable('user_types');
    }
}
