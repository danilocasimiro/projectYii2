<?php

use yii\db\Migration;

/**
 * Class m210629_121051_Addresses
 */
class m210629_121051_Addresses extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('addresses', [
            'id'=>$this->primaryKey(),
            'auth_user_id'=>$this->integer()->notNull(),
            'street'=>$this->string(50)->notNull(),
            'number'=>$this->string(15)->notNull(),
            'district'=>$this->string(30)->notNull(),
            'city'=>$this->string(30)->notNull(),
            'state'=>$this->string(30)->notNull(),
            'country'=>$this->string(30)->notNull(),
            'zipcode'=>$this->string(15)->notNull(),
        ]);

        $this->addForeignKey('fk_addresses_auth_user_id', 'addresses', 'auth_user_id', 'auth_users', 'id', 'CASCADE', 'RESTRICT');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropForeignKey('fk_addresses_auth_user_id', 'addresses');
        $this->dropTable('addresses');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m210629_121051_Addresses cannot be reverted.\n";

        return false;
    }
    */
}
