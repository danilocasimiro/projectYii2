<?php 

return [
   //////////////////////////////////////////////////////INIT RBAC ROUTES////////////////////////////////////////////////////////////////////////////////////////////////////////
   [
    'class' => 'yii\rest\UrlRule',
    'controller' => [
        'v1/auth-users/levels' => 'v1/rbac/auth-users-levels'
    ],
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
    'controller' => [
        'v1/authorization/levels' => 'v1/rbac/levels'
    ],
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
    'controller' => [
        'v1/authorization/permissions' => 'v1/rbac/permissions'
    ],
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
    'controller' => [
        'v1/authorization/roles' => 'v1/rbac/roles'
    ],
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
    'controller' => [
        'v1/authorization/roles-permissions' => 'v1/rbac/roles-permissions'
    ],
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
    'controller' => [
        'v1/authorization' => 'v1/rbac/authorizations'
    ],
    'except' => [
      'delete', 'create', 'update', 'view', 'index'
    ],
    'pluralize' => false,
    'tokens' => [
      '{id}' => '<id:[\\w\\-]+>',
    ]
  ],
  //////////////////////////////////////////////////////END RBAC ROUTES///////////////////////////////////////////////////////////////////////////////////////
  //////////////////////////////////////////////////////INIT OTHER ROUTES///////////////////////////////////////////////////////////////////////////////////////
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
    'controller' => 'v1/companies-plans',
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
    'controller' => 'v1/plans',
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
    'controller' => 'v1/plans-items',
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
  [
    'class' => 'yii\rest\UrlRule',
    'controller' => 'v1/users-questions-answers',
    'pluralize' => false,
    'extraPatterns' => [
      'POST batch' => 'create-batch'
    ],
    'tokens' => [
      '{id}' => '<id:[\\w\\-]+>',
    ]
  ],
  //////////////////////////////////////////////////////END OTHER ROUTES///////////////////////////////////////////////////////////////////////////////////////
];