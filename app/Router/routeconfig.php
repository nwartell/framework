<?php

// Currently unused

/* Example route with all options
'/' => [
    'controller' => 'index',
    'middleware' => ['AuthMiddleware']
],
*/

return [
    '' => [
        'controller' => 'index',
        'middleware' => ['AuthMiddleware']
    ],
    'index' => [
        'controller' => 'index',
        'middleware' => ['AuthMiddleware']
    ],
    'signin' => [
        'controller' => 'signin'
    ],
    'signout' => [
        'controller' => 'signout'
    ],
    'register' => [
        'controller' => 'register'
    ],
    'show' => [
        'controller' => 'show',
        'middleware' => ['AuthMiddleware']
    ],
    'account' => [
        'controller' => 'account',
        'middleware' => ['AuthMiddleware']
    ]
]

?>