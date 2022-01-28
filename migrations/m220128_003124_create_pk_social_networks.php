<?php

use yii\db\Migration;

/**
 * Class m220128_003124_create_pk_social_networks
 */
class m220128_003124_create_pk_social_networks extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addPrimaryKey('pk_social_networks', 'social_networks', 'id');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropPrimaryKey('pk_social_networks', 'social_networks');
    }
}
