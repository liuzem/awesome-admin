<?php

use \think\facade\Env;

return [
    'key' => Env::get('JWT.KEY', 'conle'),
    'exp' => Env::get('JWT.EXP', '12'),
];