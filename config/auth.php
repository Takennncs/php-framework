<?php

return [
    'model' => \App\Models\User::class,
    'table' => 'users',
    'password' => [
        'min' => 8,
        'mixed_case' => true,
        'numbers' => true,
        'symbols' => false,
    ],
    'session' => [
        'lifetime' => 120,
        'remember' => 43200,
    ],
];