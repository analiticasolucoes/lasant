<?php

use App\Database\Database;

function dbConnect(): ?Database
{
    $host = getenv('DB_HOST');
    $dbname = getenv('DB_NAME');
    $username = getenv('DB_USER');
    $password = getenv('DB_PASS');

    return Database::getInstance($host, $dbname, $username, $password);
}