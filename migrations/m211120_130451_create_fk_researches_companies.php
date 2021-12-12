<?php

use yii\db\Migration;

/**
 * Class m211120_130451_create_fk_researches_companies
 */
class m211120_130451_create_fk_researches_companies extends Migration
{
        /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addForeignKey('fk_researches_companies', 'researches', 'company_id', 'companies', 'id', 'CASCADE', 'CASCADE');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropForeignKey('fk_researches_companies', 'researches');

    }
}
