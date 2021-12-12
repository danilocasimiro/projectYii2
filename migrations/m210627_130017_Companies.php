<?php

use yii\db\Migration;

/**
 * Class m210627_130017_companies
 */
class m210627_130017_companies extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('companies', [
            'id'=>$this->char(32)->notNull(),
            'auth_user_id'=>$this->char(32)->notNull(),
            'name'=>$this->string(60)->notNull(),
            'foundation'=>$this->dateTime()->notNull(),
            'cnpj'=>$this->string(18)->notNull(),
            'friendly_id' => $this->integer()->notNull(),
            'created_at' => $this->dateTime()->defaultValue(date('Y-m-d H:i:s'))->notNull(),
            'deleted_at' => $this->dateTime()
        ], 'ENGINE=InnoDB');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('companies');
    }
}
