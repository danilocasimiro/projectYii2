<?php

use yii\db\Migration;

/**
 * Class m210629_114244_Phones
 */
class m210629_114244_Phones extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('phones', [
            'id'=>$this->primaryKey(),
            'auth_user_id'=>$this->integer()->notNull(),
            'ddd'=>$this->string(5)->notNull(),
            'number'=>$this->string(15)->notNull(),
        ]);

        $this->addForeignKey('fk_phones_auth_user_id', 'phones', 'auth_user_id', 'auth_users', 'id', 'CASCADE', 'RESTRICT');

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropForeignKey('fk_phones_auth_user_id', 'phones');
        $this->dropTable('phones');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m210629_114244_Phones cannot be reverted.\n";

        return false;
    }
    */
}
