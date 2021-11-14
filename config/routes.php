<?php 

return [
  [
    'class' => 'yii\rest\UrlRule',
    'controller' => 'v1/addresses',
    'pluralize' => false,
  ],
  [
    'class' => 'yii\rest\UrlRule', 
    'controller' => 'v1/answers',
    'pluralize' => false
  ],
  [
    'class' => 'yii\rest\UrlRule',
    'controller' => 'v1/companies',
    'pluralize' => false,
  ],
  [
    'class' => 'yii\rest\UrlRule',
    'controller' => 'v1/employees',
    'pluralize' => false,
  ],
  [
    'class' => 'yii\rest\UrlRule',
    'controller' => 'v1/questions',
    'pluralize' => false,
  ],
  [
    'class' => 'yii\rest\UrlRule',
    'controller' => 'v1/researches',
    'pluralize' => false,
  ],
  [
    'class' => 'yii\rest\UrlRule',
    'controller' => 'v1/sistema',
    'pluralize' => false,
  ],
  [
    'class' => 'yii\rest\UrlRule',
    'controller' => 'v1/site',
    'pluralize' => false,
  ],
  [
    'class' => 'yii\rest\UrlRule',
    'controller' => 'v1/types',
    'pluralize' => false,
  ],
  [
    'class' => 'yii\rest\UrlRule',
    'pluralize' => false,
    'controller' => 'v1/auth-users',
    'extraPatterns' => [
      'POST login' => 'login',
      'OPTIONS login' => 'login',
      'GET profile/{id}' => 'profile',
      'OPTIONS profile' => 'profile'
    ]
  ],
];