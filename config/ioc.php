<?php

use app\services\emailServices\EmailInterface;
use app\services\emailServices\PhpMailerService;

return [
  EmailInterface::class => PhpMailerService::class,
];
