<?php

return [
    'db' => [
        'dsn' => sprintf(
    "%s:host=%s;dbname=%s;",
            getenv('DB_DRIVER'),
            getenv('DB_HOST'),
            getenv('DB_NAME')
        ),
        'username' => getenv('DB_USERNAME'),
        'password' => getenv('DB_PASSWORD'),
        'charset' => getenv('DB_CHARSET')
    ]
];