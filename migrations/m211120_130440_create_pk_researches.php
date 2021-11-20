<?php

use yii\db\Migration;

/**
 * Class m211120_130440_create_pk_researches
 */
class m211120_130440_create_pk_researches extends Migration
{
     /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addPrimaryKey('pk_researches', 'researches', 'id');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropPrimaryKey('pk_researches', 'researches');
    }
}
