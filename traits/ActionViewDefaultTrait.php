<?php

namespace app\traits;

use app\helpers\HelperExpandMethods;

trait ActionViewDefaultTrait
{
  public function actionView(): array
  {
    return HelperExpandMethods::mergeObjectWithRelationsOnExpand($this->getObject);
  }
}
