<?php 

namespace app\services\emailServices;

use app\interfaces\ModelInterface;

interface EmailInterface
{
    public function sendEmail(ModelInterface $receiver, string $class): void;
}