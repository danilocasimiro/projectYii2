<?php

use yii\db\Migration;

/**
 * Class m211120_125936_create_pk_companies
 */
class m211120_125936_create_pk_companies extends Migration
{
     /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addPrimaryKey('pk_companies', 'companies', 'id');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropPrimaryKey('pk_companies', 'companies');
    }
}
