<?php

use yii\db\Migration;

/**
 * Class m211120_125114_create_pk_addresses
 */
class m211120_125114_create_pk_addresses extends Migration
{
     /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addPrimaryKey('pk_addresses', 'addresses', 'id');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropPrimaryKey('pk_addresses', 'addresses');
    }
}
