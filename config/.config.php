<?php

declare(strict_types=1);

require_once __DIR__ . '/.config.example.php';

$_ENV['db_socket'] = '/run/sspanel/mysqld.sock';
$_ENV['db_database'] = 'sspanel';
$_ENV['db_username'] = 'sspanel';
$_ENV['db_password'] = 'sspanel';

$_ENV['redis_host'] = '/run/sspanel/redis.sock';
$_ENV['redis_port'] = -1;
$_ENV['redis_username'] = 'sspanel';
$_ENV['redis_password'] = 'sspanel';

# Override other default values here
