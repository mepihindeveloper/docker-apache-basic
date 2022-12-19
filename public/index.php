<?php

declare(strict_types = 1);

echo 'Hi, docker! I\'m PHP';

echo '<pre>' . print_r($_SERVER, true) . '</pre>';

xdebug_info();

//phpinfo();

try {
    $dbh = new PDO('pgsql:dbname=postgres;host=apache-postgres', 'postgres', '123456789');
} catch (PDOException $e) {
    die($e->getMessage());
}