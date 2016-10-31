<?php
return [
    'api/user/insert'                                                           => 'user/insert',
    'api/user/index'                                                           => 'user/index',
    'api/mobile/check-bind'                                                     => 'mobile/check-bind',
    'api/mobile/check-bind/<type>/<param:.*>'                                   => 'mobile/check-bind',
    'api/mobile/user-info'                                                      => 'mobile/user-info',
    'api/mobile/user-info/<type>/<param:.*>'                                    => 'mobile/user-info',
    'api/mobile/openid'                                                         => 'mobile/openid',
    'api/mobile/openid/<type>/<param:.*>'                                       => 'mobile/openid',
    'api/mobile/check-pay/<type>/<param:.*>'                                    => 'mobile/check-pay',

    'POST api/<controller:[\w-]+>s'                                             => '<controller>/create',
    'api/<controller:[\w-]+>s'                                                  => '<controller>/index',
    'PUT api/<controller:[\w-]+>/<id:[\w\d,]{24}>'                              => '<controller>/update',
    'DELETE api/<controller:[\w-]+>/<id:[\w\d]{24}(,[\w\d]{24})*>'              => '<controller>/delete',
    'api/<controller:[\w-]+>/<id:[\w\d,]{24}>'                                  => '<controller>/view',

    'POST api/<module:\w+>/<controller:[\w-]+>s'                                => '<module>/<controller>/create',
    'api/<module:\w+>/<controller:[\w-]+>s'                                     => '<module>/<controller>/index',
    'PUT api/<module:\w+>/<controller:[\w-]+>/<id:[\w\d,]{24}>'                 => '<module>/<controller>/update',
    'DELETE api/<module:\w+>/<controller:[\w-]+>/<id:[\w\d]{24}(,[\w\d]{24})*>' => '<module>/<controller>/delete',
    'api/<module:\w+>/<controller:[\w-]+>/<id:[\w\d,]{24}>'                     => '<module>/<controller>/view',

    'api/<controller:[\w-]+>/<action:[\w-]+>/<id:[\w\d,]{24}>'                                  => '<controller>/<action>',
    'api/<module:\w+>/<controller:[\w-]+>/<action:[\w-]+>/<id:[\w\d,]{24}(,[\w\d]{24})*>'       => '<module>/<controller>/<action>',
    'api/<module:\w+>/<submodule:\w+>/<controller:[\w-]+>/<action:[\w-]+>/<id:[\w\d,]{24}>'     => '<module>/<submodule>/<controller>/<action>',
    'api/<controller:[\w-]+>/<action:[\w-]+>'                                                   => '<controller>/<action>',
    'api/<module:\w+>/<controller:[\w-]+>/<action:[\w-]+>'                                      => '<module>/<controller>/<action>',
    'api/<module:\w+>/<submodule:\w+>/<controller:[\w-]+>/<action:[\w-]+>'                      => '<module>/<submodule>/<controller>/<action>',
];