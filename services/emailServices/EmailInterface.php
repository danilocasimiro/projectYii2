<?php 

namespace app\services\emailServices;

use app\models\entities\interfaces\EntitiesInterface;

interface EmailInterface
{
    public function sendEmail(EntitiesInterface $receiver, string $class): void;
}