<?php

namespace app\components;

class JwtValidationData extends \sizeg\jwt\JwtValidationData
{
 
    /**
     * @inheritdoc
     */
    public function init()
    {
        $this->validationData->setIssuer('http://localhost:3000');
        $this->validationData->setAudience('http://localhost:3000');
        $this->validationData->setId('4f1g23a12aa');

        parent::init();
    }
}