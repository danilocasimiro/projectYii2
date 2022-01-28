<?php

namespace app\traits;

use app\useCases\systemServices\HelperExpandMethods;

trait ActionViewDefaultTrait
{
  public function actionView(): array
  {
    return HelperExpandMethods::mergeObjectWithRelationsOnExpand($this->getObject);
  }
}
