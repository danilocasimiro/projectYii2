<?php 

return [
  [
    'class' => 'yii\rest\UrlRule',
    'controller' => 'v1/addresses',
    'pluralize' => false,
    'extraPatterns' => [
      'POST batch' => 'create-batch'
    ],
    'tokens' => [
      '{id}' => '<id:[\\w\\-]+>',
    ]
  ],
  [
    'class' => 'yii\rest\UrlRule', 
    'controller' => 'v1/answers',
    'pluralize' => false,
    'extraPatterns' => [
      'POST batch' => 'create-batch'
    ],
    'tokens' => [
      '{id}' => '<id:[\\w\\-]+>',
    ]
  ],
  [
    'class' => 'yii\rest\UrlRule',
    'pluralize' => false,
    'controller' => 'v1/auth-users',
    'extraPatterns' => [
      'POST batch' => 'create-batch'
    ],
    'tokens' => [
      '{id}' => '<id:[\\w\\-]+>',
    ]
  ],
  [
    'class' => 'yii\rest\UrlRule',
    'pluralize' => false,
    'controller' => 'v1/authenticate',
    'extraPatterns' => [
      'POST login' => 'login'
    ] 
  ],
  [
    'class' => 'yii\rest\UrlRule',
    'controller' => 'v1/companies',
    'pluralize' => false,
    'extraPatterns' => [
      'POST batch' => 'create-batch'
    ],
    'tokens' => [
      '{id}' => '<id:[\\w\\-]+>',
    ]
  ],
  [
    'class' => 'yii\rest\UrlRule',
    'controller' => 'v1/logs',
    'pluralize' => false,
    'except' => [
      'create', 'update', 'delete'
    ],
    'tokens' => [
      '{id}' => '<id:[\\w\\-]+>',
    ],
  ],
  [
    'class' => 'yii\rest\UrlRule',
    'controller' => 'v1/people',
    'pluralize' => false,
    'extraPatterns' => [
      'POST batch' => 'create-batch'
    ],
    'tokens' => [
      '{id}' => '<id:[\\w\\-]+>',
    ]
  ],
  [
    'class' => 'yii\rest\UrlRule',
    'controller' => 'v1/phones',
    'pluralize' => false,
    'extraPatterns' => [
      'POST batch' => 'create-batch'
    ],
    'tokens' => [
      '{id}' => '<id:[\\w\\-]+>',
    ],
  ],
  [
    'class' => 'yii\rest\UrlRule',
    'controller' => 'v1/questions',
    'pluralize' => false,
    'extraPatterns' => [
      'POST batch' => 'create-batch'
    ],
    'tokens' => [
      '{id}' => '<id:[\\w\\-]+>',
    ]
  ],
  [
    'class' => 'yii\rest\UrlRule',
    'controller' => 'v1/questions-types',
    'pluralize' => false,
    'extraPatterns' => [
      'POST batch' => 'create-batch'
    ],
    'tokens' => [
      '{id}' => '<id:[\\w\\-]+>',
    ]
  ],
  [
    'class' => 'yii\rest\UrlRule',
    'controller' => 'v1/researches',
    'pluralize' => false,
    'extraPatterns' => [
      'POST batch' => 'create-batch'
    ],
    'tokens' => [
      '{id}' => '<id:[\\w\\-]+>',
    ]
  ],
];