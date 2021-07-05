<?php

use yii\db\Migration;

/**
 * Class m210705_233057_Researches
 */
class m210705_233057_Researches extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('researches', [
            'id'=>$this->primaryKey(),
            'auth_user_id'=>$this->integer()->notNull(),
            'title'=>$this->string(40)->notNull(),
            'description'=>$this->string(60)->notNull(),
        ]);

        $this->addForeignKey('fk_researches_auth_user_id', 'researches', 'auth_user_id', 'auth_users', 'id', 'CASCADE', 'RESTRICT');

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('researches');
    }
}
