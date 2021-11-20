<?php

use yii\db\Migration;

/**
 * Class m211120_124856_create_pk_phones
 */
class m211120_124856_create_pk_phones extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addPrimaryKey('pk_phones', 'phones', 'id');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropPrimaryKey('pk_phones', 'phones');
    }
}
