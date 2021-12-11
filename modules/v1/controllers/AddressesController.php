<?php

namespace app\modules\v1\controllers;

use app\models\Address;

class AddressesController extends BaseController
{
    public $modelClass = Address::class;
    public $defaultTypeDelete = 'hard';
    
}
